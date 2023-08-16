<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apps
 */
get_header();

$blog_column = is_active_sidebar('blog-sidebar') ? 8 : 8;
$sidebar_class = is_active_sidebar('blog-sidebar') ? 'theme-has-blog-sidebar' : 'theme-has-blog-no-sidebar';
$cbblog_layout = get_theme_mod('cbblog_layout') ? get_theme_mod('cbblog_layout') : 'right-sidebar';
if (isset($_GET['s'])) {
	$search = $_GET['s'];
}
$sidebar_space = '';
if ($cbblog_layout == 'right-sidebar') {
	$sidebar_space = is_active_sidebar('blog-sidebar') ? 'ml-50' : '';
} else if ($cbblog_layout == 'left-sidebar') {
	$sidebar_space = is_active_sidebar('blog-sidebar') ? 'mr-50' : '';
} else {
	$blog_column = 8;
}

// Get all categories for the "post" post type
$categories = get_categories(
	array(
		'taxonomy' => 'category',
		// Specify the taxonomy (category in this case)
		'hide_empty' => true,
		// Set to false to include categories with no posts
		'post_type' => 'post'
	)
);


?>
<!-- blog-pots -->
<section class="blog-pots section-padding pt-218">
	<div class="apps-blog-page-topbar-ajax-search-114">
		<div class="container">
			<div class="apps-blog-page-topbar-ajax-search-inner-114">
					<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
					<path d="M19.9993 18.8222L14.781 13.6039C16.1365 11.946 16.803 9.83063 16.6425 7.69518C16.4821 5.55974 15.507 3.56766 13.919 2.13098C12.331 0.694309 10.2515 -0.0770391 8.1107 -0.0235126C5.96991 0.030014 3.93158 0.90432 2.41734 2.41856C0.903099 3.9328 0.0287933 5.97113 -0.0247333 8.11192C-0.0782598 10.2527 0.693089 12.3322 2.12976 13.9202C3.56644 15.5082 5.55852 16.4833 7.69396 16.6438C9.82941 16.8042 11.9448 16.1377 13.6027 14.7822L18.821 20.0006L19.9993 18.8222ZM8.33266 15.0006C7.01412 15.0006 5.72519 14.6096 4.62886 13.877C3.53253 13.1445 2.67805 12.1033 2.17347 10.8851C1.66888 9.66693 1.53686 8.32649 1.79409 7.03328C2.05133 5.74008 2.68627 4.55219 3.61862 3.61984C4.55097 2.68749 5.73885 2.05255 7.03206 1.79532C8.32527 1.53808 9.66571 1.6701 10.8839 2.17469C12.1021 2.67927 13.1433 3.53375 13.8758 4.63008C14.6083 5.72641 14.9993 7.01534 14.9993 8.33388C14.9973 10.1014 14.2943 11.7959 13.0445 13.0457C11.7947 14.2955 10.1002 14.9986 8.33266 15.0006Z" fill="#316785"/>
					</svg>
					<input placeholder="Search here..." type="search" name="search_blog_input" id="search_blog_input">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="apps-blog-main-cards">
			<?php
				$args = array(
					'post_type' => 'post',
					'posts_per_page' => 3,
					'paged' => 1,
				);
				$query = new WP_Query($args);
				echo '<div class="row"  id="home-filtered-blog-post-114">';
				if ($query->have_posts()) :
					while ($query->have_posts()) :
						$query->the_post();?>
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
									<a href="<?php echo get_the_permalink(); ?>"
										class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
										<?php echo esc_html__('Read more', 'apps'); ?>
										<span class="ni fs-6 ni-arrow-right"></span>
									</a>
								</div>
							</div>
						</div>
					<?php endwhile;
				endif;
				echo '</div>';
			?>
		</div>
		<button id="loadMoreBtn">Load More</button>
	</div>
</section>
<!--/ blog-pots -->

<?php
get_footer();