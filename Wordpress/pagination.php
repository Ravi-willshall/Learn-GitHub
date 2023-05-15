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