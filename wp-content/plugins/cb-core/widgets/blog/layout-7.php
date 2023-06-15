<!-- apps-fz-blog-area5-start -->
<div class="apps-fz-blog5-area">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-12">
                <div class="apps-fz-blog5-title-wrapp mb-40 mtmuptoxl-10">
                    <?php if(!empty($settings['section_title'])) :?>
                        <h4 class="apps-fz-blog5-title mb-20"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    <?php endif;?>
                    <?php if(!empty($settings['section_description'])) :?>
                        <p><?php echo cb_core_kses_basic($settings['section_description']); ?></p>
                    <?php endif;?>
                    <?php if(!empty($settings['btn_text'])) : ?>
                    <div class="apps-fz-blog56-button mt-35">
                        <a href="<?php echo esc_url($settings['btn_link']['url']) ? esc_url($settings['btn_link']['url']): ''; ?>" class="apps-fz-blog5-btn"><span><?php echo esc_html($settings['btn_text']); ?></span><span><?php echo esc_html($settings['btn_text']); ?></span></a>
                    </div>
                    <?php endif;?>
                </div>
            </div>
            <?php if ($wp_query->have_posts()) : ?>
                <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="apps-fz-blog5-single mb-40">
                        <div class="apps-fz-blog5-single-img">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo the_post_thumbnail(); ?></a>
                            <div class="apps-fz-blog5-read-button">
                                <a href="<?php echo esc_url(get_the_permalink()); ?>" class="apps-fz-blog5-read-btn"><span><?php echo esc_html__('Read More', 'cb-core'); ?></span><span><?php echo esc_html__('Read More', 'cb-core'); ?></span></a>
                            </div>
                        </div>
                        <div class="apps-fz-blog5-single-content pt-25">
                            <span class="apps-fz-blog5-meta"><?php echo esc_html(get_the_date()); ?></span>
                            <h4 class="apps-fz-blog5-single-title mb-0"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php the_title(); ?></a></h4>
                        </div>
                    </div>
                </div>
                <?php endwhile;?>
            <?php endif;?>
        </div>
    </div>
</div>
<!-- apps-fz-blog-area5-end -->