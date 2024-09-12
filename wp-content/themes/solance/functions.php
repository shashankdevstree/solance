<?php
/**
 * solance functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package solance
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function solance_setup() {
	/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on solance, use a find and replace
		* to change 'solance' to the name of your theme in all the template files.
		*/
	load_theme_textdomain( 'solance', get_template_directory() . '/languages' );

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
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
	add_theme_support( 'post-thumbnails' );

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus(
		array(
			'primary' => esc_html__( 'Primary', 'solance' ),
			'product' => esc_html__( 'Product', 'solance' ),
		)
	);

	/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'solance_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	/**
	 * Add support for core custom logo.
	 *
	 * @link https://codex.wordpress.org/Theme_Logo
	 */
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'solance_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function solance_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'solance_content_width', 640 );
}
add_action( 'after_setup_theme', 'solance_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function solance_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'solance' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'solance' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
}
add_action( 'widgets_init', 'solance_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function solance_scripts() {
	wp_enqueue_style( 'solance-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'solance-style', 'rtl', 'replace' );

	wp_enqueue_script( 'solance-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'solance_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

function product_post_type() {
  
	// Set UI labels for Custom Post Type
		$labels = array(
			'name'                => _x( 'Products', 'Post Type General Name', 'solance' ),
			'singular_name'       => _x( 'Product', 'Post Type Singular Name', 'solance' ),
			'menu_name'           => __( 'Products', 'solance' ),
			'parent_item_colon'   => __( 'Parent Product', 'solance' ),
			'all_items'           => __( 'All Products', 'solance' ),
			'view_item'           => __( 'View Product', 'solance' ),
			'add_new_item'        => __( 'Add New Product', 'solance' ),
			'add_new'             => __( 'Add New', 'solance' ),
			'edit_item'           => __( 'Edit Product', 'solance' ),
			'update_item'         => __( 'Update Product', 'solance' ),
			'search_items'        => __( 'Search Product', 'solance' ),
			'not_found'           => __( 'Not Found', 'solance' ),
			'not_found_in_trash'  => __( 'Not found in Trash', 'solance' ),
		);
		  
	// Set other options for Custom Post Type
		  
		$args = array(
			'label'               => __( 'products', 'solance' ),
			'description'         => __( 'Product news and reviews', 'solance' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
			'hierarchical'        => false,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'show_in_nav_menus'   => true,
			'show_in_admin_bar'   => true,
			'menu_position'       => 5,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'capability_type'     => 'page',
			'show_in_rest'        => true,
			  
			// This is where we add taxonomies to our CPT
			'taxonomies'          => array( 'product-category' ),
		);
		  
		// Registering your Custom Post Type
		register_post_type( 'products', $args );
	  
	}
	  
	/* Hook into the 'init' action so that the function
	* Containing our post type registration is not 
	* unnecessarily executed. 
	*/
	  
	add_action( 'init', 'product_post_type', 0 );

// Hook into the 'init' action
add_action( 'init', 'product_taxonomy', 0 );

// Create custom taxonomy
function product_taxonomy() {

    // Labels for the taxonomy
    $labels = array(
        'name' => _x( 'Product Category', 'taxonomy general name' ),
        'singular_name' => _x( 'Product Category', 'taxonomy singular name' ),
        'search_items' =>  __( 'Search Product Category' ),
        'all_items' => __( 'All Product Category' ),
        'parent_item' => __( 'Parent Product Category' ),
        'parent_item_colon' => __( 'Parent Product Category:' ),
        'edit_item' => __( 'Edit Product Category' ),
        'update_item' => __( 'Update Product Category' ),
        'add_new_item' => __( 'Add New Product Category' ),
        'new_item_name' => __( 'New Product Category Name' ),
        'menu_name' => __( 'Product Category' ),
    );

    // Register the taxonomy
    register_taxonomy('product-category', array('products'), array(
        'hierarchical' => true,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'query_var' => true,
        'rewrite' => array( 'slug' => 'product-category' ),
    ));

}

function solance_enqueue(){
	$ver = time();
    
	wp_enqueue_style('aos', 'https://unpkg.com/aos@2.3.1/dist/aos.css', array() , 'all' );
	wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css?family=Montserrat&display=swap', array() , 'all' );
	wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css', array() , 'all' );
	wp_enqueue_style('fonts', 'https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&display=swap', array() , 'all' );
	wp_enqueue_style('barlow-font', 'https://fonts.googleapis.com/css?family=Barlow', array() , 'all' );
	wp_enqueue_style('bootstrap-5', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css', array() , 'all' );
	wp_enqueue_style('aos', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css', array() , 'all' );
	wp_enqueue_style('bootstrapcdn', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css', array() , 'all' );

	wp_enqueue_style('slick', get_template_directory_uri() . '/assets/css/slick.css', array(), $ver , 'all' );
	wp_enqueue_style('slick-min', get_template_directory_uri() . '/assets/css/slick-theme.css', array(), $ver , 'all' );

	// wp_enqueue_script('jquery-min', 'https://code.jquery.com/jquery-3.2.1.slim.min.js',  array(), $ver , true );
	wp_enqueue_script('aos',  'https://unpkg.com/aos@2.3.1/dist/aos.js',  array(), $ver , true);
	wp_enqueue_script('bootstrap',  'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',  array(), $ver , true);
	wp_enqueue_script('popper', 'https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js',  array(), $ver , true);
	wp_enqueue_script('bootstrap-min', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js',  array(), $ver , true );
	wp_enqueue_script('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js',  array(), $ver , true);
	wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js',  array(), $ver , true );
	// wp_enqueue_script('jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.min.js',  array(), $ver , true );

	wp_enqueue_script('slick', get_template_directory_uri() . '/assets/js/slick.min.js',  array(), $ver , true );
	
	if(is_page('about-us')){
		wp_enqueue_style('about-us', get_template_directory_uri() . '/assets/css/about.css', array(), $ver , 'all' );
	}
	
	if(is_front_page() || is_page('about-us')){
		wp_enqueue_style('home', get_template_directory_uri() . '/assets/css/home.css', array(), $ver , 'all' );
	}
	if(is_page('our-team')){
		wp_enqueue_style('our-team', get_template_directory_uri() . '/assets/css/our-team.css', array(), $ver , 'all' );
	}

	if(is_singular( 'products' )){
		wp_enqueue_style('products', get_template_directory_uri() . '/assets/css/products.css', array(), $ver , 'all' );
	}
	
	if(is_page('blogs')){
		wp_enqueue_style('blogs', get_template_directory_uri() . '/assets/css/blogs.css', array(), $ver , 'all' );
	}

	if(is_page('contact')){
		wp_enqueue_style('contact', get_template_directory_uri() . '/assets/css/contact-us.css', array(), $ver , 'all' );
	}

	if(is_single()){
		wp_enqueue_style('blog-details', get_template_directory_uri() . '/assets/css/blog-details.css', array(), $ver , 'all' );
	}

	if(is_tax( 'product-category' )) {
		wp_enqueue_style('blog-details', get_template_directory_uri() . '/assets/css/two-wheel.css', array(), $ver , 'all' );
	}

	if(is_page('survey') || is_page('new-survey') || is_page('thank-you')){
		// wp_enqueue_script('jquery');
		wp_enqueue_style('survey', get_template_directory_uri() . '/assets/css/survey.css', array(), $ver , 'all' );
		wp_enqueue_style('thankyou', get_template_directory_uri() . '/assets/css/thankyou.css', array(), $ver , 'all' );
		wp_enqueue_script('survey', get_template_directory_uri() . '/assets/js/survey.js',  array(), $ver , true );
		wp_localize_script( 'survey', 'survey',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}

	if(is_page('survey') || is_page('thank-you')){
		// wp_enqueue_script('jquery');
		wp_enqueue_style('new-survey', get_template_directory_uri() . '/assets/css/new-survey.css', array(), $ver , 'all' );
		wp_enqueue_style('thankyou', get_template_directory_uri() . '/assets/css/thankyou.css', array(), $ver , 'all' );
		wp_enqueue_script('survey', get_template_directory_uri() . '/assets/js/survey.js',  array(), $ver , true );
		wp_localize_script( 'survey', 'survey',
			array( 
				'ajaxurl' => admin_url( 'admin-ajax.php' ),
			)
		);
	}
	

	wp_enqueue_script('custom', get_template_directory_uri() . '/assets/js/custom.js',  array(), $ver , true );
	wp_localize_script( 'custom', 'custom',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
		)
	);

	wp_enqueue_style('global', get_template_directory_uri() . '/assets/css/global.css', array(), $ver , 'all' );
}
add_action('wp_enqueue_scripts', 'solance_enqueue');

function solance_admin_assets() {
	$ver = time();
	wp_enqueue_style('datatables',  'https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.min.css', array(), $ver, 'all');
	
    wp_enqueue_style('survey-admin',  get_template_directory_uri() . '/assets/css/survey-admin.css', array(), $ver, 'all');
	wp_enqueue_script('chart-js', 'https://cdn.jsdelivr.net/npm/chart.js', array('jquery'), true);
	wp_enqueue_script('datatables', 'https://cdn.datatables.net/2.0.8/js/dataTables.min.js', array('jquery'), true);
	wp_enqueue_script('chartjs-adapter', 'https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns@2.0.0/dist/chartjs-adapter-date-fns.min.js', array('jquery'), true);
    wp_enqueue_script('survey-admin',  get_template_directory_uri() . '/assets/js/survey-admin.js', array('jquery'), $ver, true);
	wp_localize_script( 'survey-admin', 'survey_admin',
		array( 
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'template_url' => get_template_directory_uri(),
		)
	);
	
}
add_action('admin_enqueue_scripts', 'solance_admin_assets');

function add_active_class_to_nav_menu($classes, $item) {
    // Check if the current item is the active item
    if (in_array('current-menu-item', $classes)) {
        // Add the 'active' class to the array of classes
        $classes[] = 'active-link';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_active_class_to_nav_menu', 10, 2);


class Walker_Nav_Menu_No_UL extends Walker_Nav_Menu {
    // Start the element output.
	function start_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    function end_lvl( &$output, $depth = 0, $args = array() ) {
        $indent = str_repeat("\t", $depth);
        $output .= "$indent</ul>\n";
    }

    // Start the element output.
    function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        $indent = ($depth) ? str_repeat("\t", $depth) : '';

        $classes = empty($item->classes) ? array() : (array) $item->classes;
        $classes[] = 'menu-item-' . $item->ID;

        $class_names = join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
        $class_names = $class_names ? ' class="' . esc_attr($class_names) . '"' : '';

        $id = apply_filters('nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args);
        $id = $id ? ' id="' . esc_attr($id) . '"' : '';

        $output .= $indent . '<li' . $id . $class_names .'>';

        $atts = array();
        $atts['title']  = ! empty($item->attr_title) ? $item->attr_title : '';
        $atts['target'] = ! empty($item->target)     ? $item->target     : '';
        $atts['rel']    = ! empty($item->xfn)        ? $item->xfn        : '';
        $atts['href']   = ! empty($item->url)        ? $item->url        : '';

        $atts = apply_filters('nav_menu_link_attributes', $atts, $item, $args);

        $attributes = '';
        foreach ($atts as $attr => $value) {
            if (! empty($value)) {
                $value = ('href' === $attr) ? esc_url($value) : esc_attr($value);
                $attributes .= ' ' . $attr . '="' . $value . '"';
            }
        }

        $title = apply_filters('the_title', $item->title, $item->ID);

        $item_output = $args->before;
        $item_output .= '<a'. $attributes .'><i class="fa-solid fa-angles-right px-2 menu-icon"></i>';
        $item_output .= $args->link_before . $title . $args->link_after;
        $item_output .= '</a>';
        $item_output .= $args->after;

        $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
    }

    // End the element output.
    function end_el(&$output, $item, $depth = 0, $args = null) {
        $output .= "</li>\n";
    }
}

/**
 * Survey form submit ajax call
*/
add_action('wp_ajax_survey_submit_form_data', 'survey_submit_form_data');
add_action('wp_ajax_nopriv_survey_submit_form_data', 'survey_submit_form_data'); // Handle for non-logged-in users

function survey_submit_form_data() {
    // // Retrieve and sanitize form data
    // $name = sanitize_text_field($_POST['name']);
	// $user_id =
	// Example: Insert data into a custom table
	$site_url = site_url();
    global $wpdb;
	$prefix = $wpdb->prefix;
    $wp_servey_user_data = $prefix . 'servey_user_data';

	$last_user_id = $wpdb->get_var("SELECT user_id FROM $wp_servey_user_data ORDER BY user_id DESC LIMIT 1");
	$user_id = 1;

	if($last_user_id){
		$user_id = $last_user_id+1;
	}

	$form_id = sanitize_textarea_field($_POST['form_id']);

	$data = array();
	
    $data['rating'] = sanitize_textarea_field($_POST['rating']);
	$data['rating_q_id']= sanitize_textarea_field($_POST['rating_q_id']);
	$data['rating_q_type'] = sanitize_textarea_field($_POST['rating_q_type']);

	// echo "Hello: ".$data['rating'];
	// echo "Hello1: ".$data['rating_q_id'];
	// echo "Hello2: ".$data['rating_q_type'];
	
	
	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['rating_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['rating'],
		'question_type' => 'battery_experience',
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);
	// die;
    $data['batteryselect'] = sanitize_textarea_field($_POST['batteryselect']);
	$data['batteryselect_q_id'] = sanitize_textarea_field($_POST['batteryselect_q_id']);
	$data['batteryselect_q_type'] = sanitize_textarea_field($_POST['batteryselect_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['batteryselect_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['batteryselect'],
		'question_type' => $data['batteryselect_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['price'] = sanitize_textarea_field($_POST['price']);
	$data['price_q_id'] = sanitize_textarea_field($_POST['price_q_id']);
	$data['price_q_type'] = sanitize_textarea_field($_POST['price_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['price_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['price'],
		'question_type' => $data['price_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['aesthetics'] = sanitize_textarea_field($_POST['aesthetics']);
	$data['aesthetics_q_id'] = sanitize_textarea_field($_POST['aesthetics_q_id']);
	$data['aesthetics_q_type'] = sanitize_textarea_field($_POST['aesthetics_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['aesthetics_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['aesthetics'],
		'question_type' => $data['aesthetics_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['fitment'] = sanitize_textarea_field($_POST['fitment']);
	$data['fitment_q_id'] = sanitize_textarea_field($_POST['fitment_q_id']);
	$data['fitment_q_type'] = sanitize_textarea_field($_POST['fitment_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['fitment_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['fitment'],
		'question_type' => $data['fitment_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['performance'] = sanitize_textarea_field($_POST['performance']);
	$data['performance_q_id'] = sanitize_textarea_field($_POST['performance_q_id']);
	$data['performance_q_type'] = sanitize_textarea_field($_POST['performance_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['performance_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['performance'],
		'question_type' => $data['performance_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['warranty'] = sanitize_textarea_field($_POST['warranty']);
	$data['warranty_q_id'] = sanitize_textarea_field($_POST['warranty_q_id']);
	$data['warranty_q_type'] = sanitize_textarea_field($_POST['warranty_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['warranty_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['warranty'],
		'question_type' => $data['warranty_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['leadinfo'] = sanitize_textarea_field($_POST['leadinfo']);
	$data['leadinfo_q_id'] = sanitize_textarea_field($_POST['leadinfo_q_id']);
	$data['leadinfo_q_type'] = sanitize_textarea_field($_POST['leadinfo_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['leadinfo_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['leadinfo'],
		'question_type' => $data['leadinfo_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['yourname'] = sanitize_textarea_field($_POST['yourname']);
	$data['yourname_q_id'] = sanitize_textarea_field($_POST['yourname_q_id']);
	$data['yourname_q_type'] = sanitize_textarea_field($_POST['yourname_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['yourname_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['yourname'],
		'question_type' => $data['yourname_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['mobilenumber'] = sanitize_textarea_field($_POST['mobilenumber']);
	$data['mobilenumber_q_id'] = sanitize_textarea_field($_POST['mobilenumber_q_id']);
	$data['mobilenumber_q_type'] = sanitize_textarea_field($_POST['mobilenumber_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['mobilenumber_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['mobilenumber'],
		'question_type' => $data['mobilenumber_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['emailaddress'] = sanitize_textarea_field($_POST['emailaddress']);
	$data['emailaddress_q_id'] = sanitize_textarea_field($_POST['emailaddress_q_id']);
	$data['emailaddress_q_type'] = sanitize_textarea_field($_POST['emailaddress_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['emailaddress_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['emailaddress'],
		'question_type' => $data['emailaddress_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['yourbirthdate'] = sanitize_textarea_field($_POST['yourbirthdate']);
	$data['yourbirthdate_q_id'] = sanitize_textarea_field($_POST['yourbirthdate_q_id']);
	$data['yourbirthdate_q_type'] = sanitize_textarea_field($_POST['yourbirthdate_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['yourbirthdate_q_id'],
        'servey_id' => $form_id,
		'birthdate' => $data['yourbirthdate'],
		'question_type' => $data['yourbirthdate_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['anniversarydate'] = sanitize_textarea_field($_POST['anniversarydate']);
	$data['anniversarydate_q_id'] = sanitize_textarea_field($_POST['anniversarydate_q_id']);
	$data['anniversarydate_q_type'] = sanitize_textarea_field($_POST['anniversarydate_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['anniversarydate_q_id'],
        'servey_id' => $form_id,
		'anniversary_date' => $data['anniversarydate'],
		'question_type' => $data['anniversarydate_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['state'] = sanitize_textarea_field($_POST['state']);
	$data['state_q_id'] = sanitize_textarea_field($_POST['state_q_id']);
	$data['state_q_type'] = sanitize_textarea_field($_POST['state_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['state_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['state'],
		'question_type' => $data['state_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['city'] = sanitize_textarea_field($_POST['city']);
	$data['city_q_id'] = sanitize_textarea_field($_POST['city_q_id']);
	$data['city_q_type'] = sanitize_textarea_field($_POST['city_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['city_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['city'],
		'question_type' => $data['city_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['osat'] = sanitize_textarea_field($_POST['osat']);
	$data['osat_q_id'] = sanitize_textarea_field($_POST['osat_q_id']);
	$data['osat_q_type'] = sanitize_textarea_field($_POST['osat_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['osat_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['osat'],
		'question_type' => $data['osat_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);

	$data['comment'] = sanitize_textarea_field($_POST['comment']);
	$data['comment_q_id'] = sanitize_textarea_field($_POST['comment_q_id']);
	$data['comment_q_type'] = sanitize_textarea_field($_POST['comment_q_type']);

	$insert_data = array(
        'user_id' =>  sanitize_textarea_field($user_id),
        'question_id' => $data['comment_q_id'],
        'servey_id' => $form_id,
		'answer' => $data['comment'],
		'question_type' => $data['comment_q_type'],
    );
    $wpdb->insert($wp_servey_user_data, $insert_data);


    // Check for errors
    if ($wpdb->last_error) {
        // wp_send_json_error(array('message' => 'Data insertion failed: ' . $wpdb->last_error));
		$response = array('message' => 'Form data submitted failed');
    } else {
        // wp_send_json_success(array('message' => 'Data inserted successfully', 'insert_id' => $wpdb->insert_id));
		$response = array(
			'message' => 'Form data submitted successfully',
			'site_url' => $site_url
		);

		$recommend =  ($data['rating']) ? $data['rating']: '-';
		$battery =  ($data['batteryselect']) ? $data['batteryselect']: '-';
		$price =  ($data['price']) ? $data['price']: '-';
		$aesthetics =  ($data['aesthetics']) ? $data['aesthetics']: '-';
		$fitment =  ($data['fitment']) ? $data['fitment']: '-';
		$performance =  ($data['performance']) ? $data['performance']: '-';
		$warranty =  ($data['warranty']) ? $data['warranty']: '-';
		$source =  ($data['leadinfo']) ? $data['leadinfo']: '-';
		$name =  ($data['yourname']) ? $data['yourname']: '-';
		$mobile =  ($data['mobilenumber']) ? $data['mobilenumber']: '-';
		$email =  ($data['emailaddress']) ? $data['emailaddress']: '-';
		$birthdate =  ($data['yourbirthdate']) ? $data['yourbirthdate']: '-';
		$anniversary =  ($data['anniversarydate']) ? $data['anniversarydate']: '-';
		$state =  ($data['state']) ? $data['state']: '-';
		$city =  ($data['city']) ? $data['city']: '-';
		$satisfaction =  ($data['osat']) ? $data['osat']: '-';
		$comments =  ($data['comment']) ? $data['comment']: '-';

		$message = ($age >= 18) ? 'You are an adult.' : 'You are a minor.';


		// Email subject and body
		$subject = "New Survey Submission";
		$body = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body {
                    font-family: Arial, sans-serif;
                    margin: 0;
                    padding: 0;
                    background-color: #f4f4f4;
                }
                .container {
                    width: 100%;
                    padding: 20px;
                    background-color: #e0e0e0; /* Gray background for the entire email */
                    margin: 0 auto;
                }
                .content-wrapper {
                    background-color: #ffffff; /* White background for the content area */
                    padding: 20px;
                    margin: 0 auto;
                    max-width: 600px;
                    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .logo {
                    text-align: center;
                    margin-bottom: 20px;
                }
                .logo img {
                    max-width: 150px;
                }
                .content {
                    text-align: center;
                    margin: 0 auto;
                }
                .content h1 {
					color: #1e335e !important;
                }
                .content p {
                    color: #555555;
                    line-height: 1.5;
                    text-align: left;
					color: #1e335e !important;
                }
                .qa-section {
                    text-align: left;
                    margin-top: 20px;
                }
                .question {
                    font-weight: bold;
                    margin-top: 10px;
					color: #1e335e !important;
                }
                .answer {
                    margin-top: 5px;
                    margin-bottom: 15px;
                    padding-left: 20px;
                    border-left: 3px solid #db373c;
					color: #1e335e !important;
                }
                .footer {
                    text-align: center;
                    padding: 10px;
                    margin-top: 20px;
                    font-size: 12px;
                    color: #777777;
                }
                .footer a {
                    color: #777777;
                    text-decoration: none;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='content-wrapper'>
                    <div class='logo'>
                        <img src='http://170.187.248.145/solance/wp-content/uploads/2024/06/Mask-group.png' alt='Company Logo'>
                    </div>
                    <div class='content'>
                        <h1>New Customer Feedback Received</h1>
                        <p>Dear Admin,</p>
                        <p>We have received a new response to the survey. Below are the details provided by the user:</p>
                        <div class='qa-section'>
                            <div class='question'>Based on your recent Solance battery purchase experience, how likely are you to recommend Solance to your friends and family?</div>
                            <div class='answer'>$recommend</div>
                            <div class='question'>Which battery did you buy?</div>
                            <div class='answer'>$battery</div>
                            <div class='question'>Price</div>
                            <div class='answer'>$price</div>
                            <div class='question'>Aesthetics</div>
                            <div class='answer'>$aesthetics</div>
                            <div class='question'>Ease of fitment</div>
                            <div class='answer'>$fitment</div>
                            <div class='question'>Performance</div>
                            <div class='answer'>$performance</div>
                            <div class='question'>Warranty registration</div>
                            <div class='answer'>$warranty</div>
                            <div class='question'>How did you know about Solance?</div>
                            <div class='answer'>$source</div>
                            <div class='question'>Your Name</div>
                            <div class='answer'>$name</div>
                            <div class='question'>Mobile Number</div>
                            <div class='answer'>$mobile</div>
                            <div class='question'>Email Address</div>
                            <div class='answer'>$email</div>
                            <div class='question'>Birthdate</div>
                            <div class='answer'>$birthdate</div>
                            <div class='question'>Anniversary Date</div>
                            <div class='answer'>$anniversary</div>
                            <div class='question'>State</div>
                            <div class='answer'>$state</div>
                            <div class='question'>City</div>
                            <div class='answer'>$city</div>
                            <div class='question'>Overall, how satisfied are you with your purchase?</div>
                            <div class='answer'>$satisfaction</div>
                            <div class='question'>Please let us know your comments</div>
                            <div class='answer'>$comments</div>
                        </div>
                      
                    </div>
                    <div class='footer'>
                        <p>Copyright © Solance Industries. All Rights Reserved. Product by twoiq.</p>
                    </div>
                </div>
            </div>
        </body>
        </html>";
	
		// Recipient email
		$servey_mail_id = get_field('survey_email', 'options');
		$to = $servey_mail_id; 

        // Headers
        $headers = array(
            'Content-Type: text/html; charset=UTF-8'
        );
	
		// Send email
		wp_mail($to, $subject, $body, $headers);
		// if (mail($to, $subject, $body, $headers)) {
		// 	echo "Email successfully sent to $to.";
		// } else {
		// 	echo "Email sending failed.";
		// }
    }

    // // Optionally, send a response back to the AJAX request
    
    wp_send_json_success($response);

    // Always exit to avoid further execution
    wp_die();
}

add_action('wp_ajax_get_cities', 'get_cities');
add_action('wp_ajax_nopriv_get_cities', 'get_cities'); // Handle for non-logged-in users

function get_cities() {
    $state_date_id = sanitize_text_field($_POST['state_date_id']);
	global $wpdb;

    $prefix = $wpdb->prefix;

	// $wp_states = $prefix . 'states';
    // $states_query = "SELECT * FROM $wp_states";
    // $states_results = $wpdb->get_results($states_query);

	$wp_cities = $prefix . 'cities';
    $cities_query = "SELECT * FROM $wp_cities where `state_id`=$state_date_id";
    $cities_results = $wpdb->get_results($cities_query);

	$city = '<option value="" selected>Select City</option>';
	foreach ($cities_results as $key => $value) {
		$city_id = $value->id;
        $city_name = $value->city;
		$city .= '<option data-id="'.$city_id.'" value="'.$city_name.'"> '.$city_name.'</option>';
	}

	$city_arr = array();
	$city_arr[0] = $city;

    $cities = isset($city_arr) ? $city_arr : array();

    wp_send_json_success($cities);
    wp_die();
}


// Include custom function file
require_once get_template_directory() . '/functions/custom-functions.php';
// Add a custom menu page to the WordPress admin sidebar
function custom_admin_menu_page() {
    add_menu_page(
        'Survey',           // Page title
        'Survey Analytics',           // Menu title
        'manage_options',        // Capability required to access (admin-level access)
        'survey',           // Menu slug (unique identifier)
        'survey_callback',  // Callback function to render the menu page
        'dashicons-admin-generic', // Icon URL or dashicons class (optional)
        80                       // Menu position (below "Posts" menu)
    );

	add_menu_page(
        'Download PDF Form Data',           // Page title
        'Download PDF Form Data',           // Menu title
        'manage_options',        // Capability required to access (admin-level access)
        'download-pdf-form-data',           // Menu slug (unique identifier)
        'download_pdf_form_data_callback', 
        'dashicons-admin-generic', // Icon URL or dashicons class (optional)
        80                       // Menu position (below "Posts" menu)
    );

    add_submenu_page(
        'survey',           // Parent menu slug
        'Comments',              // Page title
        'Comments',              // Menu title
        'manage_options',        // Capability required to access
        'survey-comments',  // Menu slug (unique identifier)
        'survey_comments_callback' // Callback function to render the sub-menu page
    );
}
add_action('admin_menu', 'custom_admin_menu_page');

function custom_ngg_navigation_icons($output) {
    // Replace the default "Next" and "Previous" icons with custom ones

    // Replace the "Next" icon
    $output = str_replace('next', 'fa fa-arrow-right', $output); // Use Font Awesome or any other icon library

    // Replace the "Previous" icon
    $output = str_replace('prev', 'fa fa-arrow-left', $output); // Use Font Awesome or any other icon library

    return $output;
}
add_filter('ngg_render_template', 'custom_ngg_navigation_icons');








