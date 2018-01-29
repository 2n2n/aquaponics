<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string $mi
 * @property string $lastname
 * @property string $contactnumber
 * @property string $email
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
        'mi' => true,
        'lastname' => true,
        'contactnumber' => true,
        'email' => true,
        'logins' => true
    ];

    protected function _getLabel() {
        return sprintf("ID#%d - %s, %s %s", 
            $this->_properties['id'],
            $this->_properties['lastname'],
            $this->_properties['firstname'],
            $this->_properties['mi']
        );
    }

    protected function _getFullname() {
        return sprintf("%s, %s %s",
            $this->_properties['lastname'],
            $this->_properties['firstname'],
            $this->_properties['mi']
        );
    }
}
