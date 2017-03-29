<?php
//Page header
$siteTitle = 'Add VideoGame';
$siteName = 'Add VideoGame to my Collection';
$siteDescription = 'Please fill out the form below.';

include('includes/header.php');
?>


    <i class="fa fa-plus fa-3x" aria-hidden="true"></i>
    <i class="fa fa-archive fa-3x"></i>
    <form method="post" action="addingvideogame.php">
        <div class="form-group">
            <label for="titlename">Title</label>
            <input type="text" name="titlename" class="form-control" id="titlename" placeholder="Fifa 2017">
        </div> 
        
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="5" class="form-control"></textarea>
        </div> 
        
        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" name="price" class="form-control" id="price" placeholder="499" min="0" max="9999" step="0.5" value="49">
        </div>  
        
        <?php
        // Include database connection
        include('includes/connectdb.php');
        
        // Make a sql-query to the database
        $platformQuery = "SELECT id, platformname FROM platforms";
        
        //Performing execution of sql-query against the database
        $resultPlatformQuery = mysqli_query($dbc, $platformQuery);
        
         // Make a sql-query to the database
        $publisherQuery = "SELECT id, publishername FROM publishers";
        
        //Performing execution of sql-query against the database
        $resultPublisherQuery = mysqli_query($dbc, $publisherQuery);
        
        ?>
        
        <div class="form-group">
            <label for="publishers">Publishers</label>
            <select name="publisherid" id="publisher" class="form-control">
                <?php while( $row = mysqli_fetch_array($resultPublisherQuery) ):  ?>
                    <option value="<?php echo $row['id']; ?> "> <?php echo $row['publishername']; ?> </option>
                <?php endwhile; ?>
               
            </select>
        </div>
        
        <div class="form-group">
            <label for="platforms">Platforms</label>
            <select name="platformid" id="platform" class="form-control">
                <?php while( $row = mysqli_fetch_array($resultPlatformQuery) ):  ?>
                    <option value="<?php echo $row['id']; ?> "> <?php echo $row['platformname']; ?> </option>
                <?php endwhile; ?> 
            </select>
        </div>
        
        <input type="submit" name="Submit" value="Submit" class="btn btn-primary btn-block btn-success">    
    </form>
    
    <aside id="asidevideogame"></aside>
    
    <?php  include('includes/footer.php'); ?>
   
  
 




