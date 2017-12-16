import { ToastService } from './../services/toast.service';
import { Component, OnInit, ViewChild } from '@angular/core';
import { Category } from '../models/category.model';
import { CategoryServiceService } from '../services/category-service.service';
import { FormProdutosComponent } from '../form-produtos/form-produtos.component';
import { ProductService } from '../services/product.service';

@Component({
  selector: 'app-cadastro-produtos',
  templateUrl: './cadastro-produtos.component.html',
  styleUrls: ['./cadastro-produtos.component.css']
})
export class CadastroProdutosComponent implements OnInit {

  @ViewChild('formProdutos') formProdutos
  constructor(private _toast : ToastService , private _categoryService: CategoryServiceService , private _productService : ProductService) { }

  ngOnInit() {
  }

  saveProduct(product) {
    this._productService.save(product).subscribe(res => {
      this._toast.showSuccess('Sucesso','Produto Salvo com sucesso')
    }, error => {
      this._toast.showError('Erro','Produto não foi salvo')
    })
  }
  saveCategory(category) {
    this._categoryService.save(category).subscribe( res => {
      this._toast.showSuccess('Sucesso','Categoria Salva com sucesso')
    } , error => {
      this._toast.showError('Erro','Erro ao salvar categoria')
    }, () => {
      this.formProdutos.loadCategories()
    })
  }

}
