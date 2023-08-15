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
