<?php 
require 'conn.php';

$squ =" SELECT username FROM `users`  where username = '". $GLOBALS["name"]. "'";
$result =  $conn->query($squ);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $status = 0; //username already exists
    }
}else {
$username=$GLOBALS["name"];
$email=$GLOBALS["email"];
$password=$GLOBALS["password"];

$sql = "INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES ('', '$username', '$email', '$password')";
   if ($conn->query($sql) === TRUE) {

    $status = 1;
        // "New record created successfully"
    } else {
        $status = 2;
      // echo 2; //Email already exists;
    }
}
?>