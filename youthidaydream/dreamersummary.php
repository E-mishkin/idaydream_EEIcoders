<?php
/**
 * It-305
 * This php file validates the guest form and inserts the data into the sql is data is valid
 */

//ERROR reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])){
    header('location: ../idaydream/index.html');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/youthidaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <title>Dreamer Summary Form</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
</head>
<body>

<div class="container">
    <br>
    <form class="form-inline">
        <h3 class="mr-5">Dreamer Summary</h3>
        <div class="float-right">
            <a href="email.php?a=b"><button type="button" class="btn btn-primary button">Email</button></a>
            <a href="../idaydream/index.html"><button type="button" class="btn btn-primary button">Home</button></a>
            <a href="../idaydream/volunteersummary.php"><button type="button" class="btn btn-primary button">Volunteer Summary</button></a>        </div>
    </form>

    <hr>
    <br>
    <?php

    require('/home/eeicoder/connect.php');
//SQL statement

    $sql='SELECT dreamer.dreamer_Id, name, phone, e_mail, birth, gender, grad, interest, 
            career, favfood, parentNAme, parentPhone, parentEmail, ethnicity_type, otherEthnicity,status
            FROM dreamer INNER JOIN ethnicity ON dreamer.ethnicity_Id =
            ethnicity.ethnicity_Id
            ORDER BY dreamer.dreamer_Id DESC';




    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);
  
//sql status data
    $sqlStatus = "SELECT status_id, status_type
    FROM status";
    $resultStatus = mysqli_query($cnxn, $sqlStatus);
    $statusArray =array();
    foreach ($resultStatus as $status) {
        $id = $status['status_id'];
        $type = $status['status_type'];


        $statusArray[$id] = "$type";
    }

    ?>
    <?php
    //Include the nav page
    include 'nav.php';
    ?>
    <table id="dreamer-table" class="display">
        <thead>
        <tr>
            <th>Dreamer Id</th>
            <th>Name</th>
            <th>Status</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>Gender</th>
            <th>Ethnicity</th>
            <th>Birthdate</th>
            <th>Graduating class</th>
            <th>College of Interest</th>
            <th>Career Aspiration</th>
            <th>Favorite Food/Snack</th>
            <th>Tutor or Parent Name</th>
            <th>Tutor or Parent Phone </th>
            <th>Tutor or Parent Email</th>

        </tr>
        </thead>
        <tbody>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            //the parameter names are the same that I have from my database
            $dreamer_Id = $row['dreamer_Id'];
            $name = $row['name'];
            $phone = $row['phone'];
            $e_mail = $row['e_mail'];
            $gender = $row['gender'];
            $ethnicityOther = $row['otherEthnicity'];
            $ethnicity = $row['ethnicity_type'];
            $birthdate = date('m-d-Y', strtotime($row['birth']));
            $graduation_class = $row['grad'];
            $interest = $row['interest'];
            $career = $row['career'];
            $food = $row['favfood'];
            $parentNAme = $row['parentNAme'];
            $parentPhone = $row['parentPhone'];
            $parentEmail = $row['parentEmail'];
            $sid = $row['status'];

            echo "<tr>
        <td>$dreamer_Id</td>
        <td>$name</td>
            <td> 
            <select data-did='$dreamer_Id' class='sid'>";
            foreach ($statusArray as $id => $name) {
                $sel = ($id == $sid) ? "selected='selected' " : "";
                echo "<option value='$id' $sel> $name</option>";
            }
            echo"</select>
            </td>
        <td>$phone</td>
        <td>$e_mail</td>
        <td>$gender</td>";
            if($ethnicityOther == null){
                echo"<td>$ethnicity</td>";
            }else{
                echo"<td>$ethnicityOther</td>";
            }
            echo"
        <td>$birthdate</td>
        <td>$graduation_class</td>
        <td>$interest</td>
        <td>$career</td>
        <td>$food</td>
        <td>$parentNAme</td>
        <td>$parentPhone</td>
        <td>$parentEmail</td>
        </tr>";
        }
        ?>
        </tbody>
    </table>

    <br>

</div>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
<script>
    
    $('#dreamer-table').DataTable( {
        order:[0,'desc'],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal( {
                    header: function ( row ) {
                        var data = row.data();
                        return 'Details for '+data[0]+' '+data[1];
                    }
                } ),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                    tableClass: 'table'
                } )
            }
        }
    } );
    $('.sid').on('change', function() {
        //alert("sid: " + $(this).val() + ", did: " + $(this).attr('data-did'));
        var sid = $(this).val();
        var did = $(this).attr('data-did');
        //*** "SLIM" version of JQuery does not support ajax!
        $.post( "updatestatus.php", { sid: sid, did: did } );
    });


</script>

</body>
</html>


