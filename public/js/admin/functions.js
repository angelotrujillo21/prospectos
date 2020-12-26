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
          $(this)
            .parent()
            .find(".custom-file-label")
            .html("Selecciona un archivo");
          break;
        case "password":
        case "text":
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
  if (sTypeDocument.indexOf('RUC') >= 0) {
    $(sHtmlTag).prop('maxlength', '11');
  } else if (sTypeDocument.indexOf('DNI') >= 0) {
    $(sHtmlTag).prop('maxlength', '8');
  } else if (sTypeDocument.indexOf('EXT') >= 0 || sTypeDocument.indexOf('PAS') >= 0) {
    $(sHtmlTag).prop('maxlength', '12');
  } else {
    $(sHtmlTag).prop('maxlength', '15');
  }

}


function src(path = "") {
  return web_root_resource + "images/" + path;
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

  if (/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(sString)) {
    // Email correcto
    return true;
  }
  return false;

}

function fncNf(sInput) {
  return parseFloat(sInput).toFixed(2);
}

function fncBuildForm(aryData) {
  let sHtml = ``;
  if (aryData.length > 0) {

    $.each(aryData, function (nKeyItem, aryItem) {

      var sNameorId = aryItem.sNombre + '-' + aryItem.nIdEntidad;

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
                aryItem.aryLista.forEach(aryItemLista => {
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

                aryItem.aryLista.forEach(aryItemLista => {
                  sHtml += `<option value="${aryItemLista.nIdCatalogoTabla}">${(aryItem.sNombre == 'nTipoDocumento' ? aryItemLista.sDescripcionCortaItem : aryItemLista.sDescripcionLargaItem)}</option>`;
                });
                sHtml += `</select>`;
              }
              break;
          }

          break;
        case "textarea":
          sHtml += `<textarea name="${sNameorId}" id="${sNameorId}" cols="20" rows="5" class="form-control" autocomplete="off"></textarea>`;
          break;
      }

      sHtml += `</div>`;
      sHtml += `</div>`;





    });


  }
  return sHtml
}
