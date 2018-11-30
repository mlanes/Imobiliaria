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
                            <h1>Editar - Categoria do Funcionário</h1>
                            <form method="post">
                                <!-- <label>Nome</label><br>
                                <input name="nm_categoria" value="<?= $nm_categoria ?>"><br>
                                <label>Status</label><br>
                                <input type="radio" name="ic_status" value="true" <?php if ($ic_status == 1) {echo 'checked';} ?>>Habilitado<br>
                                <input type="radio" name="ic_status" value="0" <?php if ($ic_status == 0) {echo 'checked';} ?>>Desabilitado<br>
                                <label>Sigla</label><br>
                                <input name="nm_sigla" value="<?= $nm_sigla ?>"><br>
                                <button>Salvar</button> -->
                            </form>
                            <form method="post">
                                <?=
                                    $formHelper->control('nm_categoria', ['label' => [
                                        'text' => 'Nome',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $categoriaFuncionario->nm_categoria])
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
                                        ], $ic_status)
                                    ?>
                                </div>
                                <?=
                                    $formHelper->control('nm_sigla', ['label' => [
                                        'text' => 'Sigla',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $categoriaFuncionario->nm_sigla])
                                ?>
                                <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-md btn-secondary">Voltar</a>
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