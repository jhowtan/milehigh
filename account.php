<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    } else{
        header("Location: login.php");
    }
    
    include 'controller.php';
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
                            <a href="#">Jessica Brown</a>
                            <ul class="menu mini uppercase">
                                <li><a href="#dashboard" class="location-reload">Dashboard</a></li>
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
                            <li class="active"><a data-toggle="tab" href="#dashboard"><i class="soap-icon-anchor circle"></i>Dashboard</a></li>
                            <li class=""><a data-toggle="tab" href="#profile"><i class="soap-icon-user circle"></i>Profile</a></li>
                            <li class=""><a data-toggle="tab" href="#booking"><i class="soap-icon-businessbag circle"></i>Booking</a></li>
                            <li class=""><a data-toggle="tab" href="#settings"><i class="soap-icon-settings circle"></i>Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div id="dashboard" class="tab-pane fade in active">
                                <h1 class="no-margin skin-color">Hi Jessica, Welcome to Travelo!</h1>
                                <p>All your trips booked with us will appear here and you’ll be able to manage everything!</p>
                                <br />
                                <div class="row block">
                                    <div class="col-sm-6 col-md-3">
                                        <a href="flight-list-view.html">
                                            <div class="fact yellow">
                                                <div class="numbers counters-box">
                                                    <dl>
                                                        <dt class="display-counter" data-value="4509">0</dt>
                                                        <dd>Airlines to Travel</dd>
                                                    </dl>
                                                    <i class="icon soap-icon-plane"></i>
                                                </div>
                                                <div class="description">
                                                    <i class="icon soap-icon-longarrow-right"></i>
                                                    <span>View Flights</span>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="notification-area">
                                    <div class="info-box block">
                                        <span class="close"></span>
                                        <p>This is your Dashboard, the place to check your Profile, respond to Reservation Requests, 
                                            view upcoming Trip Information, and much more.</p>
                                    </div>
                                </div>
                                <div class="row block">
                                    <div class="col-md-6 notifications">
                                        <h2>Notifications</h2>
                                        <a href="#">
                                            <div class="icon-box style1 fourty-space">
                                                <i class="soap-icon-plane-right takeoff-effect yellow-bg"></i>
                                                <span class="time pull-right">JUST NOW</span>
                                                <p class="box-title">London to Paris flight in <span class="price">$120</span></p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon-box style1 fourty-space">
                                                <i class="soap-icon-hotel blue-bg"></i>
                                                <span class="time pull-right">10 Mins ago</span>
                                                <p class="box-title">Hilton hotel &amp; resorts in <span class="price">$247</span></p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon-box style1 fourty-space">
                                                <i class="soap-icon-car red-bg"></i>
                                                <span class="time pull-right">39 Mins ago</span>
                                                <p class="box-title">Economy car for 2 days in <span class="price">$39</span></p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="icon-box style1 fourty-space">
                                                <i class="soap-icon-cruise green-bg"></i>
                                                <span class="time pull-right">1 hour ago</span>
                                                <p class="box-title">Baja Mexico 4 nights in <span class="price">$537</span></p>
                                            </div>
                                        </a>
                                        <a href="#">
                                            <div class="load-more">. . . . . . . . . . . . . </div>
                                        </a>
                                    </div>
                                    <div class="col-md-6">
                                        <h2>Recent Activity</h2>
                                        <div class="recent-activity">
                                            <ul>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon soap-icon-plane-right circle takeoff-effect yellow-color"></i>
                                                        <span class="price"><small>avg/person</small>$120</span>
                                                        <h4 class="box-title">
                                                            Indianapolis to Paris<small>Oneway flight</small>
                                                        </h4>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon soap-icon-car circle red-color"></i>
                                                        <span class="price"><small>per day</small>$45.39</span>
                                                        <h4 class="box-title">
                                                            Economy Car<small>bmw mini</small>
                                                        </h4>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon soap-icon-cruise circle green-color"></i>
                                                        <span class="price"><small>from</small>$578</span>
                                                        <h4 class="box-title">
                                                            Jacksonville to Asia<small>4 nights</small>
                                                        </h4>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="icon soap-icon-hotel circle blue-color"></i>
                                                        <span class="price"><small>Avg/night</small>$620</span>
                                                        <h4 class="box-title">
                                                            Hilton Hotel &amp; Resorts<small>Paris france</small>
                                                        </h4>
                                                    </a>
                                                </li>
                                            </ul>
                                            <a href="#" class="button green btn-small full-width">VIEW ALL ACTIVITIES</a>
                                        </div>
                                    </div>
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
                            <div id="profile" class="tab-pane fade">
                                <div class="view-profile">
                                    <article class="image-box style2 box innerstyle personal-details">
                                        <figure>
                                            <a title="" href="#"><img width="270" height="263" alt="" src="http://placehold.it/270x263"></a>
                                        </figure>
                                        <div class="details">
                                            <a href="#" class="button btn-mini pull-right edit-profile-btn">EDIT PROFILE</a>
                                            <h2 class="box-title fullname">Jessica Brown</h2>
                                            <dl class="term-description">
                                                <dt>user name:</dt><dd>info@jessica.com</dd>
                                                <dt>first name:</dt><dd>jessica</dd>
                                                <dt>last name:</dt><dd>brown</dd>
                                                <dt>phone number:</dt><dd>1-800-123-HELLO</dd>
                                                <dt>Date of birth:</dt><dd>15 August 1985</dd>
                                                <dt>Street Address and number:</dt><dd>353 Third floor Avenue</dd>
                                                <dt>Town / City:</dt><dd>Paris,France</dd>
                                                <dt>ZIP code:</dt><dd>75800-875</dd>
                                                <dt>Country:</dt><dd>United States of america</dd>
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
                                    <form class="edit-profile-form">
                                        <h2>Personal Details</h2>
                                        <div class="col-sm-9 no-padding no-float">
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>First Name</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Last Name</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Email Address</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Verify Email Address</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Country Code</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option>United Kingdom (+44)</option>
                                                            <option>United States (+1)</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Phone Number</label>
                                                    <input type="text" class="input-text full-width" placeholder="">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <label class="col-xs-12">Date of Birth</label>
                                                <div class="col-xs-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">date</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">month</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-xs-4 col-sm-2">
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">year</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Contact Details</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Street Name</label>
                                                    <input type="text" class="input-text full-width">
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Address</label>
                                                    <input type="text" class="input-text full-width">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>City</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Country</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-sms-6 col-sm-6">
                                                    <label>Region State</label>
                                                    <div class="selector">
                                                        <select class="full-width">
                                                            <option value="">Select...</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Upload Profile Photo</h2>
                                            <div class="row form-group">
                                                <div class="col-sms-12 col-sm-6 no-float">
                                                    <div class="fileinput full-width">
                                                        <input type="file" class="input-text" data-placeholder="select image/s">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h2>Describe Yourself</h2>
                                            <div class="form-group">
                                                <textarea rows="5" class="input-text full-width" placeholder="please tell us about you"></textarea>
                                            </div>
                                            <div class="from-group">
                                                <button type="submit" class="btn-medium col-sms-6 col-sm-4">UPDATE SETTINGS</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div id="booking" class="tab-pane fade">
                                <h2>Trips You have Booked!</h2>
                                <div class="booking-history">
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect yellow-color circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">11</label>
                                            <label class="day">MON</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-hotel blue-color circle"></i>Hilton Hotel &amp; Resorts<small>2 adults staying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>monday, dec 11, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">18</label>
                                            <label class="day">THU</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-car red-color circle"></i>Economy Car<small>you are driving</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>thursday, dec 18, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix">
                                        <div class="date">
                                            <label class="month">DEC</label>
                                            <label class="date">22</label>
                                            <label class="day">SUN</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-cruise green-color circle"></i>Baja Mexico<small>3 adults going on cruise</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>sunday, dec 22, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">UPCOMMING</button>
                                    </div>
                                    <div class="booking-info clearfix cancelled">
                                        <div class="date">
                                            <label class="month">NOV</label>
                                            <label class="date">30</label>
                                            <label class="day">SAT</label>
                                        </div>
                                        <h4 class="box-title"><i class="icon soap-icon-plane-right takeoff-effect circle"></i>England to Rome<small>you are flying</small></h4>
                                        <dl class="info">
                                            <dt>TRIP ID</dt>
                                            <dd>5754-8dk8-8ee</dd>
                                            <dt>booked on</dt>
                                            <dd>saturday, nov 30, 2013</dd>
                                        </dl>
                                        <button class="btn-mini status">CANCELLED</button>
                                    </div>
                                </div>
                            </div>
                            <div id="settings" class="tab-pane fade">
                                <h2>Account Settings</h2>
                                <h5 class="skin-color">Change Your Password</h5>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Old Password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Enter New Password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirm New password</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">UPDATE PASSWORD</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Change Your Email</h5>
                                <form>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Old email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Enter New Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-xs-12 col-sm-6 col-md-4">
                                            <label>Confirm New Email</label>
                                            <input type="text" class="input-text full-width">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button class="btn-medium">UPDATE EMAIL ADDRESS</button>
                                    </div>
                                </form>
                                <hr>
                                <h5 class="skin-color">Send Me Emails When</h5>
                                <form>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Travelo has periodic offers and deals on really cool destinations.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Travelo has fun company news, as well as periodic emails.
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I have an upcoming reservation.
                                        </label>
                                    </div>
                                    <button class="btn-medium uppercase">Update All Settings</button>
                                </form>
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