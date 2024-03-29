/**
 * Admin JS - admin js for klinikal theme
 * @version v3.0
 * @copyright 2020 Pepdev.
 */
 Dropzone.autoDiscover = false;
 $(document).ready(function () {
    "use strict";
    var path = $('.site_url').val();

    //********************************************
    //Data-Title Tool tip bootstrap **************
    //********************************************
    $('[data-toggle="tooltip"]').tooltip();
    $('[data-toggle="popover"]').popover()

    //*************************************************
    //Left Side menu  *********************************
    //*************************************************
    $('body').on('click', '.menu-close', function () {
        var ele = $(this);
        $('#main-wrapper').addClass('page-menu-small');
        ele.find('i').removeClass('fa-hand-point-left');
        ele.find('i').addClass('fa-hand-point-right');
        ele.removeClass('menu-close');
        ele.addClass('menu-open');
    });

    $('body').on('click', '.menu-open', function () {
        var ele = $(this);
        $('#main-wrapper').removeClass('page-menu-small');
        ele.find('i').removeClass('fa-hand-point-right');
        ele.find('i').addClass('fa-hand-point-left');
        ele.removeClass('menu-open');
        ele.addClass('menu-close');
    });

    if ($('.page-search input').length) {
        $(".page-search input").autocomplete({
            source: path.concat('patient/search'),
            minLength: 2,
            focus: function() {
                return false;
            },
            select: function(event, ui) {
                window.location.href = $('.site_url').val().concat('patient/view&id='+ui.item.id);
                return false;
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append('<div>' + item.label + '<div class="font-12"> ( ' + item.email + ' )</div><div class="font-12"> ( ' + item.mobile + ' )</div></div>')
            .appendTo( ul );
        };
    }

    if ($('.patient-name').length) {
        $(".patient-name").autocomplete({
            source: path.concat('patient/search'),
            minLength: 2,
            focus: function() {return false;},
            select: function( event, ui ) {
                $('.patient-id').val(ui.item.id);
                $('.patient-name').val(ui.item.label);
                $('.patient-mail').val(ui.item.email);
                $('.patient-mobile').val(ui.item.mobile);
                return false;
            }
        }).autocomplete( "instance" )._renderItem = function( ul, item ) {
            return $( "<li>" )
            .append('<div>' + item.label + '<div class="font-12"> ( ' + item.email + ' )</div><div class="font-12"> ( ' + item.mobile + ' )</div></div>')
            .appendTo( ul );
        };
    }

    //Left side Sub Menu
    $('body').on('click', 'li.has-sub > a', function () {
        var ele = $(this), target = ele.parent('li.has-sub').find('ul.sub-menu:first');
        ele.parent('li.has-sub').siblings('li').find('a .arrow').removeClass('rotate');
        if (target.css('display') === "none") {
            ele.parent('li.has-sub').siblings('li').find('.sub-menu').slideUp();
            ele.find('.arrow').addClass('rotate');
            target.slideDown();
        } else {
            ele.parent('li.has-sub').find('.arrow').removeClass('rotate');
            ele.parent('li.has-sub').find('ul.sub-menu').slideUp();
        }
        return false;
    });

    //Open Left Side Menu in mobile
    $('body').on('click', '.open-left-menu', function () {
        var ele = $('.menu-wrapper'), nav_ele = $('.navbar-container');
        $('body').append('<div class="menu-overlay"></div>');
        ele.addClass('menu-mobile-open');
        nav_ele.addClass('menu-mobile-open');
    });
    //Close Left Side Menu in mobile
    $('body').on('click', '.menu-overlay', function () {
        $('.menu-wrapper, .navbar-container').removeClass('menu-mobile-open');
        $('.menu-overlay').remove();
    });


    function openSideNav() {
        $('body').addClass('sidenav-active');
        $('.sidenav').css('right', '0');
    }

    function closeSideNav() {
        $('.sidenav').css('right', '-60%');
        $('body').removeClass('sidenav-active');
    }

    //Open Page hdr right menu in Mobile
    $('body').on('click', '.open-page-menu-desktop', function () {
        var ele = $('.page-hdr-desktop');
        $('.page-search').slideUp(300);
        if (ele.css('display') === "none") {
            ele.slideDown(300);
        } else {
            ele.slideUp(300);
        }
    });
    //Open Page search in mobile
    $('body').on('click', '.open-mobile-search', function () {
        var ele = $('.page-search');
        $('.page-hdr-desktop').slideUp(300);
        if (ele.css('display') === "none") {
            ele.slideDown(300);
        } else {
            ele.slideUp(300);
        }
    });

    //*************************************************
    //Perfect Scrollbar  ******************************
    //************************************************* 
    if ($('.menu-fixed').length > 0 && $('.menu-wrapper').length > 0) {
        new PerfectScrollbar('.menu-fixed .menu-wrapper .menu ul', {
            wheelSpeed: 2,
            minScrollbarLength: 20
        });
    }

    //********************************************
    //Delete Item From List **********************
    //********************************************
    $('.table-delete').click(function () {
        $('.delete-card-button input.delete-id').val($(this).find('input').val());
        $("#delete-card").modal({
            keyboard: true
        });
    });

    $('#delete-card').on('hidden.bs.modal', function (e) {
        $('.delete-card-button input.delete-id').val('');
    });

    //********************************************
    //Image  Uplaod ******************************
    //********************************************
    $('#media-upload').on('show.bs.modal', function (e) {
        var uploaded = $('#media-upload .uploaded');
        if (uploaded.val() === '0') {
            var path = $('.site_url').val().concat('get/media');
            $.ajax({
                type: 'get',
                url: path,
                data: { name: 'media', _token: $('.s_token').val() },
                error: function () {},
                success: function (response) {
                    $('#media-upload .media-all').append(response);
                    uploaded.val('1');
                }
            });
        }
        $('#media-upload .media-all').addClass('media-modal-open');
    });

    $('.image-upload').click(function () {
        $(this).parent().addClass('image-upload-progress');
        $("#media-upload").modal('show');
    });

    $("#media-upload").on('hidden.bs.modal', function () {
        $(this).parent().find('.image-upload-progress').removeClass('image-upload-progress');
        $('#media-upload .media-all').removeClass('media-modal-open');
    });

    //Dropzone.autoDiscover = false;
    $("#media-dropzone").dropzone({
        addRemoveLinks: false,
        acceptedFiles: "image/*",
        maxFilesize: 5,
        autoProcessQueue: true,
        dictDefaultMessage: 'Drop files here or click here to upload <br /><br /> Only Image',
        init: function() {
            var reportDropzone = this;
            reportDropzone.on("sending", function(file, xhr, formData) {
                formData.append("_token", $('.s_token').val());
            });

            reportDropzone.on("success", function(file, xhr) {
                var response = JSON.parse(xhr);
                if (response.error === false) {
                    $('.media-all').prepend(response.media);
                    toastr.success('Uploaded successfully', 'Report uploaded successfully.');
                } else {
                    toastr.error('Error', response.message);
                }
                reportDropzone.removeFile(file);
            });

            reportDropzone.on("error", function(file, message) {
                toastr.error('Error', message);
                reportDropzone.removeFile(file);
            });
        },
    });

    $('#media-upload').on('click', '.media-modal-open .picture', function () {
        var image = $(this).find('input').val();
        $('.image-upload-progress .saved-picture').append('<img src="../public/uploads/' + image + '" alt="">');
        $('.image-upload-progress .saved-picture input[type=hidden]').val(image);
        $('.image-upload-progress .saved-picture').show();
        $('.image-upload-progress .image-upload').hide();
        $('.image-upload-progress .saved-picture-delete').show();
        $('.content-input').removeClass('image-upload-progress');
        $('#media-upload').modal('hide');
    });

    //Image Delete 
    $('.media-all').on('click', '.block .remove', function () {
        var ele = $(this), ele_par = ele.parent(),
        media = ele_par.find('.picture input').val(),
        id = ele_par.find('.block-id').val();
        $.ajax({
            method: "POST",
            url: path.concat('media/delete'),
            data: { page: 'media', name: media, id: id, _token: $('.s_token').val() },
            error: function () {
                alert('Sorry Try Again!');
            },
            success: function (response) {
                response = JSON.parse(response);
                if (response.error === false) {
                    ele.parents('.media-all-block').remove();
                    toastr.success('Deleted', 'File deleted successfully.');
                } else {
                    toastr.success('Wanrning', 'File could not be deleted!.');
                }
            }
        });
    });

    $('.saved-picture-delete').click(function () {
        $(this).siblings('.saved-picture').find('img').remove();
        $(this).siblings('.saved-picture').find('input').val('');
        $(this).siblings('.saved-picture').hide();
        $(this).siblings('.image-upload').show();
        $(this).hide();
    });

    function removeReport(appointment_id, report_id, report_name) {
        $.ajax({
            type: 'POST',
            url: 'index.php?route=report/removeReport',
            data: {id: appointment_id, name: report_name, _token: $('.s_token').val()},
            error: function() {
                toastr.error('Error', 'File could not be deleted. Please try again...');
            },
            success: function(data) {
                toastr.success('', 'File Deleted successfully.');
				$('#report-delete-div-'+report_id).remove();
            }
        });
    }


     function removeOpticianDocument(referral_list_id,id, filename) {
         $.ajax({
             type: 'POST',
             url: 'index.php?route=optician-referral/report/removeReport',
             data: {id: referral_list_id, name: filename, _token: $('#token').val()},
             error: function() {
                 toastr.error('Error', 'File could not be deleted. Please try again...');
             },
             success: function(data) {
                 toastr.success('', 'File Deleted successfully.');
                 $('#report-delete-div-'+id).remove();
             }
         });
     }

     function removeFollowupDocument(referral_list_id,id,optician_id, filename) {
         $.ajax({
             type: 'POST',
             url: 'index.php?route=follow-up/report/removeReport',
             data: {id: referral_list_id, name: filename,optician_id:optician_id, _token: $('#token').val()},
             error: function() {
                 toastr.error('Error', 'File could not be deleted. Please try again...');
             },
             success: function(data) {
                 toastr.success('', 'File Deleted successfully.');
                 $('#report-delete-div-'+id).remove();
             }
         });
     }

    function moveImageToReport(image_id) {

        $.ajax({
            type: 'POST',
            url: 'index.php?route=appointment/moveImageToReport',
            data: {image_id: image_id, _token: $('.s_token').val()},
            error: function() {
                toastr.error('Error', 'File could not be moved. Please try again...');
            },
            success: function(data) {
                toastr.success('', 'File Moved successfully.');
				
				$('#move-image-to-report-div-'+image_id).remove();
            }
        });
    }

    //Dropzone.autoDiscover = false;
    $("#report-upload").dropzone({
        addRemoveLinks: true,
        acceptedFiles: "image/*,application/pdf",
        maxFilesize: 5,
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

                if ($('#reports-modal select[name=report_name]').val() === "") {
                    toastr.error('Error', 'Enter report/document name...');
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
                formData.append("id", $('.appointment-id').val());
                formData.append("email", $('.apnt-email').val());
                formData.append("patient", $('.patient-id').val());
                formData.append("report_name", $('#reports-modal select[name=report_name]').val());
                formData.append("_token", $('.s_token').val());
            });

            this.on("success", function(file, xhr) {
                var response = JSON.parse(xhr);
                if (response.error === false) {
                    var appointment_id = $('.appointment-id').val()
                    if (response.ext === "pdf") {
                        $('.report-container').append('<div class="report-image report-pdf">'+
                            '<a href="../public/uploads/reports/appointment/'+appointment_id+'/'+response.name+'" class="open-pdf">'+
                            '<img class="img-thumbnail" src="../public/images/pdf.png" alt="">'+
                            '<span>'+$('#reports-modal select[name=report_name]').val()+'</span>'+
                            '</a>'+
                            '<input type="hidden" name="report_name" value="'+response.name+'">'+
                            '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel"  data-appointment_id="" data-report_name="" data-report_id=""></a></div>'+
                            '</div>');
                    } else {
                        var examination = $('#reports-modal select[name=report_name]').find(':selected').attr('data-examination');
                        $('.report-container').append('<div class="report-image">'+
                            '<a data-fancybox="gallery" href="../public/uploads/appointment/reports/'+appointment_id+'/'+response.name+'">'+
                            '<img class="img-thumbnail" src="../public/uploads/appointment/reports/'+appointment_id+'/'+response.name+'" alt="">'+
                            '<span>'+$('#reports-modal select[name=report_name]').val()+'</span>'+
                            '</a>'+
                            '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel"  data-appointment_id="" data-report_name="" data-report_id=""></a></div>'+
                            '<input type="hidden" name="report_name" value="'+response.name+'">'+
                            '</div>');

                        if(examination != undefined || examination != null){
                            $('.'+examination).append('<div class="report-image">'+
                                '<a data-fancybox="gallery" href="../public/uploads/appointment/reports/'+appointment_id+'/'+response.name+'">'+
                                '<img class="img-thumbnail" src="../public/uploads/appointment/reports/'+appointment_id+'/'+response.name+'" alt="">'+
                                '<span>'+$('#reports-modal select[name=report_name]').val()+'</span>'+
                                '</a>'+
                                '</div>');
                        }
                    }
                    toastr.success('Uploaded successfully', 'Report uploaded successfully.');
                } else {
                    toastr.error('Upload Error', response.message);
                }
                $('#reports-modal input[name=report_name]').val('');
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


     $("#optician-referral-upload").dropzone({
         addRemoveLinks: true,
         acceptedFiles: "image/*,application/pdf",
         maxFilesize: 5,
         autoProcessQueue: false,
         dictDefaultMessage: 'Drop files here or click here to upload <br /><br /> Only Image or PDF',
         init: function() {
             var reportDropzone = this;
             $('#reports-modal').on('click', '.upload-report', function (e) {
                 e.preventDefault();
                 if ($('#reports-modal select[name=document_name]').val() === "") {
                     toastr.error('Error', 'Please Enter document name...');
                     return false;
                 }

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
                 formData.append("id", $('.optician-refrrel-id').val());
                 formData.append("name", $('#reports-modal select[name=document_name]').val());
                 formData.append("_token", $('#token').val());
             });

             this.on("success", function(file, xhr) {
                 var response = JSON.parse(xhr);
                 if (response.error === false) {
                     var optician_refrrel_id = $('.optician-refrrel-id').val() == undefined ? $('#optician_id').val():$('.optician-refrrel-id').val();
                     if (response.ext === "pdf") {
                         $('.report-container').append('<div class="report-image report-pdf">'+
                             '<a href="../public/uploads/optician-referral/document/'+optician_refrrel_id+'/'+response.name+'" class="open-pdf">'+
                             '<img class="img-thumbnail" src="../public/images/pdf.png" alt="">'+
                             '<span>'+$('#reports-modal select[name=document_name]').val()+'</span>'+
                             '</a>'+
                             '<input type="hidden" name="report_name" value="'+response.name+'">'+
                             '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action"  data-toggle="modal" data-target="#reportDeleteModel"  data-appointment_id="'+$('.optician-refrrel-id').val()+'" data-report_name="'+response.name+'" data-report_id="'+response.id+'"></a></div>'+
                             '</div>');
                     } else {
                         $('.report-container').append('<div class="report-image" id="report-delete-div-'+response.id+'">'+
                             '<a data-fancybox="gallery" href="../public/uploads/optician-referral/document/'+optician_refrrel_id+'/'+response.name+'">'+
                             '<img class="img-thumbnail" src="../public/uploads/optician-referral/document/'+optician_refrrel_id+'/'+response.name+'" alt="">'+
                             '<span>'+$('#reports-modal select[name=document_name]').val()+'</span>'+
                             '</a>'+
                             '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel" data-appointment_id="'+$('.optician-refrrel-id').val()+'" data-report_name="'+response.name+'" data-report_id="'+response.id+'"></a></div>'+
                             '<input type="hidden" name="report_name" value="'+response.name+'">'+
                             '</div>');
                     }
                     location.reload()
                     toastr.success('Uploaded successfully', ' Document uploaded successfully');

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

     $("#followup-upload").dropzone({
         addRemoveLinks: true,
         acceptedFiles: "image/*,application/pdf",
         maxFilesize: 5,
         autoProcessQueue: false,
         dictDefaultMessage: 'Drop files here or click here to upload <br /><br /> Only Image or PDF',
         init: function() {
             var reportDropzone = this;
             $('#reports-modal').on('click', '.upload-report', function (e) {
                 e.preventDefault();
                 if ($('#reports-modal select[name=document_name]').val() === "") {
                     toastr.error('Error', 'Please Enter document name...');
                     return false;
                 }

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
                 formData.append("id", $('.optician-refrrel-id').val());
                 formData.append("name", $('#reports-modal select[name=document_name]').val());
                 formData.append("_token", $('#token').val());
             });

             this.on("success", function(file, xhr) {
                 var response = JSON.parse(xhr);
                 if (response.error === false) {
                     var followup_id = $('.followup-id').val();
                     if (response.ext === "pdf") {
                         $('.report-container').append('<div class="report-image report-pdf">'+
                             '<a href="../public/uploads/optician-referral/followup/'+followup_id+'/'+response.name+'" class="open-pdf">'+
                             '<img class="img-thumbnail" src="../public/images/pdf.png" alt="">'+
                             '<span>'+$('#reports-modal select[name=document_name]').val()+'</span>'+
                             '</a>'+
                             '<input type="hidden" name="report_name" value="'+response.name+'">'+
                             '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel"  data-appointment_id="" data-report_name="" data-report_id=""></a></div>'+
                             '</div>');
                     } else {
                         $('.report-container').append('<div class="report-image" id="report-delete-div-'+response.id+'">'+
                             '<a data-fancybox="gallery" href="../public/uploads/optician-referral/followup/'+followup_id+'/'+response.name+'">'+
                             '<img class="img-thumbnail" src="../public/uploads/optician-referral/followup/'+followup_id+'/'+response.name+'" alt="">'+
                             '<span>'+$('#reports-modal select[name=document_name]').val()+'</span>'+
                             '</a>'+
                             '<div class="report-delete" data-toggle="tooltip" title="" data-original-title="Delete"><a class="ti-close report-delete-action" data-toggle="modal" data-target="#reportDeleteModel"  data-appointment_id="" data-report_name="" data-report_id=""></a></div>'+
                             '<input type="hidden" name="report_name" value="'+response.name+'">'+
                             '</div>');
                     }
                     toastr.success('Uploaded successfully', 'Document uploaded successfully');
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
    //
    /*$('body').on('click', '.report-delete', function () {
        var ele = $(this).parent('.report-image'),
        id = $('.appointment-id').val(),
        name = ele.find('input[name=report_name]').val();
        removeReport(id, name);
        ele.remove();
    });*/
	
	$('#delete-report').on('click', function(){
        var appointment_id = $("#appointment_id").val();
		var report_id = $("#report_id").val();
		var report_name = $("#report_name").val();

        removeReport(appointment_id, report_id, report_name);
    });


     $('#delete-optician-referral').on('click', function(){
         var referral_list_id = $("#appointment_id").val();
         var id = $("#report_id").val();
         var filename = $("#report_name").val();

         removeOpticianDocument(referral_list_id, id, filename);
     });

     $('#delete-followup-referral').on('click', function(){
         var referral_list_id = $("#appointment_id").val();
         var id = $("#report_id").val();
         var optician_id = $("#optician_id").val();
         var filename = $("#report_name").val();

         removeFollowupDocument(referral_list_id, id,optician_id,filename);
     });


	$('.report-delete-action').on('click', function(){
		$('#appointment_id').val($(this).data('appointment_id'));
		$('#report_id').val($(this).data('report_id'));
		$('#report_name').val($(this).data('report_name'));
		//removeReport(id, name);
	});

	$('.move-image-to-report-action').on('click', function(){
		$('#source_image_id').val($(this).data('image_id'));
	});

	$('#move-image-to-report').on('click', function(){
        var image_id = $("#source_image_id").val();
        moveImageToReport(image_id);
    });

    $('body').on('click', '.patient-report-delete', function () {
        var ele = $(this).parent('.report-image'),
        id = ele.find('.report-appointment').val(),
        name = ele.find('input[name=report_name]').val();
        removeReport(id, name);
        ele.remove();
    });

    $('#reports-modal').on('hide.bs.modal', function (e) {
        if ($('.dz-preview').length) {
            location.reload();
        }
    });

    //********************************************
    //Admin Panel Left Side Menu *****************
    //********************************************
    //Left side Sub Menu 
    $('.menu-dropdown').click(function () {
        var ele = $(this);
        if (ele.siblings('.sub-menu').css('display') === 'none') {
            $('.sub-menu').slideUp();
            $('#menu-menu ul a').removeClass('menu-arrow-rotate');
            ele.addClass('menu-arrow-rotate');
            ele.siblings('.sub-menu').slideDown(200);
        } else {
            ele.removeClass('menu-arrow-rotate');
            $('.sub-menu').slideUp(200);
        }
    });


    //*************************************************
    //ThemeAccordion **********************************
    //*************************************************
    $('.theme-accordion:nth-child(1) .theme-accordion-bdy').slideDown();
    $('.theme-accordion:nth-child(1) .theme-accordion-control i').addClass('ti-minus');
    $('body').on('click', '.theme-accordion-hdr', function () {
        var ele = $(this);
        $('.theme-accordion-bdy').slideUp();
        $('.theme-accordion-control i').removeClass('ti-minus');
        if (ele.parents('.theme-accordion').find('.theme-accordion-bdy').css('display') === "none") {
            ele.find('.theme-accordion-control i').addClass('ti-minus');
            ele.parents('.theme-accordion').find('.theme-accordion-bdy').slideDown();
        } else {
            ele.find('.theme-accordion-control i').removeClass('ti-minus');
            ele.parents('.theme-accordion').find('.theme-accordion-bdy').slideUp();
        }
    });

    // Image Live Preview
    $('.adm-add-img p').click(function () {
        $('.adm-add-img img').remove();
        $('.adm-add-img').hide();
        $('#picture_container input[type=hidden]').val("");
        $('.picture').show();
    });


    //********************************************
    //Jaquery Ui Datepicker **********************
    //********************************************

    //User profile date picker
    $('#user-dob').datepicker({
        dateFormat: $('.common_date_format').val(),
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        maxDate:new Date()
    });

    $('.dateofbirth').datepicker({
        dateFormat: $('.common_date_format').val(),
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        max:new Date()
    });

    //Filter date picker
    $('.filter-date').datepicker({
        dateFormat: $('.common_date_format').val(),

    });

    //Filter date picker
    $('.date').datepicker({
        dateFormat: $('.common_date_format').val(),
        maxDate: new Date()
    });

     $('.due_date').datepicker({
         dateFormat: $('.common_date_format').val(),
         minDate: new Date()

     });


    
    //********************************************
    //Listing Table ******************************
    //********************************************

    var dataTable = $('.datatable-table').dataTable({
        aLengthMenu: [[10, 25, 50, 75, -1], [10, 25, 50, 75, "All"]],
        iDisplayLength: 25,
        pagingType: 'full_numbers',
        order: [],
        dom: "<'row align-items-center pb-3'<'col-sm-6 text-left'l><'col-sm-6 text-right'f>><'row'<'col-sm-12'tr>><'row align-items-center pt-3'<'col-sm-12 col-md-4'i><'col-sm-12 col-md-8 text-right dataTables_pager'p>>",
        responsive: true,
        //buttons: ["print", "copyHtml5", "excelHtml5", "csvHtml5", "pdfHtml5"],
        buttons: [
        {
            extend: 'print',
            autoPrint: true,
            customize: function (win) {
                $(win.document.body).find('h1').css('text-align','center');
                $(win.document.body).find('h1').css('font-size','20px');
            }
        },
        {
            extend: 'copyHtml5'
        },
        {
            extend: 'excelHtml5'
        },
        {
            extend: 'csvHtml5'
        }
        ],
        language: {
            "paginate": {
                "first":       '<i class="fa fa-angle-double-left"></i>',
                "previous":    '<i class="fa fa-angle-left"></i>',
                "next":        '<i class="fa fa-angle-right"></i>',
                "last":        '<i class="fa fa-angle-double-right"></i>'
            },
        }
    });



    $(".export-button .print").on("click", function(e) {
        e.preventDefault(); dataTable.button(0).trigger()
    });

    $(".export-button .copy").on("click", function(e) {
        e.preventDefault(); dataTable.button(1).trigger()
    });

    $(".export-button .excel").on("click", function(e) {
        e.preventDefault(); dataTable.button(2).trigger()
    });

    $(".export-button .csv").on("click", function(e) {
        e.preventDefault(); dataTable.button(3).trigger()
    });

    $(".export-button .pdf").on("click", function(e) {
        e.preventDefault(); dataTable.button(4).trigger()
    });
    
    //*************************************************
    //Full Screen  ************************************
    //*************************************************
    function launchIntoFullscreen(element) {
        if (element.requestFullscreen) {
            element.requestFullscreen();
        } else if (element.mozRequestFullScreen) {
            element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) {
            element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) {
            element.msRequestFullscreen();
        }
    }



    function exitFullscreen() {
        if (document.exitFullscreen) {
            document.exitFullscreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) {
            document.webkitExitFullscreen();
        }
    }

    $('body').on('click', '.page-fullscreen', function () {
        var ele = $(this), target_ele = ele.find('a .fa-expand');
        if (target_ele.length > 0) {
            launchIntoFullscreen(document.documentElement);
            target_ele.addClass('fa-compress');
            target_ele.removeClass('fa-expand');
        } else {
            exitFullscreen();
            ele.find('a i').addClass('fa-expand');
            ele.find('a i').removeClass('fa-compress');
        }
    });
	
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
			
		} else {
			$('#policyholders_name').removeAttr('disabled');
			$('#medical_insurers_name').removeAttr('disabled');
			$('#membership_number').removeAttr('disabled');
			$('#scheme_name').removeAttr('disabled');
			$('#authorisation_number').removeAttr('disabled');
			$('#corporate_company_scheme').removeAttr('disabled');
			$('#employer').removeAttr('disabled');
			
		}
	});


});



