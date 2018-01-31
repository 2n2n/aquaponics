<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Initial Entity
 *
 * @property int $id
 * @property string $quantity
 * @property string $unitprice
 * @property int $kinds_id
 * @property int $kinds_initialtypes_id
 * @property int $users_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Kind $kind
 * @property \App\Model\Entity\User $user
 */
class Initial extends Entity
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
        'quantity' => true,
        'unitprice' => true,
        'created' => true,
        'modified' => true,
        'kinds_id' => true,
        'types_id' => true,
        'users_id' => true
    ];

    public function setStatus($status) {
        $this->status = $status;
    }
}
