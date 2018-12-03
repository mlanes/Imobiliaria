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
                    <h1>Editar proprietário</h1>
                    <p class="text-muted">Aqui você pode editar os Proprietários</p>
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
                                $formHelper->control('nm_primeiro', ['label' => [
                                    'text' => 'Nome',
                                    'class' => 'font-weight-bold',
                                ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $proprietario->nm_primeiro])
                            ?>
                            <?=
                                $formHelper->control('nm_meio', ['label' => [
                                    'text' => 'Sobrenome do Meio',
                                    'class' => 'font-weight-bold',
                                ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $proprietario->nm_meio])
                            ?>
                            <?=
                                $formHelper->control('nm_ultimo', ['label' => [
                                    'text' => 'Último Sobrenome',
                                    'class' => 'font-weight-bold',
                                ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $proprietario->nm_ultimo])
                            ?>
                            <?=
                                $formHelper->control('dt_nascimento', ['label' => [
                                    'text' => 'Data de Nascimento',
                                    'class' => 'font-weight-bold',
                                ], 'type' => 'date', 'class' => 'form-control', 'block' => true, 'value' => $proprietario->dt_nascimento])
                            ?>
                            <?=
                                $formHelper->control('cd_cpf', ['label' => [
                                    'text' => 'CPF',
                                    'class' => 'font-weight-bold',
                                ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'value' => $proprietario->cd_cpf])
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
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>