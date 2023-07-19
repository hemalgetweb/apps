<!-- tab project start -->
<section class="tab-project">
    <div class="container  container-tab-project-114">
        <div class="text-center">
            <div class="apps-tab-navigation-114 mb-50">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-tab1-tab" data-bs-toggle="tab"
                            data-bs-target="#nav-tab1" type="button" role="tab" aria-controls="nav-tab1"
                            aria-selected="true">All Projects</button>
                        <?php if (!empty($settings['cat_query'])): ?>
                            <?php foreach ($settings['cat_query'] as $index => $cat_id): ?>
                                <button class="nav-link" id="nav-tab<?php echo $index + 2; ?>-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-tab<?php echo $index + 2; ?>" type="button" role="tab"
                                    aria-controls="nav-tab<?php echo $index + 2; ?>" aria-selected="false"><?php echo get_cat_name($cat_id); ?></button>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid pl-25 pr-25">
        <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="nav-tab1" role="tabpanel" aria-labelledby="nav-tab1-tab">
                <div class="apps-project-tab-content-wrapper-main-114">
                    <?php if ($all_wp_query->have_posts()): ?>
                        <div class="row row-cols-xxl-5">
                            <?php while ($all_wp_query->have_posts()):
                                $all_wp_query->the_post();
                                ?>
                                <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="apps-project-tab-main-content-114 mb-30">
                                        <!-- project card -->
                                        <div class="apps-project-card-114">
                                            <?php if (has_post_thumbnail(get_the_ID())): ?>
                                                <div class="apps-project-card-image-114">
                                                    <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="apps-project-card-description-wrapper-114">
                                                <div class="row">
                                                    <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                        <h5 class="apps-project-card-title-114"><a
                                                                href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h5>
                                                        <?php if (!empty($cat_name)): ?>
                                                            <a href="<?php echo $cat_link ? esc_url($cat_link) : ''; ?>"
                                                                class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-xxl-2 col-xl-2">
                                                        <div class="apps-project-card-action-icon-114 text-xl-end">
                                                            <a href="<?php echo esc_url(get_the_permalink()); ?>"><img
                                                                    src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg"
                                                                    alt="project"></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                </div>
                </div>
            <?php if (!empty($settings['cat_query'])): ?>
                <?php foreach($settings['cat_query'] as $index=>$category) :
                $single_query_arg = array(
                    'post_type' => 'project',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'category',
                            'field' => 'term_id',
                            'terms' => $category,
                        ),
                    ),
                );

                $single_query_arg_query = new \WP_Query($single_query_arg);
                ?>
                <?php if($single_query_arg_query->have_posts()) : ?>
                <div class="tab-pane fade" id="nav-tab<?php echo $index+2; ?>" role="tabpanel" aria-labelledby="nav-tab<?php echo $index; ?>-tab">
                    <div class="apps-project-tab-content-wrapper-main-114">
                        <div class="row row-cols-xxl-5">
                            <?php while($single_query_arg_query->have_posts()) : 
                                $single_query_arg_query->the_post();
                                ?>
                            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="apps-project-tab-main-content-114 mb-30">
                                    <!-- project card -->
                                    <div class="apps-project-card-114">
                                        <?php if (has_post_thumbnail(get_the_ID())): ?>
                                            <div class="apps-project-card-image-114">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </div>
                                        <?php endif; ?>
                                        <div class="apps-project-card-description-wrapper-114">
                                            <div class="row">
                                                <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                    <h5 class="apps-project-card-title-114"><a
                                                            href="<?php echo esc_url(get_the_permalink()); ?>"><?php echo get_the_title(); ?></a></h5>
                                                    <?php if (!empty($cat_name)): ?>
                                                        <a href="<?php echo $cat_link ? esc_url($cat_link) : ''; ?>"
                                                            class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2">
                                                    <div class="apps-project-card-action-icon-114 text-xl-end">
                                                        <a href="<?php echo esc_url(get_the_permalink()); ?>"><img
                                                                src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg"
                                                                alt="project"></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endwhile; wp_reset_query(); ?>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            <?php endforeach;  ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<!-- tab project end -->