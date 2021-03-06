<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Kinds Model
 *
 * @property \App\Model\Table\TypesTable|\Cake\ORM\Association\BelongsTo $Types
 *
 * @method \App\Model\Entity\Kind get($primaryKey, $options = [])
 * @method \App\Model\Entity\Kind newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Kind[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Kind|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Kind patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Kind[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Kind findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class KindsTable extends Table
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

        $this->setTable('kinds');
        $this->setDisplayField('label');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Types', [
            'foreignKey' => 'types_id',
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
            ->scalar('name')
            ->maxLength('name', 45)
            ->allowEmpty('name');

        $validator
            ->scalar('description')
            ->maxLength('description', 45)
            ->allowEmpty('description');

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
        $rules->add($rules->existsIn(['initialtypes_id'], 'Types'));

        return $rules;
    }

    public function find($type = 'all', $options = []) {
        return parent::find($type, $options)
            ->where(['deleted' => 0]);
    }
}
