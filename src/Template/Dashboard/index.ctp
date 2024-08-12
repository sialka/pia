<?php
    $nav = [
        'Usuarios' => ''
    ];

    echo $this->element('breadcrumb'); 
?>

<!-- Content Row -->
<div class="container-row">

    <div class="row col-lg-12 col-md-12 col-sm-12 d-block m-auto text-center">
        <h1 class='h3 mb-4 dashboard-title'>
            <?= "Reunião da Piedade" ?>
        </h1>
    </div>        
    
    <?= $this->element('mobile'); ?>    
    
    <div class="row justify-content-md-center p-0 m-0 mobile-hide">
        
        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">
            <div class="ml-4">  

              <div class="text-center mb-2 font-weight-bold bg-primary text-white shadow" style="border-radius: 5px">Métricas</div>

              <div class="col-12 p-0 mb-2">
                  <div class="card border-left-primary shadow h-100">                      
                    <div class="card-body p-3">                        
                        <div class="d-flex justify-content-between pt-1">
                            <div class="dash-card-h2 font-weight-bold text-primary text-uppercase pt-1">LOCALIDADES</div>                            
                            <div class="dash-card-h1 font-weight-bold text-gray-800"><?= $localidades; ?></div> 
                        </div>                        
                    </div>                      
                  </div>
              </div>

              <div class="col-12 p-0 mb-2">
                <div class="card border-left-success shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="dash-card-h2 font-weight-bold text-success text-uppercase">CONFERÊNCIA DE FICHAS</div>
                          <div class="dash-card-h1 font-weight-bold text-gray-800"><?= $total_senhas; ?></div>                                
                      </div>                                
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Conferidas: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['fichas']['conferidas'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Sem Conferência: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['fichas']['sem conferencia'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Aguardando retorno: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['fichas']['aguardando retorno'] ?> </div>
                      </div>
                  </div>                        
                </div>
              </div>

              <div class="col-12 p-0 mb-2">                    
                <div class="card border-left-info shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="dash-card-h2 font-weight-bold text-info text-uppercase">RESERVAS</div>
                          <div class="dash-card-h1 font-weight-bold text-gray-800"><?= $total_senhas; ?></div>                                
                      </div>                                
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Conferidas: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['reservas']['conferidas'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Sem Conferência: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['reservas']['sem conferencia'] ?> </div>
                      </div>
                      <div class="d-flex justify-content-between pt-1">
                        <div class="dash-card-h4 mb-0 mr-3 font-weight-bold text-lg text-gray-800">Aguardando retorno: </div>
                        <div class="dash-card-h4 font-weight-bold text-gray-800"><?= $status_services['reservas']['aguardando retorno'] ?> </div>
                      </div>
                  </div> 
                </div>                    
              </div>

            </div>            
        </div>   
        
        
        <div class="col col-xl-4 col-lg-6 col-md-12 col-sm-12">           
            <div class="ml-4">       

              <div class="text-center mb-2 font-weight-bold bg-primary text-white shadow" style="border-radius: 5px">Conferências por Senhas</div>

              <div class="col-12 p-0 mb-2">
                  <div class="card border-left-primary shadow h-100">                      
                    <div class="card-body p-3">                              
                        <div class="d-flex justify-content-between pt-1">
                            <div class="dash-card-h2 dash-card font-weight-bold text-primary text-uppercase">FICHAS</div>                            
                            <div class="dash-card-h1 font-weight-bold text-gray-800"><?= $panels1; ?></div> 
                        </div>                        
                    </div>                      
                  </div>
              </div>

              <div class="col-12 p-0 mb-2">
                <div class="card border-left-success shadow h-100">                        
                  <div class="card-body p-3">                                                        
                      <div class="d-flex justify-content-between pt-1">
                          <div class="dash-card-h2 font-weight-bold text-success text-uppercase">RESERVAS</div>
                          <div class="dash-card-h1 font-weight-bold text-gray-800"><?= $panels2; ?></div>                                
                      </div>                                  
                  </div>                        
                </div>
              </div>

              <div class="text-center mb-2 font-weight-bold bg-primary text-white shadow" style="border-radius: 5px">Prestação de Contas - Envelopes</div>

              <div class="col-12 p-0 mb-2">                    
                <div class="card border-left-info shadow h-100">                        
                  <div class="card-body p-3">                                                                              
                      <div class="dash-card-h2 font-weight-bold text-info text-uppercase">ENVELOPES</div>                                            
                      <div class="dash-card-h3 font-weight-bold text-gray-800 text-right"><?= $panels3; ?></div>                                
                  </div> 
                </div>                    
              </div>

              <div class="text-center mb-2 font-weight-bold bg-primary text-white shadow" style="border-radius: 5px">Atendimento Cartão</div>

              <div class="col-12 p-0 mb-0">                    
                <div class="card border-left-warning shadow h-100">                        
                  <div class="card-body p-3">                                                                              
                      <div class="dash-card-h2 font-weight-bold text-warning text-uppercase">ENVELOPES</div>                                                
                      <div class="dash-card-h3 font-weight-bold text-gray-800 text-right"><?= $panels4; ?></div>                                
                  </div> 
                </div>                    
              </div>

            </div>            
        </div>    
        
    </div>

</div>