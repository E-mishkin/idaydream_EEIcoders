<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 11/29/2019
 * Time: 7:39 AM
 */
var_dump($_POST);
//Turn on error reporting -- this is critical!
ini_set('display_errors', 1);
error_reporting(E_ALL);
//Connect to db
require ('/home/eeicoder/connect.php');
//Get Advisor ID and SID from the POST array


$sid = $_POST['sid'];
$volunteer_id = $_POST['did'];
echo "$sid";
echo "$volunteer_id";
//If they are valid and advisorID is numeric
if (!empty($sid) && !empty($volunteer_id) && is_numeric($sid)) {
    //Escape the values
    $sid = mysqli_real_escape_string($cnxn, $sid);
    $volunteer_id = mysqli_real_escape_string($cnxn, $volunteer_id);
    //Define and execute the query
    $sql = "UPDATE volunteer
                SET status = '$sid'
                WHERE volunteer_Id = '$volunteer_id'";
    echo $sql;
    $result = mysqli_query($cnxn, $sql);
}