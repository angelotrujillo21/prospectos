<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <div class="main-navbar__search w-100 d-none d-md-flex d-lg-flex">
            <div class="input-group input-group-seamless ml-3">

                <div class="input-group-prepend">
                    <div class="input-group-text">
                        <i class="fas fa-chart-line" style="color: rgb(0, 123, 255);"></i>
                    </div>
                </div>
                <input id="titulo" class="navbar-search form-control text-uppercase" type="text" readonly style="background: white; color:black; font-size: 14px;" value="<?= isset($titulo) && !empty($titulo) ? $titulo : NOMBRE_SITIO ?>">

            </div>
        </div>
        <ul class="navbar-nav border-left flex-row ">

            <?php if($showNotificacion) : ?>
            <li class="nav-item border-right dropdown notifications">
                <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="nav-link-icon__wrapper">
                        <i class="material-icons">&#xE7F4;</i>
                        <span class="badge badge-pill badge-danger">2</span>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-small" aria-labelledby="dropdownMenuLink">
                    <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                                <i class="material-icons">message</i>
                            </div>
                        </div>
                        <div class="notification__content">
                            <span class="notification__category">Prospecto - 0001</span>
                            <p>Se Realizo la primera Cita con el cliente</p>
                        </div>
                    </a>
                    <a class="dropdown-item" href="#">
                        <div class="notification__icon-wrapper">
                            <div class="notification__icon">
                                <i class="material-icons">message</i>
                            </div>
                        </div>
                        <div class="notification__content">
                            <span class="notification__category">Prospecto - 0002</span>
                            <p>Se Realizo la primera Cita con el cliente</p>
                        </div>
                    </a>
                    <a class="dropdown-item notification__all text-center" href="#"> Ver todos los mensajes </a>
                </div>
            </li>

            <?php endif ?>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?= src('app/avatar.jpg') ?>" alt="<?= $user['sNombre'] ?>">
                    <span class="d-none d-md-inline-block"><?= $user['sNombre'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">

                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item text-danger" href="<?= route('admin/salir') ?>">
                        <i class="material-icons text-danger">&#xE879;</i> Salir </a>
                </div>
            </li>
        </ul>
        <nav class="nav">
            <a href="#" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left menu-collap">
                <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>