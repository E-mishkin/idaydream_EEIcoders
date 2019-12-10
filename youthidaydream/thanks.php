<?php
$subject =  $_POST['subject'];
$message =  $_POST['message'];
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thank you</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">

</head>
<body>
<h3> Thank you!</h3>
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require('/home/eeicoder/connect.php');

    //Validate the data];
    $isValid = true;


    if(!empty($subject)){
        $subject = mysqli_real_escape_string($cnxn, $_POST['subject']);
    }else {
        echo "<p class='text-danger'>Please enter a subject</p>";
        $isValid = false;
    }

    if (!empty($message)) {
        $message = mysqli_real_escape_string($cnxn, $_POST['message']);
    }else {
        echo "<p class='text-danger'>Please enter a message</p>";
        $isValid = false;
    }

    if($isValid) {
        $sql = "SELECT e_mail FROM dreamer WHERE status = 2";

        $result = mysqli_query($cnxn, $sql);

        foreach ($result as $email) {
            $to = filter_var($email['e_mail'], FILTER_VALIDATE_EMAIL);
            $success = mail($to, $subject, $message);

        }
        //    print final confirmation
        $msg = $success ? "Your email has been successfully sent to."
            : "We're sorry. There was a problem with your email";
        echo "<div class=\"form-group m-5\"><p>$msg</p></div>";
}
    ?>

<pre>
    <div>
        <a href="dreamersummary.php" class="p-md-3 mb-auto bg-dark text-white">Go to Summary Page</a>
    </div>
    </pre>

<script src="//code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

</body>
</html>