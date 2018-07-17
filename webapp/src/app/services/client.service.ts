import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';

@Injectable()
export class ClientService {

  constructor(
    private _http: HttpClient
  ) { }

  public consultarCep(cep: string): Observable<any> {
    return this._http.get(`https://api.postmon.com.br/v1/cep/${cep}`);
  }

}
