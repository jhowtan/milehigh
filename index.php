<?php
    include 'controller.php';
    
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }
        
    $countries_query = "SELECT name FROM country";
    $countries = mysql_query($countries_query);
?>
<!DOCTYPE html>
<html>
<?php include 'head.php'; ?>
<body>
    <div id="page-wrapper">
        <?php include 'header.php'; ?>
        <div id="slideshow">
            <div class="fullwidthbanner-container">
                <div class="revolution-slider" style="height: 0; overflow: hidden;">
                    <ul>    <!-- SLIDE  -->
                        <!-- Slide1 -->
                        <li data-transition="zoomin" data-slotamount="7" data-masterspeed="1500">
                            <!-- MAIN IMAGE -->
                            <img src="http://placehold.it/2080x646" alt="">
                        </li>

                    </ul>
                </div>
            </div>
        </div>
        <!-- FORM FOR FLIGHT SEARCH -->
        <section id="content">
            <div class="search-box-wrapper">
                <div class="search-box container">
                    <ul class="search-tabs clearfix">
                        <li class="active"><a href="#flights-tab" data-toggle="tab">FLIGHTS</a></li>
                        <li><a href="#flight-status-tab" data-toggle="tab">Check flights status</a></li>
                    </ul>
                    <div class="search-tab-content">
                        <div class="tab-pane fade active in" id="flights-tab">
                            <form action="flights.php" method="post">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group">
                                            <label>Leaving From</label>
                                            <input type="text" name="fs_from" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                        <div class="form-group">
                                            <label>Going To</label>
                                            <input type="text" name="fs_to" class="input-text full-width" placeholder="city, distirct or specific airpot" />
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h4 class="title">When</h4>
                                        <label>Departing On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="fs_fromDate" class="input-text full-width" placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                        </div>
                                        <label>Arriving On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="fs_toDate" class="input-text full-width" placeholder="mm/dd/yyyy" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Adults</label>
                                                <div class="selector">
                                                    <select name="fs_adults" class="full-width">
                                                        <option value="0">0</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Children</label>
                                                <div class="selector">
                                                    <select name="fs_children" class="full-width">
                                                        <option value="0">0</option>
                                                        <option value="1">01</option>
                                                        <option value="2">02</option>
                                                        <option value="3">03</option>
                                                        <option value="4">04</option>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <h4 class="title">Cabin Class</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Class Type</label>
                                                <div class="selector">
                                                    <select name="fs_class" class="full-width">
                                                        <option value="Economy">Economy</option>
                                                        <option value="Business">Business</option>
                                                        <option value="First Class">First Class</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Promo Code</label>
                                                <input type="text" name="fs_promo" class="input-text full-width" placeholder="type here" />
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-6 pull-right">
                                                <label>&nbsp;</label>
                                                <button class="full-width icon-check">SEARCH NOW</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- FORM FOR FLIGHT SEARCH -->

                        <div class="tab-pane fade" id="flight-status-tab">
                            <form action="flights.php" method="post">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-6">
                                                <label>Leaving From</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                            <div class="col-xs-6">
                                                <label>Going To</label>
                                                <input type="text" class="input-text full-width" placeholder="enter a city or place name" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">When</h4>
                                        <div class="form-group">
                                            <label>Departure Date</label>
                                            <div class="datepicker-wrap">
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-xs-6 col-md-2">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group">
                                            <label>Flight Number</label>
                                            <input type="text" class="input-text full-width" placeholder="enter flight number" />
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2 fixheight">
                                        <label class="hidden-xs">&nbsp;</label>
                                        <button class="icon-check full-width">SEARCH NOW</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- FROM HERE IS CUSTOMIZE HOMEPAGE -->
            <div class="section">
                <div class="container">
                    <h2>Featured Flight Deals</h2>
                    <div class="image-box style11 block">
                        <div class="row">
                            <div class="col-sm-4">
                                <article class="box">
                                    <figure class="animated" data-animation-type="fadeInDown">
                                        <a title="" href=""><img alt="" src="http://placehold.it/370x160"></a>
                                        <figcaption>
                                            <h3 class="caption-title">Paris</h3>
                                            <span>Delta airline</span>
                                        </figcaption>
                                    </figure>
                                    <div class="details">
                                        <span class="price">
                                            <small>From</small>$120
                                        </span>
                                        <div class="icon-box style11">
                                            <div class="icon-wrapper">
                                                <i class="soap-icon-plane-right takeoff-effect circle"></i>
                                            </div>
                                            <div class="details">
                                                <h4 class="box-title">London to Paris<small>Oneway flight</small></h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4">
                                <article class="box">
                                    <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.6">
                                        <a title="" href=""><img alt="" src="http://placehold.it/370x160"></a>
                                        <figcaption>
                                            <h3 class="caption-title">Spain</h3>
                                            <span>United airline</span>
                                        </figcaption>
                                    </figure>
                                    <div class="details">
                                        <span class="price">
                                            <small>From</small>$347
                                        </span>
                                        <div class="icon-box style11">
                                            <div class="icon-wrapper">
                                                <i class="soap-icon-plane-right takeoff-effect circle"></i>
                                            </div>
                                            <div class="details">
                                                <h4 class="box-title">Dubai to Spain<small>Return flight</small></h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4">
                                <article class="box">
                                    <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                                        <a title="" href=""><img alt="" src="http://placehold.it/370x160"></a>
                                        <figcaption>
                                            <h3 class="caption-title">Australia</h3>
                                            <span>air asia airline</span>
                                        </figcaption>
                                    </figure>
                                    <div class="details">
                                        <span class="price">
                                            <small>From</small>$239
                                        </span>
                                        <div class="icon-box style11">
                                            <div class="icon-wrapper">
                                                <i class="soap-icon-plane-right takeoff-effect circle"></i>
                                            </div>
                                            <div class="details">
                                                <h4 class="box-title">Rome to Australia<small>Oneway flight</small></h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>

                    <h2>Cheap Flights &amp; Air Tickets</h2>
                    <div class="image-carousel style2 block" data-animation="slide" data-item-width="270" data-item-margin="30">
                        <ul class="slides image-box listing-style2 flight">
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">Paris</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$620</span>oneway
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">Paris</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$170</span>oneway
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">Paris</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$620</span>oneway
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">Paris</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$320</span>oneway
                                        </label>
                                    </div>
                                </article>
                            </li>
                            <li>
                                <article class="box">
                                    <figure>
                                        <span><img src="http://placehold.it/270x160" alt="" width="270" height="160" /></span>
                                    </figure>
                                    <div class="details">
                                        <a title="View all" href="" class="pull-right button btn-mini uppercase">select</a>
                                        <h4 class="box-title">Paris</h4>
                                        <label class="price-wrapper">
                                            <span class="price-per-unit">$620</span>oneway
                                        </label>
                                    </div>
                                </article>
                            </li>
                        </ul>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <h2>Before you Fly</h2>
                            <div class="toggle-container with-image block" id="accordion3" data-image-animation-type="fadeIn" data-image-animation-duration="2">
                                <div class="panel style1">
                                    <img src="http://placehold.it/370x160" alt="" />
                                    <h4 class="panel-title">
                                        <a href="#acc7" data-toggle="collapse" data-parent="#accordion3">Book your Bags in Advance</a>
                                    </h4>
                                    <div class="panel-collapse collapse in" id="acc7">
                                        <div class="panel-content">
                                            <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                                        </div><!-- end content -->
                                    </div>
                                </div>

                                <div class="panel style1">
                                    <img src="http://placehold.it/370x160" alt="" />
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc8" data-toggle="collapse" data-parent="#accordion3">Special Meal Requests</a>
                                    </h4>
                                    <div class="panel-collapse collapse" id="acc8">
                                        <div class="panel-content">
                                            <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                                        </div><!-- end content -->
                                    </div>
                                </div>

                                <div class="panel style1">
                                    <img src="http://placehold.it/370x160" alt="" />
                                    <h4 class="panel-title">
                                        <a class="collapsed" href="#acc9" data-toggle="collapse" data-parent="#accordion3">Check your Flight Status</a>
                                    </h4>
                                    <div class="panel-collapse collapse" id="acc9">
                                        <div class="panel-content">
                                            <p>Nunc cursus libero purus ac congue ar lorem cursus ut sed pulvinar massa iden porta nequetiam elerisque mi id habitant morbi tristique senectus.</p>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h2>Top Flight Routes</h2>
                            <div class="flight-routes image-box style13 block">
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/40x40" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <a href="" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">Rome to Dubai</h5>
                                        <label class="price-wrapper"><span class="price-per-unit">$201</span>Oneway</label>
                                    </div>
                                </div>
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/40x40" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <a href="" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">Greece to Canada</h5>
                                        <label class="price-wrapper"><span class="price-per-unit">$478</span>return</label>
                                    </div>
                                </div>
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/40x40" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <a href="" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">Thailand to Paris</h5>
                                        <label class="price-wrapper"><span class="price-per-unit">$231</span>Oneway</label>
                                    </div>
                                </div>
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/40x40" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <a href="" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">Singapore to Malaysia</h5>
                                        <label class="price-wrapper"><span class="price-per-unit">$149</span>return</label>
                                    </div>
                                </div>
                                <div class="box">
                                    <figure>
                                        <a href="#"><img src="http://placehold.it/40x40" alt=""></a>
                                    </figure>
                                    <div class="action">
                                        <a href="" class="button">BOOK</a>
                                    </div>
                                    <div class="details">
                                        <h5 class="box-title">Greece to Canada</h5>
                                        <label class="price-wrapper"><span class="price-per-unit">$478</span>return</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- CUSTOMIZE HOMEPAGE END HERE-->
        </section>
        <?php include 'footer.php'; ?>
    </div>
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq('.revolution-slider').revolution(
            {
                dottedOverlay:"none",
                delay:9000,
                startwidth:1200,
                startheight:646,
                onHoverStop:"on",
                hideThumbs:10,
                fullWidth:"on",
                forceFullWidth:"on",
                navigationType:"none",
                shadow:0,
                spinner:"spinner4",
                hideTimerBar:"on",
            });
        });
    </script>
</body>
</html>

