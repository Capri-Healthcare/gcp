var isOptician;
var path = $('.site_url').val();

function fourdigits(number) {
    return (number < 1000) ? number + 1900 : number;
}

function roundNumber(number, decimals) {
    var newString;
    decimals = Number(decimals);
    if (decimals < 1) {
        newString = (Math.round(number)).toString();
    } else {
        var numString = number.toString();
        if (numString.lastIndexOf(".") == -1) {
            numString += ".";
        }
        var cutoff = numString.lastIndexOf(".") + decimals;
        var d1 = Number(numString.substring(cutoff, cutoff + 1)); 
        var d2 = Number(numString.substring(cutoff + 1, cutoff + 2)); 
        if (d2 >= 5) {
            if (d1 == 9 && cutoff > 0) {
                while (cutoff > 0 && (d1 == 9 || isNaN(d1))) {
                    if (d1 != ".") {
                        cutoff -= 1;
                        d1 = Number(numString.substring(cutoff, cutoff + 1));
                    } else {
                        cutoff -= 1;
                    }
                }
            }
            d1 += 1;
        }
        if (d1 == 10) {
            numString = numString.substring(0, numString.lastIndexOf("."));
            var roundedNum = Number(numString) + 1;
            newString = roundedNum.toString() + '.';
        } else {
            newString = numString.substring(0, cutoff) + d1.toString();
        }
    }
    if (newString.lastIndexOf(".") == -1) {
        newString += ".";
    }
    var decs = (newString.substring(newString.lastIndexOf(".") + 1)).length;
    for (var i = 0; i < decimals - decs; i++) newString += "0";
        return newString;
}

function update_total() {
    var total = 0;
    $('.item-price').each(function(i) {
        price = $(this).val();
        if (!isNaN(price)) { total += Number(price); }
    });

    var taxtotal = 0;
    $('.item-tax-price').each(function(i) {
        taxprice = $(this).val();
        if (!isNaN(taxprice)) { taxtotal += Number(taxprice); }
    });

    total = roundNumber(total, 2);
    taxprice = roundNumber(taxtotal, 2);
    var amount = roundNumber(+total + +taxprice , 2);

    $('.sub-total').val(total);
    $('.tax-total').val(taxprice);
    $('.total-amount').val(amount);
    $('.due-amount').val(amount);

    update_balance();
}

function update_balance() {
    var subtotal = Number($(".sub-total").val()),
    tax = Number($(".tax-total").val()),
    discount = Number($(".discount-total").val());
    var after_discount = (+subtotal) + (+tax);

    if ($('.discount-type').val() === "2") {
        var after_discount = subtotal - discount;
        after_discount = after_discount;
    } else {
        discount = discount * subtotal * 0.01;
        var after_discount = subtotal - discount;
        after_discount = roundNumber(after_discount, 2);
    }

    var due = (+after_discount + +tax) - $(".paid-amount").val();
    due = roundNumber(due, 2);
    var total = +after_discount + +tax;
    $('.discount_amount').val(discount);
    $('.total-amount').val(roundNumber(total, 2));
    $('.due-amount').val(due);
}

function update_price() {
    $('.item-row').each(function(){
        var row = $(this),
        price = row.find('.item-cost').val() * row.find('.item-quantity').val(),
        tax_price = roundNumber(row.find('.item-tax').find(':selected').data( "rate" ) * price * 0.01, 2);
        var tax = 0;
        row.find('.invoice-tax p').each(function() {
            var ele = $(this);
            tax_amount = roundNumber(ele.find('.invoice-tax-rate').val() * price * 0.01, 2);
            ele.find('.single-tax-price').val(tax_amount);
            tax += Number($(this).find('input.invoice-tax-rate').val()) * price * 0.01;
            
        });
        price = roundNumber(price, 2);
        tax_price = roundNumber(tax, 2);

        var unit_price = (+price) + (+tax_price);

        isNaN(price) ? row.find('.item-price').val("N/A") : row.find('.item-price').val(price);
        isNaN(unit_price) ? row.find('.item-total-price').val("N/A") : row.find('.item-total-price').val(price);
        isNaN(tax_price) ? row.find('.item-tax-price').html("N/A") : row.find('.item-tax-price').val(tax_price);
        update_total();
    });
}

function bind() {
    $(".item-cost").on('blur', update_price);
    $(".item-quantity").on('blur', update_price);
    $("body").on('change', '.item-tax', update_price);
    $("body").on('change', '.discount-type', update_price);
}

function reportPrice(e) {
    var price = $(e.currentTarget).find('option:selected').data('price');
    var rowCost = $(e.currentTarget).data('row');
    $("textarea[name='invoice[item]["+rowCost+"][cost]']").val(price);
    update_price()
}
function itemPrice(e) {
    var price = $(e.currentTarget).find('option:selected').data('price');
    var rowCost = $(e.currentTarget).data('row');
    $("textarea[name='invoice[item]["+rowCost+"][cost]']").val(price);
    update_price()
}

function reportPatient(e) {
    var patientid = $(e.currentTarget).find('option:selected').data('patientid');
    var rowCost = $(e.currentTarget).data('row');
    $("input[name='invoice[item]["+rowCost+"][patient_id]']").val(patientid);
}
function item_html(count) {

    if(isOptician == 0){
        var item_html = '<tr class="item-row">'+
            '<td class="">'+
            '<select name="invoice[item]['+count+'][name]" class="item-name form-control" onchange="reportPatient(event)" data-row="'+count+'"  required>'+
            '<option value="">Select Patient</option>'+
            patientOption+
            '</select>'+
            '<input type="hidden" name="invoice[item]['+count+'][patient_id]" value="">'+
            '</td>'+
            '<td class="invoice-item">'+
            '<select name="invoice[item]['+count+'][descr]" class="item-name form-control" data-row="'+count+'" onchange="reportPrice(event)" required>'+
            '<option value="">Select Report Type</option>'+
            itemDescriptionOption+
            '</select>'+
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][quantity]" class="item-quantity" required readonly>1</textarea>'+
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][cost]" class="item-cost" required onkeypress="return numericValidation(event)"></textarea>'+
            '</td>'+
            '<td class="invoice-tax">'+
            '<input type="hidden" name="invoice[item]['+count+'][taxprice]" class="item-tax-price" value="0" readonly>' +
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][price]" class="item-total-price" readonly></textarea>'+
            '<input type="hidden" class="item-price">'+
            '</td>' +
            '<td>' +
            '<a class="badge badge-warning badge-sm badge-pill add-taxes m-1">Add Taxes</a>' +
            '<a class="badge badge-danger badge-sm badge-pill delete m-1">Delete</a>' +
            '</td>' +
            '</tr>';
    }else{
        var item_html = '<tr class="item-row">'+
            '<td class="" tyle="width:20%">'+
            '<select name="invoice[item]['+count+'][name]" class="item-name form-control" onchange="itemPrice(event)" data-row="'+count+'"  required>'+
            '<option value="">Select Item</option>'+
            itemDescriptionOption+
            '</select>'+
            '</td>'+
            '<td class="invoice-item">'+
            '<textarea name="invoice[item]['+count+'][descr]" class="item-descr"></textarea>'+
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][quantity]" class="item-quantity" required>1</textarea>'+
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][cost]" class="item-cost" required onkeypress="return numericValidation(event)"></textarea>'+
            '</td>'+
            '<td class="invoice-tax">'+
            '<input type="hidden" name="invoice[item]['+count+'][taxprice]" class="item-tax-price" value="0" readonly>' +
            '</td>'+
            '<td class="">'+
            '<textarea type="text" name="invoice[item]['+count+'][price]" class="item-total-price" readonly></textarea>'+
            '<input type="hidden" class="item-price">'+
            '</td>' +
            '<td>' +
            '<a class="badge badge-warning badge-sm badge-pill add-taxes m-1">Add Taxes</a>' +
            '<a class="badge badge-danger badge-sm badge-pill delete m-1">Delete</a>' +
            '</td>' +
            '</tr>';
    }

    if (count === 0) {
        $(".invoice-items tbody").prepend(item_html);
    } else {
        $(".item-row:last").after(item_html);
    }
}

function initAutocomplete() {
    $(".item-name").autocomplete({
        source: path.concat('item/search'),
        minLength: 2,
        focus: function() { return false; },
        select: function( event, ui ) {
            var ele = $(this).parents('tr');
            ele.find(".item-name").val(ui.item.label);
            ele.find(".item-descr").val(ui.item.description);
            ele.find(".item-cost" ).val(roundNumber(ui.item.price, 2));
            ele.find(".item-total-price" ).val(roundNumber(ui.item.price,2));
            ele.find(".item-price" ).val(roundNumber(ui.item.price,2));
            update_price();
            return false;
        }
    });
}

function update_policy_details(){
    $.ajax({
        type: 'get',
        url: 'index.php?route=patient/search',
        data: { email: $("#patient-email").val() },
        error: function () {},
        success: function (response) {
            var patient_data = JSON.parse(response);
            //$('#medical_insurers_name option').eq(patient_data['authorisation_number']).prop('selected', true);
            $("#hidden_medical_insurers_name").val(patient_data['medical_insurers_name']);
            $("#hidden_policyholders_name").val(patient_data['policyholders_name']);
            $("#hidden_membership_number").val(patient_data['membership_number']);
            $("#hidden_scheme_name").val(patient_data['scheme_name']);
            $("#hidden_authorisation_number").val(patient_data['authorisation_number']);
            $("#hidden_employer").val(patient_data['employer']);
            if($('#insurers_data_div').is(':visible')){
                console.log(patient_data['medical_insurers_name']);
                //$('#medical_insurers_name option').eq(patient_data['medical_insurers_name']).prop('selected', true);
                $('#medical_insurers_name').val(patient_data['medical_insurers_name']);
                $("#policyholders_name").val(patient_data['policyholders_name']);
                $("#membership_number").val(patient_data['membership_number']);
                $("#scheme_name").val(patient_data['scheme_name']);
                $("#authorisation_number").val(patient_data['authorisation_number']);
                $("#employer").val(patient_data['employer']);
            }
        }
    });
}
function numericValidation(e) {
    var keyCode = e.keyCode || e.which;

    //Regex for Valid Characters i.e. Alphabets and Numbers.
    var regex = /^[0-9]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        return isValid
    }

    return isValid;
}

$(document).ready(function () {
    "use strict";
    var tax_html = '', items = [];

    $(".discount-total").on('blur', update_balance);
    $(".paid-amount").on('blur', update_balance);
    $(".patient-name").on('change', update_policy_details);
    $("#patient-email").on('change', update_policy_details);

    $(".patient-doctor").autocomplete({
        source: path.concat('doctor/search'),
        minLength: 2,
        focus: function() {return false;},
        select: function( event, ui ) {
            $('.patient-doctor').val(ui.item.label);
            $('.patient-doctor-id').val(ui.item.id);
            return false;
        }
    });

    $('.invoice-items').on('click', '.add-items', function () {
        if($(".item-row").length === 0) {
            item_html(0);
        } else {
            var count = $('.invoice-items table tr.item-row:last .item-name').attr('name').split('[')[2];
            count = parseInt(count.split(']')[0]) + 1;
            item_html(count);
        }
        initAutocomplete();
        bind();
    });

    $('#payment_method').on('change', function() {
        if($( "#payment_method option:selected" ).text() == 'Insurance'){
            $("#insurers_data_div").show();
            if($("#hidden_medical_insurers_name").val() == ''){
                update_policy_details();
            }
            $('#medical_insurers_name').val($("#hidden_medical_insurers_name").val());
            $("#policyholders_name").val($("#hidden_policyholders_name").val());
            $("#membership_number").val($("#hidden_membership_number").val());
            $("#scheme_name").val($("#hidden_scheme_name").val());
            $("#authorisation_number").val($("#hidden_authorisation_number").val());
            $("#employer").val($("#hidden_employer").val());
        } else {
            $('#medical_insurers_name').val("");
            $("#policyholders_name").val("");
            $("#membership_number").val("");
            $("#scheme_name").val("");
            $("#authorisation_number").val("");
            $("#employer").val("");
            $("#insurers_data_div").hide();
        }
    });

    $('body').on('click', `.add-taxes, .invoice-tax p`, function () {
        var ele = $(this).parents('.item-row').find('.invoice-tax');
        ele.addClass('tax-modal-open');
        ele.find('p').each(function() {
            var id = $(this).find('.invoice-tax-id').val();
            $('#addTax').find('#inv-taxes-'+id).prop('checked', true)
        });
        $('#addTax').modal('show');
    });
    
    $('#addTax').on('hidden.bs.modal', function (e) {
        $('.tax-modal-open').removeClass('tax-modal-open');
        $("#addTax input").prop("checked", false);
    });

    $('body').on('click', '.add-modal-taxes', function () {
        $('.tax-modal-open p').remove();
        
        var ele_target  = $('.tax-modal-open').parents('.item-row'),
        price = ele_target.find('.item-cost').val() * ele_target.find('.item-quantity').val(),
        count = ele_target.find('.item-name').attr('name').split('[')[2];
        count = parseInt(count.split(']')[0]);
        
        $("input:checkbox[name=modaltax]:checked").each(function(index, element){
            var ele = $(this), name = ele.siblings("label").text(), id = ele.val(), rate = ele.data('rate'),
            tax_amount = roundNumber(rate * price * 0.01, 2);

            $('.tax-modal-open').prepend('<p class="badge badge-light badge-sm badge-pill">'+
                name+
                '<input type="text" class="single-tax-price" name="invoice[item]['+count+'][tax]['+index+'][tax_price]" value="'+tax_amount+'" readonly>'+
                '<input type="hidden" class="invoice-tax-id" name="invoice[item]['+count+'][tax]['+index+'][id]" value="'+id+'">'+ 
                '<input type="hidden" name="invoice[item]['+count+'][tax]['+index+'][name]" value="'+name+'">' +
                '<input type="hidden" class="invoice-tax-rate" name="invoice[item]['+count+'][tax]['+index+'][rate]" value="' +rate+'">' +
                '</p>');
        });

        update_price();
        $('.tax-modal-open').removeClass('tax-modal-open');
        $('#addTax').modal('hide')
    });

    $('.invoice-items').on('click', '.delete', function () {
        var ele = $(this), ele_par = ele.parents('.item-row');
        if ($('.item-row').length > 1) {
            ele.parents('.item-row').remove();
        } else {
            toastr.error('One row is compulsory for invoice.', 'Warning');
        }
        bind();
        update_price()
        return false;
    });

    bind();

    initAutocomplete();
});