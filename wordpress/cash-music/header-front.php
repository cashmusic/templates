<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
<meta charset="UTF-8">
    <!--favicon-->
    <?php  if ( ! ( function_exists( 'has_site_icon' ) && has_site_icon() ) ) { ?>
    <!--Output custom favion-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <?php }  ?>
    <!--droid-->
    <meta name="theme-color" content="#252525">
    <?php
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head();
    ?>
</head>
<?php $post_id = ""; $format = get_post_format( $post_id ); ?>
<body   <?php body_class(); ?> >
<div id="wrapper" class="pure-g <?php if ( is_single() ) echo 'single-post'; ?>">
  <a class="logo" href="<?php echo home_url() ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>" /></a>
<header>

    <h1><?php bloginfo('name'); ?></h1>
    <p id="description"><?php bloginfo('description'); ?></p>
</header>
    <a class="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </a><!--menu-toggle-->


<div class="search-toggle"><div class="icon icon-search"></div></div><!--search-toggle-->
<!-- Navigation -->
<div id="menu-primary-outer">
	<?php wp_nav_menu(); ?>
</div><!--primary-nav-outer-->

<!-- Search -->
<?php get_search_form(); ?>
