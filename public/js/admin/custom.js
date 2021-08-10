window.setTimeout(function () {
  $(".alert")
    .fadeTo(500, 0)
    .slideUp(500, function () {
      $(this).remove();
    });
}, 2000);

$(document).ready(function () {
  $(".menu-collap").on("click", function () {
    $(".main-sidebar").toggleClass("show");
  });

  $(document).on("show.bs.modal", ".modal", function (event) {
    var zIndex = 1040 + 10 * $(".modal:visible").length;
    $(this).css("z-index", zIndex);
    setTimeout(function () {
      $(".modal-backdrop")
        .not(".modal-stack")
        .css("z-index", zIndex - 1)
        .addClass("modal-stack");
    }, 0);
  });

  // $(document).on("hidden.bs.modal", function () {
  //   fncClearInputs( $(this).find("form") );
  //   fncRemoveDisabled($(this));
  // });

  fncEventFile();
});

function fncEventFile() {
  $('input[type="file"]').change(function () {
    var text =
      this.files.length > 1
        ? "Existen " + this.files.length + " archivos."
        : this.files[0].name;
    $(this).next().html(text);
  });
}

$(function () {
  setTimeout(function () {
    $(".page-loader").fadeOut();
  }, 500);
});

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
  $(".datepicker").datepicker();
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

$(document).ready(function () {
  $.fn.select2.defaults.set("theme", "bootstrap");
  $(".select2").select2();
});

$.datepicker.regional["es"] = {
  closeText: "Cerrar",
  prevText: "< Ant",
  nextText: "Sig >",
  currentText: "Hoy",
  monthNames: [
    "Enero",
    "Febrero",
    "Marzo",
    "Abril",
    "Mayo",
    "Junio",
    "Julio",
    "Agosto",
    "Septiembre",
    "Octubre",
    "Noviembre",
    "Diciembre",
  ],
  monthNamesShort: [
    "Ene",
    "Feb",
    "Mar",
    "Abr",
    "May",
    "Jun",
    "Jul",
    "Ago",
    "Sep",
    "Oct",
    "Nov",
    "Dic",
  ],
  dayNames: [
    "Domingo",
    "Lunes",
    "Martes",
    "Miércoles",
    "Jueves",
    "Viernes",
    "Sábado",
  ],
  dayNamesShort: ["Dom", "Lun", "Mar", "Mié", "Juv", "Vie", "Sáb"],
  dayNamesMin: ["Do", "Lu", "Ma", "Mi", "Ju", "Vi", "Sá"],
  weekHeader: "Sm",
  dateFormat: "dd/mm/yy",
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: "",
};
$.datepicker.setDefaults($.datepicker.regional["es"]);

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
  $(".content-password")
    .find(".btnToggleVisible")
    .on("click", function () {
      if ($(this).data("visible") == true) {
        $(this).find(".icon-view").show();
        $(this).find(".icon-slash").hide();
        $(this).parent().find(".input-password").attr("type", "text");
        $(this).data("visible", false);
      } else {
        $(this).find(".icon-view").hide();
        $(this).find(".icon-slash").show();
        $(this).parent().find(".input-password").attr("type", "password");
        $(this).data("visible", true);
      }

      $(this).parent().find(".input-password").focus();
    });
});

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

function fncCutText(texto, limite = 28) {
  var puntosSuspensivos = "...";
  if (texto.length > limite) {
    texto = texto.substring(0, limite) + puntosSuspensivos;
  }

  return texto;
}

function unique(value, index, self) {
  return self.indexOf(value) === index;
}

// extension:
$.fn.scrollEnd = function (callback, timeout) {
  $(this).on("scroll", function () {
    var $this = $(this);
    if ($this.data("scrollTimeout")) {
      clearTimeout($this.data("scrollTimeout"));
    }
    $this.data("scrollTimeout", setTimeout(callback, timeout));
  });
};



function marquee(a, b) {
  var width = b.width();
  var start_pos = a.width();
  var end_pos = -width;

  function scroll() {
      if (b.position().left <= -width) {
          b.css('left', start_pos);
          scroll();
      }
      else {
          time = (parseInt(b.position().left, 10) - end_pos) *
              (10000 / (start_pos - end_pos)); // Increase or decrease speed by changing value 10000
          b.animate({
              'left': -width
          }, time, 'linear', function() {
              scroll();
          });
      }
  }

  b.css({
      'width': width,
      'left': start_pos
  });
  scroll(a, b);
  
  b.mouseenter(function() {     // Remove these lines
      b.stop();                 //
      b.clearQueue();           // if you don't want
  });                           //
  b.mouseleave(function() {     // marquee to pause
      scroll(a, b);             //
  });                           // on mouse over
  
}

// $(".header-toggle").on("click", function () {
//   if ($(this).hasClass("collapsed")) {
//     $(".icon-up").hide();
//     $(".icon-down").show();
//   } else {
//     $(".icon-up").show();
//     $(".icon-down").hide();
//   }
// });

// Notificaciones

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

// Llamadas al servidor
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

// Fin de notificaciones
