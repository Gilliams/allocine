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


    public function movieActor($id){

        $movie = TableRegistry::get('Movies')->find()
        ->where([
          'Movies.id' => $id
        ])
        ->contain([
            'Actors',
            'Actors.Categories',
        ])
        ->first();

        debug($movie);
        die();
    }

    public function movieCategorie($id){

        $movie = TableRegistry::get('Movies')->find()
        ->where([
          'Movies.id' => $id
        ])
        ->contain([
            'Categories'
        ])
        ->first();

        debug($movie);
        die();
    }

    public function producerMovie($id){

        $movie = TableRegistry::get('Movies')->find()
        ->where([
          'Movies.id' => $id
        ])
        ->contain([
            'Producers',
            'Producers.Movies'
        ])
        ->first();

        // debug($movie);
        // die();
    }

    /**
     * Create a new Actor
     * Save the new Actor
     * @return View /src/Template/Actor/list.twig
     */

    public function new(){
        if($this->request->is('post') || $this->request->is('put')){


            // -> Create new entity $actor
            $actor = TableRegistry::get('Actors')->newEntity($this->request->getData());

            // -> Save Actor
            $actor = TableRegistry::get('Actors')->save($actor);

            return $this->redirect(['controller'=> 'Actor','action' => 'list']);
        }
    }


    /**
     * List the Actors
     */
    public function list(){

        // -> Find Actor and turns it into an array
        $movies = TableRegistry::get('Movies')->find()
        ->contain([
            'Actors',
            'Categories',
            'Producers',
            'Producers.Movies',
            'Cinemas',
            'Sessions',
        ]);

        // -> Set Actor to view
        $this->set(compact('movies'));
        // debug($movies);
        // die();

    }


    /**
     * List a Movie
     */
    public function movie($id){

        // -> Find Actor and turns it into an array
        $movie = TableRegistry::get('Movies')->find()
        ->where([
            'Movies.id' => $id
        ])
        ->contain([
            'Actors',
            'Categories',
            'Producers',
            'Producers.Movies',
            'Comments',
            'Comments.Movies'
        ])
        ->first();

        // -> Set Actor to view
        $this->set(compact('movie'));
        // debug($movie);
        // die();

    }


    /**
     * Update a Actor
     * @param Int $id
     * @return View /src/Template/Actor/update.twig
     */
    public function update($id){

        // -> Find a Actor
        $actor = TableRegistry::get('Actors')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If request is Post or Put
        if($this->request->is('post') || $this->request->is('put')){

            // -> Edit a Actor entity
            $actor = TableRegistry::get('Actors')->patchEntity($actor,$this->request->getData());

            // -> Save a Actor entity
            $actor = TableRegistry::get('Actors')->save($actor);

            // -> Redirect to update Actor
            return $this->redirect(['controller'=> 'Actor','action' => 'list']);
        }

        // -> Set Actor to view
        $this->set(compact('Actor'));

    }


    /**
     * Delete a Actor
     * @param Int $id
     * Select a Actor by his ID and delete it
     * @return View /src/Template/Actor/list.twig
     */
    public function delete($id){

        // -> Find a Actor where id is select
        $actor = TableRegistry::get('Actors')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If Actor exist he's delete
        if($actor){
            TableRegistry::get('Actors')->delete($actor);
        }
        return $this->redirect(['controller'=> 'Actor','action' => 'list']);

    }

}
