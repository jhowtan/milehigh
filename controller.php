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
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        
        if($_SERVER["PHP_SELF"] == $url."flights.php"){
            $flightArr = array();
            $flightArr_query = "";
            
            $fs_from = $_GET['fs_from'];
            $fs_to = $_GET['fs_to'];
            $fs_fromDate = $_GET['fs_fromDate'];
            $fs_toDate = $_GET['fs_toDate'];
            //$fs_promo = $_GET['fs_promo'];
            
            $fromDate = date_create($_GET['fs_fromDate']);
            $fromDate_sql = date_format($fromDate, 'Y-m-d');
            $toDate = date_create($_GET['fs_toDate']);
            $toDate_sql = date_format($toDate, 'Y-m-d');
            
            $airline_query = "SELECT DISTINCT a.* "
                    . " FROM airline a, flight f, airport ap"
                    . " WHERE (f.departure = ap.id AND ap.country = '$fs_from')"
                    . " AND (f.arrival = ap.id AND ap.country = '$fs_to')"
                    . " AND f.airline = a.id";
            $airline_result = mysql_query($airline_query);
            
            if(isset($_GET['filter'])){
                $price_sql = "";
                $departTime_sql = "";
                $arrivalTime_sql = "";
                $airline_sql = "";
                
                $price_range = $_GET['price_range'];
                $departTime_range = $_GET['departTime_range'];
                $arrivalTime_range = $_GET['arrivalTime_range'];
                $airline_filter = $_GET['airline_filter'];
                
                if($price_range != null){
                    if($price_range == 1){
                        $priceFrom = 0;
                        $priceTo = 499;
                    } else if($price_range == 2){
                        $priceFrom = 500;
                        $priceTo = 999;
                    } else if($price_range == 3){
                        $priceFrom = 1000;
                        $priceTo = 100000;
                    }
                    $price_sql = " AND f.price BETWEEN $priceFrom AND $priceTo";
                }
                
                if($departTime_range != null){
                    if($departTime_range == 1){
                        $departTimeFrom = "000000";
                        $departTimeTo = "115900";
                    } else if($departTime_range == 2){
                        $departTimeFrom = "120000";
                        $departTimeTo = "235900";
                    }
                    $departTime_sql = " AND f.departureTime BETWEEN $departTimeFrom AND $departTimeTo";
                }
                
                if($arrivalTime_range != null){
                    if($arrivalTime_range == 1){
                        $arrivalTimeFrom = "000000";
                        $arrivalTimeTo = "115900";
                    } else if($arrivalTime_range == 2){
                        $arrivalTimeFrom = "120000";
                        $arrivalTimeTo = "235900";
                    }
                    $arrivalTime_sql = " AND f.arrivalTime BETWEEN $arrivalTimeFrom AND $arrivalTimeTo";
                }
                
                if($airline_filter != null){
                    $airline_sql = " AND f.airline = '$airline_filter'";
                }
                
                $flightArr_query = "SELECT f.*, c1.name AS fromCountry, c2.name AS toCountry,"
                        . " al.name AS airlineName"
                        . " FROM flight f, airport a, country c1, country c2, airline al"
                        . " WHERE f.departure = a.id AND a.country = '$fs_from'"
                        . " AND f.arrival = a.id AND a.country = '$fs_to'"
                        . " AND c1.id = '$fs_from' AND c2.id = '$fs_to' AND f.airline = al.id"
                        . " AND f.departureDate = '$fromDate_sql' AND f.arrivalDate = '$toDate_sql'"
                        . $price_sql . $departTime_sql . $arrivalTime_sql . $airline_sql;
                //echo $flightArr_query;
             
            }
            else{
                $flightArr_query = "SELECT f.*, c1.name AS fromCountry, c2.name AS toCountry,"
                        . " al.name AS airlineName"
                        . " FROM flight f, airport a, country c1, country c2, airline al"
                        . " WHERE f.departure = a.id AND a.country = '$fs_from'"
                        . " AND f.arrival = a.id AND a.country = '$fs_to'"
                        . " AND c1.id = '$fs_from' AND c2.id = '$fs_to' AND f.airline = al.id"
                        . " AND f.departureDate = '$fromDate_sql' AND f.arrivalDate = '$toDate_sql'";
                //echo $flightArr_query;
            }
            
            $flightArr_result = mysql_query($flightArr_query);
            while($result = mysql_fetch_assoc($flightArr_result)){
                $flightArr[] = $result;
            }
        }
    }
?>