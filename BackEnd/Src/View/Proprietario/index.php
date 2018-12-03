<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <?= $bootstrapHelper->css() ?>
        <?= $styleHelper->css() ?>
    </head>
    <body>
        <?php
            require_once parent::loadView('Layout', 'menu_superior_admin');
        ?>
        <header id="welcome" class="bg-light py-5">
            <div class="container pt-5">
                <div class="row">
                <div class="col py-4 text-center">
                    <h1>Proprietários cadastrados</h1>
                    <p class="text-muted">Aqui você pode cadastrar os Proprietários</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h2>Proprietários no sistema</h2>
                  <p class="text-muted">Lista de propriários dos imóveis</p>
                  <?=
                    $linkHelper->link(
                        'Cadastrar',
                        [
                            'Controller' => $this->controller,
                            'Action' => 'Add',
                        ],
                        [
                            'title' => 'Cadastrar Proprietário',
                            'class' => 'btn btn-success'
                        ]
                    )
                ?>
               </div>
               <div class="col-12 py-3 text-center card shadow-sm">
                    <p><b><i class="fa fa-database"></i> <?= $count ?> prorietário(s)</b></p>
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
                            foreach ($proprietarios as $proprietario) {
                                ?>
                                <tr>
                                    <td><?= $proprietario->cd_proprietario ?></td>
                                    <td><?= $proprietario->ic_status ?></td>
                                    <td><?= $proprietario->nm_primeiro ?></td>
                                    <td><?= $proprietario->cd_cpf ?></td>
                                    <td>
                                        <div class="btn-group">
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-eye"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'View',
                                                    [$proprietario->cd_proprietario]
                                                ],
                                                [
                                                    'title' => 'Ver dados de proprietario',
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
                                                    [$proprietario->cd_proprietario]
                                                ],
                                                [
                                                    'title' => 'Editar dados de proprietario',
                                                    'class' => 'btn btn-info'
                                                ]
                                            )
                                        ?>
                                    
                                    <?php
                                        if ($proprietario->ic_status):
                                            ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-trash"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Disable',
                                                                [$proprietario->cd_proprietario]
                                                            ],
                                                            [
                                                                'title' => 'Desabilitar o proprietario',
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
                                                                [$proprietario->cd_proprietario]
                                                            ],
                                                            [
                                                                'title' => 'Habilitar o proprietario',
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