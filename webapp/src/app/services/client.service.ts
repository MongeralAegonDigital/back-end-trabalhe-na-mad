import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { environment } from '../../environments/environment';

@Injectable()
export class ClientService {

  header = {headers: new HttpHeaders({ 'Content-Type': 'application/json', 'charset': 'UTF-8' })};
  constructor(
    private _http: HttpClient
  ) { }

  public consultarCep(cep: string): Observable<any> {
    return this._http.get(`https://api.postmon.com.br/v1/cep/${cep}`);
  }

  public save(obj) {
    return this._http.post(`${environment.apiUrl}clients`, obj, this.header);
  }

}
