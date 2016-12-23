<?php

namespace App\Http\Controllers\Portal;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;
use Mail;
use Session;

class ControllerContato extends Controller {

    public function FormContato(Request $request) {
        $contato_nome = \Config::get('info.contato_nome');
        $contato_email = \Config::get('info.contato_email');

        $data = $request->all();
        $rules = [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required',
            'msg' => 'required|min:5'
        ];
        $messages = [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'telefone.required' => 'O telefone é Obrigatório',
            'msg.required' => 'A mensagem de contato é obrigatória.',
            'msg.min' => 'A mensagem de contato deve conter ao menos :min caracteres.'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withinput();
        } else {

            Mail::send('portal/send', $data, function ($message) use(&$contato_email, &$contato_nome) {
                $message->to($contato_email, $contato_nome);
                $message->subject('Email site');
            });

            return back()->with('send', "Enviado com sucesso !");
        }
    }

    /**
     * ENVIO DE PRE INSCRIÇÃO PARA OS CURSOS
    ######################################################################*/
    public function PreInscricao(Request $request){


        $contato_nome = \Config::get('info.contato_nome');
        $contato_email = \Config::get('info.contato_email');

        $data = $request->all();

        $rules = [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required|alpha_num',
            'curso' => 'required'
        ];
        $messages = [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'telefone.required' => 'O telefone é Obrigatório',
            'telefone.alpha_num' => 'Favor informar somente numeros'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withinput();
        } else {

            Mail::send('portal/preinscricao', $data, function ($message) use(&$contato_email, &$contato_nome) {
                $message->to($contato_email, $contato_nome);
                $message->subject('Email site');
            });
            return back()->with('send', "Enviado com sucesso !");
        }
    }

    /**
     * ENVIO DE PRE INSCRIÇÃO PARA OS CURSOS
    ######################################################################*/
    public function inscricaocurso(Request $request){

        $contato_nome = \Config::get('info.contato_nome');
        $contato_email = \Config::get('info.contato_email');

        $data = $request->all();

        $rules = [
            'nome' => 'required|min:3',
            'email' => 'required|email',
            'telefone' => 'required',
        ];
        $messages = [
            'nome.required' => 'O nome é obrigatório.',
            'nome.min' => 'O campo nome deve ter pelo menos :min caracteres.',
            'telefone.required' => 'O telefone é Obrigatório',
            'telefone.alpha_num' => 'Favor informar somente numeros'
        ];

        $validator = Validator::make($data, $rules, $messages);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withinput();
        } else {
            $mail = Mail::send('portal/preinscricaocurso', $data, function ($message) use(&$contato_email, &$contato_nome) {
                $message->to($contato_email, $contato_nome);
                $message->subject('Pre Matricula - Site');
            });
            $id = $data['id'];
            if($mail):
                Session::flash('msg', "Turma Atualizada com sucesso.");
                return redirect("cursos/$id#preinscricao");
            else:
                return "erro ao enviar";
            endif;
        }
    }

}
