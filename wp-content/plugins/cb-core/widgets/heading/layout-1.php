


<div class="container">
    <div class="row">
        <div class="col-xxl-12">
            <div class="apps-service-section-wrapper-114 text-<?php echo $settings['text_align'] ? $settings['text_align']: 'center'; ?>">
                <?php if(!empty($settings['heading_subtitle'])) : ?>
                <span class="apps-service-section-subtitle-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/service-spinner.png" alt="service"> <?php echo wp_kses_post($settings['heading_subtitle']); ?></span>
                <?php endif; ?>
                <?php if(!empty($settings['heading_title'])) : ?>
                    <h3 class="apps-service-section-title-114"><?php echo wp_kses_post($settings['heading_title']); ?></h3>
                <?php endif; ?>
                <?php if(!empty($settings['description'])) : ?>
                <p class="intro"><?php echo wp_kses_post($settings['description']); ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>