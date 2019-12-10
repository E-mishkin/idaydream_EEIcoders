<?php

$subject = $_POST['subject'];
$message = $_POST['message'];


    ini_set('display_errors', 1);
    error_reporting(E_ALL);

    require('/home/eeicoder/connect.php');
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

    <title>Thank You</title>

</head>
<body>
<br>
<div class="container">
    <h3> Thank you!</h3>
</div>
<?php



        //Validate the data];
    $isValid = true;


    if(!empty($subject)){
        $subject = mysqli_real_escape_string($cnxn, $_POST['subject']);
    }else {
        echo "<div class=\"container\"><p class='text-danger'>Please enter a subject</p></div>";
        $isValid = false;
    }

    if (!empty($message)) {
        $message = mysqli_real_escape_string($cnxn, $_POST['message']);
    }else {
        echo "<div class=\"container\"><p class='text-danger'>Please enter a message</p></div>";
        $isValid = false;
    }


    if($isValid) {
        $sql = "SELECT email FROM volunteer WHERE status = 1";

        $result = mysqli_query($cnxn, $sql);

        foreach ($result as $email) {
            $to = filter_var($email['email'], FILTER_VALIDATE_EMAIL);
            $success = mail($to, $subject, $message);

        }
        //    print final confirmation
        $msg = $success ? "Your email has been successfully sent."
            : "We're sorry. There was a problem with your email";
        echo "<div class=\"form-group m-5\"><p>$msg</p></div>";
    }
    ?>

<pre>
    <div class="container">
        <a href="volunteersummary.php" class="btn btn-primary button">Go to Summary Page</a>
    </div>
    </pre>

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="scripts/idaydream.js"></script>

</body>
</html>