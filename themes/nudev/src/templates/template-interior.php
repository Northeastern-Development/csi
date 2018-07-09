<?php

	/* Template Name: Interior */




	get_header();

?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1></div>
        <div class="interior_wrapper">
            <?=get_the_content()?>
            
        </div>
	</main>

<?php get_footer(); ?>
