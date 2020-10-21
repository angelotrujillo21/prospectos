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
  //   $(this).find(".modal-body").find("form")[0].trigger("reset");
  //   $(this).find(".modal-body").find("form")[0].find(".custom-file-label").html("Elija el archivo");
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

$.datepicker.regional['es'] = {
  closeText: 'Cerrar',
  prevText: '< Ant',
  nextText: 'Sig >',
  currentText: 'Hoy',
  monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
  monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'],
  dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
  dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié', 'Juv', 'Vie', 'Sáb'],
  dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
  weekHeader: 'Sm',
  dateFormat: 'dd/mm/yy',
  firstDay: 1,
  isRTL: false,
  showMonthAfterYear: false,
  yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
