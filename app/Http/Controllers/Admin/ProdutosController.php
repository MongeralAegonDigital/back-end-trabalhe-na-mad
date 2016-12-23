<?php

namespace App\Http\Controllers\Admin;

use App\Models\Categoria;
use App\Models\CategoriaProduto;
use App\Models\Produtos;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProdutosRequest;
use Image;
use Session;
use File;
use DB;
use Config;
use Auth;
use Carbon;


class ProdutosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->title = "Produtos";

    }


    public function index()
    {
        $produtos = Produtos::all();
                return view('admin.produtos-lista')
            ->with([
                'title'         => $this->title,
                'produtos'      => $produtos
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('admin.produtos-cadastro')
            ->with([
                'title'    => $this->title,
                'categorias'    => $categorias
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdutosRequest $request)
    {
        $data = $request->except(['_token', 'categoria']);
        $produtos = new Produtos();
        $data['fabricacao'] = date('Y-m-d', strtotime($data['fabricacao']));
        $name = $data['name'];
        $produtosBD = Produtos::where('name','=', $name);

        $categoria =  $request['categoria'];


        if($produtosBD->exists()):
            return $this->create()
                ->withErrors("O nome {$data['name']} já existe no sistema")
                ->withInput();
        else:
            DB::beginTransaction();
            $dataCategorias = $request['categoria'];
            $cadastro  = $produtos->create($data);


            $cats  = [];
            for ($cat=0;$cat<count($dataCategorias);$cat++){
                $cats = [
                    'produto'=> $cadastro['id'],
                    'categoria'  => $dataCategorias[$cat],
                ];
                $cadCategoriaProdutos = CategoriaProduto::create($cats)  ? true : false;
            }

            if($cadCategoriaProdutos){
                DB::commit();
                if($cadastro){
                    Session::flash('label', "success");
                    Session::flash('msg', "Produto cadastrado com sucesso.");
                    return $this->index();
                }else{
                    Session::flash('label', "danger");
                    Session::flash('msg', "Erro ao cadastrar produto $name");
                    return $this->create()->withInput();
                }
            }else{
                DB::rollBack();
            }

        endif;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod = Produtos::find($id);
        $dateCreate = date_create( $prod->fabricacao);
        $prod->fabricacao = date_format($dateCreate, "d/m/Y");

        $categoriasAll = $prod->notCategoria($id);
        $catsProduto = $prod->categoria;

        return view('admin.produtos-cadastro')
            ->with([
                'title'             => $this->title,
                'categorias'        => $categoriasAll,
                'categorias_ativas' => $catsProduto,
                'produtos'          => $prod
            ]);

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
        //converter em inteiro
        $id = (int) $id;

        //recuperando todos os dados
        $data = $request->except(['_token','_method', 'categoria']);

        $produtos = Produtos::find($id);

        $data['fabricacao'] = date('Y-m-d', strtotime($data['fabricacao']));

        $name = $data['name'];

        DB::beginTransaction();
        $dataCategorias = $request['categoria'];
        $cadastro  = $produtos->update($data);


        $del = CategoriaProduto::where('produto',$id)->delete();
        $cats  = [];
        for ($cat=0;$cat<count($dataCategorias);$cat++){
            $cats = [
                'produto'=> $id,
                'categoria'  => $dataCategorias[$cat],
            ];
            $cadCategoriaProdutos = CategoriaProduto::create($cats)  ? true : false;
        }

        if($cadCategoriaProdutos){
            DB::commit();
            if($cadastro){
                Session::flash('label', "success");
                Session::flash('msg', "Produto atualizado com sucesso.");
                return $this->index();
            }else{
                Session::flash('label', "danger");
                Session::flash('msg', "Erro ao atualizado produto $name");
                return $this->create()->withInput();
            }
        }else{
            DB::rollBack();
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        $produto = Produtos::find($id);

        $delete = $produto->delete();

        if($delete):
            Session::flash('label', "success");
            Session::flash('msg', "produto deletado com sucesso.");
            DB::commit();
        else:
            Session::flash('label', "danger");
            Session::flash('msg', "Erro ao tentar deletar produto");
            DB::rollBack();
        endif;
        return $this->index();

    }



}
