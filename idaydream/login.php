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

        //Redirect to volunteer summary page
        header("location: volunteersummary.php");
    } else {
        //Login credentials are incorrect
        echo "<div class='form-group'><p class='alert-danger text-center p-2'>Invalid login</p></div>";
        // echo "<div class='form-group'><p class='alert-danger text-center p-2'>Invalid login</p></div>";
    }
}

?>

<!doctype html>
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

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">

    <title>Log In</title>
</head>
<body>

    <!-- Title and Contact Info -->
    <div class="jumbotron jumbotron-fluid" id="jumbotron1">
        <div class="container">
            <a href="../idaydream/index.html"><img src="images/logotype.png" alt="youth" class="float-left mr-3"  width="135"></a>
            <br>
            <h1 class="display-4 center" id="mainh1">Hey, Good to see you again!</h1>
        </div>
    </div>

    <form method="post" action="#">
        <div class="form-group" align="center">
            <p class="center">Log in to get going</p>
            <label>
                <input class="form-control" id="username" type="text" name="username"  placeholder="Username">
            </label><br>
            <label>
                <input class="form-control" id="password" type="password" name="password"  placeholder="Password"><br>
            </label>
            <br>
            <input class="btn btn-primary button" type="submit" name="submit" value="Log in">
            <!-- <input type="button" onclick="alert('Hello World!')" value="Click Me!"> -->
            <hr class="m-5">
            <div class="container">
                <p id="indexP">iD.A.Y. Dream is a 501(c)3 non- profit organization registered with the IRS
                    (Tax ID 81-3521892)</p>
            </div>
            <br>
        </div><!-- end of div container-->
    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="scripts/idaydream.js"></script>

</body>
</html>
