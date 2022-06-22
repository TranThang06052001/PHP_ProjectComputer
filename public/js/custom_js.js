$(document).ready(() => {
  $(".btn-add-p").on("click", () => {
    if ($(".popup_add").hasClass("d-none")) {
      $(".popup_add").removeClass("d-none");
    }
  });
  $(".popup_add").on("click", () => {
    if (!$(".popup_add").hasClass("d-none")) {
      $(".popup_add").addClass("d-none");
    }
  });
  $(".form_add-d").on("click", (e) => {
    e.stopPropagation();
  });
});
