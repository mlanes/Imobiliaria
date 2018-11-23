<?php
    require_once parent::loadView('Layout', 'menu_lateral_admin');
?>
<h1>Funcionarios</h1>
<p>Total: <b><?= $count ?> itens.</b></p>
<a href="<?= HOME_URL . $this->controller . '/Add/' ?>">Cadastrar</a>
<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Status</td>
            <td>Nome</td>
            <td>Categoria</td>
            <td>CPF</td>
            <td>Data de Nascimento</td>
            <td>Criado em</td>
            <td>Editado em</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($funcionarios as $funcionario) {
            $this->CategoriaFuncionario->cd_categoria = $funcionario->cd_categoria;
            $categoria = $this->CategoriaFuncionario->select();
            $nm_categoria = $categoria->nm_categoria; ?>
            <tr>
                <td><?= $funcionario->cd_pessoa ?></td>
                <td><?= $funcionario->ic_status ?></td>
                <td><?= $funcionario->nm_primeiro ?></td>
                <td><?= $nm_categoria ?></td>
                <td><?= $funcionario->cd_cpf ?></td>
                <td><?= $funcionario->dt_nascimento ?></td>
                <td><?= $funcionario->dt_criado ?></td>
                <td><?= $funcionario->dt_editado ?></td>
                <td><a href="<?= HOME_URL . $this->controller . '/View/' . $funcionario->cd_funcionario ?>">Ver</a></td>
                <td><a href="<?= HOME_URL . $this->controller . '/Edit/' . $funcionario->cd_funcionario ?>">Editar</a></td>
                <?php
                    if ($funcionario->ic_status):
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Disable/' . $funcionario->cd_funcionario ?>">Desabilitar</a></td>
                        <?php
                    else:
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Enable/' . $funcionario->cd_funcionario ?>">Habilitar</a></td>
                        <?php
                    endif; ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>