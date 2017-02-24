<?php
get_header();
# Check and see if any posts available
if ( have_posts() ) :
    # Start while-loop
    while ( have_posts() ) : the_post(); 
?>
    <!-- Go and get all post titles -->
    <h2><a href="<?php the_permalink(); ?>">  <?php the_title(); ?> </a></h2>
    <!-- Go and get the content for all posts -->
    <?php the_content(); ?>
    <!--Stop while-loop-->
    <?php endwhile;
# In case "if"< is not true do this
else: 
    echo '<p>No Content found!</p>';
# Stop post-check
endif;
get_footer();
?>








