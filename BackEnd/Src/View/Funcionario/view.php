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
                                <p><?= $funcionario->cd_funcionario ?></p>
                                <span class="font-weight-bold">Status</span>
                                <p><?= $funcionario->ic_status ?></p>
                                <span class="font-weight-bold">Nome Completo</span>
                                <p><?= $funcionario->nm_primeiro . ' ' . $funcionario->nm_meio . ' ' . $funcionario->nm_ultimo ?></p>
                                <span class="font-weight-bold">Data de Nascimento</span>
                                <p><?= $funcionario->dt_nascimento ?></p>
                                <span class="font-weight-bold">CPF</span>
                                <p><?= $funcionario->cd_cpf ?></p>
                                <span class="font-weight-bold">Categoria</span>
                                <p><?= $funcionario->nm_categoria ?></p>
                                <?php
                                    if ($funcionario->cd_creci != "") {
                                        ?>
                                        <p>Creci</p>
                                        <span class="font-weight-bold"><?= $funcionario->cd_creci ?></span>
                                        <?php
                                    }
                                ?>
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