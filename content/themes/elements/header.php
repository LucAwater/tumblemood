<?php
/**
 * @package WordPress
 */
?>

<!DOCTYPE html>
<!--[if IE 9]>    <html class="no-js lt-ie10" lang="en"> <![endif]-->
<!--[if gt IE 9]><!--> <html <?php language_attributes(); ?>> <!--<![endif]-->
<head>
  <title>YOUR SITE</title>
  
  <!-- META TAGS -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0, user-scalable=no">
  
  <!-- LINK tags -->
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/app.css">
  
  <!-- WP_HEAD() -->
  <?php wp_head(); ?>
</head>

<body class="is-loading">
  <header>
    <a class="link-logo" href="<?php echo home_url(); ?>">
      <img src="<?php echo bloginfo( 'template_directory' ); ?>/img/logo.svg">
    </a>
    
    <a class="trigger trigger-menu"><i></i></a>
  </header>
  
  <?php
  // Hero section must be placed before main
  if( have_posts() ):
    while( have_posts() ): the_post();
    
      // Loop into ACF groups
      if( have_rows('page') ):
        while( have_rows('page') ): the_row();
        
          if( get_row_layout() == 'hero' ):
            include_once( locate_template('content/hero.php') );
          endif;
        
        endwhile;
      endif;
        
    endwhile;
  endif;
  ?>
  
  <main role="main">