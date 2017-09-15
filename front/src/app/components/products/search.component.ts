import { Component,  ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../../service/api.service';
import { Product } from '../../model/Product';
import { EndPoints } from '../../config/EndPoints';
import 'rxjs/add/operator/toPromise';
import { Subject } from 'rxjs/Rx';
import 'rxjs/add/operator/map';

declare let jQuery: any;

@Component({
  templateUrl: 'search.component.html'
})
export class SearchComponent {

  productList:Array<Product>;
 
  public rowsOnPage = 3;

  constructor( private api:ApiService) { 
       
  }

  translateCategory(categoryId:number){
     if(1){
       return 'Durável';
     }else{
       return 'Não durável';
     }
  }

  deleteProduct(productId:number){
    this.api
        .delete(productId,EndPoints.deleteProductEndPoint())
        .then(res=>{
          this.refresh();
    });
  }
  
  refresh(){
    this.api
    .get(EndPoints.getProductListEndPoint())
    .then(productListRet=>{
      this.productList = productListRet;
    });
  }
  ngOnInit() {
    this.refresh();
  }


}
