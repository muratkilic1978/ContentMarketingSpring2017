<?php
//Page header
$siteTitle = 'Adding VideoGame to collection';
$siteName = 'VideoGame Collection';
$siteDescription = '';

include('includes/header.php');
?>


<?php
// Establishing connection to database
include('includes/connectdb.php');

$titlename = $_POST['titlename'];
$description = $_POST['description'];
$price = $_POST['price'];
$platformid = $_POST['platformid'];
$publisherid = $_POST['publisherid'];

// Preparing a sql-query to insert into the table videogames

$query = "INSERT INTO videogames (id, title, price, description, platformid, publisherid) VALUES (NULL, '$titlename', '$price', '$description', '$platformid', '$publisherid') ";

// Execute the sql-query
mysqli_query($dbc, $query) or die('Error querying the database!');

?>


    <div id="divspace" class="panel panel-default">
        <div class="panel-heading panel panel-success">Success....</div>
        <div class="panel-body">
            <h2>Thank you for adding a new Videogame <?php echo $titlename; ?> </h2>
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