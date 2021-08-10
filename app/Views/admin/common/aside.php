<!-- Main Sidebar -->
<aside class="main-sidebar col-12 col-md-3 col-lg-2 px-0">
    <div class="main-navbar">
        <nav class="navbar align-items-stretch navbar-light bg-white flex-md-nowrap border-bottom p-0">
            <a class="navbar-brand w-100 mr-0" href="#" style="line-height: 25px;">
                <div class="d-table m-auto">
                    <img id="main-logo" class="d-inline-block align-top mr-1" style="max-width: 25px;" src="<?= src('app/shards-dashboards-logo.svg') ?>" alt="Shards Dashboard">
                    <span class="d-none d-md-inline ml-1">

                    </span>
                </div>
            </a>
            <a class="toggle-sidebar d-sm-inline d-md-none d-lg-none menu-collap cursor-pointer">
                <i class="material-icons">&#xE5C4;</i>
            </a>


        </nav>


        <div class="nav-wrapper">
            <?php if ($menu === true) : ?>
                <ul class="nav flex-column">


                    <?php if (fncValidateArray($aryModulos)) : ?>
                        <?php foreach ($aryModulos as $aryModulo) :

                        ?>
                            <div class="menu-item">
                                <li class="nav-item padre">
                                    <a class="nav-link" href="<?= $aryModulo["sUrl"] ?>">
                                        <i class="material-icons"><?= $aryModulo["sIcono"] ?></i>
                                        <span> <?= $aryModulo["sNombre"] ?> </span>
                                    </a>
                                </li>
                                <?php if (fncValidateArray($aryModulo["arySubModulo"])) : ?>
                                    <div class="nav-submenus">
                                        <?php foreach ($aryModulo["arySubModulo"] as $key => $arySubModulo) : ?>
                                            <li class="nav-item">
                                                <a class="nav-link reportes item__menu__link" href="<?= $arySubModulo["sUrl"] ?>">
                                                    <i class="material-icons"><?= $arySubModulo["sIcono"] ?></i>
                                                    <span><?= $arySubModulo["sNombre"]?></span>
                                                </a>
                                            </li>
                                        <?php endforeach ?>
                                    </div>
                                <?php endif ?>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>


                </ul>
            <?php endif ?>
        </div>
</aside>