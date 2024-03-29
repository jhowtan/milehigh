<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }
    if(!isset($_GET['fs_from'])){
        header("Location: index.php");
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
        <div class="page-title-container">
            <div class="container">
                <div class="page-title pull-left">
                    <h2 class="entry-title">Flight Search Results</h2>
                </div>
                <ul class="breadcrumbs pull-right">
                    <li><a href="#">HOME</a></li>
                    <li class="active">Flight Search Results</li>
                </ul>
            </div>
        </div>
        <section id="content">
            <div class="container">
                <div id="main">
                    <div class="row">
                        <div class="col-sm-4 col-md-3">
                            <h4 class="search-results-title"><i class="soap-icon-search"></i>
                                <b><?php echo sizeOf($flightArr); ?></b> results found.
                            </h4>
                            <div class="toggle-container filters-container">
                                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="GET">
                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                        </h4>
                                        <div id="price-filter" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <div class="selector">
                                                    <select name="price_range" class="full-width">
                                                        <option value="">ALL</option>
                                                        <option value="1"> Below $500</option>
                                                        <option value="2">$500 to $1000</option>
                                                        <option value="3">$1000 and above</option>
                                                    </select>
                                                </div>
                                            </div><!-- end content -->
                                        </div>
                                    </div>

                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#departure-times-filter" class="collapsed">Departure Times</a>
                                        </h4>
                                        <div id="departure-times-filter" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <label>(Time in 24h)</label>
                                                <div class="selector">
                                                    <select name="departTime_range" class="full-width">
                                                        <option value="">ALL</option>
                                                        <option value="1">0000 to 1159 (AM)</option>
                                                        <option value="2">1200 to 2359 (PM)</option>
                                                    </select>
                                                </div>
                                            </div><!-- end content -->
                                        </div>
                                    </div>

                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#arrival-times-filter" class="collapsed">Arrival Times</a>
                                        </h4>
                                        <div id="arrival-times-filter" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <label>(Time in 24h)</label>
                                                <div class="selector">
                                                    <select name="arrivalTime_range" class="full-width">
                                                        <option value="">ALL</option>
                                                        <option value="1">0000 to 1159 (AM)</option>
                                                        <option value="2">1200 to 2359 (PM)</option>
                                                    </select>
                                                </div>
                                            </div><!-- end content -->
                                        </div>
                                    </div>

                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#airlines-filter" class="collapsed">Airlines</a>
                                        </h4>
                                        <div id="airlines-filter" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <div class="selector">
                                                    <select name="airline_filter" class="full-width">
                                                        <option value="">ALL</option>
                                                        <?php
                                                            while($row = mysql_fetch_assoc($airline_result)){
                                                                echo "<option value=".$row['id'].">".$row['name']."</option>";
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#passenger-filter" class="collapsed">Manage Passenger</a>
                                        </h4>
                                        <div id="passenger-filter" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <label>Number of Adults</label>
                                                <div class="selector">
                                                    <select name="fs_adults" class="full-width">
                                                        <?php 
                                                            for($i=1; $i<10; $i++){
                                                                if($i == $fs_adults){
                                                                    echo "<option value='$i' selected>$i</option>";
                                                                }
                                                                else{
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                                <label>Number of Kids</label>
                                                <div class="selector">
                                                    <select name="fs_kids" class="full-width">
                                                        <?php 
                                                            for($i=0; $i<10; $i++){ 
                                                                if($i == $fs_kids){
                                                                    echo "<option value='$i' selected>$i</option>";
                                                                }
                                                                else{
                                                                    echo "<option value='$i'>$i</option>";
                                                                }
                                                            }
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel style1 arrow-right">
                                        <h4 class="panel-title">
                                            <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                                        </h4>
                                        <div id="modify-search-panel" class="panel-collapse collapse">
                                            <div class="panel-content">
                                                <div class="form-group">
                                                    <label>Leaving from</label>
                                                    <div class="selector">
                                                        <select name="fs_from" class="full-width">
                                                            <?php
                                                                for($i=0; $i<sizeof($countryArr); $i++){
                                                                    if($countryArr[$i]['id'] == $fs_from){
                                                                        echo "<option value=".$countryArr[$i]['id']." selected>".
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
                                                <div class="form-group">
                                                    <label>Going To</label>
                                                    <div class="selector">
                                                        <select name="fs_to" class="full-width">
                                                            <?php
                                                                for($i=0; $i<sizeof($countryArr); $i++){
                                                                    if($countryArr[$i]['id'] == $fs_to){
                                                                        echo "<option value=".$countryArr[$i]['id']." selected>".
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
                                                <div class="form-group">
                                                    <label>Departure on</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="fs_fromDate" class="input-text full-width"
                                                               value="<?php echo $fs_fromDate; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Arriving On</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="fs_toDate" class="input-text full-width"
                                                               value="<?php echo $fs_toDate; ?>"/>
                                                    </div>
                                                </div>
                                                <br />
                                                <button class="btn-medium icon-check full-width" name="search">SEARCH AGAIN</button>
                                            </div>
                                        </div>
                                    </div>
                                    <div>
                                        <button class="btn-medium icon-check full-width" name="filter">FILTER</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <!------------------ DISPLAYING START HERE ----------->                       
                        <div class="col-sm-8 col-md-9">
                            <?php if(!isset($user)){ ?>
                                <div class="sort-by-section clearfix box">
                                    <h4 class="sort-by-title block-sm">You have not login. Please proceed to</h4>
                                    <ul class="sort-bar clearfix block-sm ">
                                        <li class="sort-by-name">
                                            <a class="button btn-medium yellow" href="login.php">LOGIN</a>
                                            <label> OR </label>
                                            <a class="button btn-medium red" href="signup.php">SIGNUP</a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>
                            <div class="flight-list listing-style3 flight">
                                <?php for($i=0; $i<sizeOf($flightArr); $i++) { ?>
                                <article class="box">
                                    <figure class="col-xs-3 col-sm-2">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">
                                                        <?php echo "<div class='skin-color'>".$flightArr[$i]['flightNumber']."</div><br/>"
                                                                .$flightArr[$i]['fromCountry']." (".$flightArr[$i]['fromAirport'].") <b>TO</b><br/> ".
                                                                $flightArr[$i]['toCountry']." (".$flightArr[$i]['toAirport'].")";?>
                                                        </h4>
                                                    <a class="button stop"></a>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>ADULT/PERSON</small>$<?php echo $flightArr[$i]['price']; ?></span>
                                                    <br/>
                                                    <span class="price"><small>CHILDREN/PERSON</small>
                                                        $<?php echo round($flightArr[$i]['price']/2); ?></span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Departure</span><br />
                                                            <?php echo dateDisplay($flightArr[$i]['departureDate']). "<br/> Time: " 
                                                                    .timeDisplay($flightArr[$i]['departureTime']);?>
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Arrival</span><br />
                                                            <?php echo dateDisplay($flightArr[$i]['arrivalDate']). "<br/> Time: " 
                                                                    .timeDisplay($flightArr[$i]['arrivalTime']);?>
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Duration</span><br />
                                                                <?php echo countDays($flightArr[$i]['departureDate'], $flightArr[$i]['arrivalDate']); ?>
                                                            DAYS
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Airline</span><br />
                                                            <?php echo $flightArr[$i]['airlineName']; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <form action="booking.php" method="GET">
                                                        <input type="hidden" name="fs_adults" value="<?php echo $fs_adults; ?>"/>
                                                        <input type="hidden" name="fs_kids" value="<?php echo $fs_kids; ?>"/>
                                                        <?php 
                                                            if(isset($user)){
                                                                echo "<button class='btn-small uppercase full-width' name='flightId' 
                                                                    value='".$flightArr[$i]['id']."'>select</button>";
                                                            }
                                                            else{
                                                                echo "<button class='btn-small uppercase full-width' name='flightId' 
                                                                    value='".$flightArr[$i]['id']."' disabled>select</button>";
                                                            } 
                                                        ?>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php } ?>
                            </div>
                            <?php 
                            if (sizeOf($flightArr) == 0) { 
                                echo '<a class="button uppercase full-width btn-large">No Search Result</a>';
                            }
                            else{
                                echo '<a class="button uppercase full-width btn-large">load more listings</a>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php include 'footer.php'; ?>
    </div>
    <script type="text/javascript">
        tjq(document).ready(function() {
            tjq("#price-range").slider({
                range: true,
                min: 0,
                max: 1000,
                values: [ 100, 800 ],
                slide: function( event, ui ) {
                    tjq(".min-price-label").html( "$" + ui.values[ 0 ]);
                    tjq(".max-price-label").html( "$" + ui.values[ 1 ]);
                }
            });
            tjq(".min-price-label").html( "$" + tjq("#price-range").slider( "values", 0 ));
            tjq(".max-price-label").html( "$" + tjq("#price-range").slider( "values", 1 ));

            function convertTimeToHHMM(t) {
                var minutes = t % 60;
                var hour = (t - minutes) / 60;
                var timeStr = (hour + "").lpad("0", 2) + ":" + (minutes + "").lpad("0", 2);
                var date = new Date("2014/01/01 " + timeStr + ":00");
                var hhmm = date.toLocaleTimeString(navigator.language, {hour: '2-digit', minute:'2-digit'});
                return hhmm;
            }
            tjq("#flight-times").slider({
                range: true,
                min: 0,
                max: 1440,
                step: 5,
                values: [ 360, 1200 ],
                slide: function( event, ui ) {

                    tjq(".start-time-label").html( convertTimeToHHMM(ui.values[0]) );
                    tjq(".end-time-label").html( convertTimeToHHMM(ui.values[1]) );
                }
            });
            tjq(".start-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 0 )) );
            tjq(".end-time-label").html( convertTimeToHHMM(tjq("#flight-times").slider( "values", 1 )) );
        });
    </script>
</body>
</html>
