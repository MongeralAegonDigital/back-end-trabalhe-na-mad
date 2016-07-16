<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class AddressesTable extends Table {

	 public function initialize(array $config) {
	 
        //parent::initialize($config);

        $this->table('addresses');
        $this->displayField('street');
        $this->primaryKey('id');


        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
	 }


	 public function validationDefault(Validator $validator) {
        
         $validator
            ->requirePresence('postcode', 'create')
            ->notEmpty('postcode');

        $validator
            ->requirePresence('street', 'create')
            ->notEmpty('street');

        $validator
            ->requirePresence('number', 'create')
            ->notEmpty('number');

        $validator
            ->requirePresence('neighborhood', 'create')
            ->notEmpty('neighborhood');

        $validator
            ->requirePresence('city', 'create')
            ->notEmpty('city');

        $validator
            ->requirePresence('state', 'create')
            ->notEmpty('state');

        $validator
            ->allowEmpty('complement');

        $validator
            ->add('id', 'valid', ['rule' => 'numeric'])
            ->allowEmpty('id', 'create');


        return $validator;
    }


}
