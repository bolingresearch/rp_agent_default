<!-- begin sidebar -->

<div id="sidebar">
    	
	<ul id="sidebarwidgeted">
        
        <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Sidebar Top') ) : ?>
        
   		<!--To exclude certain categories from this drop down menu, your code should look like 'hierarchical=1&exclude=1,2,3' where 1, 2 and 3 are the category ID's that you want to exclude.-->  
        
            <li id="quick-search">
                <div class="widget">
                    <h2>Quick Search</h2>    
                    <?php $RPTheme->quick_search_form(); ?>
                    <script type="text/javascript"><!--
                        var dropdown = document.getElementById("cat");
                        function onCatChange() {
                            if ( dropdown.options[dropdown.selectedIndex].value > 0 ) {
                                location.href = "<?php echo get_option('home');
                    ?>/?cat="+dropdown.options[dropdown.selectedIndex].value;
                            }
                        }
                        dropdown.onchange = onCatChange;
                    --></script> 
                </div>
            </li>
        			
   		<!--To specify the destination URL of the Read More... link in the sidebar, repalce # with the URL that you want the link to go to.-->
        
            <li id="recent-posts">
              <div class="widget">
                <h2>Recent Posts</h2>
                <ul>
                  <?php wp_get_archives('type=postbypost&limit=7'); ?>
                </ul>
              </div>
            </li>
            
        <?php endif; ?>
        
	</ul>

	<?php include(TEMPLATEPATH."/sidebar_left.php");?>
	
	<?php include(TEMPLATEPATH."/sidebar_right.php");?>
	
</div>

<!-- end sidebar -->