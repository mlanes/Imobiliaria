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
                            <h1>Proprietários</h1>
                            <?=
                                $linkHelper->link(
                                    'Cadastrar',
                                    [
                                        'Controller' => $this->controller,
                                        'Action' => 'Add',
                                    ],
                                    [
                                        'title' => 'Cadastrar Proprietário',
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
                                        <td>Nome</td>
                                        <td>Categoria</td>
                                        <td>CPF</td>
                                        <td>Data de Nascimento</td>
                                        <td>Criado em</td>
                                        <td>Editado em</td>
                                        <td colspan="3">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($proprietarios as $proprietario) {
                                        ?>
                                        <tr>
                                            <td><?= $proprietario->cd_proprietario ?></td>
                                            <td><?= $proprietario->ic_status ?></td>
                                            <td><?= $proprietario->nm_primeiro ?></td>
                                            <td><?= $proprietario->cd_cpf ?></td>
                                            <td><?= $proprietario->dt_nascimento ?></td>
                                            <td><?= $proprietario->dt_criado ?></td>
                                            <td><?= $proprietario->dt_editado ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$proprietario->cd_proprietario]
                                                        ],
                                                        [
                                                            'title' => 'Ver dados do Funcionário',
                                                            'class' => 'btn btn-sm btn-primary'
                                                        ]
                                                    )
                                                ?>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Editar',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'Edit',
                                                            [$proprietario->cd_proprietario]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados do Funcionário',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($proprietario->ic_status):
                                                    ?>
                                                        <td> 
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$proprietario->cd_proprietario]
                                                                    ],
                                                                    [
                                                                        'title' => 'Desabilitar o Funcionário',
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
                                                                        [$proprietario->cd_proprietario]
                                                                    ],
                                                                    [
                                                                        'title' => 'Habilitar o Funcionário',
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