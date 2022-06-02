<?php

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function my_theme_enqueue_styles() {
    $parenthandle = 'twenty-twenty-one-style'; // This is 'twenty-twenty-one-style' for the Twenty Twenty-one theme.
    $theme = wp_get_theme();
    wp_enqueue_style( $parenthandle, get_template_directory_uri() . '/style.css', 
        array(),  // if the parent theme code has a dependency, copy it to here
        $theme->parent()->get('Version')
    );
    wp_enqueue_style( 'custom-style', get_stylesheet_uri(),
        array( $parenthandle ),
        $theme->get('Version') // this only works if you have Version in the style header
    );
}


/* Patents Post type start*/
function cw_post_type_patents() {
	$supports = array(
		'title', // post title
		'editor', // post content
		'custom-fields', // custom fields
		'page-attributes', // page-attributes
		'revisions', // post revisions
	);
	$labels = array(
		'name' => _x('patents', 'plural'),
		'singular_name' => _x('patents', 'singular'),
		'menu_name' => _x('Patents', 'admin menu'),
		'name_admin_bar' => _x('patents', 'admin bar'),
		'add_new' => _x('Add New', 'add new'),
		'add_new_item' => __('Add New Patent'),
		'new_item' => __('New patents'),
		'edit_item' => __('Edit patents'),
		'view_item' => __('View patents'),
		'all_items' => __('All patents'),
		'search_items' => __('Search patents'),
		'not_found' => __('No patents found.'),
	);
	$args = array(
		'supports' => $supports,
		'labels' => $labels,
		'public' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'patents'),
		'has_archive' => true,
		'hierarchical' => false,
		'taxonomies'  => array( 'category' ),
	);
	
	register_post_type('patents', $args);
}
add_action('init', 'cw_post_type_patents');
/*Custom Post type end*/

function dataCheck($data)
{
    if(empty($data))
    {
        $data = "No Data Available";
    }
    return $data;
}

function dataCheckPhone($data)
{
    if(empty($data))
    {
        $data = "No Data Available";
    }
    else
    {
        $data = '<a href="tel:' . $data .'">' . $data . '</a>';
    }
    return $data;
}

function dataCheckMail($data)
{
    if(empty($data))
    {
        $data = "No Data Available";
    }
    else
    {
        $data = '<a target="_blank" href="mailto:' . $data .'">' . $data . '</a>';
    }
    return $data;
}
?>