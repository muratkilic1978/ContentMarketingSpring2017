<?php

//Include header
include('includes/header.php');

//Include database connection
include('includes/connectdb.php');

//Making a SQL-query to the database
$transportationQuery = "SELECT id, transportationtype, description FROM transportation";

//Executing SQL-query against the database
$resultTransportationQuery = mysqli_query($dbc, $transportationQuery);

?>
<div class="page-header">
    <h1>Add your preferred transportation mode(s)</h1>
</div>
<form id="form1" action="check.php" method="post">
    <div class="form-group">
        <label for="firstname">Firstname:</label>
        <input type="text" name="firstname" id="firstname" class="form-control" placeholder="Jack">     
    </div>
     <div class="form-group">
        <label for="lastname">Lastname:</label>
        <input type="text" name="lastname" id="lastname" class="form-control" placeholder="Murdock">     
    </div>
    <h4>Pick all transportaion modes you prefer to travel with.</h4>
    <!-- Starting PHP while-loop-->
    <?php while($row = mysqli_fetch_array($resultTransportationQuery )):  ?>
    <label>
        <input type="checkbox" name="test[]" value="<?php echo $row['id']; ?>" ><?php echo $row['transportationtype'] . ', ' . $row['description']; ?>
    </label>
    <br>
    <?php endwhile; ?> <!--END PHP while-loop -->
    <br>
    <input type="submit" name="button" id="button" value="Submit">
</form>
<?php include('includes/footer.php'); ?>



