<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<h3>Thank you for completing this form and becoming part of ID.A.Y Dream!</h3>
<div class="form-group m-5">

    <h3>Summary</h3>

    <?php
    //Connect to db
    require ('/home/eeicoder/connect.php');

    //Validate the data
    $isValid = true;
    //checking name
    if (!empty($_POST['name'])) {
        $name = mysqli_real_escape_string($cnxn, $_POST['name']);
    } else {
        echo "<p>Name is required</p>";
        $isValid = false;
    }

    //checking email
    if (!empty($_POST['email'])) {
        $email = mysqli_real_escape_string($cnxn, $_POST['email']);
    } else {
        echo "<p>Email is required</p>";
        $isValid = false;
    }

    //checking phone
    if (!empty($_POST['phone'])) {
        $phone = mysqli_real_escape_string($cnxn, $_POST['phone']);
    } else {
        echo "<p>Phone Number is required</p>";
        $isValid = false;
    }
    //checking gender
    if ($_POST['gender'] != "none") {
        $gender = mysqli_real_escape_string($cnxn, $_POST['gender']);
    } else {
        $gender = "";
    }

    //checking enthinicity
    if (!empty($_POST['ethnicity'])) {
        $ethnicity = mysqli_real_escape_string($cnxn, $_POST['ethnicity']);
    } else {
        echo "<p>Ethnicity is required</p>";
        $isValid = false;
    }
    //checking graduation
    if (!empty($_POST['grad'])) {
        $grad = mysqli_real_escape_string($cnxn, $_POST['grad']);
    } else {
        echo "<p>Graduation is required</p>";
        $isValid = false;
    }
    //checking Birthdate
    if (!empty($_POST['birth'])) {
        $birth = mysqli_real_escape_string($cnxn, $_POST['birth']);
    } else {
        echo "<p>Birthdate is required</p>";
        $isValid = false;
    }
    //Insert row if data is valid
    if ($isValid) {
        $sql = "INSERT INTO dreamer
                    VALUES (default,'$name', 
                    '$phone', '$email',
                    '$birth','$gender', '$grad','$ethnicity')";
        //Print SQL statement, for testing purposes only
        //copy/paste into phpMyAdmin to test
        //echo $sql;
        //Send the query to the database
        $result = mysqli_query($cnxn, $sql);
        //If successful, print summary
        //echo $result;
        if ($result) {
            echo "<h3>Student Summary</h3>";
//            echo "<p>SID: $dreamer_Id</p>";
            echo "<p>Student name: $name</p>";
            echo "<p>Phone: $phone</p>";
            echo "<p>Email: $email</p>";
            echo "<p>Email: $gender</p>";
            echo "<p>Birthdate: $birth</p>";
            echo "<p>Graduation: $grad</p>";
            echo "<p>Ethnicity: $ethnicity</p>";
        }
    }

    ?>
</div>
</body>
</html>