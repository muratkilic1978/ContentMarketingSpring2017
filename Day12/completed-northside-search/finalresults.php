<?php
//Page header
$siteTitle = 'Search Result';
$siteName = 'Explore the NorthSide Festival Programme 2016';
$siteDescription = '';

include('includes/header.php');
?> 

<h1>Search Result(s)</h1>

<?php
  # create short variable names
  $searchtype=$_POST['searchtype'];
  $searchterm=trim($_POST['searchterm']);

  # Check if searchtype or searchterm is empty
  if (!$searchtype || !$searchterm) {
     echo 'You have not entered valid search criteria. Go back and try again.';
     exit;
  }

  if (!get_magic_quotes_gpc()){
    $searchtype = addslashes($searchtype);
    $searchterm = addslashes($searchterm);
  }

  # Open database connection  
  include('includes/connectdb.php');
  
  # If database NOT working then show this and terminate
  if (mysqli_connect_errno()) {
     echo 'Error: En vandvittig vild hamster har bidt ledning over. try again later';
     exit;
  }

  # SQL query
  $query = ;
  
  # Execute DQL query
  $result = $db->query($query);
  #echo  var_dump($result);

  $num_results = $result->num_rows;
  //echo  var_dump($num_results);

	# Display the table structure
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

		  # Iterate through the result and display it on the table 
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
		      echo '</table>'; # End TABLE
		echo "</div>"; # END ROW
	echo "</div>"; # END CONTAINER
  
  # Free the result
  $result->free();

  # Close database connection
  $db->close();

include('includes/footer.php');

?>