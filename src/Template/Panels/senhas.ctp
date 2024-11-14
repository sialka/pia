<?php

$senha = '0';
$class_trava = $trava == "1" ? "hide" : "";
$class_senhas = $senha != "0" ? "hide" : "";

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

          <!-- Painel Bloqueado -->
          <div id="senha" class="<?= $class_trava; ?>">
              <div class="" style="height: 88vh">
                  <div class="" style="height: 100%" >
                    <p class="titulo" style="height: 35%; padding-top: 14rem">Painel Bloqueado</p>
                  </div>
              </div>
          </div>

          <!-- Listagem de Senhas -->
          <div id="painel" class="<?= $class_senhas; ?>">
            <table id="tableResults" class="table p-0 m-0" style="border: 0px solid white">
                <tbody class="">
                    <?php foreach ((object) $dados as $dado): ?>
                        <tr class="normal">
                          <th class="" style="border: 0px solid white">

                            <div class="row mt-1 mb-1 ml-2 mr-2">
                              <div class="col-2">
                                <div class="card border-dark center">
                                  <div id="row1-senha" class="card-body senha"><?= $dado->senha; ?></div>
                                  <div class="card-footer senha-label -text-white -bg-dark -text-white">SENHA</div>
                                </div>
                              </div>
                              <div class="col-10">
                                <div id="row1-card-border" class="card border-dark">
                                  <div id="row1-localidade" class="card-body localidade">
                                    <?= $dado->Localidades->nome; ?>
                                  </div>
                                  <div class="text-center m-0 font-weight-bold">
                                      <div id="row1-status-ficha" class="status left <?= $aevOptions['status_css_ficha'][$dado->status_ficha]; ?>">
                                        <?= $aevOptions['status_fichas'][$dado->status_ficha]; ?>
                                      </div>
                                      <div id="row1-status-envelope" class="status right <?= $aevOptions['status_css_envelope'][$dado->status_envelope]; ?>">
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

const trava = "<?php echo $trava; ?>";
const tempo = 3000;

function carregar() {
  console.log("> Function - Carregar()");

  if (trava == '0'){
    console.log("> Painel travado");
    return;
  }

  // Fluxo 2 - Exibe painel
  console.log("> Exibir Senhas identificadas !!!");

  sleep(tempo).then(() => {
    $("#submit").click();
  });
}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}

carregar();

</script>