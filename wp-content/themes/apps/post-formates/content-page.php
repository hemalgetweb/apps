<?php if(!empty(get_the_content())) : ?>
    <div class="post-entry post-entry--top-margin">
        <?php
            the_content();
            wp_link_pages( [
                'before'      => '<div class="page-links"><span class="page-links-title">' . esc_html__( 'Pages:', 'apps' ) . '</span>',
                'after'       => '</div>',
                'link_before' => '<span>',
                'link_after'  => '</span>',
                'pagelink'    => '<span class="screen-reader-text">' . esc_html__( 'Page', 'apps' ) . ' </span>%',
                'separator'   => '<span class="screen-reader-text"> </span>',
            ] );
            if ( comments_open() || get_comments_number(get_the_ID()) ):
                comments_template();
            endif;
        ?>
    </div>
<?php endif; ?>