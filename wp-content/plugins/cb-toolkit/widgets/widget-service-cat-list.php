<?php 
Class Latest_Services_Category_List_Widget extends WP_Widget{

	public function __construct(){
		parent::__construct('cb-services-category-list', __('CB Toolkit Services Category List', 'cb-toolkit'), array(
			'description'	=> esc_html__('CB Toolkit Services List', 'cb-toolkit')
		));
	}


	public function widget($args, $instance){

		extract($args);
		$count = $instance['count'] ? $instance['count']: 3;
		$service_order = ! empty( $instance['service_order'] ) ? $instance['service_order'] : esc_html__( 'DESC', 'cb-toolkit' );
	 	echo $before_widget; 
	 	if($instance['title']):
     	echo $before_title; ?> 
     	<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
     	<?php echo $after_title; ?>
     	<?php endif; ?>
		<div class="blog-sidebar-box-body p-30 px-30">
			<div class="apps-sidebar-category">
				<ul>
					<?php 
					$args = array (
							'taxonomy' => 'category', //empty string(''), false, 0 don't work, and return empty array
							'orderby' => 'name',
							'order' => $service_order,
							'hide_empty' => true,
					);
					$categories = get_terms($args);
					?>
					<?php if ( !empty($categories) && is_array( $categories ) ) : ?>
						<?php foreach ( $categories as $category ) : ?>
							<li><a href="<?php echo esc_url( get_category_link( $category->term_id)); ?>" class="blog-sidebar-link d-flex justify-content-between align-items-center mb-20"><span><span class="fz-14 lh-0"><i class="icofont-simple-right"></i></span> <?php echo esc_html($category->name); ?></span><span>(<?php echo esc_html($category->count); ?>)</span></a></li>
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
		$service_order = ! empty( $instance['service_order'] ) ? $instance['service_order'] : esc_html__( 'DESC', 'cb-toolkit' );
	?>	
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo $this->get_field_id('count'); ?>"><?php echo esc_html__('How many services you want to show ?', 'cb-toolkit'); ?></label>
			<input type="number" name="<?php echo $this->get_field_name('count'); ?>" id="<?php echo $this->get_field_id('count'); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('service_order'); ?>"><?php echo esc_html__('Service Order','cb-toolkit'); ?></label>
			<select name="<?php echo $this->get_field_name('service_order'); ?>" id="<?php echo $this->get_field_id('service_order'); ?>" class="widefat">
				<option value="" disabled="disabled"><?php echo esc_html__('Select Post Order','cb-toolkit'); ?></option>
				<option value="<?php echo esc_attr__('ASC', 'cb-toolkit') ?>" <?php if($service_order === 'ASC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('ASC','cb-toolkit'); ?></option>
				<option value="<?php echo esc_attr__('DESC', 'cb-toolkit') ?>" <?php if($service_order === 'DESC'){ echo 'selected="selected"'; } ?>><?php echo esc_html__('DESC','cb-toolkit'); ?></option>
			</select>
		</p>

	<?php }

}

add_action('widgets_init', function(){
	register_widget('Latest_Services_Category_List_Widget');
});