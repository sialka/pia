<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'Sistema de Apoio';
$usuario         = $this->request->session()->read('logado');
$perfil          = $this->request->session()->read('perfil');
$controller      = $this->request->params['controller'];    
$body            = $controller == "Panels" ? "" : "page-top";
$wrapper         = $controller == "Panels" ? "" : "wrapper";
$overflow        = $controller == "Panels" ? "overflow: hidden" : "";

?>

<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
        <?= $cakeDescription ?>
    </title>

    <?= $this->Html->meta('icon') ?>

    <!-- Custom fonts for this template-->
    <?= $this->Html->css('fontawesome-free/css/all.min.css') ?>
    <?= $this->Html->css('fontawesome-free/css/fontawesome.min.css') ?>        
    <?php #$this->Html->css('font-awesome-4.7.0/css/font-awesome.min.css') ?>    
    
    <!-- link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet" -->
    
    <?= $this->Html->css('bootstrap.min') ?>
    <?= $this->Html->css('sb-admin-2.css') ?>
    <?= $this->Html->css('sb-add.css') ?>
    <?= $this->Html->css('typeahead.css') ?>

    <?php
    if ($controller == 'Panels'){
        echo $this->Html->css('animation.css');
    }    
    ?>


    <!-- Date Picker -->
    <?= $this->Html->css('date-picker/bootstrap-datepicker.css') ?>
    <?= $this->Html->css('date-picker/bootstrap-datepicker3.css') ?>

    <!-- Bootstrap core JavaScript-->
    <?= $this->Html->script('vendor/jquery/jquery.min.js') ?>
    <?= $this->Html->script('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>

    <!-- Core plugin JavaScript-->
    <?= $this->Html->script('vendor/jquery-easing/jquery.easing.min.js') ?>


    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

    <?php // Info controller $this->fetch('title') ?>
</head>
<body id="$body;" style="<?= $overflow; ?>">
    <!-- Page Wrapper -->
    <div id="<?= $wrapper; ?>">


        <!-- Sidebar :: col [1/2] -->
        <?php if ($controller != 'Panels'): ?>
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/Dashboard/index">
                <div class="sidebar-brand-icon">            
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" viewBox="0 0 640 512">
                        <path d="M160 64c0-35.3 28.7-64 64-64L576 0c35.3 0 64 28.7 64 64l0 288c0 35.3-28.7 64-64 64l-239.2 0c-11.8-25.5-29.9-47.5-52.4-64l99.6 0 0-32c0-17.7 14.3-32 32-32l64 0c17.7 0 32 14.3 32 32l0 32 64 0 0-288L224 64l0 49.1C205.2 102.2 183.3 96 160 96l0-32zm0 64a96 96 0 1 1 0 192 96 96 0 1 1 0-192zM133.3 352l53.3 0C260.3 352 320 411.7 320 485.3c0 14.7-11.9 26.7-26.7 26.7L26.7 512C11.9 512 0 500.1 0 485.3C0 411.7 59.7 352 133.3 352z"/>
                    </svg>
                </div>
                <div class="sidebar-brand-text mx-3">PIA 1.0</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/Dashboard/index">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer2" viewBox="0 0 16 16">
                        <path d="M8 4a.5.5 0 0 1 .5.5V6a.5.5 0 0 1-1 0V4.5A.5.5 0 0 1 8 4zM3.732 5.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 10a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 10zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 9.31a.91.91 0 1 0 1.302 1.258l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                        <path fill-rule="evenodd" d="M0 10a8 8 0 1 1 15.547 2.661c-.442 1.253-1.845 1.602-2.932 1.25C11.309 13.488 9.475 13 8 13c-1.474 0-3.31.488-4.615.911-1.087.352-2.49.003-2.932-1.25A7.988 7.988 0 0 1 0 10zm8-7a7 7 0 0 0-6.603 9.329c.203.575.923.876 1.68.63C4.397 12.533 6.358 12 8 12s3.604.532 4.923.96c.757.245 1.477-.056 1.68-.631A7 7 0 0 0 8 3z"/>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Menu
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <?php             
            if($perfil['user'] || $perfil['localidade'] || $perfil['setores']){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 576 512">
                        <path d="M64 32C28.7 32 0 60.7 0 96L0 416c0 35.3 28.7 64 64 64l448 0c35.3 0 64-28.7 64-64l0-320c0-35.3-28.7-64-64-64L64 32zm80 256l64 0c44.2 0 80 35.8 80 80c0 8.8-7.2 16-16 16L80 384c-8.8 0-16-7.2-16-16c0-44.2 35.8-80 80-80zm-32-96a64 64 0 1 1 128 0 64 64 0 1 1 -128 0zm256-32l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16zm0 64l128 0c8.8 0 16 7.2 16 16s-7.2 16-16 16l-128 0c-8.8 0-16-7.2-16-16s7.2-16 16-16z"/>
                    </svg>                    
                    <span>Cadastro</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Sistema:</h6>
                        <?php if($perfil['user']){ ?>
                            <a class="collapse-item" href="/Users">Usuários</a>
                        <?php } ?>
                        <?php if($perfil['localidade']){ ?>
                            <a class="collapse-item" href="/Localidades">Localidades</a>
                        <?php } ?>
                        <?php if($perfil['setores']){ ?>
                            <a class="collapse-item" href="/Setores">Setores</a>
                        <?php } ?>
                    </div>
                </div>                
            </li>
            <?php } ?>
            
            <!-- Nav Item - Utilities Collapse Menu -->
            <?php if($perfil['atendimento']){ ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <!--
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-earmark-excel-fill" viewBox="0 0 16 16">
                        <path d="M9.293 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V4.707A1 1 0 0 0 13.707 4L10 .293A1 1 0 0 0 9.293 0zM9.5 3.5v-2l3 3h-2a1 1 0 0 1-1-1zM5.884 6.68 8 9.219l2.116-2.54a.5.5 0 1 1 .768.641L8.651 10l2.233 2.68a.5.5 0 0 1-.768.64L8 10.781l-2.116 2.54a.5.5 0 0 1-.768-.641L7.349 10 5.116 7.32a.5.5 0 1 1 .768-.64z"/>
                    </svg>
                    -->                        
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" viewBox="0 0 640 512">                        
                        <path d="M360 72a40 40 0 1 0 -80 0 40 40 0 1 0 80 0zM144 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM32 416c-17.7 0-32 14.3-32 32s14.3 32 32 32l576 0c17.7 0 32-14.3 32-32s-14.3-32-32-32L32 416zM496 208a40 40 0 1 0 0-80 40 40 0 1 0 0 80zM200 313.5l26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-36.3-67.5c1.7-1.7 3.2-3.6 4.3-5.8L264 217.5l0 54.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-54.5 26.9 49.9c1.2 2.2 2.6 4.1 4.3 5.8l-36.3 67.5c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L440 313.5l0 38.5c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5 26.9 49.9c6.3 11.7 20.8 16 32.5 9.8s16-20.8 9.8-32.5l-37.9-70.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-16.3 0-31.9 4.5-45.4 12.6l-33.6-62.3c-15.3-28.5-45.1-46.3-77.5-46.3l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3l-33.6 62.3c-13.5-8.1-29.1-12.6-45.4-12.6l-19.5 0c-32.4 0-62.1 17.8-77.5 46.3L18.9 340.6c-6.3 11.7-1.9 26.2 9.8 32.5s26.2 1.9 32.5-9.8L88 313.5 88 352c0 17.7 14.3 32 32 32l48 0c17.7 0 32-14.3 32-32l0-38.5z"/>
                    </svg>
                    <span>Atendimento</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Ações:</h6>
                        <a class="collapse-item" href="/Services/index">Lançar</a>
                        <a class="collapse-item" href="/Panels" target="_blank">Painel</a>
                    </div>
                </div>
            </li>
            <?php } ?>
            
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <?php endif; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper :: col [2/2] -->        
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php if ($controller != 'Panels'): ?>
                <nav class="navbar navbar-expand navbar-light bg-white topbar p-0 static-top shadow">                    

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        
                        <li class="nav-item dropdown no-arrow text-white" style="background-color: #9EC5FE">
                                
                            <div class="d-flex dropdown-toggle ml-2 mr-2" id="alertsDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                                <div class="d-flex align-items-center p-1" style="cursor: pointer">                                    
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512" width="18" height="18" fill="currentColor">                                        
                                        <path d="M408 120c0 54.6-73.1 151.9-105.2 192c-7.7 9.6-22 9.6-29.6 0C241.1 271.9 168 174.6 168 120C168 53.7 221.7 0 288 0s120 53.7 120 120zm8 80.4c3.5-6.9 6.7-13.8 9.6-20.6c.5-1.2 1-2.5 1.5-3.7l116-46.4C558.9 123.4 576 135 576 152l0 270.8c0 9.8-6 18.6-15.1 22.3L416 503l0-302.6zM137.6 138.3c2.4 14.1 7.2 28.3 12.8 41.5c2.9 6.8 6.1 13.7 9.6 20.6l0 251.4L32.9 502.7C17.1 509 0 497.4 0 480.4L0 209.6c0-9.8 6-18.6 15.1-22.3l122.6-49zM327.8 332c13.9-17.4 35.7-45.7 56.2-77l0 249.3L192 449.4 192 255c20.5 31.3 42.3 59.6 56.2 77c20.5 25.6 59.1 25.6 79.6 0zM288 152a40 40 0 1 0 0-80 40 40 0 1 0 0 80z"/>
                                    </svg>
                                </div>

                                <div class="d-flex px-1" style="cursor: pointer">
                                    <div class="d-flex flex-column normal text-center m-auto" style="color: #052C65">                                        
                                        <p class="m-0 small text-primary-500">Setores</p>
                                        <p class="m-0 strong">
                                            <?php 
                                            #$mes;  
                                            echo "4 - Pimentas"; 
                                            ?>
                                        </p>
                                    </div>
                                </div>

                                <div class="d-flex align-items-center p-1">                                    
                                    <a class="nav-link p-0 " href="#" role="button">
                                        <!-- Implementar Fase 2 -->
                                        <?php #if(sizeof($meses) > 0) { ?>
                                        <!--i class="fa fa-caret-down fa-fw text-white"></i-->
                                        <?php #} ?>
                                    </a>
                                </div>

                            </div>                                
                            
                            <!-- Dropdown - Alerts -- >
                            <?php /*if(sizeof($meses) > 0) { ?>
                            <div class="dropdown-menu dropdown-menu-right no-radius shadow animated--grow-in border-1 mes-padrao-scrollbar" aria-labelledby="alertsDropdown">                                
                                <?php foreach($meses as $item) { ?>
                                <a class="dropdown-item d-flex align-items-center" href="/ncs/padrao/<?= $item->id ?>">
                                    <div class="mr-3">                                        
                                        <i class="fa fa-arrow-right fa-fw text-gray-500"></i>
                                    </div>                                         
                                    <span class="strong">
                                        <?php "{$item->mes}/{$item->ano}" ?>
                                    </span>
                                </a>
                                <?php } ?>
                            </div>
                            <?php } */?>
                            -->
                        </li>

                        <!--div class="topbar-divider d-none d-sm-block mx-2"></div-->

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle -pt-2" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">                                
                                <span class="mr-2 pl-4 d-none d-lg-inline text-gray-600 small"><?= $usuario ?></span>
                                <?php 
                                # /stecho $this->Html->image('undraw_profile.svg', ["class"=>"img-profile rounded-circle"]);                                 
                                $iniciais = $this->request->session()->read('iniciais');                              
                                ?>                                
                                <div class="bg-dark text-white strong normal p-2" style="border-radius: 50%; font-size: 1rem"><?= $iniciais; ?></div>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right no-radius border-1 mr-2 shadow animated--grow-in" aria-labelledby="userDropdown">                                
                                <a class="dropdown-item" href="/Users/perfil">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-800"></i>
                                    Perfil
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="/Users/logout" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-danger"></i>
                                    Sair
                                </a>                                
                            </div>
                        </li>

                    </ul>

                </nav>
                <?php endif; ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->                
                <div class="container-fluid p-0">
                    <?= $this->fetch('content') ?>
                </div>                
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>        
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <?php if ($controller != 'Panels'): ?>
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>
    <?php endif; ?>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white p-3">
                    <h5 class="modal-title" id="exampleModalLabel">Atenção</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Tem certeza que deseja sair do sistema ?</div>
                <div class="modal-footer">

                    <a class="btn btn-success no-radius" href="/Users/logout">
                        <i class="fa fa-check"></i>
                        Sair
                    </a>

                    
                    <button class="btn btn-link no-link text-primary" type="button" data-dismiss="modal">
                        <i class="fa fa-reply"></i>
                        Cancelar
                    </button>
                    
                </div>
            </div>
        </div>
    </div>

</body>
</html>

<!-- Custom scripts for all pages-->
<?= $this->Html->script('sb-admin-2.js') ?>
<!-- JQ Mask -->
<?= $this->Html->script('mask/jquery.mask.min.js') ?>
<!-- Date-Picker -->
<?= $this->Html->script('date-picker/js/bootstrap-datepicker.js') ?>
<?= $this->Html->script('date-picker/locales/bootstrap-datepicker.pt-BR.min.js') ?>

<!-- Teste -->
<?= $this->Html->script('typeahead.js') ?>


<script>
    // Validações de Formulario Bootstrap
    
    (function() {
      'use strict';
      window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');        
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();

</script>