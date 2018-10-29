<?php

	/* Template Name: Homepage */




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

	<main id="nu__homepage" role="main" aria-label="content" class="smooth">
		<div id="nu__seo-content"><h1><?=get_the_content()?></h1></div>
        <div class="nu__fullwrap">
            <div class="nu__hero">
                <div class="nu__txtbox"><h1>Building knowledge and innovative strategies to create cleaner, safer, smarter coastal communities.</h1><p style="padding-top: 15px;"><a href="" class="nu__button" title="Learn More">Learn More</a></p></div>
                <article class="nu__imgbox" style="background-color: #777;">
                    <a href="<?php echo get_site_url(); ?>/nucsi/research/" title="Click here now to learn more">Research</a>
                    <div class="nu__panel-content">
                        <div>
                            <p>Exploration that delivers actionable results</p>
                            <h2><span>Research</span></h2>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </article>
            </div>
            <div class="nu__stories">
                <article style="background-color: #777;">
                    <a href="<?php echo get_site_url(); ?>/nucsi/partnerships/" title="Click here now to learn more">Partnerships</a>
                    <div class="nu__panel-content">
                        <div>
                            <p>Collaboration among the world's best minds</p>
                            <h2><span>Partnerships</span></h2>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </article>
                <article style="background-color: #777;">
                    <a href="<?php echo get_site_url(); ?>/nucsi/people/" title="Click here now to learn more">People</a>
                    <div class="nu__panel-content">
                        <div>
                            <p>Premier faculty conquering complex coastal threats</p>
                            <h2><span>People</span></h2>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </article>
                <article style="background-color: #777;">
                    <a href="<?php echo get_site_url(); ?>/nucsi/resources/" title="Click here now to learn more">Resources</a>
                    <div class="nu__panel-content">
                        <div>
                            <p>A state-of-the-art coastal hub near Boston</p>
                            <h2><span>Resources</span></h2>
                        </div>
                    </div>
                    <div class="gradient"></div>
                </article>

            </div>

            <div class="nu__quote">
                <h1>We're committed to producing innovative, interdisciplinary research that yields sustainable solutions to the biggest challenges conrfonting the world's coastal ecosystems.</h1>
                <p>Geoff Trussell, executive director, Coastal Sustainability Institute</p>
            </div>

            <div style="background-color: #ECE7d4;">
                <h3 style="text-align: center; border-bottom: 0; padding: 40px 0 20px 0; color: #000000;">Featured News</h3>
                <div class="news">
                    <?php
                    $spotlight_type = strtolower(esc_html( get_the_title()) );
                    $posts = get_posts(array(
	                   'posts_per_page'	=> 3,
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
                    if( $posts ): ?>
	               <?php foreach( $posts as $post ):
		              setup_postdata( $post );
                    ?>
                    <article style="margin-bottom: 30px;">
                        <a href="<?php the_permalink(); ?>" class="linkcover" title="Read More"></a>
                        <?php $image = get_field('image'); ?>
                        <div class="articleimg" style="background-image: url(<?php echo $image['url'] ?>);">
                            <div class="article_tag"><?php echo get_field('tag_label') ?></div>
                            <div class="darkcover"></div>
                        </div>

                        <div class="articlecopy">
                            <p style="margin-bottom: 5px;"><strong><?php the_title(); ?><br />by <?php echo get_field('author_name'); ?></strong></p>
                            <div class="small" style="margin-bottom: 5px;"><?php echo truncate(get_field('content'), 100); ?></div>
                            <div class="small"><a href="<?php the_permalink(); ?>" class="arrow" title="Click here now to learn more">Read More</a></div>
                        </div>
                    </article>
	               <?php endforeach; ?>
	               <?php wp_reset_postdata(); ?>
                    <?php endif; ?>
                    <div style="width: 100%; padding: 0 0 60px 0; text-align: center; margin: 0;"><a href="<?php echo get_site_url() . '/news' ?>" title="View All News" class="nu__button">View All News</a></div>
                </div>
            </div>

            <div class="nu__callouts">
                <div class="nu__inner-wrap">
                    <h1>Coastal Imperative</h1>
                    <div>
                        <div><h2>40%</h2><p>of the world's population lives within 100 km of a coast</p></div>
                        <div><h2>$1.5T</h2><p>Amount oceans contribute annually in value-add to the world economy</p></div>
                        <div><h2>275M</h2><p>Estimated number of people living in areas that will be flooded due to global</p></div>
                    </div>
                </div>
            </div>
        </div>
		<!--<div id="nu__stories">
			<?php get_template_part('loops/loop-homepagestories'); ?>

		</div>-->

	</main>

<?php get_footer(); ?>
