<!DOCTYPE html>
<html lang="<?= SYSTEM_LANG ?>">
    <head>
        <?php
            require_once parent::loadView('Layout', 'head_admin');
        ?>
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
                            <div class="mb-3">
                                <h1>Categorias de Imóvel</h1>
                                <?=
                                    $linkHelper->link(
                                        'Cadastrar',
                                        [
                                            'Controller' => $this->controller,
                                            'Action' => 'Add',
                                        ],
                                        [
                                            'title' => 'Cadastrar Categoria de Imóvel',
                                            'class' => 'btn btn-sm btn-success'
                                        ]
                                    )
                                ?>
                            </div>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <td>Código</td>
                                        <td>Status</td>
                                        <td>Nome</td>
                                        <td class="text-center" colspan="3">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($categoriasImovel as $categoriaImovel) {
                                        ?>
                                        <tr>
                                            <td><?= $categoriaImovel->cd_categoria_imovel ?></td>
                                            <td><?= $categoriaImovel->ic_status ?></td>
                                            <td><?= $categoriaImovel->nm_categoria_imovel ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$categoriaImovel->cd_categoria_imovel]
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
                                                            [$categoriaImovel->cd_categoria_imovel]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados da Categoria do Funcionário',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($categoriaImovel->ic_status):
                                                    ?>
                                                        <td>
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$categoriaImovel->cd_categoria_imovel]
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
                                                                        [$categoriaImovel->cd_categoria_imovel]
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
                            <p class="text-right">Total: <b><?= $count ?> itens.</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>