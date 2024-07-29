<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;

class ServicesController extends AppController {            

    public $paginate = [
        'limit' => 25,
        'order' => [
            'Ncs.ano' => 'asc',
            'Ncs.mes' => 'desc'
        ]
    ];

    
    public function initialize() {
        parent::initialize();

        $this->loadComponent('Paginator');
        $this->loadComponent('Conditions', [
            'prefixSession'      => 'ccb',
            'delimiter'          => '__',
            'pipe'               => '-',
            'char_case'          => 1,
            'tables_names'       => [],
            'try_resolve_fields' => true,
            'listenRequestClear' => [
                'index' => [
                    'param' => 'clear'
                ],
            ],
            'listenRequestPiped' => [
                'index' => [
                    'model'        => 'Ncs',
                    'pkAlias'      => __('id'),
                    'blockPkPiped' => true,
                ]
            ]
        ]);

        $this->Auth->allow('index');
    }

    public function index() {    
        
                 

    } 
    
    public function callSenha($senha = null){       
        
        $data = $this->request->data;
                
        if($data['call_senha'] == 0){
            $this->Flash->error(__('Não existe senha 0, favor revisar !!!'));
            return $this->redirect("/services");
        }        

        $panelTable = TableRegistry::get('Panels');
        
        $panel = $panelTable->newEntity();
        $panel->senha = $data['call_senha'];
        $panel->setor = 4;
                
        if ($panelTable->save($panel)) {     
            $this->Flash->success(__('Senha enviada para fila com sucesso !!!'));
            $this->request->session()->write('last_senha', $data['call_senha']);       
        }else{
            $this->Flash->error(__('Erro ao chamar a senha !!!'));
        }
        
        return $this->redirect("/services");
    }

  }