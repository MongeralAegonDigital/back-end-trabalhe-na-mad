<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class ProfilesTable extends Table {

	 public function initialize(array $config) {
	 
        //parent::initialize($config);

        $this->table('profiles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
	 }


	 public function validationDefault(Validator $validator) {
        
          $validator
             ->requirePresence('rg', 'create')
             ->notEmpty('rg');

         $validator
             ->add('shipping_date', 'valid', ['rule' => 'date'])
             ->requirePresence('shipping_date', 'create')
             ->notEmpty('shipping_date');

         $validator
             ->requirePresence('dispatcher_organ', 'create')
             ->notEmpty('dispatcher_organ');

         $validator
             ->requirePresence('marital_status', 'create')
             ->notEmpty('marital_status');

         $validator
             ->requirePresence('category', 'create')
             ->notEmpty('category');

        $validator
            ->allowEmpty('company_work');

         $validator
             ->requirePresence('profession', 'create')
             ->notEmpty('profession');

         $validator
             ->add('gross_income', 'valid', ['rule' => 'decimal'])
             ->requirePresence('gross_income', 'create')
             ->notEmpty('gross_income');



        return $validator;
    }


}
