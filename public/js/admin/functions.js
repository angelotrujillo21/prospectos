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
        case "select-one":
        case "select-multiple":
          $(this).val(0);
          break;
        case "file":
          $(this)
            .parent()
            .find(".custom-file-label")
            .html("Selecciona un archivo");
          break;
        case "password":
        case "text":
        case "textarea":
          $(this).val("");
          break;
        case "checkbox":
        case "radio":
          this.checked = bFlag;
      }
    });
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
