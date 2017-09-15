import { Injectable } from '@angular/core';
import { Http, Response } from '@angular/http';
import { Headers, RequestOptions } from '@angular/http';
import 'rxjs/add/operator/toPromise';
import 'rxjs/add/operator/map';
import { ConfigService } from './config.service';


@Injectable()
export class ApiService {

    private endPoint:string;
    private config:ConfigService;

    constructor(public http:Http) {
        this.endPoint = ConfigService.getApiEndPoint();
    }

    post(service:string, endPoint:string):any{
        
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
        console.log(service);
        return this.http
                   .post(endPoint,service,options)
                   .toPromise()
                   .then(this.extractData)
                   .catch(this.handleErrorPromise);
                    
    }

    delete(id:number, endPoint:string):any{
        
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
    
        return this.http
                   .delete(endPoint+id,options)
                   .toPromise()
                   .then(this.extractData)
                   .catch(this.handleErrorPromise);             
    }

    get(endPoint:string):any{
        
        let headers = new Headers({ 'Content-Type': 'application/json' });
        let options = new RequestOptions({ headers: headers });
     
        return this.http
                   .get(endPoint)
                   .toPromise()
                   .then(this.extractData)
                   .catch(this.handleErrorPromise);
    }
     
    private extractData(res: Response) {
        let body = res.json();
        return body.data || {};
    }
    
    private handleErrorPromise (error: Response | any) {
        console.error(error.message || error);
        return Promise.reject(error.message || error);
    }

}