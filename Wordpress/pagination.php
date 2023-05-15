<?php	
		    // WP QUERY
			$paged = (get_query_var('page')) ? get_query_var('page') : 1;
			$args = array(
				'posts_per_page' => 6,
				'post_type'=>'post',
				'paged'=> $paged,				
				'post_status'=>'publish'																
			);
			$query = new Wp_Query($args);
           
            //Create a Loop
            if( $query->have_posts()){		
				while($query->have_posts()){ 
				$query->the_post();										
				    $post_id = get_the_ID();
						$category_object = get_the_category($post_id);
						$category_name = $category_object[0]->name;					
		?>	