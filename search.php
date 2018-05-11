<?php
// Created by Professor Wergeles for CS2830 at the University of Missouri

    // HTTPS redirect
    if ($_SERVER['HTTPS'] !== 'on') {
		$redirectURL = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
		header("Location: $redirectURL");
		exit;
	}
    
	// Every time we want to access $_SESSION, we have to call session_start()
	if(!session_start()) {
		header("Location: error.php");
		exit;
	}
	
	$loggedIn = empty($_SESSION['loggedin']) ? false : $_SESSION['loggedin'];
	if (!$loggedIn) {
		header("Location: login.php");
		exit;
	}
    
    
    
?>
<!DOCTYPE html>

<html>
<head>
	<title>Search</title>
    <style>
        div {
            width: 600px;
            margin: auto;    
        }
        input {
            width: 90px;
        }
    </style>
</head>
<body>
        <div>
        <form action="userdatasearch1.php" method="post">
            <p>search by id</p>
            <input type="text" name="id" id="id" placeholder="id">
            <input type="submit" value="search">
        </form>
        <form action="userdatasearch2.php" method="post">
            <p>search by quantity</p>
            <input type="text" name="from" id="form" placeholder="from">
            <input type="text" name="to" id="to" placeholder="to">
            <input type="text" name="num_of_rolls" id="num_of_rolls" placeholder="num_of_rolls">
            <input type="submit" value="search">
        </form>
        </div>
</body>
</html>