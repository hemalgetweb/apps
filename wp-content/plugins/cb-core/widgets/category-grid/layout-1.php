<?php
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $this->add_link_attributes( 'btn_link', $settings['btn_link'] );
}
?>
<div class="popular-categories">
    <div class="container">
        <div class="panel">
            <div class="panel-header">
                <div class="row align-items-center g-lg-4 g-1">
                    <div class="col-lg-6 col-sm-9 col-12">
                        <?php if(!empty($settings['section_title'])) : ?>
                        <h2 class="title text-center has-heading-xs-space-bottom text-sm-start"><?php echo esc_html($settings['section_title']); ?></h2>
                        <?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-sm-3 col-12">
                        <?php if(!empty($settings['btn_text'])) : ?>
                        <div class="text-center text-sm-end">
                            <a <?php echo $this->get_render_attribute_string( 'btn_link' ); ?> class="explore-section"><?php echo esc_html($settings['btn_text']); ?></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if(!empty($cat_lists)) : ?>
            <div class="panel-body">
                <div class="custom-row">
                    <?php foreach($cat_lists as $index => $cat_id) : ?>
                        <?php if( $term = get_term_by( 'id', $cat_id, 'product_cat' ) ) :
                            $category_name = $term->name;
                            $cat_id = $term->term_id;
                            $thumbnail_id = get_term_meta( $cat_id, 'thumbnail_id', true );
                            $cat_link = get_term_link( $cat_id, 'product_cat' );
                            $cat_image_url = wp_get_attachment_url( $thumbnail_id );
                            $placeholder_image = $settings['placeholder_image']['url'];
                            if(empty($cat_image_url)) {
                                if(!empty($placeholder_image)) {
                                    $cat_image_url = esc_url($placeholder_image);
                                } else {
                                    $cat_image_url = esc_url('https://via.placeholder.com/167x138');
                                }
                            }
                        ?>
                            <div class="custom-col">
                                <div class="category-card">
                                    <?php if(!empty($cat_image_url)) : ?>
                                    <div class="part-img">
                                        <a href="<?php echo esc_url($cat_link); ?>"><img src="<?php echo esc_url($cat_image_url); ?>" alt="<?php echo get_post_meta(attachment_url_to_postid($cat_image_url), '_wp_attachment_image_alt', true); ?>"></a>
                                    </div>
                                    <?php endif; ?>
                                    <div class="part-txt">
                                        <h3>
                                            <a href="<?php echo esc_url($cat_link); ?>"><?php echo esc_html($category_name); ?></a>
                                        </h3>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>