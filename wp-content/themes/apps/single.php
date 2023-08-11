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
		<div class="apps-blog-archive-banner-top-114">
			<div class="container">
				<div class="apps-blog-archive-banner-inner-114">
					<div class="apps-blog-archive-banner-subtitle-group">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="image">
						<span class="subtitle">
							<?php
							$categories = get_the_category();
							if (!empty($categories)) {
								$first_category = $categories[0];
								echo esc_html($first_category->name);
							}
							?>
						</span>
					</div>
					<h4 class="title"><?php the_title(); ?></h4>
					<div class="meta">
						<div class="author-left">
							<?php
							$author_id = get_the_author_meta('ID');
							$author_name = get_the_author();
							$author_image = get_avatar_url($author_id);
							
							if ($author_image) {
								echo '<img src="' . esc_url($author_image) . '" alt="Author Image">';
							}
							
							echo '<span>Published by ' . esc_html($author_name) . '</span>';
							?>
						</div>
						<div class="author-right">
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> <g id="01 align center"> <path id="Vector" d="M17.5 1.66667H15V0H13.3333V1.66667H6.66667V0H5V1.66667H2.5C1.83696 1.66667 1.20107 1.93006 0.732233 2.3989C0.263392 2.86774 0 3.50363 0 4.16667L0 20H20V4.16667C20 3.50363 19.7366 2.86774 19.2678 2.3989C18.7989 1.93006 18.163 1.66667 17.5 1.66667ZM1.66667 4.16667C1.66667 3.94565 1.75446 3.73369 1.91074 3.57741C2.06702 3.42113 2.27899 3.33333 2.5 3.33333H17.5C17.721 3.33333 17.933 3.42113 18.0893 3.57741C18.2455 3.73369 18.3333 3.94565 18.3333 4.16667V6.66667H1.66667V4.16667ZM1.66667 18.3333V8.33333H18.3333V18.3333H1.66667Z" fill="#A8E0FF"/> <path id="Vector_2" d="M14.1667 10.8335H12.5V12.5002H14.1667V10.8335Z" fill="#A8E0FF"/> <path id="Vector_3" d="M10.8346 10.8335H9.16797V12.5002H10.8346V10.8335Z" fill="#A8E0FF"/> <path id="Vector_4" d="M7.49869 10.8335H5.83203V12.5002H7.49869V10.8335Z" fill="#A8E0FF"/> <path id="Vector_5" d="M14.1667 14.1667H12.5V15.8334H14.1667V14.1667Z" fill="#A8E0FF"/> <path id="Vector_6" d="M10.8346 14.1667H9.16797V15.8334H10.8346V14.1667Z" fill="#A8E0FF"/> <path id="Vector_7" d="M7.49869 14.1667H5.83203V15.8334H7.49869V14.1667Z" fill="#A8E0FF"/> </g> </svg>
						<span><?php echo get_the_date(); ?></span>
						</div>
					</div>
				</div>
			</div>
		</div>
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
                                        class="authors text-decoration-none d-flex gap-2 gap-lg-3 align-items-center">
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
				<div class="col-12">
					<div class="apps-comment-114">
						<div class="comments-area">
							<?php 
							comments_template();
							?>
						</div>
					</div>
				</div>
            </div>
        </div>
    </section>
    <!--/ blog-pots -->
<?php get_footer(); ?>