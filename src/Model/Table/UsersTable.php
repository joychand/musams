<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

/**
 * Users Model
 *
 * @property \App\Model\Table\RolesTable|\Cake\ORM\Association\BelongsTo $Roles
 * @property \App\Model\Table\DepartmentsTable|\Cake\ORM\Association\BelongsTo $Departments
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null, $options = [])
 */
class UsersTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('user_id');
        $this->setPrimaryKey('user_id');

        $this->belongsTo('user_roles', [
            'foreignKey' => 'role_id'
        ]);
        $this->belongsTo('Departments', [
            'foreignKey' => 'department_id'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('user_id')
            ->allowEmpty('user_id', 'create');

        $validator
            ->scalar('user_name')
            ->maxLength('user_name', 150)
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name');

        $validator
            ->scalar('user_full_name')
            ->maxLength('user_full_name', 150)
            ->allowEmpty('user_full_name');

            $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->notEmpty('password','Password cannot be blank')
            ->add('password',[
                'compareWith'=>
                [
                'rule'=>['compareWith','confirm_passwd'],
                 'message'=>'Password and Confirm Password do not match'
                 ]
            ]);    
        $validator
            ->notEmpty('confirm_passwd','Confirm Password cannot be blank')
            ->add('confirm_passwd',[
                'compareWith'=>
                [
                'rule'=>['compareWith','password'],
                 'message'=>'Password and Confirm Password do not match'
                 ]
            ]);    
        $validator
            ->email('email')
            ->allowEmpty('email');

        $validator
            ->scalar('mobile')
            ->maxLength('mobile', 10)
            ->allowEmpty('mobile');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
       // $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['role_id'], 'user_roles'));
        $rules->add($rules->existsIn(['department_id'], 'Departments'));

        return $rules;
    }

    public function findAuth(\Cake\ORM\Query $query, array $options)
    {
        $query
            ->select([ 'user_name','user_full_name', 'password','role_id','user_id','department_id']);
            

        return $query;
    }

public function userExist($user_name=null)
{
    $recordexist=$this->exists(['user_name'=>$user_name]);
    return $recordexist;
}
}
