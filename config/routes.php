<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Plugin;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

/**
 * The default class to use for all routes
 *
 * The following route classes are supplied with CakePHP and are appropriate
 * to set as the default:
 *
 * - Route
 * - InflectedRoute
 * - DashedRoute
 *
 * If no call is made to `Router::defaultRouteClass()`, the class used is
 * `Route` (`Cake\Routing\Route\Route`)
 *
 * Note that `Route` does not do any inflections on URLs which will result in
 * inconsistently cased URLs when used with `:plugin`, `:controller` and
 * `:action` markers.
 *
 * Cache: Routes are cached to improve performance, check the RoutingMiddleware
 * constructor in your `src/Application.php` file to change this behavior.
 *
 */
Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $routes) {
    /**
     * Here, we are connecting '/' (base path) to a controller called 'Pages',
     * its action called 'display', and we pass a param to select the view file
     * to use (in this case, src/Template/Pages/home.ctp)...
     */
    $routes->connect('/', ['controller' => 'Home', 'action' => 'index']);

    /**
     * ...and connect the rest of 'Pages' controller's URLs.
     */
     // $routes->connect('/movie/new', ['controller' => 'Movie', 'action' => 'new']);
     // $routes->connect('/movie/delete/*', ['controller' => 'Movie', 'action' => 'delete']);
     // $routes->connect('/movie/*', ['controller' => 'Movie', 'action' => 'update']);
     // $routes->connect('/movies/*', ['controller' => 'Movie', 'action' => 'list']);

     // Ancienne url ?
     //$routes->connect('/film/:id', ['controller' => 'Movie', 'action' => 'movie']);


     //$routes->connect('/acteur/:id', ['controller' => 'Actor', 'action' => 'actor']);

     // $routes->connect('/acteurs/:id', ['controller' => 'Actor', 'action' => 'test'])->setPass(['id']);
     // $routes->connect('/films/:id', ['controller' => 'Movie', 'action' => 'movieActor'])->setPass(['id']);
     // $routes->connect('/categories/:id', ['controller' => 'Movie', 'action' => 'categorieMovie'])->setPass(['id']);
     // $routes->connect('/producteurs/:id', ['controller' => 'Movie', 'action' => 'producerMovie'])->setPass(['id']);

     // $routes->connect('/acteur/new', ['controller' => 'Actor', 'action' => 'new']);
     // $routes->connect('/acteur/delete/*', ['controller' => 'Actor', 'action' => 'delete']);
     // $routes->connect('/acteur/*', ['controller' => 'Actor', 'action' => 'update']);
     // $routes->connect('/acteurs/*', ['controller' => 'Actor', 'action' => 'list']);

     $routes->connect('/acteurs', ['controller' => 'Actor', 'action' => 'index']);
     $routes->connect('/acteur/:id', ['controller' => 'Actor', 'action' => 'view'])->setPass(['id']);

     $routes->connect('/films', ['controller' => 'Movie', 'action' => 'index']);
     $routes->connect('/film/:id', ['controller' => 'Movie', 'action' => 'view'])->setPass(['id']);
     $routes->connect('/film/*', ['controller' => 'Movie', 'action' => 'update']);

     $routes->connect('/categories', ['controller' => 'Categorie', 'action' => 'index']);
     $routes->connect('/categorie/:id', ['controller' => 'Categorie', 'action' => 'view'])->setPass(['id']);

     $routes->connect('/commentaires', ['controller' => 'Comment', 'action' => 'index']);
     $routes->connect('/commentaire/*', ['controller' => 'Comment', 'action' => 'update']);

     $routes->connect('/producteurs', ['controller' => 'Producer', 'action' => 'index']);

     $routes->connect('/seances', ['controller' => 'Session', 'action' => 'index']);

     $routes->connect('/cinemas', ['controller' => 'Cinema', 'action' => 'index']);
     $routes->connect('/cinema/:id', ['controller' => 'Cinema', 'action' => 'view'])->setPass(['id']);

     $routes->connect('/villes', ['controller' => 'City', 'action' => 'index']);
     $routes->connect('/ville/:id', ['controller' => 'City', 'action' => 'view'])->setPass(['id']);


    /**
     * Connect catchall routes for all controllers.
     *
     * Using the argument `DashedRoute`, the `fallbacks` method is a shortcut for
     *    `$routes->connect('/:controller', ['action' => 'index'], ['routeClass' => 'DashedRoute']);`
     *    `$routes->connect('/:controller/:action/*', [], ['routeClass' => 'DashedRoute']);`
     *
     * Any route class can be used with this method, such as:
     * - DashedRoute
     * - InflectedRoute
     * - Route
     * - Or your own route class
     *
     * You can remove these routes once you've connected the
     * routes you want in your application.
     */
    $routes->fallbacks(DashedRoute::class);
});
