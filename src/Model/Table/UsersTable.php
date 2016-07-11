<?php
namespace App\Model\Table;


use Cake\ORM\Table;
use Cake\Validation\Validator;

class UsersTable extends Table {

	 public function initialize(array $config) {
	 	parent::initialize($config);

	 	$this->table('users');
        $this->displayField('name');
        $this->primaryKey('id');


        $this->hasOne('Addresses', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasOne('Profiles', [
            'foreignKey' => 'user_id'
        ]);
	 }


	 public function validationDefault(Validator $validator) {
        
        $validator
             ->requirePresence('name', 'create')
             ->notEmpty('name');
         
         $validator
             ->requirePresence('password', 'create')
             ->notEmpty('password');

        $validator
             ->add('email', 'valid', ['rule' => 'email'])
             ->requirePresence('email', 'create')
             ->notEmpty('email');

        $validator
             ->add('birthdate', 'valid', ['rule' => 'date'])
             ->requirePresence('birthdate', 'create')
             ->notEmpty('birthdate');

         $validator
             ->requirePresence('cpf', 'create')
             ->notEmpty('cpf')
             ->add('cpf', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        return $validator;
    }


}
