<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class CitysTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('citys');

        $this->hasMany('Cinemas')
        ->setForeignKey([
            'city_id'
        ]);
    }

}
?>
