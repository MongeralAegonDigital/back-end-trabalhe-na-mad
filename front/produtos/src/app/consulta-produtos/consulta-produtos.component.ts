import { Product } from './../models/product.model';
import { Component, OnInit } from '@angular/core';
import { ProductService } from '../services/product.service';
import { ToastService } from '../services/toast.service';
import * as moment from 'moment';

@Component({
  selector: 'app-consulta-produtos',
  templateUrl: './consulta-produtos.component.html',
  styleUrls: ['./consulta-produtos.component.css']
})
export class ConsultaProdutosComponent implements OnInit {

  listaProdutos: Array<Product>
  constructor(private _produtosService : ProductService , private _toastService : ToastService) { }

  ngOnInit() {
  }

  onFilter(productFilter) {
    this.listaProdutos = null
  
    this._produtosService.filter(productFilter).subscribe( res => {
      res.forEach(element => {
          element.fabrication_date = moment(element.fabrication_date,'YYYY-MM-DD').format('DD/MM/YYYY')
      });
      this.listaProdutos = res;
      
    }, error => {
      this._toastService.showError('Erro','Produtos não encontrados');
    })

  }

}
