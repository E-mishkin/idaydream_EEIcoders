<?php
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$gender =$_POST['gender'];
$ethnicity = $_POST['ethnicity'];
$grad = $_POST['grad'];
$interest = $_POST['interest'];
$career =$_POST['career'];
$birth =$_POST['birth'];
?>
    <!DOCTYPE html>
    <body>
    <h1>Thank you for visiting!</h1>
    <h2>summary:</h2>
    <p>Name: <?php echo "$name"; ?>
    <p>Email: <?php echo "$email"; ?>
    <p>Phone: <?php echo "$phone"; ?>
    <p>Gender: <?php echo "$gender";?>
    <p>Ethnicity: <?php echo "$ethnicity"; ?>
    <p>Graduating Class: <?php echo "$grad"; ?>
    <p>College of Interest: <?php echo "$interest"; ?>
    <p>Career Aspiration: <?php echo "$career";?>
    <p>Birthdate: <?php echo "$birth"; ?>
    </p>
    <pre>
<?php
//var_dump($_POST);
//echo "hello world";
//send order by email
//notet this will probably go to ur spam

$email = "ekamthind697@gmail.com";
$email_body = "Order Summary --\r\n";
$email_body .="Name: $first $last\r\n";
$email_subject = "New Order placed";
$to = $email;
$headers = "From: $email\r\n";
$headers .= "Reply-T0: $email \r\n";
$success = mail($to, $email_subject, $email_body, $headers);

//print final confirmation
/*if ($success){
    $msg=
}
else {
    $msg = "We are "
} */
$msg = $success ? "Your order was successfully placed."
    : "We are sorry. there was problem with your order.";
echo "<p>$msg</p>";

?>
</pre>
    </body>
    </html>
