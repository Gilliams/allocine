<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class ActorsTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('actors');
        $this->belongsToMany('Movies',[
          'joinTable' => 'movies_actors',
          'foreignKey' => 'actor_id',
          'targetForeignKey' => 'movie_id'
        ]);
    }

}
?>
