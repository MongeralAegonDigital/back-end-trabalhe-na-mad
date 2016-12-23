<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use \App\Http\Controllers\Controller;
use Request;
use Auth;
use \Session;
use \Validator;

class AdminController extends Controller {

    public function __construct() {
        $this->middleware('Autorizador', ['except' => ['login']]);
    }

    public function formLogin() {
        if (Auth::check()) {
            return redirect('/admin');
        }
        return view('admin.login');
    }

    public function login() {
        $input = Request::all();
        $rules = [
            'email' => 'required|email',
            'password' => 'required|min:5'
        ];
        $messages = [
            'email.required' => "O campo e-mail é obrigatório",
            'email.email' => "Favor informar um e-mail válido",
            'password.required' => 'O campo Senha é obrigatório',
            'password.min' => 'A senha tem que conter no minimo :min caracteres'
        ];

        $validator = validator($input, $rules, $messages);

        if ($validator->fails()):
            return redirect('login')
                            ->withErrors($validator)
                            ->withInput();

        endif;
        $credenciais = Request::only('email', 'password');

        if (Auth::attempt($credenciais)):
            return redirect('/admin');
        else:

            return redirect('login')
                            ->withInput()
                            ->withErrors(["errors" => "Login inválido."]);

        endif;
    }

    public function logout() {
        Auth::logout();
        Session::flush();
        return redirect('/login');
    }

    
}
