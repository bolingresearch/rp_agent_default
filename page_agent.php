<?php
/*
Template Name: Agent 
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
                        
            <h5>Agent Page</h5>
        				
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			
			 
               <?php 
               global $authordata;
               $agent=$authordata->ID;
               ?>
			
			<div class="author">
			
                    <p><img style="float:left;margin:0px 10px 10px 0px;" src="<?php bloginfo('template_url'); ?>/images/agents/<?php the_author_ID()?>.jpg" alt="<?php the_author(); ?>" title="<?php the_author(); ?>" />
                    <b><?php the_author_nickname(); ?></b><br />
                    <?php the_author_description(); ?></p>					
                    
			</div>
            												
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
            
            <div style="clear:both;"></div>
            
            <h5>My Listings</h5>
            
			<!--The author page template is currently set to show 5 posts.  Change showposts=5 to whatever number of posts you want to display.-->
			<!--Replace cat=1 with the Category ID you want to display in this section.-->
                      
              <?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("author=$agent&showposts=5&paged=$page"); while ( have_posts() ) : the_post() ?>
                   
				<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php if( get_post_meta($post->ID, "thumbnail", true) ): ?>
				    <a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;" src="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>
				   	<a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;"src="<?php bloginfo('template_url'); ?>/images/thumbnail.png" alt="<?php the_title(); ?>" /></a>
                                        
				<?php endif; ?>	
                
                <?php the_content_limit(400, "[Read more about this property]"); ?><div style="clear:both;"></div>
                
                <div style="border-bottom:1px dotted #BBBBBB; margin-bottom:10px; padding:0px 0px 0px 0px; clear:both;"></div>

				<?php endwhile; ?>
                
                <p><?php posts_nav_link(); ?></p>
			
		</div>
				
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>
