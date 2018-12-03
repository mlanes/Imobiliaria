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
        <header id="welcome" class="bg-light py-5">
            <div class="container pt-5">
                <div class="row">
                <div class="col py-4 text-center">
                    <h1>Categoria dos Funcionários</h1>
                    <p class="text-muted">Aqui você pode cadastrar a categoria dos Funcionários</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h2>Categoria dos Funcionários no sistema</h2>
                  <p class="text-muted">Lista de categorias</p>
                  <?=
                    $linkHelper->link(
                        'Cadastrar',
                        [
                            'Controller' => $this->controller,
                            'Action' => 'Add',
                        ],
                        [
                            'title' => 'Cadastrar Funcionário',
                            'class' => 'btn btn-success'
                        ]
                    )
                ?>
               </div>
               <div class="col-12 py-3 text-center card shadow-sm">
                    <p><b><i class="fa fa-database"></i> <?= $count ?> funcionários(s)</b></p>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="font-weight-bold">
                                <td>Código</td>
                                <td>Status</td>
                                <td>Nome</td>
                                <td>Sigla</td>
                                <td class="text-center" colspan="3">Ações</td>
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
                                        <div class="btn-group">
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-eye"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'View',
                                                    [$categoriaFuncionario->cd_categoria]
                                                ],
                                                [
                                                    'title' => 'Ver dados categoria',
                                                    'class' => 'btn btn-primary'
                                                ]
                                            )
                                        ?>
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-pen"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'Edit',
                                                    [$categoriaFuncionario->cd_categoria]
                                                ],
                                                [
                                                    'title' => 'Editar dados categoria',
                                                    'class' => 'btn btn-info'
                                                ]
                                            )
                                        ?>
                                    
                                    <?php
                                        if ($categoriaFuncionario->ic_status):                                         ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-trash"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Disable',
                                                                [$categoriaFuncionario->cd_categoria]
                                                            ],
                                                            [
                                                                'title' => 'Desabilitar a categoria',
                                                                'class' => 'btn btn-danger'
                                                            ]
                                                        )
                                                    ?>
                                                
                                            <?php
                                        else:
                                            ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-check"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Enable',
                                                                [$categoriaFuncionario->cd_categoria]
                                                            ],
                                                            [
                                                                'title' => 'Habilitar a categoria',
                                                                'class' => 'btn btn-success'
                                                            ]
                                                        )
                                                    ?>
                                                
                                            <?php
                                        endif; ?>
                                        </div>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
               </div>
            </div>
         </div>
        </section>
        <?php
        require_once parent::loadView('Layout', 'footer_admin'); 
        require_once parent::loadView('Layout', 'scripts'); 
        ?>
    </body>
</html>