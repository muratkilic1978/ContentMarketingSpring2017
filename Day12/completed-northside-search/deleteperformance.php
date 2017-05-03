<?php
//Page header
$siteTitle = 'Delete Performances';
$siteName = 'Delete Performance from the Northside Programme';
$siteDescription = 'Please select performancess you want to delete from your Festival Programme.';

include('includes/header.php');

 ?>
	<i class="fa fa-trash-o fa-4x"></i>
	<!-- <img src="images/delete.png" width="256" height="auto" alt="delete-image"> -->
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?> ">
	<?php include('includes/connectdb1.php'); ?>
	
	<?php 
	if(isset($_POST['submit'])){
		if(!empty($_POST['todelete'])) {
			foreach ($_POST['todelete'] as $delete_id ){
				$query = "DELETE FROM artiststage WHERE id=$delete_id";
				mysqli_query($con, $query) or die('Error querying database');
			}
		
			echo "<strong>" .count($_POST['todelete']) . " Performances were deleted!</strong> <br>";
		} else {
		echo '<div class="alert alert-danger"><strong>Error occured when deleting. Please select rows that you want to remove!</strong></div>';
		}
	}
	?>
	<?php 
		$query = "SELECT artist.artistname AS artistname, artist.country AS country, artiststage.id AS asid, artiststage.year AS year, artiststage.month AS month, artiststage.day AS day, artiststage.clock AS clock, stage.stagename AS stage FROM artist INNER JOIN artiststage ON artist.id = artiststage.artistid INNER JOIN stage ON artiststage.stageid = stage.id ORDER BY day, month, year DESC";
		$results = mysqli_query($con, $query);

		while( $row = mysqli_fetch_array($results) ){
			echo '<pre><input type="checkbox" value="'.$row['asid']. '" name="todelete[]">';

			echo '<strong>Artist name: </strong>' .$row['artistname'] . ' ';

			echo '<strong>From:</strong> ' .$row['country'] . ' ';

			echo '<strong>Playing on: </strong><span style="color:'.$row['stage']. ';">' .$row['stage']. ' stage </span>';

			echo '<strong>at the date: </strong>' .$row['month'].'/'.$row['day'].'/'.$row['year']. ' ';

			echo '<strong>at the time: </strong>' .$row['clock']. ' ';

			echo '<br></pre>';

		}
	mysqli_close($con);
	?>

		<input class="btn btn-primary btn-block btn-danger" type="submit" name="submit" value="Remove">
	</form>
<?php include('includes/footer.php'); ?>