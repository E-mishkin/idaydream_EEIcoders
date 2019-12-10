<?php


//Turn on error reporting
//ERROR reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();
//If the user is already logged in
if (isset($_SESSION['username'])) {
    //Redirect to summary  page
    header("location: volunteersummary.php");
}

//If the login form has been submitted
if (isset($_POST['submit'])) {
    //Include creds.php (eventually, passwords should be moved to a secure location
    //or stored in a database)
    include 'creds.php';

    //Get the username and password from the POST array
    $username = $_POST['username'];
    $password = $_POST['password'];


    //If the username and password are correct
    if (array_key_exists($username, $loggins) && $loggins["$username"] == $password) {
        //Store login name in a session variable
        $_SESSION['username'] = $username;

        //Redirect to admin(summary)
        header("location: volunteersummary.php");
    } else {
        //Login credentials are incorrect
        echo "<p>Invalid login</p>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/idaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <title>Log In</title>
</head>
<body>
<!-- Title and Contact Info -->
<div class="jumbotron jumbotron-fluid" id="jumbotron2">
    <div class="container">
        <br>
        <h1 class="display-4 center"> Hey, Good to see you again!</h1>
    </div>
</div>


<form id="main" method="post" action="#">
    <div class="container" align="center">
        <p class="center">Log in to get going</p>
    <label>
        <input id="username" type="text" name="username"  placeholder="Username"><br>
    </label><br>
    <label>
        <input id="password" type="password" name="password"  placeholder="password"><br>
    </label><br>
        <input class="p-2 mb-auto bg-dark text-white" type="submit" name="submit" value="Log in">
<!--        <input type="button" onclick="alert('Hello World!')" value="Click Me!">-->
        <hr class="m-5">
        <div class="container">
            <p id="indexP">iD.A.Y. Dream is a 501(c)3 non- profit organization registered with the IRS
                (Tax ID 81-3521892)</p>
        </div>

    </div><!-- end of div container-->
</form>
</body>
</html>
