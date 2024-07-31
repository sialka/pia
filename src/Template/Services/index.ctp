
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


<div class="container-row">
  <div class="row">

    <div class="col-3">    

      <div class="row">       
        <div class="col-12 pl-4 pr-4">
          <div class="card shadow border-1">
            <div class="card-header bg-primary text-white text-center text-normal">Atendimento Fichas</div>          
            <div class="card-body">
              <?= $this->Form->create(null, ['url' => ['action' => 'callSenha']]); ?>
              <div class="row text-center">
                <div class="col-12">                
                  <?=
                    $this->Form->input('call_senha',
                      array(
                          'class' => 'form-control no-radius text-center',
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
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="less" class="btn btn-block btn-danger text-white" style="font-size: 0.9rem">-</a>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <button type="submit" class="btn btn-block btn-primary" style="font-size: 0.9rem">Chamar</button>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="plus" class="btn btn-block btn-success text-white" style="font-size: 0.9rem">+</a>                          
                  </div>              
              </div>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>  
      </div>

      <div class="row mt-4">       
        <div class="col-12 pl-4 pr-4">
          <div class="card shadow border-1">
            <div class="card-header bg-warning text-dark text-center text-normal">Atendimento Reserva</div>          
            <div class="card-body">
              <?= $this->Form->create(null, ['url' => ['action' => '']]); ?>
              <div class="row text-center">
                <div class="col-12">                
                  <?= 
                  $this->Form->input('call_senha',
                    array(
                        'class' => 'form-control no-radius text-center',
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
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="less" class="btn btn-block btn-danger text-white" style="font-size: 0.9rem">-</a>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <button type="submit" class="btn btn-block btn-primary" style="font-size: 0.9rem">Chamar</button>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="plus" class="btn btn-block btn-success text-white" style="font-size: 0.9rem">+</a>                          
                  </div>              
              </div>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>

      <div class="row mt-4">       
        <div class="col-12 pl-4 pr-4">
          <div class="card shadow border-1">
            <div class="card-header bg-info text-dark text-center text-normal">Atendimento Envelopes</div>          
            <div class="card-body">
              <?= $this->Form->create(null, ['url' => ['action' => '']]); ?>
              <div class="row text-center">
                <div class="col-12">                
                  <?= 
                  $this->Form->input('call_senha',
                    array(
                        'class' => 'form-control no-radius text-center',
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
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="less" class="btn btn-block btn-danger text-white" style="font-size: 0.9rem">-</a>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <button type="submit" class="btn btn-block btn-primary" style="font-size: 0.9rem">Chamar</button>
                  </div>
                  <div class="col-4 mt-1 p-1">
                    <a link="#" id="plus" class="btn btn-block btn-success text-white" style="font-size: 0.9rem">+</a>                          
                  </div>              
              </div>
              <?= $this->Form->end() ?>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-9 pr-5">    
      
      <div class="row mt-2">  
        <div class="col-12">
          
          <a class="btn btn-success no-radius" href="/Services/add">
              <i class="fa fa-plus fa-sm"></i>
              <span class="text-normal">Novo</span>
          </a>

          <a class="btn btn-primary no-radius ml-1" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-whatsapp" viewBox="0 0 16 16">
                <path d="M13.601 2.326A7.85 7.85 0 0 0 7.994 0C3.627 0 .068 3.558.064 7.926c0 1.399.366 2.76 1.057 3.965L0 16l4.204-1.102a7.9 7.9 0 0 0 3.79.965h.004c4.368 0 7.926-3.558 7.93-7.93A7.9 7.9 0 0 0 13.6 2.326zM7.994 14.521a6.6 6.6 0 0 1-3.356-.92l-.24-.144-2.494.654.666-2.433-.156-.251a6.56 6.56 0 0 1-1.007-3.505c0-3.626 2.957-6.584 6.591-6.584a6.56 6.56 0 0 1 4.66 1.931 6.56 6.56 0 0 1 1.928 4.66c-.004 3.639-2.961 6.592-6.592 6.592m3.615-4.934c-.197-.099-1.17-.578-1.353-.646-.182-.065-.315-.099-.445.099-.133.197-.513.646-.627.775-.114.133-.232.148-.43.05-.197-.1-.836-.308-1.592-.985-.59-.525-.985-1.175-1.103-1.372-.114-.198-.011-.304.088-.403.087-.088.197-.232.296-.346.1-.114.133-.198.198-.33.065-.134.034-.248-.015-.347-.05-.099-.445-1.076-.612-1.47-.16-.389-.323-.335-.445-.34-.114-.007-.247-.007-.38-.007a.73.73 0 0 0-.529.247c-.182.198-.691.677-.691 1.654s.71 1.916.81 2.049c.098.133 1.394 2.132 3.383 2.992.47.205.84.326 1.129.418.475.152.904.129 1.246.08.38-.058 1.171-.48 1.338-.943.164-.464.164-.86.114-.943-.049-.084-.182-.133-.38-.232"/>
              </svg>
              <span class="text-normal">Resumo</span>
          </a>


          <!-- Perfil Adm Talvez-->

          <a class="btn btn-danger no-radius ml-1" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-easel2-fill" viewBox="0 0 16 16">
                <path d="M8.447.276a.5.5 0 0 0-.894 0L7.19 1H2.5A1.5 1.5 0 0 0 1 2.5V10h14V2.5A1.5 1.5 0 0 0 13.5 1H8.809z"/>
                <path fill-rule="evenodd" d="M.5 11a.5.5 0 0 0 0 1h2.86l-.845 3.379a.5.5 0 0 0 .97.242L3.89 14h8.22l.405 1.621a.5.5 0 0 0 .97-.242L12.64 12h2.86a.5.5 0 0 0 0-1zm3.64 2 .25-1h7.22l.25 1z"/>
              </svg>
              <span class="text-normal">Reiniciar</span>
          </a>

        </div>
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
                          <?php foreach ($services as $service): #debug($service);?>
                            <tr class="vAlignMiddle">
                              <td class="text-left px-3"><?= h($service->senha) ?></td>
                              <td class="text-left px-3"><?= h($service->Localidades->nome) ?></td>
                              <td class="text-center px-3">                                
                                <?= $this->element('status_services', [ 'status' => $service->status_ficha, 'tipo' => 'status_fichas']); ?>
                              </td>
                              <td class="text-center px-3">
                                  <?= $this->element('status_services', [ 'status' => $service->status_envelope, 'tipo' => 'status_envelopes']); ?>
                              </td>                                
                              <td class="text-center px-3">
                                <div class="dropdown d-block">
                                  <button class="dropdown-toggle btn btn-primary btn-sm no-radius py-0" type="button" id="acoesListar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                      Opções
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-right -py-2 -m-0" aria-labelledby="acoesListar">
                                      <a class="dropdown-item"  href="/Services/view/<?= $service->id;?>">
                                          <i class="fa fa-search text-primary"></i>
                                          Visualizar
                                      </a>
                                      <?php #if($user->id <> 1): ?>
                                      <a class="dropdown-item" href="/Services/edit/<?= $service->id;?>"
                                          data-confirm = "Tem certeza que deseja editar o usuário?">
                                          <i class="fa fa-pencil-alt text-success"></i>
                                          Editar
                                      </a>
                                      <a class="dropdown-item" href="/Services/delete/<?= $service->id;?>"
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
                    <?php echo $this->element('pager'); ?>
                </div>

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
