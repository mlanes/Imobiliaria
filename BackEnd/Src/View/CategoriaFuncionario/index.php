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
                            <h1>Categorias de Funcionário</h1>
                            <?=
                                $linkHelper->link(
                                    'Cadastrar',
                                    [
                                        'Controller' => $this->controller,
                                        'Action' => 'Add',
                                    ],
                                    [
                                        'title' => 'Cadastrar Categoria de Funcionário',
                                        'class' => 'btn btn-sm btn-success'
                                    ]
                                )
                            ?>
                            <hr />
                            <p>Total: <b><?= $count ?> itens.</b></p>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>Código</td>
                                        <td>Status</td>
                                        <td>Nome</td>
                                        <td>Sigla</td>
                                        <td colspan="3">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($categoriasFuncionario as $categoriaFuncionario) {
                                        ?>
                                        <tr>
                                            <td><?= $categoriaFuncionario->cd_categoria ?></td>
                                            <td><?= $categoriaFuncionario->ic_status ?></td>
                                            <td><?= $categoriaFuncionario->nm_categoria ?></td>
                                            <td><?= $categoriaFuncionario->nm_sigla ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$categoriaFuncionario->cd_categoria]
                                                        ],
                                                        [
                                                            'title' => 'Ver dados da Categoria do Funcionário',
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
                                                            [$categoriaFuncionario->cd_categoria]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados da Categoria do Funcionário',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($categoriaFuncionario->ic_status):
                                                    ?>
                                                        <td>
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$categoriaFuncionario->cd_categoria]
                                                                    ],
                                                                    [
                                                                        'title' => 'Desabilitar Categoria do Funcionário',
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
                                                                        [$categoriaFuncionario->cd_categoria]
                                                                    ],
                                                                    [
                                                                        'title' => 'Habilitar Categoria do Funcionário',
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
    </body>
</html>