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
	$sidebar_space = is_active_sidebar('blog-sidebar') ? 'mr-20' : '';
} else if ($cbblog_layout == 'left-sidebar') {
} else {
	$blog_column = 8;
}
?>
<div class="apps-hero-area-114 apps-hero-for-blog-archive-114">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xxl-6 col-xl-6 col-lg-6">
                <div class="apps-hero-content-wrapper-114 mb-50 mb-lg-0">
                    <span class="subtitle"><img
                            src="https://wadialbadaitsolutions.ae/wp-content/themes/apps/assets/img/service-spinner.png"
                            alt="subtitle image"> Blog</span>
                    <h2 class="title">Stay Updated with the Latest Trends & Happenings in the Digital Marketing Industry</h2>
                    <p class="content">Disruptive innovations and exciting news on marketing, technology, software, and business</p>

                </div>
            </div>
            <div class="col-xxl-6 col-xl-6 col-lg-6 text-center">
                <div class="apps-hero-svg-114">
                    <img decoding="async"
                        src="http://uiexpertz.com/wp-content/uploads/2023/09/banner-blog.svg"
                        title="case-studies-page-banner-img" alt="case-studies-page-banner-img">
                </div>
            </div>

        </div>
    </div>
</div>
<main id="home-filtered-blog-post-114"
	class="apps-blog-page-area pt-215 pb-100 <?php echo esc_attr($sidebar_class); ?>">
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="blog-wrapper">
					<div class="row">
						<?php
						if (have_posts()):
							if (is_home() && !is_front_page()):
								?>
								<header>
									<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
								</header>
							<?php endif; ?>
						<?php
						/* Start the Loop */
						while (have_posts()):
							the_post(); ?>
							<?php
							if (is_single()) {
								get_template_part('post-formates/single-post/content', get_post_format());
							} else {
								get_template_part('post-formates/content', get_post_format());
							}
						endwhile;
						?>
						<?php apps_pagination('<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5.74958 10.6199L1.94625 6.81655C1.49708 6.36738 1.49708 5.63238 1.94625 5.18322L5.74958 1.37988" stroke="#73A7C3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>', '<svg width="7" height="12" viewBox="0 0 7 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M1.25042 10.6199L5.05375 6.81655C5.50292 6.36738 5.50292 5.63238 5.05375 5.18322L1.25042 1.37988" stroke="#73A7C3" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/></svg>', '', ['class' => '']); ?>
						<?php
						else:
							get_template_part('post-formates/content', 'none');
						endif;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</main><!-- #main -->

<?php
get_footer();