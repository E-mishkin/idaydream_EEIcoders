<?php
/** 305/new-students.php collect database fro new student
 *
 *  Nov 4, 2019
 */
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>GRC Student Summary</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" >
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container">
    <h3>Summary</h3>

    <?php
    require('/home/eeicoder/connect.php');
    //Define the query
    $sql = 'SELECT DISTINCT dreamer_Id, name, phone, e_mail, birthdate, gender, ethnicity_type, graduation_class, interest, career, food
        FROM ethnicity INNER JOIN dreamer ON dreamer.ethnicity_Id = 
        ethnicity.ethnicity_Id';
    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
    //var_dump($result);
    ?>
    <table id="student-table" class="display">
        <thead>
        <tr>
            <th>Dreamer Id</th>
            <th>Name</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Ethnicity</th>
            <th>Birthdate</th>
            <th>Graduating class</th>
            <th>College of Interest</th>
            <th>Career Aspiration</th>
            <th>Favorite Food/Snacks</th>

        </tr>
        </thead>
        <tbody>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $dreamer_Id = $row['dreamer_Id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $e_mail = $row['e_mail'];
            $gender = $row['gender'];
            $ethnicity = $row['ethnicity_type'];
            $birthdate = $row['birthdate'];
            $graduation_class = $row['graduation_class'];
            $interest = $row['interest'];
            $career = $row['career'];
            $food = $row['food'];

            echo "<tr>
        <td>$dreamer_Id</td>
        <td>$name</td>
        <td>$phone</td>
        <td>$e_mail</td>
        <td>$gender</td>
        <td>$ethnicity</td>
        <td>$birthdate</td>
        <td>$graduation_class</td>
        <td>$interest</td>
        <td>$career</td>
        <td>$food</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>
    <!-- <a href="new-student.php">Add a new Student</a> -->

</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script>
    $('#student-table').DataTable();
</script>

</body>
</html>