<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Material Entity
 *
 * @property int $id
 * @property string $serial_number
 * @property int $model_id
 * @property int $user_id
 * @property int $category_id
 * @property int $constructor_id
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Model $model
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\Constructor $constructor
 */
class Material extends Entity
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
        '*' => true,
        'id' => false
    ];
    
}
