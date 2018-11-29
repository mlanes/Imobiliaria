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
                            <h1>Cadastrar - Categoria do Funcionário</h1>
                            <form method="post">
                                <div class="form-group">
                                <?php
                                    echo $formHelper->control('nm_categoria', ['label' => [
                                        'text' => 'Nome',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control']);
                                ?>
                                </div>
                                <div class="form-group">
                                    <label>Status</label>
                                    <?php
                                        echo $formHelper->radio('ic_status', [
                                            [
                                                'value' => 1,
                                                'class' => 'abc',
                                                'text' => 'Habilitado',
                                                'block' => 'false',
                                                'checked' => true
                                            ],
                                            [
                                                'value' => 0,
                                                'text' => 'Desabilitado',
                                                'block' => 'false'
                                            ]
                                        ]);
                                    ?>
                                </div>
                                <?php
                                    echo $formHelper->control('nm_sigla', ['label' => [
                                        'text' => 'Sigla',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control']);
                                ?>
                                <button class="btn btn-md btn-primary">Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<a href="<?= HOME_URL . $this->controller ?>">Voltar</a>