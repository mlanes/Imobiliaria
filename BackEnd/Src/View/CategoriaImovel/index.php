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
                    <h1>Categorias de Imóvel</h1>
                    <p class="text-muted">Aqui você pode cadastrar categorias dos Imóveis</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
         <div class="container">
            <div class="row">
               <div class="col text-center py-5">
                  <h2>Categorias de Imóveis no sistema</h2>
                  <p class="text-muted">Lista das categorias cadastradas</p>
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
                    <p><b><i class="fa fa-database"></i> <?= $count ?> categorias</b></p>
                    <table class="table">
                        <thead class="thead-dark">
                            <tr class="font-weight-bold">
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
                                        <div class="btn-group">
                                        <?=
                                            $linkHelper->link(
                                                '<i class="fa fa-eye"></i>',
                                                [
                                                    'Controller' => $this->controller,
                                                    'Action' => 'View',
                                                    [$categoriaImovel->cd_categoria_imovel]
                                                ],
                                                [
                                                    'title' => 'Ver dados de categoriaImovel',
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
                                                    [$categoriaImovel->cd_categoria_imovel]
                                                ],
                                                [
                                                    'title' => 'Editar dados de categoriaImovel',
                                                    'class' => 'btn btn-info'
                                                ]
                                            )
                                        ?>
                                    
                                    <?php
                                        if ($categoriaImovel->ic_status):                                         ?>
                                                
                                                    <?=
                                                        $linkHelper->link(
                                                            '<i class="fa fa-trash"></i>',
                                                            [
                                                                'Controller' => $this->controller,
                                                                'Action' => 'Disable',
                                                                [$categoriaImovel->cd_categoria_imovel]
                                                            ],
                                                            [
                                                                'title' => 'Desabilitar o categoriaImovel',
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
                                                                [$categoriaImovel->cd_categoria_imovel]
                                                            ],
                                                            [
                                                                'title' => 'Habilitar o categoriaImovel',
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