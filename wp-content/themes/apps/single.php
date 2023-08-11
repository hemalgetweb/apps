<?php
/**
 * single.php
 * @package WordPress
 * @subpackage apps
 * @since apps 1.0
 * 
 */
$blog_column = is_active_sidebar( 'blog-sidebar' ) ? 'col-lg-8 col-md-12 col-sm-12' : 'col-lg-8 col-md-12 col-sm-12';
$cbblog_layout = get_theme_mod('cbblog_layout') ? get_theme_mod('cbblog_layout'): 'right-sidebar';
$sidebar_space = '';

if($cbblog_layout == 'right-sidebar') {
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'pl-50' : '';
} else if($cbblog_layout == 'left-sidebar') {
	$sidebar_space = is_active_sidebar( 'blog-sidebar' ) ? 'pr-50' : '';
}
$category = array();
$cat_id = '';
$cat_name = '';
if(!empty($category)) {
	$category = get_the_category(get_the_ID());
	$cat_id = $category[0]->term_id;
	$cat_name = $category[0]->name;

}
 ?>
<?php get_header(); ?>

    <!-- blog-details -->
    <section class="blog-details section-padding"
        style="background-image: url(<?php echo get_template_directory_uri(); ?>/assets/img/w-shape.svg); background-repeat: no-repeat;">
        <div class="container mt-0 mt-xl-5 pt-0 pt-xl-4">
            <div class="row">
                <div class="col-lg-8">
                    <article class="articles">
                        <div class="psot-details">
                            <div class="blog-info p-0 p-xl-3">
                                <div class="blog-header">
									<?php if(!empty($cat_name)) : ?>
                                    <span
                                        class="section-tag fs-12 fw-bold text-uppercase text-clr-dark2 ls-1 d-inline-flex gap-2 align-items-center mb-2">
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="icon" class="img-fluid">
                                        <?php echo $cat_name; ?>
                                    </span>
									<?php endif; ?>
                                    <h1 class="blog-title text-clr-dark1 fs-36 fw-bold mb-3">
										<?php the_title(); ?>
                                    </h1>
									<!-- display none -->
                                    <div
                                        class="d-none authors text-decoration-none d-flex gap-2 gap-lg-3 align-items-center">
                                        <?php echo get_avatar(get_the_author_meta('ID'), get_the_ID()); ?>
                                        <span>
                                            <span class="authure-name fs-6 text-clr-dark1 mb-1">
                                                <?php echo esc_html__('Published by ', 'apps'); ?><b><a href="<?php echo get_author_posts_url( get_the_author_meta('ID') ); ?>"><?php echo esc_html(get_the_author_meta('display_name')); ?></a></b>
                                            </span>
                                            <span class="authure-name fs-16 text-clr-dark2 fw-normal ms-4">
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/fi-rs-calendar.svg" alt="icon" class="img-fluid">
                                                <span class="ms-2"><?php echo get_the_date(); ?></span>
                                            </span>
                                        </span>
                                    </div>
                                </div>
								<?php if(has_post_thumbnail(get_the_ID())): ?>
                                <div class="blog-img mb-2 radius-6 overflow-hidden my-4">
									<?php the_post_thumbnail(get_the_ID()); ?>
                                </div>
								<?php endif; ?>
                                <div class="blog-content my-4 pt-3">
                                    <?php the_content(); ?>
                                </div>
                                <div class="blog-bottom my-4 pt-3">
                                    <div
                                        class="blog-bottom-box d-flex flex-wrap gap-4 justify-content-center justify-content-xl-between align-items-center radius-12 p-4 mb-4">
                                        <h4 class="fs-5 fw-bold text-clr-dark1 mb-0">
                                            <?php echo esc_html__('Social media accounts', 'apps'); ?>
                                        </h4>
										<?php echo do_shortcode('[Sassy_Social_Share]') ?>
                                       
                                    </div>
									<?php get_template_part( 'post-formates/single-post/content', 'biography' ); ?>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-lg-4">
                    <div class="Sidebar mt-3">
						<?php if(is_active_sidebar('blog-sidebar')) : ?>
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ blog-pots -->









<div class="apps-blog-details-area blog-details pt-100 pb-60 d-none">
	<div class="container">
		<div class="row justify-content-center">
			<?php if($cbblog_layout == 'left-sidebar') : ?>
				<?php if(is_active_sidebar('blog-sidebar')) : ?>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="apps-details-sidebar">
							<?php dynamic_sidebar( 'blog-sidebar' ); ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
			<div class="<?php echo esc_attr($blog_column); ?>">
				<div class="apps-blog-details-wrapper mb-40">
					<div class="apps-fz-blog-content-wrapper-448">
						<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
							<?php  get_template_part( 'post-formates/single-post/content', get_post_format() ); ?>
						<?php endwhile; ?>
						<?php  get_template_part( 'post-formates/single-post/content', 'biography' ); ?>
						<div class="comments-area">
							<?php 
								if ( comments_open() || get_comments_number(get_the_ID()) ):
									comments_template();
								endif;
							?>
						</div>
					</div>
					<?php else : ?>
					<h2><?php esc_html_e('No Posts Found', 'apps') ?></h2>
					<?php endif; ?>
				</div>
			</div>
			<?php if($cbblog_layout == 'right-sidebar') : ?>
				<?php if(is_active_sidebar('blog-sidebar')) : ?>
					<div class="col-lg-4 col-md-12 col-sm-12">
						<div class="apps-details-sidebar <?php echo esc_attr($sidebar_space); ?>">
							<?php if ( is_active_sidebar( 'blog-sidebar' ) ) { ?>
								<?php dynamic_sidebar( 'blog-sidebar' ); ?>
							<?php } ?>
						</div>
					</div>
				<?php endif; ?>
			<?php endif; ?>
		</div>
	</div>
</div>

<?php get_footer(); ?>