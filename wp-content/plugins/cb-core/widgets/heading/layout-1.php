<?php
$alignment = $settings['text_align'] ?? 'center';
$enable_container_class = $settings['enable_container'] ? 'container' : 'apps-has-no-container';
?>
<div class="<?php echo $enable_container_class; ?>">
    <div class="row">
        <div class="col-xxl-12">
            <div class="apps-service-section-wrapper-114 text-<?php echo esc_attr($alignment); ?>">
                <?php if (!empty($settings['heading_subtitle'])): ?>
                    <span class="apps-service-section-subtitle-114">
                        <img
                            src="<?php echo get_template_directory_uri(); ?>/assets/img/service-spinner.png" width="10" height="10" alt="service">
                        <?php echo wp_kses_post($settings['heading_subtitle']); ?></span>
                <?php endif; ?>
                <?php if (!empty($settings['heading_title'])): ?>
                    <h2 class="apps-service-section-title-114"><?php echo wp_kses_post($settings['heading_title']); ?></h2>
                <?php endif; ?>
                <?php if (!empty($settings['description'])): ?>
                    <p class="intro"><?php echo wp_kses_post($settings['description']); ?></p>
                <?php endif; ?>
                <?php if(!empty($settings['enable_button'])) : ?>
                <div class="apps-service-link-wrap-114">
                    <?php if(!empty($settings['btn_text_1'])) :
                    if ( ! empty( $settings['btn_link_1']['url'] ) ) {
                        $this->add_link_attributes( 'btn_link_1', $settings['btn_link_1'] );
                    }    
                    ?>
                    <a <?php echo $this->get_render_attribute_string( 'btn_link_1' ); ?> class="apps-service-link-single-114"><?php echo esc_html($settings['btn_text_1']); ?> 
                        <span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 15L9.115 14.115L12.6042 10.625H5V9.375H12.6042L9.115 5.885L10 5L15 10L10 15Z" fill="#003959"/>
                            </svg>
                        </span>
                    </a>
                    <?php endif; ?>
                    <?php if(!empty($settings['btn_text_2'])) :
                    if ( ! empty( $settings['btn_link_2']['url'] ) ) {
                        $this->add_link_attributes( 'btn_link_2', $settings['btn_link_2'] );
                    }    
                    ?>
                    <a <?php echo $this->get_render_attribute_string( 'btn_link_2' ); ?> class="apps-service-link-single-114 style-2"><?php echo esc_html($settings['btn_text_2']); ?> 
                        <span>
                            <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10 15L9.115 14.115L12.6042 10.625H5V9.375H12.6042L9.115 5.885L10 5L15 10L10 15Z" fill="#003959"/>
                            </svg>
                        </span>
                    </a>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>