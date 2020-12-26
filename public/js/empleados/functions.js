$(document).ready(function () {
    $("input").focus(function () {
        $("#menu-bottom").hide();
    });

    $("input").blur(function () {
        $("#menu-bottom").show();
    });
});

function fncBuildFormPro(aryData) {
    let sHtml = ``;
    let aryDataExtra = [];
    if (aryData.length > 0) {
        $.each(aryData, function (nKeyItem, aryItem) {

            if (aryItem.nDefault == 1) {
                switch (aryItem.sWidgetSystem) {
                    case "CLIENTE":
                        sHtml += `
                            <div class="col-12 col-md-12 mb-4">
                                <div class="row no-gutters border-card p-2">
                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <p class="m-0 font-16">${aryItem.sWidget}  :</p>
                                            </div>
                                            <div class="bd-highlight">
                                                <button type="button" id="btnCrearCliente" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 my-2">
                                        ${fncDrawSelect(aryItem.aryLista, "nIdCliente", "nIdCliente", "sNombreoRazonSocial")}
                                    </div>
                                </div>
                            </div>`;
                        break;
                    case "CATALOGO":

                        // Opciones para el formulario de catalogo
                        if (aryItem.aryLista.length > 0) {
                            var sOption = ``;
                            sOption += `<option value="0">SELECCIONAR</option>`;
                            aryItem.aryLista.forEach(function (element, nIndex) {
                                sOption += `<option data-nprecio="${element.nPrecio}" data-ntipoitem="${element.nTipoItem}" value="${element.nIdCatalogo}">${element.sNombre}</option>`;
                            });
                            $("#nIdCatalogo").html(sOption);
                        }

                        // Fin de formulario de catalogo

                        sHtml += `
                            <div class="col-12 col-md-12 mb-4">
                                <div class="row no-gutters border-card p-2">

                                    <div class="col-12">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 bd-highlight">
                                                <p class="m-0 font-16">${aryItem.sWidget}  :</p>
                                            </div>
                                            <div class="bd-highlight">
                                                <button type="button" id="btnAgregarCatalogo" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                    <i class="fas fa-plus-circle"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="col-12 my-2">
                                        <div class="table-responsive">
                                            <table id="table-servicios"  class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Accion</th>
                                                        <th>Serv</th>
                                                        <th>Cst.Uni</th>
                                                        <th>Cant</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <td class="text-center" colspan="3">Total</td>
                                                        <td class="cantidad-total text-center">0.00</td>
                                                        <td class="total text-center">0.00</td>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="col-12 my-2">
                                     <div class="table-responsive">
                                        <table id="table-productos" class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th>Accion</th>
                                                    <th>Prod</th>
                                                    <th>Cst.Uni</th>
                                                    <th>Cant</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td class="text-center" colspan="3">Total</td>
                                                    <td class="cantidad-total text-center">0.00</td>
                                                    <td class="total text-center">0.00</td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                     </div>
                                    </div>
                                </div>
                            </div>

                            `;
                        break;
                    case "SEGMENTACION":
                    case "SEGMENTACION_COMPETENCIA":

                        sHtml += `<div class="col-12 col-md-6 mb-4 ">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">${aryItem.sWidget} :</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 my-2"> `;
                        aryItem.aryLista.forEach((element) => {

                            sHtml += `  <div class="form-group content-segmetacion">
                                            <label data-nidsegmentacion="${element.nIdSegmentacion}" for="nIdDetalleSegmentacion-${element.nIdSegmentacion}">${element.sNombre}</label>
                                            ${fncDrawSelect(element.aryDetalle, "nIdDetalleSegmentacion-" + element.nIdSegmentacion, "nIdDetalleSegmentacion", "sNombre")}
                                        </div> `;
                        });
                        sHtml += `</div></div></div>`;

                        break;
                    case "ACTIVIDADES":
                        sHtml += `
                                <div class="col-12 col-md-12 mb-4">
                                    <div class="row no-gutters border-card p-2">
                                        <div class="col-12">
                                            <div class="d-flex align-items-center">
                                                <div class="flex-grow-1 bd-highlight">
                                                    <p class="m-0 font-16">${aryItem.sWidget}  :</p>
                                                </div>
                                                <div class="bd-highlight">
                                                    <button type="button" id="btnCrearActividad" class="btn btn-gradient-primary btn-rounded btn-icon">
                                                        <i class="fas fa-plus-circle"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="content-actividades" class="col-12 my-2 content-actividades">
                                            
                                        
                                            
                                        </div>
                                    </div>
                                </div>`;
                        break;
                    case "NOTAS":
                        sHtml += `
                                    <div class="col-12 col-md-12 mb-4">
                                        <div class="row no-gutters border-card p-2">
                                            <div class="col-12">
                                                <div class="d-flex align-items-center">
                                                    <div class="flex-grow-1 bd-highlight">
                                                        <p class="m-0 font-16">${aryItem.sWidget} :</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div id="content-notas" class="row no-gutters w-100 content"></div>
                                            </div>

                                            <div class="col-12">
                                                <textarea class="form-control d-block my-2" placeholder="Escribe una nueva nota.." name="sNota" id="sNota" cols="2" rows="2"></textarea>
                                            </div>
                                        </div>
                                    </div>`;

                        break;
                }
            } else {

                sHtml += ` <div class="col-12 col-md-12 mb-4">
                            <div class="row no-gutters border-card p-2">
                                <div class="col-12">
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1 bd-highlight">
                                            <p class="m-0 font-16">${aryItem.sWidget}  :</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 my-2">`;

                switch (aryItem.sTipoCampoSystem) {

                    case "text":
                    case "tel":
                    case "date":
                        sHtml += `${fncDrawInput(aryItem.sWidgetSystem, aryItem.sTipoCampoSystem, aryItem.sPlaceHolder, "form-control control-extra", aryItem.nRequerido)}`;
                        break;

                    case "select":
                        sHtml += `${fncDrawSelect(aryItem.aryLista, aryItem.sWidgetSystem, "", "", true, "form-control control-extra", aryItem.nRequerido)}`;
                        break;

                    case "radio":
                        sHtml += `${fncDrawRadio(aryItem.aryLista, aryItem.sWidgetSystem, aryItem.nRequerido, "control-extra")}`;
                        break;
                    case "textarea":
                        sHtml += `${fncDrawTextArea(aryItem.sWidgetSystem, aryItem.sPlaceHolder, "form-control control-extra", aryItem.nRequerido)}`;
                        break;

                }

                sHtml += `</div></div></div>`;

                aryDataExtra.push({
                    sTipoCampoSystem: aryItem.sTipoCampoSystem,
                    sWidgetSystem: aryItem.sWidgetSystem,
                    nRequerido: aryItem.nRequerido,
                    sWidget: aryItem.sWidget
                });

            }
        });
        $("#formProspecto").data("aryDataExtra", aryDataExtra);
    }
    return sHtml;
}

function fncDrawSelect(aryLista, sNameorId, sItemValue, sItemOption, nEstatusItemOne = true, sClass = "form-control", nRequerido = 0) {
    sHtml = ``;
    sHtml += `<select name="${sNameorId}" class="${sClass}" id="${sNameorId}" data-nrequerido="${nRequerido}">`;
    sHtml += nEstatusItemOne ? `<option value="0">Seleccionar</option>` : ``;
    if (aryLista.length > 0) {
        aryLista.forEach((element) => {
            sHtml += `<option value="${sItemValue == "" ? element : element[sItemValue]}">${sItemOption == "" ? element : element[sItemOption]}</option>`;
        });
    }
    sHtml += `</select>`;
    return sHtml;
}

function fncDrawInput(sNameorId, sType, sPlaceHolder = "", sClass = "form-control", nRequerido = 0) {
    sHtml = `<input type="${sType}" placeholder="${sPlaceHolder}" id="${sNameorId}" name="${sNameorId}"  class="${sClass}" autocomplete="off" data-nrequerido="${nRequerido}" />`;
    return sHtml;
}

function fncDrawTextArea(sNameorId, sPlaceHolder = "", sClass = "form-control", nRequerido = 0 ,cols = "2", rows="2" ) {
    sHtml = `<textarea rows="${rows}" cols="${cols}" placeholder="${sPlaceHolder}" id="${sNameorId}" name="${sNameorId}"  class="${sClass}" data-nrequerido="${nRequerido}"></textarea>`;
    return sHtml;
}

function fncDrawRadio(aryLista, sNameorId, nRequerido = 0, sClassExtra = "") {
    sHtml = ``;
    if (aryLista.length > 0) {
        aryLista.forEach(function (element, nIndex) {

            sHtml += `<div class="custom-control custom-radio">
                        <input data-nrequerido="${nRequerido}" type="radio" id="${sNameorId}-${nIndex}" name="${sNameorId}" value="${element}" class="custom-control-input ${sClassExtra}">
                        <label class="custom-control-label ml-label-radio w-100" for="${sNameorId}-${nIndex}">${element}</label>
                    </div>`;
        });
    }
    return sHtml;
}


function fncUc(str){
    var str = str.toLowerCase().replace(/\b[a-z]/g, function(letter) {
        return letter.toUpperCase();
    });
    return str;
}