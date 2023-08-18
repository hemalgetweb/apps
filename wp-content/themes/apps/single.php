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
/**
 * Related post
 */
$current_post_id = get_the_ID();
$current_post_categories = wp_get_post_categories($current_post_id);

$related_posts_args = array(
	'category__in' => $current_post_categories,
	'post__not_in' => array($current_post_id),
	'posts_per_page' => 3, // You can adjust the number of related posts to display
	'orderby' => 'rand',   // You can change the order of related posts
);

$related_posts_query = new WP_Query($related_posts_args);
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
                            <div class="author-left d-flex align-items-center gap-1">
                                <?php
									$author_id = get_the_author_meta('ID');
									$author_name = get_the_author();
									$author_image = get_avatar_url($author_id);
									
									if ($author_image) {
										echo '<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path d="M10 10C9.16667 10 8.45833 9.70833 7.875 9.125C7.29167 8.54167 7 7.83333 7 7C7 6.16667 7.29167 5.45833 7.875 4.875C8.45833 4.29167 9.16667 4 10 4C10.8333 4 11.5417 4.29167 12.125 4.875C12.7083 5.45833 13 6.16667 13 7C13 7.83333 12.7083 8.54167 12.125 9.125C11.5417 9.70833 10.8333 10 10 10ZM4 16V14C4 13.6806 4.08681 13.3785 4.26042 13.0938C4.43403 12.809 4.67361 12.5694 4.97917 12.375C5.74306 11.9306 6.55064 11.5903 7.40192 11.3542C8.25321 11.1181 9.11779 11 9.99567 11C10.8736 11 11.7396 11.1181 12.5938 11.3542C13.4479 11.5903 14.2569 11.9306 15.0208 12.375C15.3264 12.5556 15.566 12.7917 15.7396 13.0833C15.9132 13.375 16 13.6806 16 14V16H4ZM5.5 14.5H14.5V14C14.5 13.9281 14.479 13.8628 14.437 13.8039C14.395 13.7451 14.3396 13.6993 14.2708 13.6667C13.6319 13.2778 12.9514 12.9861 12.2292 12.7917C11.5069 12.5972 10.7639 12.5 10 12.5C9.23611 12.5 8.49306 12.5972 7.77083 12.7917C7.04861 12.9861 6.36806 13.2778 5.72917 13.6667C5.65972 13.7222 5.60417 13.7759 5.5625 13.8276C5.52083 13.8793 5.5 13.9368 5.5 14V14.5ZM10.0044 8.5C10.4181 8.5 10.7708 8.35269 11.0625 8.05808C11.3542 7.76346 11.5 7.40929 11.5 6.99558C11.5 6.58186 11.3527 6.22917 11.0581 5.9375C10.7635 5.64583 10.4093 5.5 9.99558 5.5C9.58186 5.5 9.22917 5.64731 8.9375 5.94192C8.64583 6.23654 8.5 6.59071 8.5 7.00442C8.5 7.41814 8.64731 7.77083 8.94192 8.0625C9.23654 8.35417 9.59071 8.5 10.0044 8.5Z" fill="#316785"/>
										</svg>';
									}
									
									echo '<span>Published by ' . esc_html($author_name) . '</span>';
									?>
                            </div>
                            <div class="author-right d-flex align-items-center gap-1">
                                <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M12.4427 13.099L13.3724 12.1693L10.6562 9.45312V5.625H9.34375V10L12.4427 13.099ZM10 17C9.03536 17 8.12884 16.8177 7.28043 16.4531C6.43202 16.0885 5.6888 15.5872 5.05078 14.9492C4.41276 14.3112 3.91146 13.5671 3.54688 12.7169C3.18229 11.8667 3 10.9583 3 9.99165C3 9.02499 3.18229 8.11632 3.54688 7.26562C3.91146 6.41493 4.41276 5.67361 5.05078 5.04167C5.6888 4.40972 6.4329 3.91146 7.28309 3.54688C8.13328 3.18229 9.0417 3 10.0083 3C10.975 3 11.8837 3.18375 12.7345 3.55125C13.5853 3.91875 14.3253 4.4175 14.9546 5.0475C15.584 5.6775 16.0822 6.41833 16.4493 7.27C16.8164 8.12167 17 9.03167 17 10C17 10.9646 16.8177 11.8712 16.4531 12.7196C16.0885 13.568 15.5903 14.3112 14.9583 14.9492C14.3264 15.5872 13.5843 16.0885 12.732 16.4531C11.8797 16.8177 10.969 17 10 17ZM10.0087 15.6875C11.5822 15.6875 12.922 15.1315 14.0282 14.0195C15.1344 12.9076 15.6875 11.5648 15.6875 9.9913C15.6875 8.4178 15.1344 7.07796 14.0282 5.97177C12.922 4.86559 11.5822 4.3125 10.0087 4.3125C8.43519 4.3125 7.09245 4.86559 5.98047 5.97177C4.86849 7.07796 4.3125 8.4178 4.3125 9.9913C4.3125 11.5648 4.86849 12.9076 5.98047 14.0195C7.09245 15.1315 8.43519 15.6875 10.0087 15.6875Z"
                                        fill="#316785" />
                                </svg>
                                <span><?php echo get_the_date(); ?></span>
                            </div>
                            <div class="total-comments d-flex align-items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 14 14"
                                    fill="none">
                                    <path
                                        d="M0 14V1.3125C0 0.951562 0.128516 0.642579 0.385547 0.385547C0.642578 0.128516 0.951562 0 1.3125 0H12.6875C13.0484 0 13.3574 0.128516 13.6145 0.385547C13.8715 0.642579 14 0.951562 14 1.3125V10.0625C14 10.4234 13.8715 10.7324 13.6145 10.9895C13.3574 11.2465 13.0484 11.375 12.6875 11.375H2.625L0 14ZM2.07812 10.0625H12.6875V1.3125H1.3125V10.8281L2.07812 10.0625Z"
                                        fill="#316785" />
                                </svg>
                                <span><?php echo get_comments_number(); ?> Comments</span>
                            </div>
                        </div>
                    </div>
                </div>
                <article class="articles">
                    <div class="psot-details">
                        <div class="blog-info">
                            <?php if(has_post_thumbnail(get_the_ID())): ?>
                            <div class="single-blog-featured-img overflow-hidden">
                                <?php the_post_thumbnail(get_the_ID()); ?>
                            </div>
                            <?php endif; ?>
                            <div class="blog-content">
                                <?php the_content(); ?>
                            </div>
                            <div class="blog-bottom">
                                <div
                                    class="blog-bottom-box d-flex flex-wrap gap-4 justify-content-center justify-content-xl-between align-items-center radius-12 p-4 mb-4">
                                    <h4 class="fs-5 fw-bold text-clr-dark1 mb-0">
                                        <?php echo esc_html__('Share with the world', 'apps'); ?>
                                    </h4>
                                    <?php echo do_shortcode('[Sassy_Social_Share]') ?>

                                </div>
                                <?php //get_template_part( 'post-formates/single-post/content', 'biography' ); ?>
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

<?php if ($related_posts_query->have_posts()) : ?>
<!-- related-post -->
<section class="related-post-area section-padding bg-clr-dark8">
    <div class="container">
        <div class="apps-service-section-wrapper-114 text-center mb-5">
            <h2 class="apps-service-section-title-114 fs-36">
                Related Post
            </h2>
        </div>
        <div class="related-post-wrapper-114 p-rel">
            <div class="swiper-container related-post-slider">
                <div class="swiper-wrapper">
					<?php while ($related_posts_query->have_posts()) :
					$related_posts_query->the_post();
					$author_name = get_the_author();
					?>
                    <div class="swiper-slide">
                        <!-- related-blog-single -->
                        <div class="single-blog bg-white p-2 radius-6 box-shadow2">
                            <div class="blog-img mb-2 rounded-top overflow-hidden">
                                <a href="<?php the_permalink(get_the_ID()); ?>">
									<img src="<?php echo get_the_post_thumbnail_url( get_The_ID(), 'full' ); ?>" alt="Blog Image">
                                </a>
                            </div>
                            <div class="blog-info ">
                                <div class="feature-top">
									<?php
										$categories = get_the_category(); // Get the categories for the current post
										if (!empty($categories)) {
											$first_category = $categories[0]; // Get the first category
											$category_name = $first_category->name;
											$category_link = esc_url(get_category_link($first_category->term_id));
											echo '<a href="' . $category_link . '">';
											echo '<span class="section-tag fs-12 fw-bold text-uppercase text-clr-dark4 d-inline-flex gap-2 align-items-center mb-2">';
											echo '<img src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/rect.svg" alt="icon" class="img-fluid">';
											echo $category_name . '</span></a>';
										}
									?>
                                    <h3 class="blog-title fs-18 lh-base fw-medium">
                                        <a href="<?php the_permalink(get_the_ID()); ?>"
                                            class="text-decoration-none text-clr-dark1">
                                            <?php the_title(); ?> </a>
                                    </h3>
                                    <div class="blog-intro fs-14 text-clr-dark2 mb-0">
                                        <p><?php echo wp_trim_words( get_the_excerpt(), 16 ); ?></p>
                                    </div>
                                </div>
                                <div class="apps-blog-post-box-meta-114">
                                    <span class="author">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10 10C9.16667 10 8.45833 9.70833 7.875 9.125C7.29167 8.54167 7 7.83333 7 7C7 6.16667 7.29167 5.45833 7.875 4.875C8.45833 4.29167 9.16667 4 10 4C10.8333 4 11.5417 4.29167 12.125 4.875C12.7083 5.45833 13 6.16667 13 7C13 7.83333 12.7083 8.54167 12.125 9.125C11.5417 9.70833 10.8333 10 10 10ZM4 16V14C4 13.6806 4.08681 13.3785 4.26042 13.0938C4.43403 12.809 4.67361 12.5694 4.97917 12.375C5.74306 11.9306 6.55064 11.5903 7.40192 11.3542C8.25321 11.1181 9.11779 11 9.99567 11C10.8736 11 11.7396 11.1181 12.5938 11.3542C13.4479 11.5903 14.2569 11.9306 15.0208 12.375C15.3264 12.5556 15.566 12.7917 15.7396 13.0833C15.9132 13.375 16 13.6806 16 14V16H4ZM5.5 14.5H14.5V14C14.5 13.9281 14.479 13.8628 14.437 13.8039C14.395 13.7451 14.3396 13.6993 14.2708 13.6667C13.6319 13.2778 12.9514 12.9861 12.2292 12.7917C11.5069 12.5972 10.7639 12.5 10 12.5C9.23611 12.5 8.49306 12.5972 7.77083 12.7917C7.04861 12.9861 6.36806 13.2778 5.72917 13.6667C5.65972 13.7222 5.60417 13.7759 5.5625 13.8276C5.52083 13.8793 5.5 13.9368 5.5 14V14.5ZM10.0044 8.5C10.4181 8.5 10.7708 8.35269 11.0625 8.05808C11.3542 7.76346 11.5 7.40929 11.5 6.99558C11.5 6.58186 11.3527 6.22917 11.0581 5.9375C10.7635 5.64583 10.4093 5.5 9.99558 5.5C9.58186 5.5 9.22917 5.64731 8.9375 5.94192C8.64583 6.23654 8.5 6.59071 8.5 7.00442C8.5 7.41814 8.64731 7.77083 8.94192 8.0625C9.23654 8.35417 9.59071 8.5 10.0044 8.5Z"
                                                fill="#316785"></path>
                                        </svg>
                                        <span><?php
										echo $author_name;
										?></span>
                                    </span>
                                    <span class="date"><svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M12.4427 13.099L13.3724 12.1693L10.6562 9.45312V5.625H9.34375V10L12.4427 13.099ZM10 17C9.03536 17 8.12884 16.8177 7.28043 16.4531C6.43202 16.0885 5.6888 15.5872 5.05078 14.9492C4.41276 14.3112 3.91146 13.5671 3.54688 12.7169C3.18229 11.8667 3 10.9583 3 9.99165C3 9.02499 3.18229 8.11632 3.54688 7.26562C3.91146 6.41493 4.41276 5.67361 5.05078 5.04167C5.6888 4.40972 6.4329 3.91146 7.28309 3.54688C8.13328 3.18229 9.0417 3 10.0083 3C10.975 3 11.8837 3.18375 12.7345 3.55125C13.5853 3.91875 14.3253 4.4175 14.9546 5.0475C15.584 5.6775 16.0822 6.41833 16.4493 7.27C16.8164 8.12167 17 9.03167 17 10C17 10.9646 16.8177 11.8712 16.4531 12.7196C16.0885 13.568 15.5903 14.3112 14.9583 14.9492C14.3264 15.5872 13.5843 16.0885 12.732 16.4531C11.8797 16.8177 10.969 17 10 17ZM10.0087 15.6875C11.5822 15.6875 12.922 15.1315 14.0282 14.0195C15.1344 12.9076 15.6875 11.5648 15.6875 9.9913C15.6875 8.4178 15.1344 7.07796 14.0282 5.97177C12.922 4.86559 11.5822 4.3125 10.0087 4.3125C8.43519 4.3125 7.09245 4.86559 5.98047 5.97177C4.86849 7.07796 4.3125 8.4178 4.3125 9.9913C4.3125 11.5648 4.86849 12.9076 5.98047 14.0195C7.09245 15.1315 8.43519 15.6875 10.0087 15.6875Z"
                                                fill="#316785"></path>
                                        </svg> <?php echo get_the_date(); ?></span>
                                </div>
                                <a href="<?php the_permalink(get_the_ID()); ?>"
                                    class="text-decoration-none fs-14 fw-bold text-clr-primary d-flex gap-2 align-items-center">
                                    Read more <svg xmlns="http: //www.w3.org/2000/svg" width="18" height="18"
                                        viewBox="0 0 18 18" fill="none">
                                        <path
                                            d="M9 13.5L8.2035 12.7035L11.3438 9.5625H4.5V8.4375H11.3438L8.2035 5.2965L9 4.5L13.5 9L9 13.5Z"
                                            fill="#00C7C7"></path>
                                    </svg>
                                </a>

                            </div>
                        </div>
                        <!--/ related-blog-single -->
                    </div>
					<?php endwhile;wp_reset_postdata(); ?>
                </div>

            </div>


            <!-- swiper-control -->
            <div class="swiper-control">
                <div class="swiper-pagination113 d-none"></div>
                <div class="related-post-arrow">
                    <button type="button" class="swiper-prev swiper-prev25555 swiper-arrow border-0">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5 10L5.885 9.115L2.39583 5.625H10V4.375H2.39583L5.885 0.885L5 0L0 5L5 10Z"
                                fill="#73A7C3" />
                        </svg>
                    </button>
                    <button type="button" class="swiper-next swiper-next25555 swiper-arrow border-0">
                        <svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M5 0L4.115 0.885L7.60417 4.375L0 4.375L0 5.625L7.60417 5.625L4.115 9.115L5 10L10 5L5 0Z"
                                fill="#73A7C3" />
                        </svg>
                    </button>
                </div>
            </div>
            <!--/ swiper-control -->
        </div>
    </div>
</section>
<!--/ related-post -->
<?php endif; ?>
<?php get_footer(); ?>