<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    if(isset($_GET["id"])){
        $flightId = $_GET["id"];
    }
    
    $flight_query = "SELECT * FROM flight WHERE id = '$flightId'";
    $flight_result = mysql_query($flight_query);
    $row = mysql_fetch_assoc($flight_result);
    
    $airline_query = "SELECT * FROM airline ORDER BY name ASC";
    $airline_result = mysql_query($airline_query);
    
    $airport_query = "SELECT * FROM airport ORDER BY name ASC";
    $airport_result = mysql_query($airport_query);
    $airport_result2 = mysql_query($airport_query);
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
                        <input name="flightNum" size="5" type="text" class="medium" value="<?php echo $row['flightNumber']; ?>" required/>
                    </div>
                    <div class="field">
                        <label>Departure Date</label> 
                        <input name="departDate" type="date" class="medium" value="<?php echo $row['departureDate']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Departure Time</label> 
                        <input name="departTime" type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" class="medium" value="<?php echo $row['departureTime']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Arrival Date</label> <input name="arrivalDate" type="date" class="medium" value="<?php echo $row['arrivalDate']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Arrival Time</label> 
                        <input name="arrivalTime" type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" class="medium" value="<?php echo $row['arrivalTime']; ?>"/>
                    </div>
                    <div class="field">
                        <label>Price</label> 
                        <input name="price" size="5" type="text" class="medium" value="<?php echo $row['price']; ?>" required/>
                    </div>
                    <div class="field">
			<label>Airline</label>
			<select class="medium" name="airline">
                            <?php 
                                while($result = mysql_fetch_assoc($airline_result)){
                                    if($result['id'] == $row['airline']){
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
                                while($result = mysql_fetch_assoc($airport_result)){
                                    if($result['id'] == $row['departure']){
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
			<label>Arrival</label>
			<select class="medium" name="arrival">
                            <?php 
                                while($result = mysql_fetch_assoc($airport_result2)){
                                    if($result['id'] == $row['arrival']){
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
			<label>Status</label>
			<select class="medium" name="status">
                            <?php 
                                if($row['status'] == "On Schedule"){
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