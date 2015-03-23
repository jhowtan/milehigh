<?php
    if(isset($_COOKIE["user"])){
        $user = $_COOKIE["user"];
    }

    include 'controller.php';

    $fs_from = $_GET['fs_from'];
    $fs_to = $_GET['fs_to'];
    $fs_fromDate = $_GET['fs_fromDate'];
    $fs_toDate = $_GET['fs_toDate'];
    $fs_adults = $_GET['fs_adults'];
    $fs_children = $_GET['fs_children'];
    $fs_promo = $_GET['fs_promo'];

    $flightArr = array();
    $flightArr_query = "SELECT f.*, c1.name AS fromCountry, c2.name AS toCountry,"
            . " al.name AS airlineName"
            . " FROM flight f, airport a, country c1, country c2, airline al"
            . " WHERE f.departure = a.id AND a.country = '$fs_from'"
            . " AND f.arrival = a.id AND a.country = '$fs_to'"
            . " AND c1.id = '$fs_from' AND c2.id = '$fs_to'"
            . " AND f.airline = al.id";
    $flightArr_result = mysql_query($flightArr_query);
    while($result = mysql_fetch_assoc($flightArr_result)){
        $flightArr[] = $result;
    }
<<<<<<< HEAD
    
=======
    //echo "<pre>";
    //echo print_r($flightArr);
    //echo "<pre>";

>>>>>>> a8fab7ddf03b1a7ff6c60e6f06594ac904284120
    $airline_query = "SELECT DISTINCT a.* "
            . " FROM airline a, flight f, airport ap"
            . " WHERE (f.departure = ap.id AND ap.country = '$fs_from')"
            . " AND (f.arrival = ap.id AND ap.country = '$fs_to')"
            . " AND f.airline = a.id";
    $airline_result = mysql_query($airline_query);

    $countries_query = "SELECT * FROM country";
    $countries_result = mysql_query($countries_query);
    $countries_result2 = mysql_query($countries_query);

    /*$query = "SELECT f.flightNumber, a1.name as srcA, a2.name as destA, f.departureDate, " .
                "f.arrivalDate, f.departureTime, f.arrivalTime, f.price, c1.name as srcC, c2.name as destC " .
                "FROM flight f, airport a1, airport a2, country c1, country c2 " .
                "WHERE f.departure = a1.id AND c1.id = a1.country " .
                "AND f.arrival = a2.id AND c2.id = a2.country ";

    if ($fs_from != "") {
        $query .= "AND c1.name LIKE '%" . $fs_from . "%' ";
    }
    if ($fs_to != "") {
        $query .= "AND c2.name LIKE '%" . $fs_to . "%' ";
    }
    if ($fs_fromDate != "") {
        if (preg_match('~([0-9]{2})[-/]([0-9]{2})[-/]([0-9]{4})~', $fs_fromDate, $matches)) {
            $fs_fromDate = $matches[3].'-'.$matches[1].'-'.$matches[2];
        }
        $query .= "AND f.departureDate = '" . $fs_fromDate . "' ";
    }
    if ($fs_toDate != "") {
        if (preg_match('~([0-9]{2})[-/]([0-9]{2})[-/]([0-9]{4})~', $fs_toDate, $matches)) {
            $fs_toDate = $matches[3].'-'.$matches[1].'-'.$matches[2];
        }
        $query .= "AND f.arrivalDate = '" . $fs_toDate . "' ";
    }

    $query .= ";";

    $flights = mysql_query($query) or die($query."<br/><br/>".mysql_error());
    $flights_result = mysql_fetch_assoc($flights);

    echo mysql_result($flights, 0, "flightNumber");
     */
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
                                <p class="panel-title">
                                    <b>From:</b> <?php echo $flightArr[0]['fromCountry']; ?><br/>
                                    <b>To:</b> <?php echo $flightArr[0]['toCountry']; ?><br/>
                                    <b>On:</b> <?php echo $fs_fromDate; ?><br/>
                                    <b>Till:</b> <?php echo $fs_toDate; ?> <br/>
                                    <b>Adult:</b> <?php echo $fs_adults; ?> <br/>
                                    <b>Children:</b> <?php echo $fs_children; ?> <br/>
                                </p>
                            </h4>
                            <div class="toggle-container filters-container">
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                    </h4>
                                    <div id="price-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div class="selector">
                                                <select name="price_fliter" class="full-width">
                                                    <option value="0">ALL</option>
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
                                        <a data-toggle="collapse" href="#departure-times-filter" class="collapsed">Departure Times (24h)</a>
                                    </h4>
                                    <div id="departure-times-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div class="selector">
                                                <select name="departureTime" class="full-width">
                                                    <option value="0">ALL</option>
                                                    <option value="1">0000 to 1159 (AM)</option>
                                                    <option value="2">1200 to 2359 (PM)</option>
                                                </select>
                                            </div>
                                        </div><!-- end content -->
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#arrival-times-filter" class="collapsed">Arrival Times (24h)</a>
                                    </h4>
                                    <div id="arrival-times-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div class="selector">
                                                <select name="arrivalTime" class="full-width">
                                                    <option value="0">ALL</option>
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
                                                <select name="airline_fliter" class="full-width">
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
                                        <a data-toggle="collapse" href="#people-filter" class="collapsed">Passengers</a>
                                    </h4>
                                    <div id="people-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <label>Adults</label>
                                            <input type="text" name="adult_filter" class="input-text" value="<?php echo $fs_adults ?>"
                                                   size="3" onkeypress="return isNumber(event);"/>
                                            <label>Children</label>
                                            <input type="text" name="children_filter" class="input-text" value="<?php echo $fs_children ?>"
                                                   size="3" onkeypress="return isNumber(event);"/>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                                    </h4>
                                    <div id="modify-search-panel" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <form method="GET">
                                                <div class="form-group">
                                                    <label>Leaving from</label>
                                                    <div class="selector">
                                                        <select name="from_fliter" class="full-width">
                                                            <?php
                                                                while($row = mysql_fetch_assoc($countries_result)){
                                                                    if($row['id'] == $fs_from){
                                                                        echo "<option value=".$row['id']." selected>".$row['name']."</option>";
                                                                    }
                                                                    else{
                                                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Going To</label>
                                                    <div class="selector">
                                                        <select name="to_fliter" class="full-width">
                                                            <?php
                                                                while($row = mysql_fetch_assoc($countries_result2)){
                                                                    if($row['id'] == $fs_to){
                                                                        echo "<option value=".$row['id']." selected>".$row['name']."</option>";
                                                                    }
                                                                    else{
                                                                        echo "<option value=".$row['id'].">".$row['name']."</option>";
                                                                    }
                                                                }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Departure on</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="fromDate_fliter" class="input-text full-width"
                                                               value="<?php echo $fs_fromDate; ?>"/>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Arriving On</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" name="toDate_fliter" class="input-text full-width"
                                                               value="<?php echo $fs_toDate; ?>"/>
                                                    </div>
                                                </div>
                                                <br />
                                                <button class="btn-medium icon-check uppercase full-width">search again</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <form method="get">
                                        <button class="btn-medium icon-check uppercase full-width">FILTER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-8 col-md-9">
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
                                                    <h4 class="box-title"><?php echo $flightArr[$i]['fromCountry']." to ".
                                                        $flightArr[$i]['toCountry'];?>
                                                        <small>Oneway flight</small></h4>
                                                    <a class="button stop">1 STOP</a>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>ADULT/PERSON</small>SGD<?php echo $flightArr[$i]['price']; ?></span>
                                                    <br/>
                                                    <span class="price"><small>CHILDREN/PERSON</small>$320</span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Departure</span><br />
                                                            Date: <?php echo $flightArr[$i]['departureDate']. "<br/> Time: " .$flightArr[$i]['departureTime'];?>
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-3">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Arrival</span><br />
                                                            Date: <?php echo $flightArr[$i]['arrivalDate']. "<br/> Time: " .$flightArr[$i]['arrivalTime'];?>
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-3">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Duration</span><br />Number of day
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
                                                    <form action="booking.php" method="get">
                                                        <button class="btn-small uppercase full-width" name="<?php echo $flightArr[$i]['id']; ?>">select</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <?php } ?>
                            </div>
                            <a class="button uppercase full-width btn-large">load more listings</a>
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
