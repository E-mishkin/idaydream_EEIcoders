<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/youthidaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <title>Confirmation Form YouthDayDream</title>
</head>

<div class="form-group m-5">
    <h3>Thank you for completing this form and becoming part of ID.A.Y Dream!</h3>
    <hr>
    <h4>Summary</h4>
    <br>

    <?php
    //Connect to db
    require ('/home/eeicoder/connect.php');

    //Validate the data
    $isValid = true;

    //checking name
    if (!empty($_POST['name'])) {
        $name = mysqli_real_escape_string($cnxn, $_POST['name']);
    } else {
        echo "<p class='warning'>Name is required</p>";
        $isValid = false;
    }

    //checking email
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    } else {
        echo "<p class='warning'>Email is required</p>";
        $isValid = false;
    }

    //checking phone
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
    } else {
        echo "<p class='warning'>Phone Number is required</p>";
        $isValid = false;
    }

    //checking gender
    if ($_POST['gender'] == "none") {
        echo "<p class='warning'>Gender is required</p>";
        $isValid = false;
    } else {
        $gender = mysqli_real_escape_string($cnxn, $_POST['gender']);
    }

    //checking enthinicity
    if ($_POST['ethnicity'] == "none") {
        echo "<p class='warning'>Ethnicity is required</p>";
        $isValid = false;
    } else {
        $ethnicity = mysqli_real_escape_string($cnxn, $_POST['ethnicity']);
    }

    //checking graduation
    if ($_POST['grad'] == "none") {
        echo "<p class='warning'>Graduation is required</p>";
        $isValid = false;
    } else {
        $grad = mysqli_real_escape_string($cnxn, $_POST['grad']);
    }

    //checking College Interest
    if (!empty($_POST['interest'])) {
        $interest = mysqli_real_escape_string($cnxn, $_POST['interest']);
    } else {
        echo "<p class='warning'>College Interest is required</p>";
        $isValid = false;
    }

    //checking College career
    if (!empty($_POST['career'])) {
        $career = mysqli_real_escape_string($cnxn, $_POST['career']);
    } else {
        echo "<p class='warning'>Career Aspirations is required</p>";
        $isValid = false;
    }
    //checking food
    if (!empty($_POST['food'])) {
        $food = mysqli_real_escape_string($cnxn, $_POST['food']);
    } else {
        echo "<p class='warning'>Favorite Food/ Snacks is required</p>";
        $isValid = false;
    }

    //checking Birthdate
    if (!empty($_POST['birth'])) {
        $birth = mysqli_real_escape_string($cnxn, $_POST['birth']);
    } else {
        echo "<p class='warning'>Birthdate is required</p>";
        $isValid = false;
    }

    //Insert row if data is valid
    if ($isValid) {
        $sql = "INSERT INTO dreamer
                        VALUES (default,'$name', 
                        '$phone', '$email',
                        '$birth','$gender', '$grad','$ethnicity','$interest','$career','$food')";
        //Print SQL statement, for testing purposes only
        //copy/paste into phpMyAdmin to test
        //echo $sql;
        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);
        //If successful, print summary
        //echo $result;
        if ($result) {
            //echo "<h3>Student Summary</h3>";
            //echo "<p>SID: $dreamer_Id</p>";
            echo "<p>Student name: $name</p>";
            echo "<p>Phone: $phone</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Birthdate: $birth</p>";
            echo "<p>Gender: $gender</p>";
            echo "<p>Graduation: $grad</p>";
            echo "<p>Ethnicity: $ethnicity</p>";
            echo "<p>College of Interest: $interest</p>";
            echo "<p>Career Aspirations: $career</p>";
            echo "<p>Favorite Food/ Snacks: $food</p>";
        }
    }

    ?>

    <?php
    //send order by email
    //Note: this will probably go to your junk email
    $emailto = "ekaur@mail.greenriver.edu";
    $email_body = "Summary --\r\n";
    $email_body = "Name: $name\r\n
    Phone: $phone\r\n
    E-mail: $email\r\n
    Birthdate: $birth\r\n
    Gender: $gender\r\n
    Graduation: $grad\r\n
    Ethnicity: $ethnicity\r\n
    College of Interest: $interest\r\n
    Career Aspirations: $career\r\n
    Favorite Food/ Snacks: $food\r\n";

    $to = $emailto;
    $headers = "From: $emailto\r\n";
    $headers .= "Reply-To: $emailto\r\n";
    $success = mail($to, $email_subject,$email_body,$headers);

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
    ?>
</div>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script crossorigin="anonymous" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script crossorigin="anonymous" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

</body>
</html>