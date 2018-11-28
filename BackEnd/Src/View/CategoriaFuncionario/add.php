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
                                <label>Nome</label><br>
                                <input name="nm_categoria" value="<?= $nm_categoria ?>"><br>
                                <label>Status</label><br>
                                <input type="radio" name="ic_status" value="true" <?php if ($ic_status == 1) {echo 'checked';} ?>>Habilitado<br>
                                <input type="radio" name="ic_status" value="false" <?php if ($ic_status == 0) {echo 'checked';} ?>>Desabilitado<br>
                                <label>Sigla</label><br>
                                <input name="nm_sigla" value="<?= $nm_sigla ?>"><br>
                                <button>Salvar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
<a href="<?= HOME_URL . $this->controller ?>">Voltar</a>