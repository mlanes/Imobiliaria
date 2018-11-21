<h1>Categorias Funcionario</h1>
<p>Total: <b><?= $count ?> itens.</b></p>
<a href="<?= HOME_URL . $this->controller . '/Add/' ?>">Cadastrar</a>
<table>
    <thead>
        <tr>
            <?php
            foreach ($categoriasFuncionario as $row => $column) {
                foreach ($column as $key => $value):
                    ?>
                    <th><?= $key ?></th>
                    <?php
                endforeach;
                break;
            }
            ?>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($categoriasFuncionario as $row => $column) {
            ?>
            <tr>
            <?php
            $status = 0;
            $categoriaFuncionario = $column;
            foreach ($column as $key => $value) {
                ?>
                <td><?= $value ?></td>
                <?php
            } ?>
                <td><a href="">Ver</a></td>
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