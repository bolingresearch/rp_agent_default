<?php
/* 
 * Template for the listing summary block.
 */

?>
<div style="clear:both;"></div></div>
<?php
$image_dir = get_bloginfo("template_url")."/scripts/timthumb.php?w=150&h=100&zc=1&src=/wp-content/listing-images/";
foreach ($listings as $listing) {
?>
<div class="section">
<h3><a href="<?= $this->theme_options['listing_template']; ?>?listing_id=<?= $listing->listing_id; ?>" rel="bookmark">
    <?= $listing->street_num ?> <?= $listing->street_name ?>, <?= $listing->city ?> $<?= number_format($listing->price) ?>
    </a></h3>
<?php
    // if has images
    if ($listing->images != "") {
        $images = explode("\t", $listing->images);
        print '<a href="'.$this->theme_options['listing_template'].'?listing_id='.$listing->listing_id.'" rel="bookmark">'
        .'<img src="'.$image_dir . $images[0].'" alt="'. $listing->street_num.' '.$listing->street_name.'" />'
        .'</a>';
    }
    print '<p>'.$listing->public_remarks.'</p>';
    print '<div style="clear:both;"></div></div>';
}
?>
