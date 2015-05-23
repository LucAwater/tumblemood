<?php
// Get featured blog
$blogs = get_field( 'blogs', 'option' );

$features = array();

if( have_rows('blogs', 'option') ):
  while( have_rows('blogs', 'option') ): the_row();
    $blog = get_sub_field('blog', 'option');
    array_push($features, $blog);
  endwhile;
endif;

// Get random blog from array
$max = count($features);
$random = rand(0, $max - 1);

// Authenticate via API Key
$f_apikey = "OZvn5lZZAMoGneN6EOO4zC6SU8DAt8U3V1bhOgfXKwTi07zOKU";
$f_tumblr = $features[$random] . '.tumblr.com';

$f_data_info = json_decode( file_get_contents("http://api.tumblr.com/v2/blog/$f_tumblr/info?api_key=$f_apikey") );
$f_title = $f_data_info->response->blog->title;

$f_data_posts = json_decode( file_get_contents("http://api.tumblr.com/v2/blog/$f_tumblr/posts?api_key=$f_apikey&limit=1") );
$f_posts = $f_data_posts->response->posts;

foreach($f_posts as $f_post) {
  $f_post_image = $f_post->photos[0]->original_size->url;
  $f_post_width = $f_post->photos[0]->original_size->width;
  $f_post_height = $f_post->photos[0]->original_size->height;
}
?>
<div class="featured" style="background-image:url('<?php echo $f_post_image; ?>');">
  <div class="inner">