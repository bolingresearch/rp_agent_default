<!-- begin sidebar -->

<div id="sidebar">

	<ul id="sidebarwidgeted">
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Top') ) : ?>
        
            <li id="recent-posts">
                <div class="widget">
                    <h2>Recent Properties</h2>
                        <ul>
                            <?php wp_get_archives('type=postbypost&limit=5'); ?> 
                        </ul>
                </div>
            </li>
            
    		<li id="agent-list">
                <div class="widget">
                    <h2>Agents</h2>
						<ul>
							<?php wp_list_authors('exclude_admin=0&hide_empty=1&show_fullname=1&optioncount=0'); ?>
						</ul>                        
                </div>
            </li>
                        
        <?php endif; ?>
        
	</ul>

	<?php include(TEMPLATEPATH."/sidebar_left.php");?>
	
	<?php include(TEMPLATEPATH."/sidebar_right.php");?>
	
</div>

<!-- end sidebar -->
