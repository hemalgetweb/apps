<?php
Class Latest_posts_sidebar_Widget extends WP_Widget {

    public function __construct() {
        parent::__construct( 'cb-latest-posts', __('CB Toolkit Sidebar Posts Image', 'cb-toolkit'), [
            'description' => __('Latest Post Widget by apps', 'cb-toolkit'),
        ] );
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );

        echo $before_widget;
        if ( $instance['title'] ):
            echo $before_title;?>
	     			<?php echo apply_filters( 'widget_title', $instance['title'] ); ?>
	     		<?php echo $after_title; ?>
	     	<?php endif;?>
			 <div class="bg-white">
				<ul class="recent-post architect-2 list-unstyled mb-0">
				<?php
					$q = new WP_Query( [
						'post_type'      => 'post',
						'posts_per_page' => ( $instance['count'] ) ? $instance['count'] : '3',
						'order'          => ( $instance['posts_order'] ) ? $instance['posts_order'] : 'DESC',
						'orderby'        => 'date',
						'ignore_sticky_posts' => true,
						'tax_query' => [
							[
								'taxonomy' => 'post_format',
								'field' => 'slug',
								'terms' => array('post-format-quote'),
								'operator' => 'NOT IN'
							]
						]
					] );

					if ( $q->have_posts() ):
					while ( $q->have_posts() ): $q->the_post();
					$image_alt = get_post_meta(get_the_ID() , '_wp_attachment_image_alt', true);
					$posted_time = human_time_diff(get_the_time ( 'U' ), current_time( 'timestamp' ) );
				?>
				<li class="recent-post-list">
					<a href="<?php echo esc_url(get_the_permalink());?>" class="text-decoration-none d-flex gap-3 align-items-center">
						<div class="recent-post-featured-img">
							<img src="<?php print esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid flex-shrink-0">
						</div>
						<span class="recent-post-content">
							<h4 class="sidebar-recent-post-title d-block">
								<?php echo get_the_title(); ?>
							</h4>
							<p class="sidebar-recent-post-content"><?php echo wp_trim_words( get_the_excerpt(), 11 ); ?></p>
						</span>
					</a>
				</li>



				
				<div class="apps-sidebar-recent-post mb-20 d-none">
					<div class="apps-sidebar-recent-post-img">
						<a href="<?php echo esc_url(get_the_permalink());?>">
							<img src="<?php print esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );?>" alt="<?php echo esc_attr($image_alt); ?>">
						</a>
					</div>
					<div class="apps-fz-recent-post-content-447-448">
					<div class="apps-fz-blog-meta-wrap-447">
						<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><span><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_4003_25100)">
<path d="M21 24.0006H18V19.0006C18 18.4702 17.7893 17.9615 17.4142 17.5864C17.0391 17.2113 16.5304 17.0006 16 17.0006H8C7.46957 17.0006 6.96086 17.2113 6.58579 17.5864C6.21071 17.9615 6 18.4702 6 19.0006V24.0006H3V19.0006C3.00159 17.675 3.52888 16.4042 4.46622 15.4668C5.40356 14.5295 6.67441 14.0022 8 14.0006H16C17.3256 14.0022 18.5964 14.5295 19.5338 15.4668C20.4711 16.4042 20.9984 17.675 21 19.0006V24.0006Z" fill="#A8E0FF"/>
<path d="M12 11.9999C10.8133 11.9999 9.65328 11.648 8.66658 10.9887C7.67989 10.3294 6.91085 9.39234 6.45673 8.29598C6.0026 7.19963 5.88378 5.99323 6.11529 4.82934C6.3468 3.66545 6.91825 2.59635 7.75736 1.75724C8.59648 0.918125 9.66557 0.34668 10.8295 0.115169C11.9933 -0.116342 13.1997 0.00247765 14.2961 0.456603C15.3925 0.910729 16.3295 1.67976 16.9888 2.66646C17.6481 3.65315 18 4.81319 18 5.99988C17.9984 7.59069 17.3658 9.11589 16.2409 10.2408C15.116 11.3656 13.5908 11.9983 12 11.9999ZM12 2.99988C11.4067 2.99988 10.8266 3.17583 10.3333 3.50547C9.83994 3.83512 9.45543 4.30365 9.22836 4.85183C9.0013 5.40001 8.94189 6.00321 9.05765 6.58515C9.1734 7.16709 9.45912 7.70164 9.87868 8.1212C10.2982 8.54076 10.8328 8.82648 11.4147 8.94224C11.9967 9.05799 12.5999 8.99858 13.1481 8.77152C13.6962 8.54446 14.1648 8.15994 14.4944 7.66659C14.8241 7.17324 15 6.59322 15 5.99988C15 5.20423 14.6839 4.44117 14.1213 3.87856C13.5587 3.31595 12.7957 2.99988 12 2.99988Z" fill="#A8E0FF"/>
</g>
<defs>
<clipPath id="clip0_4003_25100">
<rect width="24" height="24" fill="white"/>
</clipPath>
</defs>
</svg>
</span><?php print esc_html(get_the_author());?></a>
						<span><span>
						<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
<g clip-path="url(#clip0_5416_129849)">
<path d="M17.5 1.66667H15V0H13.3333V1.66667H6.66667V0H5V1.66667H2.5C1.83696 1.66667 1.20107 1.93006 0.732233 2.3989C0.263392 2.86774 0 3.50363 0 4.16667L0 20H20V4.16667C20 3.50363 19.7366 2.86774 19.2678 2.3989C18.7989 1.93006 18.163 1.66667 17.5 1.66667ZM1.66667 4.16667C1.66667 3.94565 1.75446 3.73369 1.91074 3.57741C2.06702 3.42113 2.27899 3.33333 2.5 3.33333H17.5C17.721 3.33333 17.933 3.42113 18.0893 3.57741C18.2455 3.73369 18.3333 3.94565 18.3333 4.16667V6.66667H1.66667V4.16667ZM1.66667 18.3333V8.33333H18.3333V18.3333H1.66667Z" fill="#A8E0FF"/>
<path d="M14.1667 10.8335H12.5V12.5002H14.1667V10.8335Z" fill="#A8E0FF"/>
<path d="M10.8346 10.8335H9.16797V12.5002H10.8346V10.8335Z" fill="#A8E0FF"/>
<path d="M7.49869 10.8335H5.83203V12.5002H7.49869V10.8335Z" fill="#A8E0FF"/>
<path d="M14.1667 14.1667H12.5V15.8334H14.1667V14.1667Z" fill="#A8E0FF"/>
<path d="M10.8346 14.1667H9.16797V15.8334H10.8346V14.1667Z" fill="#A8E0FF"/>
<path d="M7.49869 14.1667H5.83203V15.8334H7.49869V14.1667Z" fill="#A8E0FF"/>
</g>
<defs>
<clipPath id="clip0_5416_129849">
<rect width="20" height="20" fill="white"/>
</clipPath>
</defs>
</svg>

						</span><?php echo esc_html(get_the_date()); ?></span>
					</div>
						<h4 class="sidebar-recent-post-title"><a href="<?php echo esc_url(get_the_permalink());?>"><?php print esc_html(wp_trim_words( get_the_title(), 7, '' ));?></a></h4>
					</div>
				</div>
				<?php endwhile; endif;?>
				</ul>
			</div>
		<?php echo $after_widget; ?>
		<?php
}

    public function form( $instance ) {
        $title = !empty( $instance['title'] ) ? $instance['title'] : '';
        $count = !empty( $instance['count'] ) ? $instance['count'] : esc_html__( '3', 'cb-toolkit' );
        $posts_order = !empty( $instance['posts_order'] ) ? $instance['posts_order'] : esc_html__( 'DESC', 'cb-toolkit' );
        $choose_style = !empty( $instance['choose_style'] ) ? $instance['choose_style'] : esc_html__( 'style_1', 'cb-toolkit' );
        ?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php echo esc_html__('Title','cb-toolkit'); ?></label>
			<input type="text" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" value="<?php echo esc_attr( $title ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'count' )); ?>"><?php echo esc_html__('How many posts you want to show ?','cb-toolkit'); ?></label>
			<input type="number" name="<?php echo esc_attr($this->get_field_name( 'count' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'count' )); ?>" value="<?php echo esc_attr( $count ); ?>" class="widefat">
		</p>

		<p>
			<label for="<?php echo esc_attr($this->get_field_id( 'posts_order' )); ?>"><?php echo esc_html__('Posts Order','cb-toolkit'); ?></label>
			<select name="<?php echo esc_attr($this->get_field_name( 'posts_order' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'posts_order' )); ?>" class="widefat">
				<option value="" disabled="disabled"><?php echo esc_html__('Select Post Order','cb-toolkit'); ?></option>
				<option value="<?php echo esc_attr__('ASC', 'cb-toolkit'); ?>" <?php if ( $posts_order === 'ASC' ) {echo 'selected="selected"';}?>><?php echo esc_html__('ASC','cb-toolkit'); ?></option>
				<option value="<?php echo esc_attr__('DESC', 'cb-toolkit'); ?>" <?php if ( $posts_order === 'DESC' ) {echo 'selected="selected"';}?>><?php echo esc_html__('DESC','cb-toolkit'); ?></option>
			</select>
		</p>

	<?php }

}

add_action( 'widgets_init', function () {
    register_widget( 'Latest_posts_sidebar_Widget' );
} );