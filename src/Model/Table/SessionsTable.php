<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class SessionsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('sessions');

        // Changment de l'ancien code pour belongsTo - hasMany
        // $this->hasOne('Movies')
        // ->setForeignKey('session_id')
        // ->setJoinType('INNER');

        $this->belongsTo('Movies')
        ->setForeignKey('movie_id')
        ->setJoinType('INNER');
        
        $this->belongsTo('Cinemas')
        ->setForeignKey('cinema_id')
        ->setJoinType('INNER');
    }

}
?>
