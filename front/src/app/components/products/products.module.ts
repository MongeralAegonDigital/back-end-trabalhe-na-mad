import { NgModule } from '@angular/core';
import { ChartsModule } from 'ng2-charts/ng2-charts';
import { SearchComponent } from './search.component';
import { InsertComponent } from './insert.component';
import { ProductsRoutingModule } from './products-routing.module';
import { FormsModule, ReactiveFormsModule } from '@angular/forms';
import { CommonModule } from '@angular/common';
import { DataTableModule } from 'angular-2-data-table';

@NgModule({
  imports: [
    CommonModule,
    ProductsRoutingModule,
    ChartsModule,
    FormsModule,
    DataTableModule
  ],
  declarations: [ InsertComponent, SearchComponent ]
})
export class ProductsModule { }
