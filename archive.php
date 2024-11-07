<?php
get_header();
if ( have_posts() ) :
	do_action( 'before_main_content' );
	while ( have_posts() ) :
		the_post();
		do_action( 'before_post_content' );
		?>
		<h1><?php the_title(); ?></h1>
		<div><?php the_content(); ?></div>
		<?php
		do_action( 'after_post_content' );
	endwhile;
	do_action( 'after_main_content' );
else :
	esc_html_e( 'Sorry, no posts matched your criteria.', 'theme-starter' );
endif;
get_footer();
