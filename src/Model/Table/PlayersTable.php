<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Players Model
 *
 * @property \App\Model\Table\PlayersTable|\Cake\ORM\Association\BelongsTo $players
 *
 * @method \App\Model\Entity\Player get($primaryKey, $options = [])
 * @method \App\Model\Entity\Player newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Player[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Player|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Player|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Player patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Player[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Player findOrCreate($search, callable $callback = null, $options = [])
 */
class PlayersTable extends Table
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

        $this->setTable('players');
        $this->setDisplayField('player_id');
        $this->setPrimaryKey(['player_id']);

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
            ->scalar('player_id')
            ->maxLength('player_id', 50)
            ->requirePresence('player_id', 'create')
            ->notEmpty('player_id', 'create');

        $validator
            ->scalar('game')
            ->maxLength('game', 50)
            ->allowEmpty('game', 'create');

        $validator
            ->scalar('player_name')
            ->maxLength('player_name', 255)
            ->requirePresence('player_name', 'create')
            ->notEmpty('player_name');

        $validator
            ->scalar('team_name')
            ->maxLength('team_name', 50)
            ->requirePresence('team_name', 'create')
            ->notEmpty('team_name');

        $validator
            ->scalar('location')
            ->maxLength('location', 255)
            ->allowEmpty('location');

        $validator
            ->scalar('role')
            ->maxLength('role', 40)
            ->allowEmpty('role');

        return $validator;
    }

}
