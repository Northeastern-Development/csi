<?php

	/* Template Name: People */




	get_header();

?>

	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1></div>
        <div class="interior_wrapper">
            <h2 style="text-align: center; border-bottom: 0;">Leadership</h2>
            <?php 
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'Staff',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
		          array(
			         'key'	 	=> 'category',
			         'value'	  	=> 'Leadership',
			         'compare' 	=> '=',
		          ),
                  array(
			         'key'	 	=> 'status',
			         'value'	  	=> '1',
			         'compare' 	=> '=',
		          ),
	           ),
            ));
            if( $posts ): ?>
	       <?php foreach( $posts as $post ): 
		      setup_postdata( $post );
            ?>
            <div class="thumb">
                <div class="thumbcopy">
                    <h3><?php echo get_field('name'); ?></h3>
                    <p style="margin-bottom: 15px;"><strong><?php echo get_field('position'); ?></strong></p>
                    <p><?php echo get_field('bio'); ?></p>
                </div>
                <div class="thumbphoto">
                    <?php $image = get_field('headshot'); ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title(get_field('headshot')) ?>" />
                </div>
                <div class="clear"></div>
            </div>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            <h2 style="text-align: center; border-bottom: 0;">Administrative Staff</h2>
            <div class="admin">
            <?php 
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'Staff',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
		          array(
			         'key'	 	=> 'category',
			         'value'	  	=> 'Administration',
			         'compare' 	=> '=',
		          ),
                  array(
			         'key'	 	=> 'status',
			         'value'	  	=> '1',
			         'compare' 	=> '=',
		          ),
	           ),
            ));
            if( $posts ): ?>
	       <?php foreach( $posts as $post ): 
		      setup_postdata( $post );
            ?>
            <div class="thumb">
                <h3><?php echo get_field('name'); ?></h3>
                <p style="margin-bottom: 15px;"><strong><?php echo get_field('position'); ?></strong></p>
                <p><span class="phone"><?php echo get_field('phone_number'); ?></span><br /><span class="email"><a href="mailto:<?php echo get_field('email'); ?>" title="Email <?php echo get_field('name'); ?>"><?php echo get_field('email'); ?></a></span></p>
            </div>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div>
        </div>
        <div class="nu__team">
            <div class="interior_wrapper">
            <h2 style="border-bottom: 0;">Experts working together to innovate across disciplines</h2>
            <p>CSI's expert faculty unite theory, practice, and applocation to create tangible, real-world results. We recruit leaders in divers fields &mdash; including maring science, public policy and engineering &mdash; who are driven to make coastal regions cleaner, safer, and smarter. These faculty embody Northeastern's collaborative and creative approach to problem-solving. They work across disciplines, with internat and external partners, to boost research capabilities and amplify impact.<br /><span style="display: block; text-align: center"><a href="#" title="Meet our team" target="_blank" class="nu__button">Meet our team</a></span></p>
            </div>
        </div>
        <div class="interior_wrapper">
            <h2 style="text-align: center; border-bottom: 0;">Employment</h2>
            <p>We are continually expanding the CSI team to add to our interdisciplnary expertise. In just the past five years, we've hire XX faculty from across the world. If you are interested in joining our team, pleas consider these available positions:</p>
            
            <p><strong>Faculty Positions</strong></p>
            <p style="margin-bottom: 15px;">Position title:<br />Full-time/part-time:<br />Tenure status:</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><a href="#" title="Apply" target="_blank" class="nu__button">Apply</a></p>
            <p style="padding-top: 25px;"><strong>Administrative Positions</strong></p>
            <p style="margin-bottom: 15px;">Position title:<br />Full-time/part-time:<br />Tenure status:</p>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br /><a href="#" title="Apply" target="_blank" class="nu__button">Apply</a></p>
        </div>
	</main>

<?php get_footer(); ?>
