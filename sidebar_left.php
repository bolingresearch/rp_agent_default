<!-- begin l_sidebar -->

<div id="l_sidebar">

	<ul id="l_sidebarwidgeted">
	
		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Bottom Left') ) : ?>
        
            <li id="categories">
                <div class="widget">
                    <h2>Categories</h2>
                        <ul>
                            <?php wp_list_categories('orderby=name&title_li=&depth=2'); ?>
                        </ul>
                </div>
            </li>
        
            <li id="archives">
                <div class="widget">
                    <h2>Archives</h2>
                        <ul>
                            <?php wp_get_archives('type=monthly'); ?>
                        </ul>
                </div>
            </li>
            
        <?php endif; ?>
	
	</ul>
	
</div>

<!-- end l_sidebar -->