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
class ProducerController extends AppController
{



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

        debug($movie);
        die();
    }

    /**
     * Create a new Producer
     * Save the new Producer
     * @return View /src/Template/Producer/list.twig
     */

    public function new(){
        if($this->request->is('post') || $this->request->is('put')){


            // -> Create new entity $producer
            $producer = TableRegistry::get('Producers')->newEntity($this->request->getData());

            // -> Save Producer
            $producer = TableRegistry::get('Producers')->save($producer);

            return $this->redirect(['controller'=> 'Producer','action' => 'list']);
        }
    }


    /**
     * List the Producers
     */
    public function list(){

        // -> Find Producer and turns it into an array
        $producers = TableRegistry::get('Producers')->find()
        ->contain([
            'Movies'
        ]);

        // -> Set Producer to view
        $this->set(compact('producers'));
    }


    /**
     * Update a Producer
     * @param Int $id
     * @return View /src/Template/Producer/update.twig
     */
    public function update($id){

        // -> Find a Producer
        $producer = TableRegistry::get('Producers')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If request is Post or Put
        if($this->request->is('post') || $this->request->is('put')){

            // -> Edit a Producer entity
            $producer = TableRegistry::get('Producers')->patchEntity($producer,$this->request->getData());

            // -> Save a Producer entity
            $producer = TableRegistry::get('Producers')->save($producer);

            // -> Redirect to update Producer
            return $this->redirect(['controller'=> 'Producer','action' => 'list']);
        }

        // -> Set Producer to view
        $this->set(compact('Producer'));

    }


    /**
     * Delete a Producer
     * @param Int $id
     * Select a Producer by his ID and delete it
     * @return View /src/Template/Producer/list.twig
     */
    public function delete($id){

        // -> Find a Producer where id is select
        $producer = TableRegistry::get('Producers')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If Producer exist he's delete
        if($producer){
            TableRegistry::get('Producers')->delete($producer);
        }
        return $this->redirect(['controller'=> 'Producer','action' => 'list']);

    }

}
