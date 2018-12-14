<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('sessions');

        $this->hasOne('Movies')
        ->setForeignKey('session_id')
        ->setJoinType('INNER');

        $this->belongsTo('Cinemas')
        ->setForeignKey('cinema_id')
        ->setJoinType('INNER');
    }

}
?>
