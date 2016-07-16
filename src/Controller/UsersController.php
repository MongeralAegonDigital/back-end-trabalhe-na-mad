<?php
namespace App\Controller;

use Cake\ORM\TableRegistry;
use App\Controller\AppController;
use Cake\Network\Exception\ForbiddenException;
use Cake\Network\Email\Email;

class UsersController extends AppController{

    public function index(){

    $UsersTable = TableRegistry::get('users');

        $user = $UsersTable->newEntity();

        $this->set('user',$user);
    }

	 public function add() {

        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->email($user);
              $return =true;
            } else {
               throw new ForbiddenException('Este usuario não pode ser salvo',404);
            }
        }

        $this->set(compact('user','return'));
        $this->set('_serialize', ['user','return']);
    }

    public function email ($user){
       
        $email = new Email('gmail');
        $email->to('testemong@gmail.com');
        $email->subject('Cadastro feito pelo site');
        $msg = "Cadastro feito pelo site 
                        Nome: {$user['name']}
                        E-mail: {$user['email']} 
                        CPF: {$user['cpf']} 
                        Obrigado pelo cadastro
                        ";
        if($email->send($msg)){
            $this->Flash->set('Cadastro enviado com sucesso',['element' => 'success']);
            $this->redirect(array('controller' => 'Users', 'action' => 'index'));
            return;
        } else {
            $this->Flash->set('Falha ao envia o email',['element' => 'error']);
        }
    }
    
}
