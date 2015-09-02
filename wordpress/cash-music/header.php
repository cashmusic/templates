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

    <!--Slick-->
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.css"/>
    <script type="text/javascript" src="//cdn.jsdelivr.net/jquery.slick/1.5.0/slick.min.js"></script>

    <?php 
    if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
    wp_head(); 
    ?>

</head>
<?php $post_id = ""; $format = get_post_format( $post_id ); ?>
<body   <?php body_class(); ?> >
<div id="wrapper" class="pure-g <?php if ( is_single() ) echo 'single-post'; ?>">
<h1 class="logo"><a href="<?php echo home_url() ?>"><img src="<?php echo esc_url( get_template_directory_uri() ) . '/img/logo.png'; ?>" alt="<?php bloginfo('name'); ?>" /></a></h1>
<div class="menu-toggle"><div class="icon icon-menu"></div></div><!--menu-toggle-->
<div class="search-toggle"><div class="icon icon-search"></div></div><!--search-toggle-->
<!-- Navigation -->
<div id="menu-primary-outer">
	<?php wp_nav_menu(); ?>
</div><!--primary-nav-outer-->

<!-- Search -->
<?php get_search_form(); ?>

<!--Front page-->
<?php if ( is_front_page() && is_home() ) { ?>

<!--header-->
<div class="pure-u-1" id="header">

<?php    
//$post_id = 0;
$args = array('category_name' => 'featured');

$myposts = get_posts( $args ); 
?>

<!-- Site Feature -->
<div id="featured">

<?php foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
	<div class="entry <?php echo $format = get_post_format( $post_id ); ?>">
	<h4><a href="<?php the_permalink() ?>" rel="bookmark">Posted on <?php the_time('F jS, Y') ?></a></h4>
	<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php the_content(__('(more...)'));  ?>
		
	</div><!--entry-->
<?php endforeach; ?>

</div><!--featured-->

<?php wp_reset_postdata();?>
<?php if (get_option('image_credit_link') ){ ?><a href="<?php echo get_option('image_credit_link') ?>" class="credit"><?php } ?>
<?php if (get_option('image_credit_name') ){ ?><p>Background image by <?php echo get_option('image_credit_name') ?></p><?php  } ?>
<?php if (get_option('image_credit_link') ){ ?></a><?php } ?>
</div><!--header-->

<?php } ?>

<!--Main Content-->
<div id="main" class="pure-u-1">
<div id="contentbg"></div><!--contentbg-->
<div id="content" class="pure-u-1 pure-u-md-2-3">
