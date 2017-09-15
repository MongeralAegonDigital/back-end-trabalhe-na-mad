<?php namespace App\Transformer;
 
use League\Fractal\TransformerAbstract;
 
class CategoryTransformer extends TransformerAbstract {
 
    public function transform($category) {
        return [
            'id' => $category->id,
            'categoryName' => $category->categoryName
        ];
    }
 }