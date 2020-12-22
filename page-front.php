<?php

/*
Template Name: Page - Home
*/

get_header();


$featured_partner = get_cmb_value( 'home_featured_partner' );

?>

	<?php the_showcase(); ?>
	
	<div class="solutions">
		<div class="wrap">
			<h2>Partner Solutions</h2>
		</div>
		<?php the_product_category_list() ?>
	</div>

	<div class="wrap group">	

		<div class="home-thirds">

			<div class="third news">
				<h2><span>The Link <span>News</span></span></h2>
				<?php
				$posts = get_posts( 'numberposts=3&order=DESC&orderby=date&post_status=publish' );
				$post = $posts[0];

				// if we have some
				if ( !empty( $posts ) ) {
					foreach ( $posts as $post ) {
						setup_postdata( $post );
					?>
				<article class="first">
					<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
					<!--<p><?php the_excerpt(); ?></p>-->
				</article>
					<?php
					}
				} // end if

				wp_reset_query();
				?>
				<button class="home-third-button link-news" data-url="/blog"><span>All Link News</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third match">
				<h2><span>Featured<span>Partner</span></span></h2>
				<?php
				$post = get_post( $featured_partner );
				setup_postdata( $post );
				$logo = get_cmb_value( 'partner_logo' );
				?>
				<article>
					<p><a href="<?php the_permalink() ?>"><img src="<?php print $logo; ?>" /></a></p>
				</article>
				<button class="home-third-button cu-match" data-url="<?php the_permalink() ?>"><span>Learn More</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third events">
				<h2><span>Upcoming Link <span>Events</span></span></h2>
				<?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('home-events')) : ?>[events widget]<?php endif; ?>
				<button class="home-third-button link-events" data-url="/events/month"><span>All Link Events</span></button>
				<div class="clearfix"></div>
			</div>

		</div>

	</div>

<?php 

get_footer();

?>