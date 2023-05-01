//custom texonomy	

	function add_custom_taxonomies(){		 
		register_taxonomy('news_category',
		'news', array('hierarchical' => true,
		'label' => 'News Categories',
		'query_var' => true,
		'rewrite' => array( 
						'slug' => 'news-category' 
			)			   
		   ));
	}		
	add_action( 'init', 'add_custom_taxonomies', 0 );
	
	function custom_taxonomies(){		 
		register_taxonomy('news_tags',
		'news', array('hierarchical' => true,
		'label' => 'News Tags',
		'query_var' => true,
		'rewrite' => array( 
						'slug' => 'news-tags' 
			)			   
		   ));
	}		
	add_action( 'init', 'custom_taxonomies', 0 );