//Add other field into Ethnicity
$("#ethnicity").on("change", function () {
    var ethnicity = document.getElementById("ethnicity").value;
    if (ethnicity == "11") {
        $("#formEt").css("display", "block");
    } else {
        $("#formEt").css("display", "none");
    }
});



/*
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

var parentNAme = document.getElementById("parentNAme").value;
if (parentNAme == "") {
    var errparentName = document.getElementById("err-parentName");
    errparentName.style.visibility = "visible";
    isValid = false;
}

var parentEmail = document.getElementById("parentEmail").value;
if (parentEmail == "") {
    var errparentEmail = document.getElementById("err-parentEmail");
    errparentEmail.style.visibility = "visible";
    isValid = false;
}
var parentPhone = document.getElementById("parentPhone").value;
if (parentPhone == "") {
    var errparentPhone = document.getElementById("err-parentPhone");
    errparentPhone.style.visibility = "visible";
    isValid = false;
}
    return isValid;
}
*/

document.getElementById("email-form").onsubmit = validate;

function validate() {
    var isValid = true;
//Clear all error messages
    var errors = document.getElementsByClassName("err");

    for (var i = 0; i < errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

//Check first name
    var subject = document.getElementById("subject").value;
    if (subject === "") {
        var errSubject = document.getElementById("err-subject");
        errSubject.style.visibility = "visible";
        isValid = false;
    }
    //Check first name
    var message = document.getElementById("message").value;
    if (message === "") {
        var errMessage = document.getElementById("err-message");
        errMessage.style.visibility = "visible";
        isValid = false;
    }
    return isValid;
}
