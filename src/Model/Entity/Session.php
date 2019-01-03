<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Session Entity
 *
 * @property int $id
 * @property int $experience_id
 * @property int $rate_id
 * @property int $by_default
 * @property float $price_with_tax
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 */
class Session extends Entity
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
    protected $_accessible = '*';

    /**
     * Fields that are included from JSON versions of the entity.
     *
     * @var array
     */
    protected $_virtual = [
        
    ];

    /**
     * Get price with tax format
     */
    protected function _getPriceWithTaxFormat()
    {
        return number_format($this->_properties['price_with_tax'],2,',',' ');
    }
}
