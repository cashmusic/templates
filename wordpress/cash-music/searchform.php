<div id="search-wrap">
<div class="close"><span></span><span></span></div><!--close-->
<div class="inner">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" autofocus placeholder="<?php echo _e('Search...', 'cash-music'); ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo _e('Search for:', 'cash-music'); ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo _e('Go', 'cash-music'); ?>" />
</form>
</div><!--inner-->
</div><!--search-wrap-->
