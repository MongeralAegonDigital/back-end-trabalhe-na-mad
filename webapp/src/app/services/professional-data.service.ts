import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs/Observable';
import { WorkCategory } from '../models/work-category';
import { environment } from '../../environments/environment';
import { MaritalStatus } from '../models/marital-status';


@Injectable()
export class ProfessionalDataService {

  header = {headers: new HttpHeaders({ 'Content-Type': 'application/json', 'charset': 'UTF-8' })};
  constructor(
    private _http: HttpClient
  ) { }

  public getAllWorkCategories(): Observable<WorkCategory[]> {
    return this._http.get<WorkCategory[]>(`${environment.apiUrl}work-categories`, this.header);
  }

  public getAllMaritalStatuses(): Observable<MaritalStatus[]> {
    return this._http.get<MaritalStatus[]>(`${environment.apiUrl}marital-statuses`, this.header);
  }

}
