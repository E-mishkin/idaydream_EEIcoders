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
$dreamer_Id = $_POST['did'];
echo "$sid";
echo "$dreamer_Id";
//If they are valid and advisorID is numeric
if (!empty($sid) && !empty($dreamer_Id) && is_numeric($sid)) {
    //Escape the values
    $sid = mysqli_real_escape_string($cnxn, $sid);
    $dreamer_Id = mysqli_real_escape_string($cnxn, $dreamer_Id);
    //Define and execute the query
    $sql = "UPDATE dreamer
                SET status = '$sid'
                WHERE dreamer_Id = '$dreamer_Id'";
    echo $sql;
    $result = mysqli_query($cnxn, $sql);
}