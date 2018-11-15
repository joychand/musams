<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $user_id
 * @property int $role_id
 * @property string $user_name
 * @property string $user_full_name
 * @property string $password
 * @property string $email
 * @property string $mobile
 * @property int $department_id
 *
 * @property \App\Model\Entity\Role $role
 * @property \App\Model\Entity\Department $department
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
        'role_id' => true,
        'user_name' => true,
        'user_full_name' => true,
        'password' => true,
        'email' => true,
        'mobile' => true,
        'department_id' => true,
        'role' => true,
        'department' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected function _setPassword($value)
    {
        if (strlen($value)) {
             $hasher = new DefaultPasswordHasher();
          //   print_r($hasher->hash($value));
            return $hasher->hash($value);
         }
     }
}
