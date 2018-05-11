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
	<title>UserData table</title>
    <link href="../jquery-ui-1.11.4.custom/jquery-ui.min.css" rel="stylesheet" type="text/css">
    <script src="../jquery-ui-1.11.4.custom/external/jquery/jquery.js"></script>
    <script src="../jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
    <style>
        table,th,td {
            border : 1px solid black;
            border-collapse: collapse;
        }
        th,td {
            padding: 5px;
        }
        table{
            margin-bottom: 160px;
        }
        #modify {
            position: fixed;
            width: 600px;
            bottom: 0px;    
        }
        input {
            width: 90px;
        }
    </style>
</head>
<body>
    <div class="ui-widget pageWidget">
        <table class="datatable">
            <tr><th>ID</th><th>username</th><th>addDate</th></tr>
            <?php
                require_once "../db.conf";
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                if ($mysqli->connect_error) {
                    die('Connect Error (' . $mysqli->connect_errno . ') '
                            . $mysqli->connect_error);
                }

                $query = "SELECT * FROM UserData";
                $result = $mysqli->query($query);



                while($row = $result->fetch_assoc()) {
                    print "<tr><td>" . $row['ID'] . "</td><td>" . $row['username'] . "</td><td>" . $row['add_date'] . "</td></tr>";
                    
                }
                $result->close();
                $mysqli->close();
            ?>
        </table>
        <div id="modify">
        <p><a href='logout.php'>Logout</a></p>
        <p><a href='orders.php'>Go to Orders table</a></p>
        <p><a href='mix.php'>Go to mix table</a></p>
        <p><a href='search.php'>Go to searching page</a></p>
        <form action="addToDatabase.php" method="post">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="submit" value="add data">
        </form>
        <form action="editDataToDatabase.php" method="post">
            <input type="text" name="id" id="id" placeholder="id">
            <input type="text" name="username" id="username" placeholder="username">
            <input type="submit" value="edit data">
        </form>
        <form action="deleteDataToDatabase.php" method="post">
            <input type="text" name="id" id="id" placeholder="id">
            <input type="submit" value="Delete data">
        </form>
        </div>
    </div>
</body>
</html>