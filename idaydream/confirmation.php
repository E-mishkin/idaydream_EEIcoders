<?php
$back_ground= $_POST['methods'];
$mailing= $_POST['method'];
$agreement= $_POST['agree'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Thank you for completing this application form and for your interest in volunteering with us.</h1>
<h2>Summary:</h2>

<p>Background Check:
    <?php echo $back_ground ;?>
</p>
<p>Add to mailing list:
    <?php echo $mailing;?>
</p>
<p>Agreement and Signature:
    <?php echo $agreement;?>
</p>


</body>
</html>