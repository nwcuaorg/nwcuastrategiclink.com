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
		<a href="/card-service-payment/"><div class="solution bg-grey-light">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-card-services.png" src="/wp-content/uploads/2015/03/icon-card-services.png">
		</div>
		<h3>Card Services</h3>
		</div></a>
		<a href="/employee-benefits/"><div class="solution bg-grey-dark">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-hr.png" src="/wp-content/uploads/2015/03/icon-hr.png">
		</div>
		<h3>Human Resources</h3>
		</div></a>
		<a href="/emerging-technology/"><div class="solution bg-teal">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-innovation.png" src="/wp-content/uploads/2015/03/icon-innovation.png">
		</div>
		<h3>Innovation</h3>
		</div></a>
		<a href="/insurance/"><div class="solution bg-lime">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-insurance.png" src="/wp-content/uploads/2015/03/icon-insurance.png">
		</div>
		<h3>Insurance</h3>
		</div></a>
		<a href="/lending-collections/"><div class="solution bg-navy">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-lending.png" src="/wp-content/uploads/2015/03/icon-lending.png">
		</div>
		<h3>Lending &amp; Collections</h3>
		</div></a>
		<a href="/member-services/"><div class="solution bg-river">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-member-services.png" src="/wp-content/uploads/2015/03/icon-member-services.png">
		</div>
		<h3>Member Services</h3>
		</div></a>
		<a href="/mobile-enhancements/"><div class="solution bg-forest">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-mobile-banking.png" src="/wp-content/uploads/2015/03/icon-mobile-banking.png">
		</div>
		<h3>Mobile Banking</h3>
		</div></a>
		<a href="/operations/"><div class="solution bg-grey-light">
		<div class="solution-icon">
		<img data-src="/wp-content/uploads/2015/03/icon-operations.png" src="/wp-content/uploads/2015/03/icon-operations.png">
		</div>
		<h3>Operations</h3>
		</div></a>
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