<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Product Entity
 *
 * @property int $id
 * @property string $name
 * @property int $console_id
 * @property bool $used
 * @property int $developer_id
 * @property string $description
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $subcategory_id
 *
 * @property \App\Model\Entity\ProductsDescriptionTranslation $description_translation
 * @property \App\Model\Entity\I18n[] $_i18n
 * @property \App\Model\Entity\Console $console
 * @property \App\Model\Entity\Developer $developer
 * @property \App\Model\Entity\Wishlist[] $wishlists
 * @property \App\Model\Entity\File[] $files
 */
class Product extends Entity
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
        'console_id' => true,
        'used' => true,
        'developer_id' => true,
        'description' => true,
        'created' => true,
        'modified' => true,
        'subcategory_id' => true,
        'description_translation' => true,
        '_i18n' => true,
        'console' => true,
        'developer' => true,
        'wishlists' => true,
        'files' => true
    ];
}
