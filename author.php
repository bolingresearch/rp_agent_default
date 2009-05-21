<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
        
			<?php $recent = new WP_Query("showposts=1"); while($recent->have_posts()) : $recent->the_post();?>
                
			<h5>Agent Page</h5>
		
				<?php $curauth = (get_query_var('author_name')) ? get_userdatabylogin(get_query_var('author_name')) : get_userdata(intval(get_query_var('author'))); ?>
		   
                <div class="author">
                    <p><?php if(file_exists(TEMPLATEPATH.'/images/agents/'.$curauth->ID.'.jpg')) : ?>
                    <img style="float:left;margin:0px 10px 10px 0px;" src="<?php bloginfo('template_url'); ?>/images/agents/<?php echo $curauth->ID; ?>.jpg" alt="<?php echo $curauth->display_name; ?>" title="<?php echo $curauth->display_name; ?>" />
                    <?php endif; ?>
                    <b><?php echo $curauth->display_name; ?></b><br />
                    <?php echo $curauth->description; ?></p>
                </div>
                
                <div style="clear:both;"></div>
                
                <?php endwhile; ?>
            
            <h5>My Posts/Listings</h5>
            
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                
				<h3><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				
				<?php if( get_post_meta($post->ID, "thumbnail", true) ): ?>
				    <a href="<?php the_permalink() ?>" rel="bookmark"><img style="float:left;margin:0px 10px 0px 0px;" src="<?php echo get_post_meta($post->ID, "thumbnail", true); ?>" alt="<?php the_title(); ?>" /></a>
				<?php else: ?>                          
				<?php endif; ?>	
                
                <?php the_content_limit(400, "[Read more]"); ?><div style="clear:both;"></div>
                
                <div style="border-bottom:1px dotted #BBBBBB; margin-bottom:10px; padding:0px 0px 0px 0px; clear:both;"></div>
                
				<?php endwhile; ?>
                
               	<?php endif; ?>
                <p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
            			
		</div>
				
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>