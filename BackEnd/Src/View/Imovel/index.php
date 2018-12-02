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
                            <h1>Imoveis</h1>
                            <?=
                                $linkHelper->link(
                                    'Cadastrar',
                                    [
                                        'Controller' => $this->controller,
                                        'Action' => 'Add',
                                    ],
                                    [
                                        'title' => 'Cadastrar Imóvel',
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
                                        <td>Tipo</td>
                                        <td>Proprietário</td>
                                        <td colspan="3">Ações</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($imoveis as $imovel) {
                                        $this->CategoriaImovel->cd_categoria_imovel = $imovel->cd_categoria_imovel;
                                        $categoriaImovel = $this->CategoriaImovel->select();
                                        $nm_categoria = $categoriaImovel->nm_categoria_imovel;

                                        $this->Proprietario->cd_proprietario = $imovel->cd_proprietario;
                                        $proprietario = $this->Proprietario->select();
                                        $nm_proprietario = $proprietario->nm_primeiro . ' ' . $proprietario->nm_meio . ' ' . $proprietario->nm_ultimo; ?>
                                        <tr>
                                            <td><?= $imovel->cd_imovel ?></td>
                                            <td><?= $imovel->ic_status ?></td>
                                            <td><?= $nm_categoria ?></td>
                                            <td><?= $nm_proprietario ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$imovel->cd_imovel]
                                                        ],
                                                        [
                                                            'title' => 'Ver dados do Imóvel',
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
                                                            [$imovel->cd_imovel]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados do Imóvel',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($imovel->ic_status):
                                                    ?>
                                                        <td> 
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$imovel->cd_imovel]
                                                                    ],
                                                                    [
                                                                        'title' => 'Desabilitar o Imóvel',
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
                                                                        [$imovel->cd_imovel]
                                                                    ],
                                                                    [
                                                                        'title' => 'Habilitar o Imóvel',
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