<?php
	
	add_action('widgets_init', 'cb_subscriber_widget');
	function cb_subscriber_widget() {
		register_widget('cb_subscriber_widget');
	}
	class cb_subscriber_widget  extends WP_Widget{
		public function __construct(){
			parent::__construct('cb_subscriber_widget',esc_html__('CB Footer Subscriber','cb-toolkit'),array(
				'description' => esc_html__('CB Toolkit Subscriber Widget','cb-toolkit'),
			));
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
		<?php if(!empty($instance['info'])) : ?>
		<span class="apps-fz-footer-widget-subscribe-subtitle-4"><?php echo  $instance['info']; ?></span>
		<?php endif; ?>
			<div class="apps-fz-footer-widget-subscribe-form-4 mb-25">
				<?php if( !empty($mailchimp_shortcode) ): ?>
					<?php print do_shortcode($mailchimp_shortcode); ?>
				<?php endif; ?>
			</div>
			<div class="apps-fz-footer-widget-app-wrapper-4">
				<div class="item-1">
					<a href="<?php echo esc_url($play_store_link); ?>" target="_blank"><img src="https://farzaawp.codebasket.net/fashion/wp-content/uploads/sites/4/2023/02/google-play.png" alt="Play store"></a>
				</div>
				<div class="item-2">
					<a href="<?php echo esc_url($app_store_link); ?>" target="_blank"><img src="https://farzaawp.codebasket.net/fashion/wp-content/uploads/sites/4/2023/02/app-store.png" alt="Apple store"></a>
				</div>
			</div>
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
			$info  = isset($instance['info'])? $instance['info']:'';
			$app_store_link  = isset($instance['app_store_link'])? $instance['app_store_link']:'';
			$play_store_link  = isset($instance['play_store_link'])? $instance['play_store_link']:'';
			?>
			<p>
				<label for="title"><?php esc_html_e('Title:','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('title')); ?>"  class="widefat" name="<?php print esc_attr($this->get_field_name('title')); ?>" value="<?php print esc_attr($title); ?>" />

			<p>
				<label for="title"><?php esc_html_e('Mailchimp Shortcode:','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('mailchimp_shortcode')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('mailchimp_shortcode')); ?>" value="<?php print esc_attr($mailchimp_shortcode); ?>">
			<p>
				<label for="info"><?php esc_html_e('Mailchimp Info:','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('info')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('info')); ?>" value="<?php print esc_attr($info); ?>">
			<p>
				<label for="play_store_link"><?php esc_html_e('Play Store Link','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('play_store_link')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('play_store_link')); ?>" value="<?php print esc_attr($play_store_link); ?>">
			<p>
				<label for="app_store_link"><?php esc_html_e('App Store Link','cb-toolkit'); ?></label>
			</p>
			<input type="text" id="<?php print esc_attr($this->get_field_id('app_store_link')); ?>" class="widefat" name="<?php print esc_attr($this->get_field_name('app_store_link')); ?>" value="<?php print esc_attr($app_store_link); ?>">

			<?php
		}
				
		public function update( $new_instance, $old_instance ) {
			$instance = array();
			$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
			$instance['mailchimp_shortcode'] = ( ! empty( $new_instance['mailchimp_shortcode'] ) ) ? strip_tags( $new_instance['mailchimp_shortcode'] ) : '';
			$instance['info'] = ( ! empty( $new_instance['info'] ) ) ? strip_tags( $new_instance['info'] ) : '';
			$instance['app_store_link'] = ( ! empty( $new_instance['app_store_link'] ) ) ? strip_tags( $new_instance['app_store_link'] ) : '';
			$instance['play_store_link'] = ( ! empty( $new_instance['play_store_link'] ) ) ? strip_tags( $new_instance['play_store_link'] ) : '';
			return $instance;
		}
	}