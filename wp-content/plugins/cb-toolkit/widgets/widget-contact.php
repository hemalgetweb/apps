<?php

class widget_contact extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('contact Widget.','cb-toolkit') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'contact' );
		 parent::__construct( 'contact', esc_html__('CB Toolkit contact','cb-toolkit'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
        $title = empty($instance['title']) ? '' : $instance['title'];
        $description = empty($instance['description']) ? '' : $instance['description'];
        $email_text = empty($instance['email_text']) ? '' : $instance['email_text'];
        $email_link = empty($instance['email_link']) ? '' : $instance['email_link'];
        $number_text = empty($instance['number_text']) ? '' : $instance['number_text'];
        $number_link = empty($instance['number_link']) ? '' : $instance['number_link'];
        $website_url_text = empty($instance['website_url_text']) ? '' : $instance['website_url_text'];
        $website_url_link = empty($instance['website_url_link']) ? '' : $instance['website_url_link'];
        $email_label = empty($instance['email_label']) ? '' : $instance['email_label'];
        $number_label = empty($instance['number_label']) ? '' : $instance['number_label'];
        $website_label = empty($instance['website_label']) ? '' : $instance['website_label'];
    ?>
        <?php echo $before_widget; ?>
        <div class="apps-footer-contact-widget-data">
            <?php
                if($title) {
                    echo $before_title . $title . $after_title;
                }
            ?>
            <?php if(!empty($description)) : ?>
                <p><?php echo __($description); ?></p>
            <?php endif; ?>
            <p>
                <?php if(!empty($email_label)) : ?>
                    <label><?php echo esc_html($email_label); ?></label>
                <?php endif; ?>
                <?php if(!empty($email_text)) : ?>
                    <a href="<?php echo esc_url('mailto:' . $email_link); ?>"><?php echo esc_html($email_text); ?></a>
                <?php endif; ?>
            </p>
            <p>
                <?php if(!empty($number_label)) : ?>
                    <label><?php echo esc_html($number_label); ?></label>
                <?php endif; ?>
                <?php if(!empty($number_text)) : ?>
                    <a href="<?php echo esc_url('tel:' . $number_link); ?>"><?php echo esc_html($number_text); ?></a>
                <?php endif; ?>
            </p>
            <p class="mb-0">
                <?php if(!empty($website_label)) : ?>
                    <label><?php echo esc_html($website_label); ?></label>
                <?php endif; ?>
                <?php if(!empty($website_url_text)) : ?>
                    <a href="<?php echo esc_url($website_url_link); ?>"><?php echo esc_html($website_url_text); ?></a>
                <?php endif; ?>
            </p>
        </div>
        <?php echo $after_widget;

	}
	
	// Update
	function update( $new_instance, $old_instance ) {  
		$instance = $old_instance;

		$instance['title'] = strip_tags($new_instance['title']);
		$instance['description'] = __($new_instance['description']);
		$instance['email_text'] = strip_tags($new_instance['email_text']);
		$instance['email_link'] = strip_tags($new_instance['email_link']);
		$instance['number_text'] = strip_tags($new_instance['number_text']);
		$instance['number_link'] = strip_tags($new_instance['number_link']);
		$instance['website_url_text'] = strip_tags($new_instance['website_url_text']);
		$instance['website_url_link'] = strip_tags($new_instance['website_url_link']);
		$instance['email_label'] = strip_tags($new_instance['email_label']);
		$instance['number_label'] = strip_tags($new_instance['number_label']);
		$instance['website_label'] = strip_tags($new_instance['website_label']);
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		$defaults = array('email_text' => '', 'description' => '', 'email_text' => '', 'email_link'=> '', 'number_text' => '', 'number_link' => '', 'website_url_text' => '', 'website_url_link' => '', 'email_label' => '', 'number_label' => '', 'website_label' => '', 'title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('title:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $instance['title']; ?>">
		</p>
        <p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('description')); ?>"><?php echo esc_html__('Description:','cb-toolkit'); ?></label>
			<textarea class="widefat" style="width: 216px;height: 100px;" id="<?php echo esc_attr($this->get_field_id('description')); ?>" name="<?php echo esc_attr( $this->get_field_name('description')); ?>"><?php echo $instance['description']; ?></textarea>
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('email_label')); ?>"><?php echo esc_html__('Email Label:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('email_label')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('email_label')); ?>" value="<?php echo $instance['email_label']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('email_text')); ?>"><?php echo esc_html__('Email Text:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('email_text'); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('email_text')); ?>" value="<?php echo $instance['email_text']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('email_link')); ?>"><?php echo esc_html__('EmailLink:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('email_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('email_link')); ?>" value="<?php echo $instance['email_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('number_label')); ?>"><?php echo esc_html__('Number Label:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('number_label')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('number_label')); ?>" value="<?php echo $instance['number_label']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('number_text')); ?>"><?php echo esc_html__('Number Text:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('number_text')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('number_text')); ?>" value="<?php echo $instance['number_text']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo $this->get_field_id('number_link'); ?>"><?php echo esc_html__('Number Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('number_link')); ?>"  style="width: 216px;" id="<?php echo $this->get_field_id('number_link'); ?>" value="<?php echo $instance['number_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('website_label')); ?>"><?php echo esc_html__('Website Label:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('website_label')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('website_label')); ?>" value="<?php echo $instance['website_label']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('website_url_text')); ?>"><?php echo esc_html__('Website URL Text:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('website_url_text')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('website_url_text')); ?>" value="<?php echo $instance['website_url_text']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('website_url_link')); ?>"><?php echo esc_html__('Website URL Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo $this->get_field_name('website_url_link'); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('website_url_link')); ?>" value="<?php echo $instance['website_url_link']; ?>">
		</p>
		
        <p>
		  <?php echo esc_html__('customize your contact','cb-toolkit'); ?>
		</p>
	<?php
	}
}

// Add Widget
function widget_contact_list_init() {
	register_widget('widget_contact');
}
add_action('widgets_init', 'widget_contact_list_init');

?>