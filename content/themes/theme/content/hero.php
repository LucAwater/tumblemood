<?php
// Variables
$banner = get_sub_field( 'hero_banner' );

$content_logo = get_sub_field( 'hero_content_image' );
$content_title = get_sub_field( 'hero_content_title' );
$content_text = preg_replace( '/<p>/', '<p class="is-white">', get_sub_field( 'hero_content_text' ) );

// Output
echo '<section class="section section-hero pad-no">';
  
  // Hero background image
  if( $banner ): 
    echo '<div class="section-hero-banner is-stretched-wrapper">';
      echo '<img class="is-stretched-object" src="' . $banner['sizes']['large'] . '" width="' . $banner['width'] . '" height="' . $banner['height'] . '">';
    echo '</div>';
  endif;
  
  // Hero content container
  if( $content_logo || $content_title || $content_text ):
    echo '<div class="section-hero-content">';
      
      // Logo
      if( $content_logo ):
        echo '<img src="' . $content_logo['sizes']['medium'] . '" width="' . $content_logo['width'] . '" height="' .   $content_logo['height'] . '">';
      endif;
      
      // Title
      if( $content_title ):
        echo '<h2 class="is-white">' . $content_title . '</h2>';
      endif;
      
      // Text
      if( $content_text ):
        echo $content_text;
      endif;
      
    echo '</div>';
  endif;
  
echo '</section>';

// <a href="javascript:;" class="arrow arrow-scroll"><img src="<?php echo bloginfo( 'template_directory' ) . /img/arrow.svg"></a>
?>