<div class="modal fade apps-portfolio-modal" id="modal_for_project" tabindex="-1" aria-labelledby="modal_for_projectLabel" aria-hidden="true">
    <div class="container">
        <div class="apps-portfolio-modal-top-114  pt-40">
            <div class="apps-portfolio-moal-top-left-box">
                <button type="button" class="btn-close apps-portfolio-close" data-bs-dismiss="modal"><i class="fal fa-times"></i></button>
                <div class="icon">
                    <img src="http://wadialbadaitsolutions.ae/wp-content/uploads/2023/07/portfolio-logo-icon1.svg" alt="icon">
                </div>
                <div class="content">
                    <h5 class="title">Easpa – Mobile Wallet App</h5>
                    <div class="meta">
                        <p>Wadi Al Bada</p>
                        <a href="#">Follow</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-transparent">
            <img src="#" alt="image">
        </div>
    </div>
</div>

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
                                $post_id = get_the_ID();
                                $categories = get_the_category($post_id);
                                $cat_name = '';
                                $cat_id = '';
                                $cat_link = '';
                                if(!empty($categories)) {
                                    $cat_name = $categories[0]->name;
                                    $cat_id = $categories[0]->term_id;
                                    $cat_link = get_category_link( $cat_id );
                                }
                                $project_big_image = get_post_meta($post_id, 'project_image', true);
                                ?>
                                <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                    <div class="apps-project-tab-main-content-114 mb-30">
                                        <!-- project card -->
                                        <div class="apps-project-card-114">
                                            <?php if(has_post_thumbnail(get_the_ID())) : ?>
                                            <div class="apps-project-card-image-114">
                                                <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                            </div>
                                            <?php endif; ?>
                                            <div class="apps-project-card-description-wrapper-114">
                                                <div class="row">
                                                    <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                        <h5 class="apps-project-card-title-114"><button data-bs-toggle="modal" data-bs-target="#modal_for_project" data-url="<?php echo $project_big_image ? esc_url($project_big_image): ''; ?>" class="apps-has-portfolio-popup" data-title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></button></h5>
                                                        <?php if(!empty($cat_name)) : ?>
                                                            <a href="#0" class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                                        <?php endif; ?>
                                                    </div>
                                                    <div class="col-xxl-2 col-xl-2">
                                                        <div class="apps-project-card-action-icon-114 text-xl-end">
                                                            <button data-url="<?php echo $project_big_image ? esc_url($project_big_image): ''; ?>" data-bs-toggle="modal" data-bs-target="#modal_for_project" data-title="<?php echo get_the_title(); ?>" class="apps-has-portfolio-popup"><img loading="async" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt="project"></button>
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
                    <?php
                    $total_pages = $all_wp_query->max_num_pages; // Get the total number of pages.
                    if ($total_pages > 1) {
                        echo '<div class="pagination">';
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%', // Use /page/ instead of ?paged= for better permalinks.
                            'current' => max(1, $paged),
                            'total' => $total_pages,
                            'prev_text' => '<i class="fal fa-angle-left"></i>', // Custom icon for previous link.
                            'next_text' => '<i class="fal fa-angle-right"></i>', // Custom icon for next link.
                        ));
                        echo '</div>';
                    }
                    ?>
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
                <div class="tab-pane fade" id="nav-tab<?php echo $index+2; ?>" role="tabpanel" aria-labelledby="nav-tab1-tab">
                    <div class="apps-project-tab-content-wrapper-main-114">
                        <div class="row row-cols-xxl-5">
                            <?php while($single_query_arg_query->have_posts()) : 
                                $single_query_arg_query->the_post();
                                $post_id = get_the_ID();
                                $categories = get_the_category($post_id);
                                $cat_name = '';
                                $cat_id = '';
                                $cat_link = '';
                                if(!empty($categories)) {
                                    $cat_name = $categories[0]->name;
                                    $cat_id = $categories[0]->term_id;
                                    $cat_link = get_category_link( $cat_id );
                                }
                                $project_big_image = get_post_meta($post_id, 'project_image', true);
                                ?>
                            <div class="col col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                <div class="apps-project-tab-main-content-114 mb-30">
                                    <!-- project card -->
                                    <div class="apps-project-card-114">
                                        <?php if(has_post_thumbnail(get_the_ID())) : ?>
                                        <div class="apps-project-card-image-114">
                                            <?php the_post_thumbnail(get_the_ID(), 'full'); ?>
                                        </div>
                                        <?php endif; ?>
                                        <div class="apps-project-card-description-wrapper-114">
                                            <div class="row">
                                                <div class="col-xxl-10 col-xl-10 mb-30 mb-xl-0">
                                                    <h5 class="apps-project-card-title-114"><button data-bs-toggle="modal" data-bs-target="#modal_for_project" data-url="<?php echo $project_big_image ? esc_url($project_big_image): ''; ?>" class="apps-has-portfolio-popup" data-title="<?php echo get_the_title(); ?>"><?php echo get_the_title(); ?></button></h5>
                                                    <?php if(!empty($cat_name)) : ?>
                                                        <a href="#0" class="apps-project-card-category-114"><?php echo esc_html($cat_name) ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-xxl-2 col-xl-2">
                                                    <div class="apps-project-card-action-icon-114 text-xl-end">
                                                        <button data-url="<?php echo $project_big_image ? esc_url($project_big_image): ''; ?>" data-bs-toggle="modal" data-bs-target="#modal_for_project" data-title="<?php echo get_the_title(); ?>" class="apps-has-portfolio-popup"><img loading="async" src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt="project"></button>
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