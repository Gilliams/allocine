<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MoviesTable extends Table
{
    public function initialize(array $config){

        $this->setTable('movies');
        $this->hasMany('Comments')
        ->setForeignKey([
            'movie_id'
        ]);
        // Nouvelle Session en relation hasMany - belongsTo
        $this->hasMany('Sessions')
        ->setForeignKey([
            'movie_id'
        ]);
        $this->belongsToMany('Actors',[
            'joinTable' => 'movies_actors',
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'actor_id'
        ]);
        $this->belongsToMany('Categories',[
            'joinTable' => 'categories_movies',
            'foreignKey' => 'movie_id',
            'targetForeignKey' => 'categorie_id'
        ]);
        $this->belongsTo('Producers')
        ->setForeignKey('producer_id')
        ->setJoinType('INNER');

        // Ancien code probablement foiré voir confirmation ...
        // $this->belongsTo('Sessions')
        // ->setForeignKey('session_id')
        // ->setJoinType('INNER');

        $this->belongsTo('Cinemas')
        ->setForeignKey('cinema_id')
        ->setJoinType('INNER');

    }
}
?>
