<?php
    $back_ground= $_POST['background'];
    $filling= $_POST['Who_filling:'];
    $first= $_POST['First_Name:'];
    $last= $_POST['Last_Name:'];
    $street_address= $_POST['Address:'];
    $city = $_POST['City:'];
    $state = $_POST['State:'];
    $zip = $_POST['ZIP:'];
    $phone = $_POST['Phone:'];
    $email = $_POST['Email:'];
    $t_shirt = $_POST['T-shirt:'];
    $interests = $_POST['interests[]'];
    $skills = $_POST['Skills:'];
    $experience = $_POST['Experience:'];
    $references = $_POST['character[]'];
    $volunteerAvailability = $_POST['volunteerAvailability[]'];
    $motivated= $_POST['Motivated:'];
    //$hear= $_POST['Hear_about_us:'];
    $mailLists= $_POST['Mail_List'];
    $agreement= $_POST['agree'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/idaydream.css">

    <title>I Day Dream Volunteer Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
</head>
<body>
    <div class="form-group m-5">
        <h3 class="mb-2">Thank you for completing this application form and for your interest in volunteering with us.</h3>
        <br>
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
        //send order by email
        //Note: this will probably go to your junk email
        $email = "emishkin@mail.greenriver.edu";
        $email_body = "Summary --\r\n";
        $email_body = "Name: $first $last\r\n filling: $filling\r\n 
        Street Address: $street_address\r\n City: $city\r\n State: $state\r\n 
        Zip: $zip\r\n Phone: $phone\r\n E-mail: $email\r\n T-shirt: $t_shirt\r\n 
        Interests: $interests\r\n Skills: $skills\r\n Experience: $experience\r\n 
        References: $references\r\n Volunteer Availability: $volunteerAvailability\r\n 
        Motivation: $motivated\r\n Add to mailing list: $mailLists \r\n";
        $email_subject = "New form submitted";
        $to = $email;
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
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

</body>
</html>