<?php

	/* Template Name: Interior */




	get_header();
$pagename = get_query_var('pagename');

?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1></div>
        <div class="interior_wrapper">
            <?=get_the_content()?>
            
        </div>
        
        <?php if(strtolower(esc_html( get_the_title()) ) == "education") { ?>
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
			         'value'	  	=> 'education',
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
                    <?php $plink = get_permalink(); $tlink = str_replace("spotlight", $pagename, $plink)?>
                    <a href="<?php echo $tlink; ?>" title="Click here now to learn more"><?php the_title(); ?></a>
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
        <div class="nu__callouts education">
                <div class="nu__inner-wrap">
                    <h1 class="edu">Stats area title TK</h1>
                    <div>
                        <div><h2>9TK</h2><p>Lorem ipsum placeholder text goes here dolar sit unam vie dei carped diem</p></div>
                        <div><h2>1TK</h2><p>Lorem ipsum placeholder text goes here dolar sit unam vie dei carped diem</p></div>
                        <div><h2>6TK</h2><p>Lorem ipsum placeholder text goes here dolar sit unam vie dei carped diem</p></div>
                    </div>
                </div>
            </div>
        <?php } ?>
	</main>

<?php get_footer(); ?>
