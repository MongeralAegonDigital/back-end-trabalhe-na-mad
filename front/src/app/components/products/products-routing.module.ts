import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { InsertComponent } from './insert.component';
import { SearchComponent } from './search.component';

const routes: Routes = [
  {
    path: '',
    data: {
      title: 'Products'
    },
    children: [
      {
        path: 'search',
        component: SearchComponent,
        data: {
          title: 'Search product'
        }
      },
      {
        path: 'insert',
        component: InsertComponent,
        data: {
          title: 'Insert product'
        }
      }
    ]
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ProductsRoutingModule {
  
}
