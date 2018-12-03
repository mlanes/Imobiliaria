<!DOCTYPE html>
<html>
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
                    <h1>Funcionários cadastrados</h1>
                    <p class="text-muted">Aqui você pode cadastrar os Funcionários</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h2>Funcionários no sistema</h2>
                  <p class="text-muted">Lista de funcionários</p>
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
                                <td>CPF</td>
                                <td colspan="3">Ações</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($funcionarios as $funcionario) {
                                ?>
                                <tr>
                                    <td><?= $funcionario->cd_funcionario ?></td>
                                    <td><?= $funcionario->ic_status ?></td>
                                    <td><?= $funcionario->nm_primeiro ?></td>
                                    <td><?= $funcionario->cd_cpf ?></td>
                                    <td>
                                        <div class="btn-group">
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-eye"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'View',
                                                    [$funcionario->cd_funcionario]
                                                ],
                                                [
                                                    'title' => 'Ver dados de funcionario',
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
                                                    [$funcionario->cd_funcionario]
                                                ],
                                                [
                                                    'title' => 'Editar dados de funcionario',
                                                    'class' => 'btn btn-info'
                                                ]
                                            )
                                        ?>
                                    
                                    <?php
                                        if ($funcionario->ic_status):
                                            ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-trash"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Disable',
                                                                [$funcionario->cd_funcionario]
                                                            ],
                                                            [
                                                                'title' => 'Desabilitar o funcionario',
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
                                                                [$funcionario->cd_funcionario]
                                                            ],
                                                            [
                                                                'title' => 'Habilitar o funcionario',
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