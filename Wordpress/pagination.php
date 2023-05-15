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
        <!-- Display post content here-->
<div class="card-col"> 
	 <div class="card-image">
		<?php the_post_thumbnail();?>					
		 <img src="/wp-content/uploads/2023/05/card-img.jpg">				 
	 </div>			 
		<?php echo $category_name;?>
		<?php the_title();?>		 
		<?php echo the_excerpt();?>
					 	
   <a class="read-more-btn" href="<?php the_permalink(); ?>">Read the case study</a>
</div>
<?php 
				}				
			}?>
			<div class="pagination_sec">
				<?php
					$big = 999999999; // need an unlikely integer
					 echo paginate_links( array(
						'base' => str_replace( $big, '%#%', esc_url(get_pagenum_link( $big ) )),
						'format' => '?paged=%#%',
						'current' => max( 1, get_query_var('page') ),
						'total' => $query->max_num_pages,
						'prev_text'    => __('«'),
						'next_text'    => __('»'),
					) );
				?>
			</div>
			<?php
			 wp_reset_postdata();
			?>
