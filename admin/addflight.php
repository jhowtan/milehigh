<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    $airline_query = "SELECT * FROM airline ORDER BY name ASC";
    $airline_result = mysql_query($airline_query);
    
    $airport_query = "SELECT * FROM airport ORDER BY name ASC";
    $airport_result = mysql_query($airport_query);
    $airport_result2 = mysql_query($airport_query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
        <div class="portlet x6">
            <div class="portlet-header"><h4>Add New Flights</h4></div>
            <div class="portlet-content">
		<form action="#" method="post" class="form label-inline">
                    <div class="field">
                        <label>Flight Number</label> <input name="flightNum" size="50" type="text" class="medium" />
                    </div>
                    <div class="field">
                        <label>Departure Date</label> <input name="departDate" type="date" class="medium"/>
                    </div>
                    <div class="field">
                        <label>Departure Time</label> 
                        <input name="departTime" type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" class="medium"/>
                    </div>
                    <div class="field">
                        <label>Arrival Date</label> <input name="arrivalDate" type="date" class="medium"/>
                    </div>
                    <div class="field">
                        <label>Arrival Time</label> 
                        <input name="arrivalTime" type="time" pattern="([01]?[0-9]|2[0-3]):[0-5][0-9]" class="medium"/>
                    </div>
                    <div class="field">
                        <label>Price</label> <input name="flightNum" size="5" type="text" class="medium" />
                    </div>
                    <div class="field">
			<label>Airline</label>
			<select class="medium" name="airline">
                            <?php while($row = mysql_fetch_assoc($airline_result)){
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Departure</label>
			<select class="medium" name="departure">
                            <?php while($row = mysql_fetch_assoc($airport_result)){
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Arrival</label>
			<select class="medium" name="arrival">
                            <?php while($row = mysql_fetch_assoc($airport_result2)){
                                    echo "<option value=".$row['id'].">".$row['name']."</option>";
                            }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Status</label>
			<select class="medium" name="status">
                            <option value="On Schedule">On Schedule</option>
                            <option value="Delayed">Delayed</option>
                            <option value="Arrived">Arrived</option>
                            <option value="Canceled">Canceled</option>
                            <option value="Postponed">Postponed</option>
			</select>
                    </div>
                    <br />
                    <div class="buttonrow">
			<button class="btn btn-orange">Add</button>
                    </div>
                </form>
                <br /><br />	
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</html>