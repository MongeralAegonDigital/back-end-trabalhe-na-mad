<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class CategoryIntegrationTest extends TestCase
{
    use DatabaseTransactions;
    public function testlistAll()
    {
        $this->get('api/categories')
            ->seeStatusCode(200)
            ->seeJsonStructure([]);
    }

    public function testAddCategory()
    {
        $category = factory(\App\Category::class)->make()->toArray() ;

        $this->post('api/categories', $category)
                ->seeStatusCode(201);
    }

    public function testFindOne() {
        $category = factory(\App\Category::class)->make() ;
        $category->save();

        $this->get('api/categories/' . $category->id)
                ->seeStatusCode(200)
                ->seeJsonContains(['id'=>$category->id]);
    }

    public function testUpdate() {
        $category = factory(\App\Category::class)->make() ;
        $category->save();

        $this->put('api/categories/' . $category->id , ['name' => 'update'])
            ->seeStatusCode(200)
            ->seeJsonContains(['id'=>$category->id , 'name' => 'update' ]);
    }

    public function testDelete() {
        $category = factory(\App\Category::class)->make() ;
        $category->save();

        $this->delete('api/categories/' . $category->id)
            ->seeStatusCode(200)
            ->seeJsonContains(['id'=>$category->id]);
    }
}
