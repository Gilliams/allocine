<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class CinemasTable extends Table
{
    public function initialize(array $config){

        $this->setTable('cinemas');

        $this->hasMany('Movies')
        ->setForeignKey([
            'cinema_id'
        ]);

        $this->belongsTo('Citys')
        ->setForeignKey('city_id')
        ->setJoinType('INNER');

        $this->hasMany('Sessions')
        ->setForeignKey('cinema_id');
    }
}
?>
