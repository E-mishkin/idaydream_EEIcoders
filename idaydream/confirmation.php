<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>I Day Dream Volunteer Form</title>

    <style>
        h3 {
            padding: 2em;
        }
    </style>
</head>
<body>
    <h3>Thank you for completing this application form and for your interest in volunteering with us.</h3>
    <div class="form-group m-5">
        <table class="table">
            <?php
                foreach ($_POST as $key => $value) {
                    echo "<tr>";
                    echo "<td>";
                    echo "<strong>$key</strong>";
                    echo "</td>";
                    echo "<td>";
                    echo "<em>$value</em>";
                    echo "</td>";
                    echo "</tr>";
                }
            ?>
        </table>
    </div>

    <?php
    //Send form by email
    $first = $_POST['firstName'];
    $last = $_POST['lastName'];
    $email = "emishkin@mail.greenriver.edu";
    $email_body = "Volunteer Form Confirmation --\r\n";
    $email_body .= "Name: $first $last\r\n";
    $email_subject = "Volunteer Form Confirmation";
    $to = $email;
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email \r\n";
    $success = mail($to, $email_subject, $email_body, $headers);

    //Print final form confirmation
    $msg = $success ? "Volunteer Form has been successfully sent to us."
        : "We're sorry. There was a problem with your form.";

    echo "<div class=\"form-group m-5\"><p>$msg</p></div>";

    ?>

</body>
</html>