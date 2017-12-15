import { ToastService } from './../services/toast.service';
import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-cadastro-produtos',
  templateUrl: './cadastro-produtos.component.html',
  styleUrls: ['./cadastro-produtos.component.css']
})
export class CadastroProdutosComponent implements OnInit {

  constructor(private _toast : ToastService) { }

  ngOnInit() {
  }

  saveProduct(product) {
    this._toast.showToast('Sucesso','Produto Salvo com sucesso')
  }
  saveCategory(category) {
    this._toast.showToast('Sucesso','Categoria Salva com sucesso')
  }

}
