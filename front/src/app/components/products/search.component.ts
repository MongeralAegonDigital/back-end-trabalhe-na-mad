import { Component,  ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../../service/api.service';
import { Product } from '../../model/Product';
import { EndPoints } from '../../config/EndPoints';
import 'rxjs/add/operator/toPromise';
import { Subject } from 'rxjs/Rx';
import 'rxjs/add/operator/map';
import { FilterProduct } from '../../model/FilterProduct';
import { Category } from '../../model/Category';

declare let jQuery: any;

@Component({
  templateUrl: 'search.component.html'
})
export class SearchComponent {

  productList:Array<Product>;
  filter:FilterProduct;
  categories:Array<Category>;

  public rowsOnPage = 3;

  constructor( private api:ApiService) { 
      this.filter = new FilterProduct();  
  }

  translateCategory(categoryId:number){
     if(1){
       return 'Durável';
     }else{
       return 'Não durável';
     }
  }

  populateProductCategory():any{
    this.api
        .get(EndPoints.getCategoryListEndPoint())
        .then(resultList=>{  
          this.categories = resultList;
        });
  }

  getProducts(){
    this.api
        .post(JSON.stringify(this.filter),EndPoints.searchEndPoint())
        .then(productListRet=>{
          this.productList = productListRet;
        });
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
    //this.refresh();
  }


}
