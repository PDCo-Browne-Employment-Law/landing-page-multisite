<?php

	function gofundme_styles() {
		wp_enqueue_style( 'main-stylesheet', get_template_directory_uri() . '/dist/main.css', array(), '1.0', 'all' );
	}
	add_action( 'wp_enqueue_scripts', 'gofundme_styles' );