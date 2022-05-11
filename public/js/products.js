$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(document).on("click", ".category-button", function () {
        $(".category_id").val($(this).val());
    });

    $(".save-product").click(function (e) {
        $("#status").val(this.value);
        $("#AddProductForm").submit();
    });

    $("#AddProductForm").submit(function (e) {
        e.preventDefault();
        var formData = new FormData(this);
        //disable submit buttons temporarily while the ajax perform query
        //this is to avoid multiple submission of the current product
        $('.publish-btn').prop('disabled', true);
        $.ajax({
            type: "POST",
            url: "/product/create",
            data: formData,
            dataType: "JSON",
            success: function (response) {

                $(".needs-validation input, .needs-validation textarea, .element-needs-validation").removeClass("border-danger");//remove red border from all elements that has following class

                $(".invalid-message").removeClass("active"); //remove active from all element that has class to hide the invalid message below it

                if (response["success"] === false) { //detect error
                    if (response["fieldRequiredError"] === true) {  //missing field error
                        for (const errorKeys in response["errors"]) {
                            $(response["errors"][errorKeys][0]).addClass("border-danger");
                            $(response["errors"][errorKeys][0]).nextAll(".invalid-message").addClass("active");
                            $(response["errors"][errorKeys][0]).parents(".form-input-wrapper").find(".invalid-message").addClass("active");
                        }
                    }
                    else if (response["sqlError"] === true) { //sql error

                        Swal.fire(
                            {
                                icon: "error",
                                title: "Oops",
                                html: `<strong>${response["errorCode"]}:</strong> Please contact the developer for support!`,
                            }
                        )
                        console.log(response["errorCode"]);
                    }
                    $('.publish-btn').prop('disabled', false);
                }
                /* else {
                    Swal.fire(
                        {
                            icon: "success",
                            title: "Saved",
                            text: "The product was saved successfully!"
                        }.then((result) => {
                           
                            if (result.isConfirmed) {
                                Swal.fire('Saved!', '', 'success')
                            } else if (result.isDenied) {
                                Swal.fire('Changes are not saved', '', 'info')
                            }
                        })
                    )
                } */
                else {
                    location.reload();
                }
            }, error: (xhr, status, error) => {
                console.error(error);
                console.warn(xhr);
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
});