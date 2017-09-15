import { Injectable } from '@angular/core';
import { ConfigService } from './config.service';

@Injectable()
export class RequestService{

   request:any;

   constructor(command:string){
       this.request = {
           service:command,
           key:ConfigService.getKey(),
           data:{}
       };
   }
   

   getDashboardDataCommand(){
      return this.request;
   }

   getAdminLoginCommand(vUserName:string, vPassword:string):any{
     let data:Object = {
          user: vUserName,
          password: vPassword 
    };
    this.request.data = data;
    return this.request;
   }

   getSearchTransactionCommand(filter:any):any{
     let data:Object = {
          cellPhoneFrom:filter.cellPhoneFrom,
          cellPhoneTo:filter.cellPhoneTo,
          type:filter.type,
          state:filter.state,
          publicKeyFrom:filter.publicKeyFrom,
          publicKeyTo:filter.publicKeyTo
    };
    this.request.data = data;
    return this.request;
   }






  



 
  
    


}