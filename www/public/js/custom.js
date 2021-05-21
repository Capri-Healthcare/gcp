/**
 * Custom JS - Custom js for klinikal theme
 * @version v3.0
 * @copyright 2020 Pepdev.
 */
 Dropzone.autoDiscover = false;
 $(document).ready(function () {
    "use strict";
    //Color Picker
    
    //*************************************************
    //On DOM Load  ************************************
    //*************************************************
    $(window).on('load',function () {
        $('.slider-wrapper').flexslider({
            animation: "fade",
            animationLoop: true,
            pauseOnHover: true,
            keyboard: true,
            controlNav: false
        });
        //$('.slider-height').removeClass();
    });

    $('.theme-flexslider').flexslider({
        animation: "slide",
        animationLoop: true,
        pauseOnHover: true
    });


    $(".theme-owlslider").owlCarousel({
        items: 1,
        dots: true
    });

    function inputBox(ele) {
        var ele_parent = ele.parent('.input-box');
        if ($.trim(ele.val()).length > 0) {
            ele_parent.addClass('has-content');
        } else {
            ele_parent.removeClass('has-content');
        }
    }

    $(document).on('blur', '.input-box input, .input-box select, .input-box textarea', function () {
        inputBox($(this));
    });

    $(document).on('change', '.input-box select', function () {
        inputBox($(this));
    });

    $(".input-box input, .input-box select, .input-box textarea").each(function() {
        inputBox($(this));
    });
        
    //*************************************************
    //Tooltip  ****************************************
    //*************************************************
    $('[data-toggle="tooltip"]').tooltip();

    //*************************************************
    //Menu  *******************************************
    //*************************************************
    
    $('.fixed-on-scroll').scrollToFixed();

    $('.fixed-on-scroll-colored-background').scrollToFixed({
        preFixed: function () {
            $('.fixed-on-scroll-colored-background').addClass('hdr-colored-background');
        },
        postFixed: function () {
            $('.fixed-on-scroll-colored-background').removeClass('hdr-colored-background');
        }
    });


    $('#menu-bar').click(function () {
        $('body').css('overflow', 'hidden');
        $('.menu').css('left', '0');
        $('.menu').show();
    });

    $('.mobile-menu-close').click(function () {
        $('body').css('overflow', 'visible');
        $('.menu').css('left', '-100%');
        $('.menu').hide();
    });

    $(window).resize(function () {
        if ($(window).width() > 800) {
            $('body').css('overflow', 'visible');
            //$('.menu').css('left', '-100%');
            //$('.menu').hide();
        }
    });

    $('.user-wrapper').on('click', '.user-menu-icon', function () {
        var ele = $(this).find('i');
        if ($('.user-menu').css('display') === "none") {
            $('.user-menu').slideDown();
            ele.removeClass('fas fa-ellipsis-v');
            ele.addClass('far fa-times-circle');
        } else {
            $('.user-menu').slideUp();
            ele.removeClass('far fa-times-circle');
            ele.addClass('fas fa-ellipsis-v');
        }
    });

    //*************************************************
    //Accordion ***************************************
    //*************************************************
    $('.theme-accordion:nth-child(1) .theme-accordion-bdy').slideDown();
    $('.theme-accordion:nth-child(1) .theme-accordion-control .fa').addClass('fa-minus');
    $('.theme-accordion-hdr').click(function() {
        $('.theme-accordion-bdy').slideUp();
        $('.theme-accordion-control .fa').removeClass('fa-minus');
        if ($(this).parents('.theme-accordion').find('.theme-accordion-bdy').css('display') == "none") {
            $(this).find('.theme-accordion-control .fa').addClass('fa-minus');
            $(this).parents('.theme-accordion').find('.theme-accordion-bdy').slideDown();
        } else {
            $(this).find('.theme-accordion-control .fa').removeClass('fa-minus');
            $(this).parents('.theme-accordion').find('.theme-accordion-bdy').slideUp();
        }
    });

    //*************************************************
    //Home Page ***************************************
    //************************************************* 

    //Home Doctor Slider
    $("#hm-doctor-slider").owlCarousel({
        center: true,
        autoplay: true,
        items: 3,
        margin: 10,
        loop: true,
        smartSpeed: 1000,
        autoplayTimeout: 3000,
        autoplayHoverPause: true,
        responsiveClass: true,
        responsive: {
            0: {
                items: 1,
                nav: true
            },
            600: {
                items: 2,
                nav: false
            },
            992: {
                items: 3,
                nav: false
            }
        }
    });

    //Testimonial Slider
    $("#testimonial-slider").owlCarousel({
        items: 1,
        dots: true
    });

    //Animation on scroll
    $('.animated-wrapper').css('opacity', 0).waypoint(function (direction) {
        $(this.element).find('.animated-up').addClass('fadeInUp');
        $(this.element).find('.animated-right').addClass('fadeInRight');
        $(this.element).find('.animated-down').addClass('fadeInDown');
        $(this.element).animate({
            opacity: 1
        });
    }, {
        offset: '50%'
    });
    
    //Services Search
    $('input#search-services').keyup(function () {
        var filter = $('#search-services').val().toUpperCase();
        $('.theme-block .theme-block-data').each(function (index) {
            var ele = $(this), a = ele.find('h4 a').text().trim().toUpperCase();
            if (a.indexOf(filter) > -1) {
                ele.parents('.theme-block').parent('div').show();
            } else {
                ele.parents('.theme-block').parent('div').hide();
            }
        });
    });

    //Doctor Search
    $('input#search-doctors').keyup(function () {
        var filter = $('#search-doctors').val().toUpperCase();
        $('.theme-block .doctor-name').each(function (index) {
            var ele = $(this), a = ele.find('h4 a').text().trim().toUpperCase();
            if (a.indexOf(filter) > -1) {
                ele.parents('.theme-block').parent('div').show();
            } else {
                ele.parents('.theme-block').parent('div').hide();
            }
        });
    });

    //blog-1 Search 
    $('input#search-blog').keyup(function () {
        var filter = $('#search-blog').val().toUpperCase();
        $('.hm-blog-block .hm-blog-ttl').each(function (index) {
            var a = $(this).find('h4 a').text().trim().toUpperCase();
            if (a.indexOf(filter) > -1) {
                $(this).parents('.hm-blog-block').parent('div').show();
            } else {
                $(this).parents('.hm-blog-block').parent('div').hide();
            }
        });
    });

    //blog-2 Search
    $('input#search-blog').keyup(function () {
        var filter = $('#search-blog').val().toUpperCase();
        $('.theme-block .blog-card-ttl').each(function (index) {
            var ele = $(this), a = ele.find('h3 a').text().trim().toUpperCase();
            if (a.indexOf(filter) > -1) {
                ele.parents('.theme-block').parent('div').show();
            } else {
                ele.parents('.theme-block').parent('div').hide();
            }
        });
    });


    //*************************************************
    //My Profile Page popup ***************************
    //*************************************************
    $('.dob').datepicker({
        dateFormat: $('.common_date_format').val(),
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0"
    });

    //*************************************************
    //Blog Page  **************************************
    //*************************************************

    //Blog Read More Tag
    $(".blog-list-post p span").text(function (index, currentText) {
        return currentText.substr(0, 300);
    });

    //*************************************************
    //Service List Page  ******************************
    //*************************************************

    //Service Read More Tag
    $(".service-description span, .service-description span").text(function (index, currentText) {
        return currentText.substr(0, 330);
    });

    //*************************************************
    //Input Form Validation ***************************
    //************************************************* 
    //Contact Form Validation
    $('#contact-submit').click(function () {
        var clck_invld = 0,
        mail_filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
        mob_filter = /^[0-9]*$/;
        if ($('#contact-subject').val().trim().length < 3) {
            $('#contact-subject').parent('.contact-input').addClass('is-invalid');
            $('#contact-subject').parent('.contact-input').addClass('is-dirty');
            clck_invld = 1;
            $('#contact-subject').focus();
        }
        if ($('#contact-mobile').val().trim().length < 4) {
            $('#contact-mobile').parent('.contact-input').addClass('is-invalid');
            $('#contact-mobile').parent('.contact-input').addClass('is-dirty');
            clck_invld = 1;
            $('#contact-mobile').focus();
        }
        if (!mail_filter.test($('#contact-email').val())) {
            $('#contact-email').parent('.contact-input').addClass('is-invalid');
            $('#contact-email').parent('.contact-input').addClass('is-dirty');
            clck_invld = 1;
            $('#contact-email').focus();
        }
        if ($('#contact-name').val().trim().length < 3) {
            $('#contact-name').parent('.contact-input').addClass('is-invalid');
            $('#contact-name').parent('.contact-input').addClass('is-dirty');
            clck_invld = 1;
            $('#contact-name').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Login Form Validation
    $('#login-submit').click(function () {
        var clck_invld = 0,
        mail_filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
        bot_number, bot_number_array, total;
        if ($('#login-bot').val().trim().length < 1) {
            $('#login-bot').parent('.form-input').addClass('is-invalid');
            $('#login-bot').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#login-bot').focus();
        } else if ($('#login-bot').val().trim().length > 0) {
            bot_number = $('#login-bot+label').text();
            bot_number_array = bot_number.match(/[\d\.]+/g);
            total = 0;
            if (bot_number_array.length > 0) {
                $.each(bot_number_array, function (key, element) {
                    total += +element;
                });
                if ($('#login-bot').val().trim() !== total.toString()) {
                    $('#login-bot').parent('.form-input').addClass('is-invalid');
                    $('#login-bot').parent('.form-input').addClass('is-dirty');
                    clck_invld = 1;
                    $('#login-bot').focus();
                }
            } else {
                $('#login-bot').parent('.form-input').addClass('is-invalid');
                $('#login-bot').parent('.form-input').addClass('is-dirty');
                clck_invld = 1;
                $('#login-bot').focus();
            }
        }

        if ($('#login-password').val().trim().length < 4) {
            $('#login-password').parent('.form-input').addClass('is-invalid');
            $('#login-password').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#login-password').focus();
        }
        if (!mail_filter.test($('#login-email').val())) {
            $('#login-email').parent('.form-input').addClass('is-invalid');
            $('#login-email').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#login-email').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Register Form Validation
    $('#register-submit').click(function () {
        var clck_invld = 0,
        mail_filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
        mob_filter = /^[0-9]*$/,
        bot_number, bot_number_array, total;
        if ($('#register-bot').val().trim().length < 1) {
            $('#register-bot').parent('.form-input').addClass('is-invalid');
            $('#register-bot').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-bot').focus();
        } else if ($('#register-bot').val().trim().length > 0) {
            bot_number = $('#register-bot+label').text();
            bot_number_array = bot_number.match(/[\d\.]+/g);
            total = 0;
            if (bot_number_array.length > 0) {
                $.each(bot_number_array, function (key, element) {
                    total += +element;
                });
                if ($('#register-bot').val().trim() !== total.toString()) {
                    $('#register-bot').parent('.form-input').addClass('is-invalid');
                    $('#register-bot').parent('.form-input').addClass('is-dirty');
                    clck_invld = 1;
                    $('#register-bot').focus();
                }
            } else {
                $('#register-bot').parent('.form-input').addClass('is-invalid');
                $('#register-bot').parent('.form-input').addClass('is-dirty');
                clck_invld = 1;
                $('#register-bot').focus();
            }
        }

        if (!($('#register-confirm-password').val().trim() == $('#register-password').val().trim())) {
            $('#register-confirm-password').parent('.form-input').addClass('is-invalid');
            $('#register-confirm-password').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-confirm-password').focus();
        }
        if ($('#register-confirm-password').val().trim().length < 6) {
            $('#register-confirm-password').parent('.form-input').addClass('is-invalid');
            $('#register-confirm-password').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-confirm-password').focus();
        }
        if ($('#register-password').val().trim().length < 6) {
            $('#register-password').parent('.form-input').addClass('is-invalid');
            $('#register-password').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-password').focus();
        }
        if (!mob_filter.test($('#register-mobile').val())) {
            $('#register-mobile').parent('.form-input').addClass('is-invalid');
            $('#register-mobile').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-mobile').focus();
        }
        if ($('#register-mobile').val().trim().length < 4) {
            $('#register-mobile').parent('.form-input').addClass('is-invalid');
            $('#register-mobile').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-mobile').focus();
        }
        if (!mail_filter.test($('#register-email').val())) {
            $('#register-email').parent('.form-input').addClass('is-invalid');
            $('#register-email').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-email').focus();
        }
        if ($('#register-last-name').val().trim().length < 2) {
            $('#register-last-name').parent('.form-input').addClass('is-invalid');
            $('#register-last-name').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-last-name').focus();
        }
        if ($('#register-first-name').val().trim().length < 2) {
            $('#register-first-name').parent('.form-input').addClass('is-invalid');
            $('#register-first-name').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-first-name').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Forgot Password Form Validation
    $('#forgot-submit').click(function () {
        var clck_invld = 0,
        mail_filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/,
        bot_number, bot_number_array, total;
        if ($('#forgot-bot').val().trim().length < 1) {
            $('#forgot-bot').parent('.form-input').addClass('is-invalid');
            $('#forgot-bot').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#forgot-bot').focus();
        } else if ($('#forgot-bot').val().trim().length > 0) {
            bot_number = $('#forgot-bot+label').text();
            bot_number_array = bot_number.match(/[\d\.]+/g);
            total = 0;
            if (bot_number_array.length > 0) {
                $.each(bot_number_array, function (key, element) {
                    total += +element;
                });
                if ($('#forgot-bot').val().trim() !== total.toString()) {
                    $('#forgot-bot').parent('.form-input').addClass('is-invalid');
                    $('#forgot-bot').parent('.form-input').addClass('is-dirty');
                    clck_invld = 1;
                    $('#forgot-bot').focus();
                }
            } else {
                $('#forgot-bot').parent('.form-input').addClass('is-invalid');
                $('#forgot-bot').parent('.form-input').addClass('is-dirty');
                clck_invld = 1;
                $('#forgot-bot').focus();
            }
        }

        if (!mail_filter.test($('#forgot-email').val())) {
            $('#forgot-email').parent('.form-input').addClass('is-invalid');
            $('#forgot-email').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#forgot-email').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Profile Change Password Form Validation
    $('#change-password-submit').click(function () {
        var clck_invld = 0;
        if (!($('#change-password-confirm').val().trim() == $('#change-password-new').val().trim())) {
            $('#change-password-confirm').parent('.form-input').addClass('is-invalid');
            $('#change-password-confirm').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#change-password-confirm').focus();
        }
        if ($('#change-password-confirm').val().trim().length < 6) {
            $('#change-password-confirm').parent('.form-input').addClass('is-invalid');
            $('#change-password-confirm').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#register-confirm-password').focus();
        }
        if ($('#change-password-new').val().trim().length < 6) {
            $('#change-password-new').parent('.form-input').addClass('is-invalid');
            $('#change-password-new').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#change-password-new').focus();
        }
        if ($('#change-password-old').val().trim().length < 4) {
            $('#change-password-old').parent('.form-input').addClass('is-invalid');
            $('#change-password-old').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#change-password-old').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Change Password Form Validation
    $('#changepassword-submit').click(function () {
        var clck_invld = 0;
        if ($('#login-bot').val().trim().length < 1) {
            $('#login-bot').parent('.form-input').addClass('is-invalid');
            $('#login-bot').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#login-bot').focus();
        } else if ($('#login-bot').val().trim().length > 0) {
            var bot_number = $('#login-bot+label').text(),
            bot_number_array = bot_number.match(/[\d\.]+/g),
            total = 0;
            if (bot_number_array.length > 0) {
                $.each(bot_number_array, function (key, element) {
                    total += +element;
                });
                if ($('#login-bot').val().trim() !== total.toString()) {
                    $('#login-bot').parent('.form-input').addClass('is-invalid');
                    $('#login-bot').parent('.form-input').addClass('is-dirty');
                    clck_invld = 1;
                    $('#login-bot').focus();
                }
            } else {
                $('#login-bot').parent('.form-input').addClass('is-invalid');
                $('#login-bot').parent('.form-input').addClass('is-dirty');
                clck_invld = 1;
                $('#login-bot').focus();
            }
        }
        if (!($('#changepassword-confirm').val().trim() == $('#changepassword').val().trim())) {
            $('#changepassword-confirm').parent('.form-input').addClass('is-invalid');
            $('#changepassword-confirm').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#changepassword-confirm').focus();
        }
        if ($('#changepassword-confirm').val().trim().length < 6) {
            $('#changepassword-confirm').parent('.form-input').addClass('is-invalid');
            $('#changepassword-confirm').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#changepassword-confirm').focus();
        }
        if ($('#changepassword').val().trim().length < 6) {
            $('#changepassword').parent('.form-input').addClass('is-invalid');
            $('#changepassword').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#changepassword-new').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });

    //Subscribe Form Validation
    $('#subscribe-submit').click(function () {
        var clck_invld = 0,
        mail_filter = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
        if (!mail_filter.test($('#subscribe-email').val())) {
            $('#subscribe-email').parent('.form-input').addClass('is-invalid');
            $('#subscribe-email').parent('.form-input').addClass('is-dirty');
            clck_invld = 1;
            $('#subscribe-email').focus();
        }
        if (clck_invld === 1) {
            return false;
        }
    });
	
	
	//Dropzone.autoDiscover = false;
    $("#appointment-image-upload").dropzone({
        addRemoveLinks: true,
        acceptedFiles: "image/*,application/pdf",
        maxFilesize: 5,
        autoProcessQueue: false,
        dictDefaultMessage: 'Drop files here or click here to upload <br /><br /> Only Image',
        init: function() {
            var appointmentImageDropzone = this;
			var appointment_id = $('.appointment-id').val();
            $('#appointment-image-upload-modal').on('click', '.upload-appointment-image', function (e) {
                e.preventDefault();
                if (appointmentImageDropzone.files.length <= 0) {
                    toastr.error('Error', 'Please select file to upload.');
                    return false;
                }

                if ($('#appointment-image-upload-modal input[name=appointment_image_name]').val() === "") {
                    toastr.error('Error', 'Enter report/document name...');
                    return false;
                }

                $('body').block({
                    message: '<div class="font-14"><div class="icon-refresh spinner mr-2 d-inline-block"></div>Uploading ...</div>',
                    baseZ: 2000,
                    overlayCSS: { backgroundColor: '#fff', opacity: 0.8, cursor: 'wait' },
                    css: { border: 0, padding: '10px 15px', color: '#333', width: 'auto', backgroundColor: 'transparent' }
                });
                appointmentImageDropzone.processQueue();
            });

            this.on("sending", function(file, xhr, formData) {
                formData.append("id", appointment_id);
                formData.append("patient", $('.patient-id').val());
                formData.append("appointment_image_name", $('#appointment-image-upload-modal input[name=appointment_image_name]').val());
                formData.append("_token", $('.token').val());
            });

            this.on("success", function(file, xhr) {
                var response = JSON.parse(xhr);
				var appointment_image_name = $('#appointment-image-upload-modal input[name=appointment_image_name]').val();
                if (response.error === false) {
					$('.report-container').append('<div class="report-image">'+
						'<a data-fancybox="gallery" href="../public/uploads/appointment/images/'+appointment_id+'/'+response.name+'">'+
						'<img class="blur_img" src="../public/uploads/appointment/images/'+appointment_id+'/'+response.name+'" alt="'+appointment_image_name+'">'+
						'<span>'+appointment_image_name+'</span>'+
						'</a>'+
						'<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="fas fa-times"></a></div>'+
						'<input type="hidden" name="image_name" value="'+response.name+'">'+
						'</div>');
                    toastr.success('Uploaded Succefully', 'Image uploaded Succefully.');
                } else {
                    toastr.error('Upload Error', response.message);
                }
                $('#appointment-image-upload-modal input[name=appointment_image_name]').val('');
                appointmentImageDropzone.removeFile(file);
                $('#appointment-image-upload-modal').modal('hide');
                $.unblockUI();
            });

            this.on("error", function(file, message) { 
                toastr.error('Error', message);
                this.removeFile(file); 
            });
        },
    });

     $("#optician-referral-upload").dropzone({
         addRemoveLinks: true,
         acceptedFiles: "image/*",
         maxFilesize: 1,
         maxFiles:1,
         autoProcessQueue: false,
         dictDefaultMessage: 'Drop files here or click here to upload <br /><br /> Only Image',
         init: function() {
             var reportDropzone = this;
             $('#reports-modal').on('click', '.upload-report', function (e) {
                 e.preventDefault();
                 if (reportDropzone.files.length <= 0) {
                     toastr.error('Error', 'Please select file to upload.');
                     return false;
                 }

                 $('body').block({
                     message: '<div class="font-14"><div class="icon-refresh spinner mr-2 d-inline-block"></div>Uploading ...</div>',
                     baseZ: 2000,
                     overlayCSS: { backgroundColor: '#fff', opacity: 0.8, cursor: 'wait' },
                     css: { border: 0, padding: '10px 15px', color: '#333', width: 'auto', backgroundColor: 'transparent' }
                 });
                 reportDropzone.processQueue();
             });

             this.on("sending", function(file, xhr, formData) {
                 formData.append("id", $('.patient-id').val());
                 formData.append("_token", $('#token').val());
             });

             this.on("success", function(file, xhr) {
                 var response = JSON.parse(xhr);
                 if (response.error === false) {

                     var patient_id = $('.patient-id').val();
                     $('#report-delete-div-'+patient_id).remove();
                     $('.report-container').append('<div class="report-image" id="report-delete-div-'+patient_id+'">'+
                         '<a data-fancybox="gallery" href="../public/uploads/patient/document/'+patient_id+'/'+response.name+'">'+
                         '<img class="img-thumbnail" src="../public/uploads/patient/document/'+patient_id+'/'+response.name+'" alt="">'+
                         '<span>'+response.name+'</span>'+
                         '</a>'+
                         '<div class="ddi-report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel"  data-patient-id="'+patient_id+'" data-file-name="'+response.name+'"></a></div>'+
                         '<input type="hidden" name="report_name" id="report_name" value="'+response.name+'">'+
                         '</div>');

                     toastr.success('Uploaded Succefully', 'Document uploaded Succefully.');
                 } else {
                     toastr.error('Upload Error', response.message);
                 }
                 reportDropzone.removeFile(file);
                 $('#reports-modal').modal('hide');
                 $.unblockUI();
             });

             this.on("error", function(file, message) {
                 toastr.error('Error', message);
                 this.removeFile(file);
             });
         },
     });

     $('.report-delete-action').on('click', function(){
         $('#patient_id').val($(this).data('patient-id'));
     });


     $('#delete-ddi-image').on('click', function(){
         var patient_id = $("#patient_id").val();
         var name = $("#report_name").val();

         removeDDIDocument(patient_id,name);
     });

     function removeDDIDocument(id,name) {
         $.ajax({
             type: 'POST',
             url: 'index.php?route=user/glaucoma/documentremove',
             data: {id: id,name:name},
             error: function() {
                 toastr.error('Error', 'File could not be deleted. Please try again...');
             },
             success: function(data) {
                 toastr.success('Success', 'File Deleted Succefully.');
                 $('#report-delete-div-'+id).remove();
             }
         });
     }

	$('body').on('click', '.report-delete', function () {
        var ele = $(this).parent('.report-image'),
        id = $('.appointment-id').val(),
        filename = ele.find('input[name=image_name]').val();
        removeReport(id, filename);
        ele.remove();
    });
	function removeReport(id, filename) {
        $.ajax({
            type: 'POST',
            url: 'index.php?route=images/appointmentImageRemove',
            data: {id: id, filename: filename},
            error: function() {
                toastr.error('Error', 'File could not be deleted. Please try again...');
            },
            success: function(data) {
                toastr.success('Success', 'File Deleted Succefully.');
            }
        });
    }

    $('#how_the_account_is_to_be_settled').on('change', function(){
		
		var selected_how_the_account_is_to_be_settled = $(this).children("option:selected").val();
		
		if(selected_how_the_account_is_to_be_settled == 'Not Applicable' || selected_how_the_account_is_to_be_settled == 'Self Funding'){
			
			$('#policyholders_name').attr('disabled', 'disabled');
			$('#medical_insurers_name').attr('disabled', 'disabled');
			$('#membership_number').attr('disabled', 'disabled');
			$('#scheme_name').attr('disabled', 'disabled');
			$('#authorisation_number').attr('disabled', 'disabled');
			$('#corporate_company_scheme').attr('disabled', 'disabled');
			$('#employer').attr('disabled', 'disabled');
			
			$('#policyholders_name').val('');
			$('#medical_insurers_name').val('');
			$('#membership_number').val('');
			$('#scheme_name').val('');
			$('#authorisation_number').val('');
			$('#corporate_company_scheme').val('');
            $('#employer').val('');
			
			$("#policyholders_name").addClass("readonly_input_class");
			$("#medical_insurers_name").addClass("readonly_input_class");
			$("#membership_number").addClass("readonly_input_class");
			$("#scheme_name").addClass("readonly_input_class");
			$("#authorisation_number").addClass("readonly_input_class");
			$("#corporate_company_scheme").addClass("readonly_input_class");
			$("#employer").addClass("readonly_input_class");
			
		} else {
			$('#policyholders_name').removeAttr('disabled');
			$('#medical_insurers_name').removeAttr('disabled');
			$('#membership_number').removeAttr('disabled');
			$('#scheme_name').removeAttr('disabled');
			$('#authorisation_number').removeAttr('disabled');
			$('#corporate_company_scheme').removeAttr('disabled');
			$('#employer').removeAttr('disabled');
			
			$("#policyholders_name").removeClass("readonly_input_class");
			$("#medical_insurers_name").removeClass("readonly_input_class");
			$("#membership_number").removeClass("readonly_input_class");
			$("#scheme_name").removeClass("readonly_input_class");
			$("#authorisation_number").removeClass("readonly_input_class");
			$("#corporate_company_scheme").removeClass("readonly_input_class");
			$("#employer").removeClass("readonly_input_class");
			
		}
	});

});





