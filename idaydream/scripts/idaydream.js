//Add other field if other is selected in "Interest" field
$("input[type=checkbox]").on("change", function () {
    if($("#otherDiv").is(":checked")) {
        $("#otherForm").css("display", "block");
    } else {
        $("#otherForm").css("display", "none");
    }
});

//Add other field if other is selected in "How did you hear about us"
$("#hear").on("change", function () {
    var hearSelect = document.getElementById("hear").value;
    if (hearSelect == "ot") {
        $("#form4").css("display", "block");
    } else {
        $("#form4").css("display", "none");
    }
});

//Check if you agree with policies
$("input[type=checkbox]").on("change", function () {
    if($("#policy").is(":checked")) {
        document.getElementById("submit").disabled = false;
    } else {
        document.getElementById("submit").disabled = true;
    }
});

//Check is background select
$("#yesBackground").on("click",function() {
    $("#warning-msg").css("display","none");
    $("#volunteer-form").css("display","block");
});
$("#noBackground").on("click",function(){
    $("#warning-msg").css("display","block");
    $("#volunteer-form").css("display","none");
});

//Add other field into volunteer availability
$("input[type=checkbox]").on("change", function () {
    if($("#weekend").is(":checked")) {
        $("#form5").css("display", "block");
    } else {
        $("#form5").css("display", "none");
    }
});

//Add new character references
$("#submit2").on("click", function () {

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

    //Check background
    var back = document.getElementsByName("background");
    if($(back).is(":checked")) {
        isValid = true;
    } else {
        var errBack = document.getElementById("err-yesno-back");
        errBack.style.visibility = "visible";
        isValid = false;
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

    /*
    //Check experience
    var experience = document.getElementById("experience").value;
    if (experience == "") {
        var errExperience = document.getElementById("err-experience");
        errExperience.style.visibility = "visible";
        isValid = false;
    }
     */

    //Check character references
    var character = document.getElementsByName("character[]");
    var characterValue = "";
    for (var i=0; i<character.length; i++) {
        if (character[i].value != "") {
            characterValue = character[i].value;
        }
    }

    if (characterValue == "") {
        var errCharacter = document.getElementById("err-character");
        errCharacter.style.visibility = "visible";
        isValid = false;
    }

    /*
    //Check volunteer
    var volunteer = document.getElementsByName("volunteerAvailability[]");
    if ($(volunteer).is(":checked")) {
    } else {
        var errVol = document.getElementById("err-volunteer");
        errVol.style.visibility = "visible";
        isValid = false;
    }
     */

    //Check motivated
    var motivated = document.getElementById("motivated").value;
    if (motivated == "") {
        var errMotivated = document.getElementById("err-motivated");
        errMotivated.style.visibility = "visible";
        isValid = false;
    }

    /*
    //Check How did you hear
    var hear = document.getElementById("hear").value;
    if (hear == "none") {
        var errHear = document.getElementById("err-hear");
        errHear.style.visibility = "visible";
        isValid = false;
    }
     */

    /*
    //Check mailing list
    var mailing = document.getElementsByName("mailList");
    if ($(mailing).is(":checked")) {
    } else {
        var errmMiling = document.getElementById("err-mailList");
        errmMiling.style.visibility = "visible";
        isValid = false;
    }
     */

    return isValid;

}