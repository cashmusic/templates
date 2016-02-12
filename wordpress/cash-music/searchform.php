<div id="search-wrap">
<div class="close"><span></span><span></span></div><!--close-->
<div class="inner">
<form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
	<label>
		<input type="search" class="search-field" autofocus placeholder="<?php echo "Search ..."; ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo "Search for:"; ?>" />
	</label>
	<input type="submit" class="search-submit" value="<?php echo "Go"; ?>" />
</form>
</div><!--inner-->
</div><!--search-wrap-->
