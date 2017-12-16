import { Injectable } from '@angular/core';
import { Http, Response , Headers, RequestOptionsArgs, RequestOptions } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { environment } from '../../environments/environment';
import { Category } from '../models/category.model';

@Injectable()
export class CategoryServiceService {

  constructor(private _http : Http) { }

  listAll() {
    return this._http.get(environment.baseUrl + 'categories').map( (response : Response) => response.json() )
  }

  save(category : Category) {
    return this._http.post(environment.baseUrl + 'categories' , JSON.stringify(category) ).map( (response : Response) => response.json() )
  }

}
