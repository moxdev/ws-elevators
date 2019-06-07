<?php
/**
 * Warfield and Sanford functions and definitions
 *
 * @package Warfield and Sanford
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 640; /* pixels */
}

if ( ! function_exists( 'warfield_sanford_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function warfield_sanford_setup() {

	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on Warfield and Sanford, use a find and replace
	 * to change 'warfield_sanford' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'warfield_sanford', get_template_directory() . '/languages' );

	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	/*
	 * Let WordPress manage the document title.
	 * By adding theme support, we declare that this theme does not use a
	 * hard-coded <title> tag in the document head, and expect WordPress to
	 * provide it for us.
	 */
	add_theme_support( 'title-tag' );

	/*
	 * Enable support for Post Thumbnails on posts and pages.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );
	add_image_size('bio-thumb', 200, 300, true);
	add_image_size('featured-image', 2600, 1200, true);

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' 	=> __( 'Primary Menu', 'warfield_sanford' ),
		'footer'	=> __( 'Footer Menu', 'warfield_sanford')
	));


	/*
	 * Switch default core markup for search form, comment form, and comments
	 * to output valid HTML5.
	 */
	add_theme_support( 'html5', array(
		'search-form', 'comment-form', 'comment-list', 'gallery', 'caption',
	) );

	/*
	 * Enable support for Post Formats.
	 * See http://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array(
		'aside', 'image', 'video', 'quote', 'link',
	) );

	// Set up the WordPress core custom background feature.
	add_theme_support( 'custom-background', apply_filters( 'warfield_sanford_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // warfield_sanford_setup
add_action( 'after_setup_theme', 'warfield_sanford_setup' );

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function warfield_sanford_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Global Sidebar', 'warfield_sanford' ),
		'id'            => 'sidebar-global',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );

	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'warfield_sanford' ),
		'id'            => 'sidebar-blog',
		'description'   => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'warfield_sanford_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function warfield_sanford_scripts() {
	wp_enqueue_style( 'warfield_sanford-flex-style', get_stylesheet_directory_uri() . '/css/flexslider.css');

	wp_enqueue_style( 'warfield_sanford-style', get_stylesheet_uri() );

	wp_enqueue_script( 'warfield_sanford-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20120206', true );

	wp_enqueue_script( 'warfield_sanford-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true );

	wp_enqueue_script( 'warfield_sanford-jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js', '', '', true );

	if (is_front_page() ){
		//wp_enqueue_script( 'warfield_sanford-jquery-flex-script', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array(), '', true);
		wp_enqueue_script( 'warfield_sanford-jquery-flex-script', get_template_directory_uri() . '/js/jquery.flexslider.js', array(), '', true);
		wp_enqueue_script( 'warfield_sanford-flex-script-call', get_template_directory_uri() . '/js/home-flex.js', array(), '', true );
	}

	wp_enqueue_script( 'warfield_sanford-equal-heights', get_template_directory_uri() . '/js/equal-heights.js', array(), '', true );

	wp_enqueue_script( 'warfield_sanford-images-loaded-js', get_template_directory_uri() . '/js/imagesloaded.pkgd.min.js', array(), '', true );

	wp_enqueue_script( 'warfield_sanford-image-fill-js', get_template_directory_uri() . '/js/jquery-imagefill.js', array(), '', true );

	wp_enqueue_script( 'warfield_sanford-global-js', get_template_directory_uri() . '/js/global.js', array(), '', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'warfield_sanford_scripts' );

/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';


/**
 * COMMENTING OFF FOR PAGES
 */
function default_comments_off( $data ) {
    if( $data['post_type'] == 'page' && $data['post_status'] == 'auto-draft' ) {
        $data['comment_status'] = 0;
    }
    return $data;
}
add_filter( 'wp_insert_post_data', 'default_comments_off' );

/**
 * PLAY NICE WITH OLD IE
 */
function add_ie_html5_shim () {
	echo '<!--[if lt IE 9]>';
	echo '<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>';
	//echo '<link href="' . get_stylesheet_directory_uri() . '/ie.css" rel="stylesheet">';
	echo '<![endif]-->';
}
add_action('wp_head', 'add_ie_html5_shim');

/**
 * REMOVE P TAGS ON IMAGES IN WYSIWYG
 */
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_filter('the_content', 'filter_ptags_on_images');

/**
* GLOBAL OPTIONS FIELDS
*/

add_action('admin_menu', 'warfield_sanford_gco_interface');

function warfield_sanford_gco_interface() {
    add_options_page('Global Custom Options', 'Global Custom Options', '8', 'functions', 'edit_global_custom_options');
}

function edit_global_custom_options() {?>
    <div class='wrap'>
	    <h2>Global Custom Fields</h2>
	    <form method="post" action="options.php">
	    <?php wp_nonce_field('update-options') ?>

	    <p><strong>Street Address:</strong><br />
	    <input type="text" name="streetAdd" size="45" value="<?php echo get_option('streetAdd'); ?>" /></p>

	    <p><strong>City:</strong><br />
	    <input type="text" name="city" size="45" value="<?php echo get_option('city'); ?>" /></p>

	    <p><strong>State:</strong><br />
	    <input type="text" name="state" size="45" value="<?php echo get_option('state'); ?>" /></p>

	    <p><strong>Zip:</strong><br />
	    <input type="text" name="zip" size="11" value="<?php echo get_option('zip'); ?>" /></p>

	    <p><strong>Phone Number:</strong><br />
	    <input type="text" name="phoneNumber" size="45" value="<?php echo get_option('phoneNumber'); ?>" /></p>

        <p><strong>Email Address:</strong><br />
	    <input type="text" name="email" size="45" value="<?php echo get_option('email'); ?>" /></p>

		 <p><strong>Email Address for "Update Account Info" Page:</strong><br />
	    <input type="text" name="email-2" size="45" value="<?php echo get_option('email-2'); ?>" /></p>

	    <p><strong>Fax Number:</strong><br />
	    <input type="text" name="faxNumber" size="45" value="<?php echo get_option('faxNumber'); ?>" /></p>

	    <p><strong>Facebook URL:</strong><br />
	    <input type="text" name="facebookURL" size="45" value="<?php echo get_option('facebookURL'); ?>" /></p>

	    <p><strong>LinkedIn URL:</strong><br />
	    <input type="text" name="linkedinURL" size="45" value="<?php echo get_option('linkedinURL'); ?>" /></p>

	    <p><input type="submit" name="Submit" value="Update Options" /></p>

	    <input type="hidden" name="action" value="update" />
	    <input type="hidden" name="page_options" value="streetAdd,city,state,zip,phoneNumber,email,email-2,faxNumber,facebookURL,linkedinURL" />
	    <!--<input type="hidden" name="page_options" value="myname,amazonid,todaysite,welcomemessage" />-->

	    </form>
    </div>
    <?php
}

/**
 * CUSTOM POSTS TYPES
 */

function warfield_sanford_custom_posts() {
	register_post_type( 'slides',
		array(
			'has_archive' 	=> 	false,
			'labels' 		=> 	array(
					'name' 			=> 	__( 'Slides' ),
					'singular_name' => 	__( 'Slide' ),
					'add_new' 		=> 	__( 'Add New' ),
					'add_new_item' 	=> 	__( 'Add New Slide' ),
					'edit' 			=> 	__( 'Edit' )
			),
			'menu_icon'		=>	'dashicons-slides',
			'menu_position' =>	6,
			'public' 		=> 	true,
			'supports' 		=> 	array( 'title', 'editor', 'thumbnail'),
			'taxonomies'	=> 	array('category')
		)
	);

	register_post_type( 'bio',
		array(
			'has_archive' 	=> 	false,
			'labels' 		=> 	array(
					'name' 			=> 	__( 'Bios' ),
					'singular_name' => 	__( 'Bio' ),
					'add_new' 		=> 	__( 'Add New' ),
					'add_new_item' 	=> 	__( 'Add New Bio' ),
					'edit' 			=> 	__( 'Edit' )
			),
			'menu_icon'		=>	'dashicons-id',
			'menu_position' =>	7,
			'public' 		=> 	true,
			'supports' 		=> 	array( 'title', 'editor', 'thumbnail'),
			'taxonomies'	=> 	array('category')
		)
	);
}
add_action( 'init', 'warfield_sanford_custom_posts' );


/**
 * HOMEPAGE SLIDER
 */

function warfield_sanford_home_slider() {
	if( is_front_page() ) {
		$the_query 		= 	new WP_Query( array ('order' => 'ASC', 'post_type' => 'slides', 'posts_per_page' => -1, 'cat' => 'home_page_slider') );
		echo '<div class="flexslider">';
		echo '<ul class="slides">';

		if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$content 		= 	get_the_content();
		$id 			= 	get_the_ID();
		$url 			= 	get_post_meta(get_the_ID(), 'destination_url', true);
		$button_text 	= 	get_post_meta(get_the_ID(), 'button_text', true);
		//echo '<div class="page slide" id="feature_' . $id . '">';

		echo '<li id="feature_' . $id . '">';
		if (has_post_thumbnail( $post->ID ) ):
			the_post_thumbnail('featured-image');

		endif;
		echo '<div class="container">';
		the_content();
		echo '<a href="' . $url . '">';
		echo '<span class="btn btn-blue">';
		echo '<span>' . $button_text .'</span>';
		echo '</span>';
		echo '</a>';
		echo '</div>';
		echo '</li>';
		//echo '</div>';

		endwhile;
		else: echo 'Sorry, nothing here';

		endif;
		echo '</ul>';
		echo '</div>';
		wp_reset_postdata();
	}
}


/**
 * SERVICES BANNER
 */

function warfield_sanford_services_banner() {
	//Set up the needed objects
	$my_wp_query = new WP_Query();
	$all_wp_pages = $my_wp_query->query(array('post_type' => 'page'));

	//Get Services page as an object
	$services 			=	get_page_by_title('Services');

	//Filter through to get 'Services' children pages
	$services_children	=	get_page_children( $services->ID, $all_wp_pages );

	if ( is_front_page() || is_page('Services')  || is_page(array($services_children))){
	?>
	<section id="services-banner">
		<div class="service-wrapper" id="modernization">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-modernization.svg' ?>" alt=" " />
				<a href="/services/modernization/"><h2>Modernization</h2></a>
			</div>
			<div class="service-content">
				<p>Faster performance, energy efficiency, increased reliability, and property value are all big reasons to modernize your elevator equipment.</p>
				<a href="/services/modernization/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="maintenance">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-maintenance.svg' ?>" alt=" " />
				<a href="/services/maintenance/"><h2>Maintenance</h2></a>
			</div>
			<div class="service-content">
				<p>We provide the consistent maintenance and the attention to detail necessary to keep your equipment running safely and smoothly, reducing your elevator shut downs.</p>
				<a href="/services/maintenance/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="repair">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-repair.svg' ?>" alt=" " />
				<a href="/services/repair/"><h2>Repair</h2></a>
			</div>
			<div class="service-content">
				<p>Warfield & Sanford provides round the clock support to every unit under our standard maintenance agreement.</p>
				<a href="/services/repair/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="new-construction">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-new-construction.svg' ?>" alt=" " />
				<a href="/services/new-construction/"><h2>New Installation</h2></a>
			</div>
			<div class="service-content">
				<p>We have the flexibly to handle installations from the simple, to more complex out of the box scenarios.</p>
				<a href="/services/new-construction/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
	</section>

<?php } else { ?>

		<section id="services-banner-mini">
		<div class="service-wrapper" id="modernization">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-modernization.svg' ?>" alt=" " />
				<a href="/services/modernization/"><h2>Modernization</h2></a>
			</div>
			<div class="service-content">
				<p>Faster performance, energy efficiency, increased reliability, and property value are all big reasons to modernize your elevator equipment.</p>
				<a href="/services/modernization/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="maintenance">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-maintenance.svg' ?>" alt=" " />
				<a href="/services/maintenance/"><h2>Maintenance</h2></a>
			</div>
			<div class="service-content">
				<p>We provide the consistent maintenance and the attention to detail necessary to keep your equipment running safely and smoothly, reducing your elevator shut downs.</p>
				<a href="/services/maintenance/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="repair">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-repair.svg' ?>" alt=" " />
				<a href="/services/repair/"><h2>Repair</h2></a>
			</div>
			<div class="service-content">
				<p>Warfield & Sanford provides round the clock support to every unit under our standard maintenance agreement.</p>
				<a href="/services/repair/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
		<div class="service-wrapper" id="new-construction">
			<div class="service-box">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-new-construction.svg' ?>" alt=" " />
				<a href="/services/new-construction/"><h2>New Installation</h2></a>
			</div>
			<div class="service-content">
				<p>We have the flexibly to handle installations from the simple, to more complex out of the box scenarios.</p>
				<a href="/services/new-construction/">
					<span class="btn btn-clear">
				   		<span>Learn More ></span>
					</span>
				</a>
			</div>
		</div>
	</section>
	<?php }
}

/**
 * 24 / 7 BANNER
 */

function warfield_sanford_247_banner() {?>
	<section id="twenty-four-seven-banner">
		<div class="wrapper">
			<h2>24 hours a day, 7 days a week, 365 days a year <span>– we’re there!</span></h2>
		</div>
	</section>
<?php }


/**
 * 100 YEARS VINTAGE BANNER
 */

function warfield_sanford_100_years_vintage_banner() {
	if ( is_front_page() ) {?>
		<section id="vintage-banner">
			<img src="<?php echo get_template_directory_uri() . '/imgs/background-vintage.jpg'?>" alt="Warfield and Sanford vintage picture" />
			<div class="wrapper">
				<div>
					<h2>Over 100 years of professional service and commitment.</h2>
					<a href="/about/">
						<span class="btn btn-blue">
							<span>Learn More ></span>
						</span>
					</a>
				</div>
			</div>
		</section>
	<?php }
}

/**
 * REQUEST ESTIMATE / TALK TO EXPERT BANNER
**/

function warfield_sanford_estimate_expert_banner() {?>
	<section id="estimate-expert-banner">
		<div class="wrapper">
			<article class="split">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-estimate.svg'?>" alt=" " />
				<h2><a href="/contact/">Request An Estimate</a></h2>
				<p>Whether maintaining elevators, installing for a new build, or modernizing, we provide dependable service and the upgrades required to keep your building operating efficiently.</p>
			</article>
			<article class="split">
				<img src="<?php echo get_template_directory_uri() . '/imgs/icon-call.svg'?>" alt=" " />
				<h2><a href="/contact/">Talk To An Elevator Expert</a></h2>
				<p>We have a live attendant available 24 hours a day. Our business is built on personal service that you can count on every time – you will ALWAYS be more than an account number to us.</p>
			</article>
		</div>
	</section>
<?php }

/**
 * LANDING PAGE FEATURED IMAGE
**/

function warfield_sanford_featured_image() {
	if(is_page()) {
		if(has_post_thumbnail()) {
			echo '<article id="featured-image">';
			echo the_post_thumbnail('featured-image', array('class' => 'featured-image'));
			echo '</article>';
		}
	}
}


/**
 * BLOG FEATURED IMAGE
**/

function warfield_sanford_index_featured_image() {
	if (is_home() && get_option('page_for_posts') ) {
			echo '<article id="featured-image">';
			$img = wp_get_attachment_image_src(get_post_thumbnail_id(get_option('page_for_posts')),'full');
			$featured_image = $img[0];
			echo '<img src="' . $featured_image . '" />';
			echo '</article>';
	}
}


/**
 * BIOS
**/

function warfield_sanford_bios() {
	if (is_page (79) ) {
		$the_query 		= 	new WP_Query( array ('order' => 'ASC', 'post_type' => 'bio', 'posts_per_page' => -1) );



		if ( $the_query->have_posts() ) :
		while ( $the_query->have_posts() ) : $the_query->the_post();
		$content 		= 	get_the_content();
		$id 				= 	get_the_ID();
		$position 		=  	get_post_meta(get_the_ID(), 'position_title', true);

		echo '<div class="bio-wrapper">';

		if (has_post_thumbnail( $post->ID ) ):
			the_post_thumbnail('bio-thumb', array('class' => 'bio-thumb'));
		endif;


		echo '<div class="bio-info">';
		echo '<h2>';
		the_title();
		echo '</h2>';
		echo '<h3>';
		echo $position;
		echo '</h3>';
		the_content();
		echo '</div>';
		echo '</div>';

		endwhile;
		else: echo 'Sorry, nothing here';

		endif;

		wp_reset_postdata();
	}
}



/**
* FOOTER MENU
*/

function warfield_sanford_footer_menu(){
	if ( has_nav_menu( 'footer' ) ){
		wp_nav_menu(
			array(
				'theme_location' 	=> 'footer',
				'container' 		=> 'div',
				'container_id' 		=> '',
				'container_class' 	=> 'footer-nav-container',
				'menu_id' 			=> '',
				'menu_class' 		=> 'footer-menu',
				'depth' 			=> 1,
				'fallback_cb' 		=> '',
			)
		);
	}
}


/**
 * CONTACT SIDEBAR
**/

function warfield_sanford_contact_sidebar() {
	$streetAdd      = get_option( 'streetAdd' );
    $city           = get_option( 'city' );
    $state          = get_option( 'state' );
    $zip            = get_option( 'zip' );
    $phoneNumber    = get_option( 'phoneNumber' );
	$email			= get_option( 'email' );
	$email2			= get_option( 'email-2' );

	if ( is_page( array(40, 387) )){

		echo '<aside class="contact-sidebar widget">';
		echo '<h3> Warfield & Sanford </h3>';
		echo '<span>' . $streetAdd . '</span>';
		echo '<span>' . $city . ', ' . $state . ' ' . $zip . '</span>';
		echo '<span>' . $phoneNumber .'</span>';
		if(is_page(40)) {
			echo '<span><a href="mailto:' . $email. '">' . $email. '</a></span>';
		} else if (is_page(387)) {
			echo '<span><a href="mailto:' . $email2. '">' . $email2. '</a></span>';
		}
		if(is_page(40)) { ?>
		<br><br>
		<span><a href="<?php echo get_permalink(387); ?>">Update Your Account Information &raquo;</a></span>
		<?php }
		echo '</aside>';
	}
}




