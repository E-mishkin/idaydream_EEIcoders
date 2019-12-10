<?php

    //gets the session start
    session_start();

    //Destroy the session
    session_destroy();

    //Redirect to login page
    header('location: index.html');


