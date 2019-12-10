<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/idaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <title>I Day Dream Volunteer Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
<div class="form-group m-5">
    <h3 class="mb-2">Thank you for completing this application form and for your interest in volunteering with us.</h3>
    <hr>
    <br>
    <h4 >Summary</h4>
    <br>

    <?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    //Connect to db
    require ('/home/eeicoder/connect.php');

    //fields
    $filling= $_POST['filling'];
    //$first= $_POST['firstName'];
    //$last= $_POST['lastName'];
    //$street_address= $_POST['streetAddress'];
    //$city = $_POST['city'];
    //$state = $_POST['state'];
    //$zip = $_POST['zip'];
    //$phone = $_POST['phone'];
    //$email = $_POST['email'];
    //$t_shirt = $_POST['tshirt'];
    //$interests = $_POST['interests'];
    $interestsOther = $_POST['other'];
    //$skills = $_POST['skills'];
    $experience = $_POST['experience'];
    //$references = $_POST['character'];
    //$volunteerAvailability = $_POST['volunteerAvailability[]'];
    //$motivated= $_POST['motivated'];
    $hear= $_POST['hear'];
    //$otherHear= $_POST['otherHear'];
    $mailLists= $_POST['mailing'];

    //Validate the data
    $isValid = true;

    //checking first name
    if (!empty($_POST['firstName'])) {
        $first = mysqli_real_escape_string($cnxn, $_POST['firstName']);
    } else {
        echo "<p class='text-danger'>First name is required</p>";
        $isValid = false;
    }

    //checking last name
    if (!empty($_POST['lastName'])) {
        $last = mysqli_real_escape_string($cnxn, $_POST['lastName']);
    } else {
        echo "<p class='text-danger'>Last name is required</p>";
        $isValid = false;
    }

    //checking street
    if (!empty($_POST['streetAddress'])) {
        $street_address = mysqli_real_escape_string($cnxn, $_POST['streetAddress']);
    } else {
        echo "<p class='text-danger'>Street is required</p>";
        $isValid = false;
    }

    //checking city
    if (!empty($_POST['city'])) {
        $city = mysqli_real_escape_string($cnxn, $_POST['city']);
    } else {
        echo "<p class='text-danger'>City is required</p>";
        $isValid = false;
    }

    //checking state
    if ($_POST['state'] == "none") {
        echo "<p class='text-danger'>State is required</p>";
        $isValid = false;
    } else {
        $state = mysqli_real_escape_string($cnxn, $_POST['state']);
    }

    //checking zip
    if (!empty($_POST['zip'])) {
        $zip = mysqli_real_escape_string($cnxn, $_POST['zip']);
    } else {
        echo "<p class='text-danger'>ZIP is required</p>";
        $isValid = false;
    }

    //checking phone
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
    } else {
        echo "<p class='text-danger'>Phone is required</p>";
        $isValid = false;
    }

    //checking email
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    } else {
        echo "<p class='text-danger'>Email is required</p>";
        $isValid = false;
    }

    //checking t-shirt
    if ($_POST['tshirt'] == "none") {
        echo "<p class='text-danger'>T-shirt is required</p>";
        $isValid = false;
    } else {
        $t_shirt = mysqli_real_escape_string($cnxn, $_POST['tshirt']);
    }


    //checking interests
    $arrayInt = array('events', 'fundraising', 'newsletter', 'volunteer', 'mentoring', 'otherDiv');
    if (isset($_POST['interests'])) {
        if (in_array($_POST['interests'], $arrayInt)) {
            $interests[] = mysqli_real_escape_string($cnxn, $_POST['interests']);
        }
    } else {
        echo "<p class='text-danger'>Interests is required</p>";
        $isValid = false;
    }

    //checking other interests
    if (!empty($_POST['other'])) {
        $interestsOther = mysqli_real_escape_string($cnxn, $_POST['other']);
    } else {
        $interestsOther= NULL;
    }


    //checking skills
    if (!empty($_POST['skills'])) {
        $skills = mysqli_real_escape_string($cnxn, $_POST['skills']);
    } else {
        echo "<p class='text-danger'>Skills is required</p>";
        $isValid = false;
    }

    //checking motivated
    if (!empty($_POST['motivated'])) {
        $motivated = mysqli_real_escape_string($cnxn, $_POST['motivated']);
    } else {
        echo "<p class='text-danger'>Motivated is required</p>";
        $isValid = false;
    }

    //checking other hear form
    if (!empty($_POST['otherHear'])) {
        $otherHear = mysqli_real_escape_string($cnxn, $_POST['otherHear']);
    } else {
        $otherHear= NULL;
    }

    //checking volunteerAvailability
    $arrayVol = array('weekend', 'summerCamp');
    if (isset($_POST['volunteerAvailability'])) {
        if (in_array($_POST['volunteerAvailability'], $arrayVol)) {
            $volunteerAvailability[] = mysqli_real_escape_string($cnxn, $_POST['volunteerAvailability']);
        }
    } else {
        echo "<p class='text-danger'>Availability is required</p>";
        $isValid = false;
    }

    //checking other volunteerAvailability
    if (!empty($_POST['availability_other'])) {
        $otherVolunteerAvailability = mysqli_real_escape_string($cnxn, $_POST['availability_other']);
    } else {
        $otherVolunteerAvailability = NULL;
    }

    //checking name of character#1
    if (!empty($_POST['firstCharName'])) {
        $firstCharName = mysqli_real_escape_string($cnxn, $_POST['firstCharName']);
    } else {
        echo "<p class='text-danger'>Name of Character #1 is required</p>";
        $isValid = false;
    }

    //checking phone of character#1
    if (!empty($_POST['firstCharPhone'])) {
        $firstCharPhone = mysqli_real_escape_string($cnxn, $_POST['firstCharPhone']);
    } else {
        echo "<p class='text-danger'>Phone of Character #1 is required</p>";
        $isValid = false;
    }

    //checking email of character#1
    if (!empty($_POST['firstCharMail'])) {
        $firstCharMail = mysqli_real_escape_string($cnxn, $_POST['firstCharMail']);
    } else {
        echo "<p class='text-danger'>Email of Character #1 is required</p>";
        $isValid = false;
    }

    //checking relation of character#1
    if (!empty($_POST['firstCharRel'])) {
        $firstCharRel = mysqli_real_escape_string($cnxn, $_POST['firstCharRel']);
    } else {
        echo "<p class='text-danger'>Relation of Character #1 is required</p>";
        $isValid = false;
    }

    //checking name of character#2
    if (!empty($_POST['secCharName'])) {
        $secCharName = mysqli_real_escape_string($cnxn, $_POST['secCharName']);
    } else {
        echo "<p class='text-danger'>Name of Character #2 is required</p>";
        $isValid = false;
    }

    //checking phone of character#2
    if (!empty($_POST['secCharPhone'])) {
        $secCharPhone = mysqli_real_escape_string($cnxn, $_POST['secCharPhone']);
    } else {
        echo "<p class='text-danger'>Phone of Character #2 is required</p>";
        $isValid = false;
    }

    //checking email of character#2
    if (!empty($_POST['secCharMail'])) {
        $secCharMail = mysqli_real_escape_string($cnxn, $_POST['secCharMail']);
    } else {
        echo "<p class='text-danger'>Email of Character #2 is required</p>";
        $isValid = false;
    }

    //checking relation of character#2
    if (!empty($_POST['secCharRel'])) {
        $secCharRel = mysqli_real_escape_string($cnxn, $_POST['secCharRel']);
    } else {
        echo "<p class='text-danger'>Relation of Character #2 is required</p>";
        $isValid = false;
    }

    //checking name of character#3
    if (!empty($_POST['thirdCharName'])) {
        $thirdCharName = mysqli_real_escape_string($cnxn, $_POST['thirdCharName']);
    } else {
        echo "<p class='text-danger'>Name of Character #3 is required</p>";
        $isValid = false;
    }

    //checking phone of character#3
    if (!empty($_POST['thirdCharPhone'])) {
        $thirdCharPhone = mysqli_real_escape_string($cnxn, $_POST['thirdCharPhone']);
    } else {
        echo "<p class='text-danger'>Phone of Character #3 is required</p>";
        $isValid = false;
    }

    //checking email of character#3
    if (!empty($_POST['thirdCharMail'])) {
        $thirdCharMail = mysqli_real_escape_string($cnxn, $_POST['thirdCharMail']);
    } else {
        echo "<p class='text-danger'>Email of Character #3 is required</p>";
        $isValid = false;
    }

    //checking relation of character#3
    if (!empty($_POST['thirdCharRel'])) {
        $thirdCharRel = mysqli_real_escape_string($cnxn, $_POST['thirdCharRel']);
    } else {
        echo "<p class='text-danger'>Relation of Character #3 is required</p>";
        $isValid = false;
    }

    //Insert row if data is valid
    if ($isValid) {

        $sql = "INSERT INTO volunteer
                        VALUES (default,'$filling', '$first', '$last','$street_address','$city', '$state','$zip', 
                        '$phone', '$email', '$t_shirt', '$skills', '$experience', '$motivated', '$hear', '$otherHear', '$mailLists', '1', '$interestsOther', '$otherVolunteerAvailability')";

        $result = mysqli_query($cnxn, $sql);
        $varVolId = mysqli_insert_id($cnxn);

        // grab field from interests
        $interests = $_POST['interests'];
        foreach ($interests as $interest) {
            $sql2 = "INSERT INTO vol_int VALUES ('$varVolId', '$interest')";
            $result = mysqli_query($cnxn, $sql2);
        }

        //print fields from interest
        $printInterests = "SELECT interests_type FROM interests, vol_int
                            WHERE interests.interests_id = vol_int.interests_id
                            AND volunteer_Id = '$varVolId'";
        $result2 = mysqli_query($cnxn, $printInterests);
        $intArray = array();
        while ($row = mysqli_fetch_assoc($result2)) {
            $intArray[] = $row['interests_type'];
        }
        $newPrint = implode(', ', $intArray);

        // grab field from availability
        $volunteerAvailability = $_POST['volunteerAvailability'];
        foreach ($volunteerAvailability as $availability) {
            $sql3 = "INSERT INTO vol_avail VALUES ('$varVolId', '$availability')";
            $result = mysqli_query($cnxn, $sql3);
        }

        //print fields from availability
        $printVol = "SELECT availability_type FROM availability, vol_avail
                            WHERE availability.availability_Id = vol_avail.availability_Id
                            AND volunteer_Id = '$varVolId'";
        $result3 = mysqli_query($cnxn, $printVol);
        $volArray = array();
        while ($row = mysqli_fetch_assoc($result3)) {
            $volArray[] = $row['availability_type'];
        }
        $newPrintVol = implode(', ', $volArray);

        // grab field from references 1
        $sql4 = "INSERT INTO ref
                        VALUES (default,'$firstCharName', '$firstCharPhone', '$firstCharMail','$firstCharRel','$varVolId')";
        $result4 = mysqli_query($cnxn, $sql4);

        // grab field from references 2
        $sql5 = "INSERT INTO ref
                        VALUES (default,'$secCharName', '$secCharPhone', '$secCharMail','$secCharRel','$varVolId')";
        $result5 = mysqli_query($cnxn, $sql5);

        // grab field from references 3
        $sql5 = "INSERT INTO ref
                        VALUES (default,'$thirdCharName', '$thirdCharPhone', '$thirdCharMail','$thirdCharRel','$varVolId')";
        $result5 = mysqli_query($cnxn, $sql5);


        if ($result) {
            echo "<p><strong>Who is filing this form:</strong> $filling</p>";
            echo "<p><strong>Student name:</strong> $first $last</p>";
            echo "<p><strong>Street:</strong> $street_address</p>";
            echo "<p><strong>City:</strong> $city</p>";
            echo "<p><strong>State:</strong> $state</p>";
            echo "<p><strong>ZIP:</strong> $zip</p>";
            echo "<p><strong>Phone:</strong> $phone</p>";
            echo "<p><strong>Email:</strong> $email</p>";
            echo "<p><strong>T-shirt:</strong> $t_shirt</p>";
            echo "<p><strong>Skills:</strong> $skills</p>";
            echo "<p><strong>Experience:</strong> $experience</p>";
            echo "<p><strong>Motivated:</strong> $motivated</p>";
            echo "<p><strong>Hear:</strong> $hear / $otherHear</p>";
            echo "<p><strong>MailLists:</strong> $mailLists</p>";
            echo "<p><strong>Volunteer Availability:</strong> $newPrintVol / $otherVolunteerAvailability</p>";
            echo "<p><strong>Interests:</strong> $newPrint / $interestsOther</p>";
            echo "<p><strong>Reference #1:</strong> $firstCharName / $firstCharPhone / $firstCharMail / $firstCharRel</p>";
            echo "<p><strong>Reference #2:</strong> $secCharName / $secCharPhone / $secCharMail / $secCharRel</p>";
            echo "<p><strong>Reference #3:</strong> $thirdCharName / $thirdCharPhone / $thirdCharMail / $thirdCharRel</p>";
        }
    }


    $filling= $_POST['filling'];
    $first= $_POST['firstName'];
    $last= $_POST['lastName'];
    $street_address= $_POST['streetAddress'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $t_shirt = $_POST['tshirt'];
    //$interests = $_POST['interests'];
    $interestsOther = $_POST['other'];
    $experience = $_POST['experience'];
    //$references = $_POST['character'];
    //$volunteerAvailability = $_POST['volunteerAvailability[]'];
    $motivated= $_POST['motivated'];
    $hear= $_POST['hear'];
    $otherHear= $_POST['otherHear'];
    $mailLists= $_POST['mailing'];
    $firstCharName= $_POST['firstCharName'];
    $firstCharPhone= $_POST['firstCharPhone'];
    $firstCharMail= $_POST['firstCharMail'];
    $firstCharRel= $_POST['firstCharRel'];
    $secCharName= $_POST['secCharName'];
    $secCharPhone= $_POST['secCharPhone'];
    $secCharMail= $_POST['secCharMail'];
    $secCharRel= $_POST['secCharRel'];
    $thirdCharName= $_POST['thirdCharName'];
    $thirdCharPhone= $_POST['thirdCharPhone'];
    $thirdCharMail= $_POST['thirdCharMail'];
    $thirdCharRel= $_POST['thirdCharRel'];


    //send order by email
    //Note: this will probably go to your junk email
    $email = "emishkin@mail.greenriver.edu";

    $email_body = "Summary --\r\n";
    $email_body = "Name: $first $last\r\n Filling: $filling\r\n
    Street Address: $street_address\r\n City: $city\r\n State: $state\r\n
    Zip: $zip\r\n Phone: $phone\r\n E-mail: $email\r\n T-shirt: $t_shirt\r\n
    Experience: $experience\r\n
    References1: $firstCharName $firstCharPhone $firstCharMail $firstCharRel\r\n 
    References2: $secCharName $secCharPhone $secCharMail $secCharRel\r\n
    References3: $thirdCharName $thirdCharPhone $thirdCharMail $thirdCharRel\r\n
    Motivation: $motivated\r\n Add to mailing list: $mailLists \r\n";
    $email_subject = "New form submitted";
    $to = $email;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $success = mail($to, $email_subject,$email_body,$headers);

    /*
    //print final confirmation
    $msg = $success ? "Your form has been  successfully submitted."
        :"We're sorry. There was a problem with your form";
    //or this way
    if($success) {
        $msg = "Your form has been  successfully submitted.";
    } else{
        $msg = "We're sorry. There was a problem with your form";
    }
    echo "<div class=\"form-group m-5\"><p>$msg</p></div>";
    */
    ?>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>