<?php 
Class CB_Toolkit_Question extends WP_Widget{

	public function __construct(){
		parent::__construct('cb-toolkit-question', __('CB Toolkit Question', 'cb-toolkit'), array(
			'description'	=> esc_html__('CB Toolkit Question', 'cb-toolkit')
		));
	}


    function widget($args, $instance) {

		extract($args);
        $title = empty($instance['title']) ? '' : $instance['title'];
        $select_form = empty($instance['select_form']) ? '' : $instance['select_form'];
    ?>
        <?php echo $before_widget; ?>
        <?php
            if($title) {
                echo $before_title . $title . $after_title;
            }
            if (!empty($select_form)) {
                echo cb_toolkit_do_shortcode('contact-form-7', [
                    'id' => $select_form,
                ]);
            }
        ?>
        <?php echo $after_widget;
	}


	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['select_form'] = __($new_instance['select_form']);
		return $instance;
	}
	public function form($instance){
        $title = ! empty( $instance['title'] ) ? $instance['title'] : '';
		$select_form = ! empty( $instance['select_form'] ) ? $instance['select_form'] : '';
        $form_list_names = cb_toolkit_get_cf7_forms();
        $form_list_ids = cb_toolkit_get_cf7_form_ids();
        $form_list = array_combine($form_list_ids, $form_list_names);
	?>
		<p>
			<label for="<?php echo $this->get_field_id('title'); ?>"><?php echo esc_html__('Title', 'cb-toolkit'); ?></label>
			<input type="text" name="<?php echo $this->get_field_name('title'); ?>" id="<?php echo $this->get_field_id('title'); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>
		<p>
			<label for="<?php echo $this->get_field_id('select_form'); ?>"><?php echo esc_html__('Select Form', 'cb-toolkit'); ?></label>
            <select class="widefat" name="<?php echo $this->get_field_name('select_form'); ?>" id="<?php echo $this->get_field_id('select_form'); ?>">
                <?php if(!empty($form_list)) : ?>
                    <?php foreach($form_list as $form_id => $form_name) : ?>
                        <option value="<?php echo esc_attr($form_id); ?>" <?php if ( $select_form === esc_attr($form_name) ) {echo 'selected="selected"';}?> ><?php echo esc_html($form_name); ?></option>
                    <?php endforeach; ?>
                <?php endif; ?>
            </select>
		</p>
		</p>

	<?php }


}




add_action('widgets_init', function(){
	register_widget('CB_Toolkit_Question');
});