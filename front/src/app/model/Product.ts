export class Product {
 
    constructor(){

    }
    
    productName: string;
    productManufacture: string;
    productSize:number;
    productHeight:number;
    productWeight:number;
    productCategoryId:number;


    translateFilter(filter:any){

      if(filter.productName){
        this.productName = filter.productName;
      }

      if(filter.productCategoryId){
        this.productCategoryId = parseFloat(filter.productCategoryId);
      }

      if(filter.productManufacture){
        this.productManufacture = filter.productManufacture;
      }

      if(filter.productSize){
        this.productSize = parseFloat(filter.productSize);
      }

      if(filter.productHeight){
        this.productHeight = parseFloat(filter.productHeight);
      }

      if(filter.productWeight){
        this.productWeight = parseFloat(filter.productWeight);
      }

      return this;

    }
  }