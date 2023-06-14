<?php

/**
 * Dynamic cart count on ajax
 */

function apps_woo_product_thumbnail()
{
?>
    <!-- list -->
    <div class="apps-woo-product-box-image-1">
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
            <?php woocommerce_template_loop_product_thumbnail(); ?>
        </a>
        <div class="apps-woo-product-badge-wrap has-pos">
            <?php woocommerce_show_product_loop_sale_flash(); ?>
        </div>
        <div class="apps-woo-product-box-action-wrap-1 has-pos">
            <?php if (function_exists('woosw_plugin_activate')) : ?>
                <?php
                echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
                ?>
            <?php endif; ?>
            <?php
            woocommerce_template_loop_add_to_cart();
            ?>

            <?php if (function_exists('woosc_init')) : ?>
                <?php
                echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
                ?>
            <?php endif; ?>
        </div>
    </div>
    <!-- grid -->
<?php }
function apps_woo_product_thumbnail_list()
{
?>
    <!-- list -->
    <div class="apps-woo-product-box-image-1">
        <a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>">
            <?php woocommerce_template_loop_product_thumbnail(); ?>
        </a>
        <div class="apps-woo-product-badge-wrap has-pos">
            <?php woocommerce_show_product_loop_sale_flash(); ?>
        </div>
    </div>
    <!-- grid -->
    <?php }



if (!function_exists('apps_shop_loop_columns')) {
    function apps_shop_loop_columns()
    {
        if (is_active_sidebar('shop')) {
            return 4; // 2 products per row
        } else {
            return 4;
        }
    }
}


if (!function_exists('apps_woocommerce_template_loop_product_content')) {
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function apps_woocommerce_template_loop_product_content()
    { ?>
        <div class="apps-woo-product-box-content-1">
            <h6 class="apps-title <?php esc_attr(apply_filters('woocommerce_product_loop_title_classes', 'woocommerce-loop-product__title')); ?>"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php echo esc_html(wp_trim_words(get_the_title(), 4)); ?></a></h6>
            <?php woocommerce_template_loop_price(); ?>
        </div>
    <?php }
}
if (!function_exists('apps_woocommerce_template_loop_product_content_list')) {
    /**
     * Show the product title in the product loop. By default this is an H2.
     */
    function apps_woocommerce_template_loop_product_content_list()
    {
        $terms = wp_get_post_terms( get_the_id(), 'product_cat' );
        $term = '';
        $term_id = '';
        $cat_url = '';
        if(!empty($terms)) {
            $term  = reset($terms);
            $term_id = $term->term_id;
            $cat_url = get_term_link( (int)$term_id, 'product_cat' );
        }
    ?>
        <div class="apps-fz-product-list-content-422 pr-60">
            <a href="<?php echo esc_url($cat_url) ? esc_url($cat_url): ''; ?>" class="apps-fz-product-list-category-422"><?php echo esc_html($term->name); ?></a>
            <h4 class="apps-fz-product-list-title-422"><a href="<?php echo esc_url(get_permalink(get_the_ID())); ?>"><?php echo esc_html(get_the_title()); ?></a></h4>
            <div class="apps-fz-product-list-price-rating-wrap-422 mb-15">
                <div class="apps-fz-product-list-price-wrap-422">
                    <div class="current d-inline-block"><?php woocommerce_template_loop_price(); ?></div>
                </div>
                <?php if (!empty(woocommerce_template_loop_rating())) : ?>
                    <div class="apps-woo-product-rating d-inlne-block">
                        <?php woocommerce_template_loop_rating(); ?>
                    </div>
                <?php endif; ?>
            </div>
            <p><?php echo wp_kses_post(wp_trim_words(get_the_excerpt(get_the_ID()), 15)); ?></p>
            <div class="apps-woo-product-box-action-wrap-1 fz-visible-always">
                <?php if (function_exists('woosw_plugin_activate')) : ?>
                    <?php
                    echo do_shortcode('[woosw id="' . get_the_ID() . '"]');
                    ?>
                <?php endif; ?>
                <?php
                woocommerce_template_loop_add_to_cart();
                ?>

                <?php if (function_exists('woosc_init')) : ?>
                    <?php
                    echo do_shortcode('[woosc id="' . get_the_ID() . '"]');
                    ?>
                <?php endif; ?>
            </div>
        </div>
    <?php }
}
function apps_woocommerce_review_gravatar_size($comment)
{
    echo get_avatar($comment, apply_filters('woocommerce_review_gravatar_size', '70'), '');
}
function apps_related_products_args($args)
{
    $args['columns'] = 5; // arranged in 3 columns
    $args['posts_per_page'] = 50; // arranged in 50 posts_per_page
    return $args;
}

function apps_get_single_product_total_rating()
{
    global $product;
    $count   = esc_html($product->get_rating_count()) ? esc_html($product->get_rating_count()) : 0;
    return $count;
}
function apps_get_single_product_total_avarage_rating()
{
    global $product;
    $rating  = esc_html($product->get_average_rating()) ? esc_html($product->get_average_rating()) : esc_html__('0.0', 'apps');
    return $rating;
}
function moda_get_product_review()
{
    global $product;
    $output = '';
    $output .= wc_get_rating_html($product->get_average_rating());
    return $output;
}
function apps_get_product_star_review_list()
{
    $apps_product_rating_lists = get_post_meta(get_the_ID(), '_wc_rating_count', true);
    $rating_list = array(
        1 => 0,
        2 => 0,
        3 => 0,
        4 => 0,
        5 => 0
    );
    $apps_product_rating_lists = $apps_product_rating_lists ? $apps_product_rating_lists : $rating_list;
    foreach ($apps_product_rating_lists as $index => $value) {
        $rating_list[$index] = $value;
    }
    ?>
    <ul>
        <li>
            <div class="stars"><i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i></div>
            <div class="review-line">
                <div class="progress">
                    <div class="progress-bar" data-width="<?php echo esc_attr($rating_list[5]); ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo esc_attr($rating_list[5]); ?>" aria-valuemin="<?php echo esc_attr__('0', 'apps'); ?>" aria-valuemax="<?php echo esc_attr__('100', 'apps'); ?>"></div>
                </div>
            </div>
            <div class="percentage"><span><?php echo esc_html($rating_list[5]); ?></span></div>
        </li>
        <li>
            <div class="stars"><i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp"></i></div>
            <div class="review-line">
                <div class="progress">
                    <div class="progress-bar" data-width="<?php echo esc_attr($rating_list[4]); ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo esc_attr($rating_list[4]); ?>" aria-valuemin="<?php echo esc_attr__('0', 'apps'); ?>" aria-valuemax="<?php echo esc_attr__('100', 'apps'); ?>"></div>
                </div>
            </div>
            <div class="percentage"><span><?php echo esc_html($rating_list[4]) ?></span></div>
        </li>
        <li>
            <div class="stars"><i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i></div>
            <div class="review-line">
                <div class="progress">
                    <div class="progress-bar" data-width="<?php echo esc_attr($rating_list[3]); ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo esc_attr($rating_list[3]); ?>" aria-valuemin="<?php echo esc_attr__('0', 'apps'); ?>" aria-valuemax="<?php echo esc_attr__('100', 'apps'); ?>"></div>
                </div>
            </div>
            <div class="percentage"><span><span><?php echo esc_html($rating_list[3]) ?></span></span></div>
        </li>
        <li>
            <div class="stars"><i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i></div>
            <div class="review-line">
                <div class="progress">
                    <div class="progress-bar" data-width="<?php echo esc_attr($rating_list[2]); ?>" role="progressbar" aria-label="Basic example" aria-valuenow="<?php echo esc_attr($rating_list[2]); ?>" aria-valuemin="<?php echo esc_attr__('0', 'apps'); ?>" aria-valuemax="<?php echo esc_attr__('100', 'apps'); ?>"></div>
                </div>
            </div>
            <div class="percentage"><span><?php echo esc_html($rating_list[2]) ?></span></div>
        </li>
        <li>
            <div class="stars"><i class="fa-solid fa-star-sharp rated"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i> <i class="fa-solid fa-star-sharp"></i></div>
            <div class="review-line">
                <div class="progress">
                    <div class="progress-bar" data-width="<?php echo esc_attr($rating_list[1]); ?>" role="progressbar" aria-label="<?php echo esc_attr__('Basic example', 'apps'); ?>" aria-valuenow="<?php echo esc_attr($rating_list[1]); ?>" aria-valuemin="<?php echo esc_attr__('0', 'apps'); ?>" aria-valuemax="<?php echo esc_attr__('100', 'apps'); ?>"></div>
                </div>
            </div>
            <div class="percentage"><span><?php echo esc_html($rating_list[1]) ?></span></div>
        </li>
    </ul>
<?php }

function wc_refresh_mini_cart_count($fragments)
{
    ob_start();
?>
    <div id="mini-cart-count">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
<?php
    $fragments['#mini-cart-count'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count');
function wc_refresh_mini_cart_count_2($fragments)
{
    ob_start();
?>
    <div id="mini-cart-count-234">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
<?php
    $fragments['#mini-cart-count-234'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count_2');
function wc_refresh_mini_cart_count_21($fragments)
{
    ob_start();
?>
    <div id="mini-cart-count-2341">
        <?php echo WC()->cart->get_cart_contents_count(); ?>
    </div>
<?php
    $fragments['#mini-cart-count-2341'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count_21');
function wc_refresh_mini_cart_count_22($fragments)
{
    ob_start();
?>
    <div id="mini-cart-count-23415">
        <?php if(WC()->cart->get_cart_contents_count()) : ?>
            <?php echo WC()->cart->get_cart_contents_count(); ?>
        <?php endif; ?>
    </div>
<?php
    $fragments['#mini-cart-count-23415'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'wc_refresh_mini_cart_count_22');
/**
 * Dynamic cart price on ajax
 */

function apps_wc_refresh_mini_cart_subtotal($fragments)
{
    ob_start();
?>
    <span id="mini-cart-subtotal-price-2342">
        <?php echo WC()->cart->get_cart_contents_total(); ?>
    </span>
<?php
    $fragments['#mini-cart-subtotal-price-2342'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'apps_wc_refresh_mini_cart_subtotal');
function apps_wc_refresh_mini_cart_subtotal_2($fragments)
{
    ob_start();
?>
    <span id="mini-cart-subtotal-price-234243">
        <?php echo WC()->cart->get_cart_contents_total(); ?>
    </span>
<?php
    $fragments['#mini-cart-subtotal-price-234243'] = ob_get_clean();
    return $fragments;
}
add_filter('woocommerce_add_to_cart_fragments', 'apps_wc_refresh_mini_cart_subtotal_2');
/**
 * WooCommerce update mini cart on ajax click
 */
// Update Cart Count & Mini Cart
add_filter('woocommerce_add_to_cart_fragments', 'iconic_cart_count_fragments', 10, 1);

function iconic_cart_count_fragments($fragments)
{
    if (!empty(WC()->cart->get_cart_contents_count())) {
        ob_start();
        $fragments['span.menu-cart-count'] = '<span class="cart-count menu-cart-count">(' . WC()->cart->get_cart_contents_count() . ')</span>';
        echo '<div class="header-mini-cart">';
        woocommerce_mini_cart();
        echo '</div>';
        $fragments['div.header-mini-cart'] = ob_get_clean();
    }

    return $fragments;
}

function currency_switcher_html()
{
    $data = array();
    $current_currency = '';
    $links = '';
    $currency_name = '';
    if(class_exists('WOOMULTI_CURRENCY_Data')) {
        $data = \WOOMULTI_CURRENCY_Data::get_ins();
        if(!empty($data)) {
            $current_currency = $data->get_current_currency();
            $links            = $data->get_links();
        }
    }
    if(function_exists('get_woocommerce_currencies')) {
        $currency_name    = get_woocommerce_currencies();
    }
?>
    <?php if(class_exists('WOOMULTI_CURRENCY_Data')) : ?>
    <select class="has_nice_select apps-rv-has-redirect-page-option-334232">
        <option><?php echo get_woocommerce_currency(); ?></option>
            <?php if(!empty($links)) : ?>
                <?php foreach ($links as $code => $link) :
                    if ($code === $current_currency) {
                        continue;
                    }
                    if (empty($currency_name[$code])) {
                        continue;
                    }
                    $value   = esc_url($link);
                ?>
                <?php if(!empty($code)) : ?>
                    <option value="<?php echo esc_url($value) ? esc_url($value): ''; ?>"><?php echo esc_html($code); ?></option>
                <?php endif; ?>
        <?php endforeach; ?>
        <?php endif; ?>
    </select>
    <?php endif; ?>
<?php }
// Remove product in the cart using ajax
function apps_ajax_product_remove()
{
    // Get mini cart
    ob_start();

    foreach (WC()->cart->get_cart() as $cart_item_key => $cart_item) {
        if ($cart_item['product_id'] == $_POST['product_id'] && $cart_item_key == $_POST['cart_item_key']) {
            WC()->cart->remove_cart_item($cart_item_key);
        }
    }

    WC()->cart->calculate_totals();
    WC()->cart->maybe_set_cart_cookies();

    woocommerce_mini_cart();

    $mini_cart = ob_get_clean();

    // Fragments and mini cart are returned
    $data = array(
        'fragments' => apply_filters(
            'woocommerce_add_to_cart_fragments',
            array(
                'div.widget_shopping_cart_content' => '<div class="widget_shopping_cart_content">' . $mini_cart . '</div>'
            )
        ),
        'cart_hash' => apply_filters('woocommerce_add_to_cart_hash', WC()->cart->get_cart_for_session() ? md5(json_encode(WC()->cart->get_cart_for_session())) : '', WC()->cart->get_cart_for_session())
    );

    wp_send_json($data);

    die();
}

add_action('wp_ajax_product_remove', 'apps_ajax_product_remove');
add_action('wp_ajax_nopriv_product_remove', 'apps_ajax_product_remove');

//minicart price 
function apps_woocommerce_widget_shopping_cart_subtotal() {
    echo '<strong>' . esc_html__( 'Subtotal:', 'apps' ) . '</strong> ' . wp_kses_post(WC()->cart->get_cart_subtotal()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

//cart 
function apps_wc_cart_totals_subtotal_html() {
	echo wp_kses_post(WC()->cart->get_cart_subtotal()); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}