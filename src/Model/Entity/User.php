<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $MI
 * @property string $lastname
 * @property string $contactnumber
 * @property string $email
 * @property int $logins_id
 * @property int $logins_roles_id
 *
 * @property \App\Model\Entity\Login[] $logins
 */
class User extends Entity
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
        'firstname' => true,
        'MI' => true,
        'lastname' => true,
        'contactnumber' => true,
        'email' => true,
        'logins_id' => true,
        'logins_roles_id' => true,
        'logins' => true
    ];
}
