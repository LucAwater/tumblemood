<?php
get_header();

if( have_posts() ):
  while( have_posts() ): the_post();
    
    // Open featured blog div
    include_once('includes/featured-start.php');
    
    // Page title
    echo '<h1>Tumblemood</h1>';
    
    // Get form
    include_once( 'form.php' );
    
    // Close featured blog div
    include_once('includes/featured-end.php');
    
  endwhile;
  
  else:
  ?>
    
    <div style="max-width: 500px">
      <h2>404, page not found</h2>
      <p>Sorry, but the page you are looking for has not been found. Try checking the URL for errors, then hit the refresh button on your browser.</p>
      
      <p>To get back to the homepage <a href="<?php echo home_url(); ?>">click here</a></p>
    </div>
    
<?php
endif; wp_reset_postdata();

get_footer();
?>