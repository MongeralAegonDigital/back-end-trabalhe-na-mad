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
    console.log(productOBJ);
    productOBJ.size = productOBJ.size.toString().replace(',','.')
    productOBJ.lenght = productOBJ.lenght.toString().replace(',','.')
    productOBJ.weight = productOBJ.weight.toString().replace(',','.')

    return this._http.post(environment.baseUrl + 'products' , JSON.stringify(productOBJ) ).map( (response : Response) => response.json() )    
  }


}
