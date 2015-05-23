<?php
get_header();

// Authenticate via API Key
$apikey = "OZvn5lZZAMoGneN6EOO4zC6SU8DAt8U3V1bhOgfXKwTi07zOKU";

$input .= get_search_query();
$input = strtolower( str_replace(' ', '', $input) );

$tumblr = $input . '.tumblr.com';

$apidata = json_decode( file_get_contents("http://api.tumblr.com/v2/blog/$tumblr/posts?api_key=$apikey&limit=50") );

$postsdata = $apidata->response->posts;

if($postsdata):
  
  echo '<ul class="s-grid-1 m-grid-2 l-grid-4 isotope isotope_masonry">';
  
  foreach($postsdata as $post) {
    echo $post->url;
    $post_image = $post->photos[0]->original_size->url;
    $post_width = $post->photos[0]->original_size->width;
    $post_height = $post->photos[0]->original_size->height;
    ?>
    
    <li>
      <img src="<?php echo $post_image; ?>" width="<?php echo $post_width; ?>" height="<?php echo $post_height; ?>">
    </li>
    
    <?php
  }
  
  echo '</ul>';
  
else:
  
  // Open featured blog div
  include_once('includes/featured-start.php');
  
  // Page title
  echo '<h1>Blog not found</h1>';
  echo '<p class="is_white margin-b15">It appears that "' . $tumblr . '" does not exist, try again below!</p>';
  
  // Get form
  include_once( 'form.php' );
  
  // Close featured blog div
  include_once('includes/featured-end.php');
  
endif;
  
get_footer();
?>