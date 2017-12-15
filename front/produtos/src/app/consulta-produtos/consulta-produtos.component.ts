import { Product } from './../models/product.model';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-consulta-produtos',
  templateUrl: './consulta-produtos.component.html',
  styleUrls: ['./consulta-produtos.component.css']
})
export class ConsultaProdutosComponent implements OnInit {

  listaProdutos: Array<Product>
  constructor() { }

  ngOnInit() {
  }

  onFilter(productFilter) {
    this.listaProdutos = null
    //faz busca
    this.listaProdutos = []

  }

}
