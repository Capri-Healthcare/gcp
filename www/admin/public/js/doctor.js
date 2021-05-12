
 $(document).ready(function () {
    $('#updateAddress').on('click', function () {
        updateDoctorAddress();
    });

    $('.edit-address').on('click', function () {

        $('#address_id').val($(this).data('address_id'));
		$('#title').val($(this).data('title'));
        $('#address').val($(this).data('address'));
        $('#city').val($(this).data('city'));
		$('#pincode').val($(this).data('pincode'));
        $('#contact_number').val($(this).data('contact_number'));
        $('#email').val($(this).data('email'));
    });
    
 });


 function updateDoctorAddress(){
     
    $.ajax({
        type: 'POST',
        url: 'index.php?route=doctor/updateAddress',
        data: $('#frmDoctorAddress').serialize() ,
        error: function() {
            toastr.error('Error', 'Doctor address not save. Please try again...');
        },
        success: function(data) {
            toastr.success('', 'Doctor address succefully saved.');
            $('#frmDoctorAddress')[0].reset();
            $('#list-of-address').html(data);
        }
    });

 }