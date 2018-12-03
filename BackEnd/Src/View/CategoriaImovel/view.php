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
            <div id="page-content-wrapper">
                <div class="container-fluid xyz">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="mb-3">
                                <h1>Categorias de Imóvel</h1>
                                <span class="font-weight-bold">Código</span>
                                <p><?= $categoriaImovel->cd_categoria_imovel ?></p>
                                <span class="font-weight-bold">Status</span>
                                <p><?= $categoriaImovel->ic_status ?></p>
                                <span class="font-weight-bold">Nome</span>
                                <p><?= $categoriaImovel->nm_categoria_imovel ?></p>
                                <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-sm btn-secondary">Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>