<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
        
			<?php if (is_category()) { ?>
            <h5><?php single_cat_title(); ?></h5>
            <?php } elseif (is_month()) { ?>
            <h5><?php the_time('F Y'); ?></h5>
            <?php } ?>
        				
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			
			<div class="date">
				<p><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
			</div>
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div>
			
			<div class="postmeta2">
				Tagged: <?php the_tags('') ?>
			</div>
			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			<p><?php posts_nav_link(' &#8212; ', __('&laquo; Previous Page'), __('Next Page &raquo;')); ?></p>
			
		</div>
				
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>