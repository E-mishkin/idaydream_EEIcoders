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


</body>
</html>