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
class CommentController extends AppController
{

    /**
     * Create a new Comment
     * Save the new Comment
     * @return View /src/Template/Comment/list.twig
     */

    public function new(){
        if($this->request->is('post') || $this->request->is('put')){


            // -> Create new entity $comment
            $comment = TableRegistry::get('Comments')->newEntity($this->request->getData());

            // -> Save Comment
            $comment = TableRegistry::get('Comments')->save($comment);

            return $this->redirect(['controller'=> 'Comment','action' => 'list']);
        }
    }


    /**
     * List the Comments
     */
    public function index(){

        // -> Find Comment and turns it into an array
        $comments = TableRegistry::get('Comments')->find()
        ->contain([
            'Movies'
        ]);

        // -> Set Comment to view
        $this->set(compact('comments'));
    }


    /**
     * Update a Comment
     * @param Int $id
     * @return View /src/Template/Comment/update.twig
     */
    public function update($id){

        // -> Find a Comment
        $comment = TableRegistry::get('Comments')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If request is Post or Put
        if($this->request->is('post') || $this->request->is('put')){

            // -> Edit a Comment entity
            $comment = TableRegistry::get('Comments')->patchEntity($comment,$this->request->getData());

            // -> Save a Comment entity
            $comment = TableRegistry::get('Comments')->save($comment);

            // -> Redirect to update Comment
            return $this->redirect(['controller'=> 'Comment','action' => 'list']);
        }

        // -> Set Comment to view
        $this->set(compact('Comment'));

    }


    /**
     * Delete a Comment
     * @param Int $id
     * Select a Comment by his ID and delete it
     * @return View /src/Template/Comment/list.twig
     */
    public function delete($id){

        // -> Find a Comment where id is select
        $comment = TableRegistry::get('Comments')->find()
        ->where([
            'id' => $id
        ])
        ->first();

        // -> If Comment exist he's delete
        if($comment){
            TableRegistry::get('Comments')->delete($comment);
        }
        return $this->redirect(['controller'=> 'Comment','action' => 'list']);

    }

}
