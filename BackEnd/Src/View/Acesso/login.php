<!DOCTYPE html>
<html lang="<?= SYSTEM_LANG ?>">
    <head>
        <?php
            require_once parent::loadView('Layout', 'head_admin');
        ?>
    </head>
    <body class="bg-light">
        <div class="container pt-5">
            <div class="row justify-content-center pt-5 mt-5">
                <div class="card p-4 col-lg-4 col-sm-12 rounded">
                <h4 class="text-center py-3">Imobiliária<span class="text-primary font-weight-bold">Litoral</span></h4>
                    <form method="post">
                        <?php
                            echo $formHelper->control('nm_login', ['label' => [
                                'text' => 'Login',
                                'class' => 'font-weight-bold',
                            ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'required' => true, 'placeholder' => 'Digite seu Login ']);
                            echo $formHelper->control('nm_password', ['label' => [
                                'text' => 'Senha',
                                'class' => 'font-weight-bold',
                            ], 'type' => 'password', 'class' => 'form-control', 'block' => true, 'required' => true, 'placeholder' => 'Digite sua senha']);
                        ?>
                        <button class="w-100 btn btn-primary font-weight-bold">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>