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
$facebook = get_cmb_value( 'partner_facebook' );
$twitter = str_replace( "@", "", get_cmb_value( 'partner_twitter' ) );
$linkedin = str_replace( "@", "", get_cmb_value( 'partner_linkedin' ) );
$website = get_cmb_value( 'partner_website' );
$url = parse_url( $website );
if ( !empty( $url['host'] ) ) { 
	$website_cleaned = str_replace( "www.", "", $url['host'] );
}
$testimonials = get_cmb_value( 'partner_testimonials' );
$products = get_cmb_value( 'partner_products' );
if ( has_cmb_value( 'partner_type' ) ) {
	$partner_type = get_cmb_value( 'partner_type' );
} else {
	$partner_type = 'industry';
}


function expand_check( $accordion ) {
	if ( isset( $_REQUEST['expand'] ) ) {
		if ( $_REQUEST['expand'] == $accordion ) {
			print " open";
		}
	}
}


// display header
get_header();


?>
	<div class="partner-header-background <?php print $partner_type; ?>">
		&nbsp;
	</div>

	<div id="content" class="wrap group partner content-two-column" role="main">
		

		<div class="sidebar quarter">
			<div class="logo">
				<img src="<?php print $logo ?>">
			</div>
			<div class="connect">
				<h4>Get Connected</h4>
				<div class="contact<?php print ( count( $contacts )>1 ? ' small' : '' ) ?>">
					<p><a href="tel:2082866794">208.286.6794</a><br>
						<a href="mailto:strategiclink@nwcua.org">strategiclink@nwcua.org</a></p>
					<p>
						<?php if ( !empty( $email ) ) { ?>
						<a href="<?php print ( stristr( $email, '@' ) ? 'mailto:' . $email : $email ); ?>" class="btn teal" target="_blank">Connect With Us</a>
						<?php } ?>
						<?php if ( !empty( $website ) ) { ?>
						<a href="<?php print $website ?>" class="btn teal" target="_blank">Visit Our Website</a>
						<?php } ?>
					</p>
					<p>
					<?php if ( !empty( $linkedin ) ) { ?>
					<a href="<?php print $linkedin; ?>" class="" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/social-linkedin.png" /></a> &nbsp;
					<?php } ?>
					<?php if ( !empty( $twitter ) ) { ?>
					<a href="https://twitter.com/<?php print $twitter; ?>" class="" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/icon-twitter-bird.png" /></a> &nbsp;
					<?php } ?>
					<?php if ( !empty( $facebook ) ) { ?>
					<a href="<?php print $facebook; ?>" class="" target="_blank"><img src="<?php bloginfo( 'template_url' ); ?>/img/icon-facebook.png" /></a> &nbsp;
					<?php } ?>
				</div>
			</div>
			<?php 
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

		<?php if ( has_cmb_value( 'partner_webinars' ) ) { ?>
		<a name="webinars"></a>
		<div class="accordion-box bg-grey-dark<?php expand_check( 'webinars' ) ?>">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Webinars</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap">
					<?php show_cmb_wysiwyg_value( 'partner_webinars' ); ?>
				</div>
			</div>
		</div>
		<?php } ?>

		<a name="products"></a>
		<div class="accordion-box bg-teal<?php expand_check( 'products' ) ?>">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Products Offered</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap product-listing">
					<ul>
					<?php 
					$products = get_cmb_value( 'partner_products' );

				    $args = array( 'post_type' => 'product', 'posts_per_page' => 30 );
				    if ( !empty( $products ) ) {
				    	$args[ 'post__in' ] = $products;
				    }
				    $loop = new WP_Query( $args );
				    $products = array();
				    while ( $loop->have_posts() ) : $loop->the_post();
				    	global $post;
				        ?><li><a href="/product/<?php print $post->post_name ?>"><?php print get_the_title() ?></a></li><?php
				    endwhile;
				    wp_reset_query();

					?>
					</ul>
				</div>
		</div>

		<?php if ( has_cmb_value( 'partner_testimonials' ) ) { ?>
		<a name="testimonials"></a>
		<div class="accordion-box bg-teal-light<?php expand_check( 'testimonials' ) ?>">
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
		<a name="articles"></a>
		<div class="accordion-box bg-teal-lighter<?php expand_check( 'articles' ) ?>">
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

		<?php if ( has_cmb_value( 'partner_videos' ) ) { ?>
		<a name="videos"></a>
		<div class="accordion-box bg-teal-lightest <?php expand_check( 'videos' ) ?>">
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

	<div class="group">
		<?php the_accordion(); ?>
	</div>

<?php

get_footer();

?>