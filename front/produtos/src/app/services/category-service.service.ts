import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Observable } from 'rxjs/Observable';
import 'rxjs/add/operator/map';
import { environment } from '../../environments/environment';

@Injectable()
export class CategoryServiceService {

  constructor(private _http : Http) { }

  listAll() {
    return this._http.get(environment.baseUrl + 'categories').map( (response : Response) => response.json() )
  }

}
