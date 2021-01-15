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

  $('input[type="file"]').change(function () {
    var text =
      this.files.length > 1
        ? "Existen " + this.files.length + " archivos."
        : this.files[0].name;
    $(this).next().html(text);
  });
});

$(function () {
  setTimeout(function () {
    $(".page-loader").fadeOut();
  }, 500);
});

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

$.fn.alwaysChange = function (callback) {
  return this.filter('select').each(function () {
    var elem = this;
    var $this = $(this);

    $this.change(function () {
      callback($this.val());
    }).focus(function () {
      elem.selectedIndex = -1;
      elem.blur();
    });
  });
}

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
  $(sParentSelector).each(fncShowItemsHandler);
  $(sShowLessSelector).off();
  $(sShowLessSelector).on('click', showHideHandler);
}

window.showHideHandler = function () {

  if ($(this).data('action') === 'show') {
    $(this).text("Ver Menos");
    $(this).data('action', 'hide');
    $(this).closest(sParentSelector).children('.items').show();
  } else {
    $(this).text("Ver Todo");
    $(this).data('action', 'show');
    fncShowItemsHandler.bind($(this).closest(sParentSelector))();
  }

}

window.fncShowItemsHandler = function () {
  $(this).children(sShowItemsSelector).hide();
}

$("#dropdownMenuLink").on('click', function () {
  // Desactivamos los que ya vio
  if (parseInt($("#count-noti").html()) > 0) {

    var jsnData = {
      nIdNegocio: $("body").data("nidnegocio"),
      nEstado: 0
    };

    fncActualizarEstadoCambiosProspecto(jsnData, function (aryData) {
      if (aryData.success) {
        $("#count-noti").html("0");
        //toastr.success(aryData.success);
      } else {
        toastr.error(aryData.error);
      }
    });

  }
});


$("#btn-toogle-desktop").on('click', function () {
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


// Llamadas al servidor
function fncActualizarEstadoCambiosProspecto(jsnData, fncCallback) {
  $.ajax({
    type: 'post',
    dataType: 'json',
    url: web_root + 'admin/prospecto/fncActualizarEstadoCambiosProspecto',
    data: jsnData,
    beforeSend: function () {
      //fncMostrarLoader();
    },
    success: function (data) {
      fncCallback(data);
    },
    complete: function () {
      //fncOcultarLoader();
    }
  });
}
