import { ToastService } from './../services/toast.service';
import { Component, OnInit, Input, Output, EventEmitter } from '@angular/core';
import { Form, FormBuilder, FormGroup, Validators } from '@angular/forms';
import { CategoryServiceService } from '../services/category-service.service';
import { Category } from '../models/category.model';

@Component({
  selector: 'app-form-category',
  templateUrl: './form-category.component.html',
  styleUrls: ['./form-category.component.css']
})
export class FormCategoryComponent implements OnInit {

  @Input() submitText : string = 'Salvar';
  @Input() title : string = 'Cadastro de Categoria';
  @Output() onSubmit : EventEmitter<any> = new EventEmitter()

  category : Category = new Category()

  constructor() { }

  ngOnInit() {
  }

  onsubmit(form) {
    console.log(form)
    this.onSubmit.emit(form)
  }

}
