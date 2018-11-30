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
        <div id="wrapper">
            <?php require_once parent::loadView('Layout', 'menu_lateral_admin'); ?>
            <div id="page-content-wrapper">
                <div class="container-fluid xyz">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h1>Categorias de Funcionário</h1>
                                <span class="font-weight-bold">Código</span>
                                <p><?= $categoriaFuncionario->cd_categoria ?></p>
                                <span class="font-weight-bold">Status</span>
                                <p><?= $categoriaFuncionario->ic_status ?></p>
                                <span class="font-weight-bold">Nome</span>
                                <p><?= $categoriaFuncionario->nm_categoria ?></p>
                                <span class="font-weight-bold">Sigla</span>
                                <p><?= $categoriaFuncionario->nm_sigla ?></p>
                                <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-sm btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>