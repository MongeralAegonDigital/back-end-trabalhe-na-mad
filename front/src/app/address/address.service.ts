import { Injectable } from '@angular/core';
import { Http } from '@angular/http';
import { Address } from './address';
import "rxjs";
import { Observable } from "rxjs";
import "rxjs/add/operator/map";

@Injectable()
export class AddressService {
  
    constructor(
      private _http:Http
    ) { 
       
    }

    getAddressFromCEP(cep: string|number) {        
        return this._http.get('http://127.0.0.1:8000/api/address/cep/'+cep).
        map(data => this.buildAddress(data.json()))
        .toPromise();
    }

    private buildAddress(address)
    {
        let cep = new Address();
        cep.cep = address.cep;
        cep.street = address.logradouro;
        cep.neighbor = address.bairro;
        cep.city = address.cidade;
        cep.state = address.estado;

        return cep;
    }

}
