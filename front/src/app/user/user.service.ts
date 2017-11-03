import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { User } from './user';
import "rxjs";
import { Observable } from "rxjs";
import "rxjs/add/operator/map";

@Injectable()
export class UserService {

    constructor(
      private _http:Http
    ) { 
      
    }

    create(user: User)
    {
        return this._http.post('http://127.0.0.1:8000/api/users', user)
        .map(data => data.json()).toPromise();
    }

    getUsers()
    {
        return this._http.get('http://127.0.0.1:8000/api/users')
        .map(data => data.json()).toPromise();
    }

}
