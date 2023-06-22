<?php

class widget_Social extends WP_Widget { 
	
	// Widget Settings
	function __construct() {
		$widget_ops = array('description' => esc_html__('Social list widget.','cb-toolkit') );
		$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'social' );
		 parent::__construct( 'social', esc_html__('CB Toolkit Social','cb-toolkit'), $widget_ops, $control_ops );
	}


	
	// Widget Output
	function widget($args, $instance) {

		extract($args);
        $title = empty($instance['title']) ? '' : $instance['title'];
        $facebook_link = empty($instance['facebook_link']) ? '' : $instance['facebook_link'];
        $twitter_link = empty($instance['twitter_link']) ? '' : $instance['twitter_link'];
        $instagram_link = empty($instance['instagram_link']) ? '' : $instance['instagram_link'];
        $youtube_link = empty($instance['youtube_link']) ? '' : $instance['youtube_link'];
        $linkedin_link = empty($instance['linkedin_link']) ? '' : $instance['linkedin_link'];
        $pinterest_link = empty($instance['pinterest_link']) ? '' : $instance['pinterest_link'];
       
    ?>
        <?php echo $before_widget; ?>
        <?php
            if($title) {
                echo $before_title . $title . $after_title;
            }
        ?>
        <ul class="nav flex-column">
            <?php if(!empty($facebook_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($facebook_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4153_5738)">
                                <path d="M16 8C16 3.58172 12.4183 0 8 0C3.58172 0 0 3.58172 0 8C0 11.993 2.92547 15.3027 6.75 15.9028V10.3125H4.71875V8H6.75V6.2375C6.75 4.2325 7.94438 3.125 9.77172 3.125C10.6467 3.125 11.5625 3.28125 11.5625 3.28125V5.25H10.5538C9.56 5.25 9.25 5.86672 9.25 6.5V8H11.4688L11.1141 10.3125H9.25V15.9028C13.0745 15.3027 16 11.993 16 8Z" fill="#8ECFE3"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_4153_5738">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="px-2">
                        <?php echo __('Facebook', 'cb-toolkit'); ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!empty($twitter_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($twitter_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M5.03344 14.5005C11.0697 14.5005 14.3722 9.49829 14.3722 5.16173C14.3722 5.0211 14.3691 4.87735 14.3628 4.73673C15.0052 4.27213 15.5597 3.69666 16 3.03735C15.4017 3.30355 14.7664 3.47741 14.1159 3.55298C14.8009 3.14243 15.3137 2.49747 15.5594 1.73767C14.915 2.11953 14.2104 2.3889 13.4756 2.53423C12.9806 2.0082 12.326 1.6599 11.6131 1.54319C10.9003 1.42648 10.1688 1.54786 9.53183 1.88855C8.89486 2.22925 8.38787 2.77029 8.08923 3.42803C7.7906 4.08577 7.71695 4.82356 7.87969 5.52735C6.575 5.46188 5.29862 5.12296 4.13332 4.53255C2.96802 3.94215 1.9398 3.11345 1.11531 2.10017C0.696266 2.82265 0.568038 3.67758 0.756687 4.49122C0.945337 5.30485 1.43671 6.01612 2.13094 6.48048C1.60975 6.46393 1.09998 6.32361 0.64375 6.0711V6.11173C0.643283 6.86992 0.905399 7.60488 1.38554 8.19167C1.86568 8.77846 2.53422 9.18086 3.2775 9.33048C2.7947 9.46257 2.28799 9.48182 1.79656 9.38673C2.0063 10.0388 2.41438 10.6091 2.96385 11.018C3.51331 11.427 4.17675 11.6542 4.86156 11.668C3.69895 12.5812 2.26278 13.0766 0.784375 13.0742C0.522191 13.0738 0.260266 13.0578 0 13.0261C1.5019 13.9897 3.24902 14.5014 5.03344 14.5005Z" fill="#8ECFE3"></path>
                        </svg>
                    </span>
                    <span class="px-2">
                    <?php echo __('Twitter', 'cb-toolkit'); ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!empty($instagram_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($instagram_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4153_5740)">
                                <path d="M8 1.44062C10.1375 1.44062 10.3906 1.45 11.2313 1.4875C12.0125 1.52187 12.4344 1.65313 12.7156 1.7625C13.0875 1.90625 13.3563 2.08125 13.6344 2.35938C13.9156 2.64062 14.0875 2.90625 14.2313 3.27813C14.3406 3.55938 14.4719 3.98438 14.5063 4.7625C14.5438 5.60625 14.5531 5.85938 14.5531 7.99375C14.5531 10.1313 14.5438 10.3844 14.5063 11.225C14.4719 12.0063 14.3406 12.4281 14.2313 12.7094C14.0875 13.0813 13.9125 13.35 13.6344 13.6281C13.3531 13.9094 13.0875 14.0813 12.7156 14.225C12.4344 14.3344 12.0094 14.4656 11.2313 14.5C10.3875 14.5375 10.1344 14.5469 8 14.5469C5.8625 14.5469 5.60938 14.5375 4.76875 14.5C3.9875 14.4656 3.56563 14.3344 3.28438 14.225C2.9125 14.0813 2.64375 13.9063 2.36563 13.6281C2.08438 13.3469 1.9125 13.0813 1.76875 12.7094C1.65938 12.4281 1.52813 12.0031 1.49375 11.225C1.45625 10.3813 1.44688 10.1281 1.44688 7.99375C1.44688 5.85625 1.45625 5.60313 1.49375 4.7625C1.52813 3.98125 1.65938 3.55938 1.76875 3.27813C1.9125 2.90625 2.0875 2.6375 2.36563 2.35938C2.64688 2.07812 2.9125 1.90625 3.28438 1.7625C3.56563 1.65313 3.99063 1.52187 4.76875 1.4875C5.60938 1.45 5.8625 1.44062 8 1.44062ZM8 0C5.82813 0 5.55625 0.009375 4.70313 0.046875C3.85313 0.084375 3.26875 0.221875 2.7625 0.41875C2.23438 0.625 1.7875 0.896875 1.34375 1.34375C0.896875 1.7875 0.625 2.23438 0.41875 2.75938C0.221875 3.26875 0.084375 3.85 0.046875 4.7C0.009375 5.55625 0 5.82812 0 8C0 10.1719 0.009375 10.4438 0.046875 11.2969C0.084375 12.1469 0.221875 12.7313 0.41875 13.2375C0.625 13.7656 0.896875 14.2125 1.34375 14.6562C1.7875 15.1 2.23438 15.375 2.75938 15.5781C3.26875 15.775 3.85 15.9125 4.7 15.95C5.55313 15.9875 5.825 15.9969 7.99688 15.9969C10.1688 15.9969 10.4406 15.9875 11.2938 15.95C12.1438 15.9125 12.7281 15.775 13.2344 15.5781C13.7594 15.375 14.2063 15.1 14.65 14.6562C15.0938 14.2125 15.3688 13.7656 15.5719 13.2406C15.7688 12.7313 15.9063 12.15 15.9438 11.3C15.9813 10.4469 15.9906 10.175 15.9906 8.00313C15.9906 5.83125 15.9813 5.55938 15.9438 4.70625C15.9063 3.85625 15.7688 3.27188 15.5719 2.76562C15.375 2.23438 15.1031 1.7875 14.6563 1.34375C14.2125 0.9 13.7656 0.625 13.2406 0.421875C12.7313 0.225 12.15 0.0875 11.3 0.05C10.4438 0.009375 10.1719 0 8 0Z" fill="#8ECFE3"></path>
                                <path d="M8 3.89062C5.73125 3.89062 3.89062 5.73125 3.89062 8C3.89062 10.2688 5.73125 12.1094 8 12.1094C10.2688 12.1094 12.1094 10.2688 12.1094 8C12.1094 5.73125 10.2688 3.89062 8 3.89062ZM8 10.6656C6.52813 10.6656 5.33437 9.47188 5.33437 8C5.33437 6.52813 6.52813 5.33437 8 5.33437C9.47188 5.33437 10.6656 6.52813 10.6656 8C10.6656 9.47188 9.47188 10.6656 8 10.6656Z" fill="#8ECFE3"></path>
                                <path d="M13.2312 3.72891C13.2312 4.26016 12.8 4.68828 12.2719 4.68828C11.7406 4.68828 11.3125 4.25703 11.3125 3.72891C11.3125 3.19766 11.7438 2.76953 12.2719 2.76953C12.8 2.76953 13.2312 3.20078 13.2312 3.72891Z" fill="#8ECFE3"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_4153_5740">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>

                    </span>
                    <span class="px-2">
                    <?php echo __('Instagram', 'cb-toolkit'); ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!empty($youtube_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($youtube_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.8406 4.79922C15.8406 4.79922 15.6844 3.69609 15.2031 3.21172C14.5938 2.57422 13.9125 2.57109 13.6 2.53359C11.3625 2.37109 8.00313 2.37109 8.00313 2.37109H7.99687C7.99687 2.37109 4.6375 2.37109 2.4 2.53359C2.0875 2.57109 1.40625 2.57422 0.796875 3.21172C0.315625 3.69609 0.1625 4.79922 0.1625 4.79922C0.1625 4.79922 0 6.09609 0 7.38984V8.60234C0 9.89609 0.159375 11.193 0.159375 11.193C0.159375 11.193 0.315625 12.2961 0.79375 12.7805C1.40313 13.418 2.20313 13.3961 2.55938 13.4648C3.84063 13.5867 8 13.6242 8 13.6242C8 13.6242 11.3625 13.618 13.6 13.4586C13.9125 13.4211 14.5938 13.418 15.2031 12.7805C15.6844 12.2961 15.8406 11.193 15.8406 11.193C15.8406 11.193 16 9.89922 16 8.60234V7.38984C16 6.09609 15.8406 4.79922 15.8406 4.79922ZM6.34688 10.0742V5.57734L10.6687 7.83359L6.34688 10.0742Z" fill="#8ECFE3"></path>
                        </svg>
                    </span>
                    <span class="px-2">
                    <?php echo __('Youtube', 'cb-toolkit'); ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!empty($linkedin_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($linkedin_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4153_5742)">
                                <path d="M14.8156 0H1.18125C0.528125 0 0 0.515625 0 1.15313V14.8438C0 15.4813 0.528125 16 1.18125 16H14.8156C15.4688 16 16 15.4813 16 14.8469V1.15313C16 0.515625 15.4688 0 14.8156 0ZM4.74687 13.6344H2.37188V5.99687H4.74687V13.6344ZM3.55938 4.95625C2.79688 4.95625 2.18125 4.34062 2.18125 3.58125C2.18125 2.82188 2.79688 2.20625 3.55938 2.20625C4.31875 2.20625 4.93437 2.82188 4.93437 3.58125C4.93437 4.3375 4.31875 4.95625 3.55938 4.95625ZM13.6344 13.6344H11.2625V9.92188C11.2625 9.0375 11.2469 7.89687 10.0281 7.89687C8.79375 7.89687 8.60625 8.8625 8.60625 9.85938V13.6344H6.2375V5.99687H8.5125V7.04063H8.54375C8.85938 6.44063 9.63438 5.80625 10.7875 5.80625C13.1906 5.80625 13.6344 7.3875 13.6344 9.44375V13.6344Z" fill="#8ECFE3"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_4153_5742">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>

                    </span>
                    <span class="px-2">
                    <?php echo __('Linkedin', 'cb-toolkit'); ?>
                    </span>
                </a>
            </li>
            <?php endif; ?>
            <?php if(!empty($pinterest_link)) : ?>
            <li class="nav-item mb-3">
                <a href="<?php echo esc_url($pinterest_link); ?>" class="nav-link p-0 fw-normal fs-14">
                    <span>
                        <svg class="mt-0" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <g clip-path="url(#clip0_4153_5743)">
                                <path d="M8 0C3.58125 0 0 3.58125 0 8C0 11.3906 2.10938 14.2844 5.08437 15.45C5.01562 14.8156 4.95 13.8469 5.1125 13.1562C5.25938 12.5312 6.05 9.18125 6.05 9.18125C6.05 9.18125 5.80937 8.70313 5.80937 7.99375C5.80937 6.88125 6.45312 6.05 7.25625 6.05C7.9375 6.05 8.26875 6.5625 8.26875 7.17812C8.26875 7.86562 7.83125 8.89062 7.60625 9.84062C7.41875 10.6375 8.00625 11.2875 8.79062 11.2875C10.2125 11.2875 11.3062 9.7875 11.3062 7.625C11.3062 5.70938 9.93125 4.36875 7.96562 4.36875C5.69062 4.36875 4.35313 6.075 4.35313 7.84062C4.35313 8.52812 4.61875 9.26562 4.95 9.66562C5.01562 9.74375 5.025 9.81563 5.00625 9.89375C4.94688 10.1469 4.80938 10.6906 4.78438 10.8C4.75 10.9469 4.66875 10.9781 4.51562 10.9062C3.51562 10.4406 2.89062 8.98125 2.89062 7.80625C2.89062 5.28125 4.725 2.96563 8.175 2.96563C10.95 2.96563 13.1062 4.94375 13.1062 7.5875C13.1062 10.3438 11.3688 12.5625 8.95625 12.5625C8.14688 12.5625 7.38437 12.1406 7.12187 11.6438C7.12187 11.6438 6.72188 13.1719 6.625 13.5469C6.44375 14.2406 5.95625 15.1125 5.63125 15.6438C6.38125 15.875 7.175 16 8 16C12.4187 16 16 12.4187 16 8C16 3.58125 12.4187 0 8 0Z" fill="#8ECFE3"></path>
                            </g>
                            <defs>
                                <clipPath id="clip0_4153_5743">
                                    <rect width="16" height="16" fill="white"></rect>
                                </clipPath>
                            </defs>
                        </svg>
                    </span>
                    <span class="px-2">
                        Pinterest
                    </span>
                </a>
            </li>
            <?php endif; ?>
        </ul>























        <div class="apps-footer-social-widget-data d-none">
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
		$instance['facebook_link'] = __($new_instance['facebook_link']);
		$instance['twitter_link'] = strip_tags($new_instance['twitter_link']);
		$instance['instagram_link'] = strip_tags($new_instance['instagram_link']);
		$instance['youtube_link'] = strip_tags($new_instance['youtube_link']);
		$instance['linkedin_link'] = strip_tags($new_instance['linkedin_link']);
		$instance['pinterest_link'] = strip_tags($new_instance['pinterest_link']);
		return $instance;
	}
	
	// Backend Form
	function form($instance) {
		$defaults = array('facebook_link' => '', 'twitter_link' => '', 'instagram_link' => '', 'youtube_link'=> '', 'linkedin_link' => '', 'pinterest_link' => '', 'title' => '');
		$instance = wp_parse_args((array) $instance, $defaults); ?>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('title:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('title')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('title')); ?>" value="<?php echo $instance['title']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('facebook_link')); ?>"><?php echo esc_html__('Facebook Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('facebook_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('facebook_link')); ?>" value="<?php echo $instance['facebook_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('twitter_link')); ?>"><?php echo esc_html__('Twitter Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('twitter_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('twitter_link')); ?>" value="<?php echo $instance['twitter_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('instagram_link')); ?>"><?php echo esc_html__('Instagram Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('instagram_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('instagram_link')); ?>" value="<?php echo $instance['instagram_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('youtube_link')); ?>"><?php echo esc_html__('Youtube Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('youtube_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('youtube_link')); ?>" value="<?php echo $instance['youtube_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('linkedin_link')); ?>"><?php echo esc_html__('Linkedin Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('linkedin_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('linkedin_link')); ?>" value="<?php echo $instance['linkedin_link']; ?>">
		</p>
		<p>
			<label style="display: block;margin-bottom: 7px;" for="<?php echo esc_attr($this->get_field_id('pinterest_link')); ?>"><?php echo esc_html__('Pinterest Link:','cb-toolkit'); ?></label>
            <input type="text" name="<?php echo esc_attr($this->get_field_name('pinterest_link')); ?>"  style="width: 216px;" id="<?php echo esc_attr($this->get_field_id('pinterest_link')); ?>" value="<?php echo $instance['pinterest_link']; ?>">
		</p>
        <p>
		  <?php echo esc_html__('customize your social','cb-toolkit'); ?>
		</p>
	<?php
	}
}

// Add Widget
function widget_social_list_init() {
	register_widget('widget_Social');
}
add_action('widgets_init', 'widget_social_list_init');

?>