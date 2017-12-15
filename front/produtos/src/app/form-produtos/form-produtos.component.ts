import { Component, OnInit } from '@angular/core';
import { CategoryServiceService } from '../services/category-service.service';
import { Category } from '../models/category.model';
declare var $ : any
@Component({
  selector: 'app-form-produtos',
  templateUrl: './form-produtos.component.html',
  styleUrls: ['./form-produtos.component.css']
})
export class FormProdutosComponent implements OnInit {

  constructor(private _categoryService: CategoryServiceService) { }

  public categoryList : Array<Category>
  public categoryListAdded : Array<Category> = []
  

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

}
