<h1>Categorias Funcionario</h1>
<p>Total: <b><?= $count ?> itens.</b></p>
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
            foreach ($column as $key => $value) {
                if ($key == "cd_categoria") {
                    $cd_categoria = $value;
                }
                if ($key == "ic_status") {
                    $status = $value;
                } ?>
                <td><?= $value ?></td>
                <?php
            } ?>
                <td><a href="">Ver</a></td>
                <td><a href="">Editar</a></td>
                <?php
                    if ($status):
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Disable/' . $cd_categoria ?>">Desabilitar</a></td>
                        <?php
                    else:
                        ?>
                            <td><a href="<?= HOME_URL . $this->controller . '/Enable/' . $cd_categoria ?>">Habilitar</a></td>
                        <?php
                    endif; ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>