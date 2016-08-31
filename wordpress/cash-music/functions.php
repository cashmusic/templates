<?php
/**
* @package WordPress
* @subpackage Cash Music
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
	load_theme_textdomain( 'cash-music', get_template_directory() . '/languages' );


	/* Enqueue Additional Scripts */

	add_action( 'wp_enqueue_scripts', 'cashmusic_theme_enqueue_styles' );
	function cashmusic_theme_enqueue_styles() {
		
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	if(preg_match('/(?i)msie [8]/',$_SERVER['HTTP_USER_AGENT'])){
    // if IE<=8
		wp_enqueue_style( 'grid-style', get_template_directory_uri() . '/css/grids-responsive-old-ie-min.css');
	}
	wp_enqueue_style( 'grid-style', get_template_directory_uri() . '/css/grids-responsive-min.css');
	wp_enqueue_style( 'carousel-style', get_template_directory_uri() . '/css/slick.css');

  wp_enqueue_script( 'jquery-script', get_template_directory_uri() . '/js/jquery.min.js'); 
	wp_enqueue_script( 'cashmusic-script', get_template_directory_uri() . '/js/cashmusic.js');
	wp_enqueue_script( 'sticky-script', get_template_directory_uri() . '/js/sticky.js');
	wp_enqueue_script( 'carousel-script', get_template_directory_uri() . '/js/slick.js');
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js');

	}
	
	function cashmusic_remove_cssjs_ver( $src ) {
    if( strpos( $src, '?ver=' ) )
        $src = remove_query_arg( 'ver', $src );
    return $src;
}
add_filter( 'style_loader_src', 'cashmusic_remove_cssjs_ver', 10, 2 );
add_filter( 'script_loader_src', 'cashmusic_remove_cssjs_ver', 10, 2 );
	

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/* Add title tag */
	add_theme_support( 'title-tag' );

	if ( ! isset( $content_width ) ) {
	$content_width = 900;
	}
	/**
	 * This theme uses wp_nav_menu() in two locations.
	 */
	register_nav_menus( array(
		'primary'   => __( 'Primary Menu',   'cash-music' ),
		'secondary' => __( 'Secondary Menu', 'cash-music' ),
	) );

	// Filter wp_nav_menu() to add additional links and other output
	function cashmusic_new_nav_menu_items($items) {
	$homelink = '<li class="home"><a href="' . home_url( '/' ) . '">' . 'Home' . '</a></li>';
	$items = $homelink . $items;
	return $items;
	}
	add_filter( 'wp_nav_menu_items', 'cashmusic_new_nav_menu_items' );


/* CASH Customisable content */

add_action( 'customize_register' , 'cashmusic_options' );

function cashmusic_options( $wp_customize ) {

// Social Options Section
$wp_customize->add_section('cashmusic_social_options',
	array(
		'title'       => __( 'Social Links', 'cash-music' ),
		'priority'    => 80,
		'capability'  => 'edit_theme_options',
		'description' => __('Change sidebar social IDs', 'cash-music'),
	)
);

// Social Option Default Settings
$wp_customize->add_setting( 'apple_id',
	array(
		'default' => 'https://itunes.apple.com/us/album/hurry-up/id1018976531',
		'sanitize_callback' => 'esc_url_raw'
	)
);

$wp_customize->add_setting( 'soundcloud_id',
	array(
		'default' => 'leckieeeeeeeeeeeeeeeeeee',
		'sanitize_callback' => 'esc_html'
	)
);

$wp_customize->add_setting( 'ig_id',
	array(
		'default' => 'cashmusic',
		'sanitize_callback' => 'esc_html'
	)
);

$wp_customize->add_setting( 'facebook_id',
	array(
		'default' => 'cashmusic.org',
		'sanitize_callback' => 'esc_html'
	)
);

$wp_customize->add_setting( 'twitter_id',
	array(
		'default' => 'cashmusic',
		'sanitize_callback' => 'esc_html'
	)
);

$wp_customize->add_setting( 'youtube_id',
	array(
		'default' => 'cashmusicorg',
		'sanitize_callback' => 'esc_html'
	)
);


// Social Option Controls
$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'apple_social_control',
		array(
			'label'    => __( 'Apple ID', 'cash-music' ),
			'section'  => 'cashmusic_social_options',
			'settings' => 'apple_id',
			'priority' => 10,
		)
		));

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'soundcloud_social_control',
		array(
			'label'    => __( 'Soundcloud ID', 'cash-music' ),
			'section'  => 'cashmusic_social_options',
			'settings' => 'soundcloud_id',
			'priority' => 10,
		)
		));

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'ig_social_control',
			array(
				'label'    => __( 'Instagram ID', 'cash-music' ),
				'section'  => 'cashmusic_social_options',
				'settings' => 'ig_id',
				'priority' => 10,
		)
		));

$wp_customize->add_control( new WP_Customize_Control(
	$wp_customize,
	'facebook_social_control',
			array(
				'label'    => __( 'Facebook ID', 'cash-music' ),
				'section'  => 'cashmusic_social_options',
				'settings' => 'facebook_id',
				'priority' => 10,
		)
		));

$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'twitter_social_control',
			array(
				'label'    => __( 'Twitter ID', 'cash-music' ),
				'section'  => 'cashmusic_social_options',
				'settings' => 'twitter_id',
				'priority' => 10,
		)
		));

$wp_customize->add_control( new WP_Customize_Control(
		$wp_customize,
		'youtube_social_control',
			array(
				'label'    => __( 'Youtube ID', 'cash-music' ),
				'section'  => 'cashmusic_social_options',
				'settings' => 'youtube_id',
				'priority' => 10,
		)
		));




		// Background Image Credit
		$wp_customize->add_section('cashmusic_background_credit',
			array(
				'title'       => __( 'Background Image Credit', 'cash-music' ),
				'priority'    => 60,
				'capability'  => 'edit_theme_options',
				'description' => __('Change sidebar social IDs', 'cash-music'),
			)
		);

		$wp_customize->add_setting( 'background_credit_name',
			array(
				'default' => 'Davy Evans',
				'sanitize_callback' => 'esc_html'
			)
		);

		$wp_customize->add_setting( 'background_credit_link',
			array(
				'default' => 'http://davyevans.co.uk/',
				'sanitize_callback' => 'esc_url_raw'
			)
		);

		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'credit_name',
				array(
					'label'    => __( 'Name', 'cash-music' ),
					'section'  => 'cashmusic_background_credit',
					'settings' => 'background_credit_name',
					'priority' => 10,
				)
				));

		$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			'credit_link',
				array(
					'label'    => __( 'Link', 'cash-music' ),
					'section'  => 'cashmusic_background_credit',
					'settings' => 'background_credit_link',
					'priority' => 10,
				)
				));

	}

	/* Custom Thumbnail Sizes */
	if ( has_post_thumbnail() ) {
		the_post_thumbnail( 'cash-custom-post-size',800 );
	}

	/* Enable support for Post Formats */
	add_theme_support( 'post-formats', array( 'video', 'audio', 'image', 'quote', 'status', 'link' ) );
	/* Enable support for Post featured images */
	add_theme_support( 'post-thumbnails' );


	add_theme_support( 'custom-background', array( 'wp-head-callback' => 'cashmusic_custom_background' ) );

/*  Custom background callback. */
	function cashmusic_custom_background() {
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
function cashmusic_preserveRatio( $content ) {
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

add_filter( 'the_content', 'cashmusic_preserveRatio' );

?>
