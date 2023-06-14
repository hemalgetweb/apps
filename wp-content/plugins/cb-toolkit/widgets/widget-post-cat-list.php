<?php 
Class CB_Toolkit_Widget_Post_Category_List extends WP_Widget{

	public function __construct(){
		parent::__construct('cb-widget-post-list', __('CB Toolkit Widgeth Post Category List', 'cb-toolkit'), array(
			'description'	=> esc_html__('This is a widget post list', 'cb-toolkit')
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
		<div class="blog-sidebar-box-body p-30 px-30">
			<div class="apps-sidebar-category">
                <ul class="recent-post architect-3 list-unstyled mb-0 bg-white">
					<?php 
					$args = array (
							'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => $post_cat_order,
							'hide_empty' => true,
					);
					$categories = get_terms($args);
					?>
					<?php if ( !empty($categories) && is_array( $categories ) ) : ?>
						<?php foreach ( $categories as $category ) : ?>
                            <li class="recent-post-list py-2">
                                <a href="<?php echo esc_url( get_category_link( $category->term_id)); ?>"
                                    class="d-flex justify-content-between fs-18 fw-normal text-clr-dark1 text-decoration-none">
                                    <span class="category-name"><?php echo esc_html($category->name); ?></span>
                                    <span class="has-post"><?php echo esc_html($category->count); ?></span>
                                </a>
                            </li>
						<?php endforeach; ?>
					<?php endif; ?>
				</ul>
			</div>
		</div>

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
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php echo esc_html__('How many categories you want to show ?', 'cb-toolkit'); ?></label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

	<?php }

}

add_action('widgets_init', function(){
	register_widget('CB_Toolkit_Widget_Post_Category_List');
});