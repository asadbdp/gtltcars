if (typeof (STMListings) == 'undefined') {
    var STMListings = {};

    STMListings.$extend = function (object, methods) {
        methods.prototype = jQuery.extend({}, object.prototype);
        object.prototype = methods;
    };
}

(function ($) {
    "use strict";
    var timer;

    STMListings.resetFields = function() {
        $(document).on('reset', 'select', function(e){
            $(this).val('');
            $(this).find('option').prop('disabled', false);
        });
    };

    STMListings.stm_ajax_login = function () {
        $(".stm-login-form form").submit(function (e) {
            e.preventDefault();

            $.ajax({
                type: "POST",
                url: ajaxurl,
                dataType: 'json',
                context: this,
                data: $(this).serialize() + '&action=stm_custom_login&security=' + stm_custom_login_nonce,
                beforeSend: function () {
                    $(this).find('input').removeClass('form-error');
                    $(this).find('.stm-listing-loader').addClass('visible');
                    $('.stm-validation-message').empty();

                    if ($(this).parent('.lOffer-account-unit').length > 0) {
                        $('.stm-login-form-unregistered').addClass('working');
                    }
                },
                success: function (data) {
                    if ($(this).parent('.lOffer-account-unit').length > 0) {
                        $('.stm-login-form-unregistered').addClass('working');
                    }
                    if (data.user_html) {
                        var $user_html = $(data.user_html).appendTo('#stm_user_info');
                        $('.stm-not-disabled, .stm-not-enabled').slideUp('fast', function () {
                            $('#stm_user_info').slideDown('fast');
                        });

                        $("html, body").animate({scrollTop: $('.stm-form-checking-user').offset().top}, "slow");
                        $('.stm-add-a-car-login-overlay,.stm-add-a-car-login').toggleClass('visiblity');

                        $('.stm-form-checking-user button[type="submit"]').removeClass('disabled').addClass('enabled');
                    }

                    if(data.restricted && data.restricted) {
                        $('.btn-add-edit').remove();
                    }

                    $(this).find('.stm-listing-loader').removeClass('visible');
                    for (var err in data.errors) {
                        $(this).find('input[name=' + err + ']').addClass('form-error');
                    }

                    if (data.message) {
                        var message = $('<div class="stm-message-ajax-validation heading-font">' + data.message + '</div>').hide();

                        $(this).find('.stm-validation-message').append(message);
                        message.slideDown('fast');
                    }


                    if (typeof(data.redirect_url) !== 'undefined') {
                        window.location = data.redirect_url;
                    }
                }
            });
        });
    };

    STMListings.save_user_settings_success = function (data) {
        $(this).find('.stm-listing-loader').removeClass('visible');
        $('.stm-user-message').text(data.error_msg);

        $('.stm-image-avatar img').attr('src', data.new_avatar);

        if (data.new_avatar === '') {
            $('.stm-image-avatar').removeClass('hide-empty').addClass('hide-photo');
        } else {
            $('.stm-image-avatar').addClass('hide-empty').removeClass('hide-photo');
        }

    };

    STMListings.save_user_settings = function () {
        $('#stm_user_settings_edit').submit(function (e) {

            var formData = new FormData();

            /*Add image*/
            formData.append('stm-avatar', $('input[name="stm-avatar"]')[0].files[0]);

            /*Add text fields*/
            var formInputs = $(this).serializeArray();

            for (var key in formInputs) {
                if (formInputs.hasOwnProperty(key)) {
                    formData.append(formInputs[key]['name'], formInputs[key]['value']);
                }
            }

            formData.append('action', 'stm_listings_ajax_save_user_data');
            formData.append('security', stm_listings_user_data_nonce);

            e.preventDefault();

            $.ajax({
                type: "POST",
                url: ajaxurl,
                dataType: 'json',
                context: this,
                data: formData,
                contentType: false,
                processData: false,
                beforeSend: function () {
                    $('.stm-user-message').empty();
                    $(this).find('.stm-listing-loader').addClass('visible');
                },
                success: STMListings.save_user_settings_success
            });
        })
    };

    STMListings.stm_logout = function () {
        $('body').on('click', '.stm_logout a', function (e) {
            e.preventDefault();
            $.ajax({
                url: ajaxurl,
                type: "POST",
                dataType: 'json',
                context: this,
                data: {
                    'action': 'stm_logout_user',
                    'security': stm_logout_user_nonce
                },
                beforeSend: function () {
                    $('.stm_add_car_form .stm-form-checking-user .stm-form-inner').addClass('activated');
                },
                success: function (data) {
                    if (data.exit) {
                        $('#stm_user_info').slideUp('fast', function () {
                            $(this).empty();
                            $('.stm-not-enabled, .stm-not-disabled').slideDown('fast');
                            $("html, body").animate({scrollTop: $('.stm-form-checking-user').offset().top}, "slow");
                        });

                        $('.stm-form-checking-user button[type="submit"]').removeClass('enabled').addClass('disabled');
                    }
                    $('.stm_add_car_form .stm-form-checking-user .stm-form-inner').removeClass('activated');
                }
            });
        })
    };

    STMListings.stm_ajax_registration = function () {
        $(".stm-register-form form").submit(function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: ajaxurl,
                dataType: 'json',
                context: this,
                data: $(this).serialize() + '&action=stm_custom_register&security=' + stm_custom_register_nonce,
                beforeSend: function () {
                    $(this).find('input').removeClass('form-error');
                    $(this).find('.stm-listing-loader').addClass('visible');
                    $('.stm-validation-message').empty();
                },
                success: function (data) {
                    if (data.user_html) {
                        var $user_html = $(data.user_html).appendTo('#stm_user_info');
                        $('.stm-not-disabled, .stm-not-enabled').slideUp('fast', function () {
                            $('#stm_user_info').slideDown('fast');
                        });
                        $("html, body").animate({scrollTop: $('.stm-form-checking-user').offset().top}, "slow");

                        $('.stm-form-checking-user button[type="submit"]').removeClass('disabled').addClass('enabled');
                    }

                    $(this).find('.stm-listing-loader').removeClass('visible');
                    for (var err in data.errors) {
                        $(this).find('input[name=' + err + ']').addClass('form-error');
                    }

                    if (data.redirect_url) {
                        window.location = data.redirect_url;
                    }

                    if (data.message) {
                        var message = $('<div class="stm-message-ajax-validation heading-font">' + data.message + '</div>').hide();

                        $(this).find('.stm-validation-message').append(message);
                        message.slideDown('fast');
                    }
                }
            });
        });
    };

    STMListings.ajaxGetCarPrice = function () {
        $('#get-car-price form').on("submit", function(event){
            event.preventDefault();
            $.ajax({
                url: ajaxurl,
                type: "POST",
                dataType: 'json',
                context: this,
                data: $( this ).serialize() + '&action=stm_ajax_get_car_price&security=' + stm_car_price_nonce,
                beforeSend: function(){
                    $('.alert-modal').remove();
                    $(this).closest('form').find('input').removeClass('form-error');
                    $(this).closest('form').find('.stm-ajax-loader').addClass('loading');
                },
                success: function (data) {
                    $(this).closest('form').find('.stm-ajax-loader').removeClass('loading');
                    $(this).closest('form').find('.modal-body').append('<div class="alert-modal alert alert-'+ data.status +' text-left">' + data.response + '</div>')
                    for(var key in data.errors) {
                        $('#get-car-price input[name="' + key + '"]').addClass('form-error');
                    }
                }
            });
            $(this).closest('form').find('.form-error').live('hover', function () {
                $(this).removeClass('form-error');
            });
        });
    };

    $(document).ready(function () {

        STMListings.stm_ajax_login();
        STMListings.save_user_settings();
        STMListings.stm_logout();
        STMListings.resetFields();
        STMListings.stm_ajax_registration();
        STMListings.ajaxGetCarPrice();
        stm_ajax_add_test_drive();



        $(document).on('change', '.stm-sort-by-options select', function () {
            $('input[name="sort_order"]').val($(this).val()).closest('form').submit();
        });

        $(document).on('change', '.ajax-filter select, .stm-sort-by-options select, .stm-slider-filter-type-unit', function () {
            $(this).closest('form').submit();
        });

        $(document).on('slidestop', '.ajax-filter .stm-filter-type-slider', function (event, ui) {
            $(this).closest('form').submit();
        });


        $('.stm_login_me a').click(function (e) {
            e.preventDefault();
            $('.stm-add-a-car-login-overlay,.stm-add-a-car-login').toggleClass('visiblity');
        });

        $('.stm-add-a-car-login-overlay').click(function (e) {
            $('.stm-add-a-car-login-overlay,.stm-add-a-car-login').toggleClass('visiblity');
        });

        $('.stm-big-car-gallery').lightGallery({
            selector: '.stm_light_gallery',
            mode : 'lg-fade'
        });

        $('.light_gallery_iframe').lightGallery({
            selector: 'this',
            iframeMaxWidth: '70%'
        });

        $('.stm-date-timepicker').stm_datetimepicker({minDate: 0});
    });

    $(document).on('click', '.add-to-compare', function (e) {

        e.preventDefault();
        var stm_cookies = $.cookie();
        var stm_car_compare = [];
        var stm_car_add_to = $(this).data('id');

        for (var key in stm_cookies) {
            if (stm_cookies.hasOwnProperty(key)) {
                if (key.indexOf('compare_ids') > -1) {
                    stm_car_compare.push(stm_cookies[key]);
                }
            }
        }

        var stm_compare_cars_counter = stm_car_compare.length;
        $.cookie.raw = true;

        if ($.inArray(stm_car_add_to.toString(), stm_car_compare) === -1) {
            if (stm_car_compare.length < 3) {
                $.cookie('compare_ids[' + stm_car_add_to + ']', stm_car_add_to, {expires: 7, path: '/'});
                $(this).addClass('active');
                stm_compare_cars_counter++;

                //Added
                $(this).addClass('active');

                if (typeof(stm_label_remove) != 'undefined') {
                    $(this).text(stm_label_remove);
                }
                reloadCompareModal(stm_compare_cars_counter);
            } else {
                //Already added 3 popup

            }
        } else {
            $.removeCookie('compare_ids[' + stm_car_add_to + ']', {path: '/'});
            $(this).removeClass('active');
            stm_compare_cars_counter--;

            //Deleted from compare text
            $(this).removeClass('active');

            if (typeof(stm_label_add) != 'undefined') {
                $(this).text(stm_label_add);
            }

            reloadCompareModal(stm_compare_cars_counter);

            if ($(this).hasClass('stm_remove_after')) {
                window.location.reload();
            }
        }

    });

    function reloadCompareModal(qnt) {
        var compareModal = $(".stm_compare_cars_footer_modal");
        var quant = qnt;

        $.ajax({
            url: ajaxurl,
            type: "POST",
            dataType: 'json',
            context: this,
            data: 'action=stm_ajax_get_compare_list&security=' + stm_compare_list_nonce,
            success: function (data) {
                if(qnt == 0 || data == null) {
                    compareModal.hide();
                } else {
                    compareModal.attr("style", "display: block;");
                    $(".stm-compare-badge").show().text(quant + "");
                    $(".stm-compare-list-wrap").empty();
                    $(".stm-compare-list-wrap").append(data);
                }
            },
            error: function (er) {
                console.log("qwe" + er);
            }
        });
    }

    function stm_ajax_add_test_drive() {

        if (timer) {
            clearTimeout(timer);
        }

        $('#test-drive form').on("submit", function(event){
            event.preventDefault();
            $.ajax({
                url: ajaxurl,
                type: "POST",
                dataType: 'json',
                context: this,
                data: $( this ).serialize() + '&action=stm_ajax_add_test_drive&security=' + stm_add_test_drive_nonce,
                beforeSend: function(){
                    $('.alert-modal').remove();
                    $(this).closest('form').find('input').removeClass('form-error');
                    $(this).closest('form').find('.stm-ajax-loader').addClass('loading');
                },
                success: function (data) {
                    $(this).closest('form').find('.stm-ajax-loader').removeClass('loading');
                    $(this).closest('form').find('.msg-body').append('<div class="alert-modal alert alert-'+ data.status +' text-left">' + data.response + '</div>')
                    for(var key in data.errors) {
                        $('#request-test-drive-form input[name="' + key + '"]').addClass('form-error');
                    }

                    timer = setTimeout(function() {
                        $('#test-drive').modal('toggle');
                    }, 1000);
                }
            });
            $(this).closest('form').find('.form-error').live('hover', function () {
                $(this).removeClass('form-error');
            });
        });
    }

})(jQuery);