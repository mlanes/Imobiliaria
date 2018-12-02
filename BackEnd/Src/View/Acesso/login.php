<!DOCTYPE html>
<html lang="<?= SYSTEM_LANG ?>">
    <head>
        <?php
            require_once parent::loadView('Layout', 'head_admin');
        ?>
    </head>
    <body>
        <div class="bg-login">
            <div class="modal-login painel">
                <h4 class="title">Imobiliária Litoral</h4>
                <form method="post">
                    <?php
                        echo $formHelper->control('nm_login', ['label' => [
                            'text' => 'Login',
                            'class' => 'font-weight-bold text-white',
                        ], 'type' => 'text', 'class' => 'form-control', 'block' => true, 'required' => true, 'placeholder' => 'Digite seu Login ']);
                        echo $formHelper->control('nm_password', ['label' => [
                            'text' => 'Senha',
                            'class' => 'font-weight-bold text-white',
                        ], 'type' => 'password', 'class' => 'form-control', 'block' => true, 'required' => true, 'placeholder' => 'Digite sua senha']);
                    ?>
                    <button class="btn botaoLogin mt-3">Salvar</button>
                </form>
            </div>
        </div>
        <?php require_once parent::loadView('Layout', 'scripts'); ?>
    </body>
</html>