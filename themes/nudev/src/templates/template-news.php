<?php

	/* Template Name: News */




	get_header();

    function truncate($text, $chars = 300) {
        if (strlen($text) <= $chars) {
            return $text;
        }
        $text = $text." ";
        $text = substr($text,0,$chars);
        $text = substr($text,0,strrpos($text,' '));
        $text = $text."...";
        return $text;
    }

?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1></div>
            <h3 style="text-align: center; border-bottom: 0; padding: 30px 0 10px 0; font-weight: 300;">Featured</h3>
            <div class="news">
            <?php 
            $spotlight_type = strtolower(esc_html( get_the_title()) );
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'post',
	           'orderby'			=> 'post_date',
	           'order'				=> 'DESC',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
                  array(
			         'key'	 	=> 'featured',
			         'value'	  	=> '1',
			         'compare' 	=> '=',
		          ),
	           ),
            ));
            
            $count = 0;
            if( $posts ): ?>
	       <?php foreach( $posts as $post ):
		      setup_postdata( $post );
            ?>
            <?php if($count == 0) { ?>
            <article class="featured">
                    <a href="<?php the_permalink(); ?>" class="linkcover" title="Read More"></a>
                    <?php $image = get_field('image'); ?>
                    <div class="articleimg" style="background-image: url(<?php echo $image['url'] ?>);">
                        <div class="article_tag"><?php echo get_field('tag_label') ?></div>
                        <div class="darkcover"></div>
                    </div>
                    
                    <div class="articlecopy">
                        <p style="margin-bottom: 12px;"><strong><?php the_title(); ?><br />by <?php echo get_field('author_name'); ?></strong></p>
                        <div class="small" style="margin-bottom: 5px;"><?php echo truncate(get_field('content')); ?></div>
                        <div class="small"><a href="<?php the_permalink(); ?>" class="arrow" title="Read More">Read More</a></div>
                    </div>
                </article>
            <?php } else { ?>
                <article>
                    <a href="<?php the_permalink(); ?>" class="linkcover" title="Read More"></a>
                    <?php $image = get_field('image'); ?>
                    <div class="articleimg" style="background-image: url(<?php echo $image['url'] ?>);">
                        <div class="article_tag"><?php echo get_field('tag_label') ?></div>
                        <div class="darkcover"></div>
                    </div>
                    
                    <div class="articlecopy">
                        <p style="margin-bottom: 5px;"><strong><?php the_title(); ?><br />by <?php echo get_field('author_name'); ?></strong></p>
                        <div class="small" style="margin-bottom: 5px;"><?php echo truncate(get_field('content'), 100); ?></div>
                        <div class="small"><a href="<?php the_permalink(); ?>" class="arrow" title="Read More">Read More</a></div>
                    </div>
                </article>
            <?php } ?>
            <?php $count++; ?>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
        </div>
        <div style="background-color: #ECE7d4;">
        <h3 style="text-align: center; border-bottom: 0; padding: 30px 0 10px 0; font-weight: 300;">Archives</h3>
        <div class="news">
            <?php 
            $spotlight_type = strtolower(esc_html( get_the_title()) );
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'post',
	           'orderby'			=> 'post_date',
	           'order'				=> 'DESC',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
                  array(
			         'key'	 	=> 'featured',
			         'value'	  	=> '0',
			         'compare' 	=> '=',
		          ),
	           ),
            ));
            if( $posts ): ?>
	       <?php foreach( $posts as $post ):
		      setup_postdata( $post );
            ?>
                <article>
                    <a href="<?php the_permalink(); ?>" class="linkcover" title="Read More"></a>
                    <?php $image = get_field('image'); ?>
                    <div class="articleimg" style="background-image: url(<?php echo $image['url'] ?>);">
                        <div class="article_tag"><?php echo get_field('tag_label') ?></div>
                        <div class="darkcover"></div>
                    </div>
                    
                    <div class="articlecopy">
                        <p style="margin-bottom: 5px;"><strong><?php the_title(); ?><br />by <?php echo get_field('author_name'); ?></strong></p>
                        <div class="small" style="margin-bottom: 5px;"><?php echo truncate(get_field('content'), 100); ?></div>
                        <div class="small"><a href="<?php the_permalink(); ?>" class="arrow" title="Read More">Read More</a></div>
                    </div>
                </article>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <div style="width: 100%; padding: 0 0 60px 0; text-align: center; margin: 0;"><a href="#" title="Get Started" target="_blank" class="nu__button">Load More News</a></div>
            </div>
        </div>
	</main>

<?php get_footer(); ?>
