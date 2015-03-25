<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    $ticket_query = "SELECT ft.*, c.name AS owner, s.class, s.seatNumber,"
            . " p.name AS passenger, f.flightNumber"
            . " FROM flightticket ft, customer c, seat s, passenger p, flight f"
            . " WHERE ft.owner = c.id AND ft.seat = s.id"
            . " AND ft.passenger = p.id AND s.flight = f.id";
    $ticket_result = mysql_query($ticket_query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
	<div class="portlet x12">
            <div class="portlet-header"><h4>View Flights Bookings</h4></div>
            <div class="portlet-content"><br />
                <h2>Flights Booking</h2>
                <form action="managebooking.php" method="get" class="form label-inline">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                        <thead>
                            <tr>
                                <th>Registered Owner</th>
                                <th>FlightNum</th>
                                <th>Passenger</th>
                                <th>Seat</th>
                                <th>Date Purchased</th>
                                <th>Baggage</th>
                                <th>Price</th>
                                <th>CheckIn</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysql_num_rows($ticket_result) == 0){ ?>
                                <tr class="odd gradeX"><td colspan="6" align="center">No result shown</td></tr>
                            <?php 
                            } 
                            else { 
                                while($row = mysql_fetch_assoc($ticket_result)){ ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row['owner']; ?></td>
                                    <td><?php echo $row['flightNumber']; ?></td>
                                    <td><?php echo $row['passenger']; ?></td>
                                    <td><?php echo $row['seatNumber']." (".$row['class'].")" ; ?></td>
                                    <td><?php echo dateDisplay($row['datePurchased']); ?></td>
                                    <td><?php echo $row['baggageAllowance']; ?></td>
                                    <td>$<?php echo $row['totalPrice']; ?></td>
                                    <td><?php
                                            if ($row['checkedIn'] == 0){
                                                echo "No";
                                            }else{
                                                echo "Yes";
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <button class="btn btn-small btn-orange" name="id" value="<?php echo $row['id']; ?>">Manage</button>
                                    </td>
                                </tr>
                            <?php 
                            } 
                            }?>
                        </tbody>
                    </table>
                </form>
            </div>
	</div>
    </div> <!-- #content -->
<?php include 'footer.php'; ?>
</html>