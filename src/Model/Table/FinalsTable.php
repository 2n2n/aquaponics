<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Finals Model
 *
 * @property \App\Model\Table\InitialsTable|\Cake\ORM\Association\BelongsTo $Initials
 * @property \App\Model\Table\InitialsTable|\Cake\ORM\Association\BelongsTo $Initials
 * @property \App\Model\Table\InitialsTable|\Cake\ORM\Association\BelongsTo $Initials
 *
 * @method \App\Model\Entity\Final get($primaryKey, $options = [])
 * @method \App\Model\Entity\Final newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Final[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Final|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Final patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Final[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Final findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class FinalsTable extends Table
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

        $this->setTable('finals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Initials', [
            'foreignKey' => 'initials_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Initials', [
            'foreignKey' => 'initials_kinds_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Initials', [
            'foreignKey' => 'initials_kinds_initialtypes_id',
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
        $rules->add($rules->existsIn(['initials_id'], 'Initials'));
        $rules->add($rules->existsIn(['initials_kinds_id'], 'Initials'));
        $rules->add($rules->existsIn(['initials_kinds_initialtypes_id'], 'Initials'));

        return $rules;
    }
}
