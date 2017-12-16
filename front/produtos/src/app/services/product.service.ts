import { Injectable } from '@angular/core';
import { Http, Response , Headers, RequestOptionsArgs, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { environment } from '../../environments/environment';
import { Product } from '../models/product.model';
import * as moment from 'moment'

@Injectable()
export class ProductService {

  constructor(private _http: Http) { }

  save(product: Product) {
    let categoriesJson = JSON.stringify(product.categories)
    let productOBJ : any = Object.assign({'product_categories': categoriesJson }, product )
    productOBJ.fabrication_date = moment(productOBJ.fabrication_date,'DD/MM/YYYY').format('YYYY-MM-DD')
    productOBJ.size = productOBJ.size.toString().replace(',','.')
    productOBJ.lenght = productOBJ.lenght.toString().replace(',','.')
    productOBJ.weight = productOBJ.weight.toString().replace(',','.')

    return this._http.post(environment.baseUrl + 'products' , JSON.stringify(productOBJ) ).map( (response : Response) => response.json() )    
  }

  private addParams(params , url ) {
    if(url.indexOf('?') >= 0) {
      return url + '&'+params
    } else {
      return url + '?'+params
    }
  }

  filter(product : Product){

    let productOBJ : any = product
    if(productOBJ.fabrication_date)
      productOBJ.fabrication_date = moment(productOBJ.fabrication_date,'DD/MM/YYYY').format('YYYY-MM-DD')    
    if(productOBJ.size)
      productOBJ.size = productOBJ.size.toString().replace(',','.')
    if(productOBJ.lenght)
      productOBJ.lenght = productOBJ.lenght.toString().replace(',','.')
    if(productOBJ.weight)
      productOBJ.weight = productOBJ.weight.toString().replace(',','.')

    let url = environment.baseUrl + 'products/filter';
    let filters = '?'

    if(productOBJ.name) {
      url = this.addParams('name='+productOBJ.name,url);
    }
    if(productOBJ.fabrication_date) {
      url = this.addParams('fabrication_date='+productOBJ.fabrication_date,url);
    }
    if(productOBJ.size) {
      url = this.addParams('size='+productOBJ.size,url);
    }
    if(productOBJ.lenght) {
      url = this.addParams('lenght='+productOBJ.lenght,url);
    }
    if(productOBJ.weight) {
      url = this.addParams('weight='+product.weight,url);
    }
    
    if (product.categories && product.categories.length > 0) {
      let categoryIds =  []
      product.categories.forEach( item  => {
        categoryIds.push(item.id)
      })
      let categoryIdsSTR = 'categories=' + categoryIds.join();
      url = this.addParams(categoryIdsSTR,url);
    }


    return this._http.get( url ).map( (response : Response) => response.json() )
  }

  listAll() {
    return this._http.get(environment.baseUrl + 'products').map( (response : Response) => response.json() )
  }


}
