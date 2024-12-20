<?php

    $nav = [
        'Usuarios' => ''
    ];

    echo $this->element('breadcrumb', [ 'nav' => $nav ]);
?>

<div class="container-row">
    <div class="col-12">
        <?= $this->Flash->render() ?>
    </div>
</div>

<div class="container-row">
    <div class="col-12">

        <?= $this->element('mobile'); ?>

        <div class="row mobile-hide">

            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mt-2 mb-2">

                <?php if($perfil['admin']): ?>
                <div class="col-12 p-0 mb-2">
                    <a class="btn btn-success no-radius" href="/Users/add">
                        <i class="fa fa-plus fa-sm"></i>
                        <span class="">Novo</span>
                    </a>
                </div>
                <?php endif; ?>

                <!-- CARD -->
                <div class="card shadow no-radius border-1">

                    <!-- HEADER -->
                    <div class="card-header p-2 m-0 d-flex justify-content-between">

                        <?= $this->element('search', [ 'search' => 'Por Nome ou usuário' ]); ?>

                    </div>

                    <!-- BODY -->
                    <div class="card-body no-border p-0 m-0">

                        <div class="table-responsive-sm table-striped table-sm table-hover m-0" style="overflow-x: visible;">
                            <table id="tableResults" class="table table-bordered align-middle p-0 m-0" style="border-bottom: 0px solid white">
                                <thead>
                                    <tr>
                                        <?= $this->element('th_sort', [ 'th' => ['20%', 'Users.name', __('Nome') ] ]); ?>
                                        <?= $this->element('th_sort', [ 'th' => ['10%', 'Users.username', __('Usuário') ] ]); ?>
                                        <?= $this->element('th_sort', [ 'th' => ['10%', 'Users.email', __('E-mail') ] ]); ?>
                                        <?= $this->element('th_sort', [ 'th' => ['05%', 'Users.status', __('Status') ] ]); ?>
                                            <?php if($perfil['admin']): ?>
                                                <th class="text-center" width="10%">Acesso
                                                <th class="text-left" width="45%"></th>
                                            <?php else: ?>
                                                <th class="text-left" width="55%"></th>
                                            <?php endif; ?>
                                        </th>

                                    </tr>
                                </thead>
                                <tbody class="">
                                    <?php foreach ( (object) $users as $user): ?>
                                        <tr class="">
                                            <td class="text-left align-middle"><?= h($user->nome) ?></td>
                                            <td class="text-left align-middle"><?= h($user->username) ?></td>
                                            <td class="text-left align-middle"><?= h($user->email) ?></td>
                                            <td class="text-center align-middle">
                                                <?= $this->element('status', [ 'status' => $aevOptions['status'][$user->status] ]); ?>
                                            </td>

                                            <?php if($perfil['admin']): ?>

                                                <td class="text-center align-middle">

                                                    <?php if($user->acesso != null): ?>
                                                    <?= $user->acesso->format('d/m/Y'); ?>
                                                    <?php endif; ?>

                                                </td>

                                            <?php endif; ?>

                                            <td class="text-left">
                                                <a class="btn btn-link"  href="/Users/view/<?= $user->id;?>">
                                                    <i class="fa fa-search text-primary"></i>
                                                </a>
                                                <?php if($perfil['id'] == $user->id || $perfil['admin']): ?>
                                                    <a class="btn btn-link" href="/Users/edit/<?= $user->id;?>"
                                                        data-confirm = "Tem certeza que deseja editar o usuário?">
                                                        <i class="fa fa-pencil-alt text-success"></i>
                                                    </a>
                                                <?php endif; ?>
                                                <?php if($perfil['admin']): ?>
                                                    <a class="btn btn-link" href="/Users/delete/<?= $user->id;?>"
                                                        data-confirm = "Tem certeza que deseja excluir o usuário?">
                                                        <i class="fas fa-trash-alt text-danger"></i>
                                                    </a>
                                                <?php endif; ?>
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

<script>

    $(document).ready(function() {

        // ToolTip
        $('[data-toggle="tooltip"]').tooltip();

        // Modal
        <?= $this->element('modal_confirm'); ?>

    });

</script>
