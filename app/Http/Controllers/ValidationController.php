<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ValidationController extends Controller
{
	public function validateForm(Request $request){
		
		$this->validate($request,[
			'nome' => 'required',
			'email' => 'required',
			'senha' => 'required|max:12',
			'telefone' => 'required|max:10',
			'data_nascimento' => 'required',
			'CPF' => 'required|unique:clients|max:11',
			'RG' => 'required|unique:clients|max:9'
			
		]);
	}
}
