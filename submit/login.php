<?php 
require 'conn.php';

$sql = "SELECT username, password FROM `users` where username = '".$GLOBALS["name"]."'";
$result =  $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
       if ( ($row["username"] == $GLOBALS["name"]) && ($row["password"] == $GLOBALS["password"]) ) {
            //echo 1;
            $status = 1;
       }else {
        // echo 0;
        $status = 0;
    }
    }
} else {
    // echo 0;
    $status = 0;
}
?>
