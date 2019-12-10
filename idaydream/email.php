<?php
/** 305/volunteer.php collect database for volunteer
 *
 *  Nov 4, 2019
 */

//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);

    require('/home/eeicoder/connect.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Email</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">

</head>
<body>

<form id="email-form" action="thanks.php" method="POST">

    <div class="shadow-none p-3 mb-5 bg-light rounded">
        Subject: <input type=" text" name="subject"><br>
<!--        <span class="err" id="err-subject">Please enter a subject</span>-->
        Message: <br><textarea cols="30" rows="10" name="message"></textarea><br>
<!--        <span class="err" id="err-message">Please enter a message</span>-->
        <input type="submit" name="submit" value="Send">

    </div>
</form>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

</body>
</html>
