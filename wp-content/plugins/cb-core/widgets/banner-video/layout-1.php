<!-- subscribe area start -->
<section class="apps-fz-video-promotion-area bg-default pt-310 pb-310 p-rel fix " data-background="<?php echo esc_url($settings['video_bg']['url']) ? esc_url($settings['video_bg']['url']): ''; ?>">
    <?php if(!empty($settings['video_id'])) : ?>
    <div class="apps-fz-video-promotion-content ">
        <a href="#0" class="js-modal-btn" data-video-id="<?php echo esc_attr($settings['video_id']); ?>"><i class="fa-solid fa-play"></i></a>
    </div>
    <?php endif; ?>
</section>
<!-- subscribe area end -->