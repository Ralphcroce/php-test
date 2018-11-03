<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Hello PHP World!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <link rel="stylesheet" type="text/css" media="screen" href="main.css" />
    <script src="main.js"></script>
    
</head>
<body>
<?php
echo "Hello PHP World!";

/*
$servername = "localhost";
$username = "ralph";
$password = "";
$port="3306";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $port);
// Check connection
if (!$conn) {
    echo ("Connection failed: " . mysqli_connect_error());
    die();
}

// Create database
$sql = "CREATE DATABASE test2";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
    die();
}

mysqli_close($conn);
*/

// $host="LAPTOP-H82RJMKT";
$host = "127.0.0.1";
$port="3306";
$socket="";
$user="root";
$password = "rrc2249";
$dbname="test";
$dbname="evwebsite";

echo ("<br/><br/>");
$con = mysqli_connect($host, $user, $password, $dbname, $port);
    /* or die ('Could not connect to the database server' . mysqli_connect_error()); */

    if ($con) {
        echo ("Connected");
    }
    else {
        echo ("Connection failed: " . mysqli_connect_error());
        // die();
        // printf("error=%s", mysqli_connect_error());        
    }
    
    // echo "HERE";
    echo "<br/><br/>";
    $query = "SELECT id, name FROM tbltest";
    $query = "SELECT make, model FROM all_vehicles LIMIT 0,20";

    if ($stmt = $con->prepare($query)) {
        $stmt->execute();
        $stmt->bind_result($field1, $field2);
        while ($stmt->fetch()) {
            echo $field1, "&nbsp;&nbsp;", $field2, "<br/>";
        }
        // echo "no more";
        $stmt->close();
    } else {
        echo "FAILED";
    }
$con->close(); 

function queryToArray($conn, $query) {

}
?>
</body>
</html>
