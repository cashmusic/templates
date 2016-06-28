<!--Video Post-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="inner">
				<h4 class="date"><?php if ( !is_single() ) {?><a href="<?php the_permalink() ?>" rel="bookmark"><?php } echo _e('Posted on', 'cashmusic'); the_time('F jS, Y') ?><?php if ( !is_single() ) {?></a><?php } ?></h4>
				<h1 class="entry-title"><?php if ( !is_single() ) {?><a href="<?php the_permalink() ?>" rel="bookmark"><?php } the_title(); if ( !is_single() ) {?></a><?php } ?> </h1>
		</div><!--inner-->
		<?php the_content(); ?>
		<p><?php the_tags(); ?></p>
</article>
