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


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="javascript:;" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?= src('app/avatar.jpg') ?>" alt="<?= $user['sNombre'] ?>">
                    <span class="d-none d-md-inline-block"><?= $user['sNombre'] ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-small">
                    <div class="dropdown-divider"></div>
                    <a id="btnEditarEmpleado" class="dropdown-item"  href="javascript:;">
                        <i class="material-icons">person_outline</i> Editar
                    </a>
                    <a class="dropdown-item text-danger" href="<?= route('salir') ?>">
                        <i class="material-icons text-danger">&#xE879;</i> Salir
                    </a>
                </div>
            </li>
        </ul>
        <nav class="nav">
            <a href="javascript:;" id="btnToogleAside" class="nav-link nav-link-icon toggle-sidebar d-md-inline d-lg-none text-center border-left menu-collap">
                <i class="material-icons">&#xE5D2;</i>
            </a>
        </nav>
    </nav>
</div>