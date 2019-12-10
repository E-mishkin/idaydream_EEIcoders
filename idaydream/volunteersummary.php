<?php
/**
 * It-305
 * Imelda Medina
 * 11/20/2019
 * This php file validates the volunteer summary form and inserts the data into the sql if data is valid
 */

//ERROR reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Start a session
session_start();

//If user is not logged in, reroute them to the login page
if(!isset($_SESSION['username'])){
    header('location:index.html');
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
    <link rel="stylesheet" type="text/css" href="styles/idaydream.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Questrial&display=swap" rel="stylesheet">

    <title>Volunteer Summary</title>

    <!-- Favicon -->
    <link rel="icon" type="image/png" href="images/favicon.png">
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap4.min.css">
</head>
<body>
<div class="container">
<br>
    <form class="form-inline">
        <h3 class="mr-5">Volunteer Summary</h3>
        <div class="float-right">
            <a href="email.php"><button type="button" class="btn btn-primary button">Email</button></a>
            <a href="../idaydream/index.html"><button type="button" class="btn btn-primary button">Home</button></a>
            <a href="../youthidaydream/dreamersummary.php"><button type="button" class="btn btn-primary button">Dreamer Summary</button></a>
        </div>
    </form>
    <hr>
    <?php
        //Include the nav page
        include 'nav.php';
    ?>
    <?php
    require('/home/eeicoder/connect.php');

    $sql = 'SELECT volunteer.volunteer_Id,filling,firstName,lastName,streetAddress,city,state,zip,phone,email,tShirt,skills,experience,motivated,hear,otherhear,mailing,interests_type,otherinterests,availability_type,otheravailability,status
        FROM volunteer
        INNER JOIN vol_int 
        ON volunteer.volunteer_Id = vol_int.volunteer_Id
        INNER JOIN vol_avail 
        ON volunteer.volunteer_Id = vol_avail.volunteer_Id
        INNER JOIN interests 
        ON vol_int.interests_id = interests.interests_id
        INNER JOIN availability 
        ON vol_avail.availability_Id = availability.availability_Id
        ORDER BY volunteer. volunteer_Id DESC ';

    //Send the query to the database
    $result = mysqli_query($cnxn, $sql);

    $sqlStatus = "SELECT status_id, status_type
    FROM status";
    $resultStatus = mysqli_query($cnxn, $sqlStatus);
    foreach ($resultStatus as $status) {
        $id = $status['status_id'];
        $type = $status['status_type'];

        $statusArray[$id] = "$type";
    }

    ?>
    <table id="volunteer-table" class="display">
        <thead>
        <tr>
            <th>Volunteer Id</th>
            <th>Who's Filling</th>
            <th>Status</th>
            <th>Name</th>
            <th>Address</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>T-shirt Size</th>
            <th>Interests</th>
            <th>Skills or Qualifications</th>
            <th>Volunteer Experience</th>
            <th>Volunteer Availability</th>
            <th>Motivated to Volunteer with us</th>
            <th>Hear about Idaydream</th>
            <th>Volunteer Mailing List</th>

        </tr>
        </thead>
        <tbody>
        <pre>

        <?php
        //Print the results
        while ($row = mysqli_fetch_assoc($result)) {
            $volunteer_id = $row['volunteer_Id'];
            $filling = $row['filling'];
            $sid = $row['status'];
            $first = $row['firstName'];
            $last = $row['lastName'];
            $street_address = $row['streetAddress'];
            $city = $row['city'];
            $state = $row['state'];
            $zip = $row['zip'];
            $phone = $row['phone'];
            $email = $row['email'];
            $t_shirt = $row['tShirt'];
            $interests = $row['interests_type'];
            $otherinterests = $row['otherinterests'];
            $skills = $row['skills'];
            $experience = $row['experience'];
           $volunteerAvailability = $row['availability_type'];
            $availabilityother = $row['otheravailability'];
            $motivated = $row['motivated'];
            $hear = $row['hear'];
            $otherhear = $row['otherhear'];
            $mailLists = $row['mailing'];

            echo "<tr>
            <td>$volunteer_id</td>
             <td>$filling</td>
            <td> 
            <select data-did='$volunteer_id' class='sid'>";
            foreach ($statusArray as $id => $name) {
                $sel = ($id == $sid) ? "selected='selected' " : "";
                echo "<option value='$id' $sel> $name</option>";
            }
            echo"</select>
            </td> 
        <td>$first $last</td>
        <td>$street_address $city $state, $zip</td>
        <td>$phone</td>
        <td>$email</td>
        <td>$t_shirt</td>";
        if($otherinterests == null){
                echo"<td>$interests</td>";
            }else{
                echo"<td>$otherinterests</td>";
            }
            echo"
        <td>$skills</td>
        <td>$experience</td>";
           if($availabilityother == null){
                echo"<td>$volunteerAvailability</td>";
            }else{
                echo"<td>$availabilityother</td>";
            }
            echo"
        <td>$motivated</td>";
            if ($otherhear == null) {
                echo "<td>$hear</td>";
            } else {
                echo "<td>$otherhear</td>";
            }
            echo "
        <td>$mailLists</td> 
        </tr>";
        }
        ?>

        </tbody>
    </table>
    <br>
</div>
    </pre>
<script
        src="https://code.jquery.com/jquery-3.4.1.min.js"
        integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
        crossorigin="anonymous"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="//stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

<script>
  
    $('#volunteer-table').DataTable({
        order:[0,'desc'],
        responsive: {
            details: {
                display: $.fn.dataTable.Responsive.display.modal({
                    header: function (row) {
                        var data = row.data();
                        return 'Details for ' + data[0] + ' ' + data[1];
                    }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                    tableClass: 'table'
                })
            }
        }
    });
    $('.sid').on('change', function() {
        // alert("sid: " + $(this).val() + ", did: " + $(this).attr('data-did'));
        var sid = $(this).val();
        var did = $(this).attr('data-did');
        //*** "SLIM" version of JQuery does not support ajax!
        $.post( "updatestatus.php", { sid: sid, did: did } );
    });

</script>

</body>
</html>