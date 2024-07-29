
<?php

  $nav = [
      'Atendimentos' => ''
  ];
    
  $call_senha = $this->request->session()->read('last_senha');       
  $ultima_senha = $call_senha == null ? 1 : $call_senha;
  echo $this->element('breadcrumb', [ 'nav' => $nav ]); 
?>

<style>
  input[type=number]::-webkit-inner-spin-button { 
      -webkit-appearance: none;    
  }
  input[type=number] { 
    -moz-appearance: textfield;
    appearance: textfield;
  }
</style>


<div class="container-row normal">
  <div class="col-12">    
    <div class="row"> 

      <div class="col-2">

        <div class="card shadow border-1">
          <div class="card-header bg-primary text-white text-center">Atendimento Fichas</div>          
          <div class="card-body">                     
            
            <?= $this->Form->create(null, ['url' => ['action' => 'callSenha']]); ?>

            <div class="row text-center">
              <div class="col-12">
                <!--label for="" class="form-control" id="call_senha" style="font-size: 3rem; border: 1px gray black; border-radius: 2px; background-color: RGBA(78,115,223,0.2)"></label-->
                <?php
                echo $this->Form->input('call_senha',
                                        array(
                                            'class' => 'form-control no-radius normal text-center',
                                            'style' => "font-size: 3rem; border: 1px gray black; border-radius: 2px; background-color: RGBA(78,115,223,0.2)",
                                            'id'    => 'call_senha',                                            
                                            'max'   => 30,
                                            'min'   => 0,
                                            'type'  => 'number',
                                            'div'   => false,
                                            'label' => false,                                            
                                        )
                                    );
                ?>
              </div>
            </div>
            
            <div class="row text-center">
              <div class="col-12 mt-1">
                <a link="#" id="less" class="btn btn-danger text-white">-</a>
                <button type="submit" class="btn btn-primary">Chamar</button>
                <a link="#" id="plus" class="btn btn-success text-white">+</a>                          
              </div>
            </div>

            <?= $this->Form->end() ?>

          </div>
        </div>

      </div>


      <!-- 
      <div class="col-8">
        <div class="card border-dark">
          <div class="card-header bg-primary text-white">Identificar Senha</div>
          <div class="card-body">          
            
            <form class="-form-row">

              <div class="row m-auto">                          
            
                <div class="col-1">
                  <label class="ml-0 mr-1" for="">Senha:</label>
                  <select name="senha" id="senha" class="custom-select mr1 ml-1">
                    <option value="">1</option>
                    <option value="">2</option>
                    <option value="">3</option>
                    <option value="">4</option>
                  </select> 
                </div>

                <div class="col-5">
                <label class="ml-1" for="">Localidade:</label>
                <input type="text" list="localidades" class="custom-select mr-1 ml-1">
                <datalist name="localidades" id="localidades">
                  <option value="BAIRRO DOS PIMENTAS">
                  <option value="JARDIM MONTE ALEGRE">
                  <option value="JARDIM SANTO AFONSO">
                </datalist> 
                </div>

                <div class="col-3">
                <label class="ml-1" for="">Fichas:</label>
                <select name="" id="" class="custom-select mr-1 ml-1">
                  <option selected>...</option>                  
                  <option value="">CONFERIDAS</option>
                  <option value="">SEM CONFERÊNCIA</option>
                  <option value="">AGUARDANDO RETORNO</option>
                </select> 
                </div>

                <div class="col-3">
                <label class="ml-1" for="">Envelopes:</label>
                <select name="" id="" class="custom-select mr-1 ml-1">
                  <option selected>...</option>
                  <option value="">CONFERIDAS</option>
                  <option value="">SEM CONFERÊNCIA</option>
                  <option value="">AGUARDANDO RETORNO</option>
                </select>    
                </div>
              
              </div>

              <div class="row m-auto">

                <div class="col-12 text-right mt-4">                            
                  <button class="btn btn-success">Salvar</button>
                  <button class="btn btn-warning">Gerar Relatório</button>
                </div>

              </div>

            </form>

          </div>
        </div>
      </div>
      -->
    </div>        

  
    <div class="row">
      <div class="col-12 mt-2 mb-2">          
          <!-- CARD -->
          <div class="card shadow no-radius border-1">
              <!-- HEADER -->
              <div class="card-header p-2 m-0 d-flex justify-content-between">
                  <?= $this->element('search', [ 'search' => 'Por ID ou Localidade' ]); ?>
              </div>                                                    

              <!-- BODY -->
              <div class="card-body no-border p-0 m-0">

                  <div class="table-responsive table-striped table-sm table-hover m-0" style="overflow-x: visible;">
                      <table id="tableResults" class="table table-bordered p-0 m-0" style="border-bottom: 0px solid white">
                          <thead>
                              <tr>
                                  <?= $this->element('th_sort', [ 'th' => ['10%', 'Users.name', __('Senhas') ] ]); ?>
                                  <?= $this->element('th_sort', [ 'th' => ['30%', 'Users.username', __('Localidades') ] ]); ?>
                                  <?= $this->element('th_sort', [ 'th' => ['20%', 'Users.email', __('Fichas') ] ]); ?>
                                  <?= $this->element('th_sort', [ 'th' => ['20%', 'Users.status', __('Envelopes') ] ]); ?>                                  
                                  <th class="text-center" width="20%"></th>                                  
                              </tr>
                          </thead>
                          <tbody class="tdMiddleAlign">
                              <?php foreach ([] as $user): ?>
                                  <tr class="vAlignMiddle">
                                      <td class="text-left px-3"><?php #h($user->nome) ?></td>
                                      <td class="text-left px-3"><?php #h($user->username) ?></td>
                                      <td class="text-left px-3"><?php #h($user->email) ?></td>
                                      <td class="text-center px-3">
                                          <?php #$this->element('status', [ 'status' => $aevOptions['status'][$user->status] ]); ?>
                                      </td>
                                      <td class="text-center px-3"></td>
                                      <td class="text-center px-3">
                                          <div class="dropdown d-block">
                                              <button class="dropdown-toggle btn btn-primary btn-sm no-radius normal py-0" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                  Opções
                                              </button>
                                              <div class="dropdown-menu dropdown-menu-right -py-2 -m-0" aria-labelledby="acoesListar">
                                                  <a class="dropdown-item"  href="/Users/view/<?= $user->id;?>">
                                                      <i class="fa fa-search text-primary"></i>
                                                      Visualizar
                                                  </a>
                                                  <?php #if($user->id <> 1): ?>
                                                  <a class="dropdown-item" href="/Users/edit/<?= $user->id;?>"
                                                      data-confirm = "Tem certeza que deseja editar o usuário?">
                                                      <i class="fa fa-pencil-alt text-success"></i>
                                                      Editar
                                                  </a>
                                                  <a class="dropdown-item" href="/Users/delete/<?= $user->id;?>"
                                                      data-confirm = "Tem certeza que deseja excluir o usuário?">
                                                      <i class="fas fa-trash-alt text-danger"></i>
                                                      Excluir
                                                  </a>
                                                  <?php #endif; ?>
                                              </div>
                                          </div>
                                      </td>
                                  </tr>
                              <?php endforeach; ?>
                          </tbody>
                      </table>
                  </div>

              </div>

              <!-- FOOTER -->
              <div class="card-footer p-0 m-0"> 
                  <?php #echo $this->element('pager'); ?>
              </div>

          </div>
      </div>
    </div>

  </div>
</div>

<script>

let call_senha = <?= $ultima_senha; ?>;

$("#plus").on("click", function() {
  
  call_senha += 1;

  if(call_senha > 30){
    call_senha = 30;
  }

  $("#call_senha").val(call_senha);

  
});

$("#less").on("click", function() { 
  
  call_senha -= 1;
  
  if(call_senha < 1){
    call_senha = 1;
  }

  $("#call_senha").val(call_senha);

  
});

$("#call_senha").val(<?= $ultima_senha; ?>)

</script>
