<?php
namespace CBCore\Traits\Classes;
trait CB_Core_Class_Func {
    public function cb_core_cpt_taxonomies($posttype,$value='id')
    {
        $options = array();
        $terms = get_terms( $posttype );
        if (!empty($terms) && !is_wp_error($terms)) {
            foreach ($terms as $term) {
                if ('name' == $value) {
                    $options[$term->name] = $term->name;
                } else {
                    $options[$term->term_id] = $term->name;
                }
            }
        }
        return $options;
    }
    public function cb_get_categories()
    {
        $terms = get_terms( 'category', array(
            'orderby'    => 'count',
            'hide_empty' => 0
        ) );
        $options = array();
        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
            foreach ( $terms as $term ) {
                $options[ $term->term_id ] = $term->name;
            }
        }
        return $options;
    }
    /*
     * List Posts
     */
    public function cb_get_posts() {
        $list = get_posts( array(
            'post_type'         => 'post',
            'posts_per_page'    => -1,
        ) );
        $options = array();
        if ( ! empty( $list ) && ! is_wp_error( $list ) ) {
            foreach ( $list as $post ) {
                $options[ $post->ID ] = $post->post_title;
            }
        }
        return $options;
    }
    public function cb_core_get_slug_by_id($taxonomy, $id) {
        $term_slug = '';
        if(!empty($taxonomy && $id)) {
            $term = get_term( $id, $taxonomy );
            $term_slug = $term->slug;
        }
        return $term_slug;
    }
    public function cb_core_get_name_by_id($taxonomy, $id) {
        $term_slug = '';
        if(!empty($taxonomy && $id)) {
            $term = get_term( $id, $taxonomy );
            $term_slug = $term->name;
        }
        return $term_slug;
    }
}