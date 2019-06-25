<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Teams Model
 *
 * @method \App\Model\Entity\Team get($primaryKey, $options = [])
 * @method \App\Model\Entity\Team newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Team[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Team|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Team|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Team patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Team[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Team findOrCreate($search, callable $callback = null, $options = [])
 */
class TeamsTable extends Table
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

        $this->setTable('teams');
        $this->setDisplayField('team_name');
        $this->setPrimaryKey(['team_name']);
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
            ->scalar('team_name')
            ->maxLength('team_name', 50)
            ->requirePresence('team_name', 'create')
            ->notEmpty('team_name', 'create');

        $validator
            ->scalar('game')
            ->maxLength('game', 25)
            ->allowEmpty('game', 'create');

        $validator
            ->scalar('division')
            ->maxLength('division', 25)
            ->allowEmpty('division');

        $validator
            ->scalar('location')
            ->maxLength('location', 50)
            ->allowEmpty('location');

        $validator
            ->integer('win')
            ->allowEmpty('win');

        $validator
            ->integer('lose')
            ->allowEmpty('lose');

        $validator
            ->integer('tie')
            ->allowEmpty('tie');

        $validator
            ->integer('world_rank')
            ->allowEmpty('world_rank');

        return $validator;
    }
}
