<?php
//Page header
$siteTitle = 'View Video Games';
$siteName = 'View Video Games';
$siteDescription = 'Here you will find all my video games from different platforms and vendors - hope you enjoy it.';

//Including the header.php file
include('includes/header.php');

//Connecting to the database
include('includes/connectdb.php');

//Making a SQL-query which selects data from more than one table
$sql = "SELECT videogames.id AS vid, videogames.title AS title, videogames.price AS price, videogames.description AS description, publishers.publishername AS publishername, platforms.platformname AS platformname FROM
publishers INNER JOIN videogames ON publishers.id = videogames.publisherid INNER JOIN platforms ON videogames.platformid = platforms.id";

$result = @mysqli_query($dbc, $sql);

if ($result) //if the SQL-query ($result) is OK, then display/show videogames records
{
?>
<table class="table table-striped" id="showcontent">
    <thead>
        <tr>
            <th>Title</th>
            <th>Description</th>
            <th>Publisher</th>
            <th>Platform</th>
            <th>Price</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Fetch and print/show all videogames records
        
        while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC))
        {
        ?>
        <tr>
            <td><?php echo $row['title'] ?></td>
            <td><?php echo $row['description'] ?></td>
            <td><?php echo $row['publishername'] ?></td>
            <td><?php echo $row['platformname'] ?></td>
            <td><?php echo $row['price'] ?></td>
        </tr>
        <?php 
        }
        ?>
    </tbody>
</table>
<?php 
    mysqli_free_result($result); //Free up the mysql $result ressource
}//End If-statement
else
{
    // if the above "if-statement" was not true then do this
    echo '<p class="error">The videogames records could not be retrieved.</p>';
    
    //Debugging Mysql message
    echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $sql . '</p>';
} // End else-statement

mysqli_close($dbc); // Closing the database-connection

include('includes/footer.php');

?>







