<?php

/*************************************************
## apps Typography
 *************************************************/
function apps_customizer_styling()
{
	$apps_header_style = function_exists('get_field') ? get_field('header_style') : NULL;
	$apps_header_theme_color = function_exists('get_field') ? get_field('header_theme_color') : '';
?>
	<style type="text/css">
		/**
		* header style 1/2
	*/
		<?php if (get_theme_mod('choose_default_header') == 'header-style-1') : ?><?php if (get_theme_mod('cbtoolkit_header_top_background_color_1')) { ?>.apps-header-inner .apps-header-topbar.apps-bg-primary,
		.apps-topbar-right-item::before {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_header_top_background_color_1')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('logo_size_1')) { ?>
			#header .navbar-brand img {
			max-width: <?php echo esc_attr(get_theme_mod('logo_size_1')); ?>px;
		}

		<?php } ?><?php endif; ?>

		/**
		* header style 3
	*/
		<?php if (get_theme_mod('choose_default_header') == 'header-style-3') : ?><?php if (get_theme_mod('cbtoolkit_header_top_background_color_3')) { ?>.apps-header-3 .apps-fz-header-top-3 {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_header_top_background_color_3')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('logo_size_3')) { ?>.apps-fz-header-logo-3 img {
			max-width: <?php echo esc_attr(get_theme_mod('logo_size_3')); ?>px;
		}

		<?php } ?><?php endif; ?>

		/**
		* header style 4
	*/
		<?php if (get_theme_mod('choose_default_header') == 'header-style-4') : ?><?php if (get_theme_mod('cbtoolkit_header_top_background_color_4')) { ?>.apps-fz-header-topbar-4 {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_header_top_background_color_4')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('logo_size_4')) { ?>.apps-fz-header-logo-4 img {
			max-width: <?php echo esc_attr(get_theme_mod('logo_size_4')); ?>px;
		}

		<?php } ?><?php endif; ?>

		/**
		* header style 5
	*/
		<?php if (get_theme_mod('choose_default_header') == 'header-style-5') : ?><?php if (get_theme_mod('logo_size_5')) { ?>.apps-fz-header-logo-5 img {
			max-width: <?php echo esc_attr(get_theme_mod('logo_size_5')); ?>px;
		}

		<?php } ?><?php endif; ?>
	/**
		* header style 7
	*/
	<?php if (get_theme_mod('choose_default_header') == 'header-style-7') : ?>
			<?php if (get_theme_mod('logo_size_7')) { ?>
				.apps-fz-header-logo-6 img {
					max-width: <?php echo esc_attr(get_theme_mod('logo_size_7')); ?>px;
				}
			<?php } ?>
		<?php endif; ?>

		/* Breadcrum Style */
		<?php if (get_theme_mod('breadcrumb_text_color')) { ?>.banner.banner-inner .breadcrumb-txt,
		.banner.banner-inner .breadcrumb-txt h1,
		.breadcrumb-trail.breadcrumbs>span a,
		nav.breadcrumb-trail.breadcrumbs>span span {
			color: <?php echo esc_attr(get_theme_mod('breadcrumb_text_color')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_text_hover_color')) { ?>.breadcrumb-trail.breadcrumbs>span a:hover span {
			color: <?php echo esc_attr(get_theme_mod('breadcrumb_text_hover_color')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_bg_img_ovelay_color')) { ?>.banner.banner-inner::after {
			background-color: <?php echo esc_attr(get_theme_mod('breadcrumb_bg_img_ovelay_color')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_bg_img_ovelay_color_opacity')) { ?>.banner.banner-inner::after {
			opacity: <?php echo esc_attr(get_theme_mod('breadcrumb_bg_img_ovelay_color_opacity')); ?>;
		}

		<?php } else { ?>.banner.banner-inner::after {
			opacity: 0;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_background_position_select')) { ?>.banner.banner-inner {
			background-position: <?php echo esc_attr(get_theme_mod('breadcrumb_background_position_select')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_background_size_select')) { ?>.banner.banner-inner {
			background-size: <?php echo esc_attr(get_theme_mod('breadcrumb_background_size_select')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('breadcrumb_background_blendmode_select')) { ?>.banner.banner-inner {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('breadcrumb_background_blendmode_select')); ?>;
		}

		<?php } ?>
	</style>
<?php }

add_action('wp_head', 'apps_customizer_styling');

function apps_footer_style()
{ ?>
	<style>
		<?php
		/***
		 * Footer Style 01
		 */
		if (get_theme_mod('footer_background_size_1')) { ?>.apps-fz-footer-2 {
			background-size: <?php echo esc_attr(get_theme_mod('footer_background_size_1')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_bg_image_1')) { ?>.apps-fz-footer-2 {
			background-image: <?php echo esc_url(get_theme_mod('footer_bg_image_1')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('cbtoolkit_footer_bg_color_1')) { ?>.apps-fz-footer-2 {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_footer_bg_color_1')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_position_select_1')) { ?>.apps-fz-footer-2 {
			background-position: <?php echo esc_attr(get_theme_mod('footer_background_position_select_1')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_blendmode_select_1')) { ?>.apps-fz-footer-2 {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('footer_background_blendmode_select_1')); ?>;
		}

		<?php } ?><?php
					/***
					 * Footer Style 02
					 */
					if (get_theme_mod('footer_background_size_2')) { ?>.footer-area.apps-fz-footer-2-update {
			background-size: <?php echo esc_attr(get_theme_mod('footer_background_size_2')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_bg_image_2')) { ?>.footer-area.apps-fz-footer-2-update {
			background-image: <?php echo esc_url(get_theme_mod('footer_bg_image_2')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('cbtoolkit_footer_bg_color_2')) { ?>.footer-area.apps-fz-footer-2-update {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_footer_bg_color_2')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_position_select_2')) { ?>.footer-area.apps-fz-footer-2-update {
			background-position: <?php echo esc_attr(get_theme_mod('footer_background_position_select_2')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_blendmode_select_2')) { ?>.footer-area.apps-fz-footer-2-update {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('footer_background_blendmode_select_2')); ?>;
		}

		<?php } ?><?php
					/***
					 * Footer Style 03
					 */
					if (get_theme_mod('footer_background_size_3')) { ?>.apps-fz-footer-3-area {
			background-size: <?php echo esc_attr(get_theme_mod('footer_background_size_3')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_bg_image_3')) { ?>.apps-fz-footer-3-area {
			background-image: <?php echo esc_url(get_theme_mod('footer_bg_image_3')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('cbtoolkit_footer_bg_color_3')) { ?>.apps-fz-footer-3-area {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_footer_bg_color_3')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_position_select_3')) { ?>.apps-fz-footer-3-area {
			background-position: <?php echo esc_attr(get_theme_mod('footer_background_position_select_3')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_blendmode_select_3')) { ?>.apps-fz-footer-3-area {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('footer_background_blendmode_select_3')); ?>;
		}

		<?php } ?><?php
					/***
					 * Footer Style 04
					 */
					if (get_theme_mod('footer_background_size_4')) { ?>.apps-fz-footer-style-4 {
			background-size: <?php echo esc_attr(get_theme_mod('footer_background_size_4')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_bg_image_4')) { ?>.apps-fz-footer-style-4 {
			background-image: <?php echo esc_url(get_theme_mod('footer_bg_image_4')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('cbtoolkit_footer_bg_color_4')) { ?>.apps-fz-footer-style-4 {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_footer_bg_color_4')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_position_select_4')) { ?>.apps-fz-footer-style-4 {
			background-position: <?php echo esc_attr(get_theme_mod('footer_background_position_select_4')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_blendmode_select_4')) { ?>.apps-fz-footer-style-4 {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('footer_background_blendmode_select_4')); ?>;
		}

		<?php } ?><?php
					/***
					 * Footer Style 05
					 */
					if (get_theme_mod('footer_background_size_5')) { ?>.apps-fz-footer5-top-wrapper {
			background-size: <?php echo esc_attr(get_theme_mod('footer_background_size_5')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_bg_image_5')) { ?>.apps-fz-footer5-top-wrapper {
			background-image: <?php echo esc_url(get_theme_mod('footer_bg_image_5')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('cbtoolkit_footer_bg_color_5')) { ?>.apps-fz-footer5-top-wrapper {
			background-color: <?php echo esc_attr(get_theme_mod('cbtoolkit_footer_bg_color_5')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_position_select_5')) { ?>.apps-fz-footer5-top-wrapper {
			background-position: <?php echo esc_attr(get_theme_mod('footer_background_position_select_5')); ?>;
		}

		<?php } ?><?php if (get_theme_mod('footer_background_blendmode_select_5')) { ?>.apps-fz-footer5-top-wrapper {
			background-blend-mode: <?php echo esc_attr(get_theme_mod('footer_background_blendmode_select_5')); ?>;
		}

		<?php } ?>
	</style>
<?php }
add_action('wp_head', 'apps_footer_style');

