<!-- begin footer -->

<div style="clear:both;"></div>

<div id="footer">

	<div class="footerleft">
		<p>Copyright &copy; 2009 <a href="<?php echo get_settings('home'); ?>/"><?php bloginfo('name'); ?></a> &middot; <a href="http://www.bolingresearch.com" >Boling Research</a></p>
	</div>
	
	<div class="footerright">
		<p><a href="http://tehamacountyliving.com">Get a Blog</a> &middot; <a href="http://realtypress.org">RealtyPress</a> &middot; <?php wp_loginout(); ?> </p>
	</div>
	
</div>

<div id="bottom">
	<img src="<?php bloginfo('template_url'); ?>/images/bottom.gif" alt="<?php bloginfo('name'); ?>" />
</div>

<?php do_action('wp_footer'); ?>

</div>

</body>
</html>