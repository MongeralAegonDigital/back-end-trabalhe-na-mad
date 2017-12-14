<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductIntegrationTest extends TestCase
{
    use DatabaseTransactions;
    public function testlistAll()
    {
        $this->get('api/products')
            ->seeStatusCode(200)
            ->seeJsonStructure([]);
    }

    public function testAddProductNoCategory()
    {
        $products = factory(\App\Product::class)->make()->toArray() ;

        $this->post('api/products', $products)
            ->seeStatusCode(400);
    }
    public function testAddProduct()
    {
        $products = factory(\App\Product::class)->make()->toArray();
        $category = factory(\App\Category::class)->make()->toArray();

        $products['product_categories'] = json_encode([$category]);

        //dd($products);
        $this->post('api/products', $products)
            ->seeStatusCode(201);
    }

    public function testFindOne() {
        $products = factory(\App\Product::class)->make() ;
        $products->save();

        $this->get('api/products/' . $products->id)
            ->seeStatusCode(200)
            ->seeJsonContains(['id'=>$products->id]);
    }

    public function testUpdate() {
        $products = factory(\App\Product::class)->make() ;
        $products->save();

        $this->put('api/products/' . $products->id , ['name' => 'update'])
            ->seeStatusCode(200)
            ->seeJsonContains(['id'=>$products->id , 'name' => 'update' ]);
    }

    public function testDelete() {
        $products = factory(\App\Product::class)->make() ;
        $products->save();

        $this->delete('api/products/' . $products->id)
            ->seeStatusCode(200)
            ->seeJsonContains(['id'=>$products->id]);
    }

}
