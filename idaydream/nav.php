<?php
    //no session start needed because pages 1, 2, and 3 already contain a
    //session_start and they 'include' the nav.php file so this file already
    //Start the session
    //session_start();

    //If user is logged in, get username
    if(isset($_SESSION['username'])){
       $username = $_SESSION['username'];
    }

    //Display a welcome message
   echo "<p> Welcome to the session, $username</p>";

    //Display a logout link
   echo  "<a href='logout.php'>Log out</a>";

?>

<!--<a href="page1.php">Home</a> |-->
<!--<a href="page2.php">Page 2</a> |-->
<!--<a href="page3.php">Page 3</a>-->


