/**
 * Appointment JS - Appointment js for klinikal theme
 * @version v3.0
 * @copyright 2019 Pepdev.
 */

var tabtitle;

 $(document).ready(function () {
 	"use strict";

 	if($("#apt-doctor").length){
        var data = $("#apt-doctor").data();
        data.doctor = $("#apt-doctor").val();
        initAppointmentDate(data);
    }

 	var today, disabledDays, weeklyHoliday, path = $('input.site_url').val();
    //National Holidays functions for Appointment Page
    function nationalDaysappointment(date) {
    	var d = new Date(date), month = '' + (d.getMonth() + 1), day = '' + d.getDate(), year = d.getFullYear(), date_string, i;
    	if (month.length < 2) { month = '0' + month; }
    	if (day.length < 2) { day = '0' + day; }

    	date_string = [year, month, day].join('-');
    	for (i = 0; i < disabledDays.length; i++) {
    		if (new Date(disabledDays[i]).toString() === new Date(date_string).toString()) {
    			return [true, 'ui-state-highlight', ''];
    		}
    	}
    	return [true];
    }
    //Weekly Holiday Function  for Appointment Page for Appointment Page
    function noWeekendsOrHolidaysAppointment(date) {
    	var day = date.getDay(),
    	noWeekend = [true];
    	noWeekend = [(day != weeklyHoliday['0'] && day != weeklyHoliday['1'] && day != weeklyHoliday['2'] && day != weeklyHoliday['3'] && day != weeklyHoliday['4'] && day != weeklyHoliday['5'] && day != weeklyHoliday['6'])];
    	return noWeekend[0] ? nationalDaysappointment(date) : [true, 'ui-state-highlight', ''];
    }
    function createAppointmentPopover(event) {
        var status = '';
        if (event.status == '1') { status = 'In Process'; }
        else if (event.status == '2') { status = 'Document Requested'; }
        else if (event.status == '3') { status = 'Confirmed'; }
        else if (event.status == '5') { status = 'Completed'; }
        else if (event.status == '6') { status = 'Cancelled'; }
        else { status = 'New'; }

        return '<div><span class="font-12">Date:</span> '+event.start.format($('.common_daterange_format').val())+' at '+event.time+' o\'clock</div>'+
        '<div><span class="font-12">Doctor:</span> '+event.doctor+'</div><div><span class="font-12">Status:</span> <span>'+status+'</span></div>';
    }

    function openAppointmentSidebar() {
        var ele = $(this), body = $('body');
        body.css('overflow', 'hidden');
        body.append('<div class="overlay"></div>');
        setTimeout(function() { $('.appointmet-sidebar').css('right', '0'); }, 50);

        $(".apnt-doctor").val(1);
        $('.apnt-doctor').trigger('change');
    }

    function closeAppointmentSidebar() {
        $('body').css('overflow', 'visible');
        $('.appointmet-sidebar').css('right', '-450px');
        $('#apnt-info input').val('');
        $('#apnt-info select').val('');

        $('#apnt-info .apnt-time').parent().show();
        $('#apnt-info .apnt-slot-time').attr('name', 'appointment[slot]');
        $('#apnt-info .apnt-time').attr('name', 'appointment[time]');
        $('#apnt-info .apnt-slot>div').remove();

        setTimeout(function() { $('.overlay').remove(); }, 200);
    }

    function getAppointmentSlot(data) {
        $.ajax({
            type: 'post',
            url: path.concat('appointment/makeanappointment'),
            data: { date: data.date, department: data.department, day: data.day, doctor: data.doctor, _token: $('.s_token').val() },
            error: function () {
                $('.appointment-loading').hide();
                $('.apnt-slot').append('<div class="font-14 text-danger">Error occured during connection.</div> ');
            },
            success: function (response) {
                $('#apnt-info .apnt-slot>div').remove();
                $('#apnt-info .apnt-slot input').remove();
                $('#apnt-info .apnt-time').parent().hide();
                $('#apnt-info .apnt-slot-time').attr('name', '');
                $('#apnt-info .apnt-time').attr('name', '');
                $('.apnt-slot').append(response);
            }
        });
    }

    function initAppointmentDate(data) {
        disabledDays = JSON.parse(data.national).split(', ');
        weeklyHoliday = data.weekly;
        $('.apnt-date').datepicker({
            dateFormat: $('.common_date_format').val(),
            maxDate: "+1M +10D",
            beforeShowDay: noWeekendsOrHolidaysAppointment,
            onSelect: function () {
                var curDate = $(this).datepicker('getDate');
                data.date = $.datepicker.formatDate("yy-mm-dd", curDate);
                data.day = curDate.getDay();
                getAppointmentSlot(data);
            }
        });
        $('.typed-date').datepicker({
            dateFormat: $('.common_date_format').val(),
            maxDate: "+1M +10D",
            beforeShowDay: noWeekendsOrHolidaysAppointment,
            onSelect: function () {
                var curDate = $(this).datepicker('getDate');
                data.typed_date = $.datepicker.formatDate("yy-mm-dd", curDate);
                data.day = curDate.getDay();
                // getAppointmentSlot(data);
            }
        });
    }

    function createAppointmentDate() {
        var ele = $('#apnt-info .apnt-doctor');
        $('#apnt-info .apnt-slot>div').remove();
        $('#apnt-info .apnt-slot>input').remove();
        if (ele.find('option:selected').val() == '') {
            $('#apnt-info .apnt-department').val('');
            return false;
        } else {
            var data = ele.find('option:selected').data();
            data.doctor = ele.find('option:selected').val();
            $('#apnt-info .apnt-department').val(data.department);
            initAppointmentDate(data);
        }
    }

    $('body').on('click', '.sidebar-close, .overlay', function () {
        closeAppointmentSidebar();
    });
    
    $('body').on('click', '#appointment-sidebar', function () {
        openAppointmentSidebar();
    });

    $('body').on('change', '#family_history_of_glaucoma', function () {
        var family_history_of_glaucoma = $('#family_history_of_glaucoma :selected').val();
        
        if(family_history_of_glaucoma == 'NO'){
            $('#relations_with_glaucoma_patient').prop('selectedIndex',0);
            $('.relations_with_glaucoma_patient').hide();
        }else{
            $('.relations_with_glaucoma_patient').show();
        }
    });

    $('#calendar').fullCalendar({
        events: path.concat('dashbaordappointment'),
        header: {left: 'prev,next today',center: 'title',right: 'listDay,listWeek,month'},
        views: {listDay: { buttonText: 'Today' },listWeek: { buttonText: 'Week' }},
        lazyFetching: true,
        loading: function (isLoading, view) {
            var ele = $('#calendar').parent('.panel-body');
            if (isLoading) {
                $(ele).block({
                    message: '<div class="font-16"><div class="ti-reload spinner mr-2 d-inline-block"></div>Loading ...</div>',
                    overlayCSS: {backgroundColor: '#fff',opacity: 0.8,cursor: 'wait'},
                    css: {border: 0,padding: '10px 15px',color: '#fff',width: 'auto',backgroundColor: '#333'},
                });
            } else {
                ele.unblock()
            }
        },
        defaultDate: moment().format("YYYY-MM-DD"),
        eventLimit: true,
        eventMouseover: function (event, jsEvent) {
            $(this).popover({
                container: '#calendar',
                html: true,
                title: event.title,
                content: createAppointmentPopover(event),
            }).popover('toggle');
        },
        eventMouseout: function (event, jsEvent, view) {
            $(this).popover('dispose');
        },
        eventClick: function (event, jsEvent, view) {
            $('#apnt-info .apnt-id').val(event.id);
            $('#apnt-info .patient-name').val(event.title);
            $('#apnt-info .patient-mail').val(event.email);
            $('#apnt-info .patient-mobile').val(event.mobile);
            $('#apnt-info .apnt-doctor').val(event.doctor_id);
            $('#apnt-info .apnt-department').val(event.department_id);
            $('#apnt-info .apnt-date').val(event.start.format($('.common_daterange_format').val()));
            $('#apnt-info .typed-date').val(event.start.format($('.common_daterange_format').val()));
            $('#apnt-info .apnt-time').val(event.time);
            $('#apnt-info .apnt-slot-time').val(event.slot);
            $('#apnt-info .apnt-status').val(event.status);

            createAppointmentDate();
            openAppointmentSidebar();
        },
        dayClick: function (date, event, view) {
            if (date.format('YYYY-MM-DD') >= new moment().format('YYYY-MM-DD')) {
                openAppointmentSidebar();
            }
            return false;
        }
    });

    $('#apnt-info .apnt-doctor').on('change', function () {
        $('#apnt-info .apnt-date').datepicker('destroy');
        $('#apnt-info .apnt-date').val('');

        $('#apnt-info .apnt-time').parent().show();
        $('#apnt-info .apnt-slot-time').attr('name', 'appointment[slot]');
        $('#apnt-info .apnt-time').attr('name', 'appointment[time]');

        createAppointmentDate();
    });

    if (typeof $('#appointment-info .apnt-doctor option:selected').val() !== "undefined" && $('#appointment-info .apnt-doctor option:selected').val() !== "") {
    	createAppointmentDate();
    }

    $('.apnt-user').on('click','.edit', function () {
        var ele = $('.apnt-user-input');
        if (ele.css('display') === "none") { ele.slideDown(); }
        else { ele.slideUp(); }
    });

    //Notes Search
    $('.notes-form').on('click', '.input-group span', function () {
        var ele = $(this), ele_input = ele.parents('.input-group').find('input'), content = ele_input.val(), name = ele_input.data('name');
        if (content === "") { return false; }
        $('.notes-'+name).find('.descr ul').append('<li>'+content+'<input type="hidden" name="notes[notes]['+name+'][]" value="'+content+'"> <span class="ti-close delete"></span></li>');
        ele_input.val('');
    });

    $('.notes-form-video').on('click', '.input-group span', function () {
        var ele = $(this), ele_input = ele.parents('.input-group').find('input'), content = ele_input.val(), name = ele_input.data('name');
        if (content === "") { return false; }
        $('.notes-'+name).find('.descr ul').append('<li>'+content+'<input type="hidden" name="notes[notes]['+name+'][]" value="'+content+'"> <span class="ti-close delete"></span></li>');
        ele_input.val('');

        updateClinicalNoteWithVideoCall();
    });

    $('.notes-container').on('click','.delete', function () {
        $(this).parent('li').remove(); 
        updateClinicalNoteWithVideoCall();
    });

    $(".notes-form .input-group input").autocomplete({
        source: function(request, response) {
            $.getJSON(path.concat('notes/search'), { term: request['term'], type: this.element[0].dataset.name }, response);
        },
        minLength: 3,
        focus: function() {return false;},
        select: function( event, ui ) {
            $(this).val(ui.item.label);
            return false;
        }
    });

    function updateClinicalNoteWithVideoCall(){
        $.ajax({
            type: 'POST',
            url: 'index.php?route=appointment/clinicalNoteUpdate',
            data: $('#frmClinicalNotes').serialize() ,
            error: function() {
                toastr.error('Error', 'Clinical note not save. Please try again...');
            },
            success: function(data) {
                toastr.success('', 'Clinical note successfully saved.');
            }
        });
    } 

    $('#savePrescription').on('click', function () {
        $.ajax({
            type: 'POST',
            url: 'index.php?route=appointment/prescriptionUpdate',
            data: $('#frmPrescription').serialize() ,
            error: function() {
                toastr.error('Error', 'Prescription not save. Please try again...');
            },
            success: function(data) {
                toastr.success('', 'Prescription successfully saved.');
            }
        });
    });
    
    $('.saveExaminationForms').on('click', function () {
        var form_id = $(this).val();
        
        var formData = new FormData($('#examinationForms'+form_id)[0]);
        $.ajax({
            type: 'POST',
            url: 'index.php?route=appointment/clinicalNoteUpdate',
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            error: function() {
                toastr.error('Error', 'Examination forms not save. Please try again...');
            },
            success: function(data) {
                toastr.success('', 'Examination forms successfully saved.');
            }
        });
    });


});

function tabClick(e) {
    tabtitle = $("#tabtitle").val();
    $("#tabtitle").val($(e.currentTarget).data('title'));
    if(tabtitle == 'examination'){
        $('body').find('.active').removeClass("active");
        $("#examination").addClass('active');
        $("#appointment-records").addClass('active');
        $("#modal-examination-popup").modal('show');
    }
    if(tabtitle == 'appointment-info'){
        $('body').find('.active').removeClass("active");
        //Add extra class to active inner appointment data 
        // $('.nav-item').addClass('active show');
        $('.appointment-date').each(function(i) {
            console.log(i);
            if(i == 0){
                $('.appointment-date:first').addClass('active');
            }
        });
        $('.examination-note-tab-pane:first').addClass('active');
        $("#appointmentinfo").addClass('active');
        $("#appointment-info").addClass('active');
        $("#modal-examination-popup").modal('show');
    }
    if(tabtitle == 'prescription'){
        $('body').find('.active').removeClass("active");
        $("#prescription").addClass('active');
        $("#appointment-prescription").addClass('active');
        $("#modal-examination-popup").modal('show');
    }

}

function examinationOk(){
    $('body').find('.active').removeClass("active");
    $("#tabtitle").val(tabtitle);
    $("#modal-examination-popup").modal('hide');
    if(tabtitle == 'examination'){
        $("#examination").addClass('active');
        $("#appointment-records").addClass('active');
    }
    if(tabtitle == 'appointment-info'){
        $("#appointmentinfo").addClass('active');
        $("#appointment-info").addClass('active');
    }
    if(tabtitle == 'prescription'){
        $("#prescription").addClass('active');
        $("#appointment-prescription").addClass('active');
    }
}