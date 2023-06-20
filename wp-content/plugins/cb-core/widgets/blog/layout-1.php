<!-- blog area start -->
<section class="blog-area">
    <div class="container">
        <?php if($wp_query->have_posts()) : ?>
        <div class="row">
            <?php while($wp_query->have_posts()) :
                $wp_query->the_post();
                $post_id = get_the_ID();  
                $category_name = wp_get_post_terms(get_the_ID(), 'category')[0]->name;  
                $category_id = wp_get_post_terms(get_the_ID(), 'category')[0]->term_id;
                $cat_url = get_category_link($category_id);  
            ?>
            <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12">
                <div class="apps-blog-box-114 mb-30">
                    <?php if(has_post_thumbnail($post_id)) : ?>
                    <div class="apps-blog-box-img-114">
                        <a href="<?php echo get_the_permalink($post_id) ?>"><?php the_post_thumbnail($post_id, 'full'); ?></a>
                    </div>
                    <?php endif; ?>
                    <div class="apps-blog-box-content-114">
                        <?php if(!empty($category_name)) : ?>
                        <a href="<?php echo $cat_url ? esc_url($cat_url): ''; ?>" class="apps-blog-box-cat-link-114"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="blog 1"> <?php echo esc_html($category_name); ?></a>
                        <?php endif; ?>
                        <h5 class="apps-blog-box-title-114"><a href="<?php the_permalink($post_id) ?>"><?php the_title(); ?></a></h5>
                        <p><?php echo wp_trim_words(get_the_excerpt($post_id), 11); ?></p>
                        <span class="apps-blog-box-date-114"><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- blog area end -->