//custom post type 
		 				
	add_action( 'init', 'create_custom_post' );

	function create_custom_post() {
		
		$supports = array(
			'title', // post title
			'editor', // post content
			'author', // post author
			'thumbnail', // featured images
			'excerpt', // post excerpt
			'custom-fields', // custom fields
			'comments', // post comments
			'revisions', // post revisions
			'post-formats', // post formats
		);
		
					
		$labels = array(
			'name' => _x('News', 'plural'),
			'singular_name' => _x('News', 'singular'),
			'menu_name' => _x('News', 'admin menu'),
			'name_admin_bar' => _x('News', 'admin bar'),
			'add_new' => _x('Add New', 'add new'),
			'add_new_item' => __('Add New News'),
			'new_item' => __('New News'),
			'edit_item' => __('Edit News'),
			'view_item' => __('View News'),
			'all_items' => __('All News'),
			'search_items' => __('Search News'),
			'not_found' => __('No News found.'),
		);
		 
		$args = array(
			'supports' => $supports,
			'labels' => $labels,
			'description' => 'Holds our News and specific data',
			'public' => true,				
			'show_ui' => true,
			'show_in_menu' => true,
			'show_in_nav_menus' => true,
			'show_in_admin_bar' => true,
			'can_export' => true,
			'capability_type' => 'post',
			'show_in_rest' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'news'),
			'has_archive' => true,
			'hierarchical' => true,
			'menu_position' => 5,
			 
		);			 
		register_post_type( 'news',$args);
		
	}