<div class="modal fade apps-portfolio-modal" id="modal_for_project" tabindex="-1" aria-labelledby="modal_for_projectLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="apps-portfolio-modal-top-114  pt-40">
            <div class="apps-portfolio-moal-top-left-box">
                <div class="icon">
                    <img src="https://www.getwebinc.com/wp-content/uploads/2022/11/companyLogo.92df1bb6.svg" alt="icon">
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
        <div class="modal-content bg-transparent">
            <img src="https://www.getwebinc.com/wp-content/uploads/2022/11/Stype-Health-Walk-Tracker-App-Design-Image-Preview-min.png" alt="image">
        </div>
    </div>
</div>
<!-- project area start -->
<section class="project-area">
    <div class="container">
        <div class="apps-project-wrapper-114 p-rel">
            <div class="swiper-container apps-project-active-114">
                <?php if($wp_query->have_posts()) : ?>
                <div class="swiper-wrapper">
                    <?php while($wp_query->have_posts()) : $wp_query->the_post();
                    $post_id = get_the_ID();
                    $categories = get_the_category();
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
                    <div class="swiper-slide">
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
                                            <button data-url="<?php echo $project_big_image ? esc_url($project_big_image): ''; ?>" data-bs-toggle="modal" data-bs-target="#modal_for_project" data-title="<?php echo get_the_title(); ?>" class="apps-has-portfolio-popup"><img src="<?php echo get_template_directory_uri(); ?>/assets/img/arrow-top-right.svg" alt="project"></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <?php endif; ?>
            </div>
            <div class="apps-project-pagination-wrapper-114">
                <div class="apps-project-next-114"><i class="fa-thin fa-arrow-right"></i></div>
                <div class="apps-project-prev-114"><i class="fa-thin fa-arrow-left"></i></div>
            </div>
        </div>
    </div>
</section>
<!-- project area end -->