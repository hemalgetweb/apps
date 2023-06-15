<?php 
Class CB_Toolkit_Banner extends WP_Widget{

	public function __construct(){
		parent::__construct('cb-toolkit-banner', __('CB Toolkit Banner', 'cb-toolkit'), array(
			'description'	=> esc_html__('CB Toolkit Banner', 'cb-toolkit')
		));
	}

 
	public function widget($args, $instance){
		extract($args);
		$title = $instance['title'] ? $instance['title']:'';
		$content = $instance['content'] ? $instance['content']:'';
		$btn_text = $instance['btn_text'] ? $instance['btn_text']:'';
		$btn_link = $instance['btn_link'] ? $instance['btn_link']:'';
		$image_uri = $instance['image_uri'] ? $instance['image_uri']:'';?>
		 <div class="apps-blog-sidebar apps-blog-sidebar-ad text-center" data-background="<?php echo esc_url($image_uri); ?>">
			<?php if(!empty($title)) : ?>
				<h4 class="apps-add-title"><?php echo esc_html($title); ?></h4>
			<?php endif; ?>
			<?php if(!empty($content)) : ?>
				<p><?php echo esc_html($content); ?></p>
			<?php endif; ?>
			<?php if(!empty($btn_text)) : ?>
				<a href="<?php echo esc_url($btn_link); ?>" class="apps-add-btn"><?php echo esc_html($btn_text); ?></a>
			<?php endif; ?>
		</div>


		<?php
	}


	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['content'] = __($new_instance['content']);
		$instance['btn_text'] = strip_tags($new_instance['btn_text']);
		$instance['btn_link'] = strip_tags($new_instance['btn_link']);
		$instance['image_uri'] = strip_tags($new_instance['image_uri']);
		return $instance;
	}
	public function form($instance){
		$title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$content = ! empty( $instance['content'] ) ? $instance['content'] : '';
		$btn_text = ! empty( $instance['btn_text'] ) ? $instance['btn_text'] : '';
		$btn_link = ! empty( $instance['btn_link'] ) ? $instance['btn_link'] : '';
		$image_uri = ! empty( $instance['image_uri'] ) ? $instance['image_uri'] : '';
	?>	
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('image_uri')); ?>"><?php echo esc_html__('Image', 'cb-toolkit'); ?></label><br />
			<input type="text" class="img" name="<?php echo esc_attr($this->get_field_name('image_uri')); ?>" id="<?php echo esc_attr($this->get_field_id('image_uri')); ?>" value="<?php echo esc_attr($image_uri); ?>" />
			<input type="button" class="select-img" value="<?php echo esc_html__('Select Image', 'cb-toolkit'); ?>" />
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('content')); ?>"><?php echo esc_html__('Content', 'cb-toolkit'); ?></label>
			<textarea name="<?php echo esc_attr($this->get_field_name('content')); ?>" id="<?php echo esc_attr($this->get_field_id('content')); ?>" cols="30" rows="10" class="widefat"><?php echo esc_html( $content ); ?></textarea>
		</p>
		<p>
			<label for="<?php echo esc_attr($this->get_field_id('btn_text')); ?>"><?php echo esc_html__('Button Text', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name('btn_text')); ?>" id="<?php echo esc_attr($this->get_field_id('btn_text')); ?>" value="<?php echo esc_attr( $btn_text ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('btn_link'); ?>"><?php echo esc_html__('Button Link', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('btn_link'); ?>" id="<?php echo $this->get_field_id('btn_link'); ?>" value="<?php echo esc_attr( $btn_link ); ?>" class="widefat">
		</p>

	<?php }


}




add_action('widgets_init', function(){
	register_widget('CB_Toolkit_Banner');
});