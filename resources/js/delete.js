$(function() {
    $('.delete').on('click', function() {
        Swal.fire({
            title: confirmDelete,
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Tak",
            cancelButtonText: "Nie"
        }).then((result) => {
            if (result.value) {
                $.ajax({
                    method: "DELETE",
                    url: deleteURL + $(this).data("id")
                })
                .done(function(data) {
                    window.location.reload();
                })
                .fail(function(data) {
                    Swal.fire('Oops...', data.responseJSON.message, data.responseJSON.status);
                });
            }
        })
    });
});