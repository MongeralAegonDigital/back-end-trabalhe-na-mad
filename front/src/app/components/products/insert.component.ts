import { Component } from '@angular/core';
import { Router } from '@angular/router';
import { Http, Response } from '@angular/http';
import { Subject } from 'rxjs/Rx';
import { Product } from '../../model/Product';
import { Category } from '../../model/Category';
import { ApiService } from '../../service/api.service';
import { EndPoints } from '../../config/EndPoints';

import 'rxjs/add/operator/map';


@Component({
  templateUrl: 'insert.component.html'
})
export class InsertComponent {

  product:Product;
  categories:Array<Category>;
  category:Category;
  showErrorMessage:boolean;
  showSuccessMessage:boolean;
  errorMessage:string;
  successMessage:string;
  
  constructor(private api:ApiService ) { 
    this.product = new Product();
    this.category = new Category();
    this.showErrorMessage = false;
    this.showSuccessMessage = false;
    this.errorMessage = 'Error on insert product';
    this.successMessage = 'Success on insert product!!';
  }

  populateProductCategory():any{
    this.api
        .get(EndPoints.getCategoryListEndPoint())
        .then(resultList=>{  
          this.categories = resultList;
        });
  }
  
  validate(){
     return new Promise(resolve=>{
        if(!this.category){
          resolve(false);
        }else if(!this.product.productName){
          resolve(false);
        }else if(!this.product.productManufacture){
          resolve(false);
        }else if(!this.product.productSize){
          resolve(false);
        }else if(!this.product.productHeight){
          resolve(false);
        }else if(!this.product.productWeight){
          resolve(false);
        }else{
          resolve(true); 
        }        
     });
  }

  insertProduct(event){
    event.preventDefault();

    this.validate()
        .then(isValid=>{ 

          if(isValid){

            let command = {
                  productName:this.product.productName,
                  productManufacture:this.product.productManufacture,
                  productSize:this.product.productSize,
                  productHeight:this.product.productHeight,
                  productWeight:this.product.productWeight,
                  productCategoryId:this.category
            }
            
            this.api
                .post(JSON.stringify(command),EndPoints.insertProductEndPoint())
                .then((error,insertResponse)=>{
                  this.showSuccessMessage = true;
                  this.showErrorMessage = false;
                  this.product = new Product();
                });

          }else{
            this.showErrorMessage = true;
            this.showSuccessMessage = false;
          }
        });
  }

  ngOnInit() {
    this.populateProductCategory();
  }

}
