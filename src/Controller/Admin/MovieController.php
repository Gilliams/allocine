<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\ForbiddenException;
use Cake\Http\Exception\NotFoundException;
use Cake\View\Exception\MissingTemplateException;
use Cake\ORM\TableRegistry;

/**
 * Static content controller
 *
 * This controller will render views from Template/Pages/
 *
 * @link https://book.cakephp.org/3.0/en/controllers/pages-controller.html
 */
class MovieController extends AppController
{


    /**
     * Create a new movie
     * Save the new movie
     * @return View /src/Template/Movie/list.twig
     */
    public function new(){
        if($this->request->is('post') || $this->request->is('put')){


            // -> Create new entity $movie
            $movie = TableRegistry::get('Movies')->newEntity($this->request->getData());

            // -> Save movie
            $movie = TableRegistry::get('Movies')->save($movie);

            return $this->redirect(['controller'=> 'Movie','action' => 'list']);
        }
    }


    /**
     * List the movies
     */
    public function list(){

        // -> Find movie and turns it into an array
        $movies = TableRegistry::get('Movies')->find()
        ->toArray();

        // -> Set movie to view
        $this->set(compact('movies'));
    }


    /**
     * Update a movie
     * @param Int $id
     * @return View /src/Template/Movie/update.twig
     */
    public function update($id){

        // -> Find a movie
        $movie = TableRegistry::get('Movies')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If request is Post or Put
        if($this->request->is('post') || $this->request->is('put')){

            // -> Edit a movie entity
            $movie = TableRegistry::get('Movies')->patchEntity($movie,$this->request->getData());

            // -> Save a movie entity
            $movie = TableRegistry::get('Movies')->save($movie);

            // -> Redirect to update movie
            return $this->redirect(['controller'=> 'Movie','action' => 'update', $movie->id]);
        }

        // -> Set movie to view
        $this->set(compact('movie'));

    }


    /**
     * Delete a movie
     * @param Int $id
     * Select a movie by his ID and delete it
     * @return View /src/Template/Movie/list.twig
     */
    public function delete($id){

        // -> Find a movie where id is select
        $movie = TableRegistry::get('Movies')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If movie exist he's delete
        if($movie){
            TableRegistry::get('Movies')->delete($movie);
        }
        return $this->redirect(['controller'=> 'Movie','action' => 'list']);

    }



}
