<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class MoviesTable extends Table
{
    public function initialize(array $config){

        $this->setTable('movies');
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
        $this->hasMany('Comments')
        ->setForeignKey([
            'movie_id'
        ]);
    }
}
?>
