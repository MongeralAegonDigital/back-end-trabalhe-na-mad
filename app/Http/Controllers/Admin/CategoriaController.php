<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Categoria;
use Session;

class CategoriaController extends Controller
{
    function __construct()
    {
        $this->title = "Categorias";

    }


    public function index()
    {
        $cat = Categoria::all();
        return view('admin.categorias-lista')
            ->with([
                'title'    => $this->title,
                'categorias' => $cat
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categorias-cadastro')
            ->with([
                'title'    => $this->title
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cat = new Categoria();

        $data = $request->except('_token');
        $data['nome'] = strtoupper($data['nome']);
        $name = $data['nome'];
        $categoriaBD = Categoria::where('nome','=', $name);

        if($categoriaBD->exists()):
            return redirect('/admin/categoria/create')
                ->withErrors("{$name} já existe no sistema")
                ->withInput();
        else:
            $cadastro = $cat->create($data);

            if($cadastro){
                Session::flash('label', "success");
                Session::flash('msg', "Categoria $name cadastrado com sucesso.");
                return $this->index();
            }else{
                Session::flash('label', "danger");
                Session::flash('msg', "Erro ao cadastrar produto $name");
                return $this->create()->withInput();
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
        $cat = Categoria::find($id);
        return view('admin.categorias-cadastro')
            ->with([
                'title'    => $this->title,
                'categoria' => $cat
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

        $data = $request->except(['_token','_method']);
        $data['nome'] = strtoupper($data['nome']);
        $cat = Categoria::find($id);
        $update = $cat->update($data);

        if($update){
            Session::flash('label', "success");
            Session::flash('msg', "Categoria atualizada com sucesso.");
            return $this->index();
        }else{
            Session::flash('label', "danger");
            Session::flash('msg', "Erro ao atualizar");
            return $this->create()->withInput();
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
        $cat = Categoria::find($id);

        $delete = $cat->delete();

        if($delete):
            Session::flash('label', "success");
            Session::flash('msg', "Usuario excluído com sucesso.");
            return $this->index();
        else:
            Session::flash('label', "danger");
            Session::flash('msg', "Erro ao tentar deletar usuario");
            return $this->index()
                ->withInput();

        endif;
    }
}
