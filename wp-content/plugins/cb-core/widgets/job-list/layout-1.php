<?php


?>
<!-- job list area start -->
<section class="job-list-area">
    <div class="container">
        <h5 class="apps-job-list-title-114"><?php echo esc_html('All Jobs', 'cb-core'); ?> (<?php echo $wp_query->found_posts; ?>)</h5>
        <?php if($wp_query->have_posts()) : ?>
        <div class="row">
            <?php while($wp_query->have_posts()) :
                $wp_query->the_post();
                $onsite = get_post_meta(get_the_ID(), 'onsite', true);
                $job_duration = get_post_meta(get_the_ID(), 'job_duration', true);

                /**
                 * application with nonce
                 */
                // pass page id to application form
                $post_id = get_the_ID();
                $nonce = wp_create_nonce('add-application-'. $post_id);
                $url = '';
                $get_selected_page_from_settings = get_option('application_form_page_id');
                if($get_selected_page_from_settings) {
                $selected_page_url = get_the_permalink($get_selected_page_from_settings);
                $url = add_query_arg(
                    array(
                    'post' => $post_id,
                    'action' => 'add',
                    '_wpnonce' => $nonce
                    ),
                    $selected_page_url
                );
                }
            ?>
            <div class="col-xxl-12">
                <div class="apps-job-list-box-114 mb-20">
                    <div class="apps-job-list-box-title-114">
                        <h5 class="title"><a href="<?php echo get_the_permalink(get_the_ID()); ?>"><?php echo get_the_title(get_the_ID()); ?></a></h5>
                        <div class="apps-job-list-box-meta-114">
                            <?php if(!empty($job_duration)) : ?>
                                <span><?php echo esc_html($job_duration); ?></span>
                            <?php endif; ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/rect.svg" alt="rect" />
                            <?php if(!empty($onsite)) : ?>
                                <span><?php echo esc_html($onsite); ?></span>
                            <?php endif; ?>
                        </div>
                        <p><?php echo get_the_excerpt(get_the_ID()); ?></p>
                        <div class="apps-job-list-box-action-list-114">
                            <a href="<?php echo esc_url($url); ?>" class="apps-btn-primary-114 mr-20">Apply now <i class="fal fa-arrow-right"></i></a>
                            <a href="<?php echo the_permalink(get_the_ID()); ?>" class="apps-btn-transparent-border-114"><?php echo __('view job details', 'cb-core'); ?> <i class="fal fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
</section>
<!-- job list area end -->