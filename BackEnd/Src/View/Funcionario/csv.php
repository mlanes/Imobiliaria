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
                    <h1>Cadastrar funcionário</h1>
                    <p class="text-muted">Insira um csv com os usuários para cadastrar vários de uma vez</p>
                    <a href="<?php echo str_replace('Src/', '', HOME_URL); ?>Web/funcionario.csv" class="btn btn-success" download>Baixar de CSV em Branco</a>
                </div>
                </div>
            </div>
        </header>
        <section id="info">
            <div class="container">
                <div class="row">
                    <div class="col-12 card p-4 mt-5">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="csv">Arquivo</label>
                            <input type="file" class="form-control" name="csv" value="" id="csv"/>
                        </div>
                        <a href="<?= HOME_URL . $this->controller ?>" class="btn btn-info">Voltar</a>
                        <button class="btn btn-primary">Salvar <i class="fa fa-save"></i></button>
                    </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
        require_once parent::loadView('Layout', 'footer_admin');  
        require_once parent::loadView('Layout', 'scripts'); 
        ?>
    </body>
</html>