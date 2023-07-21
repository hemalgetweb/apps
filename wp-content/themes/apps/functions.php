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
	wp_enqueue_style('fontawesome', apps_THEME_CSS_DIR . 'font-awesome.min.css');
	wp_enqueue_style('swiper', apps_THEME_CSS_DIR . 'swiper.min.css');
	wp_enqueue_style('nioicon', apps_THEME_CSS_DIR . 'nioicon.css');
	wp_enqueue_style('select2', apps_THEME_CSS_DIR . 'select2.min.css', null, time());
	wp_enqueue_style('apps-core', apps_THEME_CSS_DIR . 'apps-core.css', null, time());
	wp_enqueue_style('support', apps_THEME_CSS_DIR . 'support.css', null, time());
	wp_enqueue_style('apps-custom', apps_THEME_CSS_DIR . 'apps-custom.css', null, time());
	wp_enqueue_style('apps-unit', apps_THEME_CSS_DIR . 'apps-unit.css', null, time());

	// all js
	wp_enqueue_script('bootstrap', APPS_THEME_JS_DIR . 'bootstrap.bundle.min.js', ['jquery'], '', true);
	wp_enqueue_script('select2', APPS_THEME_JS_DIR . 'select2.min.js', ['jquery'], '', true);
	wp_enqueue_script('swiper', APPS_THEME_JS_DIR . 'swiper.min.js', ['jquery'], '', true);
	wp_enqueue_script('lottie', APPS_THEME_JS_DIR . 'lottie-player.js', ['jquery'], '', true);
	wp_enqueue_script('apps-ajax-script', APPS_THEME_JS_DIR . 'apps-ajax-handle.js', ['jquery'], time(), true);
	wp_enqueue_script('apps-script', APPS_THEME_JS_DIR . 'script.js', ['jquery'], time(), true);
	if (is_singular() && comments_open() && get_option('thread_comments')) {
		wp_enqueue_script('comment-reply');
	}
	$data = array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
    );
    wp_localize_script( 'apps-ajax-script', 'ajax', $data );
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
if (class_exists('TGM_Plugin_Activation')) {
	require_once APPS_THEME_INC . 'add_plugin.php';
}
/***
 * Add extra info on menu item
 */
function add_extra_menu_item($item_output, $item, $depth, $args)
{
	// Get the custom field value for the current menu item
	$extra_info = function_exists('get_field') ? get_field('menu_info', $item->ID): '';
	// If the custom field value exists, wrap the menu title and extra info in a single <div>
	if ($extra_info) {
		$extra_info_markup = '<span class="extra-info">' . $extra_info . '</span>';
		$item_output = preg_replace('/(<a.*?>)([^<]*)(<\/a>)/', '<div class="menu-item-content">$1$2' . $extra_info_markup . '$3</div>', $item_output);
	}

	return $item_output;
}
add_filter('walker_nav_menu_start_el', 'add_extra_menu_item', 10, 4);
function remove_comment_field_for_page($open, $post_id) {
	$page_id = get_option('application_form_page_id');
	if ( $post_id === get_the_ID() ) {
		// Disable comments for the specified page
		$open = false;
	}

	return $open;
}
add_filter( 'comments_open', 'remove_comment_field_for_page',  10, 2 );


/**
 * Filter blog post by category
 */


// AJAX handler for filtering blog posts
function apps_filter_blog_posts_by_category()
{
    $category = $_POST['category'];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    // If a specific category is selected, add it to the query arguments
    if ($category !== 'all') {
        $args['cat'] = $category;
    }

    $query = new WP_Query($args);

    // Start output buffer to store the HTML content
    ob_start();

    // Check if there are blog posts to display
    if ($query->have_posts()) {
		echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            // Output the content of each blog post here?>
			<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) :
				$att = get_post_thumbnail_id();
				$image_src = wp_get_attachment_image_src($att, 'full');
				if (!empty($image_src)) {
					$image_src = $image_src[0];
				}
			endif;
			$apps_cat  = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0]: '';
			$first_cat_name = '';
			$first_cat_id = '';
			$first_cat_url = '';
			if(!empty($apps_cat)) {
				$first_cat_name = $apps_cat['name'];
				$first_cat_id = $apps_cat['term_id'];
				$first_cat_url = get_category_link( $first_cat_id );
			}
        ?>
        <div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
			<div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-3 p-xl-4 radius-6 box-shadow2'); ?>>
				<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) :
				$att = get_post_thumbnail_id();
					$image_src = wp_get_attachment_image_src($att, 'full');
					if (!empty($image_src)) {
						$image_src = $image_src[0];
					}
					$apps_cat  = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0]: '';
				$first_cat_name = '';
				$first_cat_id = '';
				$first_cat_url = '';
				if(!empty($apps_cat)) {
					$first_cat_name = $apps_cat['name'];
					$first_cat_id = $apps_cat['term_id'];
					$first_cat_url = get_category_link( $first_cat_id );
				}
				?>
				<div class="blog-img mb-2 radius-6 overflow-hidden">
					<img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
				</div>
				<?php endif; ?>
				<div class="blog-info ">
					<div class="feature-top">
						<?php if(!empty($first_cat_name)) : ?>
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
								<?php echo get_the_title(); ?>
							</a>
						</h3>
						<div class="blog-intro fs-14 text-clr-dark2 mb-0">
							<p class="">
								<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
							</p>
						</div>
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
        // No blog posts found for the selected category
        echo '<p>No blog posts found for the selected category.</p>';
    }

    // End the output buffer and return the content
    $output = ob_get_clean();
    echo $output;
    exit;
}
add_action('wp_ajax_apps_filter_blog_posts', 'apps_filter_blog_posts_by_category');
add_action('wp_ajax_nopriv_apps_filter_blog_posts', 'apps_filter_blog_posts_by_category');




/**
 * Filter blog post by date
 */

function apps_filter_blog_posts()
{
    $date_filter = $_POST['date_filter'];

    $args = array(
        'post_type' => 'post',
        'post_status' => 'publish',
        'posts_per_page' => -1,
    );

    // Handle date filtering based on the selected option
    if ($date_filter === 'last-7-days') {
        $args['date_query'] = array(
            array(
                'after' => '1 week ago',
            ),
        );
    } elseif ($date_filter === 'last-month') {
        $args['date_query'] = array(
            array(
                'after' => '1 month ago',
            ),
        );
    } elseif ($date_filter === 'last-year') {
        $args['date_query'] = array(
            array(
                'after' => '1 year ago',
            ),
        );
    }

    $query = new WP_Query($args);

    // Start output buffer to store the HTML content
    ob_start();

    // Check if there are blog posts to display
    if ($query->have_posts()) {
		echo '<div class="row">';
        while ($query->have_posts()) {
            $query->the_post();
            ?>
			<div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
				<div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-3 p-xl-4 radius-6 box-shadow2'); ?>>
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) :
					$att = get_post_thumbnail_id();
						$image_src = wp_get_attachment_image_src($att, 'full');
						if (!empty($image_src)) {
							$image_src = $image_src[0];
						}
						$apps_cat  = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0]: '';
					$first_cat_name = '';
					$first_cat_id = '';
					$first_cat_url = '';
					if(!empty($apps_cat)) {
						$first_cat_name = $apps_cat['name'];
						$first_cat_id = $apps_cat['term_id'];
						$first_cat_url = get_category_link( $first_cat_id );
					}
					?>
					<div class="blog-img mb-2 radius-6 overflow-hidden">
						<img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
					</div>
					<?php endif; ?>
					<div class="blog-info ">
						<div class="feature-top">
							<?php if(!empty($first_cat_name)) : ?>
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
									<?php echo get_the_title(); ?>
								</a>
							</h3>
							<div class="blog-intro fs-14 text-clr-dark2 mb-0">
								<p class="">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>
							</div>
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
        // No blog posts found for the selected date
        echo '<p>No blog posts found for the selected date range.</p>';
    }

    // End the output buffer and return the content
    $output = ob_get_clean();
    echo $output;
    exit;
}
add_action('wp_ajax_filter_blog_posts', 'apps_filter_blog_posts');
add_action('wp_ajax_nopriv_filter_blog_posts', 'apps_filter_blog_posts');


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
            $query->the_post();?>
            <div class="col-xl-4 col-sm-6 col-sm-6 mb-4">
				<div id="post-<?php the_ID(); ?>" <?php post_class('single-blog bg-white p-3 p-xl-4 radius-6 box-shadow2'); ?>>
					<?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) :
					$att = get_post_thumbnail_id();
						$image_src = wp_get_attachment_image_src($att, 'full');
						if (!empty($image_src)) {
							$image_src = $image_src[0];
						}
						$apps_cat  = get_the_category(get_the_ID()) ? (array) get_the_category(get_the_ID())[0]: '';
					$first_cat_name = '';
					$first_cat_id = '';
					$first_cat_url = '';
					if(!empty($apps_cat)) {
						$first_cat_name = $apps_cat['name'];
						$first_cat_id = $apps_cat['term_id'];
						$first_cat_url = get_category_link( $first_cat_id );
					}
					?>
					<div class="blog-img mb-2 radius-6 overflow-hidden">
						<img src="<?php echo esc_url($image_src); ?>" alt="<?php the_title_attribute(); ?>" class="img-fluid w-100">
					</div>
					<?php endif; ?>
					<div class="blog-info ">
						<div class="feature-top">
							<?php if(!empty($first_cat_name)) : ?>
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
									<?php echo get_the_title(); ?>
								</a>
							</h3>
							<div class="blog-intro fs-14 text-clr-dark2 mb-0">
								<p class="">
									<?php echo wp_trim_words(get_the_excerpt(), 15); ?>
								</p>
							</div>
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
