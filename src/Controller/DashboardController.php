<?php

namespace App\Controller;

use Cake\Core\Configure;
use Cake\ORM\TableRegistry;
use Cake\Controller\Controller;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class DashboardController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->loadComponent('Paginator');
    }

    public function index() {
        //$this->carregarMesTrabalho();
    }

}
