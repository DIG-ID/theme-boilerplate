<?php

/**
 * This function open the main content.
 */
function starter_theme_before_main_content() {
	?>
	<main id="main-content" class="main-content">
	<?php
}

add_action( 'before_main_content', 'starter_theme_before_main_content' );

/**
 * This function closes the main content.
 */
function starter_theme_after_main_content() {
	?>
	</main><!-- #main-content-->
	<?php
}

add_action( 'after_main_content', 'starter_theme_after_main_content' );

/**
 * This function open the post content.
 */
function starter_theme_before_post_content() {
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
}

add_action( 'before_post_content', 'starter_theme_before_post_content' );

/**
 * This function closes the post content.
 */
function starter_theme_after_post_content() {
	?>
	</article><!-- #article -->
	<?php
}

add_action( 'after_post_content', 'starter_theme_after_post_content' );


/**
 * This theme logo.
 */
function starter_theme_logo() {
	?>
	<svg xmlns="http://www.w3.org/2000/svg" xml:space="preserve" width="418.7" height="499.1" viewBox="0 0 418.7 499.1"><path d="m178.1.1-34.4 206.6H95.2l2.2-13.7c-11.5 11.5-25.8 17.9-42.6 17.9-36.1 0-61.3-29.1-53.5-76.7 7-42.5 38.4-68.9 71.4-68.9 21.6 0 35.8 9.8 43.4 21.6L129.5.1h48.6zm-73.6 153.7 5.6-31.9c-4.8-10.4-13.4-15.1-24.6-15.1-16.8 0-31.4 11.2-34.7 31.6-3.1 17.1 3.4 30.8 22.4 30.8 11.4 0 22.6-5.1 31.3-15.4zM217.3 206.9h-48.4L193 69.7h48.4l-24.1 137.2zM197.1 23.5C199.4 10.4 211.7 0 226 0c17.9 0 29.4 14 26.3 31.1-2.5 13.4-14.8 23.8-29.1 23.8-17.7 0-29.2-14-26.1-31.4zM418.7 69.7l-22.4 127.4c-8.4 47.3-38.9 70-90.1 70-26.3 0-46.8-6.2-62.2-13.1l16.5-38.6c13.2 8.4 29.7 10.9 41.7 10.9 26.9 0 42.5-12.6 46.2-33l.6-3.6c-11.8 11.5-26 18.2-42.8 18.2-36.4 0-61.9-29.1-53.5-75 7-40.9 38.4-67.2 71.4-67.2 20.7 0 35.3 9.2 43.1 21.3l3.1-17.1h48.4zm-63.2 82.6 5.6-30.5c-4.5-10.1-13.7-14.8-24.6-14.8-17.1 0-30.5 10.9-34.4 28.8-3.1 15.1 2.8 30.2 23.2 30.2 10.6 0 21.5-4.2 30.2-13.7zM165.5 494.9h-48.4l24.1-137.2h48.4l-24.1 137.2zm-20.2-183.4c2.2-13.2 14.6-23.5 28.8-23.5 17.9 0 29.4 14 26.3 31.1-2.5 13.4-14.8 23.8-29.1 23.8-17.6 0-29.1-14-26-31.4zM377.3 298.9l-34.4 196h-48.4l2.2-13.7c-11.5 11.5-25.8 17.9-42.6 17.9-36.1 0-61.3-29.1-53.5-76.7 7-42.5 38.4-68.9 71.4-68.9 21.6 0 35.8 9.8 43.4 21.6l13.4-76.1h48.5zM303.7 442l5.6-31.9c-4.8-10.4-13.4-15.1-24.6-15.1-16.8 0-31.4 11.2-34.7 31.6-3.1 17.1 3.4 30.8 22.4 30.8 11.4 0 22.6-5.1 31.3-15.4zM36.3 494.9l10-54.9h55.3l-9.7 54.9z"></path></svg>
	<?php
}

add_action( 'theme_logo', 'starter_theme_logo' );

/**
 * Implement and customize Yoast Breadcrumbs.
 */
function starter_theme_breadcrumbs() {
	if ( function_exists( 'yoast_breadcrumb' ) ) :
		yoast_breadcrumb( '<div id="breadcrumbs">', '</div>' );
	endif;
}

add_action( 'breadcrumbs', 'starter_theme_breadcrumb' );
