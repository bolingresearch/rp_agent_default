<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">

<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="distribution" content="global" />
<meta name="robots" content="follow, all" />
<meta name="language" content="en" />

<title><?php global $listing; if(isset($listing)) { echo $listing->street_num." ".$listing->street_name; } else { wp_title(''); } ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>
<link rel="Shortcut Icon" href="<?php echo bloginfo('template_url'); ?>/images/favicon.ico" type="image/x-icon" />

<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="alternate" type="application/atom+xml" title="<?php bloginfo('name'); ?> Atom Feed" href="<?php bloginfo('atom_url'); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<?php wp_head(); ?>

<script type="text/javascript"><!--//--><![CDATA[//><!--
sfHover = function() {
	if (!document.getElementsByTagName) return false;
	var sfEls = document.getElementById("nav").getElementsByTagName("li");

	// if you only have one main menu - delete the line below //
	var sfEls1 = document.getElementById("subnav").getElementsByTagName("li");
	//

	for (var i=0; i<sfEls.length; i++) {
		sfEls[i].onmouseover=function() {
			this.className+=" sfhover";
		}
		sfEls[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover\\b"), "");
		}
	}

	// if you only have one main menu - delete the "for" loop below //
	for (var i=0; i<sfEls1.length; i++) {
		sfEls1[i].onmouseover=function() {
			this.className+=" sfhover1";
		}
		sfEls1[i].onmouseout=function() {
			this.className=this.className.replace(new RegExp(" sfhover1\\b"), "");
		}
	}
	//

}
if (window.attachEvent) window.attachEvent("onload", sfHover);
//--><!]]></script>

</head>

<body>

<div id="wrap">

<div id="top">
	<img src="<?php bloginfo('template_url'); ?>/images/top.gif" alt="<?php bloginfo('name'); ?>" />
</div>

<div id="header">

	<div class="headerleft">
		<a href="<?php echo get_settings('home'); ?>/">&nbsp;</a>
	</div>
	
		<!--To enable the eNews &amp; Updates feature, go to your WP dashboard and go to Appearance -> Agent Theme Options and enter your Feedburner ID.-->
        	
	<div class="headerright">
		<p><a href="<?php bloginfo('rss_url'); ?>"><img style="vertical-align:middle" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="Subscribe to <?php bloginfo('name'); ?>" /></a><a href="<?php bloginfo('rss_url'); ?>">News Feed</a><a href="<?php bloginfo('comments_rss2_url'); ?>"><img style="vertical-align:middle;margin-left:10px;" src="<?php bloginfo('template_url'); ?>/images/rss.gif" alt="Subscribe to <?php bloginfo('name'); ?>" /></a><a href="<?php bloginfo('comments_rss2_url'); ?>">Comments</a></p>
        <ul id="headerwidgeted">
       		<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Feedburner Header') ) : ?>  
            <li><div class="signup"><p>Sign up for email news and updates!</p><form id="subscribe" action="http://www.feedburner.com/fb/a/emailverify" method="post" target="popupwindow" onsubmit="window.open('http://www.feedburner.com', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p><input type="text" value="Enter your email address..." id="subbox" onfocus="if (this.value == 'Enter your email address...') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Enter your email address...';}" name="email"/><input type="hidden" value="http://feeds.feedburner.com/~e?ffid=<?php $feedburner_id = get_option('agent_feedburner_id'); echo $feedburner_id; ?>" name="url"/><input type="hidden" value="eNews Subscribe" name="title"/><input type="submit" value="GO" id="subbutton" /></p></form></div></li>
            <?php endif; ?>
        </ul>
	</div>

</div>

<div id="navbar">

	<ul id="nav">
		<li><a href="<?php echo get_settings('home'); ?>">Home</a></li>
		<?php wp_list_pages('title_li=&sort_column=menu_order&depth=2'); ?>
	</ul>

</div>

<div style="clear:both;"></div>

<div id="subnavbar">

	<ul id="subnav">
		<?php wp_list_categories('orderby=name&title_li=&depth=2'); ?>
	</ul>
	
</div>

<div style="clear:both;"></div>