$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".category-button", function () {
        $(".category_id").val($(this).val());
    });


    /* $("#AddProductForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/product/create",
            data: formData,
            dataType: "TEXT",
            success: function (response) {
                console.log(response);
            }, error: (xhr, status, error) => {
                console.error(error);
                console.warn(xhr);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    }); */
});