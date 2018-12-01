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
                            <h1>Editar Funcionário</h1>
                            <form method="post">
                            <?=
                                    $formHelper->control('nm_primeiro', ['label' => [
                                        'text' => 'Nome',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->nm_primeiro])
                                ?>
                                <?=
                                    $formHelper->control('nm_meio', ['label' => [
                                        'text' => 'Sobrenome do Meio',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->nm_meio])
                                ?>
                                <?=
                                    $formHelper->control('nm_ultimo', ['label' => [
                                        'text' => 'Último Sobrenome',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->nm_ultimo])
                                ?>
                                <?=
                                    $formHelper->control('dt_nascimento', ['label' => [
                                        'text' => 'Data de Nascimento',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'date', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->dt_nascimento])
                                ?>
                                <?=
                                    $formHelper->control('cd_cpf', ['label' => [
                                        'text' => 'CPF',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->cd_cpf])
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
                                <?= $formHelper->select("cd_categoria", ['label' => [
                                        'text' => 'Categoria', 'class' => 'font-weight-bold'
                                    ], 'class' => 'form-control', 'block' => true], $categoriasOption)
                                ?>
                                <?=
                                    $formHelper->control('cd_creci', ['label' => [
                                        'text' => 'Creci',
                                        'class' => 'font-weight-bold',
                                    ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $funcionario->cd_creci])
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