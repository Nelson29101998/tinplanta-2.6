<?php

?>
<nav class="navbar navbar-expand-lg navbar-dark green sticky-top">
    <a class="navbar-brand" href="image/logo/logotin.png">
        <img src="http://drive.google.com/uc?id=1ESJ6kDwOXWsM89XMbyaMdVxcJlD9OG2f" alt="logo" style="width: 20px;">
    </a>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menus" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse justify-content-center" id="menus">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="acercade.php"><button type="button" class="btn btn-light-green" name="acercade" id="acercade"><i class="fas fa-book"></i> Acerca de:</button></a>
            </li>

            <li>
                <a href="php/ayudar/ayuda.php"><button type="button" class="btn btn-light-green" name="ayuda" id="ayuda"><i class="fas fa-hands-helping"></i> Ayuda</button></a>
            </li>

            <li class="nav-item dropdown">
                <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="buscar" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search"></i> Buscar Planta<span class="caret"></span>
                </button>
                <div class="dropdown-menu">
                    <form class="form-group" name="buscarplanta" id="buscarplanta" method="GET" onsubmit="return formula()">
                        <div class="active-cyan-3 active-cyan-4 mb-4">
                            <input class="form-control" type="search" placeholder="Nombre de planta" aria-label="Nombre de planta" name="buscar" id="buscar">
                        </div>
                        <div class="dropdown-divider"></div>
                        <button type="submit" class="btn btn-light-green"><i class="fas fa-search"></i> Buscar</button>
                        <a class="dropdown-item" href="index.php"><i class="fas fa-seedling"></i> Todas las plantas</a>
                    </form>
                </div>
            </li>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li>
                    <a href="php/creadoplanta/crearplanta.php"><button type="button" class="btn btn-light-green" name="nuevaplanta" id="nuevaplanta"><i class="fas fa-leaf"></i> Crea una nueva planta</button></a>
                </li>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item">
                    <a href="php/perfil/perfil.php"><button type="button" class="btn btn-light-green" name="perfil" id="perfil"><i class="fas fa-id-card"></i> Perfil</button></a>
                </li>
            <?php
            }
            ?>

            <?php
            if (empty($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item dropdown">
                    <button type="button" class=" nav-link btn btn-light-green dropdown-toggle" id="cuentas" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-portrait"></i> Cuentas<span class="caret"></span>
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="html/iniciasesion.html"><i class="fas fa-sign-in-alt"></i> Inicia sesión</a>
                        <a class="dropdown-item" href="html/nuevasesion.html"><i class="fas fa-user-circle"></i> Crea una nueva cuenta</a>
                        <a class="dropdown-item" href="html/olvido.html"><i class="fas fa-key"></i> Olvidó su contraseña</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href=""><i class="fas fa-user-cog"></i> Administrador</a>
                    </div>
                </li>
            <?php
            }
            ?>

            <?php
            if (isset($_SESSION['Usuario'])) {
            ?>
                <li class="nav-item">
                    <a href="php/cerrar.php"><button type="button" class="btn btn-light-green" name="cerrar" id="cerrar"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</button></a>
                </li>
            <?php
            }
            ?>

            <li class="nav-item">
                <a href=""><button type="button" class="btn golden-btn"><i class="fas fa-crown"></i> Premium</button></a>
            </li>
        </ul>
    </div>
</nav>
<?php

?>