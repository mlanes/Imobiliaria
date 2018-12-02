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
                                <h1>Imovel</h1>
                                <span class="font-weight-bold">Código</span>
                                <p><?= $imovel->cd_proprietario ?></p>
                                <span class="font-weight-bold">Status</span>
                                <p><?= $imovel->ic_status ?></p>
                                <span class="font-weight-bold">Nome do Proprietario</span>
                                <p><?= $nm_proprietario ?></p>
                                <span class="font-weight-bold">Categoria do Imóvel</span>
                                <p><?= $nm_categoria ?></p>
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