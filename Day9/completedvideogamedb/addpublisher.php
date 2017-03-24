<?php

//Page header
$siteTitle = "Add publisher";
$siteName = "Add publisher";
$siteDescription = "Please fill out the form below with information about the publisher.";

include('includes/header.php');

?>


    <i class="fa fa-plus fa-3x"></i>
    <form action="addingpublisher.php" method="post">
        <div class="form-group">
            <label for="publishername">Publisher name:</label>
            <input type="text" name="publishername" id="publishername" class="form-control" placeholder="Electronis arts">
        </div>
        <div class="form-group">
            <label for="websitename">Website:</label>
            <input type="text" name="websitename" id="websitename" class="form-control" placeholder="http://eagames.com">
        </div> 
        <input type="submit" name="Submit" id="submit-button" value="Submit" class="btn btn-primary btn-block btn-success">
    </form> <!-- END FORM -->
    <aside id="asidepublisher">
        
    </aside>
    
    <?php include('includes/footer.php'); ?>
    
   
  
 
