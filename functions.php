<?php
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page('Theme Settings');
	acf_add_options_page('Carousels');
}

// Register Theme Features
function connector_setup()  {
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'html5', array( 'search-form', 'gallery', 'caption' ) );
	add_image_size('stories_featured', 1100, 250, true);
}
add_action( 'after_setup_theme', 'connector_setup' );

function connector_styles() {
	wp_register_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css', false , '1.0.0' );
	wp_register_style( 'aos', '//unpkg.com/aos@2.3.1/dist/aos.css', false , '2.3.1' );
	wp_register_style( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', false , '1.8.1' );
	wp_register_style( 'style', get_stylesheet_uri(), false , '1.0.0' );
	wp_enqueue_style( 'slick' );
	wp_enqueue_style( 'aos' );
	wp_enqueue_style( 'bootstrap' );
	wp_enqueue_style( 'style' );
}
add_action( 'wp_enqueue_scripts', 'connector_styles' );

function connector_scripts() {
	wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', '//code.jquery.com/jquery-3.3.1.min.js', array(), '3.3.1', true );
	wp_register_script( 'three', '//cdnjs.cloudflare.com/ajax/libs/three.js/r71/three.min.js', array(), '71', true );
	wp_register_script( 'isotope', '//cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js', array(), '3.0.6', true );
	wp_register_script( 'packery', get_template_directory_uri() . '/js/packery.min.js', array(), '2.0.1', true );
	wp_register_script( 'slick', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array(), '1.8.1', true );
	wp_register_script( 'imagesloaded', '//cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js', array(), '4.1.4', true );
	wp_register_script( 'micromodal', '//unpkg.com/micromodal/dist/micromodal.min.js', array(), '1.0.0', true );
	wp_register_script( 'masonry', '//cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.js', array(), '4.2.2', true );
	wp_register_script( 'aos', '//unpkg.com/aos@next/dist/aos.js', array(), '2.3.1', true );
	wp_register_script( 'barba', '//cdnjs.cloudflare.com/ajax/libs/barba.js/1.0.0/barba.min.js', array(), '1.0.0', true );
	wp_register_script( 'main', get_template_directory_uri() . '/js/main.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'three' );
	wp_enqueue_script( 'isotope' );
	wp_enqueue_script( 'packery' );
	wp_enqueue_script( 'slick' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'micromodal' );
	wp_enqueue_script( 'masonry' );
	wp_enqueue_script( 'aos' );
	wp_enqueue_script( 'barba' );
	wp_enqueue_script( 'main' );
}
add_action( 'wp_enqueue_scripts', 'connector_scripts' );

// Register Custom Post Type
function connector_post_types() {

	$labels = array(
		'name'                  => _x( 'Portfolios', 'Post Type General Name', 'connector' ),
		'singular_name'         => _x( 'Portfolio', 'Post Type Singular Name', 'connector' ),
		'menu_name'             => __( 'Portfolio', 'connector' ),
		'name_admin_bar'        => __( 'Portfolio', 'connector' ),
		'archives'              => __( 'Item Archives', 'connector' ),
		'attributes'            => __( 'Item Attributes', 'connector' ),
		'parent_item_colon'     => __( 'Parent Item:', 'connector' ),
		'all_items'             => __( 'All Items', 'connector' ),
		'add_new_item'          => __( 'Add New Item', 'connector' ),
		'add_new'               => __( 'Add New', 'connector' ),
		'new_item'              => __( 'New Item', 'connector' ),
		'edit_item'             => __( 'Edit Item', 'connector' ),
		'update_item'           => __( 'Update Item', 'connector' ),
		'view_item'             => __( 'View Item', 'connector' ),
		'view_items'            => __( 'View Items', 'connector' ),
		'search_items'          => __( 'Search Item', 'connector' ),
		'not_found'             => __( 'Not found', 'connector' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'connector' ),
		'featured_image'        => __( 'Featured Image', 'connector' ),
		'set_featured_image'    => __( 'Set featured image', 'connector' ),
		'remove_featured_image' => __( 'Remove featured image', 'connector' ),
		'use_featured_image'    => __( 'Use as featured image', 'connector' ),
		'insert_into_item'      => __( 'Insert into item', 'connector' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'connector' ),
		'items_list'            => __( 'Items list', 'connector' ),
		'items_list_navigation' => __( 'Items list navigation', 'connector' ),
		'filter_items_list'     => __( 'Filter items list', 'connector' ),
	);
	$args = array(
		'label'                 => __( 'Portfolio', 'connector' ),
		'description'           => __( 'Portfolio entries', 'connector' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'taxonomies'            => array( 'portfolio_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'portfolio', $args );

	$labels = array(
		'name'                  => _x( 'Crew', 'Post Type General Name', 'connector' ),
		'singular_name'         => _x( 'Crew', 'Post Type Singular Name', 'connector' ),
		'menu_name'             => __( 'Crew', 'connector' ),
		'name_admin_bar'        => __( 'Crew', 'connector' ),
		'archives'              => __( 'Item Archives', 'connector' ),
		'attributes'            => __( 'Item Attributes', 'connector' ),
		'parent_item_colon'     => __( 'Parent Item:', 'connector' ),
		'all_items'             => __( 'All Items', 'connector' ),
		'add_new_item'          => __( 'Add New Item', 'connector' ),
		'add_new'               => __( 'Add New', 'connector' ),
		'new_item'              => __( 'New Item', 'connector' ),
		'edit_item'             => __( 'Edit Item', 'connector' ),
		'update_item'           => __( 'Update Item', 'connector' ),
		'view_item'             => __( 'View Item', 'connector' ),
		'view_items'            => __( 'View Items', 'connector' ),
		'search_items'          => __( 'Search Item', 'connector' ),
		'not_found'             => __( 'Not found', 'connector' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'connector' ),
		'featured_image'        => __( 'Featured Image', 'connector' ),
		'set_featured_image'    => __( 'Set featured image', 'connector' ),
		'remove_featured_image' => __( 'Remove featured image', 'connector' ),
		'use_featured_image'    => __( 'Use as featured image', 'connector' ),
		'insert_into_item'      => __( 'Insert into item', 'connector' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'connector' ),
		'items_list'            => __( 'Items list', 'connector' ),
		'items_list_navigation' => __( 'Items list navigation', 'connector' ),
		'filter_items_list'     => __( 'Filter items list', 'connector' ),
	);
	$args = array(
		'label'                 => __( 'Crew', 'connector' ),
		'description'           => __( 'Team members', 'connector' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-groups',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'crew', $args );

	$labels = array(
		'name'                  => _x( 'Careers', 'Post Type General Name', 'connector' ),
		'singular_name'         => _x( 'Career', 'Post Type Singular Name', 'connector' ),
		'menu_name'             => __( 'Careers', 'connector' ),
		'name_admin_bar'        => __( 'Careers', 'connector' ),
		'archives'              => __( 'Item Archives', 'connector' ),
		'attributes'            => __( 'Item Attributes', 'connector' ),
		'parent_item_colon'     => __( 'Parent Item:', 'connector' ),
		'all_items'             => __( 'All Items', 'connector' ),
		'add_new_item'          => __( 'Add New Item', 'connector' ),
		'add_new'               => __( 'Add New', 'connector' ),
		'new_item'              => __( 'New Item', 'connector' ),
		'edit_item'             => __( 'Edit Item', 'connector' ),
		'update_item'           => __( 'Update Item', 'connector' ),
		'view_item'             => __( 'View Item', 'connector' ),
		'view_items'            => __( 'View Items', 'connector' ),
		'search_items'          => __( 'Search Item', 'connector' ),
		'not_found'             => __( 'Not found', 'connector' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'connector' ),
		'featured_image'        => __( 'Featured Image', 'connector' ),
		'set_featured_image'    => __( 'Set featured image', 'connector' ),
		'remove_featured_image' => __( 'Remove featured image', 'connector' ),
		'use_featured_image'    => __( 'Use as featured image', 'connector' ),
		'insert_into_item'      => __( 'Insert into item', 'connector' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'connector' ),
		'items_list'            => __( 'Items list', 'connector' ),
		'items_list_navigation' => __( 'Items list navigation', 'connector' ),
		'filter_items_list'     => __( 'Filter items list', 'connector' ),
	);
	$args = array(
		'label'                 => __( 'Career', 'connector' ),
		'description'           => __( 'Job postings', 'connector' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-nametag',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'careers', $args );

	$labels = array(
		'name'                  => _x( 'Resources', 'Post Type General Name', 'connector' ),
		'singular_name'         => _x( 'Resource', 'Post Type Singular Name', 'connector' ),
		'menu_name'             => __( 'Resources', 'connector' ),
		'name_admin_bar'        => __( 'Resources', 'connector' ),
		'archives'              => __( 'Item Archives', 'connector' ),
		'attributes'            => __( 'Item Attributes', 'connector' ),
		'parent_item_colon'     => __( 'Parent Item:', 'connector' ),
		'all_items'             => __( 'All Items', 'connector' ),
		'add_new_item'          => __( 'Add New Item', 'connector' ),
		'add_new'               => __( 'Add New', 'connector' ),
		'new_item'              => __( 'New Item', 'connector' ),
		'edit_item'             => __( 'Edit Item', 'connector' ),
		'update_item'           => __( 'Update Item', 'connector' ),
		'view_item'             => __( 'View Item', 'connector' ),
		'view_items'            => __( 'View Items', 'connector' ),
		'search_items'          => __( 'Search Item', 'connector' ),
		'not_found'             => __( 'Not found', 'connector' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'connector' ),
		'featured_image'        => __( 'Featured Image', 'connector' ),
		'set_featured_image'    => __( 'Set featured image', 'connector' ),
		'remove_featured_image' => __( 'Remove featured image', 'connector' ),
		'use_featured_image'    => __( 'Use as featured image', 'connector' ),
		'insert_into_item'      => __( 'Insert into item', 'connector' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'connector' ),
		'items_list'            => __( 'Items list', 'connector' ),
		'items_list_navigation' => __( 'Items list navigation', 'connector' ),
		'filter_items_list'     => __( 'Filter items list', 'connector' ),
	);
	$args = array(
		'label'                 => __( 'Resources', 'connector' ),
		'description'           => __( 'Resources entries', 'connector' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'resources_category' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-layout',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'resources', $args );

}
add_action( 'init', 'connector_post_types', 0 );

// Register Custom Taxonomy
function connector_taxonomies() {

	$labels = array(
		'name'                       => _x( 'Portfolio Categories', 'Taxonomy General Name', 'connector' ),
		'singular_name'              => _x( 'Portfolio Category', 'Taxonomy Singular Name', 'connector' ),
		'menu_name'                  => __( 'Category', 'connector' ),
		'all_items'                  => __( 'All Items', 'connector' ),
		'parent_item'                => __( 'Parent Item', 'connector' ),
		'parent_item_colon'          => __( 'Parent Item:', 'connector' ),
		'new_item_name'              => __( 'New Item Name', 'connector' ),
		'add_new_item'               => __( 'Add New Item', 'connector' ),
		'edit_item'                  => __( 'Edit Item', 'connector' ),
		'update_item'                => __( 'Update Item', 'connector' ),
		'view_item'                  => __( 'View Item', 'connector' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'connector' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'connector' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'connector' ),
		'popular_items'              => __( 'Popular Items', 'connector' ),
		'search_items'               => __( 'Search Items', 'connector' ),
		'not_found'                  => __( 'Not Found', 'connector' ),
		'no_terms'                   => __( 'No items', 'connector' ),
		'items_list'                 => __( 'Items list', 'connector' ),
		'items_list_navigation'      => __( 'Items list navigation', 'connector' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'portfolio_category', array( 'portfolio' ), $args );

	$labels = array(
		'name'                       => _x( 'Resources Categories', 'Taxonomy General Name', 'connector' ),
		'singular_name'              => _x( 'Resources Category', 'Taxonomy Singular Name', 'connector' ),
		'menu_name'                  => __( 'Category', 'connector' ),
		'all_items'                  => __( 'All Items', 'connector' ),
		'parent_item'                => __( 'Parent Item', 'connector' ),
		'parent_item_colon'          => __( 'Parent Item:', 'connector' ),
		'new_item_name'              => __( 'New Item Name', 'connector' ),
		'add_new_item'               => __( 'Add New Item', 'connector' ),
		'edit_item'                  => __( 'Edit Item', 'connector' ),
		'update_item'                => __( 'Update Item', 'connector' ),
		'view_item'                  => __( 'View Item', 'connector' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'connector' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'connector' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'connector' ),
		'popular_items'              => __( 'Popular Items', 'connector' ),
		'search_items'               => __( 'Search Items', 'connector' ),
		'not_found'                  => __( 'Not Found', 'connector' ),
		'no_terms'                   => __( 'No items', 'connector' ),
		'items_list'                 => __( 'Items list', 'connector' ),
		'items_list_navigation'      => __( 'Items list navigation', 'connector' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => false,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => false,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'resources_category', array( 'resources' ), $args );

}
add_action( 'init', 'connector_taxonomies', 0 );

// Optimizations
add_filter('xmlrpc_enabled', '__return_false');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head');
remove_action('wp_head', 'feed_links_extra', 3 );
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');
remove_action('wp_head', 'wp_generator');
add_filter('the_generator', '__return_false');
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles' );
remove_action('wp_head', 'rest_output_link_wp_head', 10);
add_filter('show_admin_bar','__return_false');
add_filter('json_enabled', '__return_false');
add_filter('json_jsonp_enabled', '__return_false');
add_action('do_feed', '__return_false', 1);
add_action('do_feed_rdf', '__return_false', 1);
add_action('do_feed_rss', '__return_false', 1);
add_action('do_feed_rss2', '__return_false', 1);
add_action('do_feed_atom', '__return_false', 1);
add_action('do_feed_rss2_comments', '__return_false', 1);
add_action('do_feed_atom_comments', '__return_false', 1);


// Register Navigation Menus
function connector_nav_menu() {

	$locations = array(
		'Main Menu' => __( 'Menu shown on top', 'connector' ),
		'Footer Menu' => __( 'Menu shown on footer', 'connector' ),
		'Bottom Menu' => __( 'Menu shown below footer', 'connector' ),
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'connector_nav_menu' );

/*
function custom_excerpt_length( $length ) {
	return 25;
  }
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
*/

function cc_mime_types($mimes) {
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter('upload_mimes', 'cc_mime_types');
?>
