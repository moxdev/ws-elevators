<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Warfield and Sanford
 */
?>
<div id="secondary" class="widget-area beta" role="complementary">
        <?php  if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-global') ) :
             endif;
        ?>
        <?php if (is_single() || is_archive() || is_home()) {
             if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-blog') ) :
             endif;
        }?>
        <?php warfield_sanford_contact_sidebar() ?>
    
    </div><!-- #secondary -->