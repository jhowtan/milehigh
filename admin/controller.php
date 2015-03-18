<?php 
    session_start();
    include '../config.php';
    include 'function.php';
    $url = "/milehigh/admin/";
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        // index page
        if($_SERVER["PHP_SELF"] == $url."index.php"){
            $user = test_input($_POST["user"]);
            $password = test_input($_POST["password"]);

            $sql = "SELECT * FROM admin WHERE user = '$user' AND password = '$password'";
            $query = mysql_query($sql);

            if (mysql_num_rows($query) > 0) {
                $result = mysql_fetch_assoc($query);
                $_SESSION["login"] = $result["id"];
                echo "hello";
                header ("Location: main.php");
            }
            else {
                $errorMessage = "Invalid Login";
            }
        }
    }
?>