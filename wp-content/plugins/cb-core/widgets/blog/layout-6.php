<!-- blog area start -->
<div class="blog-area">
    <div class="container">
        <div class="row pb-50">
            <div class="col-xxl-12">
                <div class="ayaa-fz-section-title-wrapper-4 text-center">
                    <?php if(!empty($settings['section_subtitle'])) : ?>
                        <span class="ayaa-fz-subtitle-4"><?php echo cb_core_kses_basic($settings['section_subtitle']); ?></span>
                    <?php endif; ?>
                    <?php if(!empty($settings['section_title'])) :?>
                    <h4 class="ayaa-fz-title-4"><?php echo cb_core_kses_basic($settings['section_title']); ?></h4>
                    <?php endif;?>
                </div>
            </div>
        </div>
        <?php if ($wp_query->have_posts()) : ?>
            <div class="row">
                <?php
                    while ($wp_query->have_posts()) : $wp_query->the_post();
                ?>
                <div class="col-xxl-4 col-xl-4 col-lg-6 col-md-6 mb-30">
                    <div class="ayaa-fz-blog-box-4">
                        <?php if(has_post_thumbnail()) : ?>
                        <div class="image">
                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo the_post_thumbnail(); ?></a>
                        </div>
                        <?php endif; ?>
                        <div class="ayaa-fz-box-content">
                            <div class="ayaa-fz-blog-meta-4">
                                <span class="cat"><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></span> / <span class="date"><?php echo esc_html(get_the_date()); ?></span>
                            </div>
                            <h5 class="heading-title"><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a></h5>
                            <div class="ayaa-fz-blog-author-box-4">
                                <div class="image">
                                    <?php echo get_avatar(get_the_author_meta('ID', get_the_ID())) ?>
                                </div>
                                <div class="content">
                                    <h6 class="title"><?php the_author(); ?></h6>
                                    <span class="designation"><?php echo esc_html__('Author', 'cb-core'); ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- blog area end -->