import { Product } from './../models/product.model';
import { ToastService } from './../services/toast.service';
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Form, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CategoryServiceService } from '../services/category-service.service';
import { Category } from '../models/category.model';
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
  
  ngOnInit() {
    this._categoryService.listAll().subscribe(res => {
      this.categoryList = res
    } , error => {
      this.categoryList = []
    })
  }

  ngAfterViewInit() {
    $('.datepicker').datepicker({
      'language':'pt-BR',
      'format':'dd/mm/yyyy'
    })
  }

  addCategory(categoryId) {
    let categoryAdded = this.categoryList.find( item => item.id == categoryId )[0]
    console.log(categoryAdded)
    this.categoryList.slice(this.categoryList.indexOf(categoryAdded),1 )
    this.categoryListAdded.push(categoryAdded)
  }

  onsubmit(form) {
    console.log(form)
    this.onSubmit.emit(form)
  }

  submitCategory(category) {
    this.onSubmitCategory.emit(category)
  }


}
