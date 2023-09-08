<?php

	function gofundme_scripts() {
		wp_enqueue_script('jquery');
		wp_enqueue_script( 'gsap-min', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js', null, ['jquery'], true );
		wp_enqueue_script( 'gsap-scrolltrigger-mins', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js', null, ['jquery'], true );
		wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/dist/main.js', null, ['jquery'], true );
	}
	add_action( 'wp_enqueue_scripts', 'gofundme_scripts' );