
window.websocket;

$(document).ready(function () {

    websocket = new WebSocket(web_socket_js);

    websocket.onopen = function (event) {
        console.log('Connection is established!');
    }
    
    websocket.onmessage = function (event) {
        var aryData = JSON.parse(event.data);

        switch (aryData.type) {
            case "NOTIFICACION_VALIDACION_PROSPECTO":
                if (!is_admin && ($("body").data("nidempleado") == aryData.message.nIdEmpleado)) {
                    
                    var message = aryData.message;
                    
                    var sTexto = "Se aprobo el prospecto " + message.nIdProspectoFormat + " - Cliente:" + message.sCliente ;

                    Push.create("Genial se aprobo el prospecto!", {
                        body: sTexto,
                        icon: src('app/success.png'),
                        timeout: 4000,
                        onClick: function () {
                            window.focus();
                            this.close();
                        }
                    });
                    
                    if( typeof window.fncDrawProspectosForState !== "undefined" ){
                        fncDrawProspectosForState();
                    }
                }
                break;

           case "NUEVO_EMPLEADO":

                    // Si es administrador y existe  la funciion
                    if(is_admin === true && ($("body").data("nidnegocio") == aryData.message.nIdNegocio) && (typeof window.fncPopulateEmpleado !== "undefined" )) {
                       
                        var nIdNegocio = aryData.message.nIdNegocio;
                        
                        // Pintar los supervisores 
                        var jsnData = {
                            nIdNegocio    : nIdNegocio,
                            nTipoEmpleado : $("body").data("ntipoempleadosupervisor"),
                            nEstado       : 1 
                        };

                        fncPopulateEmpleado(jsnData, (aryData) => {

                            if(aryData.success){
                                
                                var aryData = aryData.aryData;
                                var sHtml   = ``;
                                var sOptions = `<option value="0">Seleccionar</option>`;

                                aryData.forEach(aryElemnt => {
                                    sHtml += `<div data-nidempleado="${aryElemnt.nIdEmpleado}" onclick="fncGetProspectosForEtapas(${aryElemnt.nIdEmpleado});" class="cuadrado fondo-${aryElemnt.sColorSuper.toLowerCase()} super"></div>`;
                                    sOptions += `<option value="${aryElemnt.nIdEmpleado}">${aryElemnt.sNombre}</option>`;
                                });

                                $("#content-supervisores").html(sHtml);
                                $("#nIdSupervisor").html(sOptions);

                            } else {
                                toastr.error(aryData.error);
                            }

                        }); 

                        // Pintar los  5 Ultimos asesores 

                        var jsnData = {
                            nIdNegocio    : nIdNegocio,
                            nTipoEmpleado : $("body").data("ntipoempleadoasesorventas"),
                            nEstado       : 1 ,
                            sLimit        : 5,
                            sOrderBy      : "emp.nIdEmpleado DESC"
                        };

                        fncPopulateEmpleado(jsnData, (aryData) => {

                            if(aryData.success){
                                
                                var aryData = aryData.aryData;
                                var sHtml   = ``;
 
                                aryData.forEach(aryElemnt => {
                                    sHtml += `<div data-nidempleado="${aryElemnt.nIdEmpleado}" onclick="fncVerEmpleado(${aryElemnt.nIdEmpleado});"  class="circulo-vendedor emp-indi" data-toggle="tooltip" data-placement="bottom" data-original-title="${aryElemnt.sNombre}"><span>${aryElemnt.sEmpleadoCorto}</span></div>`;
                                 });

                                $("#content-asesores").html(sHtml);

                                setTimeout(() => {
                                    $('[data-toggle="tooltip"]').tooltip();
                                }, 700);
 
                            } else {
                                toastr.error(aryData.error);
                            }

                        }); 


                        // Pintar los empleados del modal 

                        var jsnData = {
                            nIdNegocio    : nIdNegocio,
                            nTipoEmpleado : $("body").data("ntipoempleadoasesorventas"),
                            nEstado       : 1 
                    
                        };

                        fncPopulateEmpleado(jsnData, (aryData) => {

                            if(aryData.success){
                                
                                var aryData = aryData.aryData;
                                var sHtml   = ``;
 
                                aryData.forEach(aryElemnt => {
                                    sHtml += `
                                    <div class="col-12 col-md-6">
                                        <div class="card-colaborador">
                                            <div class="row no-gutters">
                                                <div class="col-3 flex-center">
                                                    <div class="circulo-vendedor" onclick="fncVerEmpleado(${aryElemnt.nIdEmpleado});" data-toggle="tooltip" data-placement="bottom" title="${fncUc(aryElemnt.sNombre)}">
                                                        <span>${ aryElemnt.sEmpleadoCorto.toUpperCase() }</span>
                                                    </div>
                                                </div>
                                                <div class="col-6 text-center">
                                                    <span>${fncUc(aryElemnt.sNombre)}</span>
                                                    <div class="w-100"></div>
                                                    <span class="font-14">${fncUc(aryElemnt.sTipoEmpleado)}</span>
                                                    <div class="w-100"></div>
                                                    <span class="font-13">${aryElemnt.sNombreNegocio.toUpperCase()}</span>
                                                </div>
                                                <div class="col-3">
                                                    <div class="cuadraro-supervisor fondo-${aryElemnt.sColorSuperEmpleado.toLowerCase()}"></div>
                                                    <span class="activo-hace">Activo hace ${aryElemnt.sUltimoAcceso}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                                 });

                                $("#content-all-empleados").html(sHtml);

                                setTimeout(() => {
                                    $('[data-toggle="tooltip"]').tooltip();
                                }, 700);
 
                            } else {
                                toastr.error(aryData.error);
                            }

                        }); 



                     

                     }
                    break;
        }
        console.log(aryData);
    };

    websocket.onerror = function (event) {
        console.error('error en socket ', event);
    };

    websocket.onclose = function (event) {
        console.error('Connection Closed ');
    };
});