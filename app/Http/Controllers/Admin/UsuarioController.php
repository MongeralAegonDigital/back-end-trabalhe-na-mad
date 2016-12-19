<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use App\Models\User;
use Session;
use Image;
use File;
use DB;
use Config;
use Auth;
use Illuminate\Support\Facades\Response;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        if(Auth::user()->level < 2):
            $usuarios = User::all();
            return view('admin.usuarios-lista')
                ->with('usuarios', $usuarios);
        endif;
        /*
               try{
                   $response = User::all();
                   $statusCode = 200;
                   return Respo     nse::json($response, $statusCode);

               }catch(Exception $e){
                   $response = [
                       "error" => "Nao Usuarios não existem";
                   ];
                   $statusCode = 404;
               }finally{
                   return Response::json($response, $statusCode);
               }
               */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.usuarios-cadastro');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioRequest $request)
    {
        $user = $request->except('password_confirmation');

        $usuario['name'] = strtoupper($user['name']);
        $user['password'] = bcrypt($user['password']);
        $email = $user['email'];

        $userBD = User::where('email','=', $email);

        if($userBD->exists()):
            $name = $userBD->get()->first()->name;
            return redirect('/admin/usuarios/create')
                ->withInput()
                ->withErrors("Usuário $request->email já existe para o usuario $name");
        else:
            $cadastro = User::create($user);
            if($cadastro){
                Session::flash('label', "success");
                Session::flash('msg', "Usuário $request->nome cadastrado com sucesso.");
                return redirect('/admin/usuarios/');
            }else{
                Session::flash('label', "danger");
                Session::flash('msg', "Erro ao cadastrar Usuario $request->nome");
                return redirect('/admin/usuarios/create')->withInput();
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
        $user = User::find($id);
        $webmaster = Config::get('info.email_webmaster');
        if($user->email == $webmaster && Auth::user()->email !== $webmaster):
            Session::flash('label', "danger");
            Session::flash('msg', "Não é possível editar o usuario webmaster");
            return redirect('/admin/usuarios/');
        else:
            return view('admin.usuarios-cadastro')->with('usuarios', $user);
        endif;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioRequest $request, $id)
    {
        $user = User::find($id);

        $dados = $request->all();

        $dados['name'] = strtoupper($dados['name']);
        $dados['password'] = bcrypt($dados['password']);

        $update = $user->update($dados);

        if($update){
            Session::flash('label', "success");
            Session::flash('msg', "Usuário ". $dados['name']." atualizado com sucesso.");
            return redirect('/admin/usuarios/');
        }else{
            Session::flash('label', "danger");
            Session::flash('msg', "Erro ao atualizar Usuario ");
            return redirect('/admin/usuarios/create')->withInput();
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
        $countUser = (int) User::count();

        if($countUser < 2):
            Session::flash('label', "danger");
            Session::flash('msg', "Não é possível excluir o ultimo usuario do sistema.");
            return redirect('admin/usuarios');
        else:
            $usuario = User::find($id);
            $delete = $usuario->delete();



            if($delete):
                Session::flash('label', "success");
                Session::flash('msg', "Usuario excluído com sucesso.");


                return $this->index();

            else:
                Session::flash('label', "danger");
                Session::flash('msg', "Erro ao tentar deletar usuario");
                return redirect('admin/cursos')
                    ->withInput();

            endif;
        endif;
    }
}
