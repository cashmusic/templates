<?php
/*
 Template Name: News Page
 *
 * This is your custom page template. You can create as many of these as you need.
 * Simply name is "page-whatever.php" and in add the "Template Name" title at the
 * top, the same way it is here.
 *
 * When you create your page, you can just select the template and viola, you have
 * a custom page template to call your very own. Your mother would be so proud.
 *
 * For more info: http://codex.wordpress.org/Page_Templates
*/
?>

<?php get_header(); ?>

<div id="posts">
<!--Limit posts 10 per page-->
<?php query_posts($query_string . '&showposts=10'); ?>
<!-- Page Title -->
<h1 class="page-title"><?php the_title(); ?></h1>

<!--Posts added by category name-->
<?php if (have_posts()) :query_posts( array( 'category_name' => 'news' ) ); while (have_posts()) : the_post();
		// Get Post Format
		$format = get_post_format( $post_id );

		// If No Format Use Standard
		if ($format == ''){ get_template_part( 'content',  'standard' ); }

		// Assign Post Format
	 	else{ get_template_part( 'content',  $format ); } ?>

<?php endwhile; ?>
<!--pagination-->
<div class="pagination"><p><?php posts_nav_link( ' ', 'Prev', 'Next' ); ?></p></div>
<?php else: ?>
<!-- No Posts -->
<p><?php echo _e('Sorry, there is no news posted yet!', 'cashmusic'); ?></p><?php endif; ?>


</div><!--posts-->
<?php get_footer(); ?>
