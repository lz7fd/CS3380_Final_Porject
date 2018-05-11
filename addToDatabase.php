<?php

    require_once "../db.conf";

    $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    if ($mysqli->connect_error) {
        die('Connect Error (' . $mysqli->connect_errno . ') '
                . $mysqli->connect_error);
    }

    $query = "INSERT INTO UserData(username, add_date) values('$_POST[username]', now())";
    
    $mysqli->query($query);



    $mysqli->close();
    header("Location: https://lz7fd.epizy.com/CS3380FinalProject/FinalProject/userdata.php");
?>