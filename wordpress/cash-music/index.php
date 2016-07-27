<?php
/**
 * Site Index

 * @package WordPress
 * @subpackage Cash Music
 */ ?>

 <?php get_header(); ?>

<div id="posts">

	<!--Limit posts 10 per page-->
	<?php query_posts($query_string . '&showposts=10');
		//Posts
		if (have_posts()) : while (have_posts()) : the_post();

			// Get Post Format
			$post_id = "";
			$format = get_post_format( $post_id );

			// If No Format Use Standard
			if ($format == ''){ get_template_part( 'content',  'standard' ); }

			// Assign Post Format
	 		else{ get_template_part( 'content',  $format ); }

	 	 wp_link_pages();
		endwhile;
	 ?>

	<?php  if (is_single()){  comments_template(); }?>

	<!--pagination-->
	<div class="pagination"><p><?php posts_nav_link( ' ', 'Prev', 'Next' ); ?></p></div>



<?php else: ?>
<p><?php echo "Sorry, no posts matched your criteria."; ?></p><?php endif; ?>

</div><!--posts-->

<?php get_footer(); ?>
