import { Category } from './../models/category.model';
import { Product } from './../models/product.model';
import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-lista-produtos',
  templateUrl: './lista-produtos.component.html',
  styleUrls: ['./lista-produtos.component.css']
})

export class ListaProdutosComponent implements OnInit {

  @Input() listaProdutos : Array<Product> = null

  constructor() { }

  ngOnInit() {
  }

  orderBy(field , sortType) {
    console.log("ORDER "+field+" - "+sortType)
  }

}
