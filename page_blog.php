<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
            
            <h5>Blog</h5>
				
			<?php $blog_cat_1 = get_option('agent_blog_cat_1'); $blog_cat_1_num = get_option('agent_blog_cat_1_num'); if(!$blog_cat_1) $blog_cat_1 = 1; //setting a default ?>
				
			<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("cat=".$blog_cat_1."&showposts=".$blog_cat_1_num."&paged=$page"); while ( have_posts() ) : the_post() ?>
            
			<h1><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></h1>
				
			<div class="date">
				<p><?php the_time('F j, Y'); ?> by <?php the_author_posts_link(); ?> &middot; <a href="<?php the_permalink(); ?>#respond"><?php comments_number('Leave a Comment', '1 Comment', '% Comments'); ?></a>&nbsp;<?php edit_post_link('(Edit)', '', ''); ?></p>
			</div>
				
			<?php the_content(__('[Read more]'));?><div style="clear:both;"></div>
				
			<div class="postmeta2">
				Tagged: <?php the_tags('') ?>
			</div>
							
			<?php endwhile; ?>
			
			<p><?php posts_nav_link(); ?></p>
		
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>