<?php
    $nav = [
        'Usuarios' => ''
    ];

    echo $this->element('breadcrumb'); 
?>

<!-- Content Row -->
<div class="container-row">

    <div class="row col-12 d-block m-auto text-center">
        <h1 class='h3 mb-4 dashboard-title'>
            <?= "Reunião da Piedade" ?>
        </h1>
    </div>
    
    <div class="row p-5 m-0">
        
        <div class="col-6">            
            <div class="ml-4">                
              <div class="col-12 p-0 mb-1">
                  <div class="card border-left-primary shadow h-100">
                      <a href="#" style="text-decoration: none" class="btn-light">
                          <div class="card-body p-3">
                              <!-- Administracao - Info Gastos -->
                              <div class="d-flex justify-content-between pt-1">
                                  <div class="h5 font-weight-bold text-primary text-uppercase">LOCALIDADES</div>                            
                                  <div class="h1 font-weight-bold text-gray-800"><?= $localidades; ?></div> 
                              </div>                        
                          </div>
                      </a>
                  </div>
              </div>
              <div class="col-12 p-0 mb-1">
                <div class="card border-left-success shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="h5 font-weight-bold text-success text-uppercase">CONFERÊNCIA DE FICHAS</div>
                          <div class="h1 font-weight-bold text-gray-800"><?= $total_senhas; ?></div>                                
                      </div>                                
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Conferidas: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['fichas']['conferidas'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Sem Conferência: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['fichas']['sem conferencia'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Aguardando retorno: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['fichas']['aguardando retorno'] ?> </div>
                      </div>
                  </div>                        
                </div>
              </div>
              <div class="col-12 p-0 mb-1">                    
                <div class="card border-left-info shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="h5 font-weight-bold text-info text-uppercase">RESERVAS</div>
                          <div class="h1 font-weight-bold text-gray-800"><?= $total_senhas; ?></div>                                
                      </div>                                
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Conferidas: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['reservas']['conferidas'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Sem Conferência: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['reservas']['sem conferencia'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="h5 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Aguardando retorno: </div>
                        <div class="h3 font-weight-bold text-gray-800"><?= $status_services['reservas']['aguardando retorno'] ?> </div>
                      </div>
                  </div> 
                </div>                    
              </div>
            </div>            
        </div>   
        
        <div class="col-6">            
            <div class="ml-4">       

              <div class="col-12 p-0 mb-5">
                  <div class="card border-left-primary shadow h-100">                      
                    <div class="card-body p-3">                              
                        <div class="d-flex justify-content-between pt-1">
                            <div class="h5 font-weight-bold text-primary text-uppercase">ÚLTIMA SENHA CONFERÊNCIA DE FICHA</div>                            
                            <div class="h1 font-weight-bold text-gray-800"><?= $panels1; ?></div> 
                        </div>                        
                    </div>                      
                  </div>
              </div>

              <div class="col-12 p-0 mb-5">
                <div class="card border-left-success shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="h5 font-weight-bold text-success text-uppercase">ÚLTIMA SENHA RESERVA</div>
                          <div class="h1 font-weight-bold text-gray-800"><?= $panels2; ?></div>                                
                      </div>                                  
                  </div>                        
                </div>
              </div>

              <div class="col-12 p-0 mb-5">                    
                <div class="card border-left-info shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="h5 font-weight-bold text-info text-uppercase">CONFERÊNCIA DE ENVELOPES</div>
                          <div class="h1 font-weight-bold text-gray-800"><?= $panels3; ?></div>                                
                      </div>
                  </div> 
                </div>                    
              </div>

              <div class="col-12 p-0 mb-1">                    
                <div class="card border-left-warning shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="h5 font-weight-bold text-warning text-uppercase">ATENDIMENTO ENVELOPES</div>
                          <div class="h1 font-weight-bold text-gray-800"><?= $panels4; ?></div>                                
                      </div>
                  </div> 
                </div>                    
              </div>

            </div>            
        </div>    
        
    </div>

</div>