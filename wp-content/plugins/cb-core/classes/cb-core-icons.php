<?php

namespace CBCore;
defined( 'ABSPATH' ) || die();
class CB_Core_Icon {
    public static function init() {
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'cb_core_flaticon' ] );
        add_filter( 'elementor/icons_manager/additional_tabs', [ __CLASS__, 'cb_core_fontawesome' ] );
    }
    public static function cb_core_flaticon($tabs) {
        $tabs['cb-core-flaticon'] = [
            'name' => 'cb-core-flaticon',
            'label' => __( 'Flaticon', 'cb-core' ),
            'url' => CB_ASSETS . 'fonts/css/flaticon.css?v='.time(),
            'enqueue' => [ CB_ASSETS . 'fonts/css/flaticon.css?v='.time() ],
            'prefix' => '',
            'displayPrefix' => '',
            'labelIcon' => 'flaticon-money-saving',
            'ver' => CB_VERSION,
            'fetchJson' => CB_ASSETS . 'fonts/data/flaticon-data.json?v=' . time(),
            'native' => false,
        ];
        return $tabs;
    }
    public static function cb_core_fontawesome($tabs) {
        $tabs['cb-core-fontawesdome'] = [
            'name' => 'cb-core-fontawesdome',
            'label' => __( 'Fontawesdome 6 Pro', 'cb-core' ),
            'url' => CB_ASSETS . 'fonts/css/font-awesome.min.css?v='.time(),
            'enqueue' => [ CB_ASSETS . 'fonts/css/font-awesome.min.css?v='.time() ],
            'prefix' => '',
            'displayPrefix' => '',
            'labelIcon' => 'fa-thin fa-font-awesome',
            'ver' => CB_VERSION,
            'fetchJson' => CB_ASSETS . 'fonts/data/fontawesome-data.json?v=' . time(),
            'native' => false,
        ];
        return $tabs;
    }
}