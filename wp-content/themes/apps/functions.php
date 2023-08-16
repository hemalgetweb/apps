<?php

/**
 * apps functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package apps
 */

if (!defined('_S_VERSION')) {
	// Replace the version number of the theme on each release.
	define('_S_VERSION', '1.0.0');
}

function apps_setup()
{
	load_theme_textdomain('apps', get_template_directory() . '/languages');
	add_theme_support('automatic-feed-links');
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('editor-styles');
	add_theme_support("wp-block-styles");
	add_theme_support("responsive-embeds");
	add_theme_support("align-wide");
	add_theme_support('html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption', 'style', 'script'));
	$defaults = array(
		'height' => 100,
		'width' => 400,
		'flex-height' => true,
		'flex-width' => true,
		'header-text' => array('site-title', 'site-description'),
		'unlink-homepage-logo' => true,
	);
	$args = array(
		'default-text-color' => '000',
		'width' => 1000,
		'height' => 250,
		'flex-width' => true,
		'flex-height' => true,
	);
	add_theme_support('custom-header', $args);
	add_theme_support('custom-background');
	add_theme_support('custom-logo', $defaults);
	if (function_exists('register_block_style')) {
		register_block_style(
			'core/quote',
			array(
				'name' => 'blue-quote',
				'label' => __('Blue Quote', 'apps'),
				'is_default' => true,
				'inline_style' => '.wp-block-quote.is-style-blue-quote { color: blue; }',
			)
		);
	}
	register_block_pattern(
		'apps-pattern',
		array(
			'title' => __('Apps Pattern', 'apps'),
			'description' => __('Apps Pattern', 'apps'),
			'content' => __('Apps Pattern Content', 'apps')
		)
	);
	register_nav_menus(
		array(
			'main-menu' => esc_html__('Main Menu', 'apps'),
			'copyright_menu' => esc_html__('Copyright Menu', 'apps'),
		),
	);
	register_nav_menus(
		array(
			'footer-menu' => esc_html__('Footer Menu', 'apps'),
		),
	);

	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);
	add_theme_support(
		'custom-background',
		apply_filters(
			'apps_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);
	add_theme_support('post-formats', [
		'image',
		'audio',
		'video',
		'gallery',
		'quote',
	]);
	add_theme_support('customize-selective-refresh-widgets');
	add_theme_support(
		'custom-logo',
		array(
			'height' => 30,
			'width' => 130,
			'flex-width' => true,
			'flex-height' => true,
			'unlink-homepage-logo' => true,
		)
	);
	if (class_exists('WooCommerce')) {
		add_theme_support(
			'woocommerce',
			array(
				'thumbnail_image_width' => 500,
				'gallery_thumbnail_image_width' => 100,
				'single_image_width' => 500,
			)
		);
	}
}
add_action('after_setup_theme', 'apps_setup');

function apps_content_width()
{
	$GLOBALS['content_width'] = apply_filters('apps_content_width', 640);
}
add_action('after_setup_theme', 'apps_content_width', 0);

/*
 * Register widget area.
 */
function apps_widgets_init()
{
	register_sidebar(
		array(
			'name' => esc_html__('Blog Sidebar', 'apps'),
			'id' => 'blog-sidebar',
			'description' => esc_html__('Add Blog Sidebar.', 'apps'),
			'before_widget' => '<section id="%1$s" class="apps-custom-blog-sidebar-1 sidebar-widget radius-6 overflow-hidden mb-4 %2$s">',
			'after_widget' => '</section>',
			'before_title' => '<h5 class="widget-title px-4 py-3 fs-4 fw-semi-bold mb-0">',
			'after_title' => '</h5>',
		)
	);
	// footer default
	for ($num = 1; $num <= 3; $num++) {
		register_sidebar([
			'name' => sprintf(esc_html__('Footer %1$s', 'apps'), $num),
			'id' => 'footer-' . $num,
			'description' => sprintf(esc_html__('Footer %1$s', 'apps'), $num),
			'before_widget' => '<div><div id="%1$s" class="footer-widget mb-40 footer-col-' . esc_attr($num) . ' %2$s ">',
			'after_widget' => '</div></div>',
			'before_title' => '<h6 class="apps-rv-footer-widget-title">',
			'after_title' => '</h6>',
		]);
	}
}
add_action('widgets_init', 'apps_widgets_init');



define('APPS_THEME_DIR', get_template_directory());
define('APPS_THEME_URI', get_template_directory_uri());
define('apps_THEME_CSS_DIR', APPS_THEME_URI . '/assets/css/');
define('APPS_THEME_JS_DIR', APPS_THEME_URI . '/assets/js/');
define('APPS_THEME_INC', APPS_THEME_DIR . '/inc/');
define('APPS_THEME_HOOK', APPS_THEME_INC . 'hooks/');
define('APPS_THEME_CLASS', APPS_THEME_INC . 'classes/');

/*
 * Enqueue Admin scripts and styles.
 */
function apps_admin_custom_scripts()
{
	wp_enqueue_media();
	wp_enqueue_style('customizer-style', get_template_directory_uri() . '/inc/style/css/customizer-style.css', array());
	wp_register_script('apps-admin-custom', get_template_directory_uri() . '/inc/js/admin_custom.js', ['jquery'], '', true);
	wp_enqueue_script('apps-admin-custom');
}
add_action('admin_enqueue_scripts', 'apps_admin_custom_scripts');
/**
 * Registers an editor stylesheet for the theme.
 */
function apps_theme_add_editor_styles()
{
	add_editor_style('assets/css/custom-editor-style.css');
}
add_action('admin_init', 'apps_theme_add_editor_styles');

/*
 * Enqueue Theme scripts and styles.
 */

function apps_scripts()
{
	// all CSS
	wp_enqueue_style('apps-fonts', apps_fonts_url(), array(), '1.0.0');
	wp_enqueue_style('bootstrap', apps_THEME_CSS_DIR . 'bootstrap.min.css');
	wp_enqueue_style('swiper', apps_THEME_CSS_DIR . 'swiper.min.css', null, '10.0');
	wp_enqueue_style('select2', apps_THEME_CSS_DIR . 'select2.min.css', null, time());
	wp_enqueue_style('aos', apps_THEME_CSS_DIR . 'aos.min.css', null, time());
	wp_enqueue_style('apps-core', apps_THEME_CSS_DIR . 'apps-core.css', null, time());
	wp_enqueue_style('support', apps_THEME_CSS_DIR . 'support.css', null, time());
	// wp_enqueue_style('apps-ashique-vai', apps_THEME_CSS_DIR . 'ashique-vai.css', null, time());
	wp_enqueue_style('apps-custom', apps_THEME_CSS_DIR . 'apps-custom.css', null, time());
	wp_enqueue_style('apps-afjal-vai', apps_THEME_CSS_DIR . 'afjal-vai.css', null, time());
	wp_enqueue_style('apps-emon-vai', apps_THEME_CSS_DIR . 'emon-vai.css', null, time());
	// wp_enqueue_style('apps-unit', apps_THEME_CSS_DIR . 'apps-unit.css', null, time());

	// all js
	wp_enqueue_script('bootstrap', APPS_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
	wp_enqueue_script('select2', APPS_THEME_JS_DIR . 'select2.min.js', ['jquery'], '', true);
	wp_enqueue_script('swiper', APPS_THEME_JS_DIR . 'swiper.min.js', ['jquery'], '10.0', true);
	wp_enqueue_script('aos', APPS_THEME_JS_DIR . 'aos.min.js', ['jquery'], '10.0', true);
	wp_enqueue_script('apps-ajax-script', APPS_THEME_JS_DIR . 'apps-ajax-handle.js', ['jquery'], time(), true);
	wp_enqueue_script('apps-script', APPS_THEME_JS_DIR . 'script.js', ['jquery'], time(), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	$data = array(
		'ajax_url' => admin_url('admin-ajax.php'),
	);
	wp_localize_script('apps-ajax-script', 'ajax', $data);
}
add_action('wp_enqueue_scripts', 'apps_scripts');
/*
Register Fonts
 */
function apps_fonts_url()
{
	$font_url = '';
	/*
														Translators: If there are characters in your language that are not supported
														by chosen font(s), translate this to 'off'. Do not translate into your own language.
														 */
	if ('off' !== _x('on', 'Google font: on or off', 'apps')) {
		$font_url = 'https://fonts.googleapis.com/css2?' . urlencode('family=Cairo:wght@200;300;400;500;600;700;800;900;1000&display=swap');
	}
	return $font_url;
}

require APPS_THEME_INC . 'template-helper.php';
require APPS_THEME_INC . 'post-type/register-post-type.php';
require APPS_THEME_INC . 'custom-header.php';
require APPS_THEME_INC . 'template-tags.php';
require APPS_THEME_INC . 'template-functions.php';
include_once APPS_THEME_INC . '/style/php/customizer-style.php';
include_once APPS_THEME_INC . 'class-wp-bootstrap-navwalker.php';
require_once APPS_THEME_INC . 'class-tgm-plugin-activation.php';
require_once APPS_THEME_INC . 'classes/class-apps-comment.php';
if (defined('JETPACK__VERSION')) {
	require APPS_THEME_INC . 'jetpack.php';
}
/***
 * WooCommerce Support
 */
add_theme_support('woocommerce');

/***
 * Add extra info on menu item
 */
function add_extra_menu_item($item_output, $item, $depth, $args)
{
	// Get the custom field value for the current menu item
	$extra_info = function_exists('get_field') ? get_field('menu_info', $item->ID) : '';
	// If the custom field value exists, wrap the menu title and extra info in a single <div>
	if ($extra_info) {
		$extra_info_markup = '<span class="extra-info">' . $extra_info . '</span>';
		$item_output = preg_replace('/(<a.*?>)([^<]*)(<\/a>)/', '<div class="menu-item-content">$1$2' . $extra_info_markup . '$3</div>', $item_output);
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_extra_menu_item', 10, 4);


/***
 * Blog Search result updated
 */

 function apps_post_load_more() {
	$ajaxposts = new WP_Query([
	  'post_type' => 'post',
	  'paged' => $_POST['paged'],
	]);
  
	$response = '';
  
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();?>
		<div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
			<div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-2 radius-6 box-shadow2'); ?>>
				<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())):
					$att = get_post_thumbnail_id();
					$image_src = wp_get_attachment_image_src($att, 'full');
					if (!empty($image_src)) {
						$image_src = $image_src[0];
					}
					$apps_cat = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0] : '';
					$first_cat_name = '';
					$first_cat_id = '';
					$first_cat_url = '';
					if (!empty($apps_cat)) {
						$first_cat_name = $apps_cat['name'];
						$first_cat_id = $apps_cat['term_id'];
						$first_cat_url = get_category_link($first_cat_id);
					}
					?>
					<div class="blog-img mb-2 radius-6 overflow-hidden">
						<img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
					</div>
				<?php endif; ?>
				<div class="blog-info ">
					<div class="feature-top">
						<?php if (!empty($first_cat_name)): ?>
							<a href="<?php echo esc_url($first_cat_url); ?>">
								<span
									class="section-tag fs-12 fw-bold text-uppercase text-clr-dark4 d-inline-flex gap-2 align-items-center mb-2">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="icon"
										class="img-fluid">
									<?php echo $first_cat_name; ?>
								</span>
							</a>
						<?php endif; ?>
						<h3 class="blog-title fs-18 lh-base fw-medium">
							<a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none text-clr-dark1">
								<?php echo wp_trim_words(get_the_title(get_the_ID()), 7); ?>
							</a>
						</h3>
						<div class="blog-intro fs-14 text-clr-dark2 mb-0">
							<p class="">
								<?php echo wp_trim_words(get_the_excerpt(), 16); ?>
							</p>
						</div>
					</div>
					<div class="apps-blog-post-box-meta-114">
						<span class="author">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 10C9.16667 10 8.45833 9.70833 7.875 9.125C7.29167 8.54167 7 7.83333 7 7C7 6.16667 7.29167 5.45833 7.875 4.875C8.45833 4.29167 9.16667 4 10 4C10.8333 4 11.5417 4.29167 12.125 4.875C12.7083 5.45833 13 6.16667 13 7C13 7.83333 12.7083 8.54167 12.125 9.125C11.5417 9.70833 10.8333 10 10 10ZM4 16V14C4 13.6806 4.08681 13.3785 4.26042 13.0938C4.43403 12.809 4.67361 12.5694 4.97917 12.375C5.74306 11.9306 6.55064 11.5903 7.40192 11.3542C8.25321 11.1181 9.11779 11 9.99567 11C10.8736 11 11.7396 11.1181 12.5938 11.3542C13.4479 11.5903 14.2569 11.9306 15.0208 12.375C15.3264 12.5556 15.566 12.7917 15.7396 13.0833C15.9132 13.375 16 13.6806 16 14V16H4ZM5.5 14.5H14.5V14C14.5 13.9281 14.479 13.8628 14.437 13.8039C14.395 13.7451 14.3396 13.6993 14.2708 13.6667C13.6319 13.2778 12.9514 12.9861 12.2292 12.7917C11.5069 12.5972 10.7639 12.5 10 12.5C9.23611 12.5 8.49306 12.5972 7.77083 12.7917C7.04861 12.9861 6.36806 13.2778 5.72917 13.6667C5.65972 13.7222 5.60417 13.7759 5.5625 13.8276C5.52083 13.8793 5.5 13.9368 5.5 14V14.5ZM10.0044 8.5C10.4181 8.5 10.7708 8.35269 11.0625 8.05808C11.3542 7.76346 11.5 7.40929 11.5 6.99558C11.5 6.58186 11.3527 6.22917 11.0581 5.9375C10.7635 5.64583 10.4093 5.5 9.99558 5.5C9.58186 5.5 9.22917 5.64731 8.9375 5.94192C8.64583 6.23654 8.5 6.59071 8.5 7.00442C8.5 7.41814 8.64731 7.77083 8.94192 8.0625C9.23654 8.35417 9.59071 8.5 10.0044 8.5Z" fill="#316785"/></svg> 
							<?php
								$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
							?>
							<span><?php echo $author_name; ?></span>
						</span>
						<span class="date"><?php echo get_the_date(); ?></span>
					</div>
					<a href="<?php echo get_the_permalink(); ?>"
						class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
						<?php echo esc_html__('Read more', 'apps'); ?>
						<span class="ni fs-6 ni-arrow-right"></span>
					</a>
				</div>
			</div>
		</div>
	  <?php endwhile;
	} else {
	  $response = '';
	}
  
	echo $response;
	exit;
  }
  add_action('wp_ajax_apps_post_load_more', 'apps_post_load_more');
  add_action('wp_ajax_nopriv_apps_post_load_more', 'apps_post_load_more');




/**
 * Filter blog post by search
 */

 function apps_perform_post_search()
 {
	 $search_term = $_POST['search_term'];
 
	 $args = array(
		 'post_type' => 'post',
		 'post_status' => 'publish',
		 'posts_per_page' => -1,
		 's' => $search_term,
	 );
 
	 $query = new WP_Query($args);
 
	 // Start output buffer to store the HTML content
	 ob_start();
 
	 // Check if there are search results to display
	 if ($query->have_posts()) {
		 echo '<div class="row">';
		 while ($query->have_posts()) {
			 $query->the_post(); ?>
			 <div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
				 <div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-2 radius-6 box-shadow2'); ?>>
					 <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())):
						 $att = get_post_thumbnail_id();
						 $image_src = wp_get_attachment_image_src($att, 'full');
						 if (!empty($image_src)) {
							 $image_src = $image_src[0];
						 }
						 $apps_cat = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0] : '';
						 $first_cat_name = '';
						 $first_cat_id = '';
						 $first_cat_url = '';
						 if (!empty($apps_cat)) {
							 $first_cat_name = $apps_cat['name'];
							 $first_cat_id = $apps_cat['term_id'];
							 $first_cat_url = get_category_link($first_cat_id);
						 }
						 ?>
						 <div class="blog-img mb-2 radius-6 overflow-hidden">
							 <img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
						 </div>
					 <?php endif; ?>
					 <div class="blog-info ">
						 <div class="feature-top">
							 <?php if (!empty($first_cat_name)): ?>
								 <a href="<?php echo esc_url($first_cat_url); ?>">
									 <span
										 class="section-tag fs-12 fw-bold text-uppercase text-clr-dark4 d-inline-flex gap-2 align-items-center mb-2">
										 <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="icon"
											 class="img-fluid">
										 <?php echo $first_cat_name; ?>
									 </span>
								 </a>
							 <?php endif; ?>
							 <h3 class="blog-title fs-18 lh-base fw-medium">
								 <a href="<?php echo get_the_permalink(); ?>" class="text-decoration-none text-clr-dark1">
									 <?php echo wp_trim_words(get_the_title(get_the_ID()), 7); ?>
								 </a>
							 </h3>
							 <div class="blog-intro fs-14 text-clr-dark2 mb-0">
								 <p class="">
									 <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								 </p>
							 </div>
						 </div>
						 <div class="apps-blog-post-box-meta-114">
							<span class="author">
								<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M10 10C9.16667 10 8.45833 9.70833 7.875 9.125C7.29167 8.54167 7 7.83333 7 7C7 6.16667 7.29167 5.45833 7.875 4.875C8.45833 4.29167 9.16667 4 10 4C10.8333 4 11.5417 4.29167 12.125 4.875C12.7083 5.45833 13 6.16667 13 7C13 7.83333 12.7083 8.54167 12.125 9.125C11.5417 9.70833 10.8333 10 10 10ZM4 16V14C4 13.6806 4.08681 13.3785 4.26042 13.0938C4.43403 12.809 4.67361 12.5694 4.97917 12.375C5.74306 11.9306 6.55064 11.5903 7.40192 11.3542C8.25321 11.1181 9.11779 11 9.99567 11C10.8736 11 11.7396 11.1181 12.5938 11.3542C13.4479 11.5903 14.2569 11.9306 15.0208 12.375C15.3264 12.5556 15.566 12.7917 15.7396 13.0833C15.9132 13.375 16 13.6806 16 14V16H4ZM5.5 14.5H14.5V14C14.5 13.9281 14.479 13.8628 14.437 13.8039C14.395 13.7451 14.3396 13.6993 14.2708 13.6667C13.6319 13.2778 12.9514 12.9861 12.2292 12.7917C11.5069 12.5972 10.7639 12.5 10 12.5C9.23611 12.5 8.49306 12.5972 7.77083 12.7917C7.04861 12.9861 6.36806 13.2778 5.72917 13.6667C5.65972 13.7222 5.60417 13.7759 5.5625 13.8276C5.52083 13.8793 5.5 13.9368 5.5 14V14.5ZM10.0044 8.5C10.4181 8.5 10.7708 8.35269 11.0625 8.05808C11.3542 7.76346 11.5 7.40929 11.5 6.99558C11.5 6.58186 11.3527 6.22917 11.0581 5.9375C10.7635 5.64583 10.4093 5.5 9.99558 5.5C9.58186 5.5 9.22917 5.64731 8.9375 5.94192C8.64583 6.23654 8.5 6.59071 8.5 7.00442C8.5 7.41814 8.64731 7.77083 8.94192 8.0625C9.23654 8.35417 9.59071 8.5 10.0044 8.5Z" fill="#316785"/></svg> 
								<?php
									$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
								?>
								<span><?php echo $author_name; ?></span>
							</span>
							<span class="date"><svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M12.4427 13.099L13.3724 12.1693L10.6562 9.45312V5.625H9.34375V10L12.4427 13.099ZM10 17C9.03536 17 8.12884 16.8177 7.28043 16.4531C6.43202 16.0885 5.6888 15.5872 5.05078 14.9492C4.41276 14.3112 3.91146 13.5671 3.54688 12.7169C3.18229 11.8667 3 10.9583 3 9.99165C3 9.02499 3.18229 8.11632 3.54688 7.26562C3.91146 6.41493 4.41276 5.67361 5.05078 5.04167C5.6888 4.40972 6.4329 3.91146 7.28309 3.54688C8.13328 3.18229 9.0417 3 10.0083 3C10.975 3 11.8837 3.18375 12.7345 3.55125C13.5853 3.91875 14.3253 4.4175 14.9546 5.0475C15.584 5.6775 16.0822 6.41833 16.4493 7.27C16.8164 8.12167 17 9.03167 17 10C17 10.9646 16.8177 11.8712 16.4531 12.7196C16.0885 13.568 15.5903 14.3112 14.9583 14.9492C14.3264 15.5872 13.5843 16.0885 12.732 16.4531C11.8797 16.8177 10.969 17 10 17ZM10.0087 15.6875C11.5822 15.6875 12.922 15.1315 14.0282 14.0195C15.1344 12.9076 15.6875 11.5648 15.6875 9.9913C15.6875 8.4178 15.1344 7.07796 14.0282 5.97177C12.922 4.86559 11.5822 4.3125 10.0087 4.3125C8.43519 4.3125 7.09245 4.86559 5.98047 5.97177C4.86849 7.07796 4.3125 8.4178 4.3125 9.9913C4.3125 11.5648 4.86849 12.9076 5.98047 14.0195C7.09245 15.1315 8.43519 15.6875 10.0087 15.6875Z" fill="#316785"/>
</svg>  <?php echo get_the_date(); ?></span>
						</div>
						 <a href="<?php echo get_the_permalink(); ?>"
							 class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
							 <?php echo esc_html__('Read more', 'apps'); ?>
							 <span class="ni fs-6 ni-arrow-right"></span>
						 </a>
					 </div>
				 </div>
			 </div>
		 <?php }
		 wp_reset_postdata();
		 echo '</div>';
	 } else {
		 // No search results found
		 echo '<p>No results found for the search term: "' . $search_term . '".</p>';
	 }
 
	 // End the output buffer and return the content
	 $output = ob_get_clean();
	 echo $output;
	 exit;
 }
 add_action('wp_ajax_apps_perform_post_search', 'apps_perform_post_search');
 add_action('wp_ajax_nopriv_apps_perform_post_search', 'apps_perform_post_search');
 



/**
 * Add css for brand animation
 */


function apps_head_animation()
{
	$current_page_id = get_queried_object_id();
	/** 
	 * For homepage
	 */
	if ($current_page_id == 9 || 758) { ?>
		<style>
			@-webkit-keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-378px * 8));
					transform: translateX(calc(-378px * 8));
				}
			}

			@keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-378px * 8));
					transform: translateX(calc(-378px * 8));
				}
			}

			@media (max-width: 776px) {
				@-webkit-keyframes animated-slide {
					0% {
						-webkit-transform: translateX(0);
						transform: translateX(0);
					}

					100% {
						-webkit-transform: translateX(calc(-221px * 8));
						transform: translateX(calc(-221px * 8));
					}
				}

				@keyframes animated-slide {
					0% {
						-webkit-transform: translateX(0);
						transform: translateX(0);
					}

					100% {
						-webkit-transform: translateX(calc(-221px * 8));
						transform: translateX(calc(-221px * 8));
					}
				}
			}

			@media (max-width: 576px) {
				@-webkit-keyframes animated-slide {
					0% {
						-webkit-transform: translateX(0);
						transform: translateX(0);
					}

					100% {
						-webkit-transform: translateX(calc(-185px * 8));
						transform: translateX(calc(-185px * 8));
					}
				}

				@keyframes animated-slide {
					0% {
						-webkit-transform: translateX(0);
						transform: translateX(0);
					}

					100% {
						-webkit-transform: translateX(calc(-185px * 8));
						transform: translateX(calc(-185px * 8));
					}
				}
			}
		</style>
<?php }


	/**
	 * For about page
	 */

	if ($current_page_id == 799) { ?>
	<style>
		@-webkit-keyframes animated-slide {
			0% {
				-webkit-transform: translateX(0);
				transform: translateX(0);
			}

			100% {
				-webkit-transform: translateX(calc(-378px * 8));
				transform: translateX(calc(-378px * 8));
			}
		}

		@keyframes animated-slide {
			0% {
				-webkit-transform: translateX(0);
				transform: translateX(0);
			}

			100% {
				-webkit-transform: translateX(calc(-378px * 8));
				transform: translateX(calc(-378px * 8));
			}
		}

		@media (max-width: 776px) {
			@-webkit-keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-221px * 8));
					transform: translateX(calc(-221px * 8));
				}
			}

			@keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-221px * 8));
					transform: translateX(calc(-221px * 8));
				}
			}
		}

		@media (max-width: 576px) {
			@-webkit-keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-185px * 8));
					transform: translateX(calc(-185px * 8));
				}
			}

			@keyframes animated-slide {
				0% {
					-webkit-transform: translateX(0);
					transform: translateX(0);
				}

				100% {
					-webkit-transform: translateX(calc(-185px * 8));
					transform: translateX(calc(-185px * 8));
				}
			}
		}
	</style>
<?php }
}
add_action('wp_head', 'apps_head_animation');


// Disable WordPress' automatic image scaling feature
add_filter( 'big_image_size_threshold', '__return_false' );
/**
 * Remove lazy load
 */
function remove_lazy_loading_attribute($content) {
	$content = preg_replace('/<(img|iframe)(.*?)loading=[\'"]?lazy[\'"]?(.*?)>/i', '<$1$2$3>', $content);
    return $content;
}

function disable_lazy_loading() {
    // Apply the 'remove_lazy_loading_attribute' function globally
    add_filter('the_content', 'remove_lazy_loading_attribute');
    add_filter('widget_text_content', 'remove_lazy_loading_attribute');
    add_filter('widget_text', 'remove_lazy_loading_attribute');
	add_filter( 'wp_lazy_loading_enabled', '__return_false' );
}
add_action('init', 'disable_lazy_loading');