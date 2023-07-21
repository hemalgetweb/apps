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
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'mr-20' : '';
} else if($cbblog_layout == 'left-sidebar') {
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'ml-20' : '';
} else {
	$blog_column = 8;
}
?>

	<main id="primary" class="apps-blog-page-area pt-100 pb-60 <?php echo esc_attr($sidebar_class); ?>">
		<div class="container">
			<div class="row">
				<?php if($cbblog_layout == 'left-sidebar') : ?>
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="apps-details-sidebar">
								<?php dynamic_sidebar('blog-sidebar');?>
							</div>
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
					<?php endif;?>
				<?php endif; ?>
				<div class="col-lg-<?php print esc_attr( $blog_column );?> col-md-12 col-sm-12">
					<div class="blog-wrapper <?php echo is_active_sidebar( 'blog-sidebar' ) ? esc_attr($sidebar_space) : ''; ?>">
						<div class="row">
							<?php
								if ( have_posts() ):
								if ( is_home() && !is_front_page() ):
							?>
							<header>
								<h1 class="page-title screen-reader-text"><?php single_post_title();?></h1>
							</header>
							<?php endif;?>
							<?php
								/* Start the Loop */
								while ( have_posts() ) : the_post(); ?>
								<?php
									if(is_single()) {
										get_template_part( 'post-formates/single-post/content', get_post_format() );
									} else {
										get_template_part( 'post-formates/content', get_post_format() );
									}
									endwhile;
								?>
									<?php apps_pagination( '<i class="fal fa-long-arrow-left"></i>', '<i class="fal fa-long-arrow-right"></i>', '', ['class' => ''] );?>
								<?php
								else:
									get_template_part( 'post-formates/content', 'none' );
								endif;
							?>
						</div>
					</div>
				</div>
				<?php if($cbblog_layout == 'right-sidebar') : ?>
					<?php if ( is_active_sidebar( 'blog-sidebar' ) ): ?>
						<div class="col-lg-4 col-md-12 col-sm-12">
							<div class="apps-details-sidebar">
								<?php dynamic_sidebar('blog-sidebar');?>
							</div>
						</div>
					<?php endif;?>
				<?php endif; ?>
			</div>
		</div>
	</main><!-- #main -->

<?php
get_footer();
