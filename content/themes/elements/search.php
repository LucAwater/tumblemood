<?php
get_header();

echo '<ul class="s-grid-1 m-grid-2 l-grid-4 isotope isotope_masonry">';
  // Authenticate via API Key
  $apikey = "OZvn5lZZAMoGneN6EOO4zC6SU8DAt8U3V1bhOgfXKwTi07zOKU";
  $tumblr = get_search_query() . '.tumblr.com';
  
  $apidata = json_decode( file_get_contents("http://api.tumblr.com/v2/blog/$tumblr/posts?api_key=$apikey&limit=50") );
  
  $mypostsdata = $apidata->response->posts;
  $myposts = array();
  
  foreach($mypostsdata as $postdata) {
    $post_image = $postdata->photos[0]->original_size->url;
    $post_width = $postdata->photos[0]->original_size->width;
    $post_height = $postdata->photos[0]->original_size->height;
    ?>
    
    <li>
      <img src="<?php echo $post_image; ?>" width="<?php echo $post_width; ?>" height="<?php echo $post_height; ?>">
    </li>
    
    <?php
  }
echo '</ul>';

get_footer();
?>