


$('#we_use_cookies_btn_accept').click(function () {
    var cookieAgreement = 2;
    $.ajax({
        type: "GET",
        url: "/cookieagreement",
        data: {cookieAgreement: cookieAgreement},
        success: function (data) {
            $('#we_use_cookies').slideUp("slow");
        }
    });
});


$("#field_price_min").on("change paste keyup", function () {
    value = $(this).val();
    if (isNaN(value)) {
        new_val = value.slice(0, -1);
        $('#field_price_min').val(new_val);
    }
});

$("#field_price_max").on("change paste keyup", function () {
    value = $(this).val();
    if (isNaN(value)) {
        new_val = value.slice(0, -1);
        $('#field_price_max').val(new_val);
    }
});

$("#add_car_price_field").on("change paste keyup", function () {
    if (event.which >= 37 && event.which <= 40)
        return;
    $(this).val(function (index, value) {
        return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});

$("#car_year_input_field").on("change paste keyup", function () {
    value = $(this).val();
    if (isNaN(value)) {
        new_val = value.slice(0, -1);
        $('#car_year_input_field').val(new_val);
    }
});


$('#ShowMoreOptionsBTN').on('click', function () {
    $('#moreOptionsContainer').slideDown("slow");
    $('#ShowLessOptionsBTN').toggle("fast");
    $('#ShowMoreOptionsBTN').toggle("fast");
});

$('#ShowLessOptionsBTN').on('click', function () {
    $('#moreOptionsContainer').slideUp("slow");
    $('#ShowLessOptionsBTN').toggle("fast");
    $('#ShowMoreOptionsBTN').toggle("fast");
});

$('#step-2').hide("");
$('#step-3').hide("");
$('#step-4').hide("");
$('#step-5').hide("");
$('#step-6').hide("");
$('#checkBox_for_cars_language_english').prop('checked', true);



$('#next_btn_first').click(function () {
    var value = $('#dropdownMenu1').val();
    var value2 = $('#dropdownMenu2').val();
    var value3 = $('#car_location_input').val();

    if (value == "") {
        swal("", "Select Car Make", "error");
    } else if (value2 == "") {
        swal("", "Select Car Model", "error");
    } else if (value3 == "") {
        swal("", "Select Car Location", "error");
    } else {
        $('#step-2').show("");
        $('#step-1').hide("");
        $('#step_1_circle').removeClass();
        $('#step_1_circle').addClass("btn btn-default btn-circle");
        $('#step_2_circle').removeClass();
        $('#step_2_circle').addClass("btn btn-default btn-circle btn-danger");
        $("#step_2_circle").removeAttr("disabled");
        $('html, body').animate({
            scrollTop: $("#top_head_scrolling").offset().top
        }, 500);
    }
});


$('#next_btn_second').click(function () {
    var name_val = $('#cars-name').val();
    var title_val = $('#cars-title').val();
    var price_val = $('#add_car_price_field').val();
    var year_val = $('#car_year_input_field').val();
    var milage_val = $('#dropdown_milage_input').val();
    var body_type_val = $('#dropdown_body_type').val();
    var interior_type_val = $('#dropdown_interior_type').val();
    var engine_type_val = $('#dropdown_engine_type').val();
    var exterior_color_val = $('#dropdown_exterior_color_type').val();
    var interior_color_val = $('#dropdown_interior_color_type').val();
    if (name_val === "") {
        $('#cars-name').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#step-2").offset().top
        }, 500);
    } else if (title_val === "") {
        $('#cars-title').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#step-2").offset().top
        }, 500);
    } else if (price_val === "") {
        $('#add_car_price_field').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#cars-title").offset().top
        }, 500);
    } else if (year_val === "") {
        $('#car_year_input_field').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#cars-title").offset().top
        }, 500);
    } else if (milage_val === "") {
        $('#dropdown_milage_input').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#add_car_price_field").offset().top
        }, 500);
    } else if (body_type_val === "") {
        $('#dropdown_body_type').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#error_slide_section_two").offset().top
        }, 500);
    } else if (interior_type_val === "") {
        $('#dropdown_interior_type').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#error_slide_section_two").offset().top
        }, 500);
    } else if (engine_type_val === "") {
        $('#dropdown_engine_type').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#error_slide_section_two").offset().top
        }, 500);
    } else if (exterior_color_val === "") {
        $('#dropdown_exterior_color_type').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#error_slide_section_two").offset().top
        }, 500);
    } else if (interior_color_val === "") {
        $('#dropdown_interior_color_type').addClass("danger_empty_input");

        $('html, body').animate({
            scrollTop: $("#error_slide_section_two").offset().top
        }, 500);
    } else {
        $('#step-3').show("");
        $('#step-2').hide("");
        $('#step_2_circle').removeClass();
        $('#step_2_circle').addClass("btn btn-default btn-circle");
        $('#step_3_circle').removeClass();
        $('#step_3_circle').addClass("btn btn-default btn-circle btn-danger");
        $("#step_3_circle").removeAttr("disabled");
        $('html, body').animate({
            scrollTop: $("#top_head_scrolling").offset().top
        }, 500);
    }
});

$('#next_btn_third').click(function () {
    var number_of_images = $('#number_of_uploaded_images').val();
    if (number_of_images === "0") {
        swal("", "Please upload images", "error");
    } else if (number_of_images < "3") {
        swal("", "Please Select at least 3 images", "error");
    } else {
        $('#step-4').show("");
        $('#step-3').hide("");
        $('#step_3_circle').removeClass();
        $('#step_3_circle').addClass("btn btn-default btn-circle");
        $('#step_4_circle').removeClass();
        $('#step_4_circle').addClass("btn btn-default btn-circle btn-danger");
        $("#step_4_circle").removeAttr("disabled");
        $('html, body').animate({
            scrollTop: $("#top_head_scrolling").offset().top
        }, 500);
    }
});

$('#next_btn_four').click(function () {
    var number_of_images = $('#input_hidden_number_of_inspection_ing').val();
    var make = $('#dropdownMenu1').val();
    var model = $('#dropdownMenu2').val();
    var year = $('#car_year_input_field').val();
    var name = $('#cars-name').val();
    var title = $('#cars-title').val();
    var price = $('#add_car_price_field').val();
    var mile = $('#dropdown_milage_input').val();
    var body_type = $('#dropdown_body_type').val();
    var interior_type = $('#dropdown_interior_type').val();
    var engine = $('#dropdown_engine_type').val();
    var exterior_color = $('#dropdown_exterior_color_type').val();
    var interior_color = $('#dropdown_interior_color_type').val();

    $('#confirm_input_make').val(make);
    $('#confirm_input_model').val(model);
    $('#confirm_input_year').val(year);
    $('#confirm_input_name').val(name);
    $('#confirm_input_title').val(title);
    $('#confirm_input_price').val(price);
    $('#confirm_input_milage').val(mile);
    $('#confirm_input_body_type').val(body_type);
    $('#confirm_input_interior_type').val(interior_type);
    $('#confirm_input_engine').val(engine);
    $('#confirm_input_exterior_color').val(exterior_color);
    $('#confirm_input_interior_color').val(interior_color);

    if (number_of_images === "0") {
        swal("", "Please Select Inspection Image", "error");
    } else {
        $('#step-5').show("");
        $('#step-4').hide("");
        $('#step_4_circle').removeClass();
        $('#step_4_circle').addClass("btn btn-default btn-circle");
        $('#step_5_circle').removeClass();
        $('#step_5_circle').addClass("btn btn-default btn-circle btn-danger");
        $("#step_5_circle").removeAttr("disabled");
        $('html, body').animate({
            scrollTop: $("#top_head_scrolling").offset().top
        }, 500);
    }


});

$('#next_btn_five').click(function () {
    $('#step-6').show("");
    $('#step-5').hide("");
    $('#step_5_circle').removeClass();
    $('#step_5_circle').addClass("btn btn-default btn-circle");
    $('#step_6_circle').removeClass();
    $('#step_6_circle').addClass("btn btn-default btn-circle btn-danger");
    $("#step_6_circle").removeAttr("disabled");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});

$('.select_main_li').click(function () {
    var id = this.id;
    var image = $('#img_' + id).attr('src');
    var value = document.getElementById('image_' + id + '_span').innerText;
    $('#dropdownMenu1').val(value);
    $('#make_id_for_post_final').val(id);
    $('#dropdownMenu2').val("");
    $('#input_home_search_make').val(id);
    var make_id = $("#make_id_" + id).val();
    $('#select_image').attr("src", image);
    $('#dropdownMenu2').removeClass("disabled");
    $("#dropdownMenu2").removeAttr("disabled");
    $('.select_main_model_li_on_ad_form').remove();
    $.ajax({
        type: "POST",
        url: "/getmodel",
        data: {id: make_id},
        success: function (data) {
            console.log(data);
            var decode_array = jQuery.parseJSON(data);
            var array_length = Object.keys(decode_array).length;
            $.fn.populate = function () {
                for (i = 0; i < array_length; i++) {
                    $(this).append('<li class="select_main_model_li_on_ad_form" id="' + decode_array[i].id + '"><div class="select_model_li" id="model_' + decode_array[i].id + '" ><span class="car_make_name" id="model_"' + decode_array[i].id + '"_span">' + decode_array[i].name + '</span></div></li>');
                }
                $(this).append("<script>$('.select_main_model_li_on_ad_form').click(function () { var model_id = this.id; var value = document.getElementById('model_' + model_id ).innerText; $('#dropdownMenu2').val(value); $('#model_id_for_post_final').val(model_id); $('#next_btn_first').removeAttr('disabled');});</script>");
            };
            $('#add_model_list').populate();
        }
    });
});

$('#previous_btn_second').on('click', function () {
    $('#step-1').show("");
    $('#step-2').hide("");
    $('#step_1_circle').removeClass();
    $('#step_1_circle').addClass("btn btn-default btn-circle btn-danger");
    $('#step_2_circle').removeClass();
    $('#step_2_circle').addClass("btn btn-default btn-circle");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});

$('#previous_btn_third').on('click', function () {
    $('#step-2').show("");
    $('#step-3').hide("");
    $('#step_2_circle').removeClass();
    $('#step_2_circle').addClass("btn btn-default btn-circle btn-danger");
    $('#step_3_circle').removeClass();
    $('#step_3_circle').addClass("btn btn-default btn-circle");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});

$('#previous_btn_four').on('click', function () {
    $('#step-3').show("");
    $('#step-4').hide("");
    $('#step_3_circle').removeClass();
    $('#step_3_circle').addClass("btn btn-default btn-circle btn-danger");
    $('#step_4_circle').removeClass();
    $('#step_4_circle').addClass("btn btn-default btn-circle");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});

$('#previous_btn_five').on('click', function () {
    $('#step-4').show("");
    $('#step-5').hide("");
    $('#step_4_circle').removeClass();
    $('#step_4_circle').addClass("btn btn-default btn-circle btn-danger");
    $('#step_5_circle').removeClass();
    $('#step_5_circle').addClass("btn btn-default btn-circle");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});

$('#previous_btn_six').on('click', function () {
    $('#step-5').show("");
    $('#step-6').hide("");
    $('#step_5_circle').removeClass();
    $('#step_5_circle').addClass("btn btn-default btn-circle btn-danger");
    $('#step_6_circle').removeClass();
    $('#step_6_circle').addClass("btn btn-default btn-circle");
    $('html, body').animate({
        scrollTop: $("#top_head_scrolling").offset().top
    }, 500);
});


$('.select_main_model_li_on_ad_form_year').on('click', function () {
    var id2 = this.id;
    var value = document.getElementById('years_span_' + id2).innerText;
    $('#car_year_for_post_final').val(value);
    $('#car_year_input_field').removeClass('danger_empty_input');
    $('#car_year_input_field').val(value);
    $('#car_year_for_post_final').val(value);
});

function readURL(input, image_div_id, populate_div_id) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#' + image_div_id).attr('src', e.target.result);
            $.fn.populate = function () {
                $(this).append('<div class="col-xs-2"><img style="height:120px;" src="' + e.target.result + '" class="img-responsive img-bordered"></div>');
            };
            $('#' + populate_div_id).populate();

        };
        reader.readAsDataURL(input.files[0]);


    }
}

$("#select_main_images_input").change(function () {
    $('#images_big_wrapper').show();
    $('html, body').animate({
        scrollTop: $("#show_images_slide").offset().top
    }, 1000);

    readURL(this, 'featuredImageItem', 'populate_images_div');

    $('#div_for_main_image_select').hide("");
    $('#div_for_main_image_select_two').show("");
});

$(function () {
    // Multiple images preview in browser
    var imagesPreview = function (input, placeToInsertImagePreview) {
        if (input.files) {
            var filesAmount = input.files.length;
            for (i = 0; i < filesAmount; i++) {
                var reader = new FileReader();
                reader.onload = function (event) {
                    $.fn.populate = function () {
                        $(this).append('<div class="col-xs-2"><img style="height:120px;" src="' + event.target.result + '" class="img-responsive img-bordered"></div>');
                    };
                    $('#' + placeToInsertImagePreview).populate();
                };
                reader.readAsDataURL(input.files[i]);
            }
        }
    };

    $('#select_main_images_input_two').on('change', function () {
        var numFiles = $(this).get(0).files.length;
        $('#number_of_uploaded_images').val(numFiles);
        $('#populate_images_div_two').empty();
        imagesPreview(this, 'populate_images_div_two');
    });
});





$("#checkbox_select_all").click(function () {
    $(".checkbox_for_features").prop('checked', $(this).prop('checked'));
});

$("#car_feature_by_id_all").click(function () {
    $(".checkbox_for_features_home_advanced_search").prop('checked', $(this).prop('checked'));
});

$('.select_car_body_main_li').click(function () {
    $('#dropdown_body_type').removeClass('danger_empty_input');
    $('.select_body_new_image_body_holder').show();
    $('#select_body_type_new_icon_holder_container').empty();
    $('#dropdown_body_type').removeClass('add_field_custome');
    $('#dropdown_body_type').addClass('new_padding_class_for_input_select_body_type');
    var id = this.id;
    $('#body_type_for_post_final').val(id);
    var value = document.getElementById('select_car_body_first_span_' + id).innerText;
    var image = $('#body_type_image_container_' + id).html();
    $('#select_body_type_image_main_container_span').empty();
    $.fn.populate = function () {
        $(this).append(image);
    };
    $('#select_body_type_new_icon_holder_container').populate();
    $('#dropdown_body_type').val(value);
});

$('.select_car_interior_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('interior_name_span_' + id2).innerText;
    $('#dropdown_interior_type').val(value);
    $('#dropdown_interior_type').removeClass('danger_empty_input');
    $('#car_interior_for_post_final').val(id2);
});

$('.select_main_location_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('car_location_li_name_' + id2).innerText;
    $('#car_location_input').val(value);
    $('#location_id_for_post_final').val(id2);
});


$('.select_car_engine_li').click(function () {
    var id = this.id;
    var value = document.getElementById('engine_name_span_' + id).innerText;
    $('#dropdown_engine_type').val(value);
    $('#dropdown_engine_type').removeClass('danger_empty_input');
    $('#car_engine_for_post_final').val(id);
});


$('.select_exterior_li').click(function () {
    var id = this.id;
    var value = document.getElementById('color_span_' + id).innerText;
    var image = $('#color_img_' + id).attr('src');
    $('#dropdown_exterior_color_type').val(value);
    $('#car_exterior_color_dropdown_image').attr("src", image);
    $('#car_exterior_color_for_post_final').val(id);
    $('#dropdown_exterior_color_type').removeClass('danger_empty_input');
});

$('.select_interior_li').click(function () {
    var id = this.id;
    var value = document.getElementById('interior_color_span_' + id).innerText;
    var image = $('#color_interior_img_' + id).attr('src');
    $('#dropdown_interior_color_type').val(value);
    $('#car_interior_color_dropdown_image').attr("src", image);
    $('#car_interior_color_for_post_final').val(id);
    $("#next_btn_third").removeAttr("disabled");
    $('#dropdown_interior_color_type').removeClass('danger_empty_input');
});

$('.select_main_milage_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('milage_span_' + id2).innerText;
    $('#dropdown_milage_input').val(value);
    $('#dropdown_milage_input').removeClass('danger_empty_input');
    $('#milage_id_for_post_final').val(this.id);
    $("#next_btn_second").removeAttr("disabled");
});



function readURL1(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#inspection_image_holder_img').attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
}

$("#select_inspection_image_input").change(function () {
    $('html, body').animate({
        scrollTop: $("#insepection_section_scroll_img").offset().top
    }, 1000);

    $('#select_incpection_image_text_span').text("Change Incpection Image");
    readURL1(this);
    $('#input_hidden_number_of_inspection_ing').val(1);
});


$('#next_btn_images_five').click(function () {
    var value = document.getElementById('interior_color_span_' + id).innerText;
    $('#dropdown_interior_color_type').val(value);
});
$('#cars-name').change(function () {
    $("#cars-name").removeClass("danger_empty_input");
});
$('#cars-title').change(function () {
    $("#cars-title").removeClass("danger_empty_input");
});
$('#add_car_price_field').change(function () {
    $("#add_car_price_field").removeClass("danger_empty_input");
});
$('#car_year_input_field').change(function () {
    $("#car_year_input_field").removeClass("danger_empty_input");
});
$('#dropdown_milage_input').change(function () {
    $("#dropdown_milage_input").removeClass("danger_empty_input");
});
$('#dropdown_body_type').change(function () {
    $("#dropdown_body_type").removeClass("danger_empty_input");
});
$('#dropdown_interior_type').change(function () {
    $("#dropdown_interior_type").removeClass("danger_empty_input");
});
$('#dropdown_exterior_color_type').change(function () {
    $("#dropdown_exterior_color_type").removeClass("danger_empty_input");
});
$('#dropdown_interior_color_type').change(function () {
    $("#dropdown_interior_color_type").removeClass("danger_empty_input");
});

function submitForm() {
    var name = $('#cars-name').val();
    var title = $('#cars-title').val();
    var user_id = "1";
    var image = "test";
    var make = $('#dropdownMenu1').val();
    var model = $('#dropdownMenu2').val();
    var price = $('#add_car_price_field').val();
    var year = $('#car_year_input_field').val();
    var mile = $('#dropdown_milage_input').val();
    var condition = $('input[Cars[condition_id]]:checked').val();
//    alert(condition);
    var exterior_color = $('#dropdown_milage_input').val();
    var interior_color = $('#dropdown_milage_input').val();
    var interior_type = $('#dropdown_milage_input').val();
    var transmission = $('#dropdown_milage_input').val();
    var engine = $('#dropdown_milage_input').val();
    var drivetrain = $('#dropdown_milage_input').val();
    var inspection = $('#dropdown_milage_input').val();
    var body_type = $('#dropdown_milage_input').val();
    $.ajax({
        type: "POST",
        url: "/getmodel",
        data: {id: make_id},
        success: function (data) {
            var decode_array = jQuery.parseJSON(data);
            var array_length = Object.keys(decode_array).length;
            $.fn.populate = function () {
                for (i = 0; i < array_length; i++) {
                    $(this).append('<li class="select_main_model_li_on_ad_form" id="' + decode_array[i].id + '"><div class="select_model_li" id="model_' + decode_array[i].id + '" ><span class="car_make_name" id="model_"' + decode_array[i].id + '"_span">' + decode_array[i].name + '</span></div></li>');
                }
                $(this).append("<script>$('.select_main_model_li_on_ad_form').click(function () { var model_id = this.id; var value = document.getElementById('model_' + model_id ).innerText; $('#dropdownMenu2').val(value); $('#model_id_for_post_final').val(model_id); $('#next_btn_first').removeAttr('disabled');});</script>");
            };
            $('#add_model_list').populate();
        }
    });
}
;
$('#condition_btn_1').click(function () {
    $('#condition_btn_radio_1').attr('checked', 'checked');
    $('#condition_btn_radio_2').removeAttr('checked');
    $('#condition_btn_radio_3').removeAttr('checked');
    var condition_val = $('#condition_btn_radio_1').val();
    $('#condition_id_hidden_input').val(condition_val);
});
$('#condition_btn_2').click(function () {
    $('#condition_btn_radio_2').attr('checked', 'checked');
    $('#condition_btn_radio_1').removeAttr('checked');
    $('#condition_btn_radio_3').removeAttr('checked');
    var condition_val = $('#condition_btn_radio_2').val();
    $('#condition_id_hidden_input').val(condition_val);
});
$('#condition_btn_3').click(function () {
    $('#condition_btn_radio_3').attr('checked', 'checked');
    $('#condition_btn_radio_2').removeAttr('checked');
    $('#condition_btn_radio_1').removeAttr('checked');
    var condition_val = $('#condition_btn_radio_3').val();
    $('#condition_id_hidden_input').val(condition_val);
});

$('#transmission_btn_1').click(function () {
    $('#transmission_btn_radio_1').attr('checked', 'checked');
    $('#transmission_btn_radio_2').removeAttr('checked');
    $('#transmission_btn_radio_3').removeAttr('checked');
    var condition_val = $('#transmission_btn_radio_1').val();
    $('#transmission_id_hidden_input').val(condition_val);
});
$('#transmission_btn_2').click(function () {
    $('#transmission_btn_radio_2').attr('checked', 'checked');
    $('#transmission_btn_radio_1').removeAttr('checked');
    $('#transmission_btn_radio_3').removeAttr('checked');
    var condition_val = $('#transmission_btn_radio_2').val();
    $('#transmission_id_hidden_input').val(condition_val);
});
$('#transmission_btn_3').click(function () {
    $('#transmission_btn_radio_3').attr('checked', 'checked');
    $('#transmission_btn_radio_2').removeAttr('checked');
    $('#transmission_btn_radio_1').removeAttr('checked');
    var condition_val = $('#transmission_btn_radio_3').val();
    $('#transmission_id_hidden_input').val(condition_val);
});

$('#drivetrain_btn_1').click(function () {
    $('#drivetrain_btn_radio_1').attr('checked', 'checked');
    $('#drivetrain_btn_radio_2').removeAttr('checked');
    $('#drivetrain_btn_radio_3').removeAttr('checked');
    $('#drivetrain_btn_radio_4').removeAttr('checked');
    var condition_val = $('#drivetrain_btn_radio_1').val();
    $('#drivetrain_id_hidden_input').val(condition_val);
});

$('#drivetrain_btn_2').click(function () {
    $('#drivetrain_btn_radio_2').attr('checked', 'checked');
    $('#drivetrain_btn_radio_1').removeAttr('checked');
    $('#drivetrain_btn_radio_3').removeAttr('checked');
    $('#drivetrain_btn_radio_4').removeAttr('checked');
    var condition_val = $('#drivetrain_btn_radio_2').val();
    $('#drivetrain_id_hidden_input').val(condition_val);
});
$('#drivetrain_btn_3').click(function () {
    $('#drivetrain_btn_radio_3').attr('checked', 'checked');
    $('#drivetrain_btn_radio_1').removeAttr('checked');
    $('#drivetrain_btn_radio_2').removeAttr('checked');
    $('#drivetrain_btn_radio_4').removeAttr('checked');
    var condition_val = $('#drivetrain_btn_radio_3').val();
    $('#drivetrain_id_hidden_input').val(condition_val);
});
$('#drivetrain_btn_4').click(function () {
    $('#drivetrain_btn_radio_4').attr('checked', 'checked');
    $('#drivetrain_btn_radio_1').removeAttr('checked');
    $('#drivetrain_btn_radio_2').removeAttr('checked');
    $('#drivetrain_btn_radio_3').removeAttr('checked');
    var condition_val = $('#drivetrain_btn_radio_4').val();
    $('#drivetrain_id_hidden_input').val(condition_val);
});





$('#submit_final_car_add').click(function () {

    swal({
        title: "Creating listing ...",
        text: "",
        showInfoButton: false,
        showConfirmButton: false,
        imageUrl: '/images/elements/AggressiveGrouchyHammerkop.gif',
        timer: 3500
    }, function () {

        var formData = new FormData($('#form-car-add')[0]);
        console.log(formData);
        $.ajax({
            url: "/cars/create/8Sp2UCt3TJw2MGlc3ULnB0YJaceSuR9", //Server script to process data
            type: 'POST',

            // Form data
            data: formData,

            success: function (response) {
                swal({
                    title: "Successfully",
                    text: "Your car listing has been created!",
                    type: "success",
                    showInfoButton: false,
                    showConfirmButton: false,
                    timer: 4500
                });
                window.location = "/cars/" + response;
            },

            error: function () {
                swal({
                    title: "Something Wrong?",
                    text: "Could Not save your data",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                });
            },

            //Options to tell jQuery not to process data or worry about content-type.
            cache: false,
            contentType: false,
            processData: false
        });





    });


});


$("#input_home_search_price_from").on("change paste keyup", function () {
    if (event.which >= 37 && event.which <= 40)
        return;
    $(this).val(function (index, value) {
        return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});

$("#input_home_search_price_to").on("change paste keyup", function () {
    if (event.which >= 37 && event.which <= 40)
        return;
    $(this).val(function (index, value) {
        return value
                .replace(/\D/g, "")
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    });
});

$('.select_year_from_input_home_search_main_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('home_search_year_from_' + id2).innerText;
    $('#input_home_search_year_from_container').val(value);
    $('#input_home_search_year_from').val(id2);
});

$('.select_year_to_input_home_search_main_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('home_search_year_to_' + id2).innerText;
    $('#input_home_search_year_to_container').val(value);
    $('#input_home_search_year_to').val(id2);
});

$('.home_search_condition_main_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('home_search_condition_name_' + id2).innerText;
    $('#input_home_search_condition_container').val(value);
    $('#input_home_search_condition').val(id2);
});

$('.select_main_transmission_li').click(function () {
    var id2 = this.id;
    var value = document.getElementById('home_search_transmission_name_' + id2).innerText;
    $('#home_search_input_condition_container').val(value);
    $('#home_search_input_condition_id').val(id2);
});

$('#home_search_input_button_submit').click(function () {
    var link = "";
    var name = $('#input_home_search_make').val();
    if (name == "") {
        link = link;
    } else {
        link = link + "&make=" + name;
    }
    var name = $('#model_id_for_post_final').val();
    if (name == "") {
        link = link;
    } else {
        link = link + "&model=" + name;
    }
    var name = $('#input_home_search_price_from').val();
    if (name == "") {
        link = link;
    } else {
        link = link + "&price_from=" + name;
    }
    var name = $('#input_home_search_price_to').val();
    if (name == "") {
        link = link;
    } else {
        link = link + "&price_to=" + name;
    }
    if (link == "") {
        window.location = "/cars?cars_search=none_filter&search=none" + link;
    } else {
        window.location = "/cars?cars_search=1" + link;
    }
});

$('#checkBox_for_cars_language_english_div').click(function () {
    $('#')
});

$('#checkBox_for_cars_language_english_all').click(function () {
    window.location = "/cars?cars_search=1&cars_language=1";
});
$('#checkBox_for_cars_language_english').click(function () {
    window.location = "/cars?cars_search=1&cars_language=0";
});

$('.report_icon').click(function () {
    var image_src = this.id;
    $('#report_modal_image').attr("src", image_src);
});




$('.add_fav_icon').click(function () {
    var listing_id = this.id;
    $.ajax({
        type: "POST",
        url: "/addtofavlist",
        data: {id: listing_id},
        success: function (data) {
            if (data == 1) {
                $('#' + listing_id).removeClass("fa fa-heart-o add_fav_icon fav_icon");
                $('#' + listing_id).addClass('fa fa-heart remove_fav_car fav_icon');
            } else if (data == 2) {
                swal("Successfully!", "This listing is already on your favourite list", "success");
            } else {
                swal("Danger!", "Something went wrong, could not add to favourite list", "warning");
            }
        }
    });

});

$('.remove_fav_car').click(function () {
    var listing_id = this.id;
    $.ajax({
        type: "POST",
        url: "/removefromfavlist",
        data: {id: listing_id},
        success: function (data) {
            if (data == 1) {
                $('#' + listing_id).removeClass("fa fa-heart remove_fav_car fav_icon");
                $('#' + listing_id).addClass('fa fa-heart-o add_fav_icon fav_icon');
            } else if (data == 2) {
                swal("Warning!", "Can not find your fav data base", "warning");
            } else {
                swal("Danger!", "Cannot remove from fav data base", "danger");
            }
        }
    });
});



$('.view_page_reveal_number').click(function () {
    var phone_number = $('#hidden_phone').val();
    $('#view_page_hidden_phone').html(phone_number);
    $("#view_phone_href").attr("href", "tel:" + phone_number)
});

$('#get_more_description').click(function () {
    $('#get_more_description').slideToggle("fast");
    $('#get_less_description').slideToggle("fast");
    $('#more_description').slideDown("slow");
});

$('#get_less_description').click(function () {
    $('#get_more_description').slideToggle("fast");
    $('#get_less_description').slideToggle("fast");
    $('#more_description').slideUp("slow");
});


$('#c-fast-car-search-span-more').click(function () {
    $('#c-fast-car-search-hidden-make-div').slideDown("");
    $('#c-fast-car-search-span-more').toggle("");
    $('#c-fast-car-search-span-less').toggle("");
});

$('#c-fast-car-search-span-less').click(function () {
    $('#c-fast-car-search-hidden-make-div').slideUp("");
    $('#c-fast-car-search-span-more').toggle("");
    $('#c-fast-car-search-span-less').toggle("");
});
$('#HomeShowMoreText').click(function () {
    $('#home_search_advanced_div_wrapper').slideDown();
    $('#HomeShowMoreOptionsBTN').hide();
    $('#HomeShowLessOptionsBTN').show();
});
$('#HomeShowLessOptionsBTN').click(function () {
    $('#home_search_advanced_div_wrapper').slideUp();
    $('#HomeShowLessOptionsBTN').hide();
    $('#HomeShowMoreOptionsBTN').show();
});

$('.home_checkbox_for_compare_lable').click(function () {
    var favorite = [];
    $.each($("input[name='check[car_features1]']:checked"), function () {
        favorite.push($(this).val());
    });
    for (i = 0; i < favorite.length; i++) {
        $.ajax({
            type: "POST",
            url: "/getcarsforcompare",
            data: {id: favorite[i]},
            success: function (data) {
                var parsedJSON = JSON.parse(data);
//            console.log(parsedJSON.make);
//            console.log("Length = "+data.length);
                $('#compare_name_' + i).text(parsedJSON.make);
                $('#compare_model_' + i).text(parsedJSON.model);
                $('#compare_year_' + i).text(parsedJSON.year);
                $('#compare_slug_' + i).val(parsedJSON.slug);
                $('#compare_image_' + i).attr('src', '/media/284x251/' + parsedJSON.image);
            }
        });
    }

    console.log(favorite);



    // function remove last check (Start)
    var FirstChecked;
    var $checks = $('input:checkbox').click(function (e) {
        var numChecked = $checks.filter(':checked').length;
        var getchecked = $checks.filter(':checked');
//        console.log(getchecked);
        if (numChecked > 4) {
//            swal({
//                title: "Something Wrong?",
//                text: "You can only select 3 cars",
//                icon: "warning",
//                buttons: true,
//                dangerMode: true,
//            });
            FirstChecked.checked = false;
        }
        FirstChecked = this;
    });
// function remove last check (End)


    var id = this.id;
    $('#car_check_for_compare_' + this.id).prop('checked', true);

    $('#cars_page_show_compare_car_div').slideDown();

});

$('#close_compare_cars_div').click(function () {
    $('#cars_page_show_compare_car_div').slideUp();
});

$('#start_comparing_btn').click(function () {
    var slug_1 = $('#compare_slug_1').val();
    var slug_2 = $('#compare_slug_2').val();
    var slug_3 = $('#compare_slug_3').val();
    window.location = "/compare?car_1=" + slug_1 + '&car_2=' + slug_2 + '&car_3=' + slug_3;
});
