<?php

	/* Template Name: Interior */




	get_header();
global $wp;
?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div class="interior_wrapper">
            <div class="nu__breadcrumb">
                
                <a href="<?php echo get_site_url() ?>" title="Coastal Sustainability Institute">Coastal Sustainability Institute</a> &gt; <?php if(get_field('type') == "") { ?><a href="<?php echo get_site_url() . '/news' ?>" title="News Archive">News Archive</a><?php } else { ?><a href="<?php echo get_site_url() . '/' . get_field('type'); ?>" title="<?php echo ucfirst(get_field('type')); ?>"><?php echo ucfirst(get_field('type')); ?></a><?php } ?> &gt; <?php the_title(); ?>
            </div>
            <h2 style="border-bottom: 0;"><?php the_title(); ?></h2>
            <?php $image = get_field('image'); ?>
            <img src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title(get_field('image')) ?>" class="featureimg" />
            <p class="caption"><?php echo get_field( "image_caption" ); ?></p>
            <?php echo get_field( "content" ); ?>
        </div>
	</main>

<?php get_footer(); ?>
