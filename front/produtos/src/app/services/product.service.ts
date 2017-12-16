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
          
    let url = environment.baseUrl + 'products/filter';
    let someParam = false
    if(productOBJ.name) {
      url = this.addParams('name='+productOBJ.name,url);
      someParam = true
    }
    if(productOBJ.fabrication_date) {
      let date = moment(productOBJ.fabrication_date,'DD/MM/YYYY').format('YYYY-MM-DD')          
      url = this.addParams('fabrication_date='+date,url);
      someParam = true
    }
    if(productOBJ.size) {
      let size = productOBJ.size = productOBJ.size.toString().replace(',','.')
      url = this.addParams('size='+size,url);
      someParam = true
    }
    if(productOBJ.lenght) {
      let lenght = productOBJ.lenght.toString().replace(',','.')
      url = this.addParams('lenght='+lenght,url);
      someParam = true
    }
    if(productOBJ.weight) {
      let weight = productOBJ.weight.toString().replace(',','.')
      url = this.addParams('weight='+weight,url);
      someParam = true
    }
    
    if (product.categories && product.categories.length > 0) {
      let categoryIds =  []
      product.categories.forEach( item  => {
        categoryIds.push(item.id)
      })
      let categoryIdsSTR = 'categories=' + categoryIds.join();
      url = this.addParams(categoryIdsSTR,url);
      someParam = true
    }

    if(someParam)
      return this._http.get( url ).map( (response : Response) => response.json() )
    else
      return this.listAll()
  }

  listAll() {
    return this._http.get(environment.baseUrl + 'products').map( (response : Response) => response.json() )
  }


}
