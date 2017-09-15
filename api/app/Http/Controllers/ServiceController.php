<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use App\Http\Requests;
use App\Products;
use App\Categories;
use App\Util\Config;

use EllipseSynergie\ApiResponse\Contracts\Response;
use App\Transformer\ProductTransformer;
use App\Transformer\CategoryTransformer;


class ServiceController extends Controller
{
    protected $response;
    
    public function __construct(Response $response)
    {
        $this->response = $response;
    }

    public function createProduct(Request $request){
       try {
            $product = new Products;
            
            $product->productName = $request->input('productName');
            $product->productManufacture = $request->input('productManufacture');
            $product->productSize = $request->input('productSize');
            $product->productHeight = $request->input('productHeight');
            $product->productWeight = $request->input('productWeight');
            $product->productCategoryId = $request->input('productCategoryId');
        
            if($product->save()) {
                return $this->response->withItem($product, new ProductTransformer());
            } else {
                return $this->response->errorInternalError('Could not created an product');
            }

      }catch(Throwable $e){
        return $this->response->errorInternalError('Error on insert product ' + $e);
      }
    }

    public function getCategoryList(){   
        try {
           $categoryList = Categories::paginate(15);
           return $this->response->withPaginator($categoryList, new CategoryTransformer());
         }catch(Throwable $e){
            return $this->response->errorInternalError('Error on get category list ' + $e);
         }
    }

    public function getProductList(){
       try {
          $productList = Products::paginate(1000);
          return $this->response->withPaginator($productList, new ProductTransformer());
       }catch(Throwable $e){
          return $this->response->errorInternalError('Error on get product list ' + $e);
       }
    }

    public function deleteProduct($productId){
       try{
          $product = Products::find($productId);
          if (!$product) {
             return $this->response->errorNotFound('Product Not Found');
          }
 
          if($product->delete()) {
            return $this->response->withItem($product, new ProductTransformer());
          } else {
            return $this->response->errorInternalError('Could not delete a product.');
          }
      }catch(Throwable $e){
        return $this->response->errorInternalError('Could not delete a product ' + $e);
      }
    }

    public function search(Request $request) {
         
        $categoryId;
        $full = false;

        $query = Products::where('productCategoryId','<>',0);
        
        if ($request->has('productName')){
            $query->where('productName', 'LIKE', '%' . $request->input('productName') . '%');
        }

        if ($request->has('productManufacture')){
            $query->where('productManufacture', '=', $request->input('productManufacture'));
        }

        if ($request->has('productSize')){
            $query->where('productSize', '=', $request->input('productSize'));
        }

        if ($request->has('productHeight')){
            $query->where('productHeight', '=', $request->input('productHeight'));
        }

        if ($request->has('productWeight')){
            $query->where('productWeight', '=', $request->input('productWeight'));
        }

        if ($request->has('productCategoryId')){
            $query->where('productCategoryId', '=',$request->input('productCategoryId'));
        }

        return $query->get();
    }


}
