<div class="blog pt-25 pb-50">
    <div class="container">
        <div class="panel panel-2">
            <?php if(!empty($settings['section_title'])) : ?>
            <div class="heading text-center">
                <h2><?php echo esc_html($settings['section_title']); ?></h2>
            </div>
            <?php endif; ?>
            <?php if ($wp_query->have_posts()) : ?>
            <div class="blog-slider">
                <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                <div class="single-blog">
                    <?php if ( has_post_thumbnail()) : ?>
                    <div class="part-img ayaa-blog-grid-img">
                        <a href="<?php echo esc_url(get_the_permalink()); ?>">
                            <?php echo get_the_post_thumbnail(get_the_ID(), 'full'); ?>
                        </a>
                    </div>
                    <?php endif; ?>
                    <div class="part-txt">
                        <div class="tag-n-date">
                            <span><?php echo cb_core_kses_basic(cb_loop_category(get_the_ID())); ?></span> 
                            <span><?php echo esc_html__('/', 'cb-core'); ?></span> 
                            <span><?php echo esc_html(get_the_date(get_the_ID())); ?></span>
                        </div>
                        <h3><a href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo esc_html(get_the_title()); ?></a>
                        </h3>
                        <p><?php echo esc_html(wp_trim_words(get_the_excerpt(), 20)); ?></p>
                        <a href="<?php echo esc_url(get_the_permalink()); ?>" class="continue"><span><i class="fa-light fa-arrow-right"></i></span></a>
                    </div>
                </div>
                <?php endwhile; wp_reset_postdata(); ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>