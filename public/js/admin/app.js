/** LOGICA JS PARA LA APP SIEMPRE Y CUANDO SE LOGUEEN */
$("#dropdownMenuLink").on("click", function () {
  var aryIds = [];

  $("#content-noti")
    .find(".items")
    .each(function () {
      aryIds.push($(this).data("id"));
    });

  if (aryIds.length > 0) {
    var jsnData = {
      aryIds: aryIds,
      nEstado: 0,
    };

    fncActualizarEstadoCambiosProspecto(jsnData, (aryData) => {
      if (aryData.success) {
        console.log("se vieron todos los cambios");
      } else {
        toastr.error(aryData.error);
      }
    });
  }
});

window.fncDrawNotificaciones = (bShowLoader = true) => {
  
  var jsnData = {
    nIdNegocio: $("body").data("nidnegocio"),
  };

  fncObtenerCambiosForAdmin(jsnData, bShowLoader, (aryData) => {
    if (aryData.success) {
      var sHtml = ``;
      var aryData = aryData.aryData;

      $("#count-noti").html(aryData.length);

      if (aryData.length > 0) {
        aryData.forEach((aryElement) => {
          sHtml += `
                    <a data-id="${aryElement.nIdCambio}" class="dropdown-item items" href="javascript:;">
                      <div class="notification__icon-wrapper">
                          <div class="notification__icon">
                              <i class="material-icons">message</i>
                          </div>
                      </div>
                      <div class="notification__content">
                          <span class="notification__category">${aryElement.sCliente} - ${aryElement.sEmpleado}</span>
                          <p>${aryElement.sCambio} -  ${aryElement.dFechaCreacion}</p>
                      </div>
                    </a>`;
        });

        $("#content-noti").html(sHtml);
      }
    } else {
      toastr.error(aryData.error);
    }
  });
};

$(document).ready(function () {
  if (typeof $("body").data("nidnegocio") != "undefined") {
    fncDrawNotificaciones(false);
  }
});

function fncActualizarEstadoCambiosProspecto(jsnData, fncCallback) {
  $.ajax({
    type: "post",
    dataType: "json",
    url: web_root + "admin/prospecto/fncActualizarEstadoCambiosProspecto",
    data: jsnData,
    beforeSend: function () {
      //fncMostrarLoader();
    },
    success: function (data) {
      fncCallback(data);
    },
    complete: function () {
      //fncOcultarLoader();
    },
  });
}

function fncObtenerCambiosForAdmin(jsnData, bShowLoader = true, fncCallback) {
  $.ajax({
    type: "post",
    dataType: "json",
    url: web_root + "admin/prospecto/fncObtenerCambiosForAdmin",
    data: jsnData,
    beforeSend: function () {
      if (bShowLoader) fncMostrarLoader();
    },
    success: function (data) {
      fncCallback(data);
    },
    complete: function () {
      if (bShowLoader) fncOcultarLoader();
    },
  });
}

function fncCollap() {
  $(".collap").off();
  $(".collap").on("click", function () {
    //$(this).slideToggle(300);
    $(this).find("i").toggleClass("fa-caret-down fa-caret-up");
  });
}

fncCollap();

$("#btn-toogle-desktop").on("click", function () {
  if ($("aside").hasClass("d-none")) {
    // Oculto
    $("aside").removeClass("d-none");
    $("main").removeClass("col-md-12");

    $("main").addClass("col-lg-10");
    $("main").addClass("col-md-9");
    $("main").addClass("offset-lg-2");
    $("main").addClass("offset-md-3");
  } else {
    $("main").removeClass("col-lg-10");
    $("main").removeClass("col-md-9");
    $("main").removeClass("offset-lg-2");
    $("main").removeClass("offset-md-3");

    $("main").addClass("col-md-12");
    $("aside").addClass("d-none");
  }
});

window.sParentSelector = "div.content";
window.sShowItemsSelector = ".items:gt(2)";
window.sShowLessSelector = ".ShowMore,.ShowLess";

window.fncEventListenerShowMoreLess = function () {
  $(sShowLessSelector).each(function () {
    // console.log($(this).data("action"));
    if ($(this).data("action") != "hide") {
      $(this).parent().parent().each(fncShowItemsHandler);
      $(this).off();
      $(this).on("click", showHideHandler);
    } else {
      $(this).off();
      $(this).on("click", showHideHandler);
    }
  });
};

window.showHideHandler = function () {
  if ($(this).data("action") === "show") {
    $(this).text("Ver Menos");
    $(this).data("action", "hide");
    $(this).closest(sParentSelector).children(".items").show();
  } else {
    $(this).text("Ver Todo");
    $(this).data("action", "show");
    fncShowItemsHandler.bind($(this).closest(sParentSelector))();
  }
};

window.fncShowItemsHandler = function () {
  $(this).children(sShowItemsSelector).hide();
};

$(document).ready(function () {
  if (typeof $.fn.select2 != "undefined") {
    $.fn.select2.defaults.set("theme", "bootstrap");
    $(".select2").select2();
  }
});


$.fn.alwaysChange = function (callback) {
    return this.filter("select").each(function () {
      var elem = this;
      var $this = $(this);
  
      $this
        .change(function () {
          callback($this.val());
        })
        .focus(function () {
          elem.selectedIndex = -1;
          elem.blur();
        });
    });
  };