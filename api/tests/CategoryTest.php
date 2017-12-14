<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryTest extends TestCase
{
    use DatabaseTransactions;

    public function testAdd()
    {
        $category = factory(\App\Category::class)->make();
        $category->save();
        $this->assertNotEmpty('id',$category);
    }

    public function testList()
    {
        $count = \App\Category::all()->count();
        $this->testAdd();
        $this->testAdd();
        $this->testAdd();
        $categories = \App\Category::all();
        $this->assertNotNull($categories);
        $this->assertCount($count + 3,$categories);

    }

    public function testGetById()
    {
        $category = factory(\App\Category::class)->make();
        $category->save();
        $id = $category->id;

        $categoryGet = \App\Category::find($id);

        $this->assertEquals($category->name , $categoryGet->name);
        $this->assertEquals($category->id , $categoryGet->id);

    }

    public function deleteTest()
    {
        $category = factory(\App\Category::class)->make();
        $category->save();
        $itensQtd = \App\Category::all()->count();
        $category->delete();
        $itensQtdAfterDelete = \App\Category::all()->count();

        $this->assertEquals($itensQtd -1 , $itensQtdAfterDelete);
        $this->assertNull( \App\Category::find($category->id));
    }
}
