<?php get_header(); ?>

<div id="content">

    <div id="homepage">

    <?php /*Check for the 'gallery_styles' function. if it's there, then include it. If not, do nothing*/ ?>
    <?php if (function_exists('gallery_styles')) : ?>

        <div id="homepagetop">
            <?php include (ABSPATH . '/wp-content/plugins/featured-content-gallery/gallery.php'); ?>
        </div>

<?php endif; ?>

        <!--This section is currently pulling category ID #1, and can be switched by changing the cat=1 to show whatever category ID you would like in this area. In addition, the custom field key for this section is "thumbnail".-->

        <div id="homepagebottom">
            
            <?php $RPTheme->featured_listings(); ?>

            <?php $RPTheme->agent_listings(); ?>

            <?php $RPTheme->office_listings(); ?>

        </div>

    </div>

<?php include(TEMPLATEPATH."/sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>