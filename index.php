<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
            	
			<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            
            <h5><?php the_category(', ') ?></h5>
            
			<h1><?php the_title(); ?></h1>
			
			<div class="date">
				<p><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
			</div>
		
			<?php the_content(__('Read more'));?><div style="clear:both;"></div>
			
			<div class="postmeta">
				Tagged: <?php the_tags('') ?>
			</div>
		 			
			<!--
			<?php trackback_rdf(); ?>
			-->
			
			<?php endwhile; else: ?>
			
			<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>
			
		</div>
		
		<!--To define the 468x60 ad, go to your WP dashboard and go to Appearance > Widgets. Select 468x60 Post Banner and then enter your add code into a text widget-->
                
        <div class="postwidget">
			<ul id="postwidgeted">
				<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('468x60 Post Banner') ) : ?>  
					<li><a href="#"><img src="<?php bloginfo('template_url'); ?>/images/468x60.gif" alt="WordPress" /></a></li>
                <?php endif; ?>
            </ul>
        </div>
			
		<div class="comments">
	
			<?php comments_template('',true); ?>
			
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>