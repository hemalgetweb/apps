<!-- ayaa-fz-insights-area-start -->
<div class="ayaa-fz-insights-area">
    <div class="container">
        <div class="ayaa-fz-section-top-wrapp mb-30">
            <div class="row align-items-center">
                <div class="col-xxl-8 col-sm-8">
                    <div class="ayaa-fz-section-3">
                        <?php if(!empty($settings['section_title'])) : ?>
                            <h3 class="ayaa-fz-section-title-3"><?php echo cb_core_kses_basic($settings['section_title']); ?></h3>
                        <?php endif;?>
                        <?php if(!empty($settings['section_description'])) : ?>
                        <p class="ayaa-fz-section-subtitle"><?php echo cb_core_kses_basic($settings['section_description']); ?></p>
                        <?php endif;?>
                    </div>
                </div>
                <div class="col-xxl-4 col-sm-4">
                    <?php if(!empty($settings['btn_text'])) : ?>
                        <div class="ayaa-fz-insights-buttons pt-15 pt-sm-0 text-sm-end">
                        <a href="<?php echo esc_url($settings['btn_link']['url']) ? esc_url($settings['btn_link']['url']): ''; ?>" class="ayaa-fz-theme-btn-transparrent ayaa-fz-theme-btn-3"><span><?php echo esc_html($settings['btn_text']); ?></span><span><?php echo esc_html($settings['btn_text']); ?></span></a>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
        <div class="row">
            <?php
                $index = 0;
                while ($wp_query->have_posts()) : $wp_query->the_post();
                $category_id = get_the_category(get_the_ID()) ? get_the_category(get_the_ID())[0]->term_id: '';
                $category_url = $category_id ? get_category_link($category_id): '';
            ?>
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="ayaa-fz-insights-single mb-40">
                    <?php if(has_post_thumbnail()) : ?>
                    <div class="ayaa-fz-insights-single-img mb-20 w_100">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo the_post_thumbnail(); ?></a>
                    </div>
                    <?php endif; ?>
                    <div class="ayaa-fz-insights-single-content">
                        <div class="ayaa-fz-insights-single-meta">
                            <a href="<?php echo esc_url($category_url) ? esc_url($category_url): ''; ?>"><span class="ayaa-fz-insights-single-meta-item insight-cat"><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></span></a>
                            <span class="ayaa-fz-insights-single-meta-item"><?php echo esc_html(get_the_date()); ?></span>
                            <span class="ayaa-fz-insights-single-meta-item"> <?php the_author(); ?></span>
                        </div>
                        <h4 class="ayaa-fz-insights-single-title mb-0"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
                    </div>
                </div>
            </div>
            <?php $index++; endwhile; ?>
        </div>
        <?php endif;?>
    </div>
</div>
<!-- ayaa-fz-insights-area-end -->