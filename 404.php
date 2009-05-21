<?php get_header(); ?>

<div id="content">

	<div id="contentleft">
	
		<div class="postarea">
						
			<h1>Not Found, Error 404</h1>
            
			<p>The page you are looking for no longer exists. Perhaps you can find what you are looking for by searching the site archives by page, month, category or post:</p>
				
				<div class="archive">
		
					<h5>By Page:</h5>
						<ul>
							<?php wp_list_pages('title_li='); ?>
						</ul>
				
					<h5>By Month:</h5>
						<ul>
							<?php wp_get_archives('type=monthly'); ?>
						</ul>
							
					<h5>By Category:</h5>
						<ul>
							<?php wp_list_categories('sort_column=name&title_li='); ?>
						</ul>
		
				</div>
				
				<div class="archive">
					
					<h5>By Post:</h5>
						<ul>
                            <?php wp_get_archives('type=postbypost&limit=50'); ?> 
						</ul>
				</div>
							
		</div>
		
	</div>
	
<?php include(TEMPLATEPATH."/sidebar.php");?>
		
</div>

<!-- The main column ends  -->

<?php get_footer(); ?>