<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apps
 */


if ( !is_active_sidebar( 'blog-sidebar' ) || !is_active_sidebar('shop') ) {
    return;
}
?>

<?php
    if(is_shop() || is_product_category() || is_product_tag() ) {
        dynamic_sidebar( 'shop' );
    } elseif(is_product()) {
        return '';
    }
    
    else {
        dynamic_sidebar( 'blog-sidebar' );
    }
?>