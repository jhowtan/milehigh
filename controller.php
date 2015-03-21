<?php 
    session_start();
    include 'config.php';
    include 'function.php';
    
    //connection to server
    $dbhandle = mysql_connect($db_host, $db_user, $db_pass)
      or die("Unable to connect to MySQL");
    
    // connect to database
    $db = mysql_select_db($db_name, $dbhandle)
      or die("Unable to select " + $db_name);
    
    $url = "/milehigh/";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // login page
        if($_SERVER["PHP_SELF"] == $url."login.php"){
            if(isset($_POST["loginForm"])){
                $username = $_POST["login_user"];
                $password = $_POST["login_password"];

                $login_query = "SELECT * FROM customer WHERE user = '$username' AND password = '$password'";
                $login_result = mysql_query($login_query);
                
                if (mysql_num_rows($login_result) > 0) {
                    $result = mysql_fetch_assoc($login_result);
                    setcookie("user", $result['id'], time()+3600, "/");
                    header ("Location: index.php");
                }
                else {
                    $errorMessage = "Invalid Login";
                }
            }
        // signup page
        } else if($_SERVER["PHP_SELF"] == $url."signup.php"){
            if(isset($_POST["signUpForm"])){
                $name = $_POST["name"];
                $username = $_POST["signup_user"];
                $password = $_POST["signup_password"];
                $cfmPassword = $_POST["cfmPassword"];
                $email = $_POST["email"];
                $contact = $_POST["contact"];
                
                $check_query = "SELECT user, email FROM customer WHERE user = '$username' OR email = '$email'";
                $check_result = mysql_query($check_query);
                
                if(mysql_num_rows($check_result) > 0){
                    $message = "This user has sign up already! Please proceed to login";
                } else if ($password != $cfmPassword){
                    $message = "Password does not match!";
                } else {
                    $signup_query = "INSERT INTO customer(user, password, name, email, contact) "
                            . "VALUES ('$username', '$password', '$name', '$email', '$contact')";
                    
                    if(mysql_query($signup_query)){
                        $message = "You have successfully signup with MileHighClub. <br/>You may now proceed to "
                                . "<a href='login.php'>LOGIN</a>";
                    }
                    else{
                        $message = "Error!". mysql_error();
                    }
                }
            }
        }
    }
?>