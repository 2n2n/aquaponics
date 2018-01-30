<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Kind Entity
 *
 * @property int $id
 * @property string $name
 * @property int $initialtypes_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenTime $created
 *
 * @property \App\Model\Entity\Type $type
 */
class Kind extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'name' => true,
        'description' => true,
        'modified' => true,
        'created' => true,
        'types_id' => true
    ];

    protected function _getLabel() {
        return sprintf("%s | %s", 
            $this->_properties['name'],
            $this->_properties['description']
        );
    }
}
