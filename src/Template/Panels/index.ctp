<?php
  $titulo = [
    1 => "Conferência de Ficha",
    2 => "Reserva de Roupa",
    3 => "Conferência de Envelopes",
  ];
?>

<div class="row bg-black"> 
  <divc class="col">
    <div class="card border-dark m-1">
      <div class="card-header text-white bg-dark painel">
        <a href="/" class="text-white">CCB - SETOR 4 - PAINEL</a>
      </div>
        <div class="card-body" style="height: 92vh">

        <?php           
          echo $this->Form->create(null, ['url' => ['action' => '?page='.$pagina_index.'']]); 
          echo "<input id='submit' type='submit' class='hide', value='send'>";
          echo $this->Form->end();
        ?>

          <!-- Fluxo 1  -->
          <div id="senha" class="<?php if( $senha == 0 ){ echo "hide"; } ?>">   
              <div class="" style="height: 88vh">                                
                  <div class="" style="height: 100%" >                    
                    <p class="titulo" style="height: 35%; padding-top: 15rem"><?= $titulo[$tipo]; ?></p>                
                    <p id="chamar-senha" class="call-senha"><?= $senha; ?></p>              
                  </div>                  
              </div>
          </div>

          <!-- Fluxo 2 -->
          <div id="painel" class="<?php if( $senha != 0 ){ echo "hide"; } ?>">      
          
            <table id="tableResults" class="table p-0 m-0" style="border: 0px solid white">
                <tbody class="">
                    <?php foreach ($dados as $dado): #debug($dado)?>
                        <tr class="normal">
                          <th class="" style="border: 0px solid white">                            

                            <div class="row mt-4 mb-4 ml-2 mr-2">
                              <div class="col-2">
                                <div class="card border-dark center">
                                  <div id="row1-senha" class="card-body senha text-dark"><?= $dado->senha; ?></div>
                                  <div class="card-footer text-white bg-primary">SENHA</div>
                                </div>
                              </div>
                              <div class="col-10">
                                <div id="row1-card-border" class="card border-dark">
                                  <div id="row1-localidade" class="card-body senha text-dark">
                                    <?= $dado->Localidades->nome; ?>
                                  </div>
                                  <div class="text-center m-0 font-weight-bold">
                                      <div id="row1-status-ficha" style="width:50%; padding: 0.8em; float: left" class="<?= $aevOptions['status_css_ficha'][$dado->status_ficha]; ?>">
                                        <?= $aevOptions['status_fichas'][$dado->status_ficha]; ?>
                                      </div>  
                                      <div id="row1-status-envelope" style="width:50%; padding: 0.8em; float: right" class="<?= $aevOptions['status_css_envelope'][$dado->status_envelope]; ?>">
                                        <?= $aevOptions['status_envelopes'][$dado->status_envelope]; ?>                                          
                                      </div>  
                                  </div>
                                </div>
                              </div>                      
                            </div>            
                          </th>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

          </div>

        </div>
      </div>
    </div>
  </div>
</div>            

<script>

const senha = "<?= $senha; ?>";

function carregar() {
  console.log("carregar");  

  if (senha != 0) {
    // Fluxo 1 - Verifica se existe senhas
    console.log("Fluxo chamar Senhas !!!!");

    // Usage!
    sleep(4000).then(() => {          
        window.location.reload();
    });     
    
      
  } else {
    // Fluxo 2 - Exibe painel
    console.log("Exibir Senhas identificadas !!!");

    /*
      TODO:
      - Receber o array com as senhas identificadas com ordem inversa
      - Enviar info de 3 em 3
      - Criar logica saber quais devem enviar a cada fluxo
      - Mudar logica enviando diretamente os dados Show Panel
      */

    // Usage!
    sleep(4000).then(() => {          
        $("#submit").click();
    }); 
  }
}

// builtin

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

carregar();

</script>