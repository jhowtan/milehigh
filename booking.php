<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    } else if(!isset($_GET['flightId'])){
        header("Location: flights.php");
    }
    else{
        header("Location: login.php");
    }
    
    include 'controller.php';
    
    //echo "<pre>";
    //echo print_r($detailsArr);
    //echo "</pre>";
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
                    <li><a href="">Search Flights</a></li>
                    <li class="active">Flight Booking</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
                                   class="booking-form" method="POST">
                                
                                <?php for($j=1; $j<=$numOfAdults; $j++) { ?>
                                <div class="person-information">
                                    <h2 class="skin-color">Adult <?php echo $j; ?></h2>
                                    <h4> Personal Particular</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Title</label>
                                            <div class="selector">
                                                <select class="full-width" name="title">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Ms">Ms</option>
                                                    <option value="Mdm">Mdm</option>
                                                    <option value="Dr">Dr</option>
                                                    <option value="Prof">Prof</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Full name (as in passport)</label>
                                            <input type="text" name="name" class="input-text full-width" placeholder="Enter Here" required/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" name="email" class="input-text full-width" placeholder="Enter Here"/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Contact number</label>
                                            <input type="text" name="contact" class="input-text full-width" placeholder="Enter Here" required 
                                                   onkeypress="return isNumber(event);"/>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Date of birth</label>
                                            <div class="constant-column-3" >
                                                <div class="selector">
                                                    <select class="full-width" name="DOBDay">
                                                        <?php 
                                                            for($i=1; $i<=31; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width" name="DOBMonth">
                                                        <option value="1">Jan</option>
                                                        <option value="2">Feb</option>
                                                        <option value="3">Mar</option>
                                                        <option value="4">Apr</option>
                                                        <option value="5">May</option>
                                                        <option value="6">Jun</option>
                                                        <option value="7">Jul</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sep</option>
                                                        <option value="10">Oct</option>
                                                        <option value="11">Nov</option>
                                                        <option value="12">Dec</option>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width" name="DOBYear">
                                                        <?php 
                                                            for($i=2015; $i>=1920; $i--){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="passport-information">
                                    <h4>Passport Information</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Nationality of Passport</label>
                                            <input type="text" name="nationality" class="input-text full-width" placeholder="Enter Here" required/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Passport Number</label>
                                            <input type="text" name="passportNum" class="input-text full-width" placeholder="Enter Here" required/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Expiry Date</label>
                                            <div class="constant-column-3" >
                                                <div class="selector">
                                                    <select class="full-width" name="passportDay">
                                                        <?php 
                                                            for($i=1; $i<=31; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width" name="passportMonth">
                                                        <option value="1">Jan</option>
                                                        <option value="2">Feb</option>
                                                        <option value="3">Mar</option>
                                                        <option value="4">Apr</option>
                                                        <option value="5">May</option>
                                                        <option value="6">Jun</option>
                                                        <option value="7">Jul</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sep</option>
                                                        <option value="10">Oct</option>
                                                        <option value="11">Nov</option>
                                                        <option value="12">Dec</option>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width" name="passportYear">
                                                        <?php 
                                                            for($i=2015; $i<=2031; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="baggage-information">
                                    <h4>Flight Details</h4>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Baggage Type</label>
                                            <div class="selector">
                                                <select class="full-width" name="baggage">
                                                    <option value="">25kg / +$30</option>
                                                    <option value="">30kg / +$40</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Seat Class</label>
                                            <div class="selector" name="seat">
                                                <select class="full-width">
                                                    <option value="">Economy </option>
                                                    <option value="">Business +$100</option>
                                                    <option value="">First Class +$200</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <?php } ?>
                                
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> By confirming, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 col-md-5">
                                        <button type="submit" class="full-width btn-large">CONFIRM BOOKING</button>
                                    </div>
                                </div>
                                <a href="confirmation.php">CLICK HERE!</a> <--- Quick link to confirmation page if not you gonna fill up all the reqired field
                            </form>
                        </div>
                    </div>
                    
                    <!---------- SIDE BAR ------------>
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="flight-booking-details">
                                <figure class="clearfix">
                                    <a title="" href="flight-detailed.html" class="middle-block">
                                        <img class="middle-item" alt="" src="http://placehold.it/75x75">
                                    </a>
                                    <div class="travel-title">
                                        <h5 class="box-title">
                                            <?php echo $detailsArr['fromCountry']."<br/><br/>to<br/><br/>".$detailsArr['toCountry']; ?>
                                        </h5>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Departure</label>
                                            <span><?php echo dateDisplay($detailsArr['departureDate'])."<br/>Time: ".
                                                    timeDisplay($detailsArr['departureTime']); ?></span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span><?php echo countDays($detailsArr['departureDate'], $detailsArr['arrivalDate']); ?> days</span>
                                        </div>
                                        <div class="check-out">
                                            <label>Arrival</label>
                                            <span><?php echo dateDisplay($detailsArr['arrivalDate'])."<br/>Time: ".
                                                    timeDisplay($detailsArr['arrivalTime']); ?></span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Flight Number:</dt><dd class="value"><?php echo $detailsArr['flightNumber']; ?></dd>
                                <dt class="feature">Airline:</dt><dd class="value"><?php echo $detailsArr['airlineName']; ?></dd>
                                <dt class="feature">Ticket Price (Adult):</dt><dd class="value">$<?php echo $detailsArr['price']; ?></dd>
                                <dt class="feature">Number of Adults:</dt><dd class="value"><?php echo $numOfAdults; ?></dd>
                                <dt class="feature">Number of Children:</dt><dd class="value"><?php echo $numOfKids; ?></dd>
                                <dt class="total-price">Ticket Price:</dt><dd class="total-price-value">
                                    $<?php echo calculateCost($detailsArr['price'], $numOfAdults, $numOfKids); ?></dd>
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
    