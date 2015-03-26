<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }
    else{
        header("Location: login.php");
    }
    
    include 'controller.php';
    
    $confirmArr = $_SESSION['formArr'];
    
    $confirm_query = "SELECT f.*, c1.name AS fromCountry, ap1.name AS fromAirport,"
            . " c2.name AS toCountry, ap2.name AS toAirport, al.name AS airlineName"
            . " FROM flight f, airport ap1, airport ap2, country c1, country c2, airline al,"
            . " seat s WHERE f.departure = ap1.id AND ap1.country = c1.id"
            . " AND f.arrival = ap2.id AND ap2.country = c2.id"
            . " AND f.airline = al.id AND s.flight = f.id AND s.id = '".$confirmArr[1]['seatClass']."'";
    $confirm_result = mysql_query($confirm_query);
    $result = mysql_fetch_assoc($confirm_result);

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
                    <h2 class="entry-title">Booking Confirmation</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li>Flights</li>
                    <li>Flights details</li>
                    <li>Flight Booking</li>
                    <li class="active">Confirmation</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div class="row">
                    <div id="main" class="col-sm-8 col-md-9">
                        <div class="booking-information travelo-box">
                            <h2>Booking Confirmation</h2>
                            <hr />
                            <div class="booking-confirmation clearfix">
                                <i class="soap-icon-recommend icon circle"></i>
                                <div class="message">
                                    <h4 class="main-message">Thank You. Your Booking Order is Confirmed Now.</h4>
                                    <p>A confirmation email has been sent to your provided email address.</p>
                                </div>
                                <a href="#" class="print-button button btn-small">PRINT DETAILS</a>
                            </div>
                            <hr />
                            <h2>Traveler Information</h2>
                            <dl class="term-description">
                                <dt>Flight Number:</dt><dd><?php echo $result['flightNumber']; ?></dd>
                                <dt>Airline:</dt><dd><?php echo $result['airlineName']; ?></dd>
                                <dt>Flying From:</dt><dd><?php echo $result['fromCountry']." -- ".$result['fromAirport']; ?></dd>
                                <dt>Going To:</dt><dd><?php echo $result['toCountry']." -- ".$result['toAirport']; ?></dd>
                                <dt>Departure Date:</dt><dd><?php echo dateDisplay($result['departureDate']); ?></dd>
                                <dt>Departure Time:</dt><dd><?php echo timeDisplay($result['departureTime']); ?></dd>
                                <dt>Arrival Date:</dt><dd><?php echo dateDisplay($result['arrivalDate']); ?></dd>
                                <dt>Arrival Time:</dt><dd><?php echo timeDisplay($result['arrivalTime']); ?></dd>
                                <dt>Flight Status:</dt><dd><?php echo $result['status']; ?></dd>
                            </dl>
                            <hr />
                            <h2>Payment</h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br />
                            <p class="red-color">Payment is made by Credit Card Via Paypal.</p>
                            <hr />
                            <h2>View Booking Details</h2>
                            <p>Praesent dolor lectus, rutrum sit amet risus vitae, imperdiet cursus neque. Nulla tempor nec lorem eu suscipit. Donec dignissim lectus a nunc molestie consectetur. Nulla eu urna in nisi adipiscing placerat. Nam vel scelerisque magna. Donec justo urna, posuere ut dictum quis.</p>
                            <br />
                            <a href="#" class="red-color underline view-link">https://www.travelo.com/booking-details/?=f4acb19f-9542-4a5c-b8ee</a>
                        </div>
                    </div>
                    <div class="sidebar col-sm-4 col-md-3">
                        <div class="travelo-box contact-box">
                            <h4>Need Help?</h4>
                            <p>We would be more than happy to help you. Our team advisor are 24/7 at your service to help you.</p>
                            <address class="contact-details">
                                <span class="contact-phone"><i class="soap-icon-phone"></i> 6123 4567</span>
                                <br>
                                <a class="contact-email" href="#">help@milehighclub.com</a>
                            </address>
                        </div>
                        <div class="travelo-box book-with-us-box">
                            <h4>Why Book with us?</h4>
                            <ul>
                                <li>
                                    <i class="soap-icon-hotel-1 circle"></i>
                                    <h5 class="title"><a href="#">135,00+ Hotels</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-savings circle"></i>
                                    <h5 class="title"><a href="#">Low Rates &amp; Savings</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                                <li>
                                    <i class="soap-icon-support circle"></i>
                                    <h5 class="title"><a href="#">Excellent Support</a></h5>
                                    <p>Nunc cursus libero pur congue arut nimspnty.</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
</body>
</html>