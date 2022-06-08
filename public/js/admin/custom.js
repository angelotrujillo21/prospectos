//  FUNCIONES PARA LAS VISTAS  para custominzarf mejor las vistas

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

  fncEventFile();
});

// Para que ningun modal se pueda cerrar tiene que darle click en la X
$(document)
  .find(".modal")
  .each(function () {
    $(this).attr("data-backdrop", "static");
    $(this).attr("data-keyboard", "false");
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
      }, time, 'linear', function () {
        scroll();
      });
    }
  }

  b.css({
    'width': width,
    'left': start_pos
  });
  scroll(a, b);

  b.mouseenter(function () {     // Remove these lines
    b.stop();                 //
    b.clearQueue();           // if you don't want
  });                           //
  b.mouseleave(function () {     // marquee to pause
    scroll(a, b);             //
  });                           // on mouse over

}