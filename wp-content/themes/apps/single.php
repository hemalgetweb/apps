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
    <section class="blog-details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
					<div class="apps-blog-archive-banner-top-114">
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
							<h4 class="title blog-details-main-title"><?php the_title(); ?></h4>
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
								<div class="toal-comments">
									<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14" fill="none"><path d="M0 14V1.3125C0 0.951562 0.128516 0.642579 0.385547 0.385547C0.642578 0.128516 0.951562 0 1.3125 0H12.6875C13.0484 0 13.3574 0.128516 13.6145 0.385547C13.8715 0.642579 14 0.951562 14 1.3125V10.0625C14 10.4234 13.8715 10.7324 13.6145 10.9895C13.3574 11.2465 13.0484 11.375 12.6875 11.375H2.625L0 14ZM2.07812 10.0625H12.6875V1.3125H1.3125V10.8281L2.07812 10.0625Z" fill="#316785"/></svg>
										<span><?php echo get_comments_number(); ?> Comments</span>
								</div>
							</div>
						</div>
					</div>
                    <article class="articles">
                        <div class="psot-details">
                            <div class="blog-info p-0 p-xl-3">
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
                                            <?php echo esc_html__('Share with the world', 'apps'); ?>
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