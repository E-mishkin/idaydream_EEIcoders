//Add other field if other is selected
$("input[type=checkbox]").on("change", function () {
    if($("#otherDiv").is(":checked")) {
        $("#otherForm").css("display", "block");
    } else {
        $("#otherForm").css("display", "none");
    }
});

//Grab form for validation
document.getElementById("volunteer-form").onsubmit = validate;

function validate() {
    var isValid = true;

    //Clear all error messages
    var errors = document.getElementsByClassName("err");
    for (var i=0; i<errors.length; i++) {
        errors[i].style.visibility = "hidden";
    }

    //Check filing out dropdown list
    var filing = document.getElementById("filing").value;
    if (filing == "none") {
        var errFiling = document.getElementById("err-filing");
        errFiling.style.visibility = "visible";
        isValid = false;
    }

    //Check first name
    var first = document.getElementById("firstName").value;
    if (first == "") {
        var errFirst = document.getElementById("err-fname");
        errFirst.style.visibility = "visible";
        isValid = false;
    }

    //Check last name
    var last = document.getElementById("lastName").value;
    if (last == "") {
        var errLast = document.getElementById("err-lname");
        errLast.style.visibility = "visible";
        isValid = false;
    }

    //Check street address
    var street = document.getElementById("streetAddress").value;
    if (street == "") {
        var errStreet = document.getElementById("err-street");
        errStreet.style.visibility = "visible";
        isValid = false;
    }

    //Check city
    var city = document.getElementById("city").value;
    if (city == "") {
        var errCity = document.getElementById("err-city");
        errCity.style.visibility = "visible";
        isValid = false;
    }

    //Check state
    var state = document.getElementById("state").value;
    if (state == "none") {
        var errState = document.getElementById("err-state");
        errState.style.visibility = "visible";
        isValid = false;
    }

    //Check zip
    var zip = document.getElementById("zip").value;
    if (zip == "") {
        var errZip = document.getElementById("err-zip");
        errZip.style.visibility = "visible";
        isValid = false;
    }

    //Check phone
    var phone = document.getElementById("phone").value;
    if (phone == "") {
        var errPhone = document.getElementById("err-phone");
        errPhone.style.visibility = "visible";
        isValid = false;
    }

    //Check email
    var email = document.getElementById("email").value;
    if (email == "") {
        var errEmail = document.getElementById("err-email");
        errEmail.style.visibility = "visible";
        isValid = false;
    }

    //Check t-shirt
    var tshirt = document.getElementById("tshirt").value;
    if (tshirt == "none") {
        var errTshirt = document.getElementById("err-tshirt");
        errTshirt.style.visibility = "visible";
        isValid = false;
    }

    //Check interests
    var interests = document.getElementsByName("interests[]");
    if ($(interests).is(":checked")) {
        isValid = true;
    } else {
        var errInterests = document.getElementById("err-interests");
        errInterests.style.visibility = "visible";
        isValid = false;
    }

    //Check special skills
    var skills = document.getElementById("skills").value;
    if (skills == "") {
        var errSkills = document.getElementById("err-special");
        errSkills.style.visibility = "visible";
        isValid = false;
    }

    return isValid;

}