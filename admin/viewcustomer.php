<?php
    include 'controller.php';

    if(!isset($_SESSION['login'])){
        header("Location: index.php");
    }
    
    $sql = "SELECT * FROM customer";
    $query = mysql_query($sql);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<?php include 'header.php'; ?>
    <div id="content" class="xfluid">
	<div class="portlet x12">
            <div class="portlet-header"><h4>View Customers</h4></div>
            <div class="portlet-content"><br />
                <h2>Customers</h2>
                <table cellpadding="0" cellspacing="0" border="0" class="display" rel="datatable" id="example">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Passport Num</th>
                            <th>Email</th>
                            <th>Contact</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(mysql_num_rows($query) == 0){ ?>
                            <tr class="odd gradeX"><td colspan="5">No result shown</td></tr>
                        <?php 
                        } 
                        else { 
                            while($row = mysql_fetch_assoc($query)){ ?>
                            <tr class="odd gradeX">
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['passport']; ?></td>
                                <td><?php echo $row['email']; ?></td>
                                <td><?php echo "contact num"; ?></td>
                                <td>
                                    <button class="btn btn-small btn-orange" name="manage" value="<?php echo $row['id']; ?>">Manage</button>
                                    <button class="btn btn-small btn-red" name="delete" value="<?php echo $row['id']; ?>">Delete</button>
                                </td>
                            </tr>
                        <?php 
                        } 
                        }?>
                    </tbody>
                </table>
            </div>
	</div>
    </div> <!-- #content -->
<?php include 'footer.php'; ?>
</html>