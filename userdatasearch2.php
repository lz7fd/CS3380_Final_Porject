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
	<title>Order table</title>
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
            <tr><th>ID</th><th>username</th><th>addDate</th><th>quantity</th><th>whatevevr</th></tr>
            <?php
                require_once "../db.conf";
                $mysqli = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

                if ($mysqli->connect_error) {
                    die('Connect Error (' . $mysqli->connect_errno . ') '
                            . $mysqli->connect_error);
                }

                $query = "SELECT UserData.ID, UserData.username, UserData.add_date, Orders.quantity, Orders.whatever FROM UserData INNER JOIN Orders ON UserData.ID = Orders.ID WHERE Orders.quantity <= $_POST[to] AND Orders.quantity >= $_POST[from] ORDER BY Orders.quantity DESC LIMIT 0,$_POST[num_of_rolls]";
                $result = $mysqli->query($query);



                while($row = $result->fetch_assoc()) {
                    print "<tr><td>" . $row['ID'] . "</td><td>" . $row['username'] . "</td><td>" . $row['add_date'] . "</td><td>" . $row['quantity'] . "</td><td>" . $row['whatever'] . "</td></tr>";
                    
                }
                $result->close();
                $mysqli->close();
            ?>
        </table>
        <div id="modify">
        <p><a href='logout.php'>Logout</a></p>
        <p><a href='userdata.php'>Go to UserData table</a></p>
        <p><a href='orders.php'>Go to Orders table</a></p>
        <p><a href='search.php'>Go to search</a></p>
        </div>
    </div>
</body>
</html>