import { Product } from './../models/product.model';
import { ToastService } from './../services/toast.service';
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Form, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CategoryServiceService } from '../services/category-service.service';
import { Category } from '../models/category.model';
import * as _ from 'lodash';
import Inputmask from "inputmask";

declare var $ : any
@Component({
  selector: 'app-form-produtos',
  templateUrl: './form-produtos.component.html',
  styleUrls: ['./form-produtos.component.css']
})
export class FormProdutosComponent implements OnInit {

  constructor(private _categoryService: CategoryServiceService , private _toastService: ToastService) { }

  public categoryList : Array<Category>
  public categoryListAdded : Array<Category> = []

  @Input() submitText : string = 'Salvar';
  @Input() createCategoryEnabled : boolean = true;
  @Input() title : string = 'Cadastro de produto';
  @Output() onSubmit : EventEmitter<any> = new EventEmitter();
  @Output() onSubmitCategory : EventEmitter<any> = new EventEmitter();


  product : Product = new Product();
  loadingCategories : boolean = null;
  
  ngOnInit() {
    this.loadCategories()
    
  }

  ngAfterViewInit() {
    $('.datepicker').datepicker({
      'language':'pt-BR',
      'format':'dd/mm/yyyy'
    });
    $('.numeric').inputmask({ 
      regex: "^[0-9]{1,5}([,.][0-9]{1,5})?$"
    });
  }
    
  addCategory(categoryId) {
    let categoryAdded = this.categoryList.filter(item => item.id == categoryId)[0]
    if(! _.includes(this.categoryListAdded,categoryAdded)) {
      this.categoryListAdded.push(categoryAdded)
    }
  }
  removeCategory( category ) {
    if( _.includes(this.categoryListAdded,category)) {
      let index = this.categoryListAdded.indexOf(category)
      this.categoryListAdded.splice(index , 1)
    }
  }

  onsubmit(product : Product) {
    this.product.categories = this.categoryListAdded
    if( this.productIsComplete(product)) {
      this.onSubmit.emit(product)
    } else {
      this._toastService.showError('Erro','Preencha todos os campos.')
    }
  }

  loadCategories(){
    this.loadingCategories = true
    this._categoryService.listAll().subscribe(res => {
      this.categoryList = res
    } , error => {
      this.categoryList = []
    } , () => {
      this.loadingCategories = null
    })
  }

  submitCategory(category) {
    this.onSubmitCategory.emit(category)
  }

  productIsComplete( product : Product ) {
    if( product.name != '' &&
        product.fabrication_date != null &&
        product.size != null &&
        product.lenght != null &&
        product.weight != null &&
        product.categories != null &&
        product.categories.length > 0
    ) {
      return true;
    }
    return false;
  }

}
