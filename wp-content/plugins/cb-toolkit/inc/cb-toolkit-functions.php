<?php
/**
 * Check if CF7 Installed
 */
function cb_core_is_cf7_activated()
{
    return class_exists('WPCF7');
}
function cb_core_cpt_taxonomies($posttype,$value='id') {
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

function cb_toolkit_get_cf7_forms()
{
    $forms = [];
    if (cb_core_is_cf7_activated()) {
        $_forms = get_posts([
            'post_type' => 'wpcf7_contact_form',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        if (!empty($_forms)) {
            $forms = wp_list_pluck($_forms, 'post_title', 'ID');
        }
    }
    return $forms;
}
function cb_toolkit_get_cf7_form_ids()
{
    $forms = [];
    if (cb_core_is_cf7_activated()) {
        $_forms = get_posts([
            'post_type' => 'wpcf7_contact_form',
            'post_status' => 'publish',
            'posts_per_page' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ]);

        if (!empty($_forms)) {
            $forms = wp_list_pluck($_forms, 'ID');
        }
    }
    return $forms;
}
function cb_toolkit_do_shortcode($tag, array $atts = array(), $content = null)
{
    global $shortcode_tags;
    if (!isset($shortcode_tags[$tag])) {
        return false;
    }
    return call_user_func($shortcode_tags[$tag], $atts, $content, $tag);
}
if(class_exists('WooCommerce')) {
    // Add term page
    function custom_url_taxonomy_add_new_meta_field() {
        // this will add the custom meta field to the add new term page
        ?>
        <div class="form-field">
            <label for="farzaa_rv_product_icon[farzaa_cat_icon]"><?php _e( 'Custom category icon', 'cb-toolkit' ); ?></label>
            <input type="text" name="farzaa_rv_product_icon[farzaa_cat_icon]" id="farzaa_rv_product_icon[farzaa_cat_icon]" value="">
            <p class="description"><?php _e( 'Please insert fontawesome 6 pro icon name','cb-toolkit' ); ?></p>
        </div>
    <?php
    }
    add_action( 'product_cat_add_form_fields', 'custom_url_taxonomy_add_new_meta_field', 10, 2 );

    // Edit term page
    function custom_url_taxonomy_edit_meta_field($term) {
        // put the term ID into a variable
        $t_id = $term->term_id;
        // retrieve the existing value(s) for this meta field. This returns an array
        $term_meta = get_option( "taxonomy_$t_id" ); ?>
        <tr class="form-field">
        <th scope="row" valign="top"><label for="farzaa_rv_product_icon[farzaa_cat_icon]"><?php _e( 'Custom category icon', 'cb-toolkit' ); ?></label></th>
            <td>
                <input type="text" name="farzaa_rv_product_icon[farzaa_cat_icon]" id="farzaa_rv_product_icon[farzaa_cat_icon]" value="<?php echo esc_attr( $term_meta['farzaa_cat_icon'] ) ? esc_attr( $term_meta['farzaa_cat_icon'] ) : ''; ?>">
                <p class="description"><?php _e( 'Please insert to edit fontawesome 6 pro icon name','cb-toolkit' ); ?></p>
            </td>
        </tr>
    <?php
    }
    add_action( 'product_cat_edit_form_fields', 'custom_url_taxonomy_edit_meta_field', 10, 2 );

    // Save extra taxonomy fields callback function.
    function farzaa_save_taxonomy_custom_meta( $term_id ) {
        if ( isset( $_POST['farzaa_rv_product_icon'] ) ) {
            $t_id = $term_id;
            $term_meta = get_option( "taxonomy_$t_id" );
            $cat_keys = array_keys( $_POST['farzaa_rv_product_icon'] );
            foreach ( $cat_keys as $key ) {
                if ( isset ( $_POST['farzaa_rv_product_icon'][$key] ) ) {
                    $term_meta[$key] = $_POST['farzaa_rv_product_icon'][$key];
                }
            }
            // Save the option array.
            update_option( "taxonomy_$t_id", $term_meta );
        }
    }  
    add_action( 'edited_product_cat', 'farzaa_save_taxonomy_custom_meta', 10, 2 );  
    add_action( 'create_product_cat', 'farzaa_save_taxonomy_custom_meta', 10, 2 );
}