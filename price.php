<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }
    else{
        header("Location: login.php");
    }
    
    include 'controller.php';
    
    echo "<pre>";
    echo print_r($_SESSION['formArr']);
    echo "</pre>";
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
                            <form class="booking-form">
                                <div class="price-information">
                                    <h2>Total Price</h2>
                                    <div class="form-group row">
                                        
                                            <dl class="term-description">
                                                <dt>Location:</dt><dd>Rome</dd>
                                                <dt>Available Seats:</dt><dd>45</dd>
                                                <dt>Duration:</dt><dd>1 Day</dd>
                                                <dt>Price:</dt><dd>$534</dd>
                                                <dt class="total-price">Ticket Price:</dt><dd class="total-price-value">123</dd>
                                            </dl>
                                        
                                        <div class="price"><small>Total Price:</small> <div class="skin-color">$123</div></div>
                                        <div class="form-group row">
                                            <div class="col-sm-6 col-md-5">
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
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>

