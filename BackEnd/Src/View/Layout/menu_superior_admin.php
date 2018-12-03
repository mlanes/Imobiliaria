<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
  <a class="navbar-brand" href="<?= HOME_URL ?>"><?= SYSTEM_NAME ?></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= HOME_URL ?>">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= HOME_URL . 'Acesso' ?>">Acesso</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= HOME_URL . 'Proprietario' ?>">Proprietário</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Funcionário
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= HOME_URL . 'Funcionario' ?>">Funcionário</a>
          <a class="dropdown-item" href="<?= HOME_URL . 'CategoriaFuncionario' ?>">Cat. Funcionário</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Imóvel
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= HOME_URL . 'Imovel' ?>">Imóvel</a>
          <a class="dropdown-item" href="<?= HOME_URL . 'CategoriaImovel' ?>">Categoria Imóvel</a>
        </div>
      </li>
    </ul>
    <ul class="text-center navbar-nav my-2 my-lg-0">
        <?php
            if (!empty($_SESSION['login'])) {
                ?>
                <li class="nav-item text-white">
                  <i class="fa fa-user"></i>
                  <span href="#"><?= $_SESSION['login'] ?></span>
                </li>
                <li class="nav-item ml-2 ">
                    <?= $linkHelper->link(
                        '',
                        [
                            'Controller' => 'Acesso',
                            'Action' => 'Logout',
                        ],
                        [
                            'title' => 'Encerrar sessão',
                            'class' => 'text-danger px-4 fa fa-power-off'
                        ]
                    ) ?>
                </li>
                <?php
            }
        ?>
    </ul>
  </div>
</nav>