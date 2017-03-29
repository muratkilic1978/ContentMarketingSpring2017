<?php

//Page header
$siteTitle = "Adding platform";
$siteName = "Adding platform";
$siteDescription = "";

include('includes/header.php');

?>
<?php
# Connect to the database
include('includes/connectdb.php');

$platformname = $_POST['platformname'];

$query = "INSERT INTO platforms (id, platformname) VALUES(NULL, '$platformname')";

mysqli_query($dbc,$query) or die ('Error querying the database.');
?>
    <div id="divspace" class="panel panel-default">
        <div class="panel-heading panel panel-success">Success....</div>
        <div class="panel-body">
            <h2>Thank you for adding a new platform <?php echo $platformname; ?> </h2>
        </div>
        <div class="panel-footer">
            <button class="btn btn-primary btn-block btn-success" onclick="goBack()">Go Back</button>
        </div>
    </div>
<?php 
#close database-connection 
mysqli_close($dbc);
?>
<!-- JavaScript-->   
<script>
    function goBack() 
    {
        window.history.back();
    }
</script>
    
<?php include('includes/footer.php'); ?>
    
    
    
