<nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <!-- Brand -->
    <a class="navbar-brand mr-auto" href="<?= HOME_URL ?>">Imobiliária</a>

    <!-- Toggler/collapsibe Button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>

    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav ml-auto">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">Perfil</a>
            </li> -->
            <?php
                if (!empty($_SESSION['login'])) {
                    ?>
                    <li class="nav-item">
                        <?= $linkHelper->link(
                            'Sair',
                            [
                                'Controller' => 'Acesso',
                                'Action' => 'Logout',
                            ],
                            [
                                'title' => 'Encerrar sessão',
                                'class' => 'nav-link'
                            ]
                        ) ?>
                    </li>
                    <?php
                }
            ?>
        </ul>
    </div>
</nav>