import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';


import { AppComponent } from './app.component';
import { CadastroProdutosComponent } from './cadastro-produtos/cadastro-produtos.component';
import { ConsultaProdutosComponent } from './consulta-produtos/consulta-produtos.component';
import { FiltroProdutosComponent } from './filtro-produtos/filtro-produtos.component';
import { ListaProdutosComponent } from './lista-produtos/lista-produtos.component';


@NgModule({
  declarations: [
    AppComponent,
    CadastroProdutosComponent,
    ConsultaProdutosComponent,
    FiltroProdutosComponent,
    ListaProdutosComponent
  ],
  imports: [
    BrowserModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
