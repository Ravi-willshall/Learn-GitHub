<!-- This code will add on template file (index.php) file -->

<div class="container">
   
   <div class="post-card" id="posts">	  
     <?php	
         $paged = get_query_var('paged') ? get_query_var( 'paged' ): 1;
         $args = array(
             'posts_per_page' => 6,
             'post_type'=>'post',
             'paged'=> $paged,				
             'post_status'=>'publish'																
         );
         $query = new Wp_Query($args);	
         if( $query->have_posts()){		
             while($query->have_posts()){ 
             $query->the_post();					
                 
              $post_id = get_the_ID();
                 $category_object = get_the_category($post_id);
                 $category_name = $category_object[0]->name;					
     ?>			
             <div class="card-col">
                <a class="card-col-link" href="#">
                  <div class="card-image">
                     <?php the_post_thumbnail();?>					
                      <img src="/wp-content/uploads/2023/05/card-img.jpg">				 
                  </div>
                  <div class="card-content">				 
                      <div class="preheading"><?php echo $category_name;?></div>
                      <h3 class="card-heading"><?php the_title();?></h3>
                      <div class="card-body">
                         <p><?php echo the_excerpt();?></p>
                      </div>				 
                  </div>
                  </a>
                <a class="read-more-btn" href="<?php the_permalink(); ?>">Read the case study</a>
             </div>					
         <?php 
             }				
         }
          wp_reset_postdata();
         ?>				
   </div>
   
   <button id="load_more">Load More</button>
   
</div>
<!-- This code will add on function.php file  -->

add_action( 'wp_footer', 'my_action_javascript' ); // Write our JS below here

function my_action_javascript() { ?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {

		var page = 6;
		jQuery('#load_more').click(function(){
			
			var ajaxurl = "<?php echo admin_url('admin-ajax.php'); ?>";
			var data = {
				'action': 'my_action',
				'page': page
			};

			// since 2.8 ajaxurl is always defined in the admin header and points to admin-ajax.php
			jQuery.post(ajaxurl, data, function(response) {
				
				jQuery('#posts').append(response);
				 
				 page++;
				
			});
		
		});
		
	});
	</script> <?php
}

add_action( 'wp_ajax_my_action', 'my_action' );

function my_action() {
	$paged = get_query_var('paged') ? get_query_var( 'paged' ): 1;			
	$args = array(
		'posts_per_page' => 6,
		'post_type'=>'post',
		'paged'=> $paged,
		'post_status'=>'publish'																
);
	
	$query = new Wp_Query($args);	
	if( $query->have_posts()){		
		while($query->have_posts()){ 
		$query->the_post();					
			
		 $post_id = get_the_ID();
			$category_object = get_the_category($post_id);
			$category_name = $category_object[0]->name;					
?>			
		<div class="card-col">
		   <a class="card-col-link" href="#">
			 <div class="card-image">
				<?php the_post_thumbnail();?>					
				 <img src="/wp-content/uploads/2023/05/card-img.jpg">				 
			 </div>
			 <div class="card-content">				 
				 <div class="preheading"><?php echo $category_name;?></div>
				 <h3 class="card-heading"><?php the_title();?></h3>
				 <div class="card-body">
					<p><?php echo the_excerpt();?></p>
				 </div>				 
			 </div>
			 </a>
		   <a class="read-more-btn" href="<?php the_permalink(); ?>">Read the case study</a>
		</div>
		
	<?php 
		}				
	}
	 wp_reset_postdata();
		
	wp_die(); // this is required to terminate immediately and return a proper response
}