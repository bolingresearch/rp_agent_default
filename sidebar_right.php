<!-- begin r_sidebar -->

<div id="r_sidebar">

	<ul id="r_sidebarwidgeted">
	
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Bottom Right') ) : ?>
        
            <li id="links">
                <div class="widget">
                    <h2>Links</h2>
						<ul>
							<?php wp_list_bookmarks('title_li=&categorize=0'); ?>
                        </ul>
				</div>
            </li>
        
            <li id="meta">
                <div class="widget">
                    <h2>Admin</h2>
                        <ul>
                            <?php wp_register(); ?>
                            <li><?php wp_loginout(); ?></li>
                            <li><a href="http://www.wordpress.org/">WordPress</a></li>
                            <?php wp_meta(); ?>
                            <li><a href="http://validator.w3.org/check?uri=referer">XHTML</a></li>
                        </ul>
                </div>
            </li>
    
        <?php endif; ?>

	</ul>
	
</div>

<!-- end r_sidebar -->