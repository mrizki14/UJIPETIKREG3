$(document).on("click", "#sidebar li", function () {
  $(this).addClass("active").siblings().removeClass("active");
  $(this).addClass("logout").siblings().removeClass("logout");
});

$(".sub-menu ul").hide();
$(".sub-menu a").click(function () {
  $(this).parent(".sub-menu").children("ul").slideToggle("100");
  $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
});

$(document).ready(function () {
  $("#toogleSidebar").click(function () {
    $(".left-menu").toggleClass("hide");
    $(".content-wrapper").toggleClass("hide");
  });
});

$("#example").DataTable();

// $(document).ready(function () {
//   $('.odp-form').on('submit', function (e) {
//       e.preventDefault();
      
//       var form = $(this);
//       var odp = form.find('input[name="odp"]').data('odp');
      
//       $.ajax({
//           url: form.attr('action'),
//           type: form.attr('method'),
//           data: form.serialize(),
//           success: function () {
//               var flashMessage = $('<div class="alert alert-success" data-odp="' + odp + '">Form dengan ODP ' + odp + ' berhasil dikirim.</div>');
//               $('#flash-messages').append(flashMessage);
              
//               form.trigger('reset');
//           },
//           error: function () {
//               alert('Terjadi kesalahan saat mengirim form.');
//           }
//       });
//   });
// });
