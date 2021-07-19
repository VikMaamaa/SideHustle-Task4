<?php
	require_once 'conn.php';
    
    		//to validate input from form
    function test_input($data) {
        if (!empty($data)) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }
	if($_POST['password'] != ""){
        $username = $_COOKIE['user'];
        $mail = test_input($_POST['email']);
        $pass = test_input($_POST['password']);
        


        $conn->query("UPDATE `users` SET `email` = '$mail', `password` = $pass WHERE `username` = '$username'") ;
        // echo $conn->error;
		header('location: dashboard.php');
}
?>