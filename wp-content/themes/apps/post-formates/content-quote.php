<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package apps
 */
?>

<article id="post-<?php the_ID();?>" <?php post_class( 'blog-single-quote-item apps-blog-quote formate-blog-quote-boxed mb-50 format-quote' );?>>
    <div class="blog-single-quote-content">
        <div class="post-text">
            <?php the_content();?>
        </div>
    </div>
</article>

