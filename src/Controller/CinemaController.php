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
class CinemaController extends AppController
{


    public function index(){
        $cinemas = TableRegistry::get('Cinemas')->find()
        ->contain([
            'Citys',
            'Sessions',
            'Sessions.Cinemas',
            'Movies',
            'Movies.Cinemas'
        ]);
        $this->set(compact('cinemas'));
    }

    public function view($id){

        $cinema = TableRegistry::get('Cinemas')->find()
        ->where([
            ('Cinemas.id') => $id
        ])
        ->contain([
            'Citys',
            'Sessions',
            'Sessions.Movies',
            'Sessions.Movies.Producers',
            'Sessions.Movies.Actors',
            'Sessions.Movies.Categories',
        ])
        ->first();

        $movies = [];
        foreach($cinema->sessions as $session) {
            $date = $session->date->format('Y-m-d');
            if(!isset($movies[$date])){
                $movies[$date] = [];
            }
            if(!isset($movies[$date][$session->movie->id])){
                $movies[$date][$session->movie->id] = [
                    'movie' => $session->movie,
                    'categories' => $session->movie->categories,
                    'sessions' => []
                ];
            }
            $movies[$date][$session->movie->id]['sessions'][] = $session->time;
        }

        $weeks = [];

        $current_week = date('W');
        $stop_date = date('Y-m-d H:i:s');
        $add_week = 0;

        for($i=0;$i<5;$i++){
            for($j=0;$j<7;$j++){
               $weeks[$current_week+$i][$j]['days'] = strtotime($stop_date .'+'.$j.'day');
               $weeks[$current_week+$i][$j]['num'] = strtotime($stop_date .'+'.$j.'day');
               $weeks[$current_week+$i][$j]['month'] = strtotime($stop_date .'+'.$j.'day');
            }
             $stop_date = date('Y-m-d H:i:s', strtotime($stop_date . ' +7 day'));
        }


        $this->set(compact('cinema','weeks','movies'));
    }

}

?>
