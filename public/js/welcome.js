/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*********************************!*\
  !*** ./resources/js/welcome.js ***!
  \*********************************/
$(function () {
  $('div.products-count').on('click', 'a', function (event) {
    event.preventDefault();
    $('a.products-actual-count').text($(this).text().trim());
    getProducts($(this).text().trim());
  });
  $(document).on('click', 'a#filter-button', function (event) {
    event.preventDefault();
    getProducts($('a.products-actual-count').first().text().trim());
  });
  function getProducts(paginate) {
    console.log('getProducts called with paginate:', paginate);
    var form = $('form.sidebar-filter').serialize();
    $.ajax({
      method: "GET",
      url: "/",
      data: form + "&" + $.param({
        paginate: paginate
      })
    }).done(function (response) {
      $('div#products-wrapper').html('');
      if (response.data) {
        $('div#products-wrapper').html($.map(response.data, function (product) {
          return '<div class="col-6 col-md-6 col-lg-4 mb-3">' + '<div class="card h-100 border-0">' + '<div class="card-img-top">' + '<img src="' + getImage(product) + '" class="img-fluid mx-auto d-block" alt="Zdjęcie produktu">' + '</div>' + '<div class="card-body text-center">' + '<h4 class="card-title">' + product.name + '</h4>' + '<h5 class="card-price small">' + '<i>PLN ' + product.price + '</i>' + '</h5>' + '</div>' + '</div>' + '</div>';
        }));
      }
    });
  }
  function getImage(product) {
    if (!!product.image_path) {
      return storagePath + product.image_path;
    }
    return defaultImage;
  }
});
/******/ })()
;