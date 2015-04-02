<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }

    include 'controller.php';

    $countryArr = array();
    $countries_query = "SELECT a.*, c.name AS countryName"
            . " FROM country c, airport a"
            . " WHERE a.country = c.id ORDER BY c.name, a.name ASC";
    $countries_result = mysql_query($countries_query);
    while($row = mysql_fetch_assoc($countries_result)){
        $countryArr[] = $row;
    }
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
                            <img src="images/carousel1.jpg" alt="">
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
                            <form action="flights.php" method="get">
                                <div class="row">
                                    <div class="col-md-4">
                                        <h4 class="title">Where</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <label>Flying From</label>
                                                <div class="selector">
                                                    <select name="fs_from" class="full-width">
                                                        <option value="">
                                                        <?php
                                                            for($i=0; $i<sizeof($countryArr); $i++){
                                                                if($countryArr[$i]['countryName'] == "Singapore"){
                                                                    echo "<option value=".$countryArr[$i]['id']." selected >".
                                                                        $countryArr[$i]['countryName']." ----- ".$countryArr[$i]['name']." </option>";
                                                                }
                                                                else{
                                                                    echo "<option value=".$countryArr[$i]['id'].">".
                                                                        $countryArr[$i]['countryName']." ----- ".$countryArr[$i]['name']." </option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <label>Going To</label>
                                                <div class="selector">
                                                    <select name="fs_to" class="full-width">
                                                        <option value="">
                                                        <?php
                                                            for($i=0; $i<sizeof($countryArr); $i++){
                                                                echo "<option value=".$countryArr[$i]['id'].">".
                                                                    $countryArr[$i]['countryName']." ----- ".$countryArr[$i]['name']." </option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="title">When</h4>
                                        <label>Departing On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="fs_fromDate" class="input-text full-width" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>
                                        </div>
                                        <label>Arriving On</label>
                                        <div class="form-group row">
                                            <div class="col-xs-12">
                                                <div class="datepicker-wrap">
                                                    <input type="text" name="fs_toDate" class="input-text full-width" placeholder="mm/dd/yyyy"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <h4 class="title">Who</h4>
                                        <div class="form-group row">
                                            <div class="col-xs-3">
                                                <label>Adults</label>
                                                <div class="selector">
                                                    <select class="full-width" name="fs_adults">
                                                        <?php
                                                            for($i=1; $i<10; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-3">
                                                <label>Kids</label>
                                                <div class="selector">
                                                    <select class="full-width" name="fs_kids">
                                                        <?php
                                                            for($i=0; $i<10; $i++){
                                                                echo "<option value='$i'>$i</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xs-6">
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
                                                <input type="text" class="input-text full-width" placeholder="mm/dd/yyyy"/>
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
                                        <a title="" href=""><img alt="" src="images/christchurch.jpg"></a>
                                        <figcaption>
                                            <h3 class="caption-title">Christchurch</h3>
                                            <span>British Airways</span>
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
                                                <h4 class="box-title">London to Christchurch</h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4">
                                <article class="box">
                                    <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.6">
                                        <a title="" href=""><img alt="" src="images/singapore.jpg"></a>
                                        <figcaption>
                                            <h3 class="caption-title">Singapore</h3>
                                            <span>Emirates Airlines</span>
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
                                                <h4 class="box-title">Dubai to Singapore</h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div class="col-sm-4">
                                <article class="box">
                                    <figure class="animated" data-animation-type="fadeInDown" data-animation-delay="0.9">
                                        <a title="" href=""><img alt="" src="images/melbourne.jpg"></a>
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
                                                <h4 class="box-title">Rome to Australia</h4>
                                            </div>
                                        </div>
                                    </div>
                                </article>
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

