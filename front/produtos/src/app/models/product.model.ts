import { Category } from './category.model';
export class Product {
    public id : number
    public name : string
    public fabrication_date : Date
    public size : number
    public lenght : number
    public weight : number
    public categories : Array<Category>
}

