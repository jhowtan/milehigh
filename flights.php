<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<?php include 'head.php';
    $fs_from = $_POST['fs_from'];
    $fs_to = $_POST['fs_to'];
    $fs_fromDate = $_POST['fs_fromDate'];
    $fs_toDate = $_POST['fs_toDate'];
    $fs_adults = $_POST['fs_adults'];
    $fs_children = $_POST['fs_children'];
    $fs_class = $_POST['fs_class'];
    $fs_promo = $_POST['fs_promo'];

    $dbhandle = mysql_connect($db_host, $db_user, $db_pass)
      or die("Unable to connect to MySQL");
    echo "Connected to MySQL<br>";
    $db = mysql_select_db($db_name, $dbhandle)
      or die("Unable to select " + $db_name);

    $query = "SELECT f.flightNumber, a1.name as srcA, a2.name as destA, f.departureDate, " .
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
    echo mysql_result($flights, 0, "flightNumber");
?>
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
                            <h4 class="search-results-title"><i class="soap-icon-search"></i><b>1,984</b> results found.</h4>
                            <div class="toggle-container filters-container">
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#price-filter" class="collapsed">Price</a>
                                    </h4>
                                    <div id="price-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="price-range"></div>
                                            <br />
                                            <span class="min-price-label pull-left"></span>
                                            <span class="max-price-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#flight-times-filter" class="collapsed">Flight Times</a>
                                    </h4>
                                    <div id="flight-times-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <div id="flight-times" class="slider-color-yellow"></div>
                                            <br />
                                            <span class="start-time-label pull-left"></span>
                                            <span class="end-time-label pull-right"></span>
                                            <div class="clearer"></div>
                                        </div><!-- end content -->
                                    </div>
                                </div>
                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#airlines-filter" class="collapsed">Airlines</a>
                                    </h4>
                                    <div id="airlines-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">Major Airline<small>($620)</small></a></li>
                                                <li><a href="#">United Airlines<small>($982)</small></a></li>
                                                <li class="active"><a href="#">delta airlines<small>($1,127)</small></a></li>
                                                <li><a href="#">Alitalia<small>($2,322)</small></a></li>
                                                <li><a href="#">US airways<small>($3,158)</small></a></li>
                                                <li><a href="#">Air France<small>($4,239)</small></a></li>
                                                <li><a href="#">Air tahiti nui<small>($5,872)</small></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#flight-type-filter" class="collapsed">Flight Type</a>
                                    </h4>
                                    <div id="flight-type-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li class="active"><a href="#">Economy</a></li>
                                                <li><a href="#">Premium Economy</a></li>
                                                <li><a href="#">Business</a></li>
                                                <li><a href="#">First class</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#inflight-experience-filter" class="collapsed">Inflight Experience</a>
                                    </h4>
                                    <div id="inflight-experience-filter" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <ul class="check-square filters-option">
                                                <li><a href="#">Inflight Dining</a></li>
                                                <li><a href="#">Music</a></li>
                                                <li><a href="#">Sky Shopping</a></li>
                                                <li><a href="#">Wi-fi</a></li>
                                                <li><a href="#">Seats &amp; Cabin</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="panel style1 arrow-right">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#modify-search-panel" class="collapsed">Modify Search</a>
                                    </h4>
                                    <div id="modify-search-panel" class="panel-collapse collapse">
                                        <div class="panel-content">
                                            <form method="post">
                                                <div class="form-group">
                                                    <label>Leaving from</label>
                                                    <input type="text" class="input-text full-width" placeholder="" value="city, district, or specific airpot" />
                                                </div>
                                                <div class="form-group">
                                                    <label>Departure on</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label>Arriving On</label>
                                                    <div class="datepicker-wrap">
                                                        <input type="text" class="input-text full-width" placeholder="mm/dd/yy" />
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
                            <div class="sort-by-section clearfix box">
                                <h4 class="sort-by-title block-sm">Sort results by:</h4>
                                <ul class="sort-bar clearfix block-sm">
                                    <li class="sort-by-name"><a class="sort-by-container" href="#"><span>name</span></a></li>
                                    <li class="sort-by-price"><a class="sort-by-container" href="#"><span>price</span></a></li>
                                    <li class="sort-by-rating active"><a class="sort-by-container" href="#"><span>duration</span></a></li>
                                </ul>
                            </div>
                            <div class="flight-list listing-style3 flight">
                                <article class="box">
                                    <figure class="col-xs-3 col-sm-2">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                                    <a class="button btn-mini stop">1 STOP</a>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>AVG/PERSON</small>$320</span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Take off</span><br />Wed Nov 13, 2013 7:50 Am
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">landing</span><br />Wed Nov 13, 2013 9:20 am
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-4">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">total time</span><br />13 Hour, 40 minutes
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <form action="flightDetails.php" method="get">
                                                        <button class="btn-small uppercase full-width">select</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="box">
                                    <figure class="col-xs-3 col-sm-2">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                                    <a class="button btn-mini stop">1 STOP</a>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>AVG/PERSON</small>$620</span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Take off</span><br />Wed Nov 13, 2013 7:50 Am
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">landing</span><br />Wed Nov 13, 2013 9:20 am
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-4">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">total time</span><br />13 Hour, 40 minutes
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <form action="flightDetails.php" method="get">
                                                        <button class="btn-small uppercase full-width">select</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article class="box">
                                    <figure class="col-xs-3 col-sm-2">
                                        <span><img alt="" src="http://placehold.it/270x160"></span>
                                    </figure>
                                    <div class="details col-xs-9 col-sm-10">
                                        <div class="details-wrapper">
                                            <div class="first-row">
                                                <div>
                                                    <h4 class="box-title">Indianapolis to Paris<small>Oneway flight</small></h4>
                                                    <a class="button btn-mini stop">1 STOP</a>
                                                    <div class="amenities">
                                                        <i class="soap-icon-wifi circle"></i>
                                                        <i class="soap-icon-entertainment circle"></i>
                                                        <i class="soap-icon-fork circle"></i>
                                                        <i class="soap-icon-suitcase circle"></i>
                                                    </div>
                                                </div>
                                                <div>
                                                    <span class="price"><small>AVG/PERSON</small>$170</span>
                                                </div>
                                            </div>
                                            <div class="second-row">
                                                <div class="time">
                                                    <div class="take-off col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">Take off</span><br />Wed Nov 13, 2013 7:50 Am
                                                        </div>
                                                    </div>
                                                    <div class="landing col-sm-4">
                                                        <div class="icon"><i class="soap-icon-plane-right yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">landing</span><br />Wed Nov 13, 2013 9:20 am
                                                        </div>
                                                    </div>
                                                    <div class="total-time col-sm-4">
                                                        <div class="icon"><i class="soap-icon-clock yellow-color"></i></div>
                                                        <div>
                                                            <span class="skin-color">total time</span><br />13 Hour, 40 minutes
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="action">
                                                    <form action="flightDetails.php" method="get">
                                                        <button class="btn-small uppercase full-width">select</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
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
