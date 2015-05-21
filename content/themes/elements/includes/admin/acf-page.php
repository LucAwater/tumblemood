<?php
// Creates ACF options pages
if( function_exists('acf_add_options_page') ){
  
  acf_add_options_page( array(
    'page_title'  => 'Featured Blogs',
    'menu_title'  => 'Featured Blogs',
    'menu_slug'   => 'featured-blogs',
    'redirect'    => false
  ));
}
?>