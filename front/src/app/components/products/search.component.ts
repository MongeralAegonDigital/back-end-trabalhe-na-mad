import { Component,  ViewChild } from '@angular/core';
import { Router } from '@angular/router';
import { DataTable, DataTableResource } from 'angular-2-data-table';
import { ApiService } from '../../service/api.service';
import { EndPoints } from '../../config/EndPoints';
import 'rxjs/add/operator/toPromise';

@Component({
  templateUrl: 'search.component.html'
})
export class SearchComponent {

  products = [];
  productList = [];
  productResource:any = new DataTableResource(this.productList);
  productCount = 0;

  @ViewChild(DataTable) productsTable: DataTable;
  constructor( private api:ApiService) { 
    this.productResource.count().then(count => this.productCount = count);
  }

  reload(params) {
    this.productResource.query(params).then(products => this.products = products);
  }

  ngOnInit() {
    this.api
        .get(EndPoints.getProductListEndPoint())
        .then(productList=>{
          this.productResource = new DataTableResource(productList);
        });
  }

}
