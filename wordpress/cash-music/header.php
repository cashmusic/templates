<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<title><?php wp_title(); ?></title>
<!-- mobile viewport -->
<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, maximum-scale=1">
<meta charset="UTF-8">
    <!--[if lte IE 8]>
        <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-old-ie-min.css">
    <![endif]-->
    <!--[if gt IE 8]><!-->
    <link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/grids-responsive-min.css">
    <!--<![endif]-->
    <link rel="stylesheet" href="<?php echo esc_url( get_template_directory_uri() ) . '/cm_icons.css'; ?>">
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() )  . '/js/sticky.js'; ?>"></script>
    <script src="<?php echo esc_url( get_template_directory_uri() )  . '/js/main.js'; ?>"></script>

    <!--favicon-->
    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon.png" />
    <!--droid-->
    <meta name="theme-color" content="#252525">
    
    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>

    <!--Fonts-->
    <link href="https://fonts.googleapis.com/css?family=Caesar+Dressing|Playfair+Display|Montserrat:400,700|Nunito:300,400,700" rel="stylesheet" type="text/css">

    <?php
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head();
    ?>

</head>
<?php $post_id = ""; $format = get_post_format( $post_id ); ?>
<body   <?php body_class(); ?> >
<div id="wrapper" class="pure-g <?php if ( is_single() ) echo 'single-post'; ?>">
<header>
<a class="logo" href="<?php echo home_url() ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>" /></a>

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

<!--Front page-->
<?php if ( is_front_page() && is_home() ) { ?>

<div class="pure-u-1" id="front">

<?php
//$post_id = 0;
$args = array('category_name' => 'featured');

$myposts = get_posts( $args );
?>

<!-- Site Feature -->
<div id="featured">
  <div class="inner">
    <?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	     <div class="post entry <?php echo $format = get_post_format( $post_id ); ?>">
	         <h4><a href="<?php the_permalink() ?>" rel="bookmark">Posted on <?php the_time('F jS, Y') ?></a></h4>
	           <h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		           <?php the_content(__('(more...)'));  ?>
	     </div><!--post-->
    <?php endforeach; ?>
  </div><!--inner-->
</div><!--featured-->

<div class="scroll animated bounce">
   <svg version="1.1" id="scroll_arw" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
    width="73.125px" height="48px" viewBox="0 0 73.125 48" enable-background="new 0 0 73.125 48" xml:space="preserve">
<g>
   <path d="M36.513,25.438l1.144-1.715c7.431-7.239,14.767-14.577,22.008-22.008C60.809,0.572,61.784,0,62.595,0
       c0.809,0,1.787,0.572,2.93,1.715c2.666,2.669,4.667,4.716,6.002,6.146c1.809,1.715,1.858,3.43,0.143,5.145L39.086,45.589
       c-1.715,1.715-3.43,1.715-5.145,0C22.983,34.728,12.076,23.82,1.214,12.862c-1.619-1.619-1.619-3.238,0-4.859
       c0.475-0.475,1.143-1.143,2-2s1.619-1.644,2.287-2.358C6.167,2.93,6.834,2.287,7.502,1.715c1.904-1.904,3.81-1.904,5.716,0
       l22.008,22.008c0.094,0.097,0.286,0.335,0.572,0.715C36.084,24.82,36.321,25.152,36.513,25.438z"/>
</g>
</svg></div><!--scroll-->

<?php wp_reset_postdata();?>
<?php if (get_option('image_credit_link') ){ ?><a href="<?php echo get_option('image_credit_link') ?>" target="_blank" class="credit"><?php } ?>
<?php if (get_option('image_credit_name') ){ ?><p>Background image by <?php echo get_option('image_credit_name') ?></p><?php  } ?>
<?php if (get_option('image_credit_link') ){ ?></a><?php } ?>
</div><!--front-->

<?php } ?>

<!--Main Content-->
<div id="main" class="pure-u-1">
<div id="contentbg"></div><!--contentbg-->
<div id="content" class="pure-u-1 pure-u-md-2-3">
