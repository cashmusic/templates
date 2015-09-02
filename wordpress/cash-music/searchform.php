<div id="search-wrap">
<div class="close"><div class="icon icon-plus"></div><!--icon-plus--></div><!--close-->
<div class="inner">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" autofocus placeholder="<?php echo esc_attr_x( 'Search ...', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Go', 'submit button' ) ?>" />
</form>
</div><!--inner-->
</div><!--search-wrap-->