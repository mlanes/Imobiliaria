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
                    <h1>Editar - Categoria do Funcionário</h1>
                    <p class="text-muted">Aqui você pode editar as categorias dos Funcionários</p>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
            <div class="container">
                <div class="row">
                    <div class="col-12 card p-4 mt-5">
                        <form method="post">
                                <?=
                                    $formHelper->control('nm_categoria_imovel', ['label' => [
                                        'text' => 'Nome',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $categoriaImovel->nm_categoria_imovel])
                                ?>
                                <div class="form-group">
                                    <label>Status</label><br>
                                    <?=
                                        $formHelper->radio('ic_status', [
                                            [
                                                'value' => 'enable',
                                                'text' => 'Habilitado',
                                                'block' => false,
                                                'checked' => true
                                            ],
                                            [
                                                'value' => 'disable',
                                                'text' => 'Desabilitado',
                                                'block' => false
                                            ]
                                        ])
                                    ?>
                                </div>
                            <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-info">Voltar</a>
                            <button type="reset" class="btn btn-danger">Limpar Form. <i class="fa fa-times"></i></button>
                            <button class="btn btn-primary">Salvar <i class="fa fa-save"></i></button>
                        </form>
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
