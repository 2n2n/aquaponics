<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pond Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $users_id
 * @property string $pondscol
 * @property float $phlevel
 * @property float $templevel
 * @property float $turblevel
 * @property float $waterlevel
 *
 * @property \App\Model\Entity\User $user
 */
class Pond extends Entity
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
        'created' => true,
        'modified' => true,
        'distance_sensor' => true,
        'phlevel' => true,
        'templevel' => true,
        'turblevel' => true,
        'waterlevel' => true,
        'user' => true
    ];
}
