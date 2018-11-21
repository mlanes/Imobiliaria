<h1>Categorias Funcionario</h1>
<p>Total: <b><?= $count ?> itens.</b></p>
<a href="<?= HOME_URL . $this->controller . '/Add/' ?>">Cadastrar</a>
<table>
    <thead>
        <tr>
            <td>Código</td>
            <td>Status</td>
            <td>Nome</td>
            <td>Sigla</td>
            <td>Ações</td>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($categoriasFuncionario as $categoriaFuncionario) {
            ?>
            <tr>
                <td><?= $categoriaFuncionario->cd_categoria ?></td>
                <td><?= $categoriaFuncionario->ic_status ?></td>
                <td><?= $categoriaFuncionario->nm_categoria ?></td>
                <td><?= $categoriaFuncionario->nm_sigla ?></td>
                <td><a href="<?= HOME_URL . $this->controller . '/View/' . $categoriaFuncionario->cd_categoria ?>">Ver</a></td>
                <td><a href="<?= HOME_URL . $this->controller . '/Edit/' . $categoriaFuncionario->cd_categoria ?>">Editar</a></td>
                <?php
                    if ($categoriaFuncionario->ic_status):
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Disable/' . $categoriaFuncionario->cd_categoria ?>">Desabilitar</a></td>
                        <?php
                    else:
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Enable/' . $categoriaFuncionario->cd_categoria ?>">Habilitar</a></td>
                        <?php
                    endif; ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>