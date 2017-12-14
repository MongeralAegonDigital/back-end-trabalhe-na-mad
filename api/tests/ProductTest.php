<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProductTest extends TestCase
{
    //use DatabaseTransactions;

    public function testAdd()
    {
        $product = factory(\App\Product::class)->make();
        $product->save();
        $this->assertNotEmpty('id',$product);
    }

    public function testList()
    {
        $count = \App\Product::all()->count();
        $this->testAdd();
        $this->testAdd();
        $this->testAdd();
        $products = \App\Product::all();
        $this->assertNotNull($products);
        $this->assertCount($count + 3,$products);

    }

    public function testGetById()
    {
        $product = factory(\App\Product::class)->make();
        $product->save();
        $id = $product->id;

        $productGet = \App\Product::find($id);

        $this->assertEquals($product->name , $productGet->name);
        $this->assertEquals($product->id , $productGet->id);

    }

    public function deleteTest()
    {
        $product = factory(\App\Product::class)->make();
        $product->save();
        $itensQtd = \App\Product::all()->count();
        $product->delete();
        $itensQtdAfterDelete = \App\Product::all()->count();

        $this->assertEquals($itensQtd -1 , $itensQtdAfterDelete);
        $this->assertNull( \App\Product::find($product->id));
    }

}
