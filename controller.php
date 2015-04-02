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
    
    $url = "/";
    
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
                    setcookie("user", $result['id'], time()+10800, "/");
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
                                . "<a href='login.php' class='skin-color'>LOGIN</a>";
                    }
                    else{
                        $message = "Error!". mysql_error();
                    }
                }
            }
        }else if($_SERVER["PHP_SELF"] == $url."account.php"){
            if(isset($_POST['updatePW'])){
                $oldpw = $_POST['oldpw'];
                $newpw = $_POST['newpw'];
                $cfmpw = $_POST['cfmpw'];
                
                $customer_query = "SELECT * FROM customer WHERE id = '$user' AND password = '$oldpw'";
                $customer_result = mysql_query($customer_query);
                
                if(mysql_num_rows($customer_result) > 0){
                    if($newpw == $cfmpw){
                        $update_customer = "UPDATE customer SET password = '$newpw' WHERE id = '$user'";
                        if(mysql_query($update_customer)){
                            $message = "Password updated!";
                        }
                        else{
                            die("Error! ". mysql_error());
                        }
                    }
                    else{
                        $message = "New password does not match!";
                    }     
                }
                else{
                    $message = "Wrong old password!";
                }
            }
            if(isset($_POST['updateSetting'])){
                $name = $_POST['name'];
                $email = $_POST['email'];
                $contact = $_POST['contact'];
                
                $update_profile = "UPDATE customer SET name = '$name', email = '$email',"
                        . " contact = '$contact' WHERE id = '$user'";
                if(mysql_query($update_profile)){
                    $message = "Profile Updated!";
                }
                else{
                    die("Error! ". mysql_error());
                }
            }
            
        }else if($_SERVER["PHP_SELF"] == $url."booking.php"){
            $formArr = array();
            
            $noOfAdult = $_POST['noOfAdult'];
            $noOfKid = $_POST['noOfKid'];
            $passenger = $noOfAdult + $noOfKid;
            
            for($i=1; $i<=$passenger; $i++){
                $formArr[$i] = array();
                
                $title = $_POST['title'.$i];
                $name = $_POST['name'.$i];
                $email = $_POST['email'.$i];
                $contact = $_POST['contact'.$i];
                $DOBDay = $_POST['DOBDay'.$i];
                $DOBMonth = $_POST['DOBMonth'.$i];
                $DOBYear = $_POST['DOBYear'.$i];
                $nationality = $_POST['nationality'.$i];
                $passportNum = $_POST['passportNum'.$i];
                $passportDay = $_POST['passportDay'.$i];
                $passportMonth = $_POST['passportMonth'.$i];
                $passportYear = $_POST['passportYear'.$i];
                $baggage = $_POST['baggage'.$i];
                $seatClass = $_POST['seat'.$i];
            
                $dob = $DOBYear."-".$DOBMonth."-".$DOBDay;
                $dob = dateFormatToSQL($dob);
                $ppExpiry = $passportYear."-".$passportMonth."-".$passportDay;
                $ppExpiry = dateFormatToSQL($ppExpiry);
                
                $formArr[$i] = array('title' => $title, 'name' => $name, 
                    'email' => $email, 'contact' => $contact, 'passportNum' => $passportNum,
                    'ppExpiry' => $ppExpiry, 'nationality' => $nationality, 'dob' => $dob,
                    'seatClass' => $seatClass, 'user' => $user, 'baggage' => $baggage,
                    'noOfAdult' => $noOfAdult, 'noOfKid' => $noOfKid);
            }
            $_SESSION['formArr'] = $formArr;
            
            if($_SESSION['formArr'] != null){
                header("Location: price.php");
            }
        }else if($_SERVER["PHP_SELF"] == $url."price.php"){
            $passengerId = 0;
            $particularArr = $_SESSION['formArr'];
            $todayDate = date("Y-m-d");
            $ticketPrice = $_POST['totalPrice'];
            
            $select_passenger = mysql_query("SELECT * FROM passenger");
            
            for($i=1; $i<=sizeOf($particularArr); $i++){
                $baggagePrice = baggagePrice($particularArr[$i]['baggage']);
                $seatPrice = seatPrice($particularArr[$i]['seatClass'], $ticketPrice, $particularArr[$i]['title']);
                $totalPrice = $baggagePrice + $seatPrice + $ticketPrice;
                
                while($row = mysql_fetch_assoc($select_passenger)){
                    if($row['passport'] == $particularArr[$i]['passportNum']){
                        $passengerId = $row['id'];
                        break;
                    }
                }
                if($passengerId == 0){
                    $insert_passenger = "INSERT INTO passenger(title, name, email, contact, passport,"
                        . " ppexpiry, nationality, dob) VALUES ('".$particularArr[$i]['title']."', '".$particularArr[$i]['name']."',"
                        . " '".$particularArr[$i]['email']."', '".$particularArr[$i]['contact']."', '".$particularArr[$i]['passportNum']."',"
                        . " '".$particularArr[$i]['ppExpiry']."', '".$particularArr[$i]['nationality']."', '".$particularArr[$i]['dob']."'); ";

                    if(mysql_query($insert_passenger)){
                        $passengerId = mysql_insert_id();
                    }
                    else{
                        die("Error! ". mysql_error());
                    }
                }
                
                $insert_ticket = "INSERT INTO flightTicket(seat, owner, passenger, checkedIn, datePurchased, totalPrice,"
                    . " baggageAllowance) VALUES ('".$particularArr[$i]['seatClass']."', '".$particularArr[$i]['user']."',"
                    . " '$passengerId', 0, '$todayDate', '$totalPrice', '".$particularArr[$i]['baggage']."'); ";
                
                if(mysql_query($insert_ticket)){
                    $flightticketId = mysql_insert_id();
                }
                else{
                    die("Error! ". mysql_error());
                }
                
                $insert_booking = "INSERT INTO booking(owner, flightTicket) VALUES ('".$particularArr[$i]['user']."',"
                        . " '$flightticketId'); ";
                        
                if(mysql_query($insert_booking)){
                    header("Location: confirmation.php");
                }
                else{
                    die("Error! ". mysql_error());
                }
                
                $passengerId = 0;
            }
        }
    }
    
    if ($_SERVER["REQUEST_METHOD"] == "GET"){
        
        // flights page
        if($_SERVER["PHP_SELF"] == $url."flights.php"){
            $flightArr = array();
            $flightArr_query = "";
            
            $fs_from = $_GET['fs_from'];
            $fs_to = $_GET['fs_to'];
            $fs_fromDate = $_GET['fs_fromDate'];
            $fs_toDate = $_GET['fs_toDate'];
            $fs_adults = $_GET['fs_adults'];
            $fs_kids = $_GET['fs_kids'];
            
            if($_GET['fs_fromDate'] != null){
                $fromDate_sql = dateFormatToSQL($_GET['fs_fromDate']);
            }
            if($_GET['fs_toDate'] != null){
                $toDate_sql = dateFormatToSQL($_GET['fs_toDate']);
            }
            
            $airline_query = "SELECT DISTINCT a.* FROM airline a, flight f"
                    . " WHERE f.departure = '$fs_from' AND f.arrival = '$fs_to'"
                    . " AND f.airline = a.id";
            
            if(isset($fromDate_sql)){
                $airline_query .= " AND f.departureDate = '$fromDate_sql'";
            }else{
                $airline_query .= " AND f.departureDate >= CURDATE()";
            }
            
            if(isset($toDate_sql)){
                $airline_query .= " AND f.arrivalDate = '$toDate_sql'";
            }else{
                $airline_query .= " AND f.arrivalDate >= CURDATE()";
            }

            $airline_result = mysql_query($airline_query);
            
            $flightArr_query = "SELECT f.*, c1.name AS fromCountry, c2.name AS toCountry,"
                    . " al.name AS airlineName, ap1.name AS fromAirport, ap2.name AS toAirport"
                    . " FROM flight f, airport ap1, airport ap2, country c1, country c2, airline al"
                    . " WHERE f.departure = ap1.id AND ap1.country = c1.id"
                    . " AND f.arrival = ap2.id AND ap2.country = c2.id"
                    . " AND f.airline = al.id AND f.departure = '$fs_from'"
                    . " AND f.arrival = '$fs_to'";
            
            if(isset($fromDate_sql)){
                $flightArr_query .= " AND f.departureDate = '$fromDate_sql'";
            }else{
                $flightArr_query .= " AND f.departureDate >= CURDATE()";
            }
            
            if(isset($toDate_sql)){
                $flightArr_query .= " AND f.arrivalDate = '$toDate_sql'";
            }else{
                $flightArr_query .= " AND f.arrivalDate >= CURDATE()";
            }

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
                
                $flightArr_query .= $price_sql . $departTime_sql . $arrivalTime_sql . $airline_sql;
            }
            
            $flightArr_result = mysql_query($flightArr_query);
            while($result = mysql_fetch_assoc($flightArr_result)){
                $flightArr[] = $result;
            }
            
        } else if($_SERVER["PHP_SELF"] == $url."booking.php"){           
            $seatArr = array();
            
            $numOfAdults = $_GET['fs_adults'];
            $numOfKids = $_GET['fs_kids'];
            $flightId = $_GET['flightId'];
            $totalPassenger = $numOfAdults + $numOfKids;
            
            $detailsArr_query = "SELECT f.*, c1.name AS fromCountry, ap2.name AS airportName,"
                    . " c2.name AS toCountry, al.name AS airlineName"
                    . " FROM flight f, airport ap1, airport ap2, country c1, country c2, airline al"
                    . " WHERE f.departure = ap1.id AND ap1.country = c1.id"
                    . " AND f.arrival = ap2.id AND ap2.country = c2.id"
                    . " AND f.airline = al.id AND f.id = '$flightId'";

            $detailsArr_result = mysql_query($detailsArr_query);
            $detailsArr = mysql_fetch_assoc($detailsArr_result);
            
            $seat_query = "SELECT s.* FROM seat s, flight f"
                    . " WHERE s.flight = f.id AND f.id = '$flightId' AND s.id NOT IN("
                    . " SELECT ft.seat FROM flightTicket ft)";

            $seat_result = mysql_query($seat_query);
            while($result = mysql_fetch_assoc($seat_result)){
                $seatArr[] = $result;
            }
        }
    }
?>