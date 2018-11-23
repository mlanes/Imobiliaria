<?php
    require_once parent::loadView('Layout', 'menu_lateral_admin');
?>
<h1>Acesso ao Sistema</h1>
<p>Total: <b><?= $count ?> itens.</b></p>
<a href="<?= HOME_URL . $this->controller . '/Add/' ?>">Cadastrar</a>
<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Status</td>
            <td>Login</td>
            <td>Senha</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($acessos as $acesso) {
            ?>
            <tr>
                <td><?= $acesso->cd_acesso ?></td>
                <td><?= $acesso->ic_status ?></td>
                <td><?= $acesso->nm_login ?></td>
                <td><?= $acesso->nm_password ?></td>
                <td><a href="<?= HOME_URL . $this->controller . '/View/' . $acesso->cd_funcionario ?>">Ver</a></td>
                <td><a href="<?= HOME_URL . $this->controller . '/Edit/' . $acesso->cd_funcionario ?>">Editar</a></td>
                <?php
                    if ($acesso->ic_status):
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Disable/' . $acesso->cd_funcionario ?>">Desabilitar</a></td>
                        <?php
                    else:
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Enable/' . $acesso->cd_funcionario ?>">Habilitar</a></td>
                        <?php
                    endif; ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>