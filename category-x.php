<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
        
        	<h5><?php single_cat_title(); ?></h5>
            
			<!--Replace cat=1 with the Category ID you want to display in this section.-->
        				
				<?php $recent = new WP_Query("cat=1&showposts=5"); while($recent->have_posts()) : $recent->the_post();?>
                                
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