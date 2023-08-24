<!-- tab project start -->
<section class="tab-project">
    <div class="container  container-tab-project-114">
        <div class="text-center">
            <div class="apps-tab-navigation-114 mb-50">
                <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                        <button class="nav-link active" id="nav-tab1-tab" data-bs-toggle="tab" data-bs-target="#nav-tab1" type="button" role="tab" aria-controls="nav-tab1" aria-selected="true">All Projects</button>
                        <?php if (!empty($settings['cat_query'])) : ?>
                            <?php foreach ($settings['cat_query'] as $index => $cat_id) :
                                $term_id = $cat_id; // Replace with the actual term ID you want to retrieve
                                $taxonomy = 'project_category'; // Replace with your custom taxonomy slug

                                $term = get_term($term_id, $taxonomy);

                                if (!is_wp_error($term) && $term) {
                                    $term_name = $term->name;
                            ?>
                                    <button class="nav-link" id="nav-tab<?php echo $index + 2; ?>-tab" data-bs-toggle="tab" data-bs-target="#nav-tab<?php echo $index + 2; ?>" type="button" role="tab" aria-controls="nav-tab<?php echo $index + 2; ?>" aria-selected="false"><?php echo esc_html($term_name); ?></button>
                            <?php
                                }
                            endforeach; ?>
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
                    <?php if ($all_wp_query->have_posts()) : ?>
                        <div class="row row-cols-xxl-5">
                            <?php
                            $post_type = 'project';
                            $taxonomy = 'project_category';
                            while ($all_wp_query->have_posts()) :
                                $all_wp_query->the_post();
                                $post_id = get_the_ID();
                                $categories = get_the_terms($post_id, $taxonomy);
                                if (!empty($categories)) {
                                    $category = $categories[0]; // Assuming you want the first category
                                    $cat_name = $category->name;
                                    $cat_id = $category->term_id;
                                    $cat_link = get_term_link($cat_id, $taxonomy);
                                } else {
                                    // No categories found for this post
                                    $cat_name = 'Uncategorized'; // Set a default value or leave empty
                                    $cat_id = '';
                                    $cat_link = '';
                                }
                                $project_big_image = get_post_meta($post_id, 'project_image', true);
                            ?>
                                <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-12">
                                    <div class="apps-project-tab-main-content-114 mb-30">
                                        <!-- project card -->
                                        <div class="apps-project-card-114">
                                            <?php if (has_post_thumbnail(get_the_ID())) : ?>
                                                <div class="apps-project-card-image-114">
                                                    <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                                </div>
                                            <?php endif; ?>
                                            <div class="apps-project-card-description-wrapper-114">
                                                
                                                <div class="row">
                                                    <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                        <a href="<?php echo get_the_permalink(); ?>">
                                                            <div class="apps-project-card-title-114">
                                                                <?php echo get_the_title(); ?>
                                                            </div>

                                                            <?php
                                                            if ($categories && !is_wp_error($categories)) {
                                                                $first_category = reset($categories); // Get the first category

                                                                if ($first_category) {
                                                                    $cat_name = $first_category->name;
                                                                    echo '<a href="#0" class="apps-project-card-category-114">' . esc_html($cat_name) . '</a>';
                                                                }
                                                            }
                                                            ?>

                                                        </a>
                                                    </div>
                                                    <div class="col-xxl-2 col-xl-2">
                                                        <div class="apps-project-card-action-icon-114 text-xl-end">
                                                            <button><img loading="async" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt="project"></button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endwhile;
                            wp_reset_query(); ?>
                        </div>
                    <?php endif; ?>
                    <?php
                    $total_pages = $all_wp_query->max_num_pages; // Get the total number of pages.
                    if ($total_pages > 1) {
                        echo '<div class="pagination">';
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%', // Use /page/ instead of ?paged= for better permalinks.
                            'current' => max(1, $paged),
                            'total' => $total_pages,
                            'prev_text' => '<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 10L5.885 9.115L2.39583 5.625H10V4.375H2.39583L5.885 0.885L5 0L0 5L5 10Z" fill="#73A7C3"/></svg>', // Custom icon for previous link.
                            'next_text' => '<svg width="10" height="10" viewBox="0 0 10 10" fill="none" xmlns="http://www.w3.org/2000/svg"> <path d="M5 0L4.115 0.885L7.60417 4.375L0 4.375L0 5.625L7.60417 5.625L4.115 9.115L5 10L10 5L5 0Z" fill="#73A7C3"/> </svg>', // Custom icon for next link.
                        ));
                        echo '</div>';
                    }
                    ?>
                </div>
            </div>
            <?php if (!empty($settings['cat_query'])) :
                $post_type = 'project';
                $taxonomy = 'project_category';
            ?>
                <?php foreach ($settings['cat_query'] as $index => $category) :

                    $single_query_arg = array(
                        'post_type' => 'project',
                        'tax_query' => array(
                            array(
                                'taxonomy' => 'project_category',
                                'field'    => 'term_id',
                                'terms'    => $category, // Replace with the term ID you want to query
                            ),
                        ),
                    );

                    $single_query_arg_query = new \WP_Query($single_query_arg);
                ?>
                    <?php if ($single_query_arg_query->have_posts()) : ?>
                        <div class="tab-pane fade" id="nav-tab<?php echo $index + 2; ?>" role="tabpanel" aria-labelledby="nav-tab1-tab">
                            <div class="apps-project-tab-content-wrapper-main-114">
                                <div class="row row-cols-xxl-5">
                                    <?php
                                    $post_type = 'project';
                                    $taxonomy = 'project_category';
                                    while ($single_query_arg_query->have_posts()) :
                                        $single_query_arg_query->the_post();
                                        $post_id = get_the_ID();

                                        $categories = get_the_terms($post_id, $taxonomy);

                                        if (!empty($categories)) {
                                            $category = $categories[0]; // Assuming you want the first category
                                            $cat_name = $category->name;
                                            $cat_id = $category->term_id;
                                            $cat_link = get_term_link($cat_id, $taxonomy);
                                        } else {
                                            // No categories found for this post
                                            $cat_name = 'Uncategorized'; // Set a default value or leave empty
                                            $cat_id = '';
                                            $cat_link = '';
                                        }
                                        $project_big_image = get_post_meta($post_id, 'project_image', true);
                                    ?>
                                        <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                            <div class="apps-project-tab-main-content-114 mb-30">
                                                <!-- project card -->
                                                <div class="apps-project-card-114">
                                                    <?php if (has_post_thumbnail(get_the_ID())) : ?>
                                                        <div class="apps-project-card-image-114">
                                                            <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                                        </div>
                                                    <?php endif; ?>
                                                    <div class="apps-project-card-description-wrapper-114">
                                                        <div class="row">
                                                            <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                                <a href="<?php echo get_the_permalink(); ?>">
                                                                    <div class="apps-project-card-title-114">
                                                                        <?php echo get_the_title(); ?>
                                                                    </div>
                                                                    <?php if (!empty($cat_name)) : ?>
                                                                        <a href="#0" class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                                                    <?php endif; ?>
                                                                </a>
                                                            </div>
                                                            <div class="col-xxl-2 col-xl-2">
                                                                <div class="apps-project-card-action-icon-114 text-xl-end">
                                                                    <button><img loading="async" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt="project"></button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endwhile;
                                    wp_reset_query(); ?>
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