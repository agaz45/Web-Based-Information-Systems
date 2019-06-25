<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Matches Model
 *
 * @method \App\Model\Entity\Match get($primaryKey, $options = [])
 * @method \App\Model\Entity\Match newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Match[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Match|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Match patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Match[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Match findOrCreate($search, callable $callback = null, $options = [])
 */
class MatchesTable extends Table
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

        $this->setTable('matches');
        $this->setDisplayField('match_id');
        $this->setPrimaryKey('match_id');
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
            ->integer('match_id')
            ->allowEmpty('match_id', 'create');

        $validator
            ->dateTime('start_time')
            ->allowEmpty('start_time');

        $validator
            ->dateTime('end_time')
            ->allowEmpty('end_time');

        $validator
            ->scalar('team1')
            ->maxLength('team1', 50)
            ->allowEmpty('team1');

        $validator
            ->scalar('team2')
            ->maxLength('team2', 50)
            ->allowEmpty('team2');

        $validator
            ->scalar('result')
            ->maxLength('result', 50)
            ->allowEmpty('result');

        $validator
            ->decimal('payout1')
            ->allowEmpty('payout1');

        $validator
            ->decimal('payout2')
            ->allowEmpty('payout2');

        return $validator;
    }
}
