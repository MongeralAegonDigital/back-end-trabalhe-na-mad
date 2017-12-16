<?php

namespace App\Http\Controllers;

use App\Category;
use App\Error;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * CategoryController constructor.
     */
    public function __construct()
    {
        $this->middleware('cors');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try {
            return Category::all();
        } catch ( \Exception $e) {
            return response(new Error($e->getCode(),'Erro ao listar categorias', $e->getMessage()),500);
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
        $request->headers->set('Content-Type','Application/json');
        $category = new Category($request->all());

        try {
            $category->save();
            return response($category,201);
        }catch (\Exception $e){
            return response(new Error($e->getCode(),'Erro ao salvar categoria', $e->getMessage()),500);
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
            $category = Category::find($id);
            if($category) {
                return $category;
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
            $category = Category::find($id);
            if($category) {
                $category->fill($request->all());
                $category->save();
                return $category;
            } else {
                return response(new Error('','Categoria não encontrada', ''),404);
            }
        } catch (\Exception $e) {
            return response(new Error($e->getCode(),'Erro ao editar Categoria', $e->getMessage()),500);
        }
    }


    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            if($category) {
                $category->delete();
                return $category;
            } else {
                return response(new Error('','Categoria não encontrada', ''),404);
            }
        } catch (\Exception $e) {
            return response(new Error($e->getCode(),'Erro ao deletar Categoria', $e->getMessage()),500);

        }
    }
}
