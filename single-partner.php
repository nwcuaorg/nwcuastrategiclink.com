<?php
/**
 * Template for displaying a single product
 */

global $post;


// get some values for the partner template
$logo = get_cmb_value( 'partner_logo' );
$photo = get_cmb_value( 'partner_photo' );
$contacts = get_cmb_value( 'partner_contacts' );
$phone = get_cmb_value( 'partner_phone' );
$email = get_cmb_value( 'partner_email' );
$twitter = str_replace( "@", "", get_cmb_value( 'partner_twitter' ) );
$linkedin = str_replace( "@", "", get_cmb_value( 'partner_linkedin' ) );
$website = get_cmb_value( 'partner_website' );
$url = parse_url( $website );
if ( !empty( $url['host'] ) ) { 
	$website_cleaned = str_replace( "www.", "", $url['host'] );
}
$testimonials = get_cmb_value( 'partner_testimonials' );
$products = get_cmb_value( 'partner_products' );


// display header
get_header();


// output the showcase
the_showcase(); 

?>

	<div id="content" class="wrap group partner content-two-column" role="main">

		<div class="sidebar quarter">
			<div class="logo">
				<img src="<?php print $logo ?>">
			</div>
			<div class="connect">
				<h4>Get Connected</h4>
				<div class="contact<?php print ( count( $contacts )>1 ? ' small' : '' ) ?>">
					<p>Phone: 208.286.6794<br>
					Email: <a href="mailto:strategiclink@nwcua.org">strategiclink@nwcua.org</a></p>
					<?php if ( !empty( $website ) || !empty( $linkedin ) ) { ?><p><?php } ?>
					<?php if ( !empty( $website ) ) { ?>
					<a href="<?php print $website ?>" class="btn teal" target="_blank">Visit our Website</a><br>
					<?php } ?>
					<?php if ( !empty( $linkedin ) ) { ?>
					<a href="<?php print $linkedin; ?>" class="btn teal" target="_blank">Visit us on LinkedIn</a>
					<?php } ?>
					<?php if ( !empty( $website ) || !empty( $linkedin ) ) { ?></p><?php } ?>
				</div>
			</div>
			<?php 
			if ( !empty( $twitter ) ) { ?>
			<div class="twitter-feed">
				<h4><a href="https://twitter.com/<?php print $twitter ?>">Twitter</a></h4>
				<?php
				$upload_dir = wp_upload_dir();
				$ta = new twitterAggregator( array(

					// twitter API consumer key, secret, and oath token and oauth secret
				    'consumer_key' => "rI2mcCD7tUMLKiSYdbea91bv3",
				    'consumer_secret' => "w2bmylGVQ2BGGlQb9CFJoI9xqQ3gacjie4UbiCp8wqoP0e7y4V",
				    'oauth_access_token' => "29196496-zk653NF1sbj3mJR54Lkxcv4zmTSvm2GRTrJRf1mUA",
				    'oauth_access_token_secret' => "QeXhPPB9xYMUAHwhnAsN2BiyIi88G3YR4UFe4aWuDJyyB",

				    // comma separated list of twitter handles to pull
				    'usernames' => $twitter,

				    // set the number of tweets to show
				    'count' => 3,

					// set an update interval (minutes)
				    'update_interval' => 10,

				    // set the cache directory name/path
				    'cache_dir' => $upload_dir['basedir'] . '/cache',

				    // boolean, exclude replies, default true
				    'exclude_replies' => true,

				    // boolean, include retweets, default true
				    'include_rts' => false

				) );
				$ta->display_unstyled();
				?>
			</div>
				<?php 
			} 
			if ( has_cmb_value( 'part_awards' ) ) {
				print '<div class="awards"><h4>Awards</h4>';
				$awards = get_cmb_value( 'part_awards' ); 
				foreach ( $awards as $award ) { 
					if ( !empty( $award['alt'] ) && !empty( $award['image'] ) ) {
						if ( !empty( $award['link'] ) ) print "<a href='" . $award['link'] . "'>";
						print "<img src='" . $award['image'] . "' alt='" . $award['alt'] . "' />";
						if ( !empty( $award['link'] ) ) print "</a>";
					}
				}
				print "</div>";
			}
			?>
		</div>

		<div class="three-quarter">
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
		</div>

	</div><!-- #content -->


	<div class="accordion no-icons">

		<div class="accordion-box open bg-teal">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Products Offered</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<div class="products">
						<div class="product-list">
							<?php the_product_list( get_cmb_value( 'partner_products' ) ); ?>
						</div>
						<button class="product-nav previous">Previous</button>
						<button class="product-nav next">Next</button>
					</div>
				</div>
			</div>
		</div>

		<?php if ( has_cmb_value( 'partner_testimonials' ) ) { ?>
		<div class="accordion-box bg-teal-light">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Testimonials</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<?php show_cmb_wysiwyg_value( 'partner_testimonials' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if ( has_cmb_value( 'partner_articles' ) ) { ?>
		<div class="accordion-box bg-teal-lighter">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Articles</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<?php show_cmb_wysiwyg_value( 'partner_articles' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if ( has_cmb_value( 'partner_webinars' ) ) { ?>
		<div class="accordion-box bg-lime">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Upcoming Webinars</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<?php show_cmb_wysiwyg_value( 'partner_webinars' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<?php if ( has_cmb_value( 'partner_videos' ) ) { ?>
		<div class="accordion-box bg-teal-lightest">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Videos</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<?php show_cmb_wysiwyg_value( 'partner_videos' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>

	</div>

<?php

get_footer();

?>