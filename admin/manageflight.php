<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    if(isset($_GET["id"])){
        $flightId = $_GET["id"];
    }
    
    $flight_query = "SELECT f.*, al.name AS airlineName, ap1.name AS fromAirport,"
        . " ap2.name AS toAirport, c1.name AS fromCountry, c2.name AS toCountry"
        . " FROM flight f, airline al, airport ap1, airport ap2, country c1, country c2"
        . " WHERE f.airline = al.id AND f.departure = ap1.id"
        . " AND ap1.country = c1.id AND f.arrival = ap2.id"
        . " AND ap2.country = c2.id AND f.id = '$flightId'";
    
    $flight_result = mysql_query($flight_query);
    $rows = mysql_fetch_assoc($flight_result);
    
    $airline_query = "SELECT * FROM airline ORDER BY name ASC";
    $airline_result = mysql_query($airline_query);
    
    $countryArr = array();
    $countries_query = "SELECT a.*, c.name AS countryName"
            . " FROM country c, airport a"
            . " WHERE a.country = c.id ORDER BY c.name, a.name ASC";
    $countries_result = mysql_query($countries_query);
    while($row = mysql_fetch_assoc($countries_result)){
        $countryArr[] = $row;
    }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
        <div class="portlet x6">
            <div class="portlet-header"><h4>Manage Flights</h4></div>
            <div class="portlet-content">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form label-inline">
                    <div class="field">
                        <label>Flight Number</label>
                        <input name="flightNum" size="5" type="text" class="medium" value="<?php echo $rows['flightNumber']; ?>" required/>
                    </div>
                    <div class="field">
                        <label>Departure Date</label> 
                        <input name="departDate" type="date" class="medium" value="<?php echo $rows['departureDate']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Departure Time</label> 
                        <input name="departTime" type="time" class="medium" value="<?php echo $rows['departureTime']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Arrival Date</label>
                        <input name="arrivalDate" type="date" class="medium" value="<?php echo $rows['arrivalDate']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Arrival Time</label> 
                        <input name="arrivalTime" type="time" class="medium" value="<?php echo $rows['arrivalTime']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Price</label> 
                        <input name="price" size="5" type="text" class="medium" value="<?php echo $rows['price']; ?>" required/>
                    </div>
                    <div class="field">
			<label>Airline</label>
			<select class="medium" name="airline">
                            <?php 
                                while($result = mysql_fetch_assoc($airline_result)){
                                    if($result['id'] == $rows['airline']){
                                        echo "<option value=".$result['id']." selected>".$result['name']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$result['id'].">".$result['name']."</option>";
                                    }
                            }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Departure</label>
			<select class="medium" name="departure">
                            <?php
                                for($i=0; $i<sizeOf($countryArr); $i++){
                                    if($countryArr[$i]['id'] == $rows['departure']){
                                        echo "<option value=".$countryArr[$i]['id']." selected>"
                                            .$countryArr[$i]['countryName']."----".$countryArr[$i]['name']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$countryArr[$i]['id'].">"
                                            .$countryArr[$i]['countryName']."----".$countryArr[$i]['name']."</option>";
                                    }
                                }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Arrival</label>
			<select class="medium" name="arrival">
                            <?php
                                for($i=0; $i<sizeOf($countryArr); $i++){
                                    if($countryArr[$i]['id'] == $rows['arrival']){
                                        echo "<option value=".$countryArr[$i]['id']." selected>"
                                            .$countryArr[$i]['countryName']."----".$countryArr[$i]['name']."</option>";
                                    }
                                    else{
                                        echo "<option value=".$countryArr[$i]['id'].">"
                                            .$countryArr[$i]['countryName']."----".$countryArr[$i]['name']."</option>";
                                    }
                                }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Status</label>
			<select class="medium" name="status">
                            <?php 
                                if($rows['status'] == "On Schedule"){
                                    echo '<option value="On Schedule" selected>On Schedule</option>';
                                } else {
                                    echo '<option value="On Schedule">On Schedule</option>';
                                }
                                if($row['status'] == "Delayed"){
                                    echo '<option value="Delayed" selected>Delayed</option>';
                                } else {
                                    echo '<option value="Delayed">Delayed</option>';
                                }   
                                if($row['status'] == "Arrived"){
                                    echo '<option value="Arrived" selected>Arrived</option>';
                                } else {
                                    echo '<option value="Arrived">Arrived</option>';
                                }   
                                if($row['status'] == "Canceled"){
                                    echo '<option value="Canceled" selected>Canceled</option>';
                                } else {
                                    echo '<option value="Canceled">Canceled</option>';
                                } 
                                if($row['status'] == "Postponed"){
                                    echo '<option value="Postponed" selected>Postponed</option>';
                                } else {
                                    echo '<option value="Postponed">Postponed</option>';
                            }?>
			</select>
                    </div>
                    <br />
                    <div class="buttonrow">
			<button class="btn btn-orange" name="updateId" value="<?php echo $flightId; ?>">Update</button>
                        <button class="btn btn-red" name="deleteId" value="<?php echo $flightId; ?>">Delete</button>
                    </div>
                </form>
                <br /><br />	
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</html>