<?php

	/* Template Name: Spotlight */




	get_header();

?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1></div>
        <div class="interior_wrapper">
            <?=get_the_content()?>
        </div>
        <div class="nu__spotlight">
            <?php 
            $spotlight_type = strtolower(esc_html( get_the_title()) );
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'spotlight',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
		          array(
			         'key'	 	=> 'type',
			         'value'	  	=> $spotlight_type,
			         'compare' 	=> '=',
		          ),
	           ),
            ));
            
            $count = 0;
            if( $posts ): ?>
	       <?php foreach( $posts as $post ): 
		      setup_postdata( $post );
            ?>
            <article style="background-color: #777;"<?php if($count < 2) echo " class='nu__hero'"; ?>>
                    <a href="<?php the_permalink(); ?>" title="Click here now to learn more"><?php the_title(); ?></a>
                    <div class="nu__panel-content">
                        <div>
                            <h2><span><?php the_title(); ?></span></h2>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </article>
            <?php $count++; ?>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
	</main>

<?php get_footer(); ?>
