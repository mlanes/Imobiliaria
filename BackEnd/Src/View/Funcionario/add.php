<?php
    require_once parent::loadView('Layout', 'menu_lateral_admin');
?>
<h1>Cadastro de Funcionário</h1>
<form method="post">
    <label>Primeiro Nome</label><br>
    <input name="nm_primeiro" value="<?= $nm_primeiro ?>"><br>
    <label>Nome do meio</label><br>
    <input name="nm_meio" value="<?= $nm_meio ?>"><br>
    <label>Último Nome</label><br>
    <input name="nm_ultimo" value="<?= $nm_ultimo ?>"><br>
    <label>Data de Nascimento</label><br>
    <input type="date" name="dt_nascimento" value="<?= $dt_nascimento ?>"><br>
    <label>CPF</label><br>
    <input name="cd_cpf" value="<?= $cd_cpf ?>"><br>
    <label>Status</label><br>
    <input name="ic_status" value="<?= $ic_status ?>"><br>
    <label>Categoria</label><br>
    <select name="cd_categoria">
        <?php
            foreach ($categorias as $categoria) {
                $op = '<option value="$categoria->cd_categoria"';
                if ($cd_categoria == $categoria->cd_categoria) {
                    $op .= 'selected>';
                }
                else {
                    $op .= '>';
                }
                echo $op . $categoria->nm_categoria . '</option>';
            }
        ?>
    </select><br>
    <label>Creci</label><br>
    <input name="cd_creci" value="<?= $cd_creci ?>"><br>
    <button>Salvar</button>
</form>
<a href="<?= HOME_URL . $this->controller ?>">Voltar</a>