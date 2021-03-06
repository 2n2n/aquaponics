<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use App\Model\Table\InitialsTable;
/**
 * Inifinal Entity
 *
 * @property int $id
 * @property string $quantity
 * @property string $unitprice
 * @property int $initials_id
 * @property int $initials_kinds_id
 * @property int $initials_kinds_initialtypes_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\Initial $initial
 */
class Inifinal extends Entity
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
        'initials_id' => true,
        'initials_kinds_id' => true,
        'initials_kinds_initialtypes_id' => true,
        'created' => true,
        'modified' => true,
    ];

    public function calculateGross() {
        return $this->quantity * $this->unitprice;
    }

    public function calculateLoss() {
        return $this->initial->quantity * $this->initial->unitprice;
    }

    public function calculateNet() {
        return $this->calculateGross() - $this->calculateLoss();
    }
}
