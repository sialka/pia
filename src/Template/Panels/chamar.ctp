<?php

  $titulo = [
    1 => "Conferência de Fichas",
    2 => "Reserva de Roupas",
    3 => "Conferência de Envelopes",
    4 => "Atendimento",
  ];

  $voz = $dados->fala;
  $senha = $dados->senha;
  $tipo = $dados->tipo;
  $class_trava = $trava == "1" ? "hide" : "";
  $class_senha = $senha == "0" ? "hide" : "";

?>
<div class="row bg-black">

  <div class="col">

    <div class="card border-dark m-1 mobile-panel-hide">

      <div class="card-header text-white bg-primary painel ">
        <a href="/Panels" class="text-white">CCB - PAINEL SENHAS</a>
      </div>
        <div class="card-body" style="height: 90vh">

        <?php
          echo $this->Form->create(null, ['url' => ['action' => '?page='.$pagina_index.'']]);
          echo $this->Form->button('submit', ['type' => 'submit', 'class' => 'hide', 'id' => 'submit']);
          echo $this->Form->end();
        ?>

          <div id="senha" class="<?= $class_trava; ?>">
              <div class="" style="height: 88vh">
                  <div class="" style="height: 100%" >
                    <p class="titulo" style="height: 35%; padding-top: 14rem">Painel Bloqueado</p>
                  </div>
              </div>
          </div>


          <!-- Chamar Senha -->
          <div id="senha" class="<?= $class_senha; ?>">
              <div class="" style="height: 88vh">
                  <div class="" style="height: 100%" >
                    <p class="titulo" style="height: 35%; padding-top: 14rem"><?= $titulo[$tipo]; ?></p>

                    <?php $class = $tipo == 3 || $tipo == 4 ? 'call-senha-localidade' : 'call-senha'; ?>
                    <p id="chamar-senha" class="<?= $class ?> wobble-hor-bottom">
                      <?= $senha; ?>
                    </p>
                  </div>
              </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script>

// Voice

let voices = [];
const synth = window.speechSynthesis;
const trava = "<?php echo $trava; ?>";

function speak(texto) {

    if (trava == '0'){
      return;
    }

    let voices = synth.getVoices();

    for (let i = 0; i < voices.length; i++) {
      if(voices[i].lang == "pt-BR") {
        console.log(`> ${i} - ${voices[i].lang} - ${voices[i].name}`)
      }
    }

    if (synth.speaking) {
      console.error("> synth.speaking (true)");
      return;
    }

    const utterThis = new SpeechSynthesisUtterance(texto);

    utterThis.onend = function (event) {
      console.log("> utterThis.onend: " + event);
    };

    utterThis.onerror = function (event) {
      console.error("> utterThis.onerror: " + event);
    };

    utterThis.voice = voices[<?= $sintetizador; ?>];

    utterThis.pitch = 1;
    utterThis.rate = 1.1;
    synth.speak(utterThis);


}

// fim voice
const senha = "<?= $voz; ?>";
const tipo = "<?= $tipo; ?>";

function carregar() {
  console.log("> Carregar() ");

  if (trava == '0'){
    return;
  }


    // Fluxo 1 - Verifica se existe senhas
    console.log("> Fluxo chamar Senhas !!!!");

    sleep(3000).then(() => {
        $("#submit").click();
    });



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
      case '4': // Retorno da mesa
        frase = senha;
        break;
    }

    console.log(`> Fala: ${frase}`);
    speak(frase);
});

carregar();

</script>