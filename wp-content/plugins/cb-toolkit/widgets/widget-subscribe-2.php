<?php
	
	add_action('widgets_init', 'cb_subscriber_widget_2');
	function cb_subscriber_widget_2() {
		register_widget('cb_subscriber_widget_2');
	}
	class cb_subscriber_widget_2  extends WP_Widget{
		public function __construct(){
			parent::__construct('cb_subscriber_widget_2',esc_html__('CB Footer Subscriber 2','cb-toolkit'),array());
		}
		public function widget($args,$instance){
			$title = $instance['title'];
			extract($args);
			extract($instance);
		 	print $before_widget; 
		?>
        <?php
			if($title) {
				echo $before_title . $title . $after_title;
			}
		?>
        <?php if( !empty($mailchimp_shortcode) ): ?>
            <?php print do_shortcode($mailchimp_shortcode); ?>
        <?php endif; ?>
        <h4 class="apps-fz-gateway-title"><?php echo esc_html__('Payment Gateway', 'cb-toolkit'); ?></h4>
        <img src="https://revelwp.codebasket.net/wp-content/uploads/2023/01/payment-gateway-1.png" alt="<?php echo esc_attr__('img', 'cb-toolkit'); ?>"> 
		<?php
		}
		/**
		 * widget function.
		 *
		 * @see WP_Widget
		 * @access public
		 * @param array $instance
		 * @return void
		 */
		public function form($instance){
			$title  = isset($instance['title'])? $instance['title']:'';
			$mailchimp_shortcode  = isset($instance['mailchimp_shortcode'])? $instance['mailchimp_shortcode']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>" />

			<p>
				<label for="title"><?php esc_html_e('Mailchimp Shortcode:','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">
			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';
			return $instance;
		}
	}