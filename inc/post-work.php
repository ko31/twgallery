<?php

add_action( 'init', function() {
	register_post_type( 'work', [
		'has_archive' => true,
		'public' => true,
		'supports' => [ 'title' ],
		'label'  => '作品',
		'menu_icon' => 'dashicons-media-default',
		] );

	register_taxonomy( 'player', [ 'work' ], [
		'label' => '棋士',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'hierarchical' => true,
		],
	] );

	register_taxonomy( 'artist', [ 'work' ], [
		'label' => '描く将',
		'hierarchical' => true,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'hierarchical' => true,
		],
	] );

	register_taxonomy( 'tag', [ 'work' ], [
		'label' => 'タグ',
		'hierarchical' => false,
		'public' => true,
		'show_ui' => true,
		'show_admin_column' => true,
		'rewrite' => [
			'hierarchical' => true,
		],
	] );
} );
