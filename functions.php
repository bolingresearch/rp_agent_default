<?php

if (!class_exists('RPTheme')) :
/**
 * RPTheme Class
 */
    class RPTheme {
        var $option;
        var $theme_options;

        function __construct() {
            $this->option = 'RPTheme_Options';
            $this->get_options();
            $this->theme_options['featured_listings'] = array(200900564, 200900560, 200900561);
            $this->theme_options['listing_template'] = get_bloginfo("wpurl")."/search-mls/";
            $this->theme_options['newest_days'] = 7;
        }

        function get_options() {
            global $RealtyPress;
            if ( isset($RealtyPress) ) {
                $this->theme_options = $RealtyPress->get_options();
            }
        }

        function agent_listings() {
            global $RealtyPress;
            if ( isset($RealtyPress) ) {
                $listings = $RealtyPress->get_agent_listings($this->theme_options['agent_id']);
                if (!empty($listings)) {
                    include(TEMPLATEPATH."/modules/agent-listings.php");
                }
            }
        }

        function office_listings() {
            global $RealtyPress;
            if ( isset($RealtyPress) ) {
                $listings = $RealtyPress->get_office_listings($this->theme_options['office_id']);
                if (!empty($listings)) {
                    include(TEMPLATEPATH."/modules/office-listings.php");
                }
            }
        }

        function broker_listings() {
            $broker_id = $this->theme_options['broker_id'];
            global $RealtyPress;
            if ( isset($RealtyPress) ) {
                $listings = $RealtyPress->get_broker_listings($this->theme_options['broker_id']);
                if (!empty($listings)) {
                    include(TEMPLATEPATH."/modules/broker-listings.php");
                }
            }
        }

        function newest_listings() {
            if ( function_exists('rp_just_listed') ) {
                $days = $this->theme_options['newest_days'];
                global $RealtyPress;
                if ( isset($RealtyPress) ) {
                    $listings = $RealtyPress->get_newest_listings();
                    if ( !empty($listings) ) {
                        include(TEMPLATEPATH."/modules/newest-listings.php");
                    }
                }
            }
        }

        function featured_listings() {
            if ( class_exists('RPFeatured') ) {
                global $RealtyPress;
                if ( isset($RealtyPress) ) {
                    $listings = $RealtyPress->get_listings($this->theme_options['featured_listings']);
                    if (!empty($listings)) {
                        include(TEMPLATEPATH."/modules/featured-listings.php");
                    }
                }
            }
        }

        function quick_search_form() {
            include(TEMPLATEPATH.'/widgets/quick-search.php');
        }

        function search_form() {
            include(TEMPLATEPATH.'/widgets/search-form.php');
        }

        function search_results($pricelow = 0, $pricehigh = 99999999, $beds = 0, $baths = 0) {
            global $RealtyPress;
            if ( isset($RealtyPress) ) {
                $listings = $RealtyPress->get_search_results($pricelow, $pricehigh, $beds, $baths);
                if (!empty($listings)) {
                    include(TEMPLATEPATH."/modules/search-results.php");
                }
            }
        }
    } // end class
else :
    wp_die("Class RPTheme has already been declared!");
endif;

$RPTheme = new RPTheme();

/* AGENT THEME */

add_filter('comments_template', 'legacy_comments');

function legacy_comments($file) {

    if(!function_exists('wp_list_comments')) : // WP 2.7-only check
        $file = TEMPLATEPATH . '/legacy.comments.php';
    endif;

    return $file;
}

//Turn a category ID to a Name
function cat_id_to_name($id) {
    foreach((array)(get_categories()) as $category) {
        if ($id == $category->cat_ID) { return $category->cat_name; break; }
    }
}

include(TEMPLATEPATH."/tools/post_templates.php");
include(TEMPLATEPATH."/tools/write-panel.php");

if ( function_exists('register_sidebars') ) {
    register_sidebar(array('name'=>'Sidebar Top',));
    register_sidebar(array('name'=>'Sidebar Bottom Left',));
    register_sidebar(array('name'=>'Sidebar Bottom Right',));
    register_sidebar(array('name'=>'468x60 Post Banner',));
    register_sidebar(array('name'=>'Feedburner Header',));
}

$themename = "Agent Theme";
$shortname = "agent";

$options = array (
    array(	"name" => "General Settings",
    "type" => "heading"),

    array(	"name" => "Featured Posts",
    "desc" => "This is for the homepage featured posts section below the Featured Content Gallery.<br /><br />",
    "id" => $shortname."_featured_cat_1",
    "type" => "cat_select"),

    array(	"name" => "Blog Category",
    "desc" => "This is to configure which category is being used on the Blog Page template.<br /><br />",
    "id" => $shortname."_blog_cat_1",
    "type" => "cat_select"),

    array(	"name" => "# of Posts",
    "desc" => "How many posts would you like to include on each blog page?<br /><br />",
    "id" => $shortname."_blog_cat_1_num",
    "type" => "text"),

    array(	"name" => "Feedburner",
    "desc" => "This is for the eNews &amp; Updates section and to be configured with Feedburner.<br />If you have switched your Feedburner account to Google, then go to Appearance > Widgets <br /> and add a text widget with your code in the Feedburner Header widget area.<br /><br />",
    "id" => $shortname."_feedburner_id",
    "std" => "Enter Feedburner Email Subscribe ID Here",
    "type" => "text"),

);

function mytheme_add_admin() {

    global $themename, $shortname, $options;

    if ( $_GET['page'] == basename(__FILE__) ) {

        if ( 'save' == $_REQUEST['action'] ) {

            foreach ($options as $value) {
                if($value['type'] != 'multicheck') {
                    update_option( $value['id'], $_REQUEST[ $value['id'] ] );
                }else {
                    foreach($value['options'] as $mc_key => $mc_value) {
                        $up_opt = $value['id'].'_'.$mc_key;
                        update_option($up_opt, $_REQUEST[$up_opt] );
                    }
                }
            }

            foreach ($options as $value) {
                if($value['type'] != 'multicheck') {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else { delete_option( $value['id'] ); }
                }else {
                    foreach($value['options'] as $mc_key => $mc_value) {
                        $up_opt = $value['id'].'_'.$mc_key;
                        if( isset( $_REQUEST[ $up_opt ] ) ) { update_option( $up_opt, $_REQUEST[ $up_opt ]  ); } else { delete_option( $up_opt ); }
                    }
                }
            }
            header("Location: themes.php?page=functions.php&saved=true");
            die;

        } else if( 'reset' == $_REQUEST['action'] ) {

                foreach ($options as $value) {
                    if($value['type'] != 'multicheck') {
                        delete_option( $value['id'] );
                    }else {
                        foreach($value['options'] as $mc_key => $mc_value) {
                            $del_opt = $value['id'].'_'.$mc_key;
                            delete_option($del_opt);
                        }
                    }
                }
                header("Location: themes.php?page=functions.php&reset=true");
                die;

            }
    }

    add_theme_page($themename." Options", "$themename Options", 'edit_themes', basename(__FILE__), 'mytheme_admin');

}

function mytheme_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    if ( $_REQUEST['reset'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings reset.</strong></p></div>';

    ?>
<div class="wrap">
    <h2><?php echo $themename; ?> options</h2>

    <form method="post">

        <table class="optiontable">

                <?php foreach ($options as $value) {

                    switch ( $value['type'] ) {
                        case 'text':
                            option_wrapper_header($value);
                            ?>
            <input style="width:300px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo get_settings( $value['id'] ); } else { echo $value['std']; } ?>" />
                            <?php
                            option_wrapper_footer($value);
                            break;

                        case 'select':
                            option_wrapper_header($value);
                            ?>
            <select style="width:300px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                <?php foreach ($value['options'] as $option) { ?>
                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
                                <?php } ?>
            </select>
                            <?php
                            option_wrapper_footer($value);
                            break;

                        //////////////////////////////////
                        //This is the category select code
                        //	Code courtesy of Nathan Rice
                        case 'cat_select':
                            option_wrapper_header($value);
                            $categories = get_categories('hide_empty=0');
                            ?>
            <select style="width:300px;" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
                                <?php foreach ($categories as $cat) {
                                    if ( get_settings( $value['id'] ) == $cat->cat_ID) { $selected = ' selected="selected"'; } else { $selected = ''; }
                                    $opt = '<option value="' . $cat->cat_ID . '"' . $selected . '>' . $cat->cat_name . '</option>';
                                    echo $opt; } ?>
            </select>
                            <?php
                            option_wrapper_footer($value);
                            break;
                        //end category select code
                        //////////////////////////

                        case 'textarea':
                            $ta_options = $value['options'];
                            option_wrapper_header($value);
                            ?>
            <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" style="width:400px;height:100px;"><?php
                                if( get_settings($value['id']) != "") {
                                    echo stripslashes(get_settings($value['id']));
                                }else {
                                    echo $value['std'];
                                }?></textarea>
                                <?php
                                option_wrapper_footer($value);
                                break;

                            case "radio":
                                option_wrapper_header($value);

                                foreach ($value['options'] as $key=>$option) {
                                    $radio_setting = get_settings($value['id']);
                                    if($radio_setting != '') {
                                        if ($key == get_settings($value['id']) ) {
                                            $checked = "checked=\"checked\"";
                                        } else {
                                            $checked = "";
                                        }
                                    }else {
                                        if($key == $value['std']) {
                                            $checked = "checked=\"checked\"";
                                        }else {
                                            $checked = "";
                                        }
                                    }?>
            <input type="radio" name="<?php echo $value['id']; ?>" value="<?php echo $key; ?>" <?php echo $checked; ?> /><?php echo $option; ?><br />
                            <?php
                            }

                            option_wrapper_footer($value);
                            break;

                        case "checkbox":
                            option_wrapper_header($value);
                            if(get_settings($value['id'])) {
                                $checked = "checked=\"checked\"";
                            }else {
                                $checked = "";
                            }
                            ?>
            <input type="checkbox" name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" value="true" <?php echo $checked; ?> />
                            <?php
                            option_wrapper_footer($value);
                            break;

                        case "multicheck":
                            option_wrapper_header($value);

                            foreach ($value['options'] as $key=>$option) {
                                $pn_key = $value['id'] . '_' . $key;
                                $checkbox_setting = get_settings($pn_key);
                                if($checkbox_setting != '') {
                                    if (get_settings($pn_key) ) {
                                        $checked = "checked=\"checked\"";
                                    } else {
                                        $checked = "";
                                    }
                                }else {
                                    if($key == $value['std']) {
                                        $checked = "checked=\"checked\"";
                                    }else {
                                        $checked = "";
                                    }
                                }?>
            <input type="checkbox" name="<?php echo $pn_key; ?>" id="<?php echo $pn_key; ?>" value="true" <?php echo $checked; ?> /><label for="<?php echo $pn_key; ?>"><?php echo $option; ?></label><br />
                            <?php
                            }

                            option_wrapper_footer($value);
                            break;

                        case "heading":
                            ?>
            <tr valign="top">
                <td colspan="2" style="text-align: center;"><h3><?php echo $value['name']; ?></h3></td>
            </tr>
                            <?php
                            break;

                        default:

                            break;
                    }
                }
                ?>

        </table>

        <p class="submit">
            <input name="save" type="submit" value="Save changes" />
            <input type="hidden" name="action" value="save" />
        </p>
    </form>
    <form method="post">
        <p class="submit">
            <input name="reset" type="submit" value="Reset" />
            <input type="hidden" name="action" value="reset" />
        </p>
    </form>

    <?php
    }

    function option_wrapper_header($values) {
        ?>
    <tr valign="top">
        <th scope="row"><?php echo $values['name']; ?>:</th>
        <td>
            <?php
            }

            function option_wrapper_footer($values) {
                ?>
        </td>
    </tr>
    <tr valign="top">
        <td>&nbsp;</td><td><small><?php echo $values['desc']; ?></small></td>
    </tr>
    <?php
    }

    function mytheme_wp_head() {
        $stylesheet = get_option('revmag_alt_stylesheet');
        if($stylesheet != '') {?>

        <?php }
    }

    add_action('wp_head', 'mytheme_wp_head');
    add_action('admin_menu', 'mytheme_add_admin');
    
    function the_content_limit($max_char, $more_link_text = '(more...)', $stripteaser = 0, $more_file = '') {
        global $post;
        //    $content = get_the_content($more_link_text, $stripteaser, $more_file);
        //    $content = apply_filters('the_content', $content);
        //    $content = str_replace(']]>', ']]&gt;', $content);
        //    $content = strip_tags($content);
        $content = get_post_meta($post->ID, "_additional_features", true);

        if (strlen($_GET['p']) > 0) {
            echo "<p>";
            echo $content;
            echo "&nbsp;<a href='";
            the_permalink();
            echo "'>"."Read More &rarr;</a>";
            echo "</p>";
        }
        else if ((strlen($content)>$max_char) && ($espacio = strpos($content, " ", $max_char ))) {
                $content = substr($content, 0, $espacio);
                $content = $content;
                echo "<p>";
                echo $content;
                echo "...";
                echo "&nbsp;<a href='";
                the_permalink();
                echo "'>".$more_link_text."</a>";
                echo "</p>";
            }
            else {
                echo "<p>";
                echo $content;
                echo "&nbsp;<a href='";
                the_permalink();
                echo "'>"."Read More &rarr;</a>";
                echo "</p>";
            }
    }

    //make changeable header

    define('HEADER_TEXTCOLOR', '');
    define('HEADER_IMAGE', '%s/setta.jpg'); // %s is theme dir uri
    define('HEADER_IMAGE_WIDTH', 972);
    define('HEADER_IMAGE_HEIGHT', 250);
    define( 'NO_HEADER_TEXT', true );

    function agent_admin_header_style() {
        ?>
    <style type="text/css">
        #headimg {
            height: <?php echo HEADER_IMAGE_HEIGHT; ?>px;
            width: <?php echo HEADER_IMAGE_WIDTH; ?>px;
        }

        #headimg h1, #headimg #desc {
            display: none;
        }

    </style>
    <?php
    }

    function header_style() {
        ?>
    <style type="text/css">
        #header{
            background: url(<?php header_image() ?>) no-repeat;
        }
    </style>
    <?php
    }

    add_custom_image_header('header_style', 'agent_admin_header_style');
?>