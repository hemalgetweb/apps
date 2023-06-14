
<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apps
 */

get_header();
global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$apps_base_url = explode("/",$current_url);
$has_in_wishlist_page = false;
if(array_search("wishlist", $apps_base_url)) {
	$has_in_wishlist_page = true;
}
if(class_exists('WooCommerce') ? is_cart(): false) {
	$section_class = 'tab-section pt-100 pb-100';
} else if(class_exists('WooCommerce') ? is_account_page(): false) {
	$section_class = 'page-area pt-100 pb-75';
} else if(class_exists('WooCommerce') && !empty($has_in_wishlist_page) ) {
	$section_class = 'page-area pt-100 pb-100';
} else if(class_exists('WooCommerce') ? is_checkout(): false) {
	$section_class = 'page-area pt-95 pb-60';
}  else if(class_exists('WooCommerce') ? is_cart(): false) {
		$section_class = 'page-area pt-100 pb-100';
	} else {
	$section_class = 'page-area pt-100 pb-100';
}
?>

<div class="<?php echo esc_attr($section_class); ?>">
    <div class="container">
		<div class="row">
			<div class="col-xl-12">
				<div class="apps-page-content">
					<?php
						if ( have_posts() ):
							while ( have_posts() ): the_post();
								get_template_part( 'post-formates/content', 'page' );
							endwhile;
						else:
							get_template_part( 'post-formates/content', 'none' );
						endif;
					?>
				</div>
			</div>
		</div>
    </div>
</div>

<?php
get_footer();
