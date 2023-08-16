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
					<path
						d="M19.9993 18.8222L14.781 13.6039C16.1365 11.946 16.803 9.83063 16.6425 7.69518C16.4821 5.55974 15.507 3.56766 13.919 2.13098C12.331 0.694309 10.2515 -0.0770391 8.1107 -0.0235126C5.96991 0.030014 3.93158 0.90432 2.41734 2.41856C0.903099 3.9328 0.0287933 5.97113 -0.0247333 8.11192C-0.0782598 10.2527 0.693089 12.3322 2.12976 13.9202C3.56644 15.5082 5.55852 16.4833 7.69396 16.6438C9.82941 16.8042 11.9448 16.1377 13.6027 14.7822L18.821 20.0006L19.9993 18.8222ZM8.33266 15.0006C7.01412 15.0006 5.72519 14.6096 4.62886 13.877C3.53253 13.1445 2.67805 12.1033 2.17347 10.8851C1.66888 9.66693 1.53686 8.32649 1.79409 7.03328C2.05133 5.74008 2.68627 4.55219 3.61862 3.61984C4.55097 2.68749 5.73885 2.05255 7.03206 1.79532C8.32527 1.53808 9.66571 1.6701 10.8839 2.17469C12.1021 2.67927 13.1433 3.53375 13.8758 4.63008C14.6083 5.72641 14.9993 7.01534 14.9993 8.33388C14.9973 10.1014 14.2943 11.7959 13.0445 13.0457C11.7947 14.2955 10.1002 14.9986 8.33266 15.0006Z"
						fill="#316785" />
				</svg>
				<input placeholder="Search here..." type="text" class="form-control" name="search_blog_input"
					id="search_blog_input">
			</div>
		</div>
	</div>
	<div class="container">
		<div class="apps-blog-main-cards">
			<?php
			$args = array(
				'post_type' => 'post',
				'paged' => 1,
			);
			$query = new WP_Query($args);
			echo '<div class="row"  id="home-filtered-blog-post-114">';
			if ($query->have_posts()):
				while ($query->have_posts()):
					$query->the_post(); ?>
					<div class="col-xl-4 col-md-6 mb-4">
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
												<img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="icon"
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
										<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
											<path
												d="M10 10C9.16667 10 8.45833 9.70833 7.875 9.125C7.29167 8.54167 7 7.83333 7 7C7 6.16667 7.29167 5.45833 7.875 4.875C8.45833 4.29167 9.16667 4 10 4C10.8333 4 11.5417 4.29167 12.125 4.875C12.7083 5.45833 13 6.16667 13 7C13 7.83333 12.7083 8.54167 12.125 9.125C11.5417 9.70833 10.8333 10 10 10ZM4 16V14C4 13.6806 4.08681 13.3785 4.26042 13.0938C4.43403 12.809 4.67361 12.5694 4.97917 12.375C5.74306 11.9306 6.55064 11.5903 7.40192 11.3542C8.25321 11.1181 9.11779 11 9.99567 11C10.8736 11 11.7396 11.1181 12.5938 11.3542C13.4479 11.5903 14.2569 11.9306 15.0208 12.375C15.3264 12.5556 15.566 12.7917 15.7396 13.0833C15.9132 13.375 16 13.6806 16 14V16H4ZM5.5 14.5H14.5V14C14.5 13.9281 14.479 13.8628 14.437 13.8039C14.395 13.7451 14.3396 13.6993 14.2708 13.6667C13.6319 13.2778 12.9514 12.9861 12.2292 12.7917C11.5069 12.5972 10.7639 12.5 10 12.5C9.23611 12.5 8.49306 12.5972 7.77083 12.7917C7.04861 12.9861 6.36806 13.2778 5.72917 13.6667C5.65972 13.7222 5.60417 13.7759 5.5625 13.8276C5.52083 13.8793 5.5 13.9368 5.5 14V14.5ZM10.0044 8.5C10.4181 8.5 10.7708 8.35269 11.0625 8.05808C11.3542 7.76346 11.5 7.40929 11.5 6.99558C11.5 6.58186 11.3527 6.22917 11.0581 5.9375C10.7635 5.64583 10.4093 5.5 9.99558 5.5C9.58186 5.5 9.22917 5.64731 8.9375 5.94192C8.64583 6.23654 8.5 6.59071 8.5 7.00442C8.5 7.41814 8.64731 7.77083 8.94192 8.0625C9.23654 8.35417 9.59071 8.5 10.0044 8.5Z"
												fill="#316785" />
										</svg>
										<?php
										$author_name = get_the_author_meta('display_name', get_post_field('post_author', $post_id));
										?>
										<span><?php echo $author_name; ?></span>
									</span>
									<span class="date"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
											xmlns="http://www.w3.org/2000/svg">
											<path
												d="M12.4427 13.099L13.3724 12.1693L10.6562 9.45312V5.625H9.34375V10L12.4427 13.099ZM10 17C9.03536 17 8.12884 16.8177 7.28043 16.4531C6.43202 16.0885 5.6888 15.5872 5.05078 14.9492C4.41276 14.3112 3.91146 13.5671 3.54688 12.7169C3.18229 11.8667 3 10.9583 3 9.99165C3 9.02499 3.18229 8.11632 3.54688 7.26562C3.91146 6.41493 4.41276 5.67361 5.05078 5.04167C5.6888 4.40972 6.4329 3.91146 7.28309 3.54688C8.13328 3.18229 9.0417 3 10.0083 3C10.975 3 11.8837 3.18375 12.7345 3.55125C13.5853 3.91875 14.3253 4.4175 14.9546 5.0475C15.584 5.6775 16.0822 6.41833 16.4493 7.27C16.8164 8.12167 17 9.03167 17 10C17 10.9646 16.8177 11.8712 16.4531 12.7196C16.0885 13.568 15.5903 14.3112 14.9583 14.9492C14.3264 15.5872 13.5843 16.0885 12.732 16.4531C11.8797 16.8177 10.969 17 10 17ZM10.0087 15.6875C11.5822 15.6875 12.922 15.1315 14.0282 14.0195C15.1344 12.9076 15.6875 11.5648 15.6875 9.9913C15.6875 8.4178 15.1344 7.07796 14.0282 5.97177C12.922 4.86559 11.5822 4.3125 10.0087 4.3125C8.43519 4.3125 7.09245 4.86559 5.98047 5.97177C4.86849 7.07796 4.3125 8.4178 4.3125 9.9913C4.3125 11.5648 4.86849 12.9076 5.98047 14.0195C7.09245 15.1315 8.43519 15.6875 10.0087 15.6875Z"
												fill="#316785" />
										</svg> <?php echo get_the_date(); ?></span>
								</div>
								<a href="<?php echo get_the_permalink(); ?>"
									class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
									<?php echo esc_html__('Read more', 'apps'); ?>
									<svg xmlns="http: //www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
										<path d="M9 13.5L8.2035 12.7035L11.3438 9.5625H4.5V8.4375H11.3438L8.2035 5.2965L9 4.5L13.5 9L9 13.5Z"
											fill="#00C7C7" />
									</svg>
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