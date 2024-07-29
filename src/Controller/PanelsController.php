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

        $senhaEntity = $this->Panels->find('all')->where(['status' => true, 'setor' => 4])->first();
        //$senhaEntity = [];
        
        if(count($senhaEntity) > 0){
            $senha = $senhaEntity->senha;

            $senhaEntity->status = false;
            $this->Panels->save($senhaEntity);    
        }
        
        # 2. Não havendo senhas -> Exibir detalhes das senhas de 3 em 3
        # a. Pegar todas a senha do table
        # b. verificar se tem mais que 3
        #    sim -> chaveamento (session) True
        #    não -> chaveamento (session) False
        # c. chaveamento
        #    sim -> pegar as 3 senhas e marcar o offset (session) com o proximo index
        #    nao -> pegar as senhas em enviar e marcar o offset (session) 0
        
        if(count($senhaEntity) == 0) {

            # 1. Buscar dados
            $dados1 = [ 
                0 => [
                    'senha' => 1,
                    'localidade'=> "BAIRRO DOS PIMENTAS",
                    'status_ficha_id'=> 1,
                    'status_envelope_id'=> 1,
                ],
                1 => [
                    'senha'=> 2,
                    'localidade'=> "JARDIM MONTE ALEGRE",
                    'status_ficha_id'=> 2,
                    'status_envelope_id'=> 3,
                ],
                2 => [
                    'senha'=> 3,
                    'localidade'=> "JARDIM SANTO AFONSO",
                    'status_ficha_id'=> 3,
                    'status_envelope_id'=> 2,
                ],
                3 => [
                    'senha'=> 4,
                    'localidade'=> "SÍTIO SÃO FRANCISCO",
                    'status'=> 2,
                    'status_ficha_id'=> 2,
                    'status_envelope_id'=> 1,
                ],        
                4 => [
                    'senha' => 5,
                    'localidade' => "PARQUE DAS NAÇÕES",
                    'status_ficha_id' => 3,
                    'status_envelope_id' => 0,
                ],
                5 => [        
                    'senha' => 6,
                    'localidade' => "JARDIM NOVA CUMBICA",
                    'status_ficha_id' => 1,
                    'status_envelope_id' => 3,
                ],
                6 => [        
                    'senha' => 7,
                    'localidade' => "JARDIM SANTO AFONSO",
                    'status_ficha_id' => 1,
                    'status_envelope_id' => 2,
                ],
                7 => [        
                    'senha' => 8,
                    'localidade' => "-",
                    'status_ficha_id' => 0,
                    'status_envelope_id' => 0,
                ],
                8 => [        
                    'senha' => 9,
                    'localidade' => "-",
                    'status_ficha_idv' => 0,
                    'status_envelope_id' => 0,
                ]        
            ];
            $dados2 = [$dados1[0]];
            $dados2 = [$dados1[0],$dados1[1]];
            $dados2 = [$dados1[0],$dados1[1],$dados1[2]];
            $dados2 = [$dados1[0],$dados1[1],$dados1[2],$dados1[3]];
            $dados2 = [$dados1[0],$dados1[1],$dados1[2],$dados1[3],$dados1[4]];
            $dados2 = [$dados1[0],$dados1[1],$dados1[2],$dados1[3],$dados1[4],$dados1[5]];
            $dados2 = [$dados1[0],$dados1[1],$dados1[2],$dados1[3],$dados1[4],$dados1[5],$dados1[6]];
        
            $senha = 0;
            # 2. Total de Registros
            $senhas_total = count($dados2);
            //echo "Total: " . $senhas_total . '<br>';

            # 3. Total de Paginas 
            $get_pagina = $this->pagination();
            //debug($get_pagina);exit;
            $pagina_total = $get_pagina[$senhas_total];            
            //echo "Paginas: " . $pagina_total . "<br>";

            # 4. Total corrente                               
            //debug($this->request->query);
            
            //$this->request->query['page'] == null
            if ($this->request->query == null ) {
                //echo "fluxo 1". "<br>";                
                $pagina_index = 0;
            }else{

                $pagina_index = $this->request->query['page'];
                //debug($pagina_index);

                if($pagina_index >= $pagina_total){
                    //echo "fluxo 2 <br>";
                    $pagina_index = 0;               
                }else{                  
                    //echo "fluxo 3 <br>";                      
                    $pagina_index = $pagina_index + 3;                              
                }

            }

            //echo "Pagina index: " . $pagina_index . "<br>";
            
            $dados = array_slice($dados2,$pagina_index, 3);

            //debug($pagina_index);
        }else{
            //$this->request->session()->write('pagina_corrente', 0);
            $dados = [];
            $pagina_index = 0;
        }
        
        //debug($this->request->query['page']);
        //debug($this->aevOptions());
        //exit;

        $aevOptions = $this->aevOptions();

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


        /*

            $aevOptions = [
                'setores' => [
                    0 => 'Administração',
                    1 => '1 - Centro',
                    2 => '2 - Aeroporto',
                    3 => '3 - Bonsucesso',
                    4 => '4 - Pimentas',
                ],
                'status' => [
                    1 => 'Ativo',
                    0 => 'Inativo',
                ],
            ];
    
            return $aevOptions;*/
        

        $aevOptions = [
            'status_fichas' => [
                0 => "-",
                1 => "FICHAS: CONFERIDAS",
                2 => "FICHAS: SEM CONFERÊNCIA",
                3 => "FICHAS: AGUARDANDO RETORNO",
            ],              
            'status_envelopes' => [
                0 => "-",
                1 => "ENVELOPES: CONFERIDOS",
                2 => "ENVELOPES: SEM CONFERÊNCIA",
                3 => "ENVELOPES: AGUARDANDO RETORNO",
            ],          
            'status_css_ficha' => [
                0 => "bg-dark text-white",
                1 => "bg-success text-white",
                2 => "bg-danger text-white",
                3 => "bg-warning text-dark",
            ],            
            'status_css_envelope' => [
                0 => "bg-dark text-white",
                1 => "bg-success text-white",
                2 => "bg-danger text-white",
                3 => "bg-warning text-dark",
            ],
        ];

        return $aevOptions;
        //$this->set('aevOptions', $aevOptions);
    }

}
