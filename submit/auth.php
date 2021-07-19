<?php 
// define variables and set to empty values
$name = $email = $password = $logout = "";

$logoutForm = "none";
$registerForm = "none";
$loginForm="none";
$logout = "";
$loginBtn="";
$registerBtn="";
$err="";
if ($_SERVER["REQUEST_METHOD"] == "POST") { //Determines whether request is from register/login form or from register/login/logout buttons
  
    //for username
    if(!preg_match('/[^a-zA-z0-9]/',$_POST["name"])) { //checks if there is non string or non digit character in name
        $name = test_input($_POST["name"]);
    }else {
        $err = 'Username should be alphabets and numbers only'; //generates error message
    }

       //for email
     if (isset($_POST["email"])){
    if(filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $email = test_input($_POST["email"]);
    }else {
        $err = 'A Valid Email Address is Required'; //generates error message
    }}
 
    //for password
   if( strlen($_POST["password"]) >= 8) {//checks length of password
    $password = test_input($_POST["password"]);
   }else {
       $err = 'password should be greater than 8 characters'; //generates error message
    
   }

   //Determines whether input is coming from the registerForm and also check if an error is in '$err' variable
   if(isset($_POST["registerForm"]) ) {
       if (empty($err)){
        $registerForm = "block";
        signUp($name, $password, $email);
       }else {
        $registerForm = "block";
      }
    
   }

   //Determines whether input is coming from the loginForm and also check if an error is in '$err' variable
   if(isset($_POST["loginForm"]) )
   {
    if (empty($err)) {
        $loginForm ="block";
        login($name,$password);
    }else {
        $loginForm ="block";
    }  
   } 
}


//to render register form or login form or to logout a user
if ($_SERVER["REQUEST_METHOD"] == "GET") {
  
    if (isset( $_REQUEST["register"])) {//renders register form and hides login form
        $registerForm = "block";
        $loginForm="none";
    }

    if (isset( $_REQUEST["login"])) {//renders login form and hides register form
        $registerForm = "none";
        $loginForm="block";
    }

    if (isset( $_REQUEST["logout"])) { //hides both register and login form
        $registerForm = "none";
        $loginForm="none";
        logout($_REQUEST["logout"]); //call to logout function
    }
}

//to validate input from form
function test_input($data) {
    global $err;
    if (!empty($data)) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    else {
        $err = 'Do not leave any field Empty'; //generates error message
    }
}
?>