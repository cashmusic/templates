<?php
/**
 * @package CASH Music
 */

if ( ! function_exists( 'CASH_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function CASH_setup() {
	global $post_id; 

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Beach, use a find and replace
	 * to change 'beach' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'cashmusic', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );


	if ( ! isset( $content_width ) ) {
	$content_width = 900;
	}
	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu',   'cashmusic' ),
		'secondary' => __( 'Secondary Menu', 'cashmusic' ),
	) );

	// Filter wp_nav_menu() to add additional links and other output
	function new_nav_menu_items($items) {
	$homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . __('Home') . '</a></li>';
	$items = $homelink . $items;
	return $items;
	}
	add_filter( 'wp_nav_menu_items', 'new_nav_menu_items' );

	/* Global Cutom Fields for Social Links */
	add_action('admin_menu', 'add_global_custom_options');
	//add_settings_field( 'admin_menu', 'add_global_custom_options');

	function add_global_custom_options() {
    	add_theme_page('Social Media Links', 'Social Media Links', 'manage_options', 'functions','global_custom_options');
	}

	/*function add_theme_page( $page_title, $menu_title, $capability, $menu_slug, $function = '' ) {
    return add_submenu_page( 'themes.php', $page_title, $menu_title, $capability, $menu_slug, $function );
	}*/

	function global_custom_options()
	{ ?>

    <div class="wrap">
        <h2>Social Media Links</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            	<p><strong>iTunes / &#63743;Music Link:</strong><br /><input type="text" name="itunes_link" size="45" value="<?php echo get_option('itunes_link') ?>" /></p>
            	<p><strong>Soundcloud ID:</strong><br />(https://soundcloud.com/)<br /><input type="text" name="sc_id" size="45" value="<?php echo get_option('sc_id') ?>" /></p>
            	<p><strong>Instagram ID:</strong><br />(https://instagram.com/)<br /><input type="text" name="ig_id" size="45" value="<?php echo get_option('ig_id') ?>" /></p>
           		<p><strong>Twitter ID:</strong><br />(https://twitter.com/)<br /><input type="text" name="twitter_id" size="45" value="<?php echo get_option('twitter_id') ?>" /></p>
            	<p><strong>Facebook Page Link:</strong><br />(https://www.facebook.com/)<br /><input type="text" name="fb_link" size="45" value="<?php echo get_option('fb_link'); ?>" /></p>
            	<p><strong>Youtube Channel ID:</strong><br />(https://www.youtube.com/channel/)<br /><input type="text" name="yt_id" size="45" value="<?php echo get_option('yt_id'); ?>" /></p>
            <p><input type="submit" name="Submit" value="Store Options" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="itunes_link,sc_id,ig_id,twitter_id,fb_link,yt_id" />
        </form>
    </div>
	<?php }

	/* Global Cutom Fields for Site Image Credit */
	add_action('admin_menu', 'add_image_credit_options');
	//add_settings_field( 'admin_menu', 'add_image_credit_options');

	function add_image_credit_options() {
	add_theme_page('Site Image Credit', 'Site Image Credit', 'manage_options', 'imagecredit','image_credit_options');
	}

	function image_credit_options(){ ?>
 	 <div class="wrap">
		<h2>Site Background Image Credit</h2>
        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options') ?>
            	<p><strong>Image Credit Name:</strong><br /><input type="text" name="image_credit_name" size="45" value="<?php echo get_option('image_credit_name') ?>" /></p>
            	<p><strong>Image Credit Link:</strong><br /><input type="text" name="image_credit_link" size="45" placeholder="http://" value="<?php echo get_option('image_credit_link') ?>" /></p>
            <p><input type="submit" name="Submit" value="Update Image Credit" /></p>
            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="image_credit_name, image_credit_link" />
        </form>
  	</div>
	<?php }


	/* Custom Thumbnail Sizes */
	if ( has_post_thumbnail() ) { 
		the_post_thumbnail( 'cash-custom-post-size',800 ); 
	}

	/* Enable support for Post Formats */
	add_theme_support( 'post-formats', array( 'video', 'audio', 'image', 'quote', 'status', 'link' ) );
	/* Enable support for Post featured images */
	add_theme_support( 'post-thumbnails' );

	/* Site Background Image */
	/*$background = array(
	'default-color' => '000000',
	'default-image' => '%1$s/img/background.jpg',
	);

	add_theme_support( 'custom-background', $background );*/

	add_theme_support( 'custom-background', array( 'wp-head-callback' => 'cash_custom_background' ) );

/*  Custom background callback. */
	function cash_custom_background() {
    // $background is the saved custom image, or the default image.
    $background = set_url_scheme( get_background_image() );

    // $color is the saved custom color.
    // A default has to be specified in style.css. It will not be printed here.
    $color = get_theme_mod( 'background_color' );

    if ( ! $background && ! $color )
        return;

    $style = $color ? "background-color: #$color;" : '';

    if ( $background ) {
        $image = " background-image: url('$background');";

        $repeat = get_theme_mod( 'background_repeat', 'repeat' );
        if ( ! in_array( $repeat, array( 'no-repeat', 'repeat-x', 'repeat-y', 'repeat' ) ) )
            $repeat = 'repeat';
        $repeat = " background-repeat: $repeat;";

        $position = get_theme_mod( 'background_position_x', 'left' );
        if ( ! in_array( $position, array( 'center', 'right', 'left' ) ) )
            $position = 'left';
        $position = " background-position: top $position;";

        $attachment = get_theme_mod( 'background_attachment', 'scroll' );
        if ( ! in_array( $attachment, array( 'fixed', 'scroll' ) ) )
            $attachment = 'scroll';
        $attachment = " background-attachment: $attachment;";

        $style .= $image . $repeat . $position . $attachment;
    }
?>
<style type="text/css" id="custom-background-css">
body.custom-background #front, body.custom-background #contentbg{ <?php echo trim( $style ); ?> }
</style>
<?php
}

}
endif; // CASH_setup
add_action( 'after_setup_theme', 'CASH_setup' );


/* Preserve Aspect Ratio of iframes in Posts */
function preserveRatio( $content ) {
   // A regular expression of what to look for.
   $pattern = '/(<iframe([^2]*)iframe>)/i';
   // What to replace it with. $1 refers to the content in the first 'capture group', in parentheses above
   //$the_url = the_permalink();
   $replacement = '<div class="aspect"> 
                        $1
                    </div>';

   // run preg_replace() on the $content
   $content = preg_replace( $pattern, $replacement, $content );

   // return the processed content
   return $content;
}

add_filter( 'the_content', 'preserveRatio' );


?>