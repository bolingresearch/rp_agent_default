<?php
/*
Template Name: Multi-Agent
*/
?>

<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
                        
            <h5>Multi-Agent Page</h5>
            
            <div class="author">
		
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("author=1&showposts=1"); while ( have_posts() ) : the_post() ?>			
                <p><img style="float:left;margin:0px 10px 10px 0px;" src="<?php bloginfo('template_url'); ?>/images/agents/<?php the_author_ID()?>.jpg" alt="<?php the_author(); ?>" title="<?php the_author(); ?>" />
                <b><?php the_author_posts_link(); ?></b><br />
                <?php the_author_description(); ?><br /><b>Visit my agent page at <?php the_author_posts_link(); ?></b></p>	
                        
                <div style="border-bottom:1px dotted #BBBBBB; margin-top: 5px; clear:both;"></div>
    
                <?php endwhile; ?>	
                    
            </div>
            
            <div class="author">
		
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("author=2&showposts=1"); while ( have_posts() ) : the_post() ?>			
                <p><img style="float:left;margin:0px 10px 10px 0px;" src="<?php bloginfo('template_url'); ?>/images/agents/<?php the_author_ID()?>.jpg" alt="<?php the_author(); ?>" title="<?php the_author(); ?>" />
                <b><?php the_author_posts_link(); ?></b><br />
                <?php the_author_description(); ?><br /><b>Visit my agent page at <?php the_author_posts_link(); ?></b></p>	
                        
                <div style="border-bottom:1px dotted #BBBBBB; margin-bottom:10px; padding:0px 0px 0px 0px; clear:both;"></div>
    
                <?php endwhile; ?>	
                    
            </div>
            
            <div class="author">
		
				<?php $page = (get_query_var('paged')) ? get_query_var('paged') : 1; query_posts("author=3&showposts=1"); while ( have_posts() ) : the_post() ?>			
                <p><img style="float:left;margin:0px 10px 10px 0px;" src="<?php bloginfo('template_url'); ?>/images/agents/<?php the_author_ID()?>.jpg" alt="<?php the_author(); ?>" title="<?php the_author(); ?>" />
                <b><?php the_author_posts_link(); ?></b><br />
                <?php the_author_description(); ?><br /><b>Visit my agent page at <?php the_author_posts_link(); ?></b></p>	
                        
                <div style="border-bottom:1px dotted #BBBBBB; margin-bottom:10px; padding:0px 0px 0px 0px; clear:both;"></div>
    
                <?php endwhile; ?>	
                    
            </div>

		</div>
				
	</div>
	
<?php include(TEMPLATEPATH."/sidebar_multiagent.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>