<?php
/**
 * The template part for displaying results in search pages
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage Cash Music
 */
?>

<!--Search Result-->

<a href="<?php the_permalink() ?>" class="search-result">
				<h4><?php echo _e('Posted on', 'cashmusic'); the_time('F jS, Y') ?></h4>
				<h2><?php the_title(); ?></h2>
</a>
