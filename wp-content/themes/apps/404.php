<?php

/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package apps
 */

get_header();

$cbtoolkit_error_404_image = get_theme_mod('cbtoolkit_error_404_image', get_template_directory_uri() . '/assets/images/error.png');
$cbtoolkit_error_title = get_theme_mod('cbtoolkit_error_title', __('Page not found', 'apps'));
$cbtoolkit_error_desc = get_theme_mod('cbtoolkit_error_desc', __('Oops! The page you are looking for does not exist. It might have been moved or deleted', 'apps'));
$cbtoolkit_error_link_text = get_theme_mod('cbtoolkit_error_link_text', __('Back To Home', 'apps'));
?>
<!-- error area start -->
<section class="apps-error-area-114 pt-165 pb-100">
   <div class="container">
      <?php if(!empty($cbtoolkit_error_404_image)) : ?>
      <div class="apps-error-image-top-114">
         <img src="<?php echo esc_url($cbtoolkit_error_404_image); ?>" alt="<?php echo esc_attr__('Error image', 'apps'); ?>">
      </div>
      <?php endif; ?>
      <div class="apps-error-cotnent-114">
         <?php if(!empty($cbtoolkit_error_title)) : ?>
            <h4 class="title"><a href="#"><?php echo esc_html($cbtoolkit_error_title); ?></a></h4>
         <?php endif; ?>
         <?php if(!empty($cbtoolkit_error_desc)) : ?>
            <p><?php echo esc_html($cbtoolkit_error_desc); ?></p>
         <?php endif; ?>
         <?php if(!empty($cbtoolkit_error_link_text)) : ?>
            <a href="<?php echo esc_url(home_url('/')); ?>" class="apps-errror-btn-114"><i class="fas fa-long-arrow-alt-left"></i> <?php echo esc_html($cbtoolkit_error_link_text); ?></a>
         <?php endif; ?>
      </div>
   </div>
</section>
<!-- error area end -->

<?php
get_footer();
