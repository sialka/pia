<?php

namespace App\Controller;

use Cake\Event\Event;
use Cake\ORM\Table;
use Cake\ORM\Entity;
use Cake\ORM\TableRegistry;
use Cake\Network\Session;

class PanelsController extends AppController {            

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
        
              
        # 1. Prioridade senhas
        # a. busca a senha do topo com status true;        
        # b. pegar a senha e mudar o status para false               

        $senhas = $this->Panels->find('all')->where(['status' => true, 'setor' => 4])->first();
        //$senhaEntity = [];
        
        if(count($senhas) > 0){
            $senha = $senhas->senha;
            $tipo = $senhas->tipo;

            $senhas->status = false;
            $this->Panels->save($senhas);    
        }
        
        # 2. Não havendo senhas -> Exibir detalhes das senhas de 3 em 3
        # a. Pegar todas a senha do table
        # b. verificar se tem mais que 3
        #    sim -> chaveamento (session) True
        #    não -> chaveamento (session) False
        # c. chaveamento
        #    sim -> pegar as 3 senhas e marcar o offset (session) com o proximo index
        #    nao -> pegar as senhas em enviar e marcar o offset (session) 0
        
        if(count($senhas) == 0) {
            
            $servicesTable = TableRegistry::get('Services');
            
            $dados = $servicesTable->find('all')->where(['Services.setor' => '4'])->contain(['Localidades'])->toArray();
        
            $senha = 0;

            # 2. Total de Registros
            $senhas_total = count($dados);            

            # 3. Total de Paginas 
            $get_pagina = $this->pagination();
            
            $pagina_total = $get_pagina[$senhas_total];                        

            # 4. Total corrente                               
            
            if ($this->request->query == null ) {
            
                $pagina_index = 0;
            }else{

                $pagina_index = $this->request->query['page'];                

                if($pagina_index >= $pagina_total){                
                    $pagina_index = 0;               
                }else{                                  
                    $pagina_index = $pagina_index + 3;                              
                }

            }            
            
            $dados = array_slice($dados,$pagina_index, 3);
            $tipo = null;
            
        }else{
            //$this->request->session()->write('pagina_corrente', 0);
            $dados = [];
            $pagina_index = 0;
        }
        
        //debug($this->request->query['page']);
        //debug($this->aevOptions());
        //exit;

        $aevOptions = $this->aevOptions();
        
        $this->set('tipo', $tipo);
        $this->set('senha', $senha);
        $this->set('dados', $dados);
        $this->set('pagina_index',$pagina_index);
        $this->set('aevOptions', $aevOptions);
    }    

    /**
    * Pagination:
    * - Responsavel por informar o inicio do slice em dados.
    */    
    private function pagination() {                
        # reg =  Registros na tabela
        # senhas_total = Total de senhas
        # pag = Pagina
        # controle = chavamento para senhas por pagina
        # chaveamento = apenas para que value comece em 1 

        $senhas_total = 30;
        $pag = 0;
        $controle = 1;
        $paginas = [];

        $chaveamento = true;
        
        for ($reg = 1; $reg <= $senhas_total; $reg++) {                                     
            
            if ($pag == 0) {
                //$pag=1;                
            }

            $paginas += [$reg => $pag];

            if($controle == 3){                                
                
                if ($chaveamento){ 
                    //$pag = 0; 
                    //$chaveamento = false;
                }
                $pag += 3;
                $controle = 0;
            }

            $controle += 1;             
        } 

        return $paginas;
    }

    public function aevOptions() {

        $aevOptions = [
            'status_fichas' => [                
                0 => "FICHAS: CONFERIDAS",
                1 => "FICHAS: SEM CONFERÊNCIA",
                2 => "FICHAS: AGUARDANDO RETORNO",
            ],              
            'status_envelopes' => [                
                0 => "ENVELOPES: CONFERIDOS",
                1 => "ENVELOPES: SEM CONFERÊNCIA",
                2 => "ENVELOPES: AGUARDANDO RETORNO",
            ],          
            'status_css_ficha' => [                
                0 => "bg-success text-white",
                1 => "bg-danger text-white",
                2 => "bg-warning text-dark",
            ],            
            'status_css_envelope' => [                
                0 => "bg-success text-white",
                1 => "bg-danger text-white",
                2 => "bg-warning text-dark",
            ],
        ];

        return $aevOptions;
        //$this->set('aevOptions', $aevOptions);
    }

}
