export class EndPoints {
    
    static baseURL:string = 'http://localhost:8000/';
    
    public static getCategoryListEndPoint():string{
        return this.baseURL + 'api/getCategoryList';
    } 

    public static getProductListEndPoint():string{
        return this.baseURL + 'api/getProductList';
    } 

    public static deleteProductEndPoint():string{
        return this.baseURL + 'api/deleteProduct/';
    } 

    public static insertProductEndPoint():string{
        return this.baseURL + 'api/createProduct';
    } 

    public static searchEndPoint():string{
        return this.baseURL + 'api/search';
    } 
      
       
}