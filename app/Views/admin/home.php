<!DOCTYPE html>
<html class="no-js h-100" lang="es">

<head>
    <?php extend_view(['admin/common/head'], $data) ?>
</head>

 
<body 
      data-ntipoempleadosupervisor="<?=$nTipoEmpleadoSupervisor?>" 
      data-ntipoempleadoasesorventas="<?=$nTipoEmpleadoAsesorVentas?>"    
      data-nidnegocio="<?=$nIdNegocio?>" 
      data-nidetapapendiente="<?=$nIdEtapaPendiente?>"
      data-setapas ="<?=$sEtapas?>"
      data-ntipoprospecto="<?=$aryNegocio["nTipoProspecto"]?>"
      data-ntipoprospectolargo = "<?=$nTipoProspectoLargo?>"
      data-nidetapaprogramada="<?=$nIdEtapaProgramada?>"
      data-nidetapaenviopropuesta="<?=$nIdEtapaEnvioPropuesta?>"
      data-nidetapanegociacion="<?=$nIdEtapaNegociacion?>"
      data-nidetapaenproceso="<?=$nIdEtapaEnProceso?>"
      data-nidetapacierre="<?=$nIdEtapaCierre?>"
      data-ntipoactividadcita = "<?=$nTipoActividadCita?>"
      data-nestadopendiente ="<?= $nIdEstadoActividadPen ?>" 
      data-nestadoejecutado = "<?= $nIdEstadoActividadEjecutado ?>"
      data-nidetaparechazado = "<?=$nIdEtapaRechazado?>"
      data-nidentidadvendedor = "<?=$nIdEntidadVendedor?>"
      data-nidsupervisor = "<?=$nIdSupervisor?>"
      data-nrol = "<?= $user["nRol"] ?>"
      data-nrolprospectoadmin = "<?=$nRolProspectoAdmin?>"
      data-ntipoentidadnotaadmin = "<?= $nTipoEntidadNotaAdmin ?>"
      data-ntipoentidadnotaempleado = "<?=$nTipoEntidadNotaEmpleado?>"
      data-nidusuario = "<?= isset($user["nIdUsuario"]) ? $user["nIdUsuario"] : $user["nIdEmpleado"] ?>"
      data-sroluser ="<?= $user["sRol"] ?>"
      data-isuser ="<?=$isUser?>"
      data-isempleado ="<?= $isEmpleado ?>"
      data-nidempleado="<?= $isEmpleado == "true" ? $user["nIdEmpleado"] : "" ?>"
      data-ntipoempleado ="<?=$isEmpleado == "true" ? $user["nTipoEmpleado"] : ""?>"
      data-snombre="<?=$user["sNombre"]?>"
      data-bexistewidgetcitas="<?= $bExisteWidgetCitas ? 'true' : 'false'?>"
    >
    
    
    <div class="page-loader">
        <div class="loader-dual-ring"></div>
    </div>


    <div class="container-fluid">

        <div class="row">

            <?php extend_view(['admin/common/aside'], $data) ?>

            <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">

                <?php extend_view(['admin/common/navbar'], $data) ?>

                <div class="main-content-container container-fluid px-0">

                    <div class="container-fluid px-0">
                        <div class="page-header row no-gutters pb-4">

                           

                            <div class="col-lg-12 col-md-12 col-sm-12 mb-4">
                                <div class="card card-small">
                                    <div  class="card-body pt-1 pb-5">
                                    
                                    <div class="row flex-center" >
                                        <div class="col-12 col-md-8 content-indicativos-dashboard p-0 d-none d-md-block d-lg-block zoom">
                                            <div class="row mx-2 mx-md-0">

                                                <div id="cI1" class="col-6 col-md-12 p-0">
                                                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                                        <span class="font-weight-bold color-azul"> General : </span> 
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Avance" class="font-weight-bold span-t">Avance : </span> <span class="span-d nAvanceGeneral">  0 </span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Renta Basica" class="font-weight-bold span-t">Renta Basica : </span> <span class="span-d nRBGeneral"> 0 </span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Oportunidad"  class="font-weight-bold span-t">Oportunidad : </span> <span class="span-d nOportunidad"> 0 </span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Total prospectos"  class="font-weight-bold span-t">Prospectos : </span> <span class="span-d nTotalProspectosGeneral"> 0</span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Ticket"  class="font-weight-bold span-t">Ticket :</span> <span class="span-d nTicketGeneral"> 0  </span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Compra"  class="font-weight-bold span-t">Compra :</span> <span class="span-d nCompraGeneral"> 0 </span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Efectividad"  class="font-weight-bold span-t">Efectividad. : </span> <span class="span-d nTicketGeneral"> 0</span>  <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Empleados Activos"  class="font-weight-bold span-t">Empleados : </span> <span class="span-d nEmpleadosActivos"> 0</span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Productividad"  class="font-weight-bold span-t">Productividad : </span> <span class="span-d nProductividadGeneral"> 0</span> <span class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Indice de apertura"  class="font-weight-bold span-t">Ind.Apertura : </span> <span class="span-d nIndiceApertura"> 0</span>
                                                    </marquee>
                                                </div>

                                                <div id="cI2"  class="col-6 col-md-12 p-0">
                                                    <marquee behavior="scroll" direction="left" onmouseover="this.stop();" onmouseout="this.start();">
                                                        <span class="font-weight-bold color-azul"> R. Hoy : </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Avance" class="font-weight-bold span-t"> Avance : </span> <span class="span-d nAvanceHoy">  0 </span> <span  class="break"> - </span> 
                                                        <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Cierre" class="font-weight-bold span-t"> Cierre : </span> <span class="span-d nCierreHoy">  0 </span> <span  class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Renta Basica" class="font-weight-bold span-t"> Renta Basica : </span> <span class="span-d nRBHoy"> 0 </span> <span  class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Citas" class="font-weight-bold span-t"> Citas : </span> <span class="span-d nCitasHoy"> 0 </span> <span  class="break"> - </span>
                                                        <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Prospectos de hoy" class="font-weight-bold span-t"> Prospectos : </span> <span class="span-d nProspectosHoy"> 0 </span> <span  class="break"> - </span> 
                                                        <span data-toggle="tooltip" data-placement="top"  data-original-title="Empleados que realizaron prospectos hoy"  class="font-weight-bold span-t"> Empleados: </span> <span class="span-d nCantidadEmpleadosHoy"> 0</span>  
                                                    </marquee>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                        <!-- Fila Cabecera -->
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="d-inline-block d-md-flex content-cab">

                                                    <div class="d-flex d-md-flex align-items-center p-0 p-md-2 ">
                                                        
                                                        <div class="title-prospectos">
                                                            <span class="d-inline-block  d-md-inline-block"> Prospectos </span>
                                                            
                                                            <a id="btnCleanFiltros" class="font-15" href="javascript:;"> <i class="fas fa-sync"></i> </a>
                                                        </div>

                                                        <!-- <div class="ml-auto d-block d-md-none">
 
                                                            <div class="dropdown dropleft">
                                                                
                                                                <a style="font-size: 19px;" class=" color-plomo" href="javascript:;" 
                                                                    role="button" 
                                                                    id="dropdownMenuLink" 
                                                                    data-toggle="dropdown"
                                                                    aria-haspopup="true"
                                                                    aria-expanded="false">
                                                                    <i class="fas fa-ellipsis-v"></i>
                                                                </a>

                                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-naranja">assignment</span> Pendientes
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-azul">drafts</span> Invitar
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-cyan">group</span> Clientes
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-cyan">engineering</span> Empleados
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-darkorchid">group</span> Clientes
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-verde-admin">how_to_reg</span> R.Consultor
                                                                    </a>
                                                                    <a class="dropdown-item d-flex align-items-center" href="#"> 
                                                                        <span class="material-icons color-verde-admin">moving</span> R.Ventas
                                                                    </a>
                                                                </div>

                                                            </div>

                                                        </div> -->

                                                        <div class="ml-1 d-flex d-md-none d-lg-none">

                                                            <div id="content-supervisores-mobile" class="d-flex d-md-none d-lg-none align-items-center p-2">

                                                                <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                                    <?php foreach ($arySupervisores as $arySuper) : ?>
                                                                        <div  data-nidempleado="<?=$arySuper['nIdEmpleado']?>" 
                                                                            onclick="fncGetProspectosForSuper(<?=$arySuper['nIdEmpleado']?>);" 
                                                                            class="cuadrado fondo-<?= strtolower($arySuper['sColorSuper'])?> super flex-center text-white"
                                                                            data-toggle="tooltip" data-placement="top" 
                                                                            data-original-title="<?=$arySuper['sNombre']?>"  
                                                                            >
                                                                            <?= strup($arySuper["sEmpleadoCorto"]) ?>
                                                                        </div>
                                                                    <?php endforeach ?>
                                                                <?php endif ?>

                                                            </div>

                                                        </div>

                                                    </div>
                                                     
                                                    <div class="d-inline-block d-inline-block d-md-flex align-items-center p-0 p-md-2 content-buscador">
                                                        <input type="search" placeholder="Buscar.." class="form-control" name="sBuscador" id="sBuscador">
                                                    </div>

                                                    <div id="content-supervisores" class="d-none d-md-flex d-lg-flex align-items-center p-0 p-md-2">

                                                        <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                            <?php foreach ($arySupervisores as $arySuper) : ?>
                                                                <div  data-nidempleado="<?=$arySuper['nIdEmpleado']?>" 
                                                                      onclick="fncGetProspectosForSuper(<?=$arySuper['nIdEmpleado']?>);" 
                                                                      class="cuadrado fondo-<?= strtolower($arySuper['sColorSuper'])?> super flex-center text-white"
                                                                      data-toggle="tooltip" data-placement="top" 
                                                                      data-original-title="<?=$arySuper['sNombre']?>"  
                                                                      >
                                                                    <?= strup($arySuper["sEmpleadoCorto"]) ?>
                                                                </div>
                                                            <?php endforeach ?>
                                                        <?php endif ?>

                                
                                                    </div>

                                                   
                                                 
                                                                                                    
                                                    <!--      
                                                    <div id="content-asesores" class="d-flex align-items-center ml-auto p-2">

                                                         
                                                        <?php if (is_array($aryVendedoresLimit)  && count($aryVendedoresLimit) > 0) : ?>
                                                            <?php foreach ($aryVendedoresLimit as $aryVendedor) : ?>
                                                                
                                                            <div onclick="fncVerEmpleado(<?=$aryVendedor['nIdEmpleado']?>);"  data-nidempleado="<?=$aryVendedor['nIdEmpleado']?>" class="circulo-vendedor emp-indi" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre']) ?>">
                                                                <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                                            </div>

                                                            <?php endforeach ?>
                                                        <?php endif ?>
                                                            
                                
                                                    </div>
                                                     -->

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus  ml-0 ml-md-0">
                                                        <a href="javascript:;" id="btnCrearProspecto" data-toggle="tooltip" data-placement="bottom" title="Crear Prospecto">
                                                            <span class="material-icons">add_circle_outline</span>
                                                        </a>
                                                    </div>

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        <a href="javascript:;" id="btnCrearCotizacion" data-toggle="tooltip" data-placement="bottom" title="Crear Cotizacion">
                                                            <span class="material-icons">post_add</span>
                                                        </a>
                                                    </div>

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        <a href="javascript:;" id="btnCrearPS" data-toggle="tooltip" data-placement="bottom" title="Crear Prospecto Simple">
                                                            <span class="material-icons">event</span>
                                                        </a>
                                                    </div>

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        <a href="javascript:;" class="btnFiltro" data-sfiltro="CITAS" data-toggle="tooltip" data-placement="bottom" title="Filtro de citas">
                                                            <span class="material-icons">list_alt</span>
                                                        </a>
                                                    </div>

                                                    <!-- <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        <a href="javascript:;" class="btnFiltro" data-toggle="tooltip" data-placement="bottom" title="Filtro de cierres">
                                                            <span class="material-icons">task_alt</span>
                                                        </a>
                                                    </div> -->

                                                    
                                                    <div id="btnVerTodosEmpleados" class="d-none d-md-flex ml-none ml-md-auto align-items-end p-2">
                                                        <a href="javascript:;" data-toggle="modal" data-target="#modalColaboradores">Ver Empleados</a>
                                                    </div>

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        <a id="btnPendiente" data-toggle="tooltip" data-placement="bottom" title="Pendientes" class="btn-icon-cabecera color-naranja" href="javascript:;">
                                                            <span class="material-icons">assignment</span>
                                                        </a> 
                                                     </div>

                                                    <div class="d-inline-block d-md-flex align-items-center p-0 p-md-2 ic-bus">
                                                        
                                                        <a id="btnCrearInvitacion" data-toggle="tooltip" data-placement="bottom" title="Invitar" class="btn-icon-cabecera color-azul" href="javascript:;">
                                                            <span class="material-icons">drafts</span>
                                                        </a> 

                                                    </div>

                                                    <div class="d-none d-md-none align-items-center p-2">
                                                        <a id="btnBaseDatosClientes" data-toggle="tooltip" data-placement="bottom" title="Clientes" class="btn-icon-cabecera color-cyan" href="javascript:;">
                                                            <span class="material-icons">group</span>
                                                        </a> 
                                                     </div>

                                                    <div class="d-none d-md-none align-items-center p-2">
                                                         
                                                        <a id="btnBaseDatosEmpleados" data-toggle="tooltip" data-placement="bottom" title="Empleados" class="btn-icon-cabecera color-darkorchid" href="javascript:;">
                                                            <span class="material-icons">engineering</span>
                                                        </a> 
                                                        
                                                    </div>

                                                    <div class="d-none d-md-none align-items-center p-2">
                                                    
                                                        <a id="btnReporteConsultor" data-toggle="tooltip" data-placement="bottom" title="Reporte por consultor" class="btn-icon-cabecera color-verde-admin" href="javascript:;">
                                                            <span class="material-icons">how_to_reg</span>
                                                        </a> 
                                                    
                                                    </div>

                                                    <div class="d-none d-md-none align-items-center p-2">
                                                    
                                                        <a id="btnReporteVentas" data-toggle="tooltip" data-placement="bottom" title="Reporte Ventas" class="btn-icon-cabecera color-verde-admin" href="javascript:;">
                                                            <span class="material-icons">moving</span>
                                                        </a> 
    
                                                    </div>

                                                    

                                                </div>
                                            </div>
                                        </div>
                                        <!-- Fin de Fila Cabecera -->

                                        <div class="row my-2">
                                            <div class="col-12 px-1">

                                                <div class="pr-scroll-x">

                                                    <div id="content-indicativos-mobil"  class="container-list-prospectos" style="width: 230px;">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Indicativos</span>
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="content list-prospectos my-2">

                                                            <div class="row mx-1">

                                                                <div class="col-12 col-md-12 p-0">
                                                                    <span class="font-weight-bold color-azul">  Hoy : </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Avance" class="font-weight-bold span-t"> Avance : </span> <span class="span-d nAvanceHoy">  0 </span> <span  class="break"> - </span>  <br>
                                                                    <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Cierre" class="font-weight-bold span-t"> Cierre : </span> <span class="span-d nCierreHoy">  0 </span> <span  class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Renta Basica" class="font-weight-bold span-t"> Renta Basica : </span> <span class="span-d nRBHoy"> 0 </span> <span  class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Citas" class="font-weight-bold span-t"> Citas : </span> <span class="span-d nCitasHoy"> 0 </span> <span  class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="bottom"  data-original-title="Prospectos de hoy" class="font-weight-bold span-t"> Prospectos : </span> <span class="span-d nProspectosHoy"> 0 </span> <span  class="break"> - </span>  <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Empleados que realizaron prospectos hoy"  class="font-weight-bold span-t"> Empleados : </span> <span class="span-d nCantidadEmpleadosHoy"> 0</span>  <br>
                                                                </div>

                                                                <div class="col-12 col-md-12 p-0">
                                                                    <span class="font-weight-bold color-azul"> General : </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Avance" class="font-weight-bold span-t">Avance : </span> <span class="span-d nAvanceGeneral">  0 </span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Renta Basica" class="font-weight-bold span-t">Renta Basica : </span> <span class="span-d nRBGeneral"> 0 </span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Oportunidad"  class="font-weight-bold span-t">Oportunidad : </span> <span class="span-d nOportunidad"> 0 </span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Total prospectos"  class="font-weight-bold span-t">Prospectos : </span> <span class="span-d nTotalProspectosGeneral"> 0</span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Ticket"  class="font-weight-bold span-t">Ticket : </span> <span class="span-d nTicketGeneral"> 0  </span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Compra"  class="font-weight-bold span-t">Compra : </span> <span class="span-d nCompraGeneral"> 0 </span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Efectividad"  class="font-weight-bold span-t">Efectividad : </span> <span class="span-d nTicketGeneral"> 0</span>  <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Empleados Activos"  class="font-weight-bold span-t">Empleados : </span> <span class="span-d nEmpleadosActivos"> 0</span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Productividad"  class="font-weight-bold span-t">Productivdad : </span> <span class="span-d nProductividadGeneral"> 0</span> <span class="break"> - </span> <br>
                                                                    <span data-toggle="tooltip" data-placement="top"  data-original-title="Indice de apertura"  class="font-weight-bold span-t mb-4">Indice de apertura : </span> <span class="span-d nIndiceApertura"> 0</span>
                                                                </div>

                                                          

                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaProgramada?>"  class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">

                                                            <div class="d-flex align-items-center w-100 py-2 px-1">
                                                                <div class="title-header-prospectos">Prospecto</div>
                                                                <div id="descr-prospec-<?=$nIdEtapaProgramada?>" class="ml-auto descr-prospec"></div>
                                                            </div>
                                                            
                                                        </div>
                                                        <div id="list-p-<?=$nIdEtapaProgramada?>" class="content list-prospectos my-2">


                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaEnvioPropuesta?>" class="container-list-prospectos ">
                                                       
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="d-flex align-items-center w-100 py-2 px-1">
                                                                <div class="title-header-prospectos">Pro.Enviada</div>
                                                                <div id="descr-prospec-<?=$nIdEtapaEnvioPropuesta?>" class="ml-auto descr-prospec"> </div>
                                                            </div>
                                                        </div>

                                                        <div  id="list-p-<?=$nIdEtapaEnvioPropuesta?>" class="content list-prospectos my-2">

                                                         

                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaNegociacion?>"  class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="d-flex align-items-center w-100 py-2 px-1">
                                                                <div class="title-header-prospectos">Negociacion</div>
                                                                <div id="descr-prospec-<?=$nIdEtapaNegociacion?>" class="ml-auto descr-prospec"> </div>
                                                            </div>                                                           
                                                        </div>

                                                        <div id="list-p-<?=$nIdEtapaNegociacion?>" class="list-prospectos my-2 content">

                                                  
                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaEnProceso?>" class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="d-flex align-items-center w-100 py-2 px-1">
                                                                <span class="title-header-prospectos">En Proceso</span>
                                                                <div id="descr-prospec-<?=$nIdEtapaEnProceso?>" class="ml-auto descr-prospec"> </div>
                                                            </div>
                                                            
                                                        </div>

                                                        <div  id="list-p-<?=$nIdEtapaEnProceso?>" class="content list-prospectos my-2">

                                                           


                                                        </div>
                                                    </div>

                                                    <div id="content-<?=$nIdEtapaCierre?>" class="container-list-prospectos ">
                                                        <div class="list-prospectos-header d-flex align-items-center">
                                                            <div class="p-2">
                                                                <span class="title-header-prospectos">Cierre</span>
                                                            </div>
                                                        </div>
                                                        <div id="list-p-<?=$nIdEtapaCierre?>" class="content list-prospectos my-2">

                                                         

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </main>
        </div>
    </div>



    <!-- Modales -->

    <?php extend_view(['admin/common/modales-editar'], $data) ?>

    <div class="modal fade" id="formColaborador" tabindex="-1" role="dialog" aria-labelledby="formColaboradorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formColaboradorLabel">Invitar Colaborador</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div class="row">
                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="sEmail" class="col-form-label">Email:</label>
                                        <input type="email" class="form-control" id="sEmail" autocomplete="off" name="sEmail">
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Tipo:</label>
                                        <select class="form-control" name="nTipoEmpleado" id="nTipoEmpleado">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($aryTipoEmpleados)  && count($aryTipoEmpleados) > 0) : ?>
                                                <?php foreach ($aryTipoEmpleados as $aryTipoEmpleado) : ?>
                                                    <option value="<?= $aryTipoEmpleado['nIdCatalogoTabla'] ?>"><?= $aryTipoEmpleado['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>

                                <div id="container-color" class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Color:</label>
                                        <select class="form-control" name="nIdColor" id="nIdColor">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($aryColores)  && count($aryColores) > 0) : ?>
                                                <?php foreach ($aryColores as $aryColor) : ?>
                                                    <option value="<?= $aryColor['nIdCatalogoTabla'] ?>"><?= $aryColor['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>


                                <div id="container-supervisor" class="col-md-4 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Supervisor:</label>

                                        <select class="form-control" name="nIdSupervisor" id="nIdSupervisor">
                                            <option value="0">Seleccionar</option>
                                            <?php if (is_array($arySupervisores)  && count($arySupervisores) > 0) : ?>
                                                <?php foreach ($arySupervisores as $arySuper) : ?>
                                                    <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= uc($arySuper['sNombre']) ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>



                            </div>

                            <div id="content-link-copy" class="row flex-center">
                                <div class="col-8">
                                    <p class="mb-2 color-azul">Si no llego el correo puede utiliza este link para el registro del colaborador.</p>
                                    <div class="input-group mb-3">
                                        <input type="text" id="sLinkCopy" readonly class="form-control" placeholder="Copia el link.." aria-label="Copia el link.." aria-describedby="basic-copy">
                                        <div id="btnCopyLink" class="input-group-append cursor-pointer" >
                                            <span class="input-group-text" id="basic-copy"><i class="far fa-copy"></i></span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                                                    
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Invitar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalColaboradores" tabindex="-1" role="dialog" aria-labelledby="modalColaboradoresLabel" aria-hidden="true">
        <div class="modal-dialog dialog-colaborador" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalColaboradoresLabel">Lista de Colaboradores</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll">


                    <div id="content-all-empleados" class="row">
                    <?php if (is_array($aryVendedores)  && count($aryVendedores) > 0) : ?>
                        <?php foreach ($aryVendedores as $aryVendedor) : ?>
                        <div class="col-12 col-md-6">
                            <div class="card-colaborador">
                                <div class="row no-gutters">
                                    <div class="col-3 flex-center">
                                        <div class="circulo-vendedor"  onclick="fncVerEmpleado(<?= $aryVendedor['nIdEmpleado'] ?>);" data-toggle="tooltip" data-placement="bottom" title="<?= uc($aryVendedor['sNombre']) ?>">
                                            <span><?= strtoupper($aryVendedor['sEmpleadoCorto']) ?></span>
                                        </div>
                                    </div>
                                    <div class="col-6 text-center">
                                        <span><?= uc($aryVendedor['sNombre']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-14"><?= uc($aryVendedor['sTipoEmpleado']) ?></span>
                                        <div class="w-100"></div>
                                        <span class="font-13"><?= strtoupper($aryVendedor['sNombreNegocio']) ?></span>
                                    </div>
                                    <div class="col-3">
                                        <div class="cuadraro-supervisor fondo-<?= strtolower($aryVendedor['sColorSuperEmpleado'])?>"></div>
                                        <span class="activo-hace">Activo hace <?= fncSecondsToTime($aryVendedor['sTimeUltimoAcceso']) ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach ?>
                    <?php endif ?>
                        



                    </div>



                </div>

            </div>
        </div>
    </div>


    <div class="modal fade" id="modalPendientes" tabindex="-1" role="dialog" aria-labelledby="modalPendientesLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalPendientesLabel">Lista de prospectos pendientes</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row px-2" id="content-pendientes" >
                   


                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formProspecto" tabindex="-1" role="dialog" aria-labelledby="formProspectoLabel" aria-hidden="true">
        <div class="modal-dialog m-0 m-md-auto" role="document">
            <div class="modal-content" style="height: 100vh !important;">
                <form>
                    <div class="modal-header  modal-header-recuperar">
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-app-prospecto" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body" style="height: 90vh;overflow-y: auto;">
                    
                            <div class="row flex-center">
                                <p id="title-prospectos" class="title-indicativos">Crear Prospecto</p>
                            </div>

                            <div id="content-etapa-prospecto" class="row">
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">Etapa Prospecto</p>
                                                </div>

                                                <div class="bd-highlight font-18">
                                                    <a id="btnDescargarPdfProspecto" class="text-danger icon-pdf-etapa" target="_blank" href="javascript:;"><i class="far fa-file-pdf"></i></a>
                                                    <a id="btnVerAdjuntos" href="javascript:;"> <i class="fas fa-paperclip"></i> </a>
                                                </div>

                                                <div class="ml-auto">
                                                    <a class="color-azul link-drop" data-toggle="collapse" href="#cllEP" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                                </div>

                                            </div>
                                        </div>
                                        <div id="cllEP" class="col-12 my-2 collapse show">
                                            <div class="dropdown">
                                                <a class="btn dropdown-toggle menu-etapa" href="javascript:;" role="button" id="dropdownEtapa" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Seleccionar
                                                </a>
                                                <div class="dropdown-menu w-100 dropdown-menu-etapa" aria-labelledby="dropdownEtapa">
                                                    <?php if(fncValidateArray($aryEtapaProspecto)): ?>
                                                        <?php foreach($aryEtapaProspecto as $aryEtapa): ?>
                                                        <?php $bIsDisabled = ( $nTipoProspecto == $nTipoProspectoLargo && $aryEtapa["nIdEtapa"] == $nIdEtapaNegociacion ) ? true : false; ?>
                                                            <a id="nIdEtapa-<?= $aryEtapa["nIdEtapa"] ?>" class="dropdown-item <?= $bIsDisabled  ? 'disabled'  : "" ?>" <?= $bIsDisabled  ? ' data-disabled="true" '  : "" ?> data-value="<?= $aryEtapa["nIdEtapa"] ?>" href="javascript:;">
                                                                <?= $aryEtapa["sNombreVendedor"] ?>
                                                            </a>
                                                        <?php endforeach ?>
                                                    <?php endif ?>
                                                </div>
                                            </div>                       
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="content-cambio-consultor" class="row no-gutters border-card p-2 mb-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <p class="m-0 font-16">Consultor  :</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a class="color-azul link-drop" data-toggle="collapse" href="#cCC" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="cCC" class="col-12 my-2 collapse show">
                                    <select class="form-control" name="nIdEmpleadoP" id="nIdEmpleadoP">
                                            <option value="0">Seleccionar</option>
                                            <?php if(fncValidateArray($aryEmpleados)): ?>
                                                <?php foreach($aryEmpleados as $aryLoop): ?>
                                                    <option value="<?=$aryLoop["nIdEmpleado"]?>"><?=$aryLoop["sNombre"]?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                    </select>
                                </div>
                            </div>



                            <div id="content-titulo" class="row no-gutters border-card p-2 mb-4">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <p class="m-0 font-16">Titulo  :</p>
                                        </div>
                                        <div class="ml-auto">
                                            <a class="color-azul link-drop" data-toggle="collapse" href="#cTP" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                        </div>
                                    </div>
                                </div>
                                <div id="cTP" class="col-12 my-2 collapse show">
                                    <input type="text" placeholder="" id="sTituloProspecto" name="sTituloProspecto" class="form-control" autocomplete="off" data-nrequerido="0">
                                </div>
                            </div>
                           

                            <div id="content-ce-prospecto" class="row"></div>

                            <div id="content-historico-prospecto" class="row">
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">Historico</p>
                                                </div>
                                                <div class="ml-auto">
                                                    <a class="color-azul link-drop" data-toggle="collapse" href="#content-cambios" role="button" aria-expanded="false" ><i class="fas fa-caret-down"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="content-cambios" class="row no-gutters my-2 content collapse show">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row flex-center mt-2 mb-1">
                                <div class="col-12 flex-center">
                                    <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                                </div>
                            </div>

                           
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formCECatalogo" tabindex="-1" role="dialog" aria-labelledby="formCECatalogoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCECatalogoLabel">Agregar Producto</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                
                            <div class="row">

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nIdCatalogo" class="col-form-label">Producto o servicio</label>
                                        <select class="form-control" name="nIdCatalogo" id="nIdCatalogo">
                                            <option value="0">SELECCIONAR</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nCostoUnitario" class="col-form-label">C.Unitario</label>
                                        <input id="nCostoUnitario" name="nCostoUnitario" type="number" min="0.00" max="9999999.99" step="0.01" value="0.00" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="nCantidad" class="col-form-label">Cantidad</label>
                                        <input name="nCantidad" id="nCantidad" type="number" value="1" min="1" max="9999999" step="1" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formCEActividad" tabindex="-1" role="dialog" aria-labelledby="formCEActividadLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEActividadLabel">Crear Cita</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                            
                            <div id="content-cumplio-actividad" class="row mx-5">

                                <div class="col-6 flex-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nCumplioActividad" id="nCumplioActividad1" value="1" >
                                        <label class="form-check-label" for="nCumplioActividad1">Si</label>
                                    </div>
                                </div>

                                <div class="col-6 flex-center">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="nCumplioActividad" id="nCumplioActividad0" value="0" >
                                        <label class="form-check-label" for="nCumplioActividad0">No</label>
                                    </div>
                                </div>
                                
                            </div>
                
                            <div id="content-actividad" class="row my-1">

                                <div id="content-reprogramar" class="col-12">
                                    <div class="form-group mb-0">
                                        <p class="m-0 font-16">Reprogramar  :</p>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sFechaActividad" class="col-form-label">Fecha</label>
                                        <input  id="sFechaActividad" name="sFechaActividad" type="date" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="sHoraActividad" class="col-form-label">Hora</label>
                                        <input id="sHoraActividad" name="sHoraActividad" type="time"  autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="nCantidad" class="col-form-label">Nota</label>
                                        <textarea class="form-control d-block my-2" placeholder="Escribe una nota.." name="sNotaActividad" id="sNotaActividad" cols="2" rows="2"></textarea>
                                    </div>
                                </div>
                            </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formCEAdjunto" tabindex="-1" role="dialog" aria-labelledby="formCEAdjuntoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEAdjuntoLabel">Adjuntos</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="row">

                            <div class="col-md-12 col-12">
                                <div class="form-group">

                                <div class="d-flex align-items-center">

                                    <label for="sImagen" class="col-form-label">Contrato:</label>

                                    <div class="ml-auto dw-contrato">
                                        <a id="btnDescargarContrato" href="javascript:;" class="color-icon-download-contrato" title="Eliminar">
                                            <i class="fas fa-download"></i>
                                        </a>
                                    </div>

                                    <div class="mx-2 dw-contrato">
                                        <a id="btnEliminarContrato" href="javascript:;" class="text-danger font-18" title="Eliminar">
                                        <i class="material-icons">delete</i></a>
                                    </div>

                                </div>


                                     
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="sContrato" lang="es" name="sContrato">
                                            <label class="custom-file-label" for="sContrato">Elija el archivo</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label for="sImagen" class="col-form-label">Otros:</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="aryOtros" lang="es" name="aryOtros" multiple>
                                            <label class="custom-file-label" for="aryOtros">Seleccione los archivos</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div id="content-adjuntos" class="col-md-12 col-12">


                               

                                                        


                            </div>
                            

                        </div>
                            
                           
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formIndicativos" tabindex="-1" role="dialog" aria-labelledby="formIndicativosLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                
                    <div class="modal-header modal-header-recuperar">
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0 btn-close-recuperar" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                        
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 col-md-12 my-2">

                                <div class="col-12 col-md-12 text-center mt-2">
                                    <h5>Informacion del asesor de ventas</h5>
                                </div>

                                <div class="card-colaborador">
                                    <div class="row no-gutters">
                                        <div class="col-3 flex-center">
                                            <div id="circuloIndi" class="circulo-vendedor" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="">
                                                <span></span>
                                            </div>
                                        </div>
                                        <div class="col-6 text-center">
                                            <span id="sNombreEmpIndi"></span>
                                            <div  class="w-100"></div>
                                            <span id="sTipoEmpleado" class="font-14"></span>
                                            <div class="w-100"></div>
                                            <span id="sNegocioEmpIndi" class="font-13"></span>
                                        </div>
                                        <div class="col-3">
                                            <div id="cuadradoIndi" class="cuadraro-supervisor"></div>
                                            <span class="activo-hace">Activo hace <span id="sActivoHaceIndi"></span> </span>
                                        </div>
                                    </div>
                                </div>

                                    <div id="card-indicativos" class="card-colaborador">
                                        <div class="row no-gutters">
                                                <div class="col-12 col-md-12 text-center">
                                                    <p id="titulo-indi" class="title-indicativos">Indicativos</p>
                                                </div>

                                                <div class="col-6 col-md-7 flex-center">
                                                    <div class="border-card mx-1 card-indicativo-1">
                                                        <p class="title">Avance</p>
                                                        <p id="nAvance">0</p>
                                                        <p class="title">Renta Basica</p>
                                                        <p id="nRentaBasica">S./0.00</p>
                                                    </div>
                                                </div>

                                                <div class="col-6 col-md-5 flex-center">
                                                    <div class="w-100 border-card mx-1 card-indicativo-2">
                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Compra</div>
                                                            <div  id="nCompra" class="col-6 value">S./0.00</div>
                                                        </div>

                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Ticket</div>
                                                            <div id="nTicket" class="col-6 value">0</div>
                                                        </div>

                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Efectividad</div>
                                                            <div id="nEfectividad" class="col-6 value">0%</div>
                                                        </div>

                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-12 text-center mt-2">
                                                    <p class="title-indicativos">Indicativos Prospectos</p>
                                                </div>

                                                
                                                <div class="col-12 col-md-12 flex-center">
                                                    <div class="w-100 border-card mx-1 card-indicativo-3">
                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title"> Citas Hoy </div>
                                                            <div  id="nCitasCercanas" class="col-6 value">0</div>
                                                        </div>

                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Cierres Hoy</div>
                                                            <div id="nTotalCierre" class="col-6 value">0</div>
                                                        </div>

                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">Prospectos Hoy</div>
                                                            <div id="nProspectosHoyEmpleado" class="col-6 value">0</div>
                                                        </div>

                                                        <div class="row no-gutters flex-center p-1">
                                                            <div class="col-6 title">OPP</div>
                                                            <div id="nOportunidadEmpleado" class="col-6 value">0%</div>
                                                        </div>

                                                    </div>
                                                </div>


                                        </div>
                                    </div>
                            </div>
                        </div>
                   
            </div>
        </div>
        </div> 
    </div>

    <div class="modal fade" id="formHistorialCliente" tabindex="-1" role="dialog" aria-labelledby="formHistorialClienteLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formHistorialClienteLabel">Historial</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll">

                        <div id="toolbarHistorial"></div>

                        <div class="table-responsive">

                            <table data-toggle="table" id="tblHistorial" data-card-view="false" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarHistorial" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                    <thead>
                                        <tr>
                                            <th data-field="nItem" data-sortable="true">Item</th>
                                            <th data-field="sCliente" data-sortable="true">Cliente</th>
                                            <th data-field="sEmpleado" data-sortable="true">Empleado</th>
                                            <th data-field="sNombreEtapa" data-sortable="true">Etapa</th>
                                            <th data-field="nTotal" data-sortable="true">Total</th>
                                            <th data-field="dFechaCreacion" data-sortable="true">Fec. Creacion</th>
                                            <th data-field="dFechaHoraUltimoAcceso" data-sortable="true">Ult. Edicion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-full-screen" id="formReporteVentas" tabindex="-1" role="dialog" aria-labelledby="formReporteVentasLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formReporteVentasLabel">Reporte de ventas</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll">


                        <form id="form-filtros-reporte-ventas" method="POST">
                            <div class="row">
                                
                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="nTipoItemCatalogo" class="col-form-label">Tipo Item:</label>
                                        <select class="form-control" name="nTipoItemCatalogo" id="nTipoItemCatalogo">
                                            <option value="0">TODOS</option>
                                            <?php if (is_array($aryTipoItem)  && count($aryTipoItem) > 0) : ?>
                                                <?php foreach ($aryTipoItem as $aryTipo) : ?>
                                                    <option value="<?= $aryTipo['nIdCatalogoTabla'] ?>"><?= $aryTipo['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>


                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="nIdEmpleadoSupervisor" class="col-form-label">Supervisor:</label>
                                        <select multiple class="form-control select2" name="nIdEmpleadoSupervisor" id="nIdEmpleadoSupervisor">
                                             <?php if (fncValidateArray($arySupervisores)) : ?>
                                                <?php foreach ($arySupervisores as $arySuper) : ?>
                                                    <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= $arySuper['sNombre'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>


                             
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="nIdEmpleadoAsesor" class="col-form-label">Asesor:</label>
                                        <select multiple class="form-control select2" name="nIdEmpleadoAsesor" id="nIdEmpleadoAsesor">
                                             <?php if (fncValidateArray($aryVendedores)) : ?>
                                                <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                    <option value="<?= $aryVendedor['nIdEmpleado'] ?>"><?= $aryVendedor['sNombre'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>
                                    </div>
                                </div>
                            

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="dDesde" class="col-form-label">Desde:</label>
                                        <input type="text" class="form-control datepicker" id="dDesde" autocomplete="off" name="dDesde">
                                    </div>
                                </div>

                                <div class="col-md-2 col-12">
                                    <div class="form-group">
                                        <label for="dHasta" class="col-form-label">Hasta:</label>
                                        <input type="text" class="form-control datepicker" id="dHasta" autocomplete="off" name="dHasta">
                                    </div>
                                </div>

                              
                            </div>


                            <div class="row flex-center">
                                
                                <div class="col-md-1 col-12">
                                    <div class="form-group">
                                         <button type="submit" class="btn btn-gradient-primary   btn-submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="form-group">
                                         <button id="btnResetReporteVentas" type="button" class="btn btn-warning text-white"><i class="fas fa-redo-alt"></i></button>
                                    </div>
                                </div>

                            </div>

                        </form>

                        <div id="toolbarReporteVentas"></div>

                        <div class="table-responsive">

                            <table data-toggle="table" id="tblReporteVentas" 
                                data-export-types="['json', 'xml', 'csv', 'txt', 'pdf', 'excel']"   
                                data-export-options='{
                                    "fileName": "tableExport",
                                    "ignoreColumn": ["sAcciones"],
                                    "worksheetName": "tableExport",
                                    "htmlContent" : "true",
                                    "jspdf": {
                                            "autotable": {
                                                "startY": 30,
                                                "bodyStyles": {"valign": "top"},
                                                "styles": {"overflow": "linebreak", "rowHeight": 20, "fontSize": 8, "font": "helvetica"},
                                                "headerStyles": {"fillColor": [41, 128, 185]},
                                                "tableWidth": "wrap",
                                                "columnStyles" : { "columnWidth" : "auto"  }
                                            }
                                        }
                                    }' 
                                data-show-export="true" 
                                data-mobile-responsive="true"  
                                data-toggle="table" 
                                data-search="true" 
                                data-query-params="queryParams" 
                                toolbarAlign="left" 
                                data-show-refresh="false" 
                                data-pagination="true" 
                                data-maintain-selected="true"
                                data-toolbar="#toolbarReporteVentas" 
                                data-buttons-align="left" 
                                data-show-columns="true" 
                                data-pagination-h-align="left" 
                                data-pagination-detail-h-align="right" 
                                data-classes="table table-hover table-condensed" 
                                data-striped="true" 
                                data-buttons-class="gradient-primary-table" 
                                data-page-size="14" 
                                data-sort-name="" 
                                data-sort-order="asc" >
                                    <thead>
                                        <tr>
                                            <th data-field="sAcciones" data-sortable="true"  data-tableexport-display="none">Acciones</th>
                                            <th data-field="nItem" data-sortable="true">Item</th>
                                            <th data-field="nIdProspecto" data-sortable="true">Id Prospecto</th>
                                            <th data-field="dFechaCreacion" data-sortable="true">Fecha</th>
                                            <th data-field="sEmpleado" data-sortable="true">Empleado</th>
                                            <th data-field="sCliente" data-sortable="true">Cliente</th>
                                            <th data-field="sTelefono" data-sortable="true">Numero</th>
                                            <th data-field="sDocumento" data-sortable="true">Documento</th>
                                            <th class="text-left text-md-center" data-field="sDetalle" data-sortable="true">Detalle <br> Item | Cant x Precio </th>
                                            <th data-field="nCantidad" data-sortable="true">Cantidad</th>
                                            <th data-field="nTotal" data-sortable="true">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                    </div>
             </div>
        </div>
    </div>

    <div class="modal fade modal-full-screen" id="formBDClientes" tabindex="-1" role="dialog" aria-labelledby="formBDClientesLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formBDClientesLabel">Base de datos cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll">

                        <div class="row">
                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="" class="col-form-label">Tipo Cliente:</label>
                                        <select class="form-control" name="nTipoCliente" id="nTipoCliente">
                                            <option value="0">TODOS</option>
                                            <option value="1">EMPRESA</option>
                                            <option value="2">PERSONAS</option>
                                        </select>
                                    </div>
                                </div>          
                        </div>


                        <div class="row">

                            <div class="col-12">
                                <div class="d-flex align-items-center bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <h6 id="sTituloCliente" class="m-0">Clientes :</h6>
                                    </div>
                                   
                                </div>
                            </div>
                        
                        </div>


                        <div id="toolbarBDClientes"></div>

                        <div class="table-responsive">

                            <table data-toggle="table" id="tblBDClientes" data-card-view="false" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarBDClientes" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                    <thead>
                                        <tr>
                                            <th data-field="sNombreoRazonSocial" data-sortable="true">Nombre</th>
                                            <th data-field="sNumeroDocumento" data-sortable="true">Documento</th>
                                            <th data-field="sDireccion" data-sortable="true">Direccion</th>
                                            <th data-field="sContacto" data-sortable="true">Contacto</th>
                                            <th data-field="sRelacionamiento" data-sortable="true">Relacionamiento</th>
                                            <th data-field="sCorreo" data-sortable="true">Correo</th>
                                            <th data-field="sTelefono" data-sortable="true">Telefono</th>
                                            <th data-field="sTiempoCreacion" data-sortable="true">Tiempo de creacion</th>
                                            <th data-field="sHistorico" data-sortable="true">Historico</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade modal-full-screen" id="formBDEmpleados" tabindex="-1" role="dialog" aria-labelledby="formBDEmpleadosLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formBDEmpleadosLabel">Base de datos Empleados</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body modal-body-scroll">

                        <div class="row">
                            
                                <div class="col-md-3 col-12">
                                    <div class="form-group">

                                        <label for="nTipoEmpleadoFilter" class="col-form-label">Tipo Empleados:</label>
                                     
                                        <select class="form-control" name="nTipoEmpleadoFilter" id="nTipoEmpleadoFilter">
                                            <?php if (is_array($aryTipoEmpleados)  && count($aryTipoEmpleados) > 0) : ?>
                                                <?php foreach ($aryTipoEmpleados as $aryTipoEmpleado) : ?>
                                                    <option value="<?= $aryTipoEmpleado['nIdCatalogoTabla'] ?>"><?= $aryTipoEmpleado['sDescripcionLargaItem'] ?></option>
                                                <?php endforeach ?>
                                            <?php endif ?>
                                        </select>

                                    </div>
                                </div>

                                <div class="col-md-3 col-12">
                                    <div class="form-group">
                                        <label for="nEstadoEmpleadoFilter" class="col-form-label">Estado:</label>
                                        <select class="form-control" name="nEstadoEmpleadoFilter" id="nEstadoEmpleadoFilter">
                                            <option value="">TODOS</option>
                                            <option value="1">ACTIVO</option>
                                            <option value="0">DESACTIVO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-1 col-12">
                                    <div class="form-group">
                                         <label class="col-form-label d-md-block d-none">&nbsp;</label>
                                         <button id="btnFilterEmpleados" type="button" class="btn btn-gradient-primary btn-submit"><i class="fas fa-search"></i></button>
                                    </div>
                                </div>
          
                        </div>

                        <div class="row">

                            <div class="col-12">
                                <div class="d-flex align-items-center bd-highlight">
                                    <div class="flex-grow-1 bd-highlight">
                                        <h6 id="sTituloEmpleado" class="m-0">Empleados :</h6>
                                    </div>
                                    <div class="bd-highlight">
                                        <button type="button" id="btnCrearEmpleado" class="btn btn-gradient-primary btn-rounded btn-icon">
                                            <i class="fas fa-plus-circle"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        
                        </div>

                        <div id="toolbarBDEmpleados"></div>

                        <div class="table-responsive">

                            <table data-toggle="table" id="tblBDEmpleados" data-card-view="false" data-toggle="table" data-search="true" data-query-params="queryParams" toolbarAlign="left" data-show-refresh="false" data-pagination="true" data-toolbar="#toolbarBDEmpleados" data-buttons-align="left" data-show-columns="true" data-pagination-h-align="left" data-pagination-detail-h-align="right" data-classes="table table-hover table-condensed" data-striped="true" data-buttons-class="gradient-primary-table" data-card-view="false" data-page-size="14" data-sort-name="" data-sort-order="asc">
                                    <thead>
                                      
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                            </table>

                        </div>


                    </div>
                    <div class="modal-footer">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="formCEEmpleado" tabindex="-1" role="dialog" aria-labelledby="formCEEmpleadoLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEEmpleadoLabel">Nuevo Empleado</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                            <div id="formEmpleado" class="row">

                            </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>    
            </div>
        </div>
    </div>

    <div class="modal fade" id="formViewAdjuntos" tabindex="-1" role="dialog" aria-labelledby="formViewAdjuntosLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="formViewAdjuntosLabel">Ver Adjuntos</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        

                        <div class="row">

                            <div id="content-contrato-view" class="col-md-12 col-12">
                                <p class="mb-0">Contrato: </p>
                            </div>
                        
                            <div id="content-adjuntos-view" class="col-md-12 col-12">
                                <p class="mb-0">Adjuntos: </p>
                            </div>
                            
                        </div>
                           
                    
                    </div>
                </form>    
            </div>
        </div>
    </div>
    

    <div class="modal fade modal-full-screen" id="formReporteConsultor" tabindex="-1" role="dialog" aria-labelledby="formReporteConsultorLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="formReporteConsultorLabel">Reporte Consultor</h5>
                    <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body modal-body-scroll">

                    <form id="form-reporte-consultor" method="post">

                        <div class="row  py-2">

                            <div class="col-12 flex-center">
                                <h5>
                                    Reporte de Consultor
                                    <a id="btnCleanFiltrosRC" class="font-15" href="javascript:;"> <i class="fas fa-sync"></i> </a>
                                </h5>
                            </div>

                            <div class="col-md-2 col-12">
                                <div class="form-group">
                                    <label for="nTipoItemCatalogoRC" class="col-form-label">Tipo Item:</label>
                                    <select class="form-control" name="nTipoItemCatalogoRC" id="nTipoItemCatalogoRC">
                                        <option value="0">TODOS</option>
                                        <?php if (is_array($aryTipoItem)  && count($aryTipoItem) > 0) : ?>
                                            <?php foreach ($aryTipoItem as $aryTipo) : ?>
                                                <option value="<?= $aryTipo['nIdCatalogoTabla'] ?>"><?= $aryTipo['sDescripcionLargaItem'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-3 col-12">
                                <div class="form-group">
                                    <label for="nIdEmpleadoSupervisorRC" class="col-form-label">Supervisor:</label>
                                    <select multiple class="form-control select2" name="nIdEmpleadoSupervisorRC" id="nIdEmpleadoSupervisorRC">
                                        <?php if (fncValidateArray($arySupervisores)) : ?>
                                            <?php foreach ($arySupervisores as $arySuper) : ?>
                                                <option value="<?= $arySuper['nIdEmpleado'] ?>"><?= $arySuper['sNombre'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>



                            <div class="col-md-3 col-12  ">
                                <div class="form-group">
                                    <label for="nIdEmpleadoAsesorRC" class="col-form-label">Asesor:</label>
                                    <select multiple class="form-control select2" name="nIdEmpleadoAsesorRC" id="nIdEmpleadoAsesorRC">
                                        <?php if (fncValidateArray($aryVendedores)) : ?>
                                            <?php foreach ($aryVendedores as $aryVendedor) : ?>
                                                <option value="<?= $aryVendedor['nIdEmpleado'] ?>"><?= $aryVendedor['sNombre'] ?></option>
                                            <?php endforeach ?>
                                        <?php endif ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-2 col-12  ">
                                <div class="form-group">
                                    <label for="dDesdeRC" class="col-form-label">Desde:</label>
                                    <input type="text" class="form-control datepicker" id="dDesdeRC" autocomplete="off" name="dDesdeRC">
                                </div>
                            </div>

                            <div class="col-md-2 col-12 ">
                                <div class="form-group">
                                    <label for="dHastaRC" class="col-form-label">Hasta:</label>
                                    <input type="text" class="form-control datepicker" id="dHastaRC" autocomplete="off" name="dHastaRC">
                                </div>
                            </div>

                            <div class="col-12  flex-center">
                                <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Buscar</button>
                            </div>


                        </div>
                    </form>



                    <div id="toolbarRC"></div>

                    <div class="table-responsive">

                        <table  data-toggle="table" 
                                id="tblReporteConsultor"                               
                                data-export-types="['json', 'xml', 'csv', 'txt', 'pdf', 'excel']"   
                                data-export-options='{
                                    "fileName": "tableExport",
                                    "ignoreColumn": [],
                                    "worksheetName": "tableExport",
                                    "htmlContent" : "true",
                                    "jspdf": {
                                            "autotable": {
                                                "startY": 30,
                                                "bodyStyles": {"valign": "top"},
                                                "styles": {"overflow": "linebreak", "rowHeight": 20, "fontSize": 8, "font": "helvetica"},
                                                "headerStyles": {"fillColor": [41, 128, 185]},
                                                "tableWidth": "wrap",
                                                "columnStyles" : { "columnWidth" : "auto"  }
                                            }
                                        }
                                    }' 
                                data-show-export="true" 
                                data-mobile-responsive="true"  
                                data-toggle="table" 
                                data-search="true" 
                                data-query-params="queryParams" 
                                toolbarAlign="left" 
                                data-show-refresh="false"
                                data-pagination="true" 
                                data-toolbar="#toolbarRC"
                                data-buttons-align="left" 
                                data-show-columns="true" 
                                data-pagination-h-align="left" 
                                data-pagination-detail-h-align="right" 
                                data-classes="table table-hover table-condensed" 
                                data-striped="true" 
                                data-buttons-class="gradient-primary-table" 
                                
                                data-page-size="14" 
                                data-sort-name="" 
                                data-sort-order="asc">
                            <thead>
                                <tr>
                                    <th data-sortable="true" data-field="sColor">Color</th>
                                    <th data-sortable="true" data-visible="false"  data-field="sColorNombre">Nombre color</th>
                                    <th data-sortable="true" data-field="sEmpleado">Consultor</th>
                                    <th data-sortable="true" data-field="nAvance">Avance Cantidad</th>
                                    <th data-sortable="true" data-field="nRentaBasica">Avance Soles</th>
                                    <th data-sortable="true" data-field="nProspectosHoy">Prospecto del dia</th>
                                    <th data-sortable="true" data-field="nTotalProspectos">Prospecto Totales</th>
                                    <th data-sortable="true" data-field="nCantidadProspectoOppActivo">OPP Activa</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>


                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalDetalleCliente" tabindex="-1" role="dialog" aria-labelledby="modalDetalleClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalDetalleClienteLabel">Detalle Cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="table-responsive">

                            <table class="table table-bordered">

                                <tr>
                                    <th>T. Cliente</th>
                                    <td id="sTipoClienteDetalle"></td>
                                </tr>

                                <tr>
                                    <th>T. Docum. </th>
                                    <td id="sTipoDocDetalle"></td>
                                </tr>

                                <tr>
                                    <th>N° Docum. </th>
                                    <td id="sNumeroDocumentoDetalle"></td>
                                </tr>

                                <tr>
                                    <th>Nombre</th>
                                    <td id="sNombreoRazonSocialDetalle"></td>
                                </tr>

                                <tr>
                                    <th>Distrito</th>
                                    <td id="sDistritoDetalle" ></td>
                                </tr>

                                
                                <tr>
                                    <th>Direccion</th>
                                    <td id="sDireccionDetalle" ></td>
                                </tr>

                                <tr>
                                    <th>Contacto</th>
                                    <td id="sContactoDetalle"></td>
                                </tr>


                                <tr>
                                    <th>Relacion.</th>
                                    <td id="sRelacionamientoDetalle"></td>
                                </tr>

                            
                                <tr>
                                    <th>Telefono</th>
                                    <td id="sTelefonoDetalle" ></td>
                                </tr>

                                <tr>
                                    <th>Correo</th>
                                    <td id="sCorreoDetalle"></td>
                                </tr>

                                <tr>
                                    <td colspan="2" class="content-buttons-detalle-cliente text-center" id="content-buttons" >
                                    
                                    </td>
                                </tr>
                                                
                            </table>

                        </div>
                                               
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalErrorActividadNoCumplida" tabindex="-1" role="dialog" aria-labelledby="modalErrorActividadNoCumplidaLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalErrorActividadNoCumplidaLabel"> Citas No Cumplidas</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12 text-center">
                              <img src="<?=src('app/error.png')?>" alt="Error">
                            </div>
                            <div class="col-12 px-4">
                                <p class="mb-1 text-justify">Existen citas que ya se cumplieron con la fecha de programacion porfavor verifica,si ya la cumpliste terminala ,de caso contrario porfavor reprograma la cita, si no haces estas observaciones el sistema se bloqueara gracias.</p>
                                <span class="font-weight-bold"> Detalle :</span>
                                <p id="errorDetalle">
                                </p>
                            </div>
                            <div class="col-12 text-center mb-5">
                                <button  data-dismiss="modal" aria-label="Close" class="btn btn-danger">OK</button>
                            </div>
                        </div>                          
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formCECliente" tabindex="-1" role="dialog" aria-labelledby="formCEClienteLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEClienteLabel">Nuevo Cliente</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                    
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <a href="javascript:;" class="nav-item nav-link tab-form-custom active" id="btnViewFormEmpresa">Empresa</a>
                                    <a href="javascript:;" class="nav-item nav-link tab-form-custom" id="btnViewFormPersona">Persona</a>
                                </div>
                            </nav>
                            <div class="w-100">
                                <div id="formCliente" class="row">
                                    
                                </div>  
                            </div>
                    
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div class="modal fade" id="formCEProspectoSimple" tabindex="-1" role="dialog" aria-labelledby="formCEProspectoSimpleLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h5 class="modal-title" id="formCEProspectoSimpleLabel">Crear Prospecto Simple</h5>
                        <button type="button" class="btn btn-close btn-gradient-primary btn-rounded p-0" data-dismiss="modal" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        
                        <div class="row my-1">

                                

                                <div class="col-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sTituloPS" class="col-form-label">Titulo</label>
                                        <input id="sTituloPS" name="sTituloPS" type="text" autocomplete="off" class="form-control">
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nIdClientePS" class="col-form-label">Cliente</label>
                                        <select id="nIdClientePS" name="nIdClientePS" class="form-control">
                                            <option value="0">Seleccionar</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12 col-md-6">
                                    <div class="form-group">
                                        <label for="nIdEmpleadoPS" class="col-form-label">Empleado</label>
                                        <select id="nIdEmpleadoPS" name="nIdEmpleadoPS" class="form-control">
                                        </select>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="sNotaPS" class="col-form-label">Nota</label>
                                        <textarea class="form-control d-block my-2" placeholder="Escribe una nota.." name="sNotaPS" id="sNotaPS" cols="2" rows="2"></textarea>
                                    </div>
                                </div>

                                <!-- Validar si exque existe el widget de CITAS en este negocio-->
                                <?php if($bExisteWidgetCitas): ?>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5 class="my-2 font-weight-400">Crear Primera Cita</h5>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sFechaActividadPS" class="col-form-label">Fecha</label>
                                            <input id="sFechaActividadPS" name="sFechaActividadPS" type="date" autocomplete="off" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="sHoraActividadPS" class="col-form-label">Hora</label>
                                            <input id="sHoraActividadPS" name="sHoraActividadPS" type="time"  autocomplete="off" class="form-control">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <label for="sNotaActividadPS" class="col-form-label">Nota para la cita</label>
                                            <textarea class="form-control d-block my-2" placeholder="Escribe una nota.." name="sNotaActividadPS" id="sNotaActividadPS" cols="2" rows="2"></textarea>
                                        </div>
                                    </div>

                                <?php endif; ?> 
                                <!-- Validar si exque existe el widget de CITAS en este negocio-->
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-gradient-primary btn-fw btn-submit">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <!-- Fin de modales -->


</body>


<?php extend_view(['admin/common/scripts'], $data) ?>
 
<?php
    if ($isUser) {
        load_script_plugin([
            'bootstrap-table/mobile/bootstrap-table-mobile',
            'bootstrap-table/tableExport/libs/FileSaver/FileSaver.min',
            'bootstrap-table/tableExport/libs/js-xlsx/xlsx.core.min',
            'bootstrap-table/tableExport/libs/jsPDF/jspdf.min',
            'bootstrap-table/tableExport/libs/jsPDF-AutoTable/jspdf.plugin.autotable',
            'bootstrap-table/tableExport/libs/pdfmake/pdfmake.min',
            'bootstrap-table/tableExport/libs/pdfmake/vfs_fonts',
            'bootstrap-table/tableExport/tableExport.min',
        ]);
    }   
?>
<!-- General -->
<script>

    window.isUser     ;
    window.isEmpleado ;
    window.isSuper    ;
    window.isAsesor   ;

    $(function() {

        // marquee($('#cI1'), $('#cIH1'));  //Enter name of container element & marquee element
        // marquee($('#cI2'), $('#cIH2'));  //Enter name of container element & marquee element


        //$(".content-indi-marquee").marquee();
        $("body").data("sfiltro","");

        window.isUser     = $("body").data("isuser"); // Admin or Visitante
        window.isEmpleado = $("body").data("isempleado");
        window.isSuper    = $("body").data("isempleado") && $("body").data("ntipoempleado") == $("body").data("ntipoempleadosupervisor"); 
        window.isAsesor   = $("body").data("isempleado") && $("body").data("ntipoempleado") == $("body").data("ntipoempleadoasesorventas"); 

        
        fncValidarRol();
        fncOcultarAside();
        $("#content-5").hide();
         

        fncGetProspectosForEtapas();
        fncDrawIndicativosGeneralHoy();
        // Formulario Invitar
        
        $("#btnCleanFiltros").on('click',function(){
            $("#sBuscador").val("");
            $("body").data("nIdSupervisor",null);
            $("body").data("sFilterProspectos","TODOS");
            $("body").data("sfiltro",null);
            fncGetProspectosForEtapas(null);
        });

        $("#sBuscador").on("keyup search",function(event){
           fncGetProspectosForEtapas($("body").data("nIdSupervisor"), $(this).val().trim() , false);
           $("body").data("sFilterProspectos","BUSCADOR");
        });
    });


    window.fncDrawProspectosForState =  () =>{

        if( $("body").data("sFilterProspectos") == 'BUSCADOR' &&  $("#sBuscador").val().trim().length > 0 ){

            $("#sBuscador").trigger("keyup");
            console.log("buscador");

        } else if ( $("body").data("sFilterProspectos") == 'SUPER' && $("body").data("nIdSupervisor") != "0") {

            fncGetProspectosForEtapas($("body").data("nIdSupervisor"));
            console.log("super");

        } else {
            fncGetProspectosForEtapas();
            console.log("todos");
        }

    } 

    // Funciones de la tabla o layout Principal 
    window.fncGetProspectosForSuper = (nIdEmpleado)=>{
        $("body").data("nIdSupervisor",nIdEmpleado);
        $("body").data("sFilterProspectos","SUPER");
        fncGetProspectosForEtapas(nIdEmpleado);
        fncDrawIndicativosGeneralHoy();
    };

    window.fncVerEmpleado = (nIdEmpleado)=>{
           
           var jsnData = {
               nIdRegistro : nIdEmpleado,
           };

           fncMostrarRegistroCard(jsnData,true,(aryData)=>{
            if(aryData.success){
                var aryData= aryData.aryData ; 

                $("#circuloIndi").html(aryData.sEmpleadoCorto);
                $("#circuloIndi").attr("data-original-title",aryData.sNombre);
                $("#sNombreEmpIndi").html(aryData.sNombre);
                $("#sTipoEmpleado").html(aryData.sTipoEmpleado);
                $("#sNegocioEmpIndi").html(aryData.sNombreNegocio);
                $("#cuadradoIndi").addClass("fondo-"+aryData.sColorSuperEmpleado.toLowerCase());
                $("#sActivoHaceIndi").html(aryData.sUltimoAcceso);

                var dDesde =  moment().startOf('month').format('DD/MM/YYYY');
                var dHasta =  moment().format('DD/MM/YYYY');

                var jsnData = {
                    nIdNegocio   : $("body").data("nidnegocio"),
                    nIdEmpleado  : nIdEmpleado,
                    dDesde       : dDesde,
                    dHasta       : dHasta,
                };

                fncGetProspectos(jsnData,true,(aryData)=>{

                    var aryIndicativos = aryData.aryIndicativos;
                 
                    $("#nAvance").html(aryIndicativos.nAvance);
                    $("#nRentaBasica").html(aryIndicativos.nRentaBasica);
                    $("#nCompra").html(aryIndicativos.nCompra);
                    $("#nTicket").html(aryIndicativos.nTicket);
                    $("#nEfectividad").html(aryIndicativos.nEfectividad);
                    $("#nOportunidadEmpleado").html(aryIndicativos.nOportunidad);

                    if(dDesde != "" &&  dHasta !="" ){
                        $("#titulo-indi").html("Indicativos <br/> <span style='font-size:15px;'> " + dDesde +  " - " + dHasta  +"</span>");
                    } else {
                        $("#titulo-indi").html("Indicativos");
                    }
                    
                    var jsnData = {
                        nIdNegocio   : $("body").data("nidnegocio"),
                        nIdEmpleado  : nIdEmpleado,
                    };

                    fncIndicativosHoy(jsnData,false,(aryData)=>{

                        if(aryData.success){
                            
                            var aryData = aryData.aryData;

                            $("#nCitasCercanas").html(aryData.nCantidadCitasHoy);
                            $("#nTotalCierre").html(aryData.nCierreHoy);
                            $("#nProspectosHoyEmpleado").html(aryData.nProspectosHoy);
                            $("#formIndicativos").modal("show");            

                        } else {
                            toastr.error(aryData.error);
                        }
                 
                    });


                });
            }else{
                toastr.error(aryData.error);
            }

           });

    }

    window.fncValidarRol  = () => {

        if(window.isUser){

            if( $("body").data("nrol")  == $("body").data("nrolprospectoadmin") ) {
                // Usuario
                $("#btnCrearInvitacion").show();
                $("#btnPendiente").show();
            } else {

                // Visitante 
                $("#btnCrearInvitacion").hide();
                $("#btnPendiente").hide();
                
            }

        } else {
            // Empleado  
            // Tipo de empleado 

            if(window.isSuper){
                // Si es supervisor
 
                $("#btnCrearInvitacion").show();
                $("#btnPendiente").show();

            } else {
                $("#content-supervisores-mobile,#content-supervisores,#btnVerTodosEmpleados,#dropdownMenuLink").attr("style", "display: none !important"); 
                $("#btnCrearInvitacion").hide();
                $("#btnPendiente").hide();
            }
        
        }

       

    }

    window.fncDrawIndicativosGeneralHoy = () => {

        var jsnData= {
            nIdNegocio    : $("body").data("nidnegocio"),
            dDesde        : moment().startOf('month').format('DD/MM/YYYY'),
            dHasta        : moment().endOf('month').format('DD/MM/YYYY'),
            sBuscador     : $("#sBuscador").val().trim().length > 0 ?  $("#sBuscador").val().trim() : null,
            nIdSupervisor : typeof $("body").data("nIdSupervisor") != "undefined" && $("body").data("nIdSupervisor") !=  "" ? $("body").data("nIdSupervisor") : null
        };

        if(window.isAsesor){
            jsnData = Object.assign(jsnData, {
                nIdEmpleado : $("body").data("nidempleado")
            });
        }

        fncGetIndicativosGeneral(jsnData,true,(aryData)=>{

            if(aryData.success){
                
                var aryData = aryData.aryData;

                $(".nAvanceGeneral").html(aryData.nAvance);
                $(".nRBGeneral").html(aryData.nRentaBasica);
                $(".nOportunidad").html(aryData.nOportunidad);
                $(".nCompraGeneral").html(aryData.nCompra);
                $(".nTicketGeneral").html(aryData.nTicket);
                $(".nEfectividadGeneral").html(aryData.nEfectividad);
                $(".nTotalProspectosGeneral").html(aryData.nTotalCantidadProspectos);
                $(".nEmpleadosActivos").html(aryData.nEmpleadosActivos);
                $(".nProductividadGeneral").html(aryData.sProductividad);
                $(".nIndiceApertura").html(aryData.nTasaCliente);

 
                fncIndicativosHoy(jsnData,false,(aryData)=>{

                    if(aryData.success){
                        
                        var aryData = aryData.aryData;

                        $(".nAvanceHoy").html(aryData.nAvance);
                        $(".nCierreHoy").html(aryData.nCierreHoy);
                        $(".nRBHoy").html(aryData.nRentaBasica);
                        $(".nCitasHoy").html(aryData.nCantidadCitasHoy);
                        $(".nProspectosHoy").html(aryData.nProspectosHoy);
                        $(".nCantidadEmpleadosHoy").html(aryData.nCantidadEmpleadosHoy);

                    } else {
                        toastr.error(aryData.error);
                    }

                });


            } else {
                toastr.error(aryData.error);
            }
        });

    };

    window.fncGetProspectosForEtapas = function(nIdSupervisor = null , sBuscador = null,bShowLoader= true){


        if($("body").data("ntipoprospecto") == $("body").data("ntipoprospectolargo")){
            // Prospecto largo
            console.log("largo");
            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaprogramada"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador
            };

         

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaenviopropuesta"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);


            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapanegociacion"),
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                nIdSupervisor   : nIdSupervisor,
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaenproceso"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapacierre"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador

            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);


        } else {

            //Prospecto Corto
            console.log("corta");

            $("#content-"+ $("body").data("nidetapaenviopropuesta")).hide();
            $("#content-"+ $("body").data("nidetapanegociacion")).hide();
            $("#content-"+ $("body").data("nidetapaenproceso")).hide();

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapaprogramada"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador
            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);


            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapacierre"),
                nIdSupervisor   : nIdSupervisor,
                nIdEmpleado     : window.isAsesor ? $("body").data("nidempleado") : "",
                sFiltro         : $("body").data("sfiltro"),
                sBuscador       : sBuscador
            };

            fncDrawCardProspecto(jsnData, "#list-p-"+ jsnData.nIdEtapa ,false , true, bShowLoader);
        }

    }

    window.fncDrawCardProspecto = function(jsnData,sHtmlTag,bPendiente = true, bSowMore = true , bShowLoader = true ){
        
        var sHtml = ``;

        fncGetProspectos(jsnData, bShowLoader , function(aryData){
            if(aryData.success){

                var isRolAdmin = false;

                if($("body").data("isuser")){
                     isRolAdmin = $("body").data("nrol") == $("body").data("nrolprospectoadmin") ? true : false;
                }else{

                    if($("body").data("ntipoempleado") == $("#ntipoempleadosupervisor").data("ntipoempleadosupervisor")){
                        // Super 
                        isRolAdmin = false;
                    } else {
                        // Asesor
                        isRolAdmin = true;
                    }

                }
                

                $.each(aryData.aryData, function (nKeyItem, aryItem) {
 
                  //console.log(aryItem.aryUltimaCita ,  (typeof aryItem.aryUltimaCita === 'object')  );
                    sHtml += `<div class="col-12 col-md-12 px-0 px-md-0 items">
                                <div class="card-prospecto border-top-pr border-left-pr etapa-${aryItem.nIdEtapa}-border-left border-top-${aryItem.aryEmpleado.sColorSuperEmpleado.toLowerCase()} mb-3">  
                                        <div class="row no-gutters mb-1">
                                            <div class="col-10">
                                                <span 
                                                
                                                class="pr-cliente">
                                                    ${ aryItem.sCliente.length > 0 ? `Cliente: ${fncUc(fncCutText(aryItem.sCliente))}` : `Titulo : ${fncUc(fncCutText(aryItem.sTitulo))}`  }
                                                </span>
                                                <div class="w-100"></div>
                                                ${ is_admin == true ? ` <div class="w-100"></div> <span class="pr-vendedor">Vend: ${fncUc(fncCutText(aryItem.aryEmpleado.sNombre))}</span> `:``}
                                            </div>
                                            <div class="col-2 d-flex justify-content-end">
                                                ${bPendiente ? 
                                                `<a class="pr-icon-edit" href="javascript:;" onclick="fncTerminarProspecto(${aryItem.nIdProspecto},'${aryItem.nIdProspectoFormat}',${aryItem.aryEmpleado.nIdEmpleado},'${fncUc(aryItem.aryEmpleado.sNombre)}', '${unescape(fncUc(aryItem.sCliente.replace(/"/g, '&quot;').replace(/"/g, '\\\\\"').replace( "'", " ")))}' );"><i class="far fa-check-circle"></i></a>`  : 
                                                `<a class="pr-icon-edit" href="javascript:;" onclick="fncEditarProspecto(${aryItem.nIdProspecto});"> ${ isRolAdmin ? `<i class="far fa-edit"></i>` : `<i class="far fa-eye"></i>` } </a>`}
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-6">`;

                                            if (aryItem.aryCatalogo.length > 0){
                                                $.each(aryItem.aryCatalogo, function (nKeyCat, aryItemCat) {
                                                    sHtml += ` <span class="font-14 d-block"> ${  fncUc(aryItemCat.sItemCantidadPrecio)}</span>` ;
                                                });
                                            } else {
                                                sHtml += ` <span class="font-14 d-block"> No hay productos o servicios </span>` ;
                                            }

                    sHtml +=          `</div>
                                            <div class="col-6 text-right d-flex justify-content-end align-items-center">
                                                ${ (typeof aryItem.aryUltimaCita === 'object') && Object.values(aryItem.aryUltimaCita).length > 0  && aryItem.aryUltimaCita.sColor != '' && aryItem.aryUltimaCita.dFecha != '' ? `<span class="ult-cita color-text-${aryItem.aryUltimaCita.sColor}"> Ult.Cita ${moment( aryItem.aryUltimaCita.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY')} ${ moment(aryItem.aryUltimaCita.dHora,'HH:mm').format("HH:mm") } </span>` : ``  } 
                                            </div>
                                        </div>

                                        <div class="row no-gutters mb-1">
                                            <div class="col-7">
                                                <span class="font-14 etapa-${aryItem.nIdEtapa}-color">${aryItem.sEtapa}</span>
                                            </div>
                                            <div class="col-5 text-right">
                                                <span class="ult-ingreso color-text-verde break-spaces"> ${ aryItem.sTimeUltimoAcceso.length > 0 ? `Ingreso hace ${aryItem.sTimeUltimoAcceso}` : `Creado Ahora`  } </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
                });

                var  aryIndicativos = aryData.aryIndicativos ;

                var sHtmlIndi    = `<b>${aryIndicativos.nTotalCantidadProspectos}</b> por <b>${simbolo_moneda + aryIndicativos.nTotal}</b> y <b>${aryIndicativos.nTotalUnidades} ${aryIndicativos.nTotalUnidades == 1 ? 'Unidad' : 'Unidades'} </b> `;
                var sDivHtmlIndi = `#descr-prospec-${jsnData.nIdEtapa}`;
                
                if(bSowMore){
                    
                    if(aryData.aryData.length >0){

                        var sNameIdShowMore       = "btnShoMore" + sHtmlTag.replace("#",""); 
                        var sHtmlTagShowMore      = "#" +sNameIdShowMore ;
                        var sActionAnterior       = typeof $(sHtmlTagShowMore).data("action") == 'undefined' ? 'show' : $(sHtmlTagShowMore).data("action");
                        var sTextActionAnterior   = typeof $(sHtmlTagShowMore).data("action") == 'undefined' ? 'Ver Todo' : 'Ver Menos';

                        sHtml += `<div class="col-12 my-1 text-right"><a id="${sNameIdShowMore}" href="javascript:;" data-action='${sActionAnterior}' class="ShowMore">${sTextActionAnterior}</a></div>`;
                    
                    }
                }

                $(sHtmlTag).html(sHtml);
                $(sDivHtmlIndi).html(sHtmlIndi);

                if(bSowMore){
                    setTimeout(() => {
                        fncEventListenerShowMoreLess();
                    }, 1000);
                }

              
            }
        });
    }


    window.fncValidateActividadesNoCumplidas = function(){

        var jsnData = {
            nIdEmpleado : $("body").data("nidempleado")
        };

        fncGetActividadesNoCumplidas(jsnData,(aryData)=>{

            if(aryData.success){
                var aryData = aryData.aryData;

                if(aryData.bExistenNoCumplidas){
                    var sTitulo = aryData.nCantidadActividad == 1 ? '1 Cita No Cumplida' : aryData.nCantidadActividad + ' Citas No Cumplidas';
                    $("#modalErrorActividadNoCumplida").find(".modal-title").html(sTitulo);                    
                    $("#errorDetalle").html(aryData.sDetalle);
                    $("#modalErrorActividadNoCumplida").modal("show");
                }

                console.log(aryData);


            } else {
                aryData.error(aryData.error);
            }

        });

    }



    // Oculatar o mostrar el siderbar 

  
    function fncGetProspectos(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectos',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            } ,
            error: function(error) {
                alert( JSON.stringify(error) );
            }
        });
    }

    function fncMostrarRegistroCard(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncMostrarRegistroCard',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            }
        });
    }
  
    function fncIndicativosHoy(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncIndicativosHoy',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            }
        });
    }

    function fncGetIndicativosGeneral(jsnData, bShowLoader= true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetIndicativosGeneral',
            data: jsnData,
            beforeSend: function() {
             if(bShowLoader) fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader) fncOcultarLoader();
            }
        });
    }
</script>
<!-- General -->



<!-- Invitar -->
<script>

    $(function() {


        // Formulario Invitar

        $("#btnCopyLink").on('click', function() {
            copyToClipboard('sLinkCopy');
            toastr.success("Genial!. Link copiado en portapeles");
        });

        $("#btnCrearInvitacion").on('click', function() {
            $("#content-link-copy").hide();
            $("#container-color").hide();
            $("#container-supervisor").hide();
            $("#formColaborador").modal("show");
        });

        $("#nTipoEmpleado").on('change', function() {
            if ($(this).val() != 0) {
                if ($(this).val() == $("body").data("ntipoempleadosupervisor")) {
                    //Supervisor
                    $("#container-color").show();
                    $("#container-supervisor").hide();

                } else {

                    $("#container-color").hide();
                    $("#container-supervisor").show();
                }
            } else {
                $("#container-color").hide();
                $("#container-supervisor").hide();
            }
        });

        $('#formColaborador').on('hidden.bs.modal', function() {
            fncClearInputs($("#formColaborador").find("form"));
        });

        $("#formColaborador").find('form').on('submit', function(event) {
            event.preventDefault();

            var sEmail          = $("#sEmail").val().trim();
            var nTipoEmpleado   = $("#nTipoEmpleado").val().trim();
            var nIdColor        = $("#nIdColor").val().trim();
            var nIdSupervisor   = $("#nIdSupervisor").val();

            if(sEmail == '' || !fncValidateEmail(sEmail)){
                toastr.error('Error. Debe ingresar un correo con un formato correcto . Porfavor verifique.');
                return false;
            } if(nTipoEmpleado == 0){
                toastr.error('Error. Debe seleccionar el tipo de empleado.');
                return false;
            } 


            if (nTipoEmpleado == $("body").data("ntipoempleadosupervisor")) {
                if(nIdColor == 0){
                    toastr.error('Error. Debe seleccionar el color del supervisor.');
                    return false;
                }
            } else {
                if(nIdSupervisor == 0){
                    toastr.error('Error. Debe seleccionar un supervisor.');
                    return false;
                }
            }

            var jsnData =  {
                sEmail          : sEmail,
                nTipoEmpleado   : nTipoEmpleado,
                nIdColor        : nIdColor,
                nIdSupervisor   : nIdSupervisor
            };
        
            fncSendEmailEmpleado(jsnData, function(aryData){
            
                if(aryData.success){
                    toastr.success("Genial!.Se envio el correo correctamente.");
                } else {
                    toastr.error("Upss!. Hubo un error al enviar el correo.");
                }

                $("#content-link-copy").fadeIn();
                $("#sLinkCopy").val(aryData.sUrl);
            });

        });

 
    });


    // Llamadas al servidor
    function fncSendEmailEmpleado(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/empleados/fncSendEmailEmpleado',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
 
</script>
<!-- Invitar -->


<!-- Pendientes -->
<script>
  
    $(function() {

        // Formulario Pendientes
        
        $("#btnPendiente").on('click', function() {
            
            var jsnData = {
                nIdNegocio       : $("body").data("nidnegocio"),
                nIdEtapa         : $("body").data("nidetapapendiente"),
                nValidacionAdmin : 1
            };

            fncDrawCardProspecto(jsnData,"#content-pendientes",true,false);
            $("#modalPendientes").modal("show");
        });

    
        
    });

    // Funciones de la tabla o layout Principal 

    function fncTerminarProspecto(nIdProspecto,nIdProspectoFormat,nIdEmpleado,sEmpleado,sCliente){

        if(confirm("¿Estas seguro de validar este prospecto?")){

            var jsnData = {
                nIdRegistro : nIdProspecto,
                nIdEtapa    : $("body").data("nidetapacierre")
            };

            fncEjecutarTerminarProspecto(jsnData,function(aryData){
                if(aryData.success){

                    var jsnData = {
                        nIdNegocio       : $("body").data("nidnegocio"),
                        nIdEtapa         : $("body").data("nidetapapendiente"),
                        nValidacionAdmin : 1
                     };

                    fncDrawCardProspecto(jsnData,"#content-pendientes",true,false);
                    fncDrawProspectosForState();

                    var messageJSON = {
                        type       : 'NOTIFICACION_VALIDACION_PROSPECTO',
                        message    : {
                            nIdProspecto            : nIdProspecto,
                            nIdProspectoFormat      : nIdProspectoFormat,
                            nIdEmpleado             : nIdEmpleado,
                            sEmpleado               : sEmpleado,
                            sCliente                : sCliente
                        }
                    };

                    websocket.send(JSON.stringify(messageJSON));
                    fncDrawIndicativosGeneralHoy();
                    fncDrawNotificaciones(false);
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });
        }
    }


    // Llamadas al servidor
    function fncEjecutarTerminarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncTerminarProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
 
  
    
</script>
<!-- Pendientes -->

<!-- Prospecto -->
<script>


    $(document).ready(function() {

        window.fncTriggerDrawProspecto();

       

        $("#btnCrearProspecto").on("click", function() { 

            window.fncTriggerDrawProspecto((bStatus)=>{
                
                $("#content-etapa-prospecto").hide();
                $("#content-historico-prospecto").hide();  
                //$("#content-cambio-consultor").hide();
                fncCleanAll();

                if(window.isAsesor){
                    $("#nIdEmpleadoP").val($("body").data("nidempleado"));
                }

                $("#formProspecto").data("sAccion","crear");
                $("#title-prospectos").html("Crear Prospecto");
                $("#formProspecto").data("nIdRegistro", 0);  
                $("#formProspecto").modal("show");

            });        

        });

        $("#formProspecto").find("form").on("submit",function(event){
            event.preventDefault();

           // Items Default 
           var nIdRegistro       = $("#formProspecto").data("nIdRegistro");
           var sTitulo           = $("#sTituloProspecto");
           var nIdCliente        = $("#nIdCliente");
           var arySegmentaciones = [];
           var aryCatalogos      = [];
           var aryActividades    = [];
           var sNota             = $("#sNota");
           var nIdEmpleado       = $("#nIdEmpleadoP");           
           var nEstado           = $("#nEstado");

           var aryServicios = fncGetDataTableCatalogo("#table-servicios");
           var aryProductos = fncGetDataTableCatalogo("#table-productos");

           aryCatalogos = aryServicios.concat(aryProductos);
            
            if($(".content-segmetacion").length>0){
                $(".content-segmetacion").each(function(nIndex,element){
                        var sLabel              = $(this).find("label").html();
                        var nIdSegmentacion     = $(this).find("label").data("nidsegmentacion");
                        var nRequerido          = $(this).find("select").data("nrequerido");
                        var nIdDetalle          = $(this).find("select").find("option:selected").val();

                        if(nRequerido == 1){
                            if(nIdDetalle == 0){
                                toastr.error("Error.Debe de seleccionar "+ sLabel +".Porfavor verifique");
                                return;
                            }
                        }

                        arySegmentaciones.push({
                            nIdSegmentacion : nIdSegmentacion,
                            nIdDetalle      : nIdDetalle
                        });
                });
            }

            if($(".content-actividades").length>0){
                $(".content-actividades").find(".content-actividad").each(function(nIndex,element){
                        var jsnDataItem = $(this).data("jsndata");
                        aryActividades.push(jsnDataItem);
                });
            }


            // if(nIdCliente.length>0 && nIdCliente.val()==0){
            //     toastr.error("Error.Debe de seleccionar un cliente .Porfavor verifique");
            //     return;
            // }  
            
            if($("#table-servicios").length>0 && $("#table-productos").length>0 && aryCatalogos.length == 0){
                toastr.error("Error.Debe de seleccionar un producto o servicio .Porfavor verifique");
                return;
            } else if(nIdRegistro == 0 && $(".content-actividades").length>0  && aryActividades.length == 0 ){
                toastr.error("Error.Debe de ingresar una cita para el prospecto .Porfavor verifique");
                return;
            }

            if( nIdEmpleado.length>0 &&  nIdEmpleado.val() == '0'){
                toastr.error("Error.Debe de seleccionar un asesor de ventas .Porfavor verifique");
                return;
            }
           

            var jsnData = {
                nIdRegistro         : nIdRegistro, 
                nIdCliente          : nIdCliente.length > 0 ? nIdCliente.val() : null,
                sTitulo             : sTitulo.length>0 ? sTitulo.val()  : null,
                nIdNegocio          : $("body").data("nidnegocio"),
                nIdEmpleado         : nIdEmpleado.val(),
                aryCatalogos        : aryCatalogos,
                arySegmentaciones   : arySegmentaciones,
                aryActividades      : aryActividades,
                sNota               : sNota.length > 0 ? sNota.val() : null,
                nEstado             : nIdRegistro == 0 ? 1 : nEstado.val()
            };
            
            // Data extra 
            var aryDataExtra  = $("#formProspecto").data("aryDataExtra");
            var aryValueExtra = [];
            
            if(aryDataExtra.length>0){

                $.each(aryDataExtra, function( nIndex, aryItem ) {

                    var sWidgetSystem     = aryItem.sWidgetSystem;
                    var sTipoCampoSystem  = aryItem.sTipoCampoSystem;
                    var sWidget           = aryItem.sWidget;
                    var nRequerido        = aryItem.nRequerido;

                    switch (sTipoCampoSystem) {

                        case "text":
                        case "tel":
                        case "textarea":
                        case "date":

                            var sVal  = $("#" + sWidgetSystem).val();
                            if(nRequerido == 1){
                                if(sVal == ''){
                                    toastr.error("Error.Debe de ingresar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem] : sVal,
                            });
                            

                            break;
                        case "select":
                            var sVal = $("#" + sWidgetSystem).find("option:selected").val();

                            if(nRequerido == 1){
                                if(sVal == '0'){
                                    toastr.error("Error.Debe de seleccionar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem] : sVal
                            });
                            break;

                        case "radio":
                            var sVal = $('input:radio[name='+sWidgetSystem+']:checked').val();

                            if(nRequerido == 1){
                                if(sVal === undefined){
                                    toastr.error("Error.Debe de seleccionar un "+ sWidget +".Porfavor verifique");
                                    return;
                                }
                            }

                            aryValueExtra.push({
                                [sWidgetSystem]  : sVal != undefined ? sVal : null 
                            });

                            break;
                    }
                });

                jsnData = Object.assign({ aryValueExtra : aryValueExtra }, jsnData);

            }
           
            fncGrabarProspecto(jsnData,function(aryData){
                if(aryData.success){

                    $("#formProspecto").modal("hide");
                    fncGetProspectosForEtapas();
                    toastr.success(aryData.success);

                } else {
                    toastr.error(aryData.error);
                }
            });

        });


        $('#formProspecto').on('hidden.bs.modal', function () {
            
            fncClearInputs($("#formProspecto").find("form"));

            $("#content-actividades").html("");
            $("#content-notas").html("");
            $("#formProspecto").find("table").find("tbody").html("");
            $("#nIdCliente").prop("disabled",false);
            $("#btnCrearCliente").show();
            $('#formProspecto').find("table").find("tfoot").find(".cantidad-total").html("0");
            $('#formProspecto').find("table").find("tfoot").find(".total").html("0");
            $("#formProspecto").find(".btn-submit").show();
            
            // Si 
            if($("#formProspecto").data("sAccion") == "editar") {

                $("#formProspecto").data("nIdRegistro",0);
                fncDrawProspectosForState();
                fncDrawNotificaciones(false);

             }
           
        });


        $("#btnVerAdjuntos").on("click",function(){
            $("#nIdEtapa-"+$("body").data("nidetapaenproceso")).trigger("click");
        });

        $(".btnFiltro").on("click",function(){
            $("body").data("sfiltro",$(this).data("sfiltro"));
            fncGetProspectosForEtapas();
        });

    
    });


    window.fncEditarProspecto = function(nIdProspecto){

        var jsnData = {
            nIdRegistro  : nIdProspecto,
            nIdNegocio   : $("body").data("nidnegocio")
        };

        $("#btnDescargarPdfProspecto").hide();
        $("#btnVerAdjuntos").hide();

        //window.fncTriggerDrawProspecto((bSatus)=>{
            //if(bSatus){
            // } else{
            //     alert("Ups... ocurrio un error, vuelve a intentarlo o porfavor solicita asistencia.");
            // }

        // });

        fncMostrarProspecto(jsnData , function(aryData){

            if(aryData.success){

                if(window.isUser){
                    // Si es usuario 
                    isRolAdmin = $("body").data("nrol") == $("body").data("nrolprospectoadmin") ? true : false;
                } else {
                    // Si es empleado asesor o supervisor 
                    isRolAdmin = true;
                }
                
                $("#content-etapa-prospecto").show();
                $("#content-historico-prospecto").show();  

                $("#formProspecto").data("nIdRegistro",nIdProspecto);
                $("#formProspecto").data("sAccion","editar");
                
                var aryProspecto             = aryData.aryData.aryProspecto ;
                var aryProspectoSegmentacion = aryData.aryData.aryProspectoSegmentacion ;
                var aryConfigExtra           = aryData.aryData.aryConfigExtra ;

                $("#nIdEmpleadoP").val(aryProspecto.nIdEmpleado);
 
                var aryConfigExtra       = aryData.aryData.aryConfigExtra ;
                var sLinkWebCotizacion   = aryData.aryData.sLinkWebCotizacion ;

                if(
                    aryProspecto.nIdEtapa == $("body").data("nidetapaenviopropuesta") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapanegociacion") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapaenproceso") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapacierre") 
                ){
                    $("#btnDescargarPdfProspecto").attr("href",route( 'admin/prospecto/fncDownloadPropuesta/' + nIdProspecto ) );
                    $("#btnDescargarPdfProspecto").show();
                }

                if( aryProspecto.nIdEtapa == $("body").data("nidetapaenproceso") ||
                    aryProspecto.nIdEtapa == $("body").data("nidetapacierre")  || 
                    aryProspecto.nIdEtapa == $("body").data("nidetapanegociacion") 
                ){
                    $("#btnVerAdjuntos").show();
                }

                
                // Etapa Propsecto 
                fncSetEtapa(aryProspecto.nIdEtapa);


                // Data default
                // Cliente
                
                if($("#nIdCliente").length>0){
                    
                    $("#nIdCliente").val(aryProspecto.nIdCliente);

                    if(aryProspecto.nIdCliente == 0 || aryProspecto.nIdCliente == ''){
                        
                        $("#btnCrearCliente").show();
                        
                        $('#nIdCliente').prop('disabled', false);

                    } else {
                        $("#btnCrearCliente").hide();
                        $('#nIdCliente').prop('disabled', true);
                    }
                
                }

                if($("#sTituloProspecto").length > 0){
                    $("#sTituloProspecto").val(aryProspecto.sTitulo);
                    $("#sTituloProspecto").data("sTituloOld",aryProspecto.sTitulo);
                }


                // Se hace los ajax en cadena  ya que tengo qie esperar a que todos los elementos cargen para poder bloquear los inputs
                // Catalogo validar que en todos los prospectos productos

                if($("#table-servicios").length >0 && $("#table-productos").length > 0 ){

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro")
                    };

                    fncListarCatalogo(jsnData, (bStatus) => {

                        if(bStatus){

                        // Actividades
                            var jsnData = {
                                nIdRegistro     : $("#formProspecto").data("nIdRegistro"),
                                nTipoActividad  :  1
                            };

                            fncListarActividades(jsnData,(bStatus)=>{
                                // Se Listaron las actividades 

                                if(bStatus){
                                    // Notas
                                    $("#sNota").attr("onblur","fncGrabarNota(0,this);");
                                                    
                                    var jsnData = {
                                        nIdRegistro : $("#formProspecto").data("nIdRegistro")
                                    };

                                    fncListarNota(jsnData,(bStatus)=>{
                                        // Se Listaron las notas  

                                        if(bStatus){
                                            
                                            fncListarCambios(jsnData,(bStatus)=>{

                                                if(bStatus){

                                                // Si se listaron todos 

                                                    if(isRolAdmin){

                                                        // Es administrador
                                                        var sTitle = "Editar Prospecto" ;

                                                        $("#btnAgregarCatalogo").show();
                                                        $("#btnCrearActividad").show();
                                                        $("#title-prospectos").html(sTitle); 

                                                        fncEditForm("#formProspecto" , sTitle  );

                                                       setTimeout(() => {
                                                            $("#nIdCliente").attr("onchange","fncActualizarCliente($(this));");
                                                            if($("#sTituloProspecto").length > 0){
                                                                $("#sTituloProspecto").attr("onblur","fncActualizarTitulo($(this),event);");
                                                                $("#sTituloProspecto").attr("onkeyup","fncActualizarTitulo($(this),event);");
                                                            }
                                                        },700);

                                                    } else {

                                                        var sTitle = "Ver Prospecto" ;

                                                        $("#btnAgregarCatalogo").hide();
                                                        $("#btnCrearActividad").hide();
                                                        $("#btnVerAdjuntos").hide();
                                                        $("#dropdownEtapa").addClass("disabled");
                                                        $("#title-prospectos").html(sTitle); 

                                                        $("#formProspecto")
                                                        .find(".modal-body")
                                                        .find("a.text-danger")
                                                        .each(function () {
                                                            $(this).attr("onclick", "");
                                                            $(this).find("i.material-icons").html("block");
                                                        });

                                                        $("#formProspecto")
                                                        .find(".modal-body")
                                                        .find(".content-actividad")
                                                        .find(".col-9")
                                                        .each(function () {
                                                            $(this).attr("onclick", "");
                                                        });


                                                        setTimeout(() => {

                                                            fncViewForm("#formProspecto" , sTitle );

                                                        }, 500);

                                                    }

                                                }


                                            });

                                        }

                                    });
                                }

                            });

                        }
                    });

                }

                // Segmentacion 
                if(aryProspectoSegmentacion.length>0){
                    aryProspectoSegmentacion.forEach((element) => {
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).val(element.nIdDetalleSegmentacion);
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).data("nIdProspectoSegmentacion",element.nIdProspectoSegmentacion);
                        $("#nIdDetalleSegmentacion-"+element.nIdSegmentacion).attr('onchange',`fncActualizarSegmentacion(${element.nIdSegmentacion},this);`);
                    });
                }


                // Data default

                // Data Extra 
                if(aryConfigExtra.length>0){
                    aryConfigExtra.forEach((element) => {
                    
                        var sTipoCampoSystem = element.sTipoCampoSystem;
                        var sWidgetSystem    = element.sWidgetSystem;
                        var sValue           = aryProspecto[element.sWidgetSystem];
                        var sWidget          = element.sWidget;

                        
                        switch (sTipoCampoSystem) {
                            case "text":
                            case "tel":
                            case "date":
                            case "textarea":

                                    $("#"+sWidgetSystem).val(sValue);
                                    $("#"+sWidgetSystem).off();
                                    $("#"+sWidgetSystem).on('blur',function(){

                                        if($(this).val() == '') {return false;}
                                        
                                        if( $("#nIdEmpleadoP").val() == '0'){
                                            toastr.error("Error . Para poder realizar el cambio ud debe de seleccionar un asesor . Porfavor verifique"); 
                                            return false;
                                        }

                                        var jsnData = {
                                            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                            nIdEmpleado : $("#nIdEmpleadoP").val(),
                                            sWidget     : sWidget,
                                            sCol        : $(this).attr('name'),
                                            sVal        : $(this).val()
                                        };


                                        fncActualizarControlExtra(jsnData,function(aryData){
                                            if(aryData.success){
                                                toastr.success(aryData.success);
                                            } else {
                                                toastr.error(aryData.error);
                                            }
                                        });

                                    });

                                break;
                            case "select":

                                $("#"+sWidgetSystem).val(sValue);

                                $("#"+sWidgetSystem).off();

                                $("#"+sWidgetSystem).on('change',function(){

                                    if($(this).find("option:selected").val() == 0) {return false;}
                                    
                                    if( $("#nIdEmpleadoP").val() == '0'){
                                        toastr.error("Error . Para poder realizar el cambio ud debe de seleccionar un asesor . Porfavor verifique"); 
                                        return false;
                                    }

                                    var jsnData = {
                                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                        nIdEmpleado : $("#nIdEmpleadoP").val(),
                                        sWidget     : sWidget,
                                        sCol        : $(this).attr('name'),
                                        sVal        : $(this).find("option:selected").val()
                                    };

                                    fncActualizarControlExtra(jsnData,function(aryData){
                                        if(aryData.success){
                                            toastr.success(aryData.success);
                                        } else {
                                            toastr.error(aryData.error);
                                        }
                                    });

                                });

                            break;
                            case "radio":
                                
                                $('input:radio[name='+sWidgetSystem+']').val([sValue]);

                                $('input:radio[name='+sWidgetSystem+']').off();

                                $('input[type=radio][name='+sWidgetSystem+']').change(function() {

                                    if( $("#nIdEmpleadoP").val() == '0'){
                                        toastr.error("Error . Para poder realizar el cambio ud debe de seleccionar un asesor . Porfavor verifique"); 
                                        return false;
                                    }

                                    var jsnData= {
                                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                                        nIdEmpleado : $("#nIdEmpleadoP").val(),
                                        sWidget     : sWidget,
                                        sCol        : $(this).attr('name'),
                                        sVal        : $(this).val()
                                    };

                                    fncActualizarControlExtra(jsnData,function(aryData){
                                        if(aryData.success){
                                            toastr.success(aryData.success);
                                        } else {
                                            toastr.error(aryData.error);
                                        }
                                    });


                                });

                            break;
                        }
                    });
                }



                $("#formProspecto").find(".btn-submit").hide();
                $("#formProspecto").modal("show");
                toastr.success(aryData.success);

            } else {
                toastr.error(aryData.error);
            }

        });

        
       
    }

    window.fncActualizarCliente = function(element){

        if( typeof $("#formProspecto").data("nIdRegistro") != "undefined" && $("#formProspecto").data("nIdRegistro") > 0){

            var nIdCliente = element.val().trim();

          

            if(nIdCliente != 0){

                if( $("#nIdEmpleadoP").val() == '0'){
                    toastr.error("Error . Para poder realizar el cambio ud debe de seleccionar un asesor . Porfavor verifique"); 
                    return false;
                }

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    nIdEmpleado : $("#nIdEmpleadoP").val(),
                    sCol        : 'nIdCliente',
                    sVal        :  nIdCliente
                };

                fncActualizarControlExtra(jsnData,function(aryData){
                    if(aryData.success){
                        toastr.success(aryData.success);
                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }

        }
    }   

    window.fncActualizarTitulo = function(element , event ){
        
        if(event.type == 'blur' || (event.type == 'keyup' &&  event.which == 13)){

            console.log(event);
            if( typeof $("#formProspecto").data("nIdRegistro") != "undefined" && $("#formProspecto").data("nIdRegistro") > 0){

                var sTituloOld = element.data("sTituloOld");
                var sTitulo    = element.val().trim();

                if(sTituloOld != sTitulo){

                    
                    if( $("#nIdEmpleadoP").find("option:selected").val() == '0'){
                        toastr.error("Error . Para poder realizar el cambio de titulo debe de seleccionar un asesor . Porfavor verifique"); 
                        return false;
                    }

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                        nIdEmpleado : $("#nIdEmpleadoP").val(),
                        sCol        : 'sTitulo',
                        sVal        :  sTitulo
                    };

                    fncActualizarControlExtra(jsnData,function(aryData){
                        if(aryData.success){
                            toastr.success(aryData.success);
                        } else {
                            toastr.error(aryData.error);
                        }
                    });
                }

            }

        }
    }

    window.fncDrawNotas = function(jsnData){
        
        var isPropietario = false;
        
        if(window.isAsesor){
            isPropietario  = $("#nIdEmpleadoP").val()  == jsnData.nIdTipoEntidad;
        } else if (window.isSuper){
            isPropietario  = $("body").data("nidempleado") == jsnData.nIdTipoEntidad;
        } else {
            isPropietario  = $("body").data("nidusuario") == jsnData.nIdTipoEntidad;
        }

        var sHtml = `
                 <div class="col-12 my-1 items">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <p class="m-0 font-14">${jsnData.dFechaActualizacion} - ${fncUc(jsnData.sAutor)}</p>
                        </div>
                        <div class="bd-highlight">
                         ${ isPropietario ? `<a href="javascript:;" class="text-danger btn-delete-actividad" onclick="fncEliminarNota(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">delete</i> <div></div></a>`:``}
                        </div>
                    </div>
                    <div class="form-group mb-1">
                     <textarea ${ isPropietario ? `` : `readonly` }  data-stext="${jsnData.sNota.replace(/"/g, '&quot;')}" onblur="fncGrabarNota(${jsnData.nIdRegistro},this);" class="form-control d-block" placeholder="Escribe una nota.."  cols="1" rows="1">${jsnData.sNota}</textarea>
                    </div>
                </div>`;

        return sHtml;
    }

    window.fncDrawCardCambios = function(jsnData){
        var sHtml = `
                 <div class="col-12 border-card p-2 my-1 items">
                    <div class="d-flex align-items-center">
                        <div class="flex-grow-1 bd-highlight">
                            <p class="m-0 font-16">${jsnData.sFecha} - ${fncUc(jsnData.sNombreEmpleado)}</p>
                        </div>
                    </div>
                    <div class="d-block mb-1">
                        <p class="mb-0">${jsnData.sCambio}</p>
                    </div>
                </div>`;
        return sHtml;
    }

    window.fncCleanAll = function(){
        fncClearInputs($("#formCEActividad").find("form"));
        fncClearInputs($("#formCECatalogo").find("form"));
        fncClearInputs($("#formCEAdjunto").find("form"));
        fncRemoveDisabled("#formProspecto");
    }

    window.fncBuscarDocument = function(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'api/' + jsnData.sTipo + '/' + jsnData.sNumeroDoc,
            beforeSend: function() {
                // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //  fncOcultarLoader();
            }
        });
    }

    window.fncActualizarSegmentacion = function(nIdSegmentacion,element){
        
        var nIdDetalleSegmentacion   = $(element).find("option:selected").val();
        var nIdProspectoSegmentacion = $(element).data("nIdProspectoSegmentacion");

        if(nIdProspectoSegmentacion == '0'){ return false; }

        var jsnData = {
            nIdProspectoSegmentacion  : nIdProspectoSegmentacion,
            nIdProspecto              : $("#formProspecto").data("nIdRegistro"),
            nIdSegmentacion           : nIdSegmentacion,
            nIdDetalleSegmentacion    : nIdDetalleSegmentacion
        };

        fncActualizaProspectoSegmentacion(jsnData,function(aryData){
            if(aryData.success){
                var sCambio  = "Se hizo una actualizacion en el campo " +$(element).parent().find("label").text();
                fncGuardarCambio(sCambio);
                toastr.success(aryData.success);
            }
        });

    }

    window.fncTriggerDrawProspecto = function(fncCallback = null){

        $("#content-ce-prospecto").html("");

        fncDrawProspecto(function(bStatus) {
            if(bStatus){
              window.fncEventListenerProspecto();
              if(fncCallback != null) fncCallback(true);
            }
        });
    }
    // Eventos del formulario de prospecto
    window.fncEventListenerProspecto = function(){

        $("#btnCrearActividad").off();
        $("#btnAgregarCatalogo").off();
        $(".dropdown-menu-etapa a").off();
        $("#btnVerHistorial").off();
        $("#btnVerDetallesCliente").off();
        $("#btnVerDetallesCliente").off();
        $("#nIdEmpleadoP").off();


        $("#btnCrearActividad").on("click", function() {
            
            window.fncCleanAll();

            window.sLatitudActividad = null;
            window.sLongitudActividad = null;

            if($("#nIdEmpleadoP").val() == 0){
                toastr.error("Error. Debe de seleccionar un asesor de ventas para poder crear una cita . Porfavor verifica");
                return;
            }

            $("#formCEActividad").data("nIdRegistro",0);
            $("#formCEActividad").find(".modal-title").html("Crear Cita");
            $("#content-cumplio-actividad").hide();
            $("#content-reprogramar").hide();
            $("#content-actividad").show();
            $("#formCEActividad").modal("show");
        });

        $("#btnAgregarCatalogo").on("click", function() {
            window.fncCleanAll();
            $("#formCECatalogo").data("nIdRegistro", 0);
            $("#formCECatalogo").modal("show");
        });

        $("#btnCrearCliente").on('click',function(){
            window.fncCleanCliente();
            $("#formCECliente").find(".modal-title").html("Nuevo Cliente");
            $("#formCECliente").data("nIdRegistro",0);
            $("#btnViewFormEmpresa").trigger("click");
            $("#formCECliente").modal("show");
        });

        $(".dropdown-menu-etapa a").click(function(){

            $("#dropdownEtapa").text($(this).text());
            $("#dropdownEtapa").val($(this).text());

            var nIdEtapa = $(this).data("value");

            if( nIdEtapa == 0 ) { return false; }

            if( $("#formProspecto").data("nIdRegistro") != 0 ){ 

                if(nIdEtapa == $("body").data("nidetapaenproceso")){

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    };

                    fncDrawAdjuntos(jsnData);

                } else {

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                        nIdEmpleado : $("#nIdEmpleadoP").val(),
                        nIdNegocio  : $("body").data("nidnegocio"),
                        nIdEtapa    : nIdEtapa
                    };

                    fncActualizarEstadoProspecto(jsnData,function(aryData){
                    
                        if(aryData.success){
                            
                            var bSend = aryData.bSend;

                            if( aryData.bSend === false && aryData.sLinkArchivo.length > 0){
                                Object.assign(document.createElement('a'), { target: '_blank', href: aryData.sLinkArchivo }).click();
                            }

                            
                            switch(nIdEtapa){
                                case $("body").data("nidetaparechazado") : 

                                    alert("Ups.Se rechazo el prospecto porfavor indica una nota porque se rechazo.");

                                    var sNota = document.getElementById("sNota"); 
                                    sNota.scrollIntoView({ behavior: 'smooth', block: 'center' });
                                    
                                    setTimeout(() => {
                                        $('input[name="sNota"]').focus();
                                    }, 700);
                                
                                break;
                                case $("body").data("nidetapaenviopropuesta"):

                                    $("#btnDescargarPdfProspecto").attr("href",route( 'admin/prospecto/fncDownloadPropuesta/' + $("#formProspecto").data("nIdRegistro") ) );
                                    $("#btnDescargarPdfProspecto").show();
                                
                                break;
                            }

                         

                            toastr.success(aryData.success);

                        } else {
                             alert(aryData.error);
                        }

                    });

                }
            }


        });
    
        $("#btnVerHistorial").on('click',function(){
            
            
            var nIdCliente  = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdCliente : nIdCliente,
                nIdNegocio : $("body").data("nidnegocio")
            };

            fncPopulateHistorialCliente(jsnData,(aryData)=>{

                if(aryData.success){
                    $("#tblHistorial").bootstrapTable("load",aryData.aryData);
                    $("#formHistorialCliente").modal("show");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }

            });

        });

            
        $("#btnVerDetallesCliente").on('click',function(){
            
            
            var nIdCliente = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdRegistro : nIdCliente,
             };

            fncMostrarCliente(jsnData,(aryData)=>{

                if(aryData.success){

                    console.log(aryData);
                    var aryData = aryData.aryData;

                    $("#sTipoClienteDetalle").html(aryData.sTipoCliente);
                    $("#sTipoDocDetalle").html(aryData.sTipoDoc);
                    $("#sNumeroDocumentoDetalle").html(aryData.sNumeroDocumento);
                    $("#sNombreoRazonSocialDetalle").html(aryData.sNombreoRazonSocial);
                    $("#sTipoClienteDetalle").html(aryData.sTipoCliente);
                    $("#sDistritoDetalle").html( aryData.sDpt + ' - ' + aryData.sProvincia + ' - ' + aryData.sDistrito );
                    $("#sDireccionDetalle").html(aryData.sDireccion);
                    $("#sContactoDetalle").html(aryData.sContacto);
                    $("#sRelacionamientoDetalle").html(aryData.sRelacionamiento);
                    $("#sTelefonoDetalle").html(aryData.sTelefono);
                    $("#sCorreoDetalle").html(aryData.sCorreo);


                    var sButtons = `
                        ${ aryData.sTelefono.length > 6 ? `<a target="_blank" class="wp" href="https://api.whatsapp.com/send?phone=+51${aryData.sTelefono}&text=Hola%20"><i class="fab fa-whatsapp"></i></a>`: ``} 
                        ${ aryData.sCorreo.length > 0 ? `<a target="_blank" class="mail" href="mailto:${aryData.sCorreo}"><i class="far fa-envelope-open"></i></a>`: ``} 
                        ${ aryData.sTelefono.length > 0 ? `<a target="_blank" class="phone" href="tel:${aryData.sTelefono}"><i class="fas fa-phone"></i></a>`: ``} 
                    `;

                    $("#content-buttons").html(sButtons);

                    $("#modalDetalleCliente").modal("show");

                 } else {
                    toastr.error(aryData.error);
                }

            });

        });

        $("#btnEditarCliente").on('click',function(){
            
            
            var nIdCliente  = $("#nIdCliente").find("option:selected").val();
            
            if(nIdCliente == 0){
                return;
            }

            var jsnData = {
                nIdRegistro : nIdCliente,
            };

            var sOpcion = 'editar';

            $("#formCECliente").data("nIdRegistro",nIdCliente);

            fncMostrarCliente(jsnData,(aryData)=>{

                if(aryData.success){
                   
                    var aryData = aryData.aryData;

                    if( aryData.nTipoCliente == 1 ){
                        $("#btnViewFormEmpresa").trigger("click");
                    } else {
                        $("#btnViewFormPersona").trigger("click");
                    }

                    $("#nTipoDocumento" + sEntidadCliente ).val(aryData.nTipoDocumento);
                    $("#sNumeroDocumento" + sEntidadCliente ).val(aryData.sNumeroDocumento);
                    $("#sNombreoRazonSocial" + sEntidadCliente ).val(aryData.sNombreoRazonSocial);
                    $("#sContacto" + sEntidadCliente ).val(aryData.sContacto);
                    $("#sCorreo" + sEntidadCliente ).val(aryData.sCorreo);

                    $("#nIdDepartamento" + sEntidadCliente ).val(aryData.nIdDepartamento);

                    var jsnData = { nIdDepartamento : aryData.nIdDepartamento};
                    fncDrawProvincia( "#nIdProvincia" + sEntidadCliente  , jsnData , aryData.nIdProvincia);

                    var jsnData = { nIdProvincia : aryData.nIdProvincia};
                    fncDrawDistrito(  "#nIdDistrito" + sEntidadCliente  , jsnData , aryData.nIdDistrito);

                    $("#nIdRelacionamiento" + sEntidadCliente ).val(aryData.nIdRelacionamiento);
                    $("#sTelefono" + sEntidadCliente ).val(aryData.sTelefono);
                    $("#sDireccion" + sEntidadCliente ).val(aryData.sDireccion);
                    $("#nEstado" + sEntidadCliente ).val(aryData.nEstado);

                    if(sOpcion == 'ver'){
                        fncViewForm("#formCECliente" , "Ver Cliente");
                    } else {
                        fncEditForm("#formCECliente" , "Editar Cliente");
                    }


                    $("#formCECliente").modal("show");


                 } else {
                    toastr.error(aryData.error);
                }

            });

        });

        $("#nIdEmpleadoP").on("change",function(){
            
            if($(this).val() == 0) return;
            var nIdProspecto = $("#formProspecto").data("nIdRegistro");

            if(nIdProspecto > 0 ){

                var jsnData = {
                    nIdProspecto : $("#formProspecto").data("nIdRegistro"),
                    nIdEmpleado  : $(this).val().trim()
                };

                fncActualizaEmpleadoProspecto(jsnData,(aryData)=>{
                    if(aryData.success){
                        //alert("Al cambiar el prospecto a otro asesor de ventas ud ya no podra ver este prospecto e");
                        toastr.success(aryData.success);
                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }

        });


    }

    window.fncDrawProspecto = function(fncCallback) {

        var jsnData = {
            nIdNegocio     : $('body').data('nidnegocio'),
        };

        fncBuildFormProspecto(jsnData, function(aryData) {
            $("#formProspecto").data("aryDataForm",aryData.aryData);
            $("#content-ce-prospecto").html(fncBuildFormPro(aryData.aryData));
            fncCallback(true);
        });
    }

    window.fncGetDataTableCatalogo = function(sTable){
        var aryData = [];
        
        $(sTable).find("tbody").find("tr").each(function(){

            var nIdCatalogo = $(this).find("td").eq(0).html();
            var nCostoItem  = $(this).find("td").eq(3).find(".costo-unitario").val();
            var nCantidad   = $(this).find("td").eq(4).find(".cantidad").val();

            aryData.push({
                nIdCatalogo : nIdCatalogo,
                nPrecio     : nCostoItem,
                nCantidad   : nCantidad    
            });

        });

        return aryData;
    }

    window.fncGrabarNota  = function(nIdRegistro,element){
        
        var sNota         = $(element).val().trim();
        var sNotaAnterior = $(element).data("stext").trim();

        // Si la nota es igual o vacia no lo actualiza 
        if(sNota == '' ||  sNotaAnterior == sNota ) { return false;}

        var jsnData = {
            nIdRegistro      : nIdRegistro,
            nIdProspecto     : $("#formProspecto").data("nIdRegistro"),
            nIdTipoEntidad   : window.isAsesor ? $("#nIdEmpleadoP").val()  : ( window.isSuper  ? $("body").data("nidempleado")  :  $("body").data("nidusuario")) ,
            nTipoEntidad     : window.isEmpleado ? $("body").data("ntipoentidadnotaempleado") : $("body").data("ntipoentidadnotaadmin"),
            sNota            : sNota,
            nEstado          : 1
        };

        fncGrabarProspectoNota(jsnData,function(aryData){
           
            if(aryData.success){

                toastr.success(aryData.success);

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };

                fncListarNota(jsnData);
                if(nIdRegistro == 0) {$("#sNota").val("");}
            } else {
                toastr.error(aryData.error);
            }

        });
    }
    
    window.fncEliminarNota  = function(nIdRegistro,element){
        
        if(confirm("¿Estas seguro de eliminar este item?")){

            var jsnData = {
                nIdRegistro : nIdRegistro
            };

            fncEliminarProspectoNota(jsnData, function(aryData){

                if(aryData.success){
                    
                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro")
                    };

                    fncListarNota(jsnData);
                    fncGuardarCambio("Se elimino una nota");

                    toastr.success(aryData.success);
            
                } else {
                    toastr.error(aryData.error);
                }

            });
        }
    }

    window.fncGuardarCambio = function(sCambio,nIdEtapa = ''){

        if($("#nIdEmpleadoP").val() == 0){
            toastr.error("Error . Para poder realizar el cambio ud debe de seleccionar un asesor . Porfavor verifique"); 
            return false;
         }

        var jsnData = {
            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
            nIdEmpleado : $("#nIdEmpleadoP").val(),
            sCambio     : sCambio,
            nIdEtapa    : nIdEtapa,
            nEstado     : 1
        };

        fncGrabarCambioProspecto(jsnData ,function(aryData){
            if(aryData.success){

                var jsnData = {
                    nIdRegistro : $("#formProspecto").data("nIdRegistro")
                };
                
                fncListarCambios(jsnData);
                
                //toastr.success(aryData.success);

            } else {
                toastr.error(aryData.error);
            }
        });

    }

    window.fncListarNota  = function(jsnData,fncCallBackEndProccess = null){
        
        $("#content-notas").html("");

        fncGetProspectoNotaByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length>0){

                    aryData.aryData.forEach((element) => {

                        var jsnNota = {
                            nIdRegistro         : element.nIdNota,
                            sAutor              : element.sAutor,
                            nIdTipoEntidad      : element.nIdTipoEntidad,
                            dFechaActualizacion : moment(element.dFechaActualizacion,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sNota               : element.sNota
                        };

                        sHtml += fncDrawNotas(jsnNota);
                    });

                    sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action="show" class="ShowMore">Ver Todo</a></div>`;
                    
                    $("#content-notas").html(sHtml);
                    fncEventListenerShowMoreLess();
            
                }

               if(fncCallBackEndProccess != null)  fncCallBackEndProccess(true);
                //toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncListarActividades = function(jsnData , fncCallBackEndProccess = null){
        
        $("#content-actividades").html("");

        fncGetActividadByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length>0){

                    aryData.aryData.forEach((element) => {

                        var jsnCard = {
                            nIdRegistro         : element.nIdActividad,
                            jsnData             : null,
                            nEdit               : 0,
                            event               : `fncValidarActividad(${element.nIdActividad});`,
                            sColor              : element.sColor,
                            sNombreEmpleado     : element.sEmpleado,
                            sFechaCreacion      : element.dFechaCreacion,
                            sFechaActividad     : moment(element.dFecha,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sHoraActividad      : element.dHora,
                            sLatitud            : element.sLatitud,
                            sLongitud           : element.sLongitud,
                            nIdEstadoActividad  : element.nIdEstadoActividad,
                            sEstado             : element.sEstadoActividadLarga
                        };

                        sHtml += fncDrawCardActividad(jsnCard);
                    });

                    $("#content-actividades").html(sHtml);

    
                }
                if ( fncCallBackEndProccess != null ) fncCallBackEndProccess(true);

                //toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncListarCambios  = function(jsnData,fncCallBackEndProccess= null){
        
        $("#content-cambios").html("");

        fncGetCambioProspectoByIdProspecto(jsnData,function(aryData){
            
            if(aryData.success){

               var sHtml = ``;

                if(aryData.aryData.length > 0){

                    aryData.aryData.forEach((element) => {

                        var jsnNota = {
                            sNombreEmpleado : element.sNombreEmpleado,
                            sFecha          : moment(element.dFechaCreacion,'YYYY-MM-DD').format('DD/MM/YYYY'),
                            sCambio         : element.sCambio
                        };

                        sHtml += fncDrawCardCambios(jsnNota);
                    });

                    sHtml += `<div class="col-12 my-1 text-right"><a href="javascript:;" data-action='show' class="ShowMore">Ver Todo</a></div>`;

                    $("#content-cambios").html(sHtml);
                    fncEventListenerShowMoreLess();
                    if(fncCallBackEndProccess != null) fncCallBackEndProccess(true);
                }

               // toastr.success(aryData.success);
            } else {
                toastr.error(aryData.error);
            }

        });
         
    }

    window.fncDrawAdjuntos = function(jsnData , bShow= true){
        
        fncClearInputs($("#formCEAdjunto").find("form"));
        $("#content-adjuntos").html(``);

        fncObtenerProspectoAdjuntosByIdProspecto(jsnData,function(aryData){
            if(aryData.success){

                $("#btnDescargarContrato").attr("href","javascript:;");
                $("#btnDescargarContrato").attr("download","");
                $("#btnEliminarContrato").attr("onclick","");
                $("#sContrato").data( "nIdAdjunto",0);
                $(".dw-contrato").hide();

                var aryData = aryData.aryData;
                
                $("#formCEAdjunto").data("nIdRegistro",0); //  Se va a crear nuevos adjuntos

                if(aryData.length>0){

                    $("#formCEAdjunto").data("nIdRegistro",1); //  Se van a editar nuevos adjuntos
                    
                    fncClearInputs($("#formCEAdjunto").find("form"));

                    var sHtml = `<p id="titulo-adjuntos" class="mb-0">Adjuntos: </p>`;
                    var nExistenAdjuntosOtros = false;

                    aryData.forEach(aryElement => {

                        if(aryElement.nContrato == 1){
                            
                            $("#sContrato").data( "nIdAdjunto", aryElement.nIdAdjunto );
                            
                            $("label[for='sContrato']").html( aryElement.sNombreArchivo );

                            $("#btnDescargarContrato").attr("href",docs(aryElement.sNombreArchivo));
                            $("#btnDescargarContrato").attr("download",aryElement.sNombreArchivo);
                            $("#btnEliminarContrato").attr("onclick","fncEliminarAdjunto(" + aryElement.nIdAdjunto + ");");

                            $(".dw-contrato").show();

                        } else {

                            nExistenAdjuntosOtros = true;
                                
                            var jsnData = {
                                nIdAdjunto      : aryElement.nIdAdjunto, 
                                sLinkArchivo    : docs(aryElement.sNombreArchivo),
                                sNombreArchivo  : aryElement.sNombreArchivo
                            };

                            sHtml += fncDrawItemAdjunto(jsnData);
                            
                        }

                    });

                    $("#content-adjuntos").html(sHtml);
                    setTimeout(() => {
                        
                        if(nExistenAdjuntosOtros){
                            $("#titulo-adjuntos").show();
                        } else {
                            $("#titulo-adjuntos").hide();
                        }
                    }, 200);
                    
               
                }
                if(bShow) {
                    $("#formCEAdjunto").modal("show");
                }

            } else {
                toastr.error(error);
            }

        });

    }

    window.fncSetEtapa = function(nIdEtapa){
       var sEtapa =  $("#nIdEtapa-"+nIdEtapa).text();
       $("#dropdownEtapa").text(sEtapa);
    }


    // llamadas al servidor

    function fncBuildFormProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'formularios/fncBuildFormProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGrabarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncMostrarProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncMostrarRegistro',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetProspectos(jsnData, bShowLoader = true , fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectos',
            data: jsnData,
            beforeSend: function() {
                if(bShowLoader)fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                if(bShowLoader)fncOcultarLoader();
            }
        });
    }

    function fncActualizaProspectoSegmentacion(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizaProspectoSegmentacion',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetProspectoNotaByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectoNotaByIdProspecto',
            data: jsnData,
            beforeSend: function() {
               // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //fncOcultarLoader();
            }
        });
    }
    
    function fncGrabarProspectoNota(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoNota',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncEliminarProspectoNota(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoNota',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncActualizarControlExtra(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizarControlExtra',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetCambioProspectoByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetCambioProspectoByIdProspecto',
            data: jsnData,
            beforeSend: function() {
               // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                // fncOcultarLoader();
            }
        });
    }

    function fncGrabarCambioProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarCambioProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncActualizarEstadoProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizarEstadoProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncPopulateHistorialCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncPopulateHistorialCliente',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncMostrarCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncMostrarRegistro',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
    
    function fncActualizaEmpleadoProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncActualizaEmpleadoProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }


</script>
<!-- Prospecto -->


<!-- Cliente -->
<script>
    
    window.sEntidadCliente = '-1';

    $(document).ready(function() {
        


        fncDrawCliente(function(bStatus){
            if(bStatus){

                // El formulario de clientes ya cargo
                $("#btnViewFormEmpresa").on('click',function(){

                    $("#nTipoDocumento"+sEntidadCliente).data( "sForm" , "EMPRESA" );

                    fncCleanAll();
                    
                    $(this).addClass("active");
                    $("#btnViewFormPersona").removeClass("active");

                    $("#content-sCorreo-1").removeClass("col-md-6");
                    $("#content-sCorreo-1").addClass("col-md-12");

                    // Mostrar Controles del formulario de empresa 65 - RUC
                    $("#nTipoDocumento-1").val(65).trigger("change");
                    
                    // Visualizar controles 
                    $("#content-sContacto-1").show();
                    $("#content-nIdRelacionamiento-1").show();

                });

                $("#btnViewFormPersona").on('click',function(){
                    
                    fncCleanAll();
                    $("#nTipoDocumento" + sEntidadCliente).data( "sForm" , "PERSONA" );

                    $(this).addClass("active");
                    $("#btnViewFormEmpresa").removeClass("active");

                    $("#content-sCorreo-1").removeClass("col-md-12");
                    $("#content-sCorreo-1").addClass("col-md-6");

                    // Mostrar Controles del formulario de empresa 63 - DNI
                    $("#nTipoDocumento-1").val(63).trigger("change");

                    // Ocultar controles 
                    $("#content-sContacto-1").hide();
                    $("#content-nIdRelacionamiento-1").hide();

                });

                // Evento Dtp
                $("#nIdDepartamento-1").on('change',function(){
                    var jsnData = {
                        nIdDepartamento : $(this).val()
                    };

                    fncDrawProvincia("#nIdProvincia-1" , jsnData , null);
                });

                $("#nIdProvincia-1").on('change',function(){
                    var jsnData = {
                        nIdProvincia : $(this).val()
                    };
                    fncDrawDistrito("#nIdDistrito-1" , jsnData , null);
                });

                $("#nTipoDocumento-1").change(function() {
                    if( $(this).val() > 0 ) {
                        fncMaxLengthTypeDocument( $(this).find('option:selected').text().trim().toUpperCase() , "#sNumeroDocumento-1" );
                    }
                });

                $("#sNumeroDocumento-1").on('keyup change',function(){
                    
                    switch( $("#nTipoDocumento-1").find("option:selected").text() ){
                        
                        case 'RUC':

                            if( $("#sNumeroDocumento-1").val().length  == 11 ){
                                 
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "ruc",
                                    sNumeroDoc   : $("#sNumeroDocumento-1").val()
                                };

                                fncBuscarDocument( jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombreoRazonSocial-1").val(aryData.success.razonSocial);
                                    }
                                });

                            }

                        break;
                        
                        case 'DNI':
                            if( $("#sNumeroDocumento-1").val().length  == 7 || $("#sNumeroDocumento-1").val().length  == 8 ){
                                
                                // Lanzamos el evento
                                var jsnData = {
                                    sTipo        : "dni",
                                    sNumeroDoc   : $("#sNumeroDocumento-1").val()
                                };

                                fncBuscarDocument(jsnData ,function(aryData){
                                    if(aryData.success){
                                        $("#sNombreoRazonSocial-1").val(aryData.success.razonSocial);
                                    }
                                });

                            }
                        break;

                    }
                  
                    
                });

            }
        });

        // Submit del formulario de Cliente
        $("#formCECliente").find("form").on('submit',function(event){
            
            event.preventDefault();
            
            var nIdRegistro            = $("#formCECliente").data("nIdRegistro");
            var nIdNegocio             = $("body").data("nidnegocio");
            var sForm                  = $("#nTipoDocumento" + sEntidadCliente ).data("sForm");
            var nTipoDocumento         = $("#nTipoDocumento" + sEntidadCliente )
            var sNumeroDocumento       = $("#sNumeroDocumento" + sEntidadCliente );
            var sNombreoRazonSocial    = $("#sNombreoRazonSocial"  + sEntidadCliente);
            var sContacto              = $("#sContacto"  + sEntidadCliente);
            var sCorreo                = $("#sCorreo"  + sEntidadCliente);
            var nIdDepartamento        = $("#nIdDepartamento"  + sEntidadCliente);
            var nIdProvincia           = $("#nIdProvincia"  + sEntidadCliente);
            var nIdDistrito            = $("#nIdDistrito"  + sEntidadCliente);
            var sDireccion             = $("#sDireccion"  + sEntidadCliente);
            var nIdRelacionamiento     = $("#nIdRelacionamiento"  + sEntidadCliente);
            var sTelefono              = $("#sTelefono"  + sEntidadCliente);
            var nEstado                = $("#nEstado"  + sEntidadCliente);
            var nTipoCliente           = sForm == 'EMPRESA' ? 1 : 2;

            
            if (nTipoDocumento.length > 0 && nTipoDocumento.val() == '') {
                toastr.error('Error. Seleccione un tipo de documento. Porfavor verifique');
                return;
            } else if (sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '') {
                toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
                return;
            } else if (sNombreoRazonSocial.length > 0 && sNombreoRazonSocial.val() == '') {
                toastr.error('Error. Ingrese un nombre o razon social. Porfavor verifique');
                return;
            } 
            
            // if (nIdDepartamento.length > 0 && nIdDepartamento.val() == '0') {
            //     toastr.error('Error. Seleccione un departamento. Porfavor verifique');
            //     return;
            // } else if (nIdProvincia.length > 0 && nIdProvincia.val() == '0') {
            //     toastr.error('Error. Seleccione una provincia. Porfavor verifique');
            //     return;
            // } else if (nIdDistrito.length > 0 && nIdDistrito.val() == '0') {
            //     toastr.error('Error. Seleccione un distrito. Porfavor verifique');
            //     return;
            // } 

            var bExisteCorreo   = false ;
            var bExisteTelefono = false ;

            if(sCorreo.length > 0  && sCorreo.val().trim().length > 0) bExisteCorreo = true;
            if(sTelefono.length > 0  && sTelefono.val().trim().length > 0) bExisteTelefono = true;

            if(!bExisteCorreo){
                if (sTelefono.length > 0 && sTelefono.val() == '') {
                    toastr.error('Error. Ingrese un telefono. Porfavor verifique');
                    return;
                }
            }

            if(!bExisteTelefono){
                if (sCorreo.length > 0 && sCorreo.val() == '') {
                    toastr.error('Error. Ingrese un correo. Porfavor verifique');
                    return;
                }
            }
          

            if (sForm == 'EMPRESA') {
                // if (sContacto.length > 0 && sContacto.val() == '') {
                //     toastr.error('Error. Ingrese un contacto. Porfavor verifique');
                //     return;
                // } else if (nIdRelacionamiento.length > 0 && nIdRelacionamiento.val() == '0') {
                //     toastr.error('Error. Seleccione un relacionamiento. Porfavor verifique');
                //     return;
                // } 
            }


            var jsnData = {
                nIdRegistro              : nIdRegistro,
                nIdNegocio               : nIdNegocio,
                nTipoCliente             : nTipoCliente,
                nTipoDocumento           : nTipoDocumento.length > 0 ? nTipoDocumento.val() : null,
                sNumeroDocumento         : sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : null,
                sNombreoRazonSocial      : sNombreoRazonSocial.length > 0 ? sNombreoRazonSocial.val() : null,
                sCorreo                  : sCorreo.length > 0 ? sCorreo.val() : null,
                nIdDepartamento          : nIdDepartamento.length > 0 ? nIdDepartamento.val() : null,
                nIdProvincia             : nIdProvincia.length > 0 ? nIdProvincia.val() : null,
                nIdDistrito              : nIdDistrito.length > 0 ? nIdDistrito.val() : null,
                sDireccion               : sDireccion.length > 0 ? sDireccion.val() : null,
                sTelefono                : sTelefono.length > 0 ? sTelefono.val() : null,
                nIdRelacionamiento       : nIdRelacionamiento.length > 0 ? nIdRelacionamiento.val() : null,
                sContacto                : sContacto.length > 0 ? sContacto.val() : null,
                nEstado                  : nEstado.length > 0 ? nEstado.val() : null,
            };

            fncGrabarCliente(jsnData, function(aryData){
                if(aryData.success){
                    
                    fncCleanAll();

                    var jsnData ={
                        nIdNegocio : nIdNegocio
                    };

                    fncGetClientes(jsnData,function(aryDataLista){
                        if(aryDataLista.success){

                            var aryLista = aryDataLista.aryData;
                            var sOption  = ``;
                            
                            sOption += `<option value="0">Seleccionar</option>`;
                            
                            aryLista.forEach(function (element, nIndex) {
                                sOption += `<option value="${element.nIdCliente}">${element.sNombreoRazonSocial}</option>`;
                            });

                            $("#nIdCliente").html(sOption);

                            setTimeout(() => {
                                $("#nIdCliente").val(aryData.nIdClienteNew).trigger("change");
                            }, 200);

                        }
                    });


                    $("#formCECliente").modal("hide");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }
            });

        });


    });

    function fncCleanCliente(){
        fncClearInputs($("#formCECliente").find("form"));
        fncRemoveDisabled("#formCECliente");
    }


    function fncDrawCliente(fncCallback) {

        var jsnData = {
            nIdEntidad : 1,
            nIdNegocio : $('body').data('nidnegocio')
        };

        fncObtenerDataForm(jsnData,function(aryData){
            $("#formCliente").html(fncBuildForm(aryData));
            fncCallback(true);
        });

    }

    function fncDrawProvincia(sHtmlTag , jsnData , nIdProvincia = null){
        
        fncObtenerProvincias(jsnData,function(aryData){

            let sOptions = ``;
            
            if(aryData.success){
                
                sOptions += `<option value="0">SELECCIONAR</option>`;
                
                aryData.aryData.forEach(aryElement => {
                    sOptions += `<option value="${aryElement.nIdProvincia}">${aryElement.sNombre}</option>`;
                });
            
                $(sHtmlTag).html(sOptions);

                if(nIdProvincia != null){
                    $(sHtmlTag).val(nIdProvincia);
                }
            }

        });

    }

    function fncDrawDistrito(sHtmlTag , jsnData , nIdDistrito = null){
        
        fncObtenerDistrito(jsnData,function(aryData){
            
            let sOptions = ``;
            
            if(aryData.success){
                
                sOptions += `<option value="0">SELECCIONAR</option>`;
                
                aryData.aryData.forEach(aryElement => {
                    sOptions += `<option value="${aryElement.nIdDistrito}">${aryElement.sNombre}</option>`;
                });
            
                $(sHtmlTag).html(sOptions);

                if(nIdDistrito != null){
                    $(sHtmlTag).val(nIdDistrito);
                }
            }

        });

    }

    // llamadas al servidor 

    function fncObtenerDataForm(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'formularios/fncBuildForm',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncObtenerProvincias(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'ubigeo/fncObtenerProvincias',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncObtenerDistrito(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'ubigeo/fncObtenerDistrito',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGrabarCliente(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncGrabarCliente',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetClientes(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncGetClientes',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
 
</script>
<!-- Cliente -->


<!-- Catalogo -->
<script>

    $(document).ready(function() {

        $("#nIdCatalogo").on('change',function(){

            if( parseInt( $(this).find("option:selected").val() ) === 0) {$("#nCostoUnitario").val(0); return false;}
            
            var nPrecio = $(this).find("option:selected").data("nprecio");

            $("#nCostoUnitario").val( fncNf(nPrecio) );
        });
        

        // Submit del formulario de Cliente
        $("#formCECatalogo").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro            = $("#formCECatalogo").data("nIdRegistro");
            var nIdCatalogo            = $("#nIdCatalogo").find("option:selected").val();
            var sCatalogo              = $("#nIdCatalogo").find("option:selected").text();
            var nPrecio                = $("#nIdCatalogo").find("option:selected").data("nprecio");
            var sTipoItem              = $("#nIdCatalogo").find("option:selected").data("ntipoitem");
            var nCantidad              = $("#nCantidad").val();
            var nTotal                 = parseFloat(nPrecio) * parseFloat(nCantidad);
            var sTable                 = sTipoItem == "PRODUCTO" ? "#table-productos" : "#table-servicios";
        
            if (nIdCatalogo == 0) {
                toastr.error('Error. Seleccione un producto o servicio. Porfavor verifique');
                return;
            } else if(nPrecio <= 0){
                toastr.error('Error. Ingrese un precio de producto o servicio. Porfavor verifique');
                return;
            } else if(nCantidad <= 0){
                toastr.error('Error. Ingrese una cantidad. Porfavor verifique');
                return;
            }
     
            var jsnData = {
                    nIdRegistro     : nIdRegistro,
                    nIdProspecto    : $("#formProspecto").data("sAccion") == 'crear' ? 0 : $("#formProspecto").data("nIdRegistro"),
                    nIdCatalogo     : nIdCatalogo,
                    sTable          : sTable,
                    sCatalogo       : sCatalogo,
                    nPrecio         : nPrecio,
                    nCantidad       : nCantidad,
                    nTotal          : nTotal
                };

            if( $("#formProspecto").data("sAccion") == 'crear') {
                $(sTable).find("tbody").append(fncDrawFilaCatalogo(jsnData));
            } else {

                fncGrabarProspectoCatalogo(jsnData,function(aryData){
                    if (aryData.success) {

                        var jsnData = {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarCatalogo(jsnData);

                    } else {
                        toastr.error(aryData.error);
                    }
                });

            } 
            
            $("#formCECatalogo").modal("hide");

        });


    });

    window.fncDrawFilaCatalogo = function(jsnData){   
        var sHtml = ``;  
        sHtml = `<tr> 
                    <td class="d-none">${jsnData.nIdCatalogo}</td>
                    <td><div><a href="javascript:;" class="text-danger font-18" onclick="fncEliminarItem(${jsnData.nIdCatalogo},'${jsnData.sTable}',this);" title="Eliminar"><i class="material-icons">delete</i></a></div></td>
                    <td><div>${jsnData.sCatalogo}</div></td>
                    <td class="cont-number"><div><input onblur="fncTotales(${jsnData.nIdCatalogo},'${jsnData.sTable}',event);" onkeyup="fncTotales('${jsnData.sTable}',event);" type="number" min="0.00" max="9999999.99" step="0.01" value="${jsnData.nPrecio}" autocomplete="off" class="form-control font-12 costo-unitario text-center"></div></td>
                    <td class="cont-number"><div><input onblur="fncTotales(${jsnData.nIdCatalogo},'${jsnData.sTable}',event);" onkeyup="fncTotales('${jsnData.sTable}',event);" type="number" value="${jsnData.nCantidad}" min="1" max="9999999" step="1" autocomplete="off" class="form-control font-12 cantidad text-center"></div></td>
                    <td><div>${fncNf(jsnData.nTotal)}</div></td>
                </tr>`;
        return sHtml;
    }

    window.fncListarCatalogo = function(jsnData , fncCallbackEndProccess = null){

        fncGetProspectoCatalogoByIdProspecto(jsnData,function(aryDataList){

            if(aryDataList.success){

                $('#table-productos').find("tbody").html("");
                $('#table-servicios').find("tbody").html("");

                var aryDataList = aryDataList.aryData;
                var bExistsProd = false;
                var bExistsServ = false;

                $("#table-productos").hide();
                $("#table-servicios").hide();

                $.each(aryDataList, function (nKeyItem, element) {

                    var sTable = element.sTipoItem == 'PRODUCTO' ? '#table-productos' : '#table-servicios';

                    if(element.sTipoItem == 'PRODUCTO') bExistsProd = true;
                    if(element.sTipoItem == 'SERVICIO') bExistsServ = true;

                    var jsnDataFilas = {
                            nIdCatalogo     : element.nIdProspectoCatalogo,
                            sTable          : sTable,
                            sCatalogo       : element.sNombreCatalogo,
                            nPrecio         : element.nPrecio,
                            nCantidad       : element.nCantidad,
                            nTotal          : parseFloat(element.nPrecio) * parseFloat(element.nCantidad)
                    };

                    $(sTable).find("tbody").append(fncDrawFilaCatalogo(jsnDataFilas));

                });

                if(bExistsProd) $("#table-productos").show();
                if(bExistsServ) $("#table-servicios").show();

                setTimeout(()=>{ 
                    fncTotales(null,'#table-productos'); 
                    fncTotales(null,'#table-servicios');
                    if( fncCallbackEndProccess != null ) fncCallbackEndProccess(true);
                }, 1000);

            } else {
                toastr.error(aryDataList.error);
            }
        });

    }

    window.fncEliminarItem  = function(nIdCatalogo,sTable,element){
        
        if(confirm("¿Estas seguro de eliminar este item?")){

            if($("#formProspecto").data("sAccion") == 'crear'){
                $(element).parent().parent().parent().remove();
            } else {

                var jsnData = {
                    nIdRegistro : nIdCatalogo
                };

                fncEliminarProspectoCatalogo(jsnData, function(aryData){

                    if(aryData.success){
                        
                        var jsnData= {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarCatalogo(jsnData);
                        fncGuardarCambio("Se elimino un producto o servicio");
                        toastr.success(aryData.success);
                    
                    } else {
                        toastr.error(aryData.error);
                    }

                });

            }
            
            setTimeout(()=>{ fncTotales(sTable); }, 500);
        }
    }

    window.fncTotales = function(nIdCatalogo,sTable,event = null){

        var nTotal         = 0;
        var nCantidadTotal = 0;

        $(sTable).find("tbody").find("tr").each(function(){

            var nCostoItem = $(this).find("td").eq(3).find(".costo-unitario").val();
            var nCantidad  = $(this).find("td").eq(4).find(".cantidad").val();
            var nTotalItem = parseFloat(nCostoItem) * parseFloat(nCantidad);

            $(this).find("td").eq(5).find("div").html( fncNf(nTotalItem) );
            
            if(event != null && event.type == "blur"){

                $(this).find("td").eq(3).find(".costo-unitario").val( fncNf(nCostoItem) );

                if( $("#formProspecto").data("sAccion") == 'editar' ){
                    
                    var jsnData = {
                        nIdRegistro   : nIdCatalogo ,
                        nIdProspecto  : $("#formProspecto" ).data("nIdRegistro"),
                        nPrecio       : nCostoItem,
                        nCantidad     : nCantidad
                    };

                    fncGrabarProspectoCatalogo(jsnData,function(aryData){
                        if(aryData.success){
                            toastr.success(aryData.success);
                        }else{
                            toastr.error(aryData.error);
                        }
                    });

                }

            }

            nTotal          += nTotalItem;
            nCantidadTotal  += parseInt(nCantidad);
        });
        
        $(sTable).find(".total").html(fncNf(nTotal));
        $(sTable).find(".cantidad-total").html(nCantidadTotal);
    }

    // LLamadas al servidor 

    function fncGrabarProspectoCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoCatalogo',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetProspectoCatalogoByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectoCatalogoByIdProspecto',
            data: jsnData,
            beforeSend: function() {
               // fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //fncOcultarLoader();
            }
        });
    }

    function fncEliminarProspectoCatalogo(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoCatalogo',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
    
    
</script>
<!-- Catalogo -->

<!-- Actividad -->
<script>

    window.sLatitudActividad = null;
    window.sLongitudActividad = null;

    $(document).ready(function() {
        
        
        $("#formCEActividad").data("nIdItem",0);
        $("#sFechaActividad").attr("min", moment().format('YYYY-MM-DD'));

        // Submit del formulario de Cliente
        $("#formCEActividad").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro         = $("#formCEActividad").data("nIdRegistro");
            var sFechaActividad     = $("#sFechaActividad").val();
            var sHoraActividad      = $("#sHoraActividad").val();
            var sNota               = $("#sNotaActividad").val();
            var nCumplioActividad   = $('input[name=nCumplioActividad]:checked').val();
        

            if ( nCumplioActividad != '1' ) {
                if (sFechaActividad == "") {
                    toastr.error('Error. Seleccione un fecha de la cita. Porfavor verifique');
                    return;
                } else if (sHoraActividad == "") {
                    toastr.error('Error. Seleccione una hora de la cita. Porfavor verifique');
                    return;
                }
            }

            if($("#nIdEmpleadoP").val() == 0){
                toastr.error('Error. Seleccione un asesor. Porfavor verifique');
                return;
            }


            // nTipoActividad - 1 Cita
            var jsnData = {
                nIdRegistro         : nIdRegistro,
                nIdEmpleado         : $("#nIdEmpleadoP").val() ,
                nIdEstadoActividad  : nCumplioActividad  == 1 ?  $("body").data("nestadoejecutado") : $("body").data("nestadopendiente"),
                nIdProspecto        : $("#formProspecto").data("sAccion") == 'crear' ? 0 : $("#formProspecto").data("nIdRegistro"),
                nTipoActividad      : $("body").data("ntipoactividadcita"),
                sFechaActividad     : sFechaActividad,
                sHoraActividad      : sHoraActividad,
                sLatitud            : window.sLatitudActividad,
                sLongitud           : window.sLongitudActividad,
                sNota               : sNota,
                nEstado             : 1
            };

            if($("#formProspecto").data("sAccion") == 'crear'){

                if(nIdRegistro == 0){
                    

                    var nIdRegistro = 0 ;

                    $('.content-actividades').find('.content-actividad').each(function () {
                        nIdRegistro ++ ;
                    });

                    nIdRegistro += 1; 

                    $("#formCEActividad").data( "nIdRegistro" , nIdRegistro ); 

                    var jsnCard = {
                        nIdRegistro         : nIdRegistro,
                        jsnData             : jsnData,
                        event               : '',
                        sColor              : "verde",
                        sNombreEmpleado     : $("#nIdEmpleadoP").find("option:selected").text().trim(),
                        sFechaCreacion      : moment().format('DD/MM/YYYY'),
                        sFechaActividad     : moment(sFechaActividad,'YYYY-MM-DD').format('DD/MM/YYYY'),
                        nEdit               : 1,
                        sHoraActividad      : sHoraActividad,
                        sLatitud            : '',
                        sLongitud           : '',
                        nIdEstadoActividad  : $("body").data("nestadopendiente"),
                        sEstado             : "Pendiente"
                    };

                    console.log(jsnCard);

                    $("#content-actividades").append(fncDrawCardActividad(jsnCard));
                    
                } else {
                    console.log(nIdRegistro , 'editar');

                    $("#content-actividad-"+nIdRegistro).data("jsndata",jsnData);
                    $("#content-actividad-"+nIdRegistro).find(".f-creacion").html( "Fecha creacion : "+ moment().format('DD/MM/YYYY') );
                    $("#content-actividad-"+nIdRegistro).find(".f-ejecucion").html( "Fecha ejecucion : " + moment(sFechaActividad,'YYYY-MM-DD').format('DD/MM/YYYY') );
                    $("#content-actividad-"+nIdRegistro).find(".h-ejecucion").html( "Hora ejecucion : " + sHoraActividad );
                }

            } else {

                fncGrabarProspectoActividad(jsnData,function(aryData){

                        if(aryData.success){
                            
                            var jsnData = {
                                nIdRegistro  : $("#formProspecto").data("nIdRegistro"),
                                nIdActividad : $("body").data("ntipoactividadcita"), 
                            };

                            fncListarActividades(jsnData);

                            if(aryData.bChangeEstado){
                                $("#btnVerAdjuntos").show();
                                fncSetEtapa(aryData.nIdEtapaNegociacion);
                             }

                            toastr.success(aryData.success);
                        } else {
                            toastr.error(aryData.error);
                        }

                });

                
            }
           
            $("#formCEActividad").modal("hide");
           
        });

       
        $('input[type=radio][name=nCumplioActividad]').change(function() {
            if (this.value == '1') {
                fncMostrarLoader();
                fncGetLocation();
                $("#content-actividad").hide();
            } else if (this.value == '0') {
                window.sLatitudActividad   = null;
                window.sLongitudActividad  = null;
                $("#content-actividad").show();
            }
        });
       
       
        
    });

    window.fncValidarActividad = function(nIdRegistro){
        fncCleanAll();
        $("#formCEActividad").data( "nIdRegistro" , nIdRegistro );
        $("#formCEActividad").find(".modal-title").html("¿Cumplio la Cita?");
        $("#content-cumplio-actividad").show();
        $("#content-actividad").hide();
        $("#formCEActividad").modal("show");
    } 

    window.fncDrawCardActividad = function(jsnData){
        var sHtml = `
                    <div id="content-actividad-${jsnData.nIdRegistro}" data-nidregistro="${jsnData.nIdRegistro}" data-jsndata='${JSON.stringify(jsnData.jsnData)}' class="border-card p-2 content-actividad border-left-pr color-border-left-${jsnData.sColor} mb-2">
                        <div class="row">
                            <div onclick="${jsnData.event}" class="col-9">
                                <p class="titulo">Cita - ${jsnData.sNombreEmpleado} </p>
                                <p class="f-creacion">Fecha creacion  : ${jsnData.sFechaCreacion}</p>
                                <p class="f-ejecucion">Fecha ejecucion : ${jsnData.sFechaActividad}</p>
                                <p class="h-ejecucion">Hora ejecucion  : ${jsnData.sHoraActividad}</p>
                                <p>Estado : ${jsnData.sEstado}</p>
                            </div>
                            <div class="col-3 text-right">
                            
                                ${jsnData.nEdit == '1' ? `<a href="javascript:;" class="text-primary btn-delete-actividad" onclick="fncEditarActividad(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">edit</i> </a>` : ''}
                                
                                ${(jsnData.nIdEstadoActividad == $("body").data("nestadoejecutado")) ? `<a href="javascript:;" class="btn-view-location btn-delete-actividad"  onclick="fncVerLocationActividad( '${jsnData.sLatitud}' , '${jsnData.sLongitud}' );" title="Ver ubicacion"><i class="material-icons">location_on</i> </a>` : `` }
                                
                                <a href="javascript:;" class="text-danger btn-delete-actividad"  onclick="fncEliminarActividad(${jsnData.nIdRegistro},this);" title="Eliminar"><i class="material-icons">delete</i> </a>
                            
                            </div>
                        </div>
                    </div>
                `;

        return sHtml;
    }

    window.fncSuccessHandler = function (position) {
        console.log(position);
        toastr.success("Genial!. Ubicacion obtenida exitosamente.");
        window.sLatitudActividad  = position.coords.latitude;
        window.sLongitudActividad = position.coords.longitude;
        console.log(window.sLatitudActividad ,  window.sLongitudActividad );
        fncOcultarLoader();
    };

    window.fncErrorHandler = function (error) {
        console.error(error);
        switch (error.code) {
            case error.PERMISSION_DENIED:
                //La usuario denegó la solicitud de geolocalización.
                alert("Para una mejor experiencia te pedimos que actives tu ubicacion.");
                 break;
            case error.POSITION_UNAVAILABLE:
                //La información de ubicación no está disponible
                break;
            case error.TIMEOUT:
                //Se agotó el tiempo de espera de la solicitud para obtener la ubicación del usuario.
                break;
            case error.UNKNOWN_ERROR:
                console.log("error no esperado");
                break;
        }

        fncOcultarLoader();
    };

    window.fncGetLocation = function() {
        try {
            
            navigator.geolocation.getCurrentPosition(fncSuccessHandler, fncErrorHandler, {
                enableHighAccuracy: true,
                maximumAge: 0,
            });

        } catch (error) {
            console.log(error);
        }
    }


    window.fncVerLocationActividad = function(slatitud,sLongitud){

        if(slatitud != '' &&  sLongitud != '' ){
            var sUrl = `https://www.google.com/maps/search/?api=1&query=${slatitud},${sLongitud}`;
            window.open(sUrl, "_blank", "toolbar=1, scrollbars=1, resizable=1, width=900, height=900");
         }
    
    }



    function fncEditarActividad(nIdRegistro,element){
            var jsnData  = $("#content-actividad-" + nIdRegistro).data("jsndata");
            $("#formCEActividad").data("nIdRegistro",nIdRegistro);
            $("#sFechaActividad").val(jsnData.sFechaActividad);
            $("#sHoraActividad").val(jsnData.sHoraActividad);
            $("#sNotaActividad").val(jsnData.sNota);
            $("#formCEActividad").modal("show");
    }

    function fncEliminarActividad(nIdItem,element){

        if(confirm("¿Estas seguro de eliminar este item?")){

            if($("#formProspecto").data("sAccion") == 'crear'){
                $("#content-actividad-" + nIdItem).remove();
            } else {

                var jsnData = {
                    nIdRegistro : nIdItem
                };

                fncEliminarProspectoActividad(jsnData, function(aryData){
                    if(aryData.success){
                        
                        var jsnData= {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro")
                        };

                        fncListarActividades(jsnData);
                        fncGuardarCambio("Se elimino una cita");

                        toastr.success(aryData.success);

                    } else {
                        toastr.error(aryData.error);
                    }
                });
            }
        }

    }

    // LLamadas al servidor 

    function fncGrabarProspectoActividad(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoActividad',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncEliminarProspectoActividad(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoActividad',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncGetActividadByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetActividadByIdProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
    
</script>
<!-- Actividad -->

<!-- Adjuntos -->
<script>

    $(document).ready(function() {

  

        // Submit del formulario de Cliente
        $("#formCEAdjunto").find("form").on('submit',function(event){
            
            event.preventDefault();

            var nIdRegistro         = typeof $("#formCEAdjunto").data("nIdRegistro") ==='undefined' ? 0 : $("#formCEAdjunto").data("nIdRegistro")  ;
            var nIdProspecto        = $("#formProspecto").data("nIdRegistro");
            var sContrato           = $("#sContrato")[0].files[0];
            var nIdAdjuntoContrato  = typeof $("#sContrato").data("nIdAdjunto") ==='undefined' ? 0 : $("#sContrato").data("nIdAdjunto")  ;

            var formData = new FormData();
            formData.append('nIdRegistro', nIdRegistro);
            formData.append('nIdProspecto', nIdProspecto);
            formData.append('nIdEmpleado', $("#nIdEmpleadoP").val() );
            formData.append('nIdAdjuntoContrato',nIdAdjuntoContrato);
            formData.append('sContrato',sContrato);

            $.each($('#aryOtros')[0].files,function(key,input){
                formData.append('aryOtros[]', input);
            });

            // console.log(nIdAdjuntoContrato);

          
            fncGrabarProspectoAdjunto(formData,(aryData)=>{
                if(aryData.success){

                    if(aryData.bChangeEstado){
                        fncSetEtapa(aryData.nIdEtapaEnProceso);
                     }

                    var jsnData = {
                        nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                    };


                    if( sContrato != null ){
                        fncGuardarCambio("Se "+ (nIdRegistro == 0 ? "agrego" : "actualizo")  +" el contrato");
                    } 

                    if( $('#aryOtros')[0].files != null &&  $('#aryOtros')[0].files.length > 0 ){
                        fncGuardarCambio("Se agrego "+$('#aryOtros')[0].files.length+" Adjuntos");
                    }



                    fncDrawAdjuntos(jsnData,false);

                    toastr.success(aryData.success);
                }else{
                    toastr.error(aryData.error);
                }
            });
            
            
           
        });

       
        
    });

    // Funciones Auxiliares

    window.fncDrawItemAdjunto = function(jsnData){

        var sHtml = `
                <div class="card my-2 p-2">
                    <div class="d-flex flex-center">
                        <div><a href="${jsnData.sLinkArchivo}" download="${jsnData.sNombreArchivo}">${jsnData.sNombreArchivo}</a></div>
                        <div class="ml-auto"><a class="color-black" href="${jsnData.sLinkArchivo}" download="${jsnData.sNombreArchivo}"><i class="fas fa-download"></i></a></div>
                        <div class="mx-2"><a href="javascript:;" class="text-danger font-18" onclick="fncEliminarAdjunto(${jsnData.nIdAdjunto});" title="Eliminar"><i class="material-icons">delete</i></a></div>
                    </div>
                </div>
        `;

        return sHtml;
    }

    // Funciones Auxiliares 

    window.fncEliminarAdjunto = function(nIdRegistro){

        if(confirm("¿Estas seguro de eliminar este item?")){

                var jsnData = {
                    nIdRegistro : nIdRegistro
                };

                fncEliminarProspectoAdjunto(jsnData, function(aryData){
                    if(aryData.success){
                        
                        var jsnData = {
                            nIdRegistro : $("#formProspecto").data("nIdRegistro"),
                        };

                        fncDrawAdjuntos(jsnData,false);
                        fncGuardarCambio("Se elimino un adjunto");

                        // En caso se haya eliminado el contrato el prospecto regresa ala etapa anterior 
                        if(aryData.bChangeEstado){
                            fncSetEtapa( $("body").data("nidetapanegociacion") );
                        }


                        toastr.success(aryData.success);

                    } else {
                        toastr.error(aryData.error);
                    }
                });
        }
        
    }


 
    // LLamadas al servidor 

    function fncGrabarProspectoAdjunto(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarProspectoAdjunto',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncObtenerProspectoAdjuntosByIdProspecto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncObtenerProspectoAdjuntosByIdProspecto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncEliminarProspectoAdjunto(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoAdjunto',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
    
</script>
<!-- Adjuntos -->

<!-- Reporte Ventas -->
<script>

    $(document).ready(function() {


        $("#nIdEmpleadoAsesor,#nIdEmpleadoSupervisor").select2({
            placeholder : "TODOS"
        });

        
        $("#btnReporteVentas").on('click', function() {

            var jsnData = {
                nIdNegocio  : $("body").data("nidnegocio"),
                nIdEtapa    : $("body").data("nidetapacierre"),
                nIdTipoItem : null
            };

            fncOcultarAside();
            fncDrawTableReporteVentas(jsnData);
            $("#formReporteVentas").modal("show");
        });
        
      

        $("#form-filtros-reporte-ventas").on("submit",function(event){
            
            event.preventDefault();

            var nIdTipoItem      = $("#nTipoItemCatalogo").val(); 
            var dDesde           = $("#dDesde").datepicker('getDate');
            var dHasta           = $("#dHasta").datepicker('getDate');
            var arySupervisor    = $("#nIdEmpleadoSupervisor :selected").map(function(nIndex, item) { return $(item).val(); }).get();
            var aryAsesor        = $("#nIdEmpleadoAsesor :selected").map(function(nIndex, item) { return $(item).val(); }).get();

            if ((dDesde != null && dHasta == null) || (dDesde == null && dHasta != null)) {
                toastr.error('Error. Si va a especificar fechas, debe ingresar la inicio y fin. Por favor verificar.');
                return;
            }

            if (dHasta < dDesde) {
                toastr.error('Error. La fecha de fin debe ser mayor o igual que la fecha de inicio. Por favor verificar.');
                return;
            } 

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdEtapa        : $("body").data("nidetapacierre"),
                nIdTipoItem     : nIdTipoItem,
                dDesde          : $('#dDesde').val(),
                dHasta          : $('#dHasta').val(),
                arySupervisor   : arySupervisor,
                aryAsesor       : aryAsesor
            };

            fncDrawTableReporteVentas(jsnData);
        });

        $("#btnResetReporteVentas").on("click",function(){

            fncClearInputs("#form-filtros-reporte-ventas");
            $("#nIdEmpleadoSupervisor").val([]).trigger("change");
            $("#nIdEmpleadoAsesor").val([]).trigger("change");
            setTimeout(() => {
                $("#form-filtros-reporte-ventas").trigger("submit");
            }, 300);

        });
        
        
    });

 
    // Funciones Auxiliares 

    window.fncVerAdjuntosReporteVentas = function(nIdProspecto){

        
        var jsnData = {
            nIdRegistro :nIdProspecto,
        };

        $("#content-contrato-view").html(`<p class="mb-0">Contrato: </p>`);
        $("#content-adjuntos-view").html(`<p class="mb-0">Adjuntos: </p>`);

        fncObtenerProspectoAdjuntosByIdProspecto(jsnData,function(aryData){
            if(aryData.success){

                var aryData = aryData.aryData;
            
                if(aryData.length > 0){

                    aryData.forEach(aryElement => {

                        var sHtmlAdjunto = `` ;
                        
                        sHtmlAdjunto += `<div class="card my-2 p-2">
                                                <div class="d-flex flex-center">
                                                    <div><a href="${docs(aryElement.sNombreArchivo)}" download="${aryElement.sNombreArchivo}">${aryElement.sNombreArchivo}</a></div>
                                                    <div class="ml-auto"><a class="color-black" href="${docs(aryElement.sNombreArchivo)}" download="${aryElement.sNombreArchivo}"><i class="fas fa-download"></i></a></div>
                                                </div>
                                            </div>`;

                        if(aryElement.nContrato == 1){

                            $("#content-contrato-view").append(sHtmlAdjunto);
                                                          
                        } else {

                             $("#content-adjuntos-view").append(sHtmlAdjunto);
                            
                        }

                    });
   
                    $("#formViewAdjuntos").modal("show");
                }               

            } else {
                toastr.error(error);
            }

        });

    }

    // Este metodo regresa al prospecto a la etapa de pendiente 
    window.fncEliminarProspectoCerrado = function(nIdRegistro){


        if(confirm("¿Estas seguro de eliminar este prospecto del reporte de ventas?")){

                var jsnData = {
                    nIdRegistro : nIdRegistro,
                    nIdEtapa    : $("body").data("nidetapapendiente"),
                };

                fncEjecutarEliminarProspectoCerrado(jsnData, function(aryData){

                    if(aryData.success){
                        
                        $("#form-filtros-reporte-ventas").trigger("submit");
                        fncDrawProspectosForState();

                    } else {
                        toastr.error(aryData.error);
                    }

                });

 
        }

    }

    window.fncDrawTableReporteVentas = function(jsnData){

        fncGetProspectosParaReporteVentas(jsnData, (aryData)=>{

            if(aryData.success){

                $("#tblReporteVentas").bootstrapTable("load",aryData.aryData);

            } else {
                toastr.error(aryData.error);
            }

        });
    }
        

     
    // LLamadas al servidor 

    function fncGetProspectosParaReporteVentas(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetProspectosParaReporteVentas',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncEjecutarEliminarProspectoCerrado(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncEliminarProspectoCerrado',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }


    
    
</script>
<!-- Reporte Ventas -->

<!-- BD Clientes -->
<script>

    $(document).ready(function() {

  
        $("#btnBaseDatosClientes").on('click', function() {
            fncOcultarAside();
            $("#nTipoCliente").val(0);

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nTipoCliente    : null,
            };

            fncDrawTableBDClientes(jsnData);
            $("#formBDClientes").modal("show");
        });

        window.fncVerHistorial = function(nIdCliente){
           
            var jsnData = {
                nIdCliente : nIdCliente,
                nIdNegocio : $("body").data("nidnegocio")
            };

            fncPopulateHistorialCliente(jsnData,(aryData)=>{

                if(aryData.success){
                    $("#tblHistorial").bootstrapTable("load",aryData.aryData);
                    $("#formHistorialCliente").modal("show");
                    toastr.success(aryData.success);
                } else {
                    toastr.error(aryData.error);
                }

            });
        }
        
        $("#nTipoCliente").on('change', function() {

            var nTipoCliente =  $(this).val() == '0' ? null : $(this).val();

            var jsnData = {
                nIdNegocio   : $("body").data("nidnegocio"),
                nTipoCliente : nTipoCliente
            };

            fncDrawTableBDClientes(jsnData);
        });

        
        
    });

    // Funciones Auxiliares

   

    // // Funciones Auxiliares 

    window.fncDrawTableBDClientes= function(jsnData){

        fncGetClientesParaAdmin(jsnData, (aryData)=>{

            if(aryData.success){

                $("#tblBDClientes").bootstrapTable("load",aryData.aryData);

            } else {
                toastr.error(aryData.error);
            }

        });
    }
        

     
    // LLamadas al servidor 

    function fncGetClientesParaAdmin(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/cliente/fncGetClientesParaAdmin',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    
    
</script>
<!--  BD Clientes -->


<!-- BD Empleados -->
<script>

    $(document).ready(function() {

  
        $("#btnBaseDatosEmpleados").on('click', function() {
            fncOcultarAside();
            fncDrawTableEmpleados();
            $("#formBDEmpleados").modal("show");
        });

        $("#btnFilterEmpleados").on("click",function(){
            fncDrawTableEmpleados();
        });
     
       
        $('#formCEEmpleado').on('hidden.bs.modal', function() {
            fncClearInputs($("#formCEEmpleado").find("form"));
            fncAgregarOActualizarCamposAdicionalesEmpleados();
        });


        $("#formCEEmpleado").find("form").on('submit', function(event) {
            
            event.preventDefault();

            var nIdEntidad = $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ? $("body").data("nidsupervisor") :  $("body").data("nidentidadvendedor");
            var sEntidad   = "-" + nIdEntidad;

            var nIdRegistro                     = $("#formCEEmpleado").data("nIdRegistro");

            var nTipoDocumento                  = $("#nTipoDocumento" + sEntidad);
            var sNumeroDocumento                = $("#sNumeroDocumento" + sEntidad);
            var sNombre                         = $("#sNombre"+ sEntidad);
            var sCorreo                         = $("#sCorreo" + sEntidad);
            var dFechaNacimiento                = $("#dFechaNacimiento" + sEntidad);
            var nCantidadPersonasDependientes   = $("#nCantidadPersonasDependientes" + sEntidad);
            var nIdEstudios                     = $("#nIdEstudios" + sEntidad);
            var nIdSituacionEstudios            = $("#nIdSituacionEstudios" + sEntidad);
            var sCarreraCiclo                   = $("#sCarreraCiclo" + sEntidad);

            var nIdNegocio                      = $("body").data("nidnegocio");
            var nIdTipoEmpleado                 = $("#nTipoEmpleadoFilter").find("option:selected").val();

            var nExperienciaVentas              = $("#nExperienciaVentas" + sEntidad);
            var sRubroExperiencia               = $("#sRubroExperiencia" + sEntidad);

            var nIdEstadoCivil                  = $("#nIdEstadoCivil" + sEntidad);
            var nIdSexo                         = $("#nIdSexo" + sEntidad);

            var sImagen                        = $("#sImagen" + sEntidad).length > 0 ?  $("#sImagen" + sEntidad)[0].files[0] : null;
            var sClave                         = $("#sClave" + sEntidad);
            var nEstado                        = $("#nEstado" + sEntidad);


            if (nTipoDocumento.length > 0 && nTipoDocumento.val() == '0') {
                toastr.error('Error. Seleccione un tipo de documento . Porfavor verifique');
                return;
            } else if (sNumeroDocumento.length > 0 && sNumeroDocumento.val() == '') {
                toastr.error('Error. Ingrese un numero de documento. Porfavor verifique');
                return;
            } else if (sNombre.length > 0 && sNombre.val() == '') {
                toastr.error('Error. Ingrese un nombre . Porfavor verifique');
                return;
            } else if (sCorreo.length > 0 && (sCorreo.val() == '' || !fncValidateEmail(sCorreo.val()) ) ) {
                toastr.error('Error. Ingrese un correo con el formato correcto. Porfavor verifique');
                return;
            } else if (dFechaNacimiento.length > 0 && dFechaNacimiento.val() == '') {
                toastr.error('Error. Ingrese un fecha. Porfavor verifique');
                return;
            }  else if (nCantidadPersonasDependientes.length > 0 && nCantidadPersonasDependientes.val() == '' || isNaN(nCantidadPersonasDependientes.val()) || nCantidadPersonasDependientes.val() < 0 ) {
                toastr.error('Error. No ha ingresado la cantidad de personas dependientes o el valor no es correcto. Porfavor verifique');
                return;
            } else if (sClave.length > 0 && sClave.val() == '') {
                toastr.error('Error. Ingrese una contraseña. Porfavor verifique');
                return;
            } else if (nIdEstadoCivil.length > 0 && nIdEstadoCivil.val() == '0') {
                toastr.error('Error. Seleccione un estado civil. Porfavor verifique');
                return;
            } else if (nIdSexo.length > 0 && nIdSexo.val() == '0') {
                toastr.error('Error. Seleccione un tipo de sexo. Porfavor verifique');
                return;
            }


            if (nIdEstudios.length > 0 && nIdEstudios.val() == '1') {

                if (nIdSituacionEstudios.length > 0 && nIdSituacionEstudios.val() == '0') {
                    toastr.error('Error. Seleccione situacion de estudios . Porfavor verifique');
                    return;
                } else if (sCarreraCiclo.length > 0 && sCarreraCiclo.val() == '') {
                    toastr.error('Error. Ingrese situacion de estudios . Porfavor verifique');
                    return;
                }

            }


            if (nExperienciaVentas.length > 0 && nExperienciaVentas.val() == '1') {
                if (sRubroExperiencia.length > 0 && sRubroExperiencia.val() == '') {
                    toastr.error('Error. Ingrese su rubro de experiencia. Porfavor verifique');
                    return;
                }
            }

            var formData = new FormData();
            formData.append('nIdRegistro', nIdRegistro);
            formData.append('nIdNegocio', nIdNegocio);
            formData.append('nIdTipoEmpleado', nIdTipoEmpleado);
            formData.append('nTipoDocumento', nTipoDocumento.length > 0 ? nTipoDocumento.val() : "");
            formData.append('sNumeroDocumento',sNumeroDocumento.length > 0 ? sNumeroDocumento.val() : "");
            formData.append('sNombre', sNombre.length > 0 ? sNombre.val() : "");
            formData.append('sCorreo', sCorreo.length > 0 ? sCorreo.val() : "");

            formData.append('nIdSexo', nIdSexo.length > 0 ? nIdSexo.val() : "");
            formData.append('nIdEstadoCivil', nIdEstadoCivil.length > 0 ? nIdEstadoCivil.val() : "");

            formData.append('dFechaNacimiento', dFechaNacimiento.length > 0 ? dFechaNacimiento.val() : "");
            formData.append('nCantidadPersonasDependientes', nCantidadPersonasDependientes.length > 0 ? nCantidadPersonasDependientes.val() : 0);
            formData.append('nExperienciaVentas', nExperienciaVentas.length > 0 ? nExperienciaVentas.val() : "");
            formData.append('sRubroExperiencia', sRubroExperiencia.length > 0 ? sRubroExperiencia.val() : "");
            formData.append('nIdEstudios',nIdEstudios.length > 0 ? nIdEstudios.val() : "");
            formData.append('nIdSituacionEstudios', nIdSituacionEstudios.length > 0 ? nIdSituacionEstudios.val() : "");
            formData.append('sCarreraCiclo', sCarreraCiclo.length > 0 ? sCarreraCiclo.val() : "");
            formData.append('sClave', sClave.length > 0 ? sClave.val() : "");
            formData.append('sImagen', sImagen);
            formData.append('nEstado', nEstado.length > 0 ? nEstado.val() : "");

           
            if ( $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ) {
                
                // Supervisores
                
                if( $("#nIdColor" + sEntidad).find("option:selected").val()  == '0' ){
                    toastr.error('Error. Seleccione un color para el supervisor . Porfavor verifique');
                    return;
                }

                formData.append( 'nIdColor', $("#nIdColor" + sEntidad).find("option:selected").val() );

            } else {

                if( $("#nIdSupervisor" + sEntidad).find("option:selected").val()  == '0' ){
                    toastr.error('Error. Seleccione un supervisor para el asesor de ventas . Porfavor verifique');
                    return;
                }

                formData.append('nIdSupervisor', $("#nIdSupervisor" + sEntidad).find("option:selected").val() );
            }

            fncGrabarEmpleado(formData, function(aryData) {
                if (aryData.success) {
                    
                    fncPopulateEmpleadoByFilter();
                    $("#formCEEmpleado").modal("hide");
                } else {
                    toastr.error(aryData.error);
                }
            });


        });


        
    });

    // Funciones Auxiliares


    window.fncDrawTableEmpleados = function(){
           
           var jsnData = {
               nTipoEmpleado : $("#nTipoEmpleadoFilter").val(),
               nEstado       : $("#nEstadoEmpleadoFilter").val() == '' ? null : $("#nEstadoEmpleadoFilter").val(),
               nIdNegocio    : $("body").data("nidnegocio"),
               nRol          : $("body").data("nrol")
           };

           $("#sTituloEmpleado").html( $("#nTipoEmpleadoFilter").find("option:selected").text()  + " : ");

           fncObtenerCamposEmpleados(jsnData,(aryData)=>{

               if(aryData.success){

                   var aryData = aryData.aryData;
                   var sHtml = ``;
                   
                   sHtml = `<tr>`;
                   
                   sHtml += `<th data-field="sAcciones">Acciones</th>`;


                   sHtml += `<th data-field="sColor">Color</th>`;


                   aryData.forEach(aryElement => {
                       sHtml += `<th data-field="${aryElement.sNombre}">${aryElement.sNombreUsuario}</th>`;
                   });

                   sHtml += `<tr>`;

                   $("#tblBDEmpleados").bootstrapTable("destroy");

                   setTimeout(() => {
                       $("#tblBDEmpleados").find("thead").html(sHtml);
                       setTimeout(() => {
                           
                           
                           $("#tblBDEmpleados").bootstrapTable();

                           var nIdEntidad = $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ? $("body").data("nidsupervisor") :  $("body").data("nidentidadvendedor");
                           var sEntidad   = '-' + nIdEntidad;
                          
                           fncPopulateEmpleado(jsnData,function(aryData){
                               if(aryData.success){
                                   
                                   $("#tblBDEmpleados").bootstrapTable("load",aryData.aryData);

                                   // Llmar alos campos del formulario

                                   fncDrawEmpleado((bStatus) => {

                                       // Se carga el formulario 

                                       $("#btnCrearEmpleado").on('click',function(){
                                           $('#formCEEmpleado').data("nIdRegistro",0);
                                           $('#formCEEmpleado').find(".modal-title").html("Nuevo " + fncUc($("#nTipoEmpleadoFilter").find("option:selected").text()));
                                           $('#formCEEmpleado').modal("show");
                                       });

                                        // Ocultamos el estado ya que no tiene sentido que el usuario lo ingrese 
                                        // Si todo esta cooreecto agrergo los eventos
                                       
                                       $("#nIdEstudios" + sEntidad).on('change', function() {
                                               
                                               switch ($(this).val()) {
                                                   case '0':
                                                   case '602':
                                                   case '605':
                                                       // Educaccion Basica y ninguno
                                                       $("#content-nIdSituacionEstudios"+ sEntidad).hide();
                                                       $("#content-sCarreraCiclo"+ sEntidad).hide();
                                                       break;
                                                   case '604':
                                                   case '603':
                                                       // Educaccion Superior y teecnico
                                                       $("#content-nIdSituacionEstudios" + sEntidad).show();
                                                       $("#content-sCarreraCiclo"+ sEntidad).show();
                                                       break;

                                               }

                                       });

                                       $("#nExperienciaVentas" + sEntidad).on('change', function() {
                                               if ($(this).val() == 1) {
                                                   $("#content-sRubroExperiencia" + sEntidad).show();
                                               } else {
                                                   $("#content-sRubroExperiencia" + sEntidad).hide();
                                               }
                                       });

                                       $("#nTipoDocumento" + sEntidad ).change(function() {
                                           
                                               if( $(this).val() > 0 ) {
                                                   fncMaxLengthTypeDocument( $(this).find('option:selected').text().trim().toUpperCase() , "#sNumeroDocumento"+sEntidad );
                                               }

                                               $("#sNumeroDocumento"+sEntidad).val("").trigger("keyup");

                                       });

                                       $("#sNumeroDocumento" + sEntidad ).on('keyup change',function(){
                                               
                                               switch( $("#nTipoDocumento"+sEntidad).find("option:selected").text() ){
                                                   
                                                   case 'RUC':

                                                       if( $("#sNumeroDocumento"+sEntidad).val().length  == 11 ){
                                                           
                                                           // Lanzamos el evento
                                                           var jsnData = {
                                                               sTipo        : "ruc",
                                                               sNumeroDoc   : $("#sNumeroDocumento"+sEntidad).val()
                                                           };

                                                           fncBuscarDocument( jsnData ,function(aryData){
                                                               if(aryData.success){
                                                                   $("#sNombre"+sEntidad).val(aryData.success.razonSocial);
                                                               }
                                                           });

                                                       }

                                                   break;
                                                   
                                                   case 'DNI':
                                                       if( $("#sNumeroDocumento"+sEntidad).val().length  == 7 || $("#sNumeroDocumento"+sEntidad).val().length  == 8 ){
                                                           
                                                           // Lanzamos el evento
                                                           var jsnData = {
                                                               sTipo        : "dni",
                                                               sNumeroDoc   : $("#sNumeroDocumento"+sEntidad).val()
                                                           };

                                                           fncBuscarDocument(jsnData ,function(aryData){
                                                               if(aryData.success){
                                                                   $("#sNombre"+sEntidad).val(aryData.success.razonSocial);
                                                               }
                                                           });

                                                       }
                                                   break;

                                               }
                                           
                                               
                                       });

                                       $("#nIdSituacionEstudios"+sEntidad).on('change',function(){
                                               if( $(this).val() == '608' ){
                                                   $("label[for='sCarreraCiclo" + sEntidad +"']").html("Carrera");
                                               } else {
                                                   $("label[for='sCarreraCiclo" + sEntidad +"']").html("Carrera y ciclo");
                                               }
                                       });

                                       $("#content-sCorreo" + sEntidad).removeClass("col-md-12");
                                       $("#content-sCorreo" + sEntidad).addClass("col-md-6");

                                       $("#nIdEstudios" + sEntidad).trigger("change");

                                       fncAgregarOActualizarCamposAdicionalesEmpleados();
                                       fncEventFile();
                                   });

                               } else {
                                   toastr.error(aryData.error);
                               }
                           });

                       }, 200);
                   }, 1000);

               } else {
                   toastr.error(aryData.error);
               }
           });
    }
       

    function fncAgregarOActualizarCamposAdicionalesEmpleados(){

            // Campo adicional para supervisor o asesor de ventas 

            
            var nIdEntidad = $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ? $("body").data("nidsupervisor") :  $("body").data("nidentidadvendedor");
            var sEntidad   = '-' + nIdEntidad;

            if( $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val()){
                                           
                 // Formulario Supervisor - Agregar el item color
                
                 var jsnData = {
                     nIdNegocio : $("body").data("nidnegocio")
                 };

                
                 fncObtenerColores(jsnData,(aryData)=>{
                     if(aryData.success){
                         
                         var sNameOrId = "nIdColor" + sEntidad;
                         var aryData   = aryData.aryData;
                         var sOptionsComboPrincipal = ``; // Este sirve para actualizar los colores en el modal de invitar 

                         if( $('#content-' + sNameOrId).length > 0 ) $('#content-' + sNameOrId).remove() ;

                         var sHtml = `
                         <div id="content-${sNameOrId}" class="col-12 col-md-6">
                                 <div class="form-group"><label for="${sNameOrId}" class="col-form-label">Color</label>
                                 <select class="form-control" name="${sNameOrId}" id="${sNameOrId}">
                                 `;

                                 sHtml += `<option value="0">SELECCIONAR</option>`;
                                 sOptionsComboPrincipal += `<option value="0">SELECCIONAR</option>`;
                                 aryData.forEach(aryItem => {
                                     sHtml += `<option value="${aryItem.nIdCatalogoTabla}">${aryItem.sDescripcionLargaItem}</option>`;
                                     sOptionsComboPrincipal += `<option value="${aryItem.nIdCatalogoTabla}">${aryItem.sDescripcionLargaItem}</option>`;
                                 });

                                     sHtml += `    
                                 </select>
                             </div>
                         </div>
                         `;

                        $("#formEmpleado").prepend(sHtml);
                        $("#nIdColor").html(sOptionsComboPrincipal);

                     } else {
                         toastr.error(aryData.error);
                     }
                 });

                                       
            } else {

                // Formulario Asesor de ventas

                var jsnData = {
                    nIdNegocio      : $("body").data("nidnegocio"),
                    nTipoEmpleado   : $("body").data("ntipoempleadosupervisor")
                };

                fncPopulateEmpleado(jsnData,(aryData)=>{

                    if(aryData.success){

                        var sNameOrId = "nIdSupervisor" + sEntidad;
                        var aryData   = aryData.aryData;

                        if( $('#content-' + sNameOrId).length > 0 ) $('#content-' + sNameOrId).remove() ;

                        var sOptionsComboPrincipal = ``; // Este sirve para actualizar los supervisores en el modal de invitar 

                        var sHtml = `
                        <div id="content-${sNameOrId}" class="col-12 col-md-6">
                                <div class="form-group"><label for="${sNameOrId}" class="col-form-label">Supervisor</label>
                                <select class="form-control" name="${sNameOrId}" id="${sNameOrId}">
                                `;

                                sHtml += `<option value="0">SELECCIONAR</option>`;
                                sOptionsComboPrincipal  += `<option value="0">SELECCIONAR</option>`;
                                aryData.forEach(aryItem => {
                                    sHtml += `<option value="${aryItem.nIdEmpleado}">${aryItem.sNombre} - ${aryItem.sNombreColor} </option>`;
                                    sOptionsComboPrincipal  += `<option value="${aryItem.nIdEmpleado}">${aryItem.sNombre}</option>`;
                                });

                                    sHtml += `    
                                </select>
                            </div>
                        </div>
                        `;

                        $("#formEmpleado").prepend(sHtml);
                        $("#nIdSupervisor").html(sOptionsComboPrincipal);


                    } else {

                      toastr.error(aryData.error);

                    }


                });



            }

    }   

    function fncDrawEmpleado(fncCallback) {

           var nIdEntidad = $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ? $("body").data("nidsupervisor") :  $("body").data("nidentidadvendedor");

           var jsnData = {
               nIdEntidad : nIdEntidad,
               nIdNegocio : $('body').data('nidnegocio')
           };

           fncObtenerDataForm(jsnData,function(aryData){
               $("#formEmpleado").html(fncBuildForm(aryData));
               fncCallback(true);
           });

    }   


    function fncMostrarEmpleado(nIdRegistro , sOpcion ) {

        $( "#formCEEmpleado" ).data("nIdRegistro",nIdRegistro);

        var jsnData = {
            nIdRegistro: nIdRegistro
        };

        fncBuscarEmpleado(jsnData, function(aryResponse){
            
                if (aryResponse.success) {

                    var nIdEntidad = $("body").data("ntipoempleadosupervisor") == $("#nTipoEmpleadoFilter").val() ? $("body").data("nidsupervisor") :  $("body").data("nidentidadvendedor");
                    var sEntidad   = "-" + nIdEntidad;
                    var aryData = aryResponse.aryData;

                    if( $( "#nIdColor" + sEntidad ).length > 0 ) {
                        
                        $( "#nIdColor"  + sEntidad ).append(`<option value="${aryData.nIdColor}" >${aryData.sColorSuper}</option>`);

                        setTimeout(() => {
                            $( "#nIdColor"  + sEntidad ).val(aryData.nIdColor).trigger("change");
                        }, 500);

                    } 
                    
                    
                    if( $( "#nIdSupervisor" + sEntidad ).length > 0 )  $( "#nIdSupervisor" + sEntidad ).val( aryData.nIdSupervisor ); 
                    if( $( "#nTipoDocumento" + sEntidad ).length > 0 )  $( "#nTipoDocumento" + sEntidad ).val( aryData.nTipoDocumento ); 
                    if( $( "#sNumeroDocumento" + sEntidad ).length > 0 )  $( "#sNumeroDocumento" + sEntidad ).val( aryData.sNumeroDocumento ); 
                    if( $( "#sNombre" + sEntidad ).length > 0 )  $( "#sNombre" + sEntidad ).val( aryData.sNombre ); 
                    if( $( "#sCorreo" + sEntidad ).length > 0 )  $( "#sCorreo" + sEntidad ).val( aryData.sCorreo ); 

                    if( $( "#nIdSexo" + sEntidad ).length > 0 )  $( "#nIdSexo" + sEntidad ).val( aryData.nIdSexo ); 
                    if( $( "#nIdEstadoCivil" + sEntidad ).length > 0 )  $( "#nIdEstadoCivil" + sEntidad ).val( aryData.nIdEstadoCivil ); 

                    if( $( "#nExperienciaVentas" + sEntidad ).length > 0 )  $( "#nExperienciaVentas" + sEntidad ).val( aryData.nExperienciaVentas ).trigger("change"); 
                    if( $( "#sRubroExperiencia" + sEntidad ).length > 0 )  $( "#sRubroExperiencia" + sEntidad ).val( aryData.sRubroExperiencia ); 
                    if( $( "#dFechaNacimiento" + sEntidad ).length > 0 )  $( "#dFechaNacimiento" + sEntidad ).val( aryData.dFechaNacimiento ); 
                    if( $( "#nCantidadPersonasDependientes" + sEntidad ).length > 0 )  $( "#nCantidadPersonasDependientes" + sEntidad ).val( aryData.nCantidadPersonasDependientes ); 
                    if( $( "#nIdEstudios" + sEntidad ).length > 0 )  $( "#nIdEstudios" + sEntidad ).val( aryData.nIdEstudios ); 
                    if( $( "#nIdSituacionEstudios" + sEntidad ).length > 0 )  $( "#nIdSituacionEstudios" + sEntidad ).val( aryData.nIdSituacionEstudios ); 
                    if( $( "#sCarreraCiclo" + sEntidad ).length > 0 )  $( "#sCarreraCiclo" + sEntidad ).val( aryData.sCarreraCiclo ); 
                    if( $( "#nEstado" + sEntidad ).length > 0 )  $( "#nEstado" + sEntidad ).val( aryData.nEstado ); 
                    if( $( "#sClave" + sEntidad ).length > 0 )  $( "#sClave" + sEntidad ).val( aryData.sClave ); 
                    if( $( "#sImagen" + sEntidad ).length > 0 )  $( "#sImagen" + sEntidad ).parent().find(".custom-file-label").html( aryData.sImagen ); 


                   var sTitle = fncUc($("#nTipoEmpleadoFilter").find("option:selected").text());

                    if(sOpcion == 'ver'){
                        fncViewForm("#formCEEmpleado" , "Ver " + sTitle);
                    } else {
                        fncEditForm("#formCEEmpleado" , "Editar "  + sTitle);
                    }

                    $("#formCEEmpleado").modal("show");


                } else {
                    toastr.error(aryData.error);
                }
        });

    }

    function fncCambiarEstadoEmpleado(nIdRegistro, nNuevoEstado) {

        var sEstado = nNuevoEstado == '1' ? 'mostrará' : 'ocultará';

        if(confirm( 'Esta acción ' + sEstado + ' el registro en todo el sistema. ¿ Esta seguro de continuar ?', )){

                var jsnData = {
                    nIdRegistro : nIdRegistro,
                    nEstado     : nNuevoEstado
                };

                fncEjecutarCambiarEstadoEmpleado(jsnData, (aryData)=>{
                    if(aryData.success){
                        fncPopulateEmpleadoByFilter();
                    }else{
                        toastr.error(aryData.error);
                    }
                });
        }
    
    }

    function fncPopulateEmpleadoByFilter(){

       var jsnData = {
           nTipoEmpleado : $("#nTipoEmpleadoFilter").val(),
           nIdNegocio    : $("body").data("nidnegocio")
        };

       fncPopulateEmpleado(jsnData,function(aryData){
           if(aryData.success){
               
               $("#tblBDEmpleados").bootstrapTable("load",aryData.aryData);
               fncAgregarOActualizarCamposAdicionalesEmpleados();
           } else {
               toastr.error(aryData.error);
           }
       });

    }



     
    // LLamadas al servidor 

    function fncGrabarEmpleado(formData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncGrabarEmpleado',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncObtenerCamposEmpleados(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncObtenerCamposEmpleados',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncPopulateEmpleado(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncPopulate',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    function fncObtenerColores(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncObtenerColores',
            data: jsnData,
            beforeSend: function() {
                //fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                //fncOcultarLoader();
            }
        });
    }

    

    window.fncObtenerDataForm = (jsnData, fncCallback) => {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'formularios/fncBuildForm',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    window.fncBuscarEmpleado = (jsnData, fncCallback) => {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncMostrarRegistro',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }

    window.fncEjecutarCambiarEstadoEmpleado = (jsnData, fncCallback) => {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'empleados/fncCambiarEstado',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }
    
    
</script>
<!--  BD Empleados -->



<!-- Reporte Consultor -->
<script>

    $(document).ready(function() {

  
        $("#btnReporteConsultor").on('click', function() {
            fncOcultarAside();
            $("#formReporteConsultor").modal("show");
            $("#tblReporteConsultor").bootstrapTable("load",[]);
        });

        $("#form-reporte-consultor").on("submit",function(event){
            
            event.preventDefault();

            var nIdTipoItem      = $("#nTipoItemCatalogoRC").val(); 
            var dDesde           = $("#dDesdeRC").datepicker('getDate');
            var dHasta           = $("#dHastaRC").datepicker('getDate');
            var arySupervisor    = $("#nIdEmpleadoSupervisorRC :selected").map(function(nIndex, item) { return $(item).val(); }).get();
            var aryAsesor        = $("#nIdEmpleadoAsesorRC :selected").map(function(nIndex, item) { return $(item).val(); }).get();

            if ((dDesde != null && dHasta == null) || (dDesde == null && dHasta != null)) {
                toastr.error('Error. Si va a especificar fechas, debe ingresar la inicio y fin. Por favor verificar.');
                return;
            }

            if (dHasta < dDesde) {
                toastr.error('Error. La fecha de fin debe ser mayor o igual que la fecha de inicio. Por favor verificar.');
                return;
            } 

            var jsnData = {
                nIdNegocio      : $("body").data("nidnegocio"),
                nIdTipoItem     : nIdTipoItem,
                dDesde          : $('#dDesdeRC').val(),
                dHasta          : $('#dHastaRC').val(),
                arySupervisor   : arySupervisor,
                aryAsesor       : aryAsesor
            };

            fncGetReporteAsesor(jsnData,(aryData)=>{
                if(aryData.success){

                    toastr.success(aryData.success);

                    var aryData = aryData.aryData;

                    $("#tblReporteConsultor").bootstrapTable("load",aryData);
 
                } else {
                    toastr.error(aryData.error);
                }

            });
        });

        
        $("#btnCleanFiltrosRC").on("click",function(){

            $("#nTipoItemCatalogoRC").val(0);
            $("#nIdEmpleadoSupervisorRC").val([]).trigger("change");
            $("#nIdEmpleadoAsesorRC").val([]).trigger("change");
            $("#dDesdeRC").val('');
            $("#dHastaRC").val('');

            setTimeout(() => {
                $("#form-reporte-consultor").trigger("submit");
            }, 200);

        });

     
        
        
    });

    // Funciones Auxiliares

   
    // llamadas al servidor 
    function fncGetReporteAsesor(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGetReporteAsesor',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }    
</script>
<!-- Reporte Consultor -->





<!-- Prospecto Simple -->
<script>

    $(document).ready(function() {

        $("#sFechaActividadPS").attr("min", moment().format('YYYY-MM-DD'));

        $("#btnCrearPS").on('click', function() {
            
            fncCleanAllPS();

            var jsnData = {
                nIdNegocio : $("body").data("nidnegocio"),
                nEstado    : 1 
            };

            fncDrawEmpleadoSelect(jsnData,"#nIdEmpleadoPS",(bStatus)=>{
                
                if(window.isAsesor){
                    $("#nIdEmpleadoPS").val($("body").data("nidempleado")).trigger("change");
                }

            });

            fncDrawClienteSelect(jsnData,"#nIdClientePS");

            $("#formCEProspectoSimple").modal("show");
        });

        $("#formCEProspectoSimple").find("form").on("submit",function(event){
            
            event.preventDefault();

            var sTitulo             = $("#sTituloPS").val(); 
            var nIdCliente          = $("#nIdClientePS").find('option:selected').val();
            var nIdEmpleado         = $("#nIdEmpleadoPS").find('option:selected').val();

            var bExisteWidgetCitas  = $("body").data("bexistewidgetcitas"); 
            var sFechaActividad     = $("#sFechaActividadPS").val();
            var sHoraActividad      = $("#sHoraActividadPS").val();
            var sNota               = $("#sNotaActividadPS").val();

            
            if(nIdCliente == 0){
                
                if(sTitulo.length == 0){
                    toastr.error("Error.Si no selecciona un cliente debe de escribir un titulo para el prospecto .Porfavor verifique");
                    return;
                }

            } else if(nIdEmpleado == 0){
                toastr.error("Error.Debe de especificar un asesor de ventas .Porfavor verifique");
                return;
            }

            // Validar actividad 
        

            if (bExisteWidgetCitas) {

                if (sFechaActividad == "") {
                    toastr.error('Error. Seleccione un fecha de la cita. Porfavor verifique');
                    return;
                } else if (sHoraActividad == "") {
                    toastr.error('Error. Seleccione una hora de la cita. Porfavor verifique');
                    return;
                }

            }


            var aryActividades = {
                nIdRegistro         : 0,
                nIdEmpleado         : nIdEmpleado ,
                nIdEstadoActividad  :  $("body").data("nestadopendiente"),
                nIdProspecto        : 0,
                nTipoActividad      : $("body").data("ntipoactividadcita"),
                sFechaActividad     : sFechaActividad,
                sHoraActividad      : sHoraActividad,
                sLatitud            : "",
                sLongitud           : "",
                sNota               : sNota,
                nEstado             : 1
            };

        
            var jsnData = {
                nIdNegocio          : $("body").data("nidnegocio"),
                sTitulo             : sTitulo,
                nIdCliente          : nIdCliente ,
                nIdEmpleado         : nIdEmpleado,
                bExisteWidgetCitas  : bExisteWidgetCitas ? true : false,
                aryActividades      : aryActividades,
                nTipoEntidadNota    : $("body").data("nntipoentidadnotaempleado"), 
                nEstado             : 1
            };

            fncGrabarPS(jsnData,(aryData)=>{
                if(aryData.success){

                    toastr.success(aryData.success);
                    fncGetProspectosForEtapas();

                    $("#formCEProspectoSimple").modal("hide");
                } else {
                    toastr.error(aryData.error);
                }

            });
        });

        
    });

    // Funciones Auxiliares

    function fncDrawEmpleadoSelect(jsnData,sHtmlTag , fncCallbackEndProccess = null){


        var sHtml = ``;

        $(sHtmlTag).html(sHtml);

        fncPopulateEmpleado(jsnData,(aryData)=>{
            if(aryData.success){

                var aryData = aryData.aryData;

                sHtml += `<option value="0">Seleccionar</option>`;
                
                if (aryData.length > 0) {
                    aryData.forEach((element) => {
                        sHtml += `<option value="${element.nIdEmpleado}">${element.sNombre}</option>`;
                    });
                }

                $(sHtmlTag).html(sHtml);

                setTimeout(() => {
                    if( fncCallbackEndProccess != null ) fncCallbackEndProccess(true);
                }, 200);

            } else {
              toastr.error(aryData.error);
            }
        });

    }

    function fncDrawClienteSelect(jsnData , sHtmlTag){
    
        fncGetClientes(jsnData,function(aryData){
             if(aryData.success){

                 var aryLista = aryData.aryData;
                 var sOption  = ``;

                 sOption += `<option value="0">Seleccionar</option>`;

                 aryLista.forEach(function (element, nIndex) {
                     sOption += `<option value="${element.nIdCliente}">${element.sNombreoRazonSocial}</option>`;
                 });

                 $(sHtmlTag).html(sOption);

            } else {
              toastr.error(aryData.error);
            }
       });
    }

    function fncCleanAllPS(){
        fncClearInputs( $("#formCEProspectoSimple").find("form") );
      
    }
   
    // llamadas al servidor 
    function fncGrabarPS(jsnData, fncCallback) {
        $.ajax({
            type: 'post',
            dataType: 'json',
            url: web_root + 'admin/prospecto/fncGrabarPS',
            data: jsnData,
            beforeSend: function() {
                fncMostrarLoader();
            },
            success: function(data) {
                fncCallback(data);
            },
            complete: function() {
                fncOcultarLoader();
            }
        });
    }    
</script>
<!-- Prospecto Simple -->




<!-- querys -->
<script>
    $(document).ready(function(){

        const queryString = window.location.search;
        const urlParams = new URLSearchParams(queryString);
        const query = urlParams.get('query');

        // console.log(query);

        if(query != null){
            switch(query){
                case 'rVentas' :
                    $("#btnReporteVentas").trigger("click");
                break;
                case 'rConsultor' :
                    $("#btnReporteConsultor").trigger("click");
                break;
                case 'rClientes': 
                    $("#btnBaseDatosClientes").trigger("click");
                break;
                case 'rEmpleados': 
                    $("#btnBaseDatosEmpleados").trigger("click");
                break;
                

            }
        }


    });
</script>
<!-- querys -->




</html>