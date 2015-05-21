<?php get_header(); ?>

<?php
// Get featured blog
$featured_blog = get_field( 'featured_current', 'option' );

// Authenticate via API Key
$apikey = "OZvn5lZZAMoGneN6EOO4zC6SU8DAt8U3V1bhOgfXKwTi07zOKU";
$tumblr = $featured_blog . '.tumblr.com';

$apidata = json_decode( file_get_contents("http://api.tumblr.com/v2/blog/$tumblr/posts?api_key=$apikey&limit=10") );

$mypostsdata = $apidata->response->posts;
$posts = array();

foreach($mypostsdata as $postdata) {
  $post_image = $postdata->photos[0]->original_size->url;
  $post_width = $postdata->photos[0]->original_size->width;
  $post_height = $postdata->photos[0]->original_size->height;
}
?>

<div style="background-image:url('<?php echo $post_image; ?>');">
  <form role="search" method="get" action="<?php echo home_url( '/' ); ?>">
    <input type="search" placeholder="blogname" value="" name="s" title="" />
  </form>
</div>

<?php get_footer(); ?>