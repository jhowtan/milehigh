<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    $flight_query = "SELECT f.*, a.name AS airlineName, ap1.name AS departAirport, ap2.name AS arrivalAirport "
            . "FROM flight f, airline a, airport ap1, airport ap2 "
            . "WHERE f.airline = a.id AND f.departure = ap1.id AND f.arrival = ap2.id";
    $flight_result = mysql_query($flight_query);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
	<div class="portlet x12">
            <div class="portlet-header"><h4>View Flights</h4></div>
            <div class="portlet-content"><br />
                <h2>Flights</h2>
                <form action="manageflight.php" method="get" class="form label-inline">
                    <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                        <thead>
                            <tr>
                                <th>FlightNum</th>
                                <th>From</th>
                                <th>To</th>
                                <th>Departure Date/Time</th>
                                <th>Arrival Date/Time</th>
                                <th>Airline</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if(mysql_num_rows($flight_result) == 0){ ?>
                                <tr class="odd gradeX"><td colspan="8" align="center">No result shown</td></tr>
                            <?php 
                            } 
                            else { 
                                while($row = mysql_fetch_assoc($flight_result)){ 
                                ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row['flightNumber']; ?></td>
                                    <td><?php echo $row['departAirport']; ?></td>
                                    <td><?php echo $row['arrivalAirport']; ?></td>
                                    <td><?php echo $row['departureDate'] ."<br/>". $row['departureTime']; ?></td>
                                    <td><?php echo $row['arrivalDate'] ."<br/>". $row['arrivalTime']; ?></td>
                                    <td><?php echo $row['airlineName']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
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