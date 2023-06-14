<?php
function ocdi_import_files() {
    return [
      [
        'import_file_name'             => esc_html__('Electronics', 'cb-toolkit'),
        'import_file_url'            => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/electronics/content.xml'),
        'import_widget_file_url'     => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/electronics/widgets.wie'),
        'import_customizer_file_url' => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/electronics/customizer.dat'),
        'import_preview_image_url'     => esc_url(PLUGIN_URL . '/cb-toolkit/inc/one-click-demo-importer/preview/electronics.png'),
        'preview_url'                  => 'https://farzaawp.codebasket.net/electronics-2/',
      ],
      [
        'import_file_name'             => esc_html__('Wine', 'cb-toolkit'),
        'import_file_url'            => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/wine/content.xml'),
        'import_widget_file_url'     => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/wine/widgets.wie'),
        'import_customizer_file_url' => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/wine/customizer.dat'),
        'import_preview_image_url'     => esc_url(PLUGIN_URL . '/cb-toolkit/inc/one-click-demo-importer/preview/wine.png'),
        'preview_url'                  => 'https://farzaawp.codebasket.net/wine/',
      ],
      [
        'import_file_name'             => esc_html__('Watch', 'cb-toolkit'),
        'import_file_url'            => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/watch/content.xml'),
        'import_widget_file_url'     => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/watch/widgets.wie'),
        'import_customizer_file_url' => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/watch/customizer.dat'),
        'import_preview_image_url'     => esc_url(PLUGIN_URL . '/cb-toolkit/inc/one-click-demo-importer/preview/watch.png'),
        'preview_url'                  => 'https://farzaawp.codebasket.net/watch/',
      ],
      [
        'import_file_name'             => esc_html__('Fashion', 'cb-toolkit'),
        'import_file_url'            => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/fashion/content.xml'),
        'import_widget_file_url'     => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/fashion/widgets.wie'),
        'import_customizer_file_url' => esc_url(trailingslashit( PLUGIN_URL ) . '/cb-toolkit/inc/one-click-demo-importer/demo-data/fashion/customizer.dat'),
        'import_preview_image_url'     => esc_url(PLUGIN_URL . '/cb-toolkit/inc/one-click-demo-importer/preview/fashion.png'),
        'preview_url'                  => 'https://farzaawp.codebasket.net/fashion/',
      ],
    ];
  }
  add_filter( 'ocdi/import_files', 'ocdi_import_files' );
function ocdi_change_time_of_single_ajax_call() {
    return 180;
}
add_filter( 'ocdi/time_for_one_ajax_call', 'ocdi_change_time_of_single_ajax_call' );
