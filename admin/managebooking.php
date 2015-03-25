<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    if(isset($_GET["id"])){
        $bookingId = $_GET["id"];
    }
    
    $booking_query = "SELECT ft.*, c.name AS owner, s.class, s.seatNumber,"
            . " p.name AS passenger, f.flightNumber"
            . " FROM flightticket ft, customer c, seat s, passenger p, flight f"
            . " WHERE ft.owner = c.id AND ft.seat = s.id"
            . " AND ft.passenger = p.id AND s.flight = f.id"
            . " AND ft.id = '$bookingId'";
    $booking_result = mysql_query($booking_query);
    $row = mysql_fetch_assoc($booking_result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
        <div class="portlet x6">
            <div class="portlet-header"><h4>Manage Booking</h4></div>
            <div class="portlet-content">
		<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post" class="form label-inline">
                    <div class="field">
                        <label>Registered User</label> <p><?php echo $row['owner']; ?></p>
                    </div>
                    <div class="field">
                        <label>Flight Number</label> <p><?php echo $row['flightNumber']; ?></p>
                    </div>
                    <div class="field">
                        <label>Passenger</label> <p><?php echo $row['passenger']; ?></p>
                    </div>
                    <div class="field">
                        <label>Seat</label> <p><?php echo $row['seatNumber']." (".$row['class'].")"; ?></p>
                    </div>
                    <div class="field">
                        <label>Date Purchased</label> <p><?php echo $row['datePurchased']; ?></p>
                    </div>
                    <div class="field">
                        <label>Baggage Type</label> <p><?php echo $row['baggageAllowance']; ?></p>
                    </div>
                    <div class="field">
                        <label>Baggage Type</label> <p><?php echo $row['totalPrice']; ?></p>
                    </div>
                    <div class="controlset field">
			<span class="label">Checked In</span>
                        <div class="controlset-pad">
                            <?php 
                                if ($row['checkedIn'] == 0){
                                    echo '<input name="checkin" value="0" type="radio" checked/><label>No</label><br />';
                                }else{
                                    echo '<input name="checkin" value="0" type="radio"/><label>No</label><br />';
                                }
                                 if ($row['checkedIn'] == 1){
                                    echo '<input name="checkin" value="1" type="radio" checked/><label>Yes</label><br />';
                                }else{
                                    echo '<input name="checkin" value="1" type="radio"/><label>Yes</label><br />';
                                }
                            ?>
                        </div>
                    </div>
                    <br />
                    <div class="buttonrow">
			<button class="btn btn-orange" name="updateId" value="<?php echo $bookingId; ?>">Update</button>
                    </div>
                </form>
                <br /><br />	
            </div>
        </div>
    </div>
<?php include 'footer.php'; ?>
</html>