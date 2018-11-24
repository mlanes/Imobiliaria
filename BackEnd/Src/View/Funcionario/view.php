<?php
    require_once parent::loadView('Layout', 'menu_lateral_admin');
?>
<b>Código</b>
<p><?= $funcionario->cd_funcionario ?></p>
<b>Status</b>
<p><?= $funcionario->ic_status ?></p>
<b>Nome Completo</b>
<p><?= $funcionario->nm_primeiro . ' ' . $funcionario->nm_meio . ' ' . $funcionario->nm_ultimo ?></p>
<b>Data de Nascimento</b>
<p><?= $funcionario->dt_nascimento ?></p>
<b>CPF</b>
<p><?= $funcionario->cd_cpf ?></p>
<b>Categoria</b>
<p><?= $nm_categoria ?></p>
<?php
    if ($funcionario->cd_creci != "") {
        ?>
        <b>Creci</b>
        <p><?= $funcionario->cd_creci ?></p>
        <?php
    }
?>
<a href="<?= HOME_URL . $this->controller ?>">Voltar</a>