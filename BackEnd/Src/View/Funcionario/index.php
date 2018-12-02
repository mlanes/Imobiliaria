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
                            <h1>Funcionarios</h1>
                            <?=
                                $linkHelper->link(
                                    'Cadastrar',
                                    [
                                        'Controller' => $this->controller,
                                        'Action' => 'Add',
                                    ],
                                    [
                                        'title' => 'Cadastrar Funcionário',
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
                                    foreach ($funcionarios as $funcionario) {
                                        $this->CategoriaFuncionario->cd_categoria = $funcionario->cd_categoria;
                                        $categoria = $this->CategoriaFuncionario->select();
                                        $nm_categoria = $categoria->nm_categoria; ?>
                                        <tr>
                                            <td><?= $funcionario->cd_pessoa ?></td>
                                            <td><?= $funcionario->ic_status ?></td>
                                            <td><?= $funcionario->nm_primeiro ?></td>
                                            <td><?= $nm_categoria ?></td>
                                            <td><?= $funcionario->cd_cpf ?></td>
                                            <td><?= $funcionario->dt_nascimento ?></td>
                                            <td><?= $funcionario->dt_criado ?></td>
                                            <td><?= $funcionario->dt_editado ?></td>
                                            <td>
                                                <?=
                                                    $linkHelper->link(
                                                        'Ver',
                                                        [
                                                            'Controller' => $this->controller,
                                                            'Action' => 'View',
                                                            [$funcionario->cd_funcionario]
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
                                                            [$funcionario->cd_funcionario]
                                                        ],
                                                        [
                                                            'title' => 'Editar dados do Funcionário',
                                                            'class' => 'btn btn-sm btn-warning'
                                                        ]
                                                    )
                                                ?>
                                            </td>
                                            <?php
                                                if ($funcionario->ic_status):
                                                    ?>
                                                        <td> 
                                                            <?=
                                                                $linkHelper->link(
                                                                    'Desabilitar',
                                                                    [
                                                                        'Controller' => $this->controller,
                                                                        'Action' => 'Disable',
                                                                        [$funcionario->cd_funcionario]
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
                                                                        [$funcionario->cd_funcionario]
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