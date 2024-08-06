<?php  

  $titulo = [
    1 => "Conferência de Fichas",
    2 => "Reserva de Roupas",
    3 => "Conferência de Envelopes",
    4 => "Atendimento",
  ];

  $recupera_session = $this->request->session()->read('painel-senha');
  
  if($recupera_session != []){
    $topo = $recupera_session[0];
    $senha_topo = explode(",",$topo);
    
    $senha = $senha_topo[0];
    $tipo = $senha_topo[1];
  }else{
    $tipo = null;
    $senha = 0;
  }

  $novo = array_slice($recupera_session, 1, count($recupera_session));
  $this->request->session()->write('painel-senha', $novo);
  
?>
<div class="row bg-black"> 
  <divc class="col">
    <div class="card border-dark m-1">
      <div class="card-header text-white bg-dark painel">
        <a href="/" class="text-white">CCB - SETOR 4 - PAINEL</a>
      </div>
        <div class="card-body" style="height: 92vh">

        <!-- select id="vozes" size="3" -style="display: none"></select -->

        <?php           
          echo $this->Form->create(null, ['url' => ['action' => '?page='.$pagina_index.'']]); 
          echo "<input id='submit' type='submit' class='hide', value='send'>";
          echo $this->Form->end();
        ?>

          <!-- Fluxo 1  -->
          <div id="senha" class="<?php if( $senha == "0" ){ echo "hide"; } ?>">   
              <div class="" style="height: 88vh">                                
                  <div class="" style="height: 100%" >                    
                    <p class="titulo" style="height: 35%; padding-top: 14rem"><?= $titulo[$tipo]; ?></p>         

                    <?php $class = $tipo == 3 || $tipo == 4 ? 'call-senha-localidade' : 'call-senha'; ?>
                    <p id="chamar-senha" class="<?= $class ?> wobble-hor-bottom"><?= $senha; ?></p>                                  
                  </div>                  
              </div>
          </div>

          <!-- Fluxo 2 -->
          <div id="painel" class="<?php if( $senha != "0" ){ echo "hide"; } ?>">      
          
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

// Voice

const synth = window.speechSynthesis;

let voices = [];

function speak(texto) {

  if (synth.speaking) {
    console.error("speechSynthesis.speaking");
    return;
  }
  
  const utterThis = new SpeechSynthesisUtterance(texto);

  utterThis.onend = function (event) {
    console.log("SpeechSynthesisUtterance.onend");
  };

  utterThis.onerror = function (event) {
    console.error("SpeechSynthesisUtterance.onerror");
  };

  utterThis.voice = voices[8]; // 8 brazil

  utterThis.pitch = 1; 
  utterThis.rate = 1.1; 
  synth.speak(utterThis);
  
}

// fim voice
const senha = "<?= $senha; ?>";
const tipo = "<?= $tipo; ?>";

function carregar() {
  console.log("carregar");  

  if (senha != 0) {
    // Fluxo 1 - Verifica se existe senhas
    console.log("Fluxo chamar Senhas !!!!");
    
    sleep(3000).then(() => {             
        //window.location.reload();        
        $("#submit").click();
    });         
      
  } else {
    // Fluxo 2 - Exibe painel
    console.log("Exibir Senhas identificadas !!!");

    sleep(3000).then(() => {          
        $("#submit").click();
    }); 
  }
}

// builtin

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

const panel = document.querySelector('#chamar-senha')

panel.addEventListener('animationstart', event => {      
      
    let fala = "";

    switch (tipo) {
      case '1':
        fala = " Conferência de Fichas!";    
        frase = 'senha ' + senha + fala;    
        break;
      case '2':
        fala = " Reserva de roupas!";
        frase = 'senha ' + senha + fala;    
        break;
      case '3': 
        fala = " Conferência de envelopes!";    
        frase = senha + fala;    
        break;    
      case '4':         
        frase = senha;    
        break;    
    }   
    
    console.log(frase);
    speak(frase);
});

carregar();

</script>