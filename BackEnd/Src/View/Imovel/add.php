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
                    <h1>Cadastro de Imóvel</h1>
                    <p class="text-muted">Aqui você pode cadastrar um imóvel</p>
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
                                    $formHelper->control('qt_area_util', ['label' => [
                                        'text' => 'Área Útil',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
                                ?>
                                <?=
                                    $formHelper->control('qt_area_total', ['label' => [
                                        'text' => 'Área Total',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
                                ?>
                                <?=
                                    $formHelper->control('vl_preco', ['label' => [
                                        'text' => 'Preço',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
                                ?>
                                <?=
                                    $formHelper->control('ds_imovel', ['label' => [
                                        'text' => 'Descrição',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
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
                                <?=
                                    $formHelper->control('cd_longitude', ['label' => [
                                        'text' => 'Longitude',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
                                ?>
                                <?=
                                    $formHelper->control('cd_latitude', ['label' => [
                                        'text' => 'Latitude',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true])
                                ?>
                                <?= 
                                    $formHelper->select("cd_proprietario", ['label' => [
                                        'text' => 'Proprietário', 'class' => 'font-weight-bold'
                                    ], 'class' => 'form-control', 'block' => true], $proprietariosOption)
                                ?>
                                <?= 
                                    $formHelper->select("cd_categoria_imovel", ['label' => [
                                        'text' => 'Categoria do Imóvel', 'class' => 'font-weight-bold'
                                    ], 'class' => 'form-control', 'block' => true], $categoriasImovelOption)
                                ?>
                        <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-info">Voltar</a>
                        <button type="reset" class="btn btn-danger">Limpar Form. <i class="fa fa-times"></i></button>
                        <button class="btn btn-primary">Salvar <i class="fa fa-save"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </section>  
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>