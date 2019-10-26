document.getElementById("youthidaydream-form").onsubmit = validate;

function validate() {
    var isValid = true;
    //Clear all error messages
    var errors = document.getElementsByClassName("err");

    for (var i = 0; i < errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //Check first name
    var name = document.getElementById("name").value;
    if (name == "") {
        var errName = document.getElementById("err-name");
        errName.style.visibility = "visible";
        isValid = false;
    }
    //check last name
    var email = document.getElementById("email").value;
    if (email == "") {
        var errLast = document.getElementById("err-email");//grab the span where we have a note
        errLast.style.visibility = "visible";
        isValid = false;
    }
    var gender = document.getElementById("gender").value;
    if (gender == "none") {
        var errGender = document.getElementById("err-gender");//grab the span where we have a note
        errGender.style.visibility = "visible";
        isValid = false;
    }
    var ethnicity = document.getElementById("ethnicity").value;
    if (ethnicity == "none") {
        var errEthnicity = document.getElementById("err-ethnicity");
        errEthnicity.style.visibility = "visible";
        isValid = false;
    }

    var phone = document.getElementById("phone").value;
    if (phone == "") {
        var errPhone = document.getElementById("err-phone");
        errPhone.style.visibility = "visible";
        isValid = false;
    }
    var grad = document.getElementById("grad").value;
    if (grad == "none") {
        var errGrad = document.getElementById("err-grad");
        errGrad.style.visibility = "visible";
        isValid = false;
    }
    var birth = document.getElementById("birth").value;
    if (birth == "none") {
        var errBirth = document.getElementById("err-birth");
        errBirth.style.visibility = "visible";
        isValid = false;
    }

    return isValid;
}

