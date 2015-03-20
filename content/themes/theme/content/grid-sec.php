<?php
// Variables
$header_title = get_sub_field( 'grid_sec_header_title' );
$header_text = get_sub_field( 'grid_sec_header_text' );

$content_items = get_sub_field( 'grid_sec_item' );

// Output
echo '<section class="section section-grid section-grid-sec">';
  
  // Grid header
  if( $header_title || $header_text ): 
    echo '<div class="section-header">';
      echo '<h2>' . $header_title . '</h2>';
      echo $header_text;
    echo '</div>';
  endif;
  
  // Grid content
  if( have_rows('grid_sec_item') ):
    echo '<div class="section-content">';
      
      // If isotope is what you seek, remove block-grid classes and add 'isotope' class
      echo '<ul class="small-block-grid-1 medium-block-grid-2 large-block-grid-4">';
        
        while( have_rows('grid_sec_item') ): the_row();
          $image = get_sub_field( 'grid_sec_item_image' );
          $title = get_sub_field( 'grid_sec_item_title' );
          $text = get_sub_field( 'grid_sec_item_text' );
          
          echo '<li>';
            echo '<img src="' . $image['sizes']['medium'] . '" width="' . $image['width'] . '" height="' . $image['height'] . '">';
            echo '<h2>' . $title . '</h2>';
            echo $text;
          echo '</li>';
        endwhile;
        
      echo '</ul>';
      
    echo '</div>';
  endif;
  
echo '</section>';
?>