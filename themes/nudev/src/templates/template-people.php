<?php
	/* Template Name: People */

    get_header();
    global $wp;
    $current_url = home_url( add_query_arg( array(), $wp->request ) );
    $stid = $wp_query->query_vars['stid'];
    if (!isset($stid)) {
        $stid = 'All';
    }
    switch($stid) {
        case "faculty":
            $stid = "Faculty";
            break;
        case "affiliated-faculty":
            $stid = "Affiliated Faculty";
            break;
        case "emeritus-faculty":
            $stid = "Emeritus Faculty";
            break;
        case "ogl-staff":
            $stid = "OGL Staff";
            break;
        case "research-staff":
            $stid = "Research Staff";
            break;
        case "graduate-students":
            $stid = "Graduate Students";
            break;
        default:
            $stid = "All";
            break;
    }
?>
	<main id="nu__interior" role="main" aria-label="content" class="smooth">
        <div id="nu__pagetitle"><h1><?php echo esc_html( get_the_title() ); ?></h1>
            <div class="header_wrapper"><?php the_content(); // Dynamic Content ?></div>
        </div>
        <div class="staffnav">
            <ul id="nu__staffnav" class="<?php echo(strtolower(str_replace(' ', '_', $stid))); ?>">
                <li><a href="<?php echo get_site_url(); ?>/people/" title="All">All</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/faculty/" title="Faculty">Faculty</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/affiliated-faculty/" title="Affiliated Faculty">Affiliated Faculty</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/emeritus-faculty/" title="Emeritus Faculty">Emeritus Faculty</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/ogl-staff/" title="OGL Staff">OGL Staff</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/research-staff/" title="Research Staff">Research Staff</a></li>
                <li><a href="<?php echo get_site_url(); ?>/people/graduate-students/" title="Graduate Students">Graduate Students</a></li>
            </ul>
        </div>
        
        <div class="interior_wrapper" style="padding-top: 0; padding-bottom: 20px;">
            <?php 
            if ($stid == "All") {
                $posts = get_posts(array(
	               'posts_per_page'	=> -1,
	               'post_type'			=> 'Staff',
	           'orderby'			=> 'lastname',
	           'order'				=> 'DESC',
                    'meta_query'	=> array(
		              'relation'		=> 'AND',
                      array(
			             'key'	 	=> 'status',
			             'value'	  	=> '1',
			             'compare' 	=> '=',
		              ),
                    array(
			             'key'	 	=> 'category',
			             'value'	  	=> 'Marketing Staff',
			             'compare' 	=> '!=',
		              ),
	               ),
                ));
            } else {
                $posts = get_posts(array(
	               'posts_per_page'	=> -1,
	               'post_type'			=> 'Staff',
	           'orderby'			=> 'lastname',
	           'order'				=> 'DESC',
                    'meta_query'	=> array(
		              'relation'		=> 'AND',
		              array(
			             'key'	 	=> 'category',
			             'value'	  	=> $stid,
			             'compare' 	=> '=',
		              ),
                    array(
			             'key'	 	=> 'status',
			             'value'	  	=> '1',
			             'compare' 	=> '=',
		              ),
	               ),
                ));
            }
            if( $posts ): ?>
	       <?php foreach( $posts as $post ): 
		      setup_postdata( $post );
            ?>
            <div class="thumb">
                <div class="thumbcopy" style="margin-bottom: 15px;">
                    <p><?php echo get_field('bio'); ?></p>
                    <p><?php if(get_field('phone_number') != "") { ?><span class="phone"><?php echo get_field('phone_number'); ?></span><br /><?php } ?><span class="email"><a href="mailto:<?php echo get_field('email'); ?>" title="Email <?php echo get_field('name'); ?>"><?php echo get_field('email'); ?></a></span></p>
                </div>
                <div class="thumbphoto" style="margin-bottom: 15px;">
                    <?php $image = get_field('headshot'); ?>
                    <?php if($image != '') { ?>
                    <img src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title(get_field('headshot')) ?>" style="padding-bottom: 10px;" />
                    <?php } else { ?>
                    <img src="<?=home_url()?>/wp-content/uploads/staffdefault.png" alt="Default Photo" style="padding-bottom: 10px;" />
                    <?php } ?>
                    <p><strong><?php echo get_field('firstname') . ' ' . get_field('lastname'); ?></strong><br /><?php echo get_field('position'); ?></p>
                </div>
                <div class="clear"></div>
            </div>
	        <?php endforeach; ?>
            <?php else: ?>
            <p style="padding: 0 0 50px 0; text-align: center;">This group is empty, please select another group.</p>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            
        </div>
            <h3 style="text-align: center; border-bottom: 0; padding-bottom: 20px;">Marketing Staff</h3>
            <div class="admin">
            <?php 
            $posts = get_posts(array(
	           'posts_per_page'	=> -1,
	           'post_type'			=> 'Staff',
	           'orderby'			=> 'lastname',
	           'order'				=> 'ASC',
                'meta_query'	=> array(
		          'relation'		=> 'AND',
		          array(
			         'key'	 	=> 'category',
			         'value'	  	=> 'Marketing Staff',
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
                <?php $image = get_field('headshot'); ?>
                <?php if($image != '') { ?>
                <img src="<?php echo $image['url'] ?>" alt="<?php echo get_the_title(get_field('headshot')) ?>" style="padding-bottom: 10px;" />
                <?php } else { ?>
                <img src="<?=home_url()?>/wp-content/uploads/staffdefault.png" alt="Default Photo" style="padding-bottom: 10px;" />
                <?php } ?>
                <p style="margin-bottom: 7px;"><strong><?php echo get_field('firstname') . ' ' . get_field('lastname'); ?></strong></p>
                <p><?php echo get_field('position'); ?></p>
            </div>
	        <?php endforeach; ?>
	        <?php wp_reset_postdata(); ?>
            <?php endif; ?>
            </div>
	</main>

<?php get_footer(); ?>
