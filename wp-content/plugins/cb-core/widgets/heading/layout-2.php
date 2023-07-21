<?php if(!empty($settings['heading_subtitle'])) : ?>
<div class="container">
    <div class="apps-steps-heading-114">
        <div class="apps-line"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/line.svg" alt="heading line"></div>
        <h5 class="apps-title"><span><?php echo wp_kses_post($settings['heading_subtitle']); ?></span></h5>
    </div>
</div>
<?php endif; ?>