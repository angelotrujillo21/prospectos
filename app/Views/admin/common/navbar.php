<div class="main-navbar sticky-top bg-white">
    <!-- Main Navbar -->
    <nav class="navbar align-items-stretch navbar-light flex-md-nowrap p-0">
        <?php if (isset($menu) && $menu === true) : ?>
            <div class="navbar__menu flex-row">
                <a id="btn-toogle-desktop" class="nav-link nav-link-icon text-center cursor-pointer color-plomo">
                    <i class="material-icons">reorder</i>
                </a>
            </div>
        <?php endif ?>
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
        <ul class="navbar-nav border-left flex-row">

            <?php if ( isset($showNotificacion) && $showNotificacion) : ?>
                <li class="nav-item border-right dropdown notifications">
                    <a class="nav-link nav-link-icon text-center" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="nav-link-icon__wrapper">
                            <i class="material-icons">&#xE7F4;</i>
                            <span id="count-noti" class="badge badge-pill badge-danger"><?= isset($aryNotificaciones) && fncValidateArray($aryNotificaciones) ? count($aryNotificaciones) : 0  ?></span>
                        </div>
                    </a>
                    <div id="content-noti" class="dropdown-menu dropdown-menu-small content" aria-labelledby="dropdownMenuLink">
                        <?php if (isset($aryNotificaciones) && fncValidateArray($aryNotificaciones)) : ?>
                            <?php foreach ($aryNotificaciones as $nkey => $aryNoti) : ?>
                                <a class="dropdown-item items" href="javascript:;">
                                    <div class="notification__icon-wrapper">
                                        <div class="notification__icon">
                                            <i class="material-icons">message</i>
                                        </div>
                                    </div>
                                    <div class="notification__content">
                                        <span class="notification__category"><?= $aryNoti["sCliente"] ?> - <?= sp($aryNoti["sEmpleado"]) ?></span>
                                        <p><?= $aryNoti["sCambio"] ?></p>
                                    </div>
                                </a>
                            <?php endforeach ?>
                            <a class="dropdown-item notification__all text-center ShowMore" data-action="show" onclick="setTimeout(()=>{$('#dropdownMenuLink').trigger('click');}, 700);" href="javascript:;"> Ver todos los mensajes </a>
                        <?php endif ?>
                    </div>
                </li>
            <?php endif ?>

            <?php // var_dump( $user ); ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle text-nowrap px-3" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                    <img class="user-avatar rounded-circle mr-2" src="<?= !empty($user['sImagen']) && file_exists(ROOTPATHRESOURCE . "/images/multi/" . $user['sImagen']) ? src('multi/' . $user["sImagen"]) :  src('app/avatar.jpg') ?>" alt="<?= $user['sNombre'] ?>">
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