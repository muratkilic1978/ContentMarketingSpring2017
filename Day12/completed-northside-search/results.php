<?php
//Page header
$siteTitle = 'Search Result';
$siteName = 'Explore the NorthSide Festival Programme 2015';
$siteDescription = '';

# Get contents from header.php
include('includes/header.php');
?> 

<h1>Search Result(s)</h1>
<?php
  # Get the values searchtype and searchterm from previous page and create short variables
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  # check and 
  if (!$searchtype || !$searchterm) {
     echo '<div class="alert alert-danger"><strong>Error occured when searching. Please write something in the searchterm field!</strong></div>';
     echo '<button class="btn btn-primary btn-lg btn-block" onclick="goBack()">Go Back</button>';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  include('includes/connectdb1.php');

  if (mysqli_connect_errno()) {
     echo 'Error: En vandvittig vild hamster har bidt ledning over. try again later';
     exit;
  }

  $query = "SELECT artist.artistname, artist.country, artiststage.year, artiststage.month, artiststage.day, artiststage.clock, stage.stagename FROM artist INNER JOIN artiststage ON artist.id = artiststage.artistid INNER JOIN stage ON artiststage.stageid = stage.id WHERE ".$searchtype." like '%".$searchterm."%'";
  
	#if(!$result = $db->query($query)){
     if(!$result = mysqli_query($con, $query)) { 	
    	die('There was an error running the query [' . $db->error . ']');
    	exit;
	
	} 
	else 
	{

	  #$result = $db->query($query);
	   $result = mysqli_query($con, $query);	  
	  #echo  var_dump($result);

	  #$num_results = $result->num_rows;
	  $num_results = mysqli_num_rows($result);
	  //echo  var_dump($num_results);

		echo "<div class='container'>";
		  	echo "<div class='row'>";

			  echo "<p>Number of matches: ".$num_results."</p>";

			    echo '<table class="table table-striped">';
			    echo  '<thead>';
			    echo    '<tr>';
			    echo      '<th>Nr.</th>';
			    echo      '<th>Artist name</th>';
			    echo      '<th>Country</th>';
			    echo      '<th>Date</th>';
			    echo      '<th>Time</th>';
			    echo      '<th>Stage</th>';
			    echo    '</tr>';
			    echo  '</thead>';
			    echo  '<tbody>';

			  for ($i=0; $i <$num_results; $i++) {
			     $row = $result->fetch_assoc();     
			      echo    '<tr>';
			      echo      '<td>'.($i+1).'</td>';
			      echo      '<td>'. htmlspecialchars(stripslashes($row['artistname'])) .'</td>';
			      echo      '<td>'. stripslashes($row['country']) .'</td>';
			      echo      '<td>'. stripslashes($row['day']).'-'. stripslashes($row['month']).'-'.stripslashes($row['year']) .'</td>';
			      echo      '<td>'. stripslashes($row['clock']) .'</td>';
			      echo      '<td>'. stripslashes($row['stagename']) .'</td>';
			      echo    '</tr>';
			      
			  }
			      echo  '</tbody>';
			      echo '</table>';
			      echo '<button class="btn btn-primary btn-lg btn-block" onclick="goBack()">Go Back</button>';
			echo "</div>";
		echo "</div>"; #END CONTAINER
	  #$result->free();
	  mysqli_free_result($result);

  	}
  	#$db->close();
  	mysqli_close($con);
?>
	

<?php include('includes/footer.php'); ?>

