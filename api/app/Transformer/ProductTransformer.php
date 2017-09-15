<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class ProductTransformer extends TransformerAbstract {
 
    public function transform($product) {
        return [
            'id' => $product->id,
            'productName' => $product->productName,
            'productManufacture' => $product->productManufacture,
            'productSize' => $product->productSize,
            'productHeight' => $product->productHeight,
            'productWeight' => $product->productWeight,
            'productCategoryId' => $product->productCategoryId
        ];
    }
 }
