<?php 
//start session
session_start();
require 'auth.php';


//checks if user exists
function checker() {
    require 'login.php';
    if($status == 1) {
        return true;
      }else {
       return false;
      }
    
};

//to login a user
function login($username, $password) {
    global $logoutForm, $loginBtn, $registerBtn, $logout,$err, $loginForm;
    if(checker() ) 
    {
            echo "Login successful";
            $logoutForm = "block";
            $loginBtn = "none";
            $registerBtn = "none";
            $logout = $username;
            $loginForm = "none";
            //Check if the session users exists.
        if(!isset($_SESSION['user'])){
            //If it doesn't, create an empty array.
            $_SESSION['user'] = $username;
        }

        if (isset($_SESSION['user'])) {
        //    $err = 'username already exists'; //generates error message
        $cookie_name = "user";
        $cookie_value = $username;
        setcookie($cookie_name, $cookie_value, time() + (86400), "/"); // 86400 = 1 day
        echo "login successful";
        header('location:dashboard.php');
        }
    }else{
        $err = $username ." Invalid details"; //generates error message
    }
}


//to logout a user
function logout($username) {
    $cookie_name = "user";
    $cookie_value = "";
    if(setcookie($cookie_name, $cookie_value, time() - (3600), "/")) {
 // remove all session variables
 session_unset(); 
// echo "Done";
 // destroy the session 
 session_destroy(); 
     // echo  $username." Logout Successful";
//   header('location:index.php');
    };
   
};

//to register a user
function register() {
    require 'register.php';
    if($status == 1) {
        return true;
      }else {
       return false;
      }
    
};
function signUp($username, $password, $email) {
global $logoutForm, $loginBtn, $registerBtn,$err,$registerForm;
      
            if(register()) {
               
                    echo "Registration Successful";
                    $logoutForm = "none";
                    $loginBtn = "block";
                    $registerBtn = "none";
                    $registerForm = "none";
            
            } else{
                $err = $username ." Registration Unsuccessful "; //generates error message
            }
        
};

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css"/>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	</head>
<body>
	<nav class="navbar navbar-default">
		<div class="container-fluid">
        <a class="navbar-brand col-sm-3" href="#">Market Place</a>
        
		</div>
	</nav>
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
    
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display:<?php echo $registerBtn ?>;width:40%; margin-top:2%;margin-right:30%; margin-left:30%;">
            <input type="hidden" name="register" value="true">
            <input type="submit" value="REGISTER">
            </form>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display:<?php echo $loginBtn ?>;width:40%; margin-top:2%;margin-right:30%; margin-left:30%;">
            <input type="hidden" name="login" value="true">
            <input type="submit" value="LOGIN">
            </form>
            <form method="get" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display:<?php echo $logoutForm ?>;width:40%; margin-top:2%;margin-right:30%; margin-left:30%;">
            <input type="hidden" name="logout" value="<?php echo $logout ?>">
            <input type="submit" value="LOG OUT">
            </form>
            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style="display:<?php echo $registerForm ?>;border:5px solid black;padding:2%;width:40%; margin-top:5%;margin-right:30%; margin-left:30%;">
            <h1 style="margin-left: 40%;margin-right:40%;margin-bottom:8%">Register</h1>
            <div>
            <label for="name" style="margin-right: 3%;">Name</label>
            <input type="text" name="name" style="width:80%; border:0px">
            <hr style="width:80%">
            </div>
            <div>
            <label for="email" style="margin-right: 3%;">Email</label>
            <input type="email" name="email" style="width:80%;border:0px">
            <hr  style="width:80%">
            </div>
            <div>
            <label for="password" style="margin-right: 3%;">Password</label>
            <input type="password" name="password" style="width:80%;border:0px">
            <hr  style="width:80%">
            </div>
            <input type="hidden" name="registerForm" value="true">
            <h3 style="color:red"><?php echo $err ?></h3>
            <input type="submit" value="Submit">
            </form>

            <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" style= "display:<?php echo $loginForm ?>;border:5px solid black;padding:2%;width:40%; margin-top:5%;margin-right:30%; margin-left:30%;">
            <h1 style="margin-left: 40%;margin-right:40%;margin-bottom:8%">Login</h1>
            <div>
            <label for="name" style="margin-right: 3%;">Name</label>
            <input type="text" name="name" style="width:80%; border:0px">
            <hr style="width:80%">
            </div>
            
            <div>
            <label for="password" style="margin-right: 3%;">Password</label>
            <input type="password" name="password" style="width:80%;border:0px" required>
            <hr  style="width:80%">
            </div>
            <h3 style="color:red"><?php echo $err ?></h3>
            <input type="hidden" name="loginForm" value="true">
            <input type="submit" value="Submit">
            </form>
    
	</div>
</body>
</html>
