import { Component, OnInit, Output, EventEmitter } from '@angular/core';

@Component({
  selector: 'app-filtro-produtos',
  templateUrl: './filtro-produtos.component.html',
  styleUrls: ['./filtro-produtos.component.css']
})
export class FiltroProdutosComponent implements OnInit {

  @Output() onFilter : EventEmitter<any>  = new EventEmitter();
  constructor() { }

  ngOnInit() {
  }

  filterProducts(productFilter) {
    this.onFilter.emit(productFilter)
  }

}
