<!--Audio Post-->

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php the_content(); ?>
			<div class="inner">
				<h4 class="date"><?php if ( !is_single() ) {?><a href="<?php the_permalink() ?>" rel="bookmark"><?php } ?>Posted on <?php the_time('F jS, Y') ?><?php if ( !is_single() ) {?></a><?php } ?></h4>
				<h1 class="entry-title"><?php if ( !is_single() ) {?><a href="<?php the_permalink() ?>" rel="bookmark"><?php } ?><?php the_title(); ?><?php if ( !is_single() ) {?></a><?php } ?> </h1>
			</div><!--inner-->
			<p><?php the_tags(); ?></p>
</article>
