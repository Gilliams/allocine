<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ProducersTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('producers');
        $this->hasMany('Movies')
        ->setForeignKey([
            'producer_id'
        ]);
    }

}
?>
