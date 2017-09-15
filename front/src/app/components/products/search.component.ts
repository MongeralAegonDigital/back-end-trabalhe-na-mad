import { Component,  ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { ApiService } from '../../service/api.service';
import { Product } from '../../model/Product';
import { EndPoints } from '../../config/EndPoints';
import { Subject } from 'rxjs/Rx';
import { FilterProduct } from '../../model/FilterProduct';
import { Category } from '../../model/Category';

import 'rxjs/add/operator/map';
import 'rxjs/add/operator/toPromise';

declare let jQuery: any;

@Component({
  templateUrl: 'search.component.html'
})
export class SearchComponent {

  productList:Array<Product>;
  filter:FilterProduct;
  categories:Array<Category>;
  category:Category;
  filterProduct:Product;
  public rowsOnPage = 3;

  constructor( private api:ApiService) { 
      this.filter = new FilterProduct();
      this.category = new Category();
      this.filterProduct = new Product();
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

  getProducts(event){
    event.preventDefault();
    if(this.category){
      this.filter.productCategoryId = this.category;
    }
    let product:Product = this.filterProduct.translateFilter(this.filter);
    alert(JSON.stringify(product));
    this.api
        .post(JSON.stringify(product),EndPoints.searchEndPoint())
        .then(productListRet=>{
          alert(JSON.stringify(productListRet));
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
    this.refresh();
    this.populateProductCategory();
  }


}
