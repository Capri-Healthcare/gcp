// AlphaNumeric validation
function alphaNumericValidation(e) {
    var keyCode = e.keyCode || e.which;

    //Regex for Valid Characters i.e. Alphabets and Numbers.
    var regex = /^[A-Za-z0-9 ]+$/;

    //Validate TextBox value against the Regex.
    var isValid = regex.test(String.fromCharCode(keyCode));
    if (!isValid) {
        return isValid
    }

    return isValid;
}