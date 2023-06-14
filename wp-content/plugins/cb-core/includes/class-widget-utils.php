<?php
defined( 'ABSPATH' ) || exit;

class Widget_Utils {
    public static function get_control_options_text_align() {
        return [
			'left'   => [
				'title' => esc_html__( 'Left', 'minimog' ),
				'icon'  => 'eicon-text-align-left',
			],
			'center' => [
				'title' => esc_html__( 'Center', 'minimog' ),
				'icon'  => 'eicon-text-align-center',
			],
			'right'  => [
				'title' => esc_html__( 'Right', 'minimog' ),
				'icon'  => 'eicon-text-align-right',
			],
		];
    }
}