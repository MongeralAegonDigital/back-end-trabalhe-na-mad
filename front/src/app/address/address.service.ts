import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Address } from './address';
import "rxjs";
import { Observable } from "rxjs";

@Injectable()
export class AddressService {
  
    constructor(
      private _http:Http
    ) { 
       
    }

    getAddressFromCEP(address: Address) {
      return this._http.get('http://127.0.0.1/cep/'+address.cep).
      map(data => data.json()).toPromise();
    }

}
