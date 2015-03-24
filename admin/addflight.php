<?php
    $message = "";
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
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
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
        <div class="portlet x6">
            <div class="portlet-header"><h4>Add New Flights</h4></div>
            <div class="portlet-content">
                <h2><?php echo $message; ?></h2>
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form label-inline">
                    <div class="field">
                        <label>Flight Number</label> <input name="flightNum" size="5" type="text" class="medium" required/>
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
                        <label>Price</label> <input name="price" size="5" type="text" class="medium" required/>
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
                            <?php
                                for($i=0; $i<sizeOf($countryArr); $i++){
                                    echo "<option value=".$countryArr[$i]['id'].">".$countryArr[$i]['countryName'].
                                        " ---- " .$countryArr[$i]['name']. "</option>";
                                }
                            ?>
			</select>
                    </div>
                    <div class="field">
			<label>Arrival</label>
			<select class="medium" name="arrival">
                            <?php
                                for($i=0; $i<sizeOf($countryArr); $i++){
                                    echo "<option value=".$countryArr[$i]['id'].">".$countryArr[$i]['countryName'].
                                        " ---- " .$countryArr[$i]['name']. "</option>";
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
			<button class="btn btn-orange" name="addflight">Add</button>
                    </div>
                </form>
                <br /><br />	
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</html>