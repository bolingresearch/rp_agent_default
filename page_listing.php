<?php
/*
Template Name: Property Listing
*/

if ( isset($_GET['listing_id'] ) ) {
    global $wpdb;
    $image_dir = get_bloginfo("template_url")."/scripts/timthumb.php?w=150&h=100&zc=1&src=/wp-content/listing-images/";
    $listing = $wpdb->get_row("SELECT * FROM wp_rplistings WHERE listing_id=".$_GET['listing_id']);
    $images = array();
    if ( $listing->images != "" ) {
        $images = explode("\t", $listing->images);
    }
}
?>

<?php get_header(); ?>

<div id="content">

<?php if ( isset( $listing ) ) : ?>

    <div id="contentleft">

        <div class="postarea">

            <h1><?php echo $listing->street_num.' '.$listing->street_name. ', ' .$listing->city. ', ' .$listing->state; ?></h1>

            <div class="date">
                <p>Property Type: <?php echo $listing->class; ?><br />
                Date Listed: &nbsp;<?php echo date("F jS, Y", strtotime($listing->list_date)); ?></p>
            </div>

            <div style="clear:both;"></div>

        </div>

        <div id="listing">

            <h4>Property Details</h4>

            <div class="listing-left">

                <p><b>Listing Price: &nbsp;</b>$<?php echo number_format($listing->price); ?></p>
                <p><b>Address: &nbsp;</b><?php echo $listing->street_num.' '.$listing->street_name; ?></p>
                <p><b>City: &nbsp;</b><?php echo $listing->city; ?></p>
                <p><b>State: &nbsp;</b><?php echo $listing->state; ?></p>
                <p><b>Zip Code: &nbsp;</b><?php echo $listing->zipcode; ?></p>

            </div>

            <div class="listing-right">

                <p><b>Bedrooms: &nbsp;</b><?php echo $listing->beds; ?></p>
                <p><b>Bathrooms: &nbsp;</b><?php echo $listing->baths_full + $listing->baths_partial; ?></p>
                <p><b>Square Feet: &nbsp;</b><?php echo number_format($listing->sqft); ?></p>
                <p><b>Lot Type: &nbsp;</b><?php echo $listing->lot_description; ?></p>
                <p style="color: #DD6666;"><b>Listing ID: &nbsp;</b><?php echo $listing->listing_id; ?></p>

            </div>

            <div style="clear:both;"></div>

            <div class="listing-bottom">

                <p><b>Listing Agent's Remarks: &nbsp;</b><?php echo $listing->public_remarks; ?></p>

            </div>

        </div>

<?php if( !empty($images) ): ?>

        <div id="photos">

            <h4>Property Photos</h4>

<?php foreach ($images as $image): ?>
            <a href="<?php bloginfo('wpurl'); ?>/wp-content/listing-images/<?php echo $image; ?>" rel="lightbox" title="<?php echo $listing->street_num.' '.$listing->street_name; ?>"><img src="<?php bloginfo('template_url'); ?>/scripts/timthumb.php?src=/wp-content/listing-images/<?php echo $image; ?>&amp;h=180&amp;w=180&amp;zc=1" alt="<?php echo $listing->street_num.' '.$listing->street_name; ?>" /></a>
<?php endforeach; ?>

        </div>

<?php endif; ?>

    </div>

<?php else : ?>
    <div id="homepage">
        <div id="homepagebottom">
            <div class="section">
<?php $RPTheme->search_form(); ?>
            </div>
<?php if( isset($_GET['search']) ) {
    $RPTheme->search_results($_GET['pricelow'], $_GET['pricehigh'], $_GET['beds'], $_GET['baths']);
}
?>
        </div>
    </div>
    <?php
    endif;
    ?>
    <?php include(TEMPLATEPATH."/sidebar.php");?>

</div>

<!-- The main column ends  -->

<?php get_footer(); ?>