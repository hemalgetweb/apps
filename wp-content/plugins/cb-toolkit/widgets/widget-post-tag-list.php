<?php 
Class CB_Toolkit_Widget_Post_Tag_List extends WP_Widget{

	public function __construct(){
		parent::__construct('cb-widget-post-list', __('CB Toolkit Widgeth Post TagCloud List', 'cb-toolkit'), array(
			'description'	=> esc_html__('This is a widget post tag list', 'cb-toolkit')
		));
	}


	public function widget($args, $instance){

		extract($args);
		$count = $instance['count'] ? $instance['count']: 3;
		$post_cat_order = ! empty( $instance['post_cat_order'] ) ? $instance['post_cat_order'] : esc_html__( 'DESC', 'cb-toolkit' );
	 	echo $before_widget; 
	 	if($instance['title']):
     	echo $before_title; ?> 
     	<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
     	<?php echo $after_title; ?>
     	<?php endif; ?>
        <ul class="d-flex gap-2 flex-wrap list-unstyled p-4 bg-white">
            <?php 
            $args = array (
                    'taxonomy' => 'post_tag', //empty string(''), false, 0 don't work, and return empty array
                    'orderby' => 'name',
                    'order' => $post_cat_order,
                    'hide_empty' => true,
            );
            $tags = get_terms($args);
            ?>
            <?php if ( !empty($tags) && is_array( $tags ) ) : ?>
                <?php foreach ( $tags as $tag ) : ?>
                    <li>
                        <a href="<?php echo esc_url( get_tag_link( $tag->term_id)); ?>"
                            class="fs-12 fw-bold text-clr-dark3 text-decoration-none text-uppercase d-inline-flex ls-1 gap-2 p-2 border-dark1">
                            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/title-process-icon.svg" alt="iocn" class="img-fluid">
                           <?php echo esc_html($tag->name); ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            <?php endif; ?>
        </ul>

		<?php echo $after_widget; ?>

		<?php
	}



	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'cb-toolkit' );
		$post_cat_order = ! empty( $instance['post_cat_order'] ) ? $instance['post_cat_order'] : esc_html__( 'DESC', 'cb-toolkit' );
	?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php echo esc_html__('How many tags you want to show ?', 'cb-toolkit'); ?></label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

	<?php }

}

add_action('widgets_init', function(){
	register_widget('CB_Toolkit_Widget_Post_Tag_List');
});