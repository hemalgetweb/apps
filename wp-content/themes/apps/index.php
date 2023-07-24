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

$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 8 : 8;
$sidebar_class = is_active_sidebar( 'blog-sidebar' ) ? 'theme-has-blog-sidebar' : 'theme-has-blog-no-sidebar';
$cbblog_layout = get_theme_mod('cbblog_layout') ? get_theme_mod('cbblog_layout') : 'right-sidebar';
if(isset($_GET['s'])) {
	$search = $_GET['s'];
}
$sidebar_space = '';
if($cbblog_layout == 'right-sidebar') {
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'ml-50' : '';
} else if($cbblog_layout == 'left-sidebar') {
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'mr-50' : '';
} else {
	$blog_column = 8;
}

// Get all categories for the "post" post type
$categories = get_categories(array(
    'taxonomy' => 'category', // Specify the taxonomy (category in this case)
    'hide_empty' => true,    // Set to false to include categories with no posts
	'post_type' => 'post'
));


?>
<!-- blog-pots -->
<section class="blog-pots section-padding pt-218"
	style="background-image: url(assets/img/w-shape.svg); background-repeat: no-repeat; background-position: 0 0px;">
	<div class="apps-blog-page-topbar-114">
		<div class="container">
			<div class="row">
				<div class="col-lg-6 col-md-8">
					<div class="apps-blog-page-topbar-select">
						<div class="apps-blog-cat-select-114 d-inline-block">
							<select name="cat" class="apps-has-category-select mb-md-0 select2-init" id="apps-has-simple-select-12324">
								<option value="all">All Categories</option>
								<?php foreach ($categories as $category) : ?>
									<option value="<?php echo esc_attr($category->term_id); ?>"><?php echo $category->name; ?></option>
								<?php endforeach; ?>
							</select>
						</div>
						<div class="apps-blog-duration-select-114 d-inline-block">
							<select name="cat" class="apps-has-duration-select mb-30 mb-md-0 select2-init" id="apps-has-simple-select-4321">
								<option value="all">All Posts</option>
								<option value="last-7-days">Last 7 Days</option>
								<option value="last-month">Last Month</option>
								<option value="last-year">Last Year</option>
							</select>
						</div>
					</div>
				</div>
				<div class="col-lg-6 col-md-4">
					<div class="apps-blog-page-topbar-search text-start text-md-end">
						<div class="apps-form-group">
							<i class="fal fa-search"></i>
							<input type="search" placeholder="Search" class="apps-search-post-for-home-114" name="search_post" id="apps_searh_post">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		


		<?php
			if ( have_posts() ):
			if ( is_home() && !is_front_page() ):
		?>
		<?php
			while(have_posts()) :
			the_post();
			$is_featured = function_exists('get_field') ? get_field('featured_post'): false;
			$category = get_the_category(get_the_ID());
			$cat_id = $category ? $category[0]->term_id: '';
			$cat_name = $category ? $category[0]->name : '';
		?>
		<?php if($is_featured) : ?>
		<div class="blog-featured bg-white p-4 p-xl-5 radius-12 mt-5">
			<div class="row">
				<div class="col-md-3">
					<div class="featured-img h-100">
						<img src="<?php echo get_the_post_thumbnail_url(get_the_ID()); ?>" alt="image" class="img-fluid w-100 h-100">
					</div>
				</div>
				<div class="col-md-9">
					<div class="featured-info px-3 d-flex flex-column justify-content-between h-100">
						<div class="feature-top">
							<span
								class="section-tag fs-12 fw-bold text-uppercase text-clr-dark4 d-inline-flex gap-2 align-items-center mb-2">
								<img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="icon" class="img-fluid">
								<?php echo esc_html($cat_name); ?>
							</span>
							<h3 class="blog-title fs-28 fw-semi-bold">
								<a href="<?php echo get_the_permalink(get_the_ID()); ?>" class="text-decoration-none text-clr-dark1">
									<?php echo wp_trim_words(get_the_title(get_the_ID()), 7); ?>
								</a>
							</h3>
							<div class="blog-intro fs-6 text-clr-dark2 mb-0">
								<p class="">
									<?php echo get_the_excerpt(get_the_ID()); ?>
								</p>
							</div>
						</div>
						<a href="<?php echo get_the_permalink(get_the_ID()); ?>"
							class="text-decoration-none fs-12 fw-bold text-clr-primary text-uppercase d-flex gap-2 align-items-center">
							<?php echo esc_html__('Read more', 'apps'); ?>
							<span class="ni fs-6 ni-arrow-right"></span>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php endif; ?>
		<?php endwhile; endif; endif; ?>
		<div class="articles pt-7" id="home-filtered-blog-post-114">
			<div class="row">
				<div class="col-12">
					<?php
						if ( have_posts() ):
						if ( is_home() && !is_front_page() ):
					?>
					<div class="row">
					<?php 
					$category = get_categories();
					while ( have_posts() ): the_post();
					?>
						<?php
						if(is_single()) {
							get_template_part( 'post-formates/single-post/content', get_post_format() );
						} else {
							get_template_part( 'post-formates/content', get_post_format() );
						}
						?>
					<?php endwhile; ?>
					</div>
					<?php endif; endif; ?>
					<div class="item-pagination my-4 pb-3 pb-xl-0">
						<nav aria-label="Page navigation example">
						<?php apps_pagination( '<img src="'.get_template_directory_uri().'/assets/img/pagination--left.svg" class="img-fluid mb-1" alt="paginate-left">', '<img src="'.get_template_directory_uri().'/assets/img/pagination-right.svg" class="img-fluid mb-1" alt="pagination-right">', '', ['class' => ''] );?>
						</nav>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ blog-pots -->

<?php
get_footer();
