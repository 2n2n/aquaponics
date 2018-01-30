<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Initials Model
 *
 * @property \App\Model\Table\KindsTable|\Cake\ORM\Association\BelongsTo $Kinds
 * @property \App\Model\Table\KindsTable|\Cake\ORM\Association\BelongsTo $Kinds
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\Initial get($primaryKey, $options = [])
 * @method \App\Model\Entity\Initial newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Initial[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Initial|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Initial patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Initial[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Initial findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InitialsTable extends Table
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

        $this->setTable('initials');
        $this->setDisplayField('id');
        $this->setPrimaryKey(['id']);

        $this->addBehavior('Timestamp');

        $this->belongsTo('Kinds', [
            'foreignKey' => 'kinds_id',
            'joinType' => 'LEFT'
        ]);
        $this->belongsTo('Types', [
            'foreignKey' => 'kinds_initialtypes_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'users_id',
            'joinType' => 'INNER'
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
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('quantity')
            ->maxLength('quantity', 45)
            ->allowEmpty('quantity');

        $validator
            ->scalar('unitprice')
            ->maxLength('unitprice', 45)
            ->allowEmpty('unitprice');

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
        $rules->add($rules->existsIn(['kinds_id'], 'Kinds'));
        $rules->add($rules->existsIn(['kinds_initialtypes_id'], 'Kinds'));
        $rules->add($rules->existsIn(['users_id'], 'Users'));

        return $rules;
    }

    public function beforeSave($event, $entity) {
        $kind = $this->Kinds->get($entity->kinds_id);
        $this->kinds_initialtypes_id = $kind->id;
        
    }
}
