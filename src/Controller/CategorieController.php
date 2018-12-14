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
class CategorieController extends AppController
{

        /**
         * List a Categorie
         */
        public function categorie($id){

            // -> Find Categorie and turns it into an array
            $categorie = TableRegistry::get('Categories')->find()
            ->where([
                'Categories.id' => $id
            ])
            ->contain([
                'Movies',
            ])
            ->first();

            // -> Set Categorie to view
            $this->set(compact('categorie'));
            // debug($categorie);
            // die();

        }
    /**
     * Create a new Categorie
     * Save the new Categorie
     * @return View /src/Template/Categorie/list.twig
     */

    public function new(){
        if($this->request->is('post') || $this->request->is('put')){


            // -> Create new entity $categorie
            $categorie = TableRegistry::get('Categories')->newEntity($this->request->getData());

            // -> Save Categorie
            $categorie = TableRegistry::get('Categories')->save($categorie);

            return $this->redirect(['controller'=> 'Categorie','action' => 'list']);
        }
    }


    /**
     * List the Categories
     */
    public function list(){

        // -> Find Categorie and turns it into an array
        $categories = TableRegistry::get('Categories')->find()
        ->contain([
            'Movies'
        ]);

        // -> Set Categorie to view
        $this->set(compact('categories'));
    }


    /**
     * Update a Categorie
     * @param Int $id
     * @return View /src/Template/Categorie/update.twig
     */
    public function update($id){

        // -> Find a Categorie
        $categorie = TableRegistry::get('Categories')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If request is Post or Put
        if($this->request->is('post') || $this->request->is('put')){

            // -> Edit a Categorie entity
            $categorie = TableRegistry::get('Categories')->patchEntity($categorie,$this->request->getData());

            // -> Save a Categorie entity
            $categorie = TableRegistry::get('Categories')->save($categorie);

            // -> Redirect to update Categorie
            return $this->redirect(['controller'=> 'Categorie','action' => 'list']);
        }

        // -> Set Categorie to view
        $this->set(compact('Categorie'));

    }


    /**
     * Delete a Categorie
     * @param Int $id
     * Select a Categorie by his ID and delete it
     * @return View /src/Template/Categorie/list.twig
     */
    public function delete($id){

        // -> Find a Categorie where id is select
        $categorie = TableRegistry::get('Categories')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If Categorie exist he's delete
        if($categorie){
            TableRegistry::get('Categories')->delete($categorie);
        }
        return $this->redirect(['controller'=> 'Categorie','action' => 'list']);

    }

}
