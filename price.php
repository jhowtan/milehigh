<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    } else if(!isset($_SESSION['formArr'])){
        header("Location: booking.php");
    }
    else{
        header("Location: login.php");
    }
    
    include 'controller.php';
    
    $particularArr = $_SESSION['formArr'];
    
    $priceArr_query = "SELECT f.*, c1.name AS fromCountry, c2.name AS toCountry,"
            . " al.name AS airlineName"
            . " FROM flight f, airport ap1, airport ap2, country c1,"
            . " country c2, airline al, seat s"
            . " WHERE f.departure = ap1.id AND ap1.country = c1.id"
            . " AND f.arrival = ap2.id AND ap2.country = c2.id"
            . " AND f.airline = al.id AND s.flight = f.id AND s.id = '".$particularArr[1]['seatClass']."'";    
    $priceArr_result = mysql_query($priceArr_query);
    $priceArr = mysql_fetch_assoc($priceArr_result);
    
    $totalBaggage = 0;
    $totalSeat = 0;
    for($i=1; $i<=sizeOf($particularArr); $i++){
        $totalBaggage += baggagePrice($particularArr[$i]['baggage']);
        $totalSeat += seatPrice($particularArr[$i]['seatClass'], $priceArr['price'],
                $particularArr[$i]['title']);
    }
    
    $adultPrice = $priceArr['price']*$particularArr[1]['noOfAdult'];
    $adultFormat = number_format($adultPrice, 2, '.', '');
    
    $kidPrice = ($priceArr['price']*$particularArr[1]['noOfKid'])/2;
    $kidFormat = number_format($kidPrice, 2, '.', '');
    
    $total = calculateTotalPrice($priceArr['price'], $particularArr[1]['noOfAdult'], 
            $particularArr[1]['noOfKid'], $totalBaggage, $totalSeat);
    $totalFormat = number_format($total, 2, '.', '');
    
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
    <div id="page-wrapper">
        <?php include 'header.php'; ?>
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Flight Booking</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">Flight Booking</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            <form class="booking-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"
                                  method="POST">
                                
                                <div class="price-information">
                                    <h2>Total Flight Price</h2>
                                    <div class="form-group row">
                                        <dl class="term-description">
                                            <dt>Ticket Price:</dt><dd>$<?php echo $priceArr['price']; ?></dd>
                                            <dt>Number of Adults:</dt><dd><?php echo $particularArr[1]['noOfAdult']; ?></dd>
                                            <dt>Number of Kids:</dt><dd><?php echo $particularArr[1]['noOfKid']; ?></dd>
                                            <dt>Total Adults Price:</dt><dd>$<?php echo $adultFormat; ?></dd>
                                            <dt>Total Kids Price:</dt><dd>$<?php echo $kidFormat; ?></dd>
                                            <dt>Additional Baggage:</dt><dd>+ $<?php echo $totalBaggage; ?></dd>
                                            <dt>Additional Seat:</dt><dd>+ $<?php echo number_format($totalSeat, 2, '.', ''); ?></dd>
                                        </dl>
                                        
                                        <div class="price"><small>Total Flight Price:</small><div class="skin-color">
                                            $<?php echo $totalFormat; ?></div>  
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-md-5">
                                                <input type="hidden" name="totalPrice" value="<?php echo $priceArr['price']; ?>"/>
                                                <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                            </div>
                                        </div> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="flight-booking-details">
                                <figure class="clearfix">
                                    <a title="" href="" class="middle-block">
                                        <img class="middle-item" alt="" src="http://placehold.it/75x75">
                                    </a>
                                    <div class="travel-title">
                                        <h5 class="box-title">
                                            <?php echo $priceArr['fromCountry']."<br/><br/>to<br/><br/>".$priceArr['toCountry']; ?>
                                        </h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Departure</label>
                                            <span><?php echo dateDisplay($priceArr['departureDate'])."<br/>Time: ".
                                                    timeDisplay($priceArr['departureTime']); ?></span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span><?php echo countDays($priceArr['departureDate'], $priceArr['arrivalDate']); ?> days</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Arrival</label>
                                            <span><?php echo dateDisplay($priceArr['arrivalDate'])."<br/>Time: ".
                                                    timeDisplay($priceArr['arrivalTime']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Flight Number:</dt><dd class="value"><?php echo $priceArr['flightNumber']; ?></dd>
                                <dt class="feature">Airline:</dt><dd class="value"><?php echo $priceArr['airlineName']; ?></dd>
                                <dt class="feature">Ticket Price:</dt><dd class="value">$<?php echo $priceArr['price']; ?></dd>
                                <dt class="feature">Number Of Adults:</dt><dd class="value"><?php echo $particularArr[1]['noOfAdult']; ?></dd>
                                <dt class="feature">Number Of Children:</dt><dd class="value"><?php echo $particularArr[1]['noOfKid']; ?></dd>
                                <dt class="feature">Additional Baggage:</dt><dd class="value">+ $<?php echo $totalBaggage; ?></dd>
                                <dt class="feature">Additional Seat:</dt><dd class="value">+ $<?php echo number_format($totalSeat, 2, '.', ''); ?></dd>
                                <dt class="total-price">Total Flight Price</dt><dd class="total-price-value">$<?php echo $totalFormat; ?></dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>

