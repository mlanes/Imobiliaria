<!DOCTYPE html>
<html>
    <head>
        <?= $bootstrapHelper->css() ?>
        <?= $styleHelper->css() ?>
    </head>
    <body>
        <?php
            require_once parent::loadView('Layout', 'menu_superior_admin');
        ?>
        <div id="wrapper">
            <?php require_once parent::loadView('Layout', 'menu_lateral_admin'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid xyz">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1>Acesso ao Sistema</h1>
                            <?=
                                $linkHelper->link(
                                    'Cadastrar',
                                    [
                                        'Controller' => $this->controller,
                                        'Action' => 'Add',
                                    ],
                                    [
                                        'title' => 'Cadastrar Acesso ao Sistema',
                                        'class' => 'btn btn-sm btn-success'
                                    ]
                                )
                            ?>
                            <hr/>
                            <p>Total: <b><?= $count ?> itens.</b></p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>Código</td>
                                        <td>Status</td>
                                        <td>Login</td>
                                        <td>Senha</td>
                                        <td colspan="3">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($acessos as $acesso) {
                                        ?>
                                        <tr>
                                            <td><?= $acesso->cd_acesso ?></td>
                                            <td><?= $acesso->ic_status ?></td>
                                            <td><?= $acesso->nm_login ?></td>
                                            <td><?= $acesso->nm_password ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$acesso->cd_acesso]
                                                        ],
                                                        [
                                                            'title' => 'Ver dados de Acesso',
                                                            'class' => 'btn btn-sm btn-primary'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Editar',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'Edit',
                                                            [$acesso->cd_acesso]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados de Acesso',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($acesso->ic_status):
                                                    ?>
                                                        <td>
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$acesso->cd_acesso]
                                                                    ],
                                                                    [
                                                                        'title' => 'Desabilitar o Acesso',
                                                                        'class' => 'btn btn-sm btn-danger'
                                                                    ]
                                                                )
                                                            ?>
                                                        </td>
                                                    <?php
                                                else:
                                                    ?>
                                                        <td>
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Habilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Enable',
                                                                        [$acesso->cd_acesso]
                                                                    ],
                                                                    [
                                                                        'title' => 'Habilitar o Acesso',
                                                                        'class' => 'btn btn-sm btn-secondary'
                                                                    ]
                                                                )
                                                            ?>
                                                        </td>
                                                    <?php
                                                endif; ?>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>

