<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use App\Error;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return Product::all();
        } catch ( \Exception $e) {
            return response(new Error($e->getCode(),'Erro ao listar produtos', $e->getMessage()),500);
        }

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $product = new Product($request->all());

        if(!$request->has('product_categories')) {
            return response(new Error('','product_categories', 'Informa ao menos uma categoria'),400);
        }

        try {
            $product->save();
            $categories = json_decode($request->get('product_categories',[]));
            foreach ($categories as $category) {
                if(isset($category->id)) {
                    $categoryObj = Category::find($category->id);
                } else {
                    $categoryObj = new Category(get_object_vars($category));
                }
                $product->categories()->save($categoryObj);
            }

            return response(Product::find($product->id),201);
        }catch (\Exception $e){
            return response(new Error($e->getCode(),'Erro ao salvar produto', $e->getMessage()),500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $product = Product::find($id);
            if($product) {
                return $product;
            } else {
                return response(new Error('','Categoria não encontrada', ''),404);
            }
        } catch (\Exception $e) {
            return response(new Error($e->getCode(),'Categoria não encontrada', $e->getMessage()),500);
        }
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        try {
            $product = Product::find($id);
            if($product) {
                $product->fill($request->all());
                $product->save();
            }
            if($request->has('product_categories')) {
                $categories = $request->get('product_categories', []);
                $product->categories()->detach();
                foreach ($categories as $category) {
                    if (isset($category['id'])) {
                        $categoryObj = Category::find($category['id']);
                    } else {
                        $categoryObj = new Category($category);
                    }
                    $product->categories()->save($categoryObj);
                }
            }

            return response($product,200);
        }catch (\Exception $e){
            return response(new Error($e->getCode(),'Erro ao salvar produto', $e->getMessage()),500);
        }
    }


    public function destroy($id)
    {
        try {
            $product = Product::find($id);
            if($product) {
                $product->delete();
                return $product;
            } else {
                return response(new Error('','Categoria não encontrada', ''),404);
            }
        } catch (\Exception $e) {
            return response(new Error($e->getCode(),'Erro ao deletar Categoria', $e->getMessage()),500);

        }
    }

    public function filter(Request $request)
    {
        try {
            $query = '';
            foreach ($request->all() as $key => $value) {
                if($query != '') {
                    $query .= ' OR ';
                }
                $query .= $key .' LIKE "%'.$value.'%" ';
            }
            $product = Product::whereRaw($query)->get();
            if($product) {
                return $product;
            } else {
                return response(new Error('','Categoria não encontrada para os filtros informados', ''),404);
            }
        } catch (\Exception $e) {
            return response(new Error($e->getCode(),'Categoria não encontrada', $e->getMessage()),500);
        }
    }

}
