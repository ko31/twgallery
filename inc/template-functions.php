<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package twgallery
 */

function twgallery_document_title_separator( $sep ) {
	$sep = ' | ';

	return $sep;
}

add_filter( 'document_title_separator', 'twgallery_document_title_separator' );

function twgallery_pre_get_posts( $query ) {
	if ( is_admin() && ! $query->is_main_query() ) {
		return;
	}

//		if ( $query->is_home() || is_front_page() ) {
	if ( $query->is_home() ) {
		$query->set( 'post_type', array( 'work' ) );
	}
}

add_action( 'pre_get_posts', 'twgallery_pre_get_posts' );

function twgallery_get_the_archive_title( $title ) {
	$titles = explode( ': ', $title );
	if ( is_array( $titles ) ) {
		return $titles[1];
	}

	return $title;
}

add_filter( 'get_the_archive_title', 'twgallery_get_the_archive_title' );

function twgallery_edit_form_advanced( $post ) {
	if ( ! empty( tscfp( 'tweet' ) ) ) {
		global $wp_embed;
		echo $wp_embed->run_shortcode( "[embed]" . tscfp( 'tweet' ) . '[/embed]' );
	}
}

add_action( 'edit_form_advanced', 'twgallery_edit_form_advanced' );
