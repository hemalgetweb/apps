<?php

/**
 * Check if CF7 Installed
 */
function cb_core_check_is_cf7_activated()
{
    return class_exists('WPCF7');
}
if (!function_exists('woocommerce_template_loop_add_to_cart_2')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_2($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-2.php', $args);
        }
    }
}

if (!function_exists('woocommerce_template_loop_add_to_cart_layout')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_layout($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-layout.php', $args);
        }
    }
}
if (!function_exists('woocommerce_template_loop_add_to_cart_text')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_text($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-text.php', $args);
        }
    }
}
if (!function_exists('woocommerce_template_loop_add_to_cart_text2')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_text2($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-text2.php', $args);
        }
    }
}
if (!function_exists('woocommerce_template_loop_add_to_cart_text3')) {

    /**
     * Get the add to cart template for the loop.
     *
     * @param array $args Arguments.
     */
    function woocommerce_template_loop_add_to_cart_text3($args = array())
    {
        global $product;

        if ($product) {
            $defaults = array(
                'quantity'   => 1,
                'class'      => implode(
                    ' ',
                    array_filter(
                        array(
                            'button',
                            'product_type_' . $product->get_type(),
                            $product->is_purchasable() && $product->is_in_stock() ? 'add_to_cart_button' : '',
                            $product->supports('ajax_add_to_cart') && $product->is_purchasable() && $product->is_in_stock() ? 'ajax_add_to_cart' : '',
                        )
                    )
                ),
                'attributes' => array(
                    'data-product_id'  => $product->get_id(),
                    'data-product_sku' => $product->get_sku(),
                    'aria-label'       => $product->add_to_cart_description(),
                    'rel'              => 'nofollow',
                ),
            );

            $args = apply_filters('woocommerce_loop_add_to_cart_args', wp_parse_args($args, $defaults), $product);

            if (isset($args['attributes']['aria-label'])) {
                $args['attributes']['aria-label'] = wp_strip_all_tags($args['attributes']['aria-label']);
            }

            wc_get_template('loop/add-to-cart-text3.php', $args);
        }
    }
}

function cb_core_get_current_user_display_name()
{
    $user = wp_get_current_user();
    $name = 'user';
    if ($user->exists() && $user->display_name) {
        $name = $user->display_name;
    }
    return $name;
}
function cb_core_get_cf7_forms()
{
    $forms = [];
    if (cb_core_check_is_cf7_activated()) {
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

/**
 * Get Shortcode
 */
function cb_core_do_shortcode($tag, array $atts = array(), $content = null)
{
    global $shortcode_tags;
    if (!isset($shortcode_tags[$tag])) {
        return false;
    }
    return call_user_func($shortcode_tags[$tag], $atts, $content, $tag);
}
/**
 * Sanitize html class string
 *
 * @param $class
 * @return string
 */
function cb_core_sanitize_html_class_param($class)
{
    $classes = !empty($class) ? explode(' ', $class) : [];
    $sanitized = [];
    if (!empty($classes)) {
        $sanitized = array_map(function ($cls) {
            return sanitize_html_class($cls);
        }, $classes);
    }
    return implode(' ', $sanitized);
}
/**
 * allowed html
 */
function cb_core_kses_basic($string = '')
{
    return wp_kses($string, cb_core_get_allowed_html_tags('basic'));
}
function cb_core_get_allowed_html_tags($level = 'basic')
{
    $allowed_html = [
        'img' => [
            'src' => [],
            'class' => []
        ],
        'b' => [],
        'i' => [],
        'u' => [],
        'em' => [],
        'br' => [],
        'abbr' => [
            'title' => [],
        ],
        'span' => [
            'class' => [],
        ],
        'strong' => [],
        'p' => [
            'class' => [],
            'data-wow-delay' => [],
        ],
    ];

    if ($level === 'intermediate') {
        $allowed_html['a'] = [
            'tpef' => [],
            'title' => [],
            'class' => [],
            'id' => [],
        ];
        $allowed_html['div'] = [
            'class' => [],
            'id' => [],
        ];
        $allowed_html['img'] = [
            'src' => [],
            'class' => [],
            'alt' => [],
        ];
    }

    return $allowed_html;
}
function apps_drop_cat($tax, $post='post')
{
    $args = [
        'taxonomy' => $tax,
        'hide_empty' => true,
        'hierarchical' => true,
        'orderby'       => 'name',
        'order'         => 'DESC',
        'post_type' => $post
    ];
    $categories_obj = get_categories($args);
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}
function apps_drop_posts($post_type)
{
    $args = array(
        'numberposts' => -1,
        'post_type'   => $post_type
    );

    $posts = get_posts($args);
    $list = array();
    foreach ($posts as $cpost) {
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
function cb_core_elementor_review_star_rating_3($star_count) {
    $html = '';
    $html .= '<div class="apps-fz-rating-wrap-4">';
    for($i=1;$i<=$star_count; $i++) {
        $html .= '<i class="fa-solid fa-star active"></i>';
    }
    for($i = 5;$i > $star_count; $i--) {
        $html .= '<i class="fa-solid fa-star"></i>';
    }
    $html .= '</div>';
    return $html;
}
function cb_core_elementor_review_star_rating_4($star_count) {
    $html = '';
    $html .= '<div class="apps-fz-testimonial-author-rating-6">';
    for($i=1;$i<=$star_count; $i++) {
        $html .= '<i class="fa-solid fa-star"></i>';
    }
    for($i = 5;$i > $star_count; $i--) {
        $html .= '<i class="fa-light fa-star"></i>';
    }
    $html .= '</div>';
    return $html;
}
function apps_drop_cat_featured($tax)
{
    $args = [
        'taxonomy' => $tax,
        'hide_empty' => true,
        'hierarchical' => true,
        'orderby'       => 'menu_order',
        'order'         => 'DESC',
    ];
    $categories_obj = get_categories($args);
    $categories = array();

    foreach ($categories_obj as $pn_cat) {
        $categories[$pn_cat->cat_ID] = $pn_cat->cat_name;
    }
    return $categories;
}

function cb_core_get_product_review()
{
    $output = '';
    if (class_exists('WooCommerce')) {
        global $product;
        $output .= wc_get_rating_html($product->get_average_rating());
    }
    return $output;
}

function cb_core_wc_get_review($anchor = false, $class = 'star')
{
    global $product;
    $count = $product->get_average_rating();
    $html = '';
    $rating = '';
    if ($count) {
        for ($i = 0; $i < $count; $i++) {
            $html .= '<i class="fa-solid fa-star-sharp rated"></i>';
            if ($anchor == true) { ?>
            <?php } ?>
            <?php }
        for ($j = $count; $j < 5; $j++) {
            $html .= '<i class="fa-solid fa-star-sharp"></i>';
        }
        $rating = $html;
    }
    if ($product->get_review_count()) {
        return '<div class="' . $class . '">' . $rating . '</div>';
    } else
        return '';
}
function cb_core_wc_get_review_woo_product($anchor = false, $class = 'star')
{
    global $product;
    $count = $product->get_average_rating();
    $html = '';
    $rating = '';
    if ($count) {
        for ($i = 0; $i < $count; $i++) {
            $html .= '<i class="fa-light fa-star active"></i>';
            if ($anchor == true) { ?>
            <?php } ?>
            <?php }
        for ($j = $count; $j < 5; $j++) {
            $html .= '<i class="fa-light fa-star"></i>';
        }
        $rating = $html;
    }
    if ($product->get_review_count()) {
        return '<div class="' . $class . '">' . $rating . '</div>';
    } else
        return '';
}
function cb_core_wc_get_review_2($anchor = false, $class = 'apps-woo-product-rating pb-10')
{
    global $product;
    $count = $product->get_average_rating();
    $html = '';
    $rating = '';
    if ($count) {
        for ($i = 0; $i < $count; $i++) {
            $html .= '<i class="fa-solid fa-star active"></i>';
            if ($anchor == true) { ?>
            <?php } ?>
            <?php }
        for ($j = $count; $j < 5; $j++) {
            $html .= '<i class="fa-solid fa-star"></i>';
        }
        $rating = $html;
    }
    if ($product->get_review_count()) {
        return '<div class="' . $class . '">' . $rating . '</div>';
    } else
        return '';
}

function cb_core_wc_get_review_layout($anchor = false, $class = 'apps-fz-rating-2 mb-4-px')
{
    global $product;
    $count = $product->get_average_rating();
    $html = '';
    $rating = '';
    if ($count) {
        for ($i = 0; $i < $count; $i++) {
            $html .= '<i class="fa-solid fa-star active"></i>';
            if ($anchor == true) { ?>
            <?php } ?>
            <?php }
        for ($j = $count; $j < 5; $j++) {
            $html .= '<i class="fa-solid fa-star"></i>';
        }
        $rating = $html;
    }
    if ($product->get_review_count()) {
        return '<div class="' . $class . '">' . $rating . '</div>';
    } else
        return '';
}
function cb_core_wc_get_trending_banner_review($anchor = false, $class = 'apps-fz-trending-product-rating')
{
    global $product;
    $count = $product->get_average_rating();
    $html = '';
    $rating = '';
    if ($count) {
        for ($i = 0; $i < $count; $i++) {
            $html .= '<i class="fa-solid fa-star active"></i>';
            if ($anchor == true) { ?>
            <?php } ?>
    <?php }
        for ($j = $count; $j < 5; $j++) {
            $html .= '<i class="fa-solid fa-star"></i>';
        }
        $rating = $html;
    }
    if ($product->get_review_count()) {
        return '<div class="' . $class . '">' . $rating . '</div>';
    } else
        return '';
}


function sale_badge_percentage()
{
    global $product;
    $percentage = 0;
    $max_percentage = 0.0;

    if (!$product->is_on_sale()) return;
    if ($product->is_type('simple')) {
        $max_percentage = (($product->get_regular_price() - $product->get_sale_price()) / $product->get_regular_price()) * 100;
    } elseif ($product->is_type('variable')) {
        $max_percentage = 0;
        foreach ($product->get_children() as $child_id) {
            $variation = wc_get_product($child_id);
            $price = $variation->get_regular_price();
            $sale = $variation->get_sale_price();
            if ($price != 0 && !empty($sale)) $percentage = ($price - $sale) / $price * 100;
            if ($percentage > $max_percentage) {
                $max_percentage = $percentage;
            }
        }
    }
    return round($max_percentage);
}

function cb_core_product_wraps_active()
{ ?>
    <div class="cart-option cart-option-bottom">
        <ul>
            <li>
                <div class="apps-action-cart-btn">
                    <?php
                    woocommerce_template_loop_add_to_cart();
                    ?>
                </div>
            </li>
            <li>
                <div class="apps-action-wishlist-btn">
                    <?php
                    if (function_exists('woosw_plugin_activate')) {
                        echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
                    }
                    ?>
                </div>
            </li>
            <li>
                <div class="apps-action-compare-btn">
                    <?php
                    if (function_exists('woosc_init')) {
                        echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
                    }
                    ?>
                </div>
            </li>
            <li>
                <?php
                if (function_exists('woosq_init')) {
                    echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
                }
                ?>
            </li>
        </ul>
    </div>
<?php }
function cb_core_product_wraps_active_3($_product_id)
{
    $sku = get_post_meta($_product_id, '_sku', true);
?>
    <div class="apps-fz-product-action-list-2 has-pos">
        <?php if (function_exists('woosw_plugin_activate')) : ?>
            <?php echo do_shortcode('[woosw class="apps-fz-wishlist-btn-2342" id="' . $_product_id . '"]'); ?>
        <?php endif; ?>

        <?php woocommerce_template_loop_add_to_cart_2(); ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . $_product_id . '"]');
        }
        ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . $_product_id . '"]');
        }
        ?>
    </div>
<?php }
function cb_core_product_wraps_active_2()
{ ?>
    <div class="apps-woo-product-box-action-wrap-1 has-pos">
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php woocommerce_template_loop_add_to_cart_2(); ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }

function cb_core_product_wraps_active_layout()
{ ?>
    <div class="apps-fz-product-action-wrapper-2 has-pos fz-action-layout">
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
        }
        ?>
        <?php woocommerce_template_loop_add_to_cart_layout(); ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }
function cb_core_product_wraps_active_layout_2()
{ ?>
    <div class="apps-fz-product-box-action-6 has-pos">
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }

function cb_core_product_wraps_active_layout_3()
{ ?>
    <div class="best-selling-product-3-action has-pos">
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }

function cb_core_product_wraps_active_layout_5()
{ ?>
    <div class="apps-fz-product-action-wrapper-5 has-pos">
        <?php woocommerce_template_loop_add_to_cart_layout(); ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }

function cb_core_product_wraps_active_layout_6()
{ ?>
    <div class="apps-fz-product-box-4-actions">
        <a href="#"><i class="fa-light fa-plus"></i><i class="fa-light fa-plus"></i></a>
        <?php
        if (function_exists('woosc_init')) {
            echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosw_plugin_activate')) {
            echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
        }
        ?>
        <?php
        if (function_exists('woosq_init')) {
            echo do_shortcode('[woosq id="' . get_the_ID() . '"]');
        }
        ?>
    </div>
<?php }
function cb_core_elementor_vendor_star_rating($star_count)
{
    $html = '';
    for ($i = 1; $i <= $star_count; $i++) {
        $html .= '<i class="fa-solid fa-star-sharp rated"></i>';
    }
    for ($i = 5; $i > $star_count; $i--) {
        $html .= '<i class="fa-solid fa-star-sharp"></i>';
    }
    return $html;
}
function cb_core_elementor_vendor_star_rating_3($star_count)
{
    $html = '';
    $html .= '<div class="apps-fz-rating-2 mb-4-px wow fadeInUp">';
    for ($i = 1; $i <= $star_count; $i++) {
        $html .= '<i class="fa-light fa-star active"></i>';
    }
    for ($i = 5; $i > $star_count; $i--) {
        $html .= '<i class="fa-light fa-star"></i>';
    }
    $html .= '</div>';
    return $html;
}
function cb_core_elementor_vendor_star_rating_6($star_count=0)
{
    $html = '';
    $html .= '<div class="apps-fz-product-rating-6">';
    for ($i = 1; $i <= $star_count; $i++) {
        $html .= '<i class="fa-solid fa-star"></i>';
    }
    for ($i = 5; $i > $star_count; $i--) {
        $html .= '<i class="fa-light fa-star"></i>';
    }
    $html .= '</div>';
    return $html;
}
function cb_core_elementor_review_star_rating($star_count)
{
    $html = '';
    $html .= '<div class="star-wrap"><div class="star">';
    for ($i = 1; $i <= $star_count; $i++) {
        $html .= '<i class="fa-solid fa-star-sharp"></i>';
    }
    for ($i = 5; $i > $star_count; $i--) {
        $html .= '<i class="fa-regular fa-star-sharp"></i>';
    }
    $html .= '</div></div>';
    return $html;
}
function cb_core_elementor_review_star_rating_2($star_count)
{
    $html = '';
    $html .= '<div class="rating"><div class="apps-woo-product-rating">';
    for ($i = 1; $i <= $star_count; $i++) {
        $html .= '<i class="fa-solid fa-star active"></i>';
    }
    for ($i = 5; $i > $star_count; $i--) {
        $html .= '<i class="fa-solid fa-star"></i>';
    }
    $html .= '</div></div>';
    return $html;
}
function cb_drop_posts($post_type){
    $args = array(
        'numberposts' => -1,
        'post_type'   => $post_type
    );

    $posts = get_posts($args);
    $list = array();
    foreach ($posts as $cpost) {
        $list[$cpost->ID] = $cpost->post_title;
    }
    return $list;
}
function cb_loop_category($post_id)
{

    if ('post' == get_post_type()) {
        $categories = get_the_category($post_id);
        $output = '';
        $output .= $categories[0]->cat_name;
        return $output;
    }
}

function apps_get_elementor_template_page() {
    $args = array(
        'post_type'      => 'elementor_library',
        'posts_per_page' => 30,
        'tabs_group' => 'library',
        'elementor_library_type' => 'page',
      );
      
    $elementor_templates = get_posts($args);
    $template_arr = array();
    foreach($elementor_templates as $template) {
        $template_id = $template->ID;
        $template_title = get_the_title($template_id);
        $template_arr[$template_id] = $template_title;
    }
    return $template_arr;
}

function apps_get_menu_items() {
    $menudata = wp_get_nav_menu_items( 'main-menu' );
    $menu_attributes = array();
    if(!empty($menudata)) {
        foreach($menudata as $item) {
            $menu_attributes[$item->ID] = $item->post_title;
        }
    }
    return $menu_attributes;
}