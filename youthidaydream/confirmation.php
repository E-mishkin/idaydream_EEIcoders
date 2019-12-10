<?php
$name = $_POST['name'];
$phone =$_POST['phone'];
$email =$_POST['email'];
$gender =$_POST['gender'];
$birth = $_POST['birth'];
$grad =$_POST['grad'];
$interest =$_POST['interest'];
$career =$_POST['career'];
$favfood =$_POST['favfood'];
$ethnicity =$_POST['ethnicity'];
$ethnicityOther =$_POST['otherEthnicity'];
$parentNAme =$_POST['parentNAme'];
$parentPhone =$_POST['parentPhone'];
$parentEmail =$_POST['parentEmail'];

?>
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

    <title>I Day Dream Youth Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>

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

    //Validate the data
    $isValid = true;
    //checking name
    if (!empty($name)) {
        $name = mysqli_real_escape_string($cnxn, $_POST['name']);
    } else {
        echo "<p class='text-danger'>Name is required</p>";
        $isValid = false;
    }

    if (!empty($email)) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email = mysqli_real_escape_string($cnxn, $_POST['email']);
        } else {
            echo '<p class=\'text-danger\'>Please enter a valid Email</p>';
            $isValid = false;
        }
    }else{
        echo '<p class=\'text-danger\'>Please enter an Email</p>';
        $isValid = false;
    }

    //checking phone
    if (!empty($phone)) {
        $phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
    } else {
        echo "<p class='text-danger'>Phone number is required</p>";
        $isValid = false;
    }

    //checking gender
    if (isset($gender)) {
        if($gender != "none")
        {
            $gender = mysqli_real_escape_string($cnxn, $_POST['gender']);
        }
        else{
            echo "<p class='text-danger'>Please select a gender</p>";
            $isValid = false;
        }
    }
    //checking ethnicity
    if(isset($ethnicity)) {
        $ethnicity= mysqli_real_escape_string($cnxn, $_POST['ethnicity']);
    } else {
        echo "<p class='text-danger'>Ethnicity is required</p>";
        $isValid = false;
    }
//   checking ethnicity for other ethnicity
   if(isset($ethnicity)) {
        if(isset($_POST["11"])) {
        }
            if (!empty($ethnicityOther)) {
                $ethnicityOther = mysqli_real_escape_string($cnxn, $_POST['otherEthnicity']);
            }else{
                $ethnicityOther = "";
            }
        }else {
        echo "<p class='text-danger'>Please specify your ethnicity</p>";
        $isValid = false;
    }//check for gender

    if (isset($grad)) {
        if ($grad != "none") {
            $grad = mysqli_real_escape_string($cnxn, $_POST['grad']);
        } else {
            echo "<p class='text-danger'>Graduation is required</p>";
            $isValid = false;
        }
    }
    //checking interest
    if (!empty($interest)) {
        $interest = mysqli_real_escape_string($cnxn, $_POST['interest']);
    } else {
        $interest="";
    }

    //checking career
    if (!empty($career)) {
        $career = mysqli_real_escape_string($cnxn, $_POST['career']);
    } else {
        $career="";
    }

    //checking favorite food
    if (!empty($favfood)) {
        $favfood = mysqli_real_escape_string($cnxn, $_POST['favfood']);
    } else {
        $favfood="";
    }

    //checking Birthdate
    if (!empty($birth)) {
        $birth = mysqli_real_escape_string($cnxn, $_POST['birth']);
    } else {
        echo "<p class='text-danger'>Birthdate is required</p>";
        $isValid = false;
    }
    //checking if parent info is not empty
    if (!empty($parentNAme)) {
        $parentNAme = mysqli_real_escape_string($cnxn, $_POST['parentNAme']);
    } else {

        echo "<p class='text-danger'>Please enter parent name</p>";
        $isValid = false;
    }
    // checking if parent phone is not empty
    if (!empty($parentPhone)) {
        $parentPhone = mysqli_real_escape_string($cnxn, $_POST['parentPhone']);
    } else {
        echo "<p class='text-danger'>Please enter parent phone number</p>";
        $isValid = false;
    }
    //check if email is valid
    if (!empty($parentEmail)) {
        if (filter_var($parentEmail, FILTER_VALIDATE_EMAIL)) {
            $parentEmail = mysqli_real_escape_string($cnxn, $_POST['parentEmail']);
        } else {
            echo '<p>Please enter a parent valid Email</p>';
            $isValid = false;
        }
    }else{
        echo '<p class=\'text-danger\'>Please enter a parent email</p>';
        $isValid = false;
    }
    //Insert row if data is valid

    if ($isValid) {


            $sql = "INSERT INTO dreamer
                    VALUES (default,'$name', 
                    '$phone', '$email',
                    '$birth','$gender', '$grad','$interest', '$career', 
                    '$favfood', '$parentNAme','$parentPhone','$parentEmail',
                    '$ethnicity', '$ethnicityOther', default)";


        //Print SQL statement, for testing purposes only
        //copy/paste into phpMyAdmin to test
    
        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);
        //If successful, print summary
        


        if ($result) {
//            echo "<p>SID: $dreamer_Id</p>";
            echo "<p>Name: $name</p>";
           echo "<p>Phone: $phone</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Gender: $gender</p>";
            $birth = date('m-d-Y', strtotime($birth));
            echo "<p>Birthdate: $birth</p>";
            echo "<p>Graduation: $grad</p>";
            echo "<p>interests: $interest</p>";
            echo "<p>Career: $career</p>";
            echo "<p>Favorite Food/Snack: $favfood</p>";

            if(!empty($ethnicityOther)){
                echo"<p>Ethnicity: $ethnicityOther </p>";
                }else{
            //Get Ethnicity Name:
            $sql = "(SELECT ethnicity_type from ethnicity WHERE ethnicity_id = $ethnicity)";
            $result = mysqli_query($cnxn, $sql);

            foreach($result as $row) {
                $ethnicity = implode($row);
            }
            echo '<p>Ethnicity: '.$ethnicity.'</p>';
            //END Get Ethnicity Name
                }
            echo "<p>Parent Name: $parentNAme</p>";
            echo "<p>Parent Phone: $parentPhone</p>";
            echo "<p>Parent Email: $parentEmail</p>";

        }
    }

    ?>

    <?php
    //send order by email
    //Note: this will probably go to your junk email
    $emailto = "imedina-castaneda@mail.greenriver.edu";
    $email_body = "Summary --\r\n";
    $email_body .=
    "Name: $name\r\n 
    Phone: $phone\r\n
    E-mail: $email\r\n 
    Birthdate: $birth\r\n 
    Gender: $gender\r\n
    Graduation: $grad\r\n";
    if(!empty($ethnicityOther)){
        $email_body .= "Ethnicity: $ethnicityOther\r\n";
    }
    else{
        $email_body .= "Ethnicity: $ethnicity\r\n";
    }
    $email_body .=
    "College of Interest: $interest\r\n
    Career Aspirations: $career\r\n
    Favorite Food/ Snacks: $favfood\r\n
    Parent Name: $parentNAme\r\n
    Parent Phone: $parentPhone\r\n
    Parent Email: $parentEmail\r\n";

    $email_subject = "New form submitted";
    $to = $emailto;
    $headers = "From: $emailto\r\n";
    $headers.= "Reply-To: $emailto\r\n";
    $success = mail($to, $email_subject, $email_body, $headers);

    //print final confirmation
    $msg = $success ? "Your form has been  successfully submitted."
        : "We're sorry. There was a problem with your form";

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