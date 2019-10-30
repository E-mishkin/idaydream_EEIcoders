<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<h3>Thank you for completing this form and becoming part of ID.A.Y Dream!</h3>
<div class="form-group m-5">
    <table class="table">

        <?php
        foreach($_POST as $key => $value){
            echo "<tr>";
            echo "<td>";
            echo "<strog>$key</strog>";
            echo "<td>";
            echo "<td>";
            echo "<em>$value</em>";
            echo "<td>";
            echo "<tr>";
        }
        ?>
    </table>
</div>
</body>
</html>