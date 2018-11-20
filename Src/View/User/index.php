<h1>Usuario: <?= $user ?></h1>
<table>
    <thead>
        <tr>
            <?php
            foreach ($users as $row => $column) {
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
        foreach ($users as $row => $column) {
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
