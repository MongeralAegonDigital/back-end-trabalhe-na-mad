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
    this.listaProdutos = []

    let product = new Product()
    product.name = 'Produto 1'
    product.fabrication_date = new Date()
    product.size = 20.0
    product.lenght = 20.0
    product.weight = 20.0
    product.categories = []
    let category = new Category()
    category.name = 'Categoria 1'
    product.categories.push(category)
    this.listaProdutos.push(product) 

    product = new Product()
    product.name = 'Produto 2'
    product.fabrication_date = new Date()
    product.size = 20.0
    product.lenght = 20.0
    product.weight = 20.0
    product.categories = []
    category = new Category()
    category.name = 'Categoria 1'
    product.categories.push(category)
    this.listaProdutos.push(product) 

    product = new Product()
    product.name = 'Produto 3'
    product.fabrication_date = new Date()
    product.size = 20.0
    product.lenght = 20.0
    product.weight = 20.0
    product.categories = []
    category = new Category()
    category.name = 'Categoria 1'
    product.categories.push(category)
    category = new Category()
    category.name = 'Categoria 2'
    product.categories.push(category)

    this.listaProdutos.push(product) 
  }

  orderBy(field , sortType) {
    console.log("ORDER "+field+" - "+sortType)
  }

}
