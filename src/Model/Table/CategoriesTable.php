<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class CategoriesTable extends Table
{
    public function initialize(array $config)
    {
        $this->setTable('categories');
        $this->belongsToMany('Movies',[
          'joinTable' => 'categories_movies',
          'foreignKey' => 'categorie_id',
          'targetForeignKey' => 'movie_id'
        ]);
    }

}
?>
