<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    } else{
        header("Location: login.php");
    }
    
    $message = "";
    $font = "";
    include 'controller.php';
    
    $user_query = "SELECT * FROM customer WHERE id = '$user'";
    $user_result = mysql_query($user_query);
    $result = mysql_fetch_assoc($user_result);
    
    $booking_query = "SELECT ft.datePurchased, c1.name AS fromCountry, c2.name AS toCountry,"
            . " f.flightNumber, f.departureDate"
            . " FROM booking b, flightticket ft, seat s, flight f, airport ap1,"
            . " airport ap2, country c1, country c2"
            . " WHERE b.flightTicket = ft.id AND ft.seat = s.id"
            . " AND s.flight = f.id AND f.departure = ap1.id"
            . " AND ap1.country = c1.id AND f.arrival = ap2.id"
            . " AND ap2.country = c2.id AND b.owner = '$user'";
    
    $booking_result = mysql_query($booking_query);
    
?>

<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
    <div id="page-wrapper">
        <header id="header" class="navbar-static-top">
            <div class="topnav hidden-xs">
                <div class="container">
                    <ul class="quick-menu pull-right">
                        <li class="ribbon">
                            <a href="#"><?php echo $result['name']; ?></a>
                            <ul class="menu mini uppercase">
                                <li><a href="#profile" class="location-reload">Profile</a></li>
                                <li><a href="#booking" class="location-reload">Bookings</a></li>
                                <li><a href="#settings" class="location-reload">settings</a></li>
                                <li><a href="logout.php">logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="main-header">
                <div class="container">
                    <h1 class="logo navbar-brand">
                        <a href="index.php" title="MileHighClub - Home">
                            <img src="images/logo.png"/>
                        </a>
                    </h1>
                    <nav id="main-menu" role="navigation">
                        <ul class="menu">
                            <li class="menu-item-has-children active">
                                <a href="index.php">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">Flying with us</a>
                                <ul>
                                    <li><a href="beforeyoufly.php">Before You Fly</a></li>
                                    <li><a href="inflightexp.php">Inflight Experience</a></li>
                                </ul>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="">About</a>
                                <ul>
                                    <li><a href="aboutus.php">About Us</a></li>
                                    <li><a href="policy.php">Our Policy</a></li>
                                    <li><a href="contactus.php">Contact Us</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">My Account</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">My Account</li>
                </ul>
            </div>
        </div>
        <section id="content" class="gray-area">
            <div class="container">
                <div id="main">
                    <div class="tab-container full-width-style arrow-left dashboard">
                        <ul class="tabs">
                            <li class="active"><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profile</a></li>
                            <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Booking</a></li>
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="profile" class="tab-pane fade in active">
                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#"><img width="270" height="263" alt="" src="http://placehold.it/270x263"></a>
                                        </figure>
                                        <div class="details">
                                            <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                                            <h3><font color="red"><?php echo $message; ?></font></h3>
                                            <h2 class="box-title fullname"><?php echo $result['name']; ?></h2>
                                            <dl class="term-description">
                                                <dt>Username (for login):</dt><dd><?php echo $result['user']; ?></dd>
                                                <dt>Email:</dt><dd><?php echo $result['email']; ?></dd>
                                                <dt>Contact Number:</dt><dd><?php echo $result['contact']; ?></dd>
                                            </dl>
                                            
                                        </div>
                                    </article>
                                    <hr>
                                    <h2>About You</h2>
                                        <div class="intro">
                                        <p>Vestibulum tristique, justo eu sollicitudin sagittis, metus dolor eleifend urna.</p>
                                    </div>
                                    <hr>
                                    <h2>Today’s Suggestions</h2>
                                    <div class="suggestions image-carousel style2" data-animation="slide" data-item-width="170" data-item-margin="22">
                                        <ul class="slides">
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Adventure</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Beaches &amp; Sun</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Casinos</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Family Fun</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">History</h5>
                                            </li>
                                            <li>
                                                <a href="#" class="hover-effect">
                                                    <img src="http://placehold.it/170x170" alt="" />
                                                </a>
                                                <h5 class="caption">Adventure</h5>
                                            </li>
                                        </ul>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Benefits of Milehighclub Account</h4>
                                            <ul class="benefits triangle hover">
                                                <li><a href="#">Faster bookings with lesser clicks</a></li>
                                                <li><a href="#">Track travel history &amp; manage bookings</a></li>
                                                <li class="active"><a href="#">Manage profile &amp; personalize experience</a></li>
                                                <li><a href="#">Receive alerts &amp; recommendations</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-md-4 previous-bookings image-box style14">
                                            <h4>Your Previous Bookings</h4>
                                            <article class="box">
                                                <figure class="no-padding">
                                                    <a title="" href="#">
                                                        <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title"><a href="#">Half-Day Island Tour</a><small class="fourty-space"><span class="price">$35</span> Family Package</small></h5>
                                                </div>
                                            </article>
                                            <article class="box">
                                                <figure class="no-padding">
                                                    <a title="" href="#">
                                                        <img alt="" src="http://placehold.it/63x59" width="63" height="59">
                                                    </a>
                                                </figure>
                                                <div class="details">
                                                    <h5 class="box-title"><a href="#">Ocean Park Tour</a><small class="fourty-space"><span class="price">$26</span> Per Person</small></h5>
                                                </div>
                                            </article>
                                        </div>
                                        <div class="col-md-4">
                                            <h4>Need Help?</h4>
                                            <div class="contact-box">
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
                                <div class="edit-profile">
                                    <form class="edit-profile-form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" 
                                          method="POST">
                                        <h2>Personal Details</h2>
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Name:</label>
                                                    <input type="text" name="name" value="<?php echo $result['name']; ?>" 
                                                           class="input-text full-width">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Email:</label>
                                                    <input type="email" name="email" value="<?php echo $result['email']; ?>" 
                                                           class="input-text full-width">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Contact Number:</label>
                                                    <input type="text" name="contact" value="<?php echo $result['contact']; ?>" 
                                                           class="input-text full-width" onkeypress="return isNumber(event);">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button class="btn-medium" name="updateSetting">UPDATE SETTING</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="booking" class="tab-pane fade">
                                <h2>Trips You have Booked!</h2>
                                <div class="booking-history">
                                    <?php 
                                        while($row = mysql_fetch_assoc($booking_result)){
                                            $dateFormat = dateDisplay($row['departureDate']);
                                            list($date, $month, $year) = split("-", $dateFormat);
                                            $day = date("D", strtotime($row['departureDate']));
                                            
                                            if(strtotime(date('Y-m-d')) < strtotime($row['departureDate'])){
                                                $msg = "UPCOMING";
                                            }
                                            else{
                                                $msg = "ENDED";
                                                $font = "cancelled";
                                            }
                                    ?>
                                    <div class="booking-info clearfix" class="<?php echo $font; ?>">
                                        <div class="date">
                                            <label class="month"><?php echo $month; ?></label>
                                            <label class="date"><?php echo $date; ?></label>
                                            <label class="day"><?php echo $day; ?></label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>
                                            <?php echo $row['fromCountry']." to ".$row['toCountry']; ?></h4>
                                        <dl class="info">
                                            <dt>flight Number</dt>
                                            <dd><?php echo $row['flightNumber']; ?></dd>
                                            <dt>booked on</dt>
                                            <dd><?php echo dateDisplay($row['datePurchased']); ?></dd>
                                        </dl>
                                        <button class="btn-mini status"><?php echo $msg; ?></button>
                                    </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane fade">
                                <h3><font color="red"><?php echo $message; ?></font></h3>
                                <h2>Account Settings</h2>
                                <h5 class="skin-color">Change Your Password</h5>
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Old Password</label>
                                            <input type="password" name="oldpw" class="input-text full-width" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Enter New Password</label>
                                            <input type="password" name="newpw" class="input-text full-width" required>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirm New password</label>
                                            <input type="password" name="cfmpw" class="input-text full-width" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium" name="updatePW">UPDATE PASSWORD</button>
                                    </div>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#profile .edit-profile-btn").click(function(e) {
                e.preventDefault();
                tjq(".view-profile").fadeOut();
                tjq(".edit-profile").fadeIn();
            });

            setTimeout(function() {
                tjq(".notification-area").append('<div class="info-box block"><span class="close"></span><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus ab quis a dolorem, placeat eos doloribus esse repellendus quasi libero illum dolore. Esse minima voluptas magni impedit, iusto, obcaecati dignissimos.</p></div>');
            }, 10000);
        });
        tjq('a[href="#profile"]').on('shown.bs.tab', function (e) {
            tjq(".view-profile").show();
            tjq(".edit-profile").hide();
        });
    </script>
</body>
</html>
