<?php
	
	get_template_part('meta');
	
    add_action('init','register_my_menus');
    function register_my_menus() {
            register_nav_menus(
                    array(
                            'primary-menu' => __( 'Primary Menu' ),
                            'secondary-menu' => __( 'Secondary Menu' ),
                            'tertiary-menu' => __( 'Tertiary Menu' ),
                            'for-menu' => __( 'For Menu' )
                    )
            );
    }


add_theme_support('post-thumbnails');
set_post_thumbnail_size(333, 190, true);

if ( function_exists( 'add_theme_support' ) ) { 
  add_theme_support( 'post-thumbnails' ); 
}

	
if(function_exists('register_sidebar')){ 

	register_sidebar(array(
		'name' => __( 'Homepage Video', 'homevideo' ),
		'id' => 'homevideo',
		'before_widget' => '<div class="right_vedio">',
		'after_widget' => '</div>',
	    'before_title' => '<h2>',
	    'after_title' => '</h2>', 
            ));
			
}
function new_excerpt($charlength) {
$excerpt = get_the_content();
$charlength++;
if(strlen($excerpt)>$charlength) {
$subex = substr($excerpt,0,$charlength-1);
$exwords = explode(" ",$subex);
$excut = -(strlen($exwords[count($exwords)-1]));
if($excut<0) {
echo substr($subex,0,$excut);
} else {
echo $subex;
}
echo "...";
} else {
echo $excerpt;
}
}





include('meta-box.php');




// Service Post type

add_action('init', 'project_register');

function project_register() {

	$labels = array(
		'name' => _x('Projects', 'post type general name'),
		'singular_name' => _x('Projects', 'post type singular name'),
		'add_new' => _x('Add New', 'projects'),
		'add_new_item' => __('Add New Project'),
		'edit_item' => __('Edit Project'),
		'new_item' => __('New Project'),
		'view_item' => __('View Project'),
		'search_items' => __('Search Project'),
		'not_found' =>  __('Nothing found'),
		'not_found_in_trash' => __('Nothing found in Trash'),
		'parent_item_colon' => ''
	);

	$args = array(
		'labels' => $labels,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'query_var' => true,
		'menu_icon' => null,
		'rewrite' => true,
		'capability_type' => 'post',
		'hierarchical' => false,
		'menu_position' => null,
		'supports' => array('title','editor','thumbnail')
	  ); 

	register_post_type( 'project' , $args );
}

// Custom Taxonomy

function add_projectcat_taxonomies() {

	register_taxonomy('projectcat', 'project', array(
		// Hierarchical taxonomy (like categories)
		'hierarchical' => true,
		// This array of options controls the labels displayed in the WordPress Admin UI
		'labels' => array(
			'name' => _x( 'Project Category', 'taxonomy general name' ),
			'singular_name' => _x( 'Project Category', 'taxonomy singular name' ),
			'search_items' =>  __( 'Search Project Categories' ),
			'all_items' => __( 'All Project Categories' ),
			'parent_item' => __( 'Parent Project Category' ),
			'parent_item_colon' => __( 'Parent Project Category:' ),
			'edit_item' => __( 'Edit Project Category' ),
			'update_item' => __( 'Update Project Category' ),
			'add_new_item' => __( 'Add New Project Category' ),
			'new_item_name' => __( 'New Project Category Name' ),
			'menu_name' => __( 'Project Categories' ),
		),

		// Control the slugs used for this taxonomy
		'rewrite' => array(
			'slug' => 'projectcat', // This controls the base slug that will display before each term
			'with_front' => false, // Don't display the category base before "/locations/"
			'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
		),
		
		
	));
}
add_action( 'init', 'add_projectcat_taxonomies', 0 );


// Block Access to /wp-admin for non admins.
function custom_blockusers_init() {
  $referrer = $_SERVER['HTTP_REFERER'];
  $admin_url =  home_url().'/wp-login.php';
  if ( is_user_logged_in() && is_admin() && !current_user_can( 'administrator' )  && ( $referrer != $admin_url ) ) {
    wp_redirect( home_url() );
    exit;
  }
}
add_action( 'init', 'custom_blockusers_init' ); // Hook into 'init'


add_action( 'wp_login_failed', 'pippin_login_fail' );  // hook failed login
function pippin_login_fail( $username ) {
     $referrer = $_SERVER['HTTP_REFERER'];  // where did the post submission come from?
     // if there's a valid referrer, and it's not the default log-in screen
     if ( !empty($referrer) && !strstr($referrer,'wp-login') && !strstr($referrer,'wp-admin') ) {
          wp_redirect(home_url() . '/?login=failed' );  // let's append some information (login=failed) to the URL for the theme to use
          exit;
     }
}

