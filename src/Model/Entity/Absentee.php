<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Absentee Entity
 *
 * @property int $row_id
 * @property int $department_id
 * @property int $user_id
 * @property \Cake\I18n\FrozenTime $creation_date
 * @property \Cake\I18n\FrozenDate $from_date
 * @property \Cake\I18n\FrozenDate $to_date
 * @property int $total_lectures
 * @property int $total_absentees
 *
 * @property \App\Model\Entity\Department $department
 * @property \App\Model\Entity\User $user
 */
class Absentee extends Entity
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
        'department_id' => true,
        'user_id' => true,
        'creation_date' => true,
        'from_date' => true,
        'to_date' => true,
        'total_lectures' => true,
        'total_absentees' => true,
        'department' => true,
        'user' => true
    ];
}
