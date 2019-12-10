<?php
//connect to db-->
$username='eeicoder_grcuser';
$password='R)nGy+_WOZYN';
$hostname='localhost';
$database='eeicoder_grc';

$cnxn = @mysqli_connect($hostname, $username, $password, $database);

//or die("Connection error: ".mysqli_connect_error());
if($cnxn){
    echo "<p>Connected</p>";

}else{
    echo mysqli_connect_error();
}