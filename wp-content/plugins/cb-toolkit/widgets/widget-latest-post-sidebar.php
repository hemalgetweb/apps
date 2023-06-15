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
				<li class="recent-post-list my-3 px-4">
					<a href="<?php echo esc_url(get_the_permalink());?>" class="text-decoration-none d-flex gap-3 align-items-center">
						<img src="<?php print esc_url( get_the_post_thumbnail_url( get_the_ID(), 'full' ) );?>" alt="<?php echo esc_attr($image_alt); ?>" class="img-fluid flex-shrink-0">
						<span class="recent-post-content">
							<span class="post-title fs-14 fw-medium text-clr-dark1 mb-1 d-block">
								<?php echo get_the_title(); ?>
							</span>
							<?php if(!empty($posted_time)) : ?>
							<span class="post-time fs-12 fw-normal text-clr-dark3 mb-0 d-block">
								<?php echo $posted_time; ?> ago
							</span>
							<?php endif; ?>
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
						<a href="<?php print esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) );?>"><i class="fal fa-user"></i><?php print esc_html(get_the_author());?></a>
						<span><i class="fal fa-calendar"></i><?php echo esc_html(get_the_date()); ?></span>
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