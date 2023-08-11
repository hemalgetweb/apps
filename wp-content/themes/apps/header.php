<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package apps
 */
$cbtoolkit_preloader = get_theme_mod('cbtoolkit_preloader', false);
$body_background_color = function_exists( 'get_field' ) ? get_field( 'body_background_color' ) : '';
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class('inner'); ?>>
<?php wp_body_open(); ?>
		<!-- preloader and scroll up added based on customizer -->
		<?php if($cbtoolkit_preloader) : ?>
			<!-- preloader -->
			<div class="preloader">
				<div class="loader-bg">
					<svg role="img" aria-label="Mouth and eyes come from 9:00 and rotate clockwise into position, right eye blinks, then all parts rotate and merge into 3:00" class="smiley" viewBox="0 0 128 128" width="128px" height="128px">
						<defs>
							<clipPath id="smiley-eyes">
								<circle class="smiley__eye1" cx="64" cy="64" r="8" transform="rotate(-40,64,64) translate(0,-56)" />
								<circle class="smiley__eye2" cx="64" cy="64" r="8" transform="rotate(40,64,64) translate(0,-56)" />
							</clipPath>
							<linearGradient id="smiley-grad" x1="0" y1="0" x2="0" y2="1">
								<stop offset="0%" stop-color="#000" />
								<stop offset="100%" stop-color="#fff" />
							</linearGradient>
							<mask id="smiley-mask">
								<rect x="0" y="0" width="128" height="128" fill="url(#smiley-grad)" />
							</mask>
						</defs>
						<g stroke-linecap="round" stroke-width="12" stroke-dasharray="175.93 351.86">
							<g>
								<rect fill="#50FF81" width="128" height="64" clip-path="url(#smiley-eyes)" />
								<g fill="none" stroke="#50FF81">
									<circle class="smiley__mouth1" cx="64" cy="64" r="56" transform="rotate(180,64,64)" />
									<circle class="smiley__mouth2" cx="64" cy="64" r="56" transform="rotate(0,64,64)" />
								</g>
							</g>
							<g mask="url(#smiley-mask)">
								<rect fill="#00C7C7" width="128" height="64" clip-path="url(#smiley-eyes)" />
								<g fill="none" stroke="#00C7C7">
									<circle class="smiley__mouth1" cx="64" cy="64" r="56" transform="rotate(180,64,64)" />
									<circle class="smiley__mouth2" cx="64" cy="64" r="56" transform="rotate(0,64,64)" />
								</g>
							</g>
						</g>
					</svg>
				</div>
			</div>
			<!-- /preloader -->

		<?php endif; ?>

<!-- header start -->
<?php do_action( 'apps_header_style' );?>
<!-- header end -->
<!-- before main content start -->
<?php do_action( 'apps_before_main_content' );?>
<!-- before main content end -->

