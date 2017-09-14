<?php

namespace App\Util;

class Config{
    
    protected $INSERT_PRODUCT; 
    protected $GET_CATEGORY_LIST;
    protected $GET_PRODUCT_LIST;

    public function __construct()
    {
        $this->INSERT_PRODUCT = 'insertProduct';
        $this->GET_CATEGORY_LIST = 'getCategoryList';
        $this->GET_PRODUCT_LIST = 'getProductList';
    }

    public function getInsertProductCommand(){
        return $this->INSERT_PRODUCT;
    }

    public function getCategoryListCommand(){
        return $this->GET_CATEGORY_LIST;
    }

    public function getProductListCommand(){
        return $this->GET_PRODUCT_LIST;
    }

}
