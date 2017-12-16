import { ToastService } from './services/toast.service';
import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { CadastroProdutosComponent } from './cadastro-produtos/cadastro-produtos.component';
import { ConsultaProdutosComponent } from './consulta-produtos/consulta-produtos.component';
import { FiltroProdutosComponent } from './filtro-produtos/filtro-produtos.component';
import { ListaProdutosComponent } from './lista-produtos/lista-produtos.component';
import { FormProdutosComponent } from './form-produtos/form-produtos.component';
import { CategoryServiceService } from './services/category-service.service';
import { HttpModule } from '@angular/http';
import { FormCategoryComponent } from './form-category/form-category.component';
import { FormsModule } from '@angular/forms';
import { Http } from '@angular/http';
import { TextMaskModule } from 'angular2-text-mask';
import { ProductService } from './services/product.service';


@NgModule({
  declarations: [
    AppComponent,
    CadastroProdutosComponent,
    ConsultaProdutosComponent,
    FiltroProdutosComponent,
    ListaProdutosComponent,
    FormProdutosComponent,
    FormCategoryComponent
  ],
  imports: [
    BrowserModule , HttpModule, FormsModule , TextMaskModule
  ],
  providers: [ 
    CategoryServiceService,
    ToastService ,
    ProductService
   ],
  bootstrap: [AppComponent]
})
export class AppModule { }
