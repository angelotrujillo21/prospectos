function fncOcultarLoader() {
  $(".page-loader").fadeOut();
}

function fncMostrarLoader() {
  $(".page-loader").fadeIn();
}

function fncClearInputs(sHtmlTag, bFlag = false) {
  $(sHtmlTag)
    .find(":input")
    .each(function () {
      switch (this.type) {
        case "number":
          if (this.name.substring(0, 9) == "nCantidad") {
            $(this).val(1);
          } else {
            $(this).val(0);
          }

          break;
        case "select-one":
        case "select-multiple":
          if (this.name.substring(0, 7) == "nEstado") {
            $(this).val(1);
          } else {
            $(this).val(0);
          }
          break;
        case "file":
          $(this).val("");
          var attr = $(this).attr("multiple");
          if (typeof attr !== typeof undefined && attr !== false) {
            $(this)
              .parent()
              .find(".custom-file-label")
              .html("Seleccione los archivos");
          } else {
            $(this)
              .parent()
              .find(".custom-file-label")
              .html("Selecciona un archivo");
          }
          break;
        case "password":
        case "text":
        case "email":
        case "date":
        case "time":
        case "tel":
        case "textarea":
          $(this).val("");
          break;
        case "checkbox":
        case "radio":
          this.checked = bFlag;
      }
    });
}

function fncAddDisabled(sHtmlTag, bFlag = false) {
  $(sHtmlTag)
    .find(".modal-body")
    .find(":input")
    .each(function () {
      $(this).attr("disabled", "disabled");
    });

  $(sHtmlTag)
    .find(".modal-footer")
    .find(":input")
    .each(function () {
      $(this).attr("disabled", "disabled");
    });
}

function fncRemoveDisabled(sHtmlTag, bFlag = false) {
  $(sHtmlTag)
    .find(":input")
    .each(function () {
      $(this).removeAttr("disabled");
    });
}

function fncViewForm(sHtmlTag, sTitle) {
  $(sHtmlTag).find(".modal-dialog").find(".modal-title").html(sTitle);
  fncAddDisabled(sHtmlTag);
}

function fncEditForm(sHtmlTag, sTitle) {
  $(sHtmlTag).find(".modal-dialog").find(".modal-title").html(sTitle);
  fncRemoveDisabled(sHtmlTag);
}

// Cambia el MaxLength para un text or txtarea según el tipo de documento
function fncMaxLengthTypeDocument(sTypeDocument, sHtmlTag) {
  if (sTypeDocument.indexOf("RUC") >= 0) {
    $(sHtmlTag).prop("maxlength", "11");
  } else if (sTypeDocument.indexOf("DNI") >= 0) {
    $(sHtmlTag).prop("maxlength", "8");
  } else if (
    sTypeDocument.indexOf("EXT") >= 0 ||
    sTypeDocument.indexOf("PAS") >= 0
  ) {
    $(sHtmlTag).prop("maxlength", "12");
  } else {
    $(sHtmlTag).prop("maxlength", "15");
  }
}

function src(path = "") {
  return web_root_resource + "images/" + path;
}

function docs(path = "") {
  return web_root_resource + "docs/" + path;
}

function route(path = "") {
  return web_root + path;
}

function copyToClipboard(sHtmlTag) {
  var copyText = document.getElementById(sHtmlTag);
  copyText.select();
  copyText.setSelectionRange(0, 99999);
  document.execCommand("copy");
}

function fncValidateEmail(sString) {
  if (
    /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
      sString
    )
  ) {
    // Email correcto
    return true;
  }
  return false;
}

function fncNf(sInput) {
  return parseFloat(sInput).toFixed(2);
}

function fncUc(str) {
  var str = str.toLowerCase().replace(/\b[a-z]/g, function (letter) {
    return letter.toUpperCase();
  });
  return str;
}

window.fncOcultarAside = function () {
  //console.log("ocularaside");
  var mq = window.matchMedia( "(max-width: 768px)" );
  if (mq.matches) {
    // console.log("mobile");
    //el ancho de la ventana es inferior a 570 px
  } else {
    // el ancho de la ventana es mayor que 570px
   // console.log("desktop");
    if (!$(".main-sidebar").hasClass("d-none")) {
       $("#btn-toogle-desktop").trigger("click");
    }
  }
};




function fncBuildForm(aryData) {
  let sHtml = ``;
  if (aryData.length > 0) {
    $.each(aryData, function (nKeyItem, aryItem) {
      var sNameorId = aryItem.sNombre + "-" + aryItem.nIdEntidad;

      sHtml += `<div id="content-${aryItem.sNombre}-${aryItem.nIdEntidad}" class="col-12 col-md-${aryItem.nTamano}">`;
      sHtml += `<div class="form-group">`;
      sHtml += `<label for="${sNameorId}" class="col-form-label">${aryItem.sNombreUsuario}</label>`;

      switch (aryItem.sNombreTipoCampo) {
        case "text":
        case "tel":
        case "date":
          sHtml += `<input type="${aryItem.sNombreTipoCampo}" autocomplete="off" placeholder="${aryItem.sPlaceHolder}" class="form-control" name="${sNameorId}" id="${sNameorId}">`;
          break;
        case "select":
          switch (aryItem.sNombreConfig) {
            case "CONDICIONAL":
              sHtml += `<select class="form-control" name="${sNameorId}" id="${sNameorId}">
                          <option value="1">SI</option>
                          <option value="0">NO</option>
                      </select>`;
              break;
            case "ESTADO":
              sHtml += `<select class="form-control" name="${sNameorId}" id="${sNameorId}">
                            <option value="1">ACTIVO</option>
                            <option value="0">DESACTIVO</option>
                        </select>`;
              break;

            case "UBIGEO_DEPARTAMENTO":
              if (aryItem.aryLista.length > 0) {
                sHtml += `<select class="form-control" name="${sNameorId}" id="${sNameorId}">`;
                sHtml += `<option value="0">SELECCIONAR</option>`;
                aryItem.aryLista.forEach((aryItemLista) => {
                  sHtml += `<option value="${aryItemLista.nIdDepartamento}">${aryItemLista.sNombre}</option>`;
                });
                sHtml += `</select>`;
              }
              break;

            case "UBIGEO_PROVINCIA":
            case "UBIGEO_DISTRITO":
              sHtml += `<select class="form-control" name="${sNameorId}" id="${sNameorId}">
                          <option value="0">SELECCIONAR</option>
                        </select>`;
              break;

            default:
              if (aryItem.aryLista.length > 0) {
                sHtml += `<select class="form-control" name="${sNameorId}" id="${sNameorId}">`;
                sHtml += `<option value="0">SELECCIONAR</option>`;

                aryItem.aryLista.forEach((aryItemLista) => {
                  sHtml += `<option value="${aryItemLista.nIdCatalogoTabla}">${aryItem.sNombre == "nTipoDocumento"
                      ? aryItemLista.sDescripcionCortaItem
                      : aryItemLista.sDescripcionLargaItem
                    }</option>`;
                });
                sHtml += `</select>`;
              }
              break;
          }

          break;
        case "textarea":
          sHtml += `<textarea name="${sNameorId}" id="${sNameorId}" cols="20" rows="5" class="form-control" autocomplete="off"></textarea>`;
          break;

        case "file":

          var sAccept = aryItem.sNombre == 'sImagen' ? 'image/*' : '*';

          sHtml += `
          
              <div class="input-group">
                  <div class="custom-file">
                      <input type="file" class="custom-file-input" id="${sNameorId}" accept="${sAccept}" name="${sNameorId}" lang="es">
                      <label class="custom-file-label" for="${sNameorId}">Selecciona un archivo</label>
                  </div>
              </div>
          
          `;
          sHtml += `<small>${aryItem.sPlaceHolder}</small>`;

          break;  
      }

      sHtml += `</div>`;
      sHtml += `</div>`;
    });
  }
  return sHtml;
}

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
                                              <p class="m-0 font-16">${aryItem.sWidget}  : 
                                                <a id="btnVerDetallesCliente" href="javascript:;"><i class="far fa-eye"></i></a> 
                                                <a id="btnVerHistorial" href="javascript:;"><i class="fas fa-history"></i></a> 
                                                <a id="btnEditarCliente" href="javascript:;"><i class="fas fa-edit"></i></a> 
                                              </p>
                                          </div>
                                          <div class="bd-highlight">
                                            <a class="color-azul font-16" id="btnCrearCliente" href="javascript:;" ><i class="fas fa-plus-circle"></i></a>
                                            <a class="color-azul link-drop collapsed" data-toggle="collapse" href="#content-cliente" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                          </div>
                                      </div>
                                  </div>
                                  <div id="content-cliente" class="col-12 my-2 collapse show">
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

                                              <a class="color-azul font-16" id="btnAgregarCatalogo" href="javascript:;" ><i class="fas fa-plus-circle"></i></a>
                                              <a class="color-azul link-drop collapsed" data-toggle="collapse" href="#content-catalogo-tablas" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                          </div>
                                      </div>
                                  </div>

                                  <div id="content-catalogo-tablas" class="w-100  collapse show">
                                    <div class="col-12 my-2 p-0">
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

                                    <div class="col-12 my-2 p-0">
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
                                              <div class="ml-auto">
                                                <a class="color-azul link-drop collapsed" data-toggle="collapse" href="#c${aryItem.sWidget}" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                              </div>
                                          </div>
                                      </div>
                                      <div id="c${aryItem.sWidget}" class="col-12 my-2 collapse show"> `;
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
                                                <a class="color-azul font-16" id="btnCrearActividad" href="javascript:;" ><i class="fas fa-plus-circle"></i></a>  
                                                <a class="color-azul link-drop" data-toggle="collapse" href="#content-actividades" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                              </div>
                                          </div>
                                      </div>
                                      <div id="content-actividades" class="col-12 my-2 content-actividades collapse show">
                                          
                                      
                                          
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
                                                  <div class="ml-auto">
                                                    <a class="color-azul link-drop" data-toggle="collapse" href="#c-notas" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                                  </div>
                                              </div>
                                          </div>

                                          <div id="c-notas" class=" collapse show w-100">
                                            <div class="col-12 mx-0 p-0">
                                                <div id="content-notas" class="row no-gutters w-100 content"></div>
                                            </div>

                                            <div class="col-12 mx-0 p-0">
                                                <textarea data-stext="" class="form-control d-block my-2" placeholder="Escribe una nueva nota.." name="sNota" id="sNota" cols="2" rows="2"></textarea>
                                            </div>
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
                                      <div class="ml-auto">
                                        <a class="color-azul link-drop" data-toggle="collapse" href="#c${aryItem.sWidgetSystem}" role="button" aria-expanded="false"><i class="fas fa-caret-down"></i></a>
                                      </div>
                                  </div>
                              </div>
                              <div id="c${aryItem.sWidgetSystem}" class="col-12 my-2 collapsed show">`;

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

function fncDrawTextArea(sNameorId, sPlaceHolder = "", sClass = "form-control", nRequerido = 0, cols = "2", rows = "2") {
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


