/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!********************************!*\
  !*** ./resources/js/delete.js ***!
  \********************************/
$(function () {
  $('.delete').on('click', function () {
    var _this = this;
    Swal.fire({
      title: confirmDelete,
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Tak",
      cancelButtonText: "Nie"
    }).then(function (result) {
      if (result.value) {
        $.ajax({
          method: "DELETE",
          url: deleteURL + $(_this).data("id")
        }).done(function (data) {
          window.location.reload();
        }).fail(function (data) {
          Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
        });
      }
    });
  });
});
/******/ })()
;