<?php

namespace App\Controller;

use Cake\ORM\TableRegistry;
use Cake\Network\Session;

class PanelsController extends AppController {

    public function initialize() {
        parent::initialize();

        $this->Auth->allow('index');
    }

    public function index() {

        $setupTable = TableRegistry::get('Setup');

        // Trava para o Painel
        $painel = $setupTable->find()->where(['chave' => 'painel'])->First();
        $trava = $painel->valor;

        // Geral
        $dados = [];
        $pagina_index = 0;
        $fala = 0;

        // Controla fluxo de exibição 0 -> chama senha, 1 -> exibe o status das senhas
        $exibir_painel = 1;


        if ($trava != 0){

            // Setup - Idioma da Voz
            $voz = $setupTable->find()->where(['chave' => 'voz'])->First();
            $fala = $voz == null ? "0" : $voz->valor;

            // Coletando senhas para serem chamadas
            $senha = $this->Panels->find('all')->order(['id' => 'ASC'])->where(['status' => true, 'setor' => 4])->first();

            if(count($senha) != 0){

                $dados = $senha;
                $remove_senha = $this->Panels->get($senha->id);
                $this->Panels->delete($remove_senha);
                $exibir_painel = 0;

            }else{

                // Exibir Status das Senhas
                $exibir_painel = 1;

                $servicesTable = TableRegistry::get('Services');

                $dados = $servicesTable->find('all')->order(['senha' => 'asc'])->where(['Services.setor' => '4', 'Services.senha !=' => 0])->contain(['Localidades'])->toArray();

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
            }

            $this->aevOptions();
        }

        $this->set('sintetizador', $fala);
        $this->set('trava',$trava);
        $this->set('dados',$dados);
        $this->set('pagina_index',$pagina_index);

        if ($exibir_painel == 0) {
            $this->render('chamar');
        }else{
            $this->render('senhas');
        }

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
        $paginas = [0];

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


}
