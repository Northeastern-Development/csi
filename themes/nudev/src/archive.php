<?php

	/* Template Name: Interior */




	get_header();
global $wp;
$current_url = home_url( add_query_arg( array(), $wp->request ) );
$current_url = str_replace("/partnerships/", "/spotlight/", $current_url);
$current_url = str_replace("/research/", "/spotlight/", $current_url);
$current_url = str_replace("/education/", "/spotlight/", $current_url);
$pid = url_to_postid( $current_url );
$queried_post = get_post($pid);
?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div class="interior_wrapper">
            <div class="nu__breadcrumb">
                
                <a href="<?php echo get_site_url() ?>" title="Coastal Sustainability Institute">Coastal Sustainability Institute</a> &gt; <?php if(get_field('type', $pid) == "") { ?><a href="<?php echo get_site_url() . '/news' ?>" title="News Archive">News Archive</a><?php } else { ?><a href="<?php echo get_site_url() . '/' . get_field('type', $pid); ?>" title="<?php echo ucfirst(get_field('type', $pid)); ?>"><?php echo ucfirst(get_field('type', $pid)); ?></a><?php } ?> &gt; <?php echo $queried_post->post_title; ?>
            </div>
            <h2 style="border-bottom: 0;"><?php echo $queried_post->post_title; ?></h2>
            <?php $image = get_field('image', $pid); ?>
            <img src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title(get_field('image')) ?>" class="featureimg" />
            <p class="caption"><?php echo get_field( "image_caption", $pid ); ?></p>
            <?php echo get_field( "content", $pid ); ?>
        </div>
	</main>

<?php get_footer(); ?>
