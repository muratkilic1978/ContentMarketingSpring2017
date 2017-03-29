<?php

//Page header
$siteTitle = "Add platform";
$siteName = "Add platform";
$siteDescription = "Please fill out the form below with information about the platform.";

include('includes/header.php');

?>


    <i class="fa fa-plus fa-3x"></i>
    <form action="addingplatform.php" method="post">
        <div class="form-group">
            <label for="platformname">Platform name:</label>
            <input type="text" name="platformname" id="platformname" class="form-control" placeholder="Playstation">
        </div> 
        <input type="submit" name="Submit" id="submit-button" value="Submit" class="btn btn-primary btn-block btn-success">
    </form> <!-- END FORM -->
    <aside id="asideplatform">
        
    </aside>
    
    <?php include('includes/footer.php'); ?>
    
   
  
 
