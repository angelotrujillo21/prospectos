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
    </div>


    <div class="nav-wrapper">
            <ul class="nav flex-column">

           
                <div class="menu-item">
                    <li class="nav-item padre">
                        <a class="nav-link" href="javascript:;">
                            <i class="material-icons">link</i>
                            <span> Enlaces </span>
                        </a>
                    </li>
                    <div class="nav-submenus">

                        <li class="nav-item">
                            <a class="nav-link reportes item__menu__link btnVerInicio"  href="javascript:;">
                                <i class="material-icons">chevron_right</i>
                                <span>Cotizador</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link reportes item__menu__link btnVerInicio"  href="javascript:;">
                                <i class="material-icons">chevron_right</i>
                                <span>Opp</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link reportes item__menu__link btnVerInicio"  href="javascript:;">
                                <i class="material-icons">chevron_right</i>
                                <span>Alcance</span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link reportes item__menu__link btnVerInicio"  href="javascript:;">
                                <i class="material-icons">chevron_right</i>
                                <span>Citas</span>
                            </a>
                        </li>

                
                        <li class="nav-item">
                            <a class="nav-link reportes item__menu__link" href="<?= route('salir')?>">
                                <i class="material-icons">chevron_right</i>
                                <span>Salir</span>
                            </a>
                        </li>

                    
                    </div>
                </div>
            </ul>
    </div>
</aside>