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
                    <li><a href="flights.php">Flights</a></li>
                    <li><a href="flightDetails.php">Flights details</a></li>
                    <li class="active">Flight Booking</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sms-6 col-sm-8 col-md-9">
                        <div class="booking-section travelo-box">
                            <form class="booking-form" method="post" action="confirmation.php">
                                <div class="person-information">
                                    <h2>Passenger Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Title</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="Mr">Mr</option>
                                                    <option value="Mrs">Mrs</option>
                                                    <option value="Ms">Ms</option>
                                                    <option value="Mdm">Mdm</option>
                                                    <option value="Dr">Dr</option>
                                                    <option value="Prof">Prof</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>first name (as in passport)</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>last name (family name as in passport)</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Birth Date</label>
                                            <div class="constant-column-3" >
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <?php 
                                                            for($i=1; $i<=31; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width">
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
                                                    <select class="full-width">
                                                        <?php 
                                                            for($i=2003; $i>=1900; $i--){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>email address</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>confirm email address</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-2">
                                            <label>Country Code</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Contact number</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <div class="passport-information">
                                    <h2>Passport Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Nationality of Passport</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Birth Date</label>
                                            <div class="constant-column-3" >
                                                <div class="selector">
                                                    <select class="full-width">
                                                        <?php 
                                                            for($i=1; $i<=31; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="selector">
                                                    <select class="full-width">
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
                                                    <select class="full-width">
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
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Passport Number</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-10 col-md-10 ">
                                            <p>* Passport must have a minimum 6-month validity from the latest date of travel. 
                                                Otherwise, passenger will be denied boarding at the airport</p>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="baggage-information">
                                    <h2>Baggage Selection</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Baggage Type</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option>25kg @ $30</option>
                                                    <option>30kg @ $40</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="seat-information">
                                    <h2>Seat Selection</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Seat Type</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option>Standard @ $10</option>
                                                    <option>Premium @ $30</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="card-information">
                                    <h2>Your Card Information</h2>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Credit Card Type</label>
                                            <div class="selector">
                                                <select class="full-width">
                                                    <option value="Visa">Visa</option>
                                                    <option value="Mastercard">Mastercard</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-md-5">
                                            <label>Card holder name</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Card number</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                        <div class="col-sm-6 col-md-2">
                                            <label>CCV</label>
                                            <input type="text" class="input-text full-width" value="" placeholder="" required="required"/>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-6 col-md-5">
                                            <label>Expiration Date</label>
                                            <div class="constant-column-2">
                                                <div class="selector">
                                                    <select class="full-width">
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
                                                    <select class="full-width">
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
                                <hr />
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I want to receive <span class="skin-color">Travelo</span> promotional offers in the future
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> By continuing, you agree to the <a href="#"><span class="skin-color">Terms and Conditions</span></a>.
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
                    <div class="sidebar col-sms-6 col-sm-4 col-md-3">
                        <div class="booking-details travelo-box">
                            <h4>Booking Details</h4>
                            <article class="flight-booking-details">
                                <figure class="clearfix">
                                    <a title="" href="flight-detailed.html" class="middle-block"><img class="middle-item" alt="" src="http://placehold.it/75x75"></a>
                                    <div class="travel-title">
                                        <h5 class="box-title">Indianapolis to paris<small>Oneway flight</small></h5>
                                        <a href="flight-detailed.html" class="button">EDIT</a>
                                    </div>
                                </figure>
                                <div class="details">
                                    <div class="constant-column-3 timing clearfix">
                                        <div class="check-in">
                                            <label>Take off</label>
                                            <span>NOV 30, 2013<br />7:50 am</span>
                                        </div>
                                        <div class="duration text-center">
                                            <i class="soap-icon-clock"></i>
                                            <span>13h, 40m</span>
                                        </div>
                                        <div class="check-out">
                                            <label>landing</label>
                                            <span>Nov 13 2013<br />9:20 am</span>
                                        </div>
                                    </div>
                                </div>
                            </article>
                            
                            <h4>Other Details</h4>
                            <dl class="other-details">
                                <dt class="feature">Airline:</dt><dd class="value">Delta</dd>
                                <dt class="feature">Flight type:</dt><dd class="value">Economy</dd>
                                <dt class="feature">base fare:</dt><dd class="value">$320</dd>
                                <dt class="feature">taxes and fees:</dt><dd class="value">$300</dd>
                                <dt class="total-price">Total Price</dt><dd class="total-price-value">$620</dd>
                            </dl>
                        </div>
                        
                        <div class="travelo-box contact-box">
                            <h4>Need Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 6123 4567</span>
                                <br>
                                <a class="contact-email" href="#">help@milehighclub.com</a>
                            </address>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>
    