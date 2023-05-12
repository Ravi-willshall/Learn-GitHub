<!--This code will add on template file (index.php) file -->

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