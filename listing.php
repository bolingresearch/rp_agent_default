<?php
/*
Single Post Template: Property Listing
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
                
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
			<h5>Featured Property</h5>
            
			<h1><?php the_title(); ?></h1>
			
			<div class="date">
				<p>Property Type: <?php the_category(', ') ?> &nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
			</div>
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div>
		 			
			<!--
			<?php trackback_rdf(); ?>
			-->
			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			
		</div>
		
		<div id="listing">
        
            <h4>Property Details</h4>
            
            <div class="listing-left">
    
                <p><b>Listing Price: &nbsp;</b><?php echo get_post_meta($post->ID, "_listing_price", true); ?></p>
                <p><b>Address: &nbsp;</b><?php echo get_post_meta($post->ID, "_address", true); ?></p>
                <p><b>City: &nbsp;</b><?php echo get_post_meta($post->ID, "_city", true); ?></p>
                <p><b>State: &nbsp;</b><?php echo get_post_meta($post->ID, "_state", true); ?></p>
                <p><b>Zip Code: &nbsp;</b><?php echo get_post_meta($post->ID, "_zip_code", true); ?></p>
                
            </div>
                
            <div class="listing-right">
    
                <p><b>MLS #: &nbsp;</b><?php echo get_post_meta($post->ID, "_mls", true); ?></p>
                <p><b>Square Feet: &nbsp;</b><?php echo get_post_meta($post->ID, "_square_feet", true); ?></p>
                <p><b>Bedrooms: &nbsp;</b><?php echo get_post_meta($post->ID, "_bedrooms", true); ?></p>
                <p><b>Bathrooms: &nbsp;</b><?php echo get_post_meta($post->ID, "_bathrooms", true); ?></p>
                <p><b>Basement: &nbsp;</b><?php echo get_post_meta($post->ID, "_basement", true); ?></p>
    
            </div>
           
            <div style="clear:both;"></div>
            
            <div class="listing-bottom">
                        
				<p><b>Listing Agent's Remarks: &nbsp;</b><?php echo get_post_meta($post->ID, "_additional_features", true); ?></p>
            
            </div>
            
		</div>
        
        <?php if( get_post_meta($post->ID, "_photo_1_large", true) ): ?>
      
            <div id="photos">
            
                <h4>Property Photos</h4>
                
					<?php if( get_post_meta($post->ID, "_photo_1_large", true) ): ?>
				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_1_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_1_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                                        
                    <?php if( get_post_meta($post->ID, "_photo_2_large", true) ): ?>
				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_2_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_2_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                    
                    <?php if( get_post_meta($post->ID, "_photo_3_large", true) ): ?>
				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_3_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_3_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                    
					<?php if( get_post_meta($post->ID, "_photo_4_large", true) ): ?>
				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_4_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_4_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                   	
					<?php if( get_post_meta($post->ID, "_photo_5_large", true) ): ?>                    
   				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_5_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_5_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                    
					<?php if( get_post_meta($post->ID, "_photo_6_large", true) ): ?>
				    <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_6_large", true); ?>" rel="lightbox" title="<?php the_title(); ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo get_post_meta($post->ID, "_photo_6_thumbnail", true); ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php the_title(); ?>" /></a>
                    <?php else: ?>
					<?php endif; ?>	
                           
			</div>
            
		<?php endif; ?>	
        		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>