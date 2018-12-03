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
                    <h1>Cadastrar Imóveis</h1>
                    <p class="text-muted">Aqui você pode cadastrar a Imóveis</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h2>Imóveis no sistema</h2>
                  <p class="text-muted">Lista de dos imóveis cadastrados</p>
                  <?=
                    $linkHelper->link(
                        'Cadastrar',
                        [
                            'Controller' => $this->controller,
                            'Action' => 'Add',
                        ],
                        [
                            'title' => 'Cadastrar imóvel',
                            'class' => 'btn btn-success'
                        ]
                    )
                ?>
               </div>
               <div class="col-12 py-3 text-center card shadow-sm">
                    <p><b><i class="fa fa-database"></i> <?= $count ?> imóveis</b></p>
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
                                        <div class="btn-group">
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-eye"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'View',
                                                    [$imovel->cd_imovel]
                                                ],
                                                [
                                                    'title' => 'Ver dados de imovel',
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
                                                    [$imovel->cd_imovel]
                                                ],
                                                [
                                                    'title' => 'Editar dados de imovel',
                                                    'class' => 'btn btn-info'
                                                ]
                                            )
                                        ?>
                                    
                                    <?php
                                        if ($imovel->ic_status):                                         ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-trash"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Disable',
                                                                [$imovel->cd_imovel]
                                                            ],
                                                            [
                                                                'title' => 'Desabilitar o imovel',
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
                                                                [$imovel->cd_imovel]
                                                            ],
                                                            [
                                                                'title' => 'Habilitar o imovel',
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