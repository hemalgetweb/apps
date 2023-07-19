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
?>
<!-- blog-pots -->
<section class="blog-pots section-padding bg-clr-dark7"
	style="background-image: url(assets/img/w-shape.svg); background-repeat: no-repeat; background-position: 0 0px;">
	<div class="container">
		<div class="section-header pt-100">
			<div class="title-hints d-flex align-items-center gap-2">
				<img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" class="img-fluid" alt="icon">
				<h6 class="fs-12 fw-bold ls-1 text-clr-dark2 text-uppercase m-0">
					<?php echo esc_html__('Latest blogs', 'apps'); ?>
				</h6>
			</div>
			<h2 class="text-clr-dark1 fw-semi-bold fs-36 mb-2">
				<?php echo get_the_title(get_option('page_for_posts', true) ); ?>
			</h2>
			<div>
				<p class="fs-6 text-clr-dark2 mb-0">
					<?php
					$page_for_posts_id = get_option( 'page_for_posts' );
					$page_for_posts_obj = get_post( $page_for_posts_id );
					echo apply_filters( 'the_content', $page_for_posts_obj->post_content );
					?>
				</p>
			</div>
		</div>
		<?php
			if ( have_posts() ):
			if ( is_home() && !is_front_page() ):
		?>
		<?php
			while(have_posts()) :
			the_post();
			$is_featured = get_field('featured_post');
			$category = get_the_category(get_the_ID());
			$cat_id = $category[0]->term_id;
			$cat_name = $category[0]->name;
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
									<?php echo get_the_title(get_the_ID()); ?>
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
		<div class="articles pt-3">
			<div class="row mt-4">
				<div class="col-xl-9">
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
				<div class="col-xl-3">
					<div class="sidebar">
						<div class="sidebar-widget border-dark1 radius-6 overflow-hidden mb-4">
							<h3 class="widget-title px-4 py-3 fs-4 fw-semi-bold mb-0">
								Categories
							</h3>
							<div class="bg-light">
								<?php if(!empty($category)) : ?>
								<ul class="recent-post architect-3 list-unstyled py-3 px-4 mb-0 bg-white">
									<?php foreach($category as $cat) :
										$cat_id = $cat->term_id;
										$cat_url = get_category_link($cat_id);
									?>
									<li class="recent-post-list py-2">
										<a href="<?php echo $cat_url ? esc_url($cat_url) : ''; ?>"
											class="d-flex justify-content-between fs-6 fw-normal text-clr-dark1 text-decoration-none">
											<span class="category-name"><?php echo $cat->name; ?></span>
											<?php if($cat->count) : ?>
												<span class="has-post">(<?php echo $cat->count ?>)</span>
											<?php endif; ?>
										</a>
									</li>
									<?php endforeach; ?>
								</ul>
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!--/ blog-pots -->

<?php
get_footer();
