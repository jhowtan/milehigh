<?php 
    session_start();
    include '../config.php';
    include 'function.php';
    
    //connection to server
    $dbhandle = mysql_connect($db_host, $db_user, $db_pass)
      or die("Unable to connect to MySQL");
    
    // connect to database
    $db = mysql_select_db($db_name, $dbhandle)
      or die("Unable to select " + $db_name);
    
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
        } else if($_SERVER["PHP_SELF"] == $url."addflight.php"){
            $flightNum = test_input($_POST["flightNum"]);
            $departureDate = $_POST["departDate"];
            $departureTime = $_POST["departTime"];
            $arrivalDate = $_POST["arrivalDate"];
            $arrivalTime = $_POST["arrivalTime"];
            $price = $_POST["price"];
            $airline = $_POST["airline"];
            $from = $_POST["departure"];
            $to = $_POST["arrival"];
            $status = $_POST["status"];
            
            $insert_flight_query = "INSERT INTO flight(status, departure, arrival, airline, "
                    . "price, departureTime, departureDate, arrivalTime, arrivalDate, flightNumber)"
                    . "VALUES ('$status', '$from', '$to', '$airline', '$price', '$departureTime',"
                    . "'$departureDate', '$arrivalTime', '$arrivalDate', '$flightNum')";
            if(mysql_query($insert_flight_query)){
                $message = "New flight added!";
            }
            else{
                $message = "Error!". mysql_error();
            }
        }
    }
?>