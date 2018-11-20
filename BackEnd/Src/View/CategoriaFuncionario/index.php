<h1>Categorias Funcionario</h1>
<b>Total: <?= $count ?> itens.</b>
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
                foreach ($column as $key => $value):
                    ?>
                    <td><?= $value ?></td>
                    <?php
                endforeach;
                ?>
            </tr>
            <?php
        }
        ?>
    </tbody>
</table>
