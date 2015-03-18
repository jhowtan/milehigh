<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    $flight_query = "SELECT f.*, a.name FROM flight f, airline a WHERE f.airline = a.id";
    //$flight_query = "SELECT f.*, a.name, ap.name AS depart"
    //        . "FROM flight f, airline a, airport ap"
    //        . "WHERE f.airline = a.id AND f.arrival = ap.id";
    $flight_result = mysql_query($flight_query);
    /*$flight_result2 = mysql_query($flight_query);
    
    $result = mysql_fetch_assoc($flight_result2);
    
    $airport_query = "SELECT name FROM airport WHERE id = ".$result['departure']." OR id = ".$result['arrival']."";
    $airport_result = mysql_query($airport_query);
    $airport = mysql_fetch_assoc($airport_result);
    echo print_r($airport);
     */
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
                                while($row = mysql_fetch_assoc($flight_result)){ ?>
                                <tr class="odd gradeX">
                                    <td><?php echo $row['flightNumber']; ?></td>
                                    <td><?php echo $row['departure']; ?></td>
                                    <td><?php echo $row['arrival']; ?></td>
                                    <td><?php echo $row['departureDate'] ."<br/>". $row['departureTime']; ?></td>
                                    <td><?php echo $row['arrivalDate'] ."<br/>". $row['arrivalTime']; ?></td>
                                    <td><?php echo $row['name']; ?></td>
                                    <td><?php echo $row['status']; ?></td>
                                    <td>
                                        <button class="btn btn-small btn-orange" name="id" value="<?php echo $row['id']; ?>">Manage</button>
                                        <button class="btn btn-small btn-red" name="delete" value="<?php echo $row['id']; ?>">Delete</button>
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