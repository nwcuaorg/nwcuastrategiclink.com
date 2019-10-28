<?php

/*
Template Name: Page - Home
*/

get_header();

?>

	<?php the_showcase(); ?>

	<div class="wrap group">

		<div class="featured-products">
			<h2>Featured Products</h2>
			<div class="products">
				<div class="product-list">
					<?php the_product_list( '', true ); ?>
				</div>
				<button class="product-nav previous">Previous</button>
				<button class="product-nav next">Next</button>
			</div>
		</div>
	

		<div class="home-thirds">

			<div class="third news">
				<h2><span>The Link <span>News</span></span></h2>
				<?php
				$posts = get_posts( 'numberposts=3&order=DESC&orderby=date&post_status=publish' );
				$post = $posts[0];

				// if we have some
				if ( !empty( $posts ) ) {
					setup_postdata( $posts[0] );
					?>
				<article class="first">
					<h4><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h4>
					<p><?php the_excerpt(); ?></p>
				</article>
					<?php
				} // end if
				?>
				<button class="home-third-button link-news" data-url="/blog"><span>All Link News</span></button>
				<div class="clearfix"></div>
			</div>

			<div class="third match">
				<h2><span>CU <span>Matchup</span></span></h2>
				<article>
					<h4><a href="/cu-match-up">Looking for new ideas? Need a new income source?</a></h4>
					<p>Use our CU Match Up Tool to find the best partners to help you increase non-interest income, help with collections, save on operating expenses and more!</p>
				</article>
				<button class="home-third-button cu-match" data-url="/cu-match-up"><span>Find A Match</span></button>
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
	
	<div class="solutions">
		<div class="wrap">
			<h2>Partner Solutions</h2>
		</div>
		<?php the_product_category_list() ?>
	</div>

<?php 

get_footer();

?>