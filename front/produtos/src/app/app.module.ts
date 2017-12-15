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


@NgModule({
  declarations: [
    AppComponent,
    CadastroProdutosComponent,
    ConsultaProdutosComponent,
    FiltroProdutosComponent,
    ListaProdutosComponent,
    FormProdutosComponent
  ],
  imports: [
    BrowserModule , HttpModule
  ],
  providers: [ CategoryServiceService ],
  bootstrap: [AppComponent]
})
export class AppModule { }
