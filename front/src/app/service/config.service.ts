import { Injectable } from '@angular/core';

@Injectable()
export class ConfigService {

  constructor(){

  }

  static getApiEndPoint():string{
    return 'xxx';
  }

  static getKey():string{
    return '9337dfc4ebd54966b18a8f22d569';
  }

}