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

        $localidadesTable = TableRegistry::get('Localidades');                    
        $localidades = $localidadesTable->find('list')->where(['setor' => '4'])->toArray();
        //debug(count($localidades));

        $servicesTable = TableRegistry::get('Services');
        $services = $servicesTable->find('all')->where(['setor' => '4'])->toArray();
        $total_senhas = count($services);


        $status_services = [
            'fichas' => [
                "conferidas" => 0,
                "sem conferencia" => 0,
                "aguardando retorno" => 0,
            ],
            'reservas' => [
                "conferidas" => 0,
                "sem conferencia" => 0,
                "aguardando retorno" => 0,
            ]
        ];        


        foreach($services as $service){
            
            switch ($service->status_ficha) {
                case 0:
                    $status_services['fichas']['conferidas'] += 1;    
                    break;
                case 1:
                    $status_services['fichas']['sem conferencia'] += 1;
                    break;
                case 2:
                    $status_services['fichas']['aguardando retorno'] += 1;
                    break;
            }

            switch ($service->status_envelope) {
                case 0:
                    $status_services['reservas']['conferidas'] += 1;    
                    break;
                case 1:
                    $status_services['reservas']['sem conferencia'] += 1;
                    break;
                case 2:
                    $status_services['reservas']['aguardando retorno'] += 1;
                    break;
            }

        }                                   

        $panelsTable = TableRegistry::get('Panels');
        $panels1 = $panelsTable->find('all')->where(['setor' => '4', 'tipo' => 1])->last();
        $panels2 = $panelsTable->find('all')->where(['setor' => '4', 'tipo' => 2])->last();
        $panels3 = $panelsTable->find('all')->where(['setor' => '4', 'tipo' => 3])->last();
        $panels4 = $panelsTable->find('all')->where(['setor' => '4', 'tipo' => 4])->last();

        $panels1 = $panels1 == null ? 0 : $panels1->senha; 
        $panels2 = $panels2 == null ? 0 : $panels2->senha; 
        $panels3 = $panels3 == null ? "-" : $panels3->senha; 
        $panels4 = $panels4 == null ? "-" : $panels4->senha; 

        $this->set('localidades', count($localidades));
        $this->set('status_services', $status_services);
        $this->set('total_senhas', $total_senhas);
        $this->set('panels1', $panels1);
        $this->set('panels2', $panels2);
        $this->set('panels3', $panels3);
        $this->set('panels4', $panels4);

    }

}
