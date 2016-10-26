<?php

/*
Template Name: Find a Partner
*/

get_header();


?>

	<?php the_large_title(); ?>

	<?php if ( has_cmb_value( 'left_content' ) ) { ?>
	<div id="content" class="wrap groupcontent-two-column" role="main">
		<div class="quarter">
			<?php show_cmb_wysiwyg_value( 'left_content' ) ?>
		</div>
		<div class="three-quarter">
	<?php } else { ?>
	<div id="content" class="wrap group content-wide" role="main">
	<?php } ?>
		<?php 
		if ( have_posts() ) :
			while ( have_posts() ) : the_post(); 
				the_content();
			endwhile;
		endif;
		?>
		<?php if ( has_cmb_value( 'left_content' ) ) { ?></div><?php } ?>
	</div>

	<div class="group">
		<div class="accordion no-icons">

		<?php

		$product_categories = get_product_categories();

		foreach ( $product_categories as $prod_cat ) {
			$category_info = Taxonomy_MetaData::get( 'product_cat', $prod_cat->term_id );

			// partner listing.
			$args = array(
				'post_type' => 'partner',
				'posts_per_page' => '-1',
				'tax_query' => array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => $prod_cat->term_id,
					)
				) 
			);

			$the_query = new WP_Query( $args );

			?>
			<div class="accordion-box bg-<?php print $category_info["color"]; ?>">
				<div class="accordion-box-title">
					<div class="wrap">
						<h4><?php print $prod_cat->name ?></h4>
					</div>
				</div>
				<div class="accordion-box-content">
					<div class="wrap partner-logos group">
					<?php
					if ( $the_query->have_posts() ) { 
						while ( $the_query->have_posts() ) : $the_query->the_post();
							?>
						<div class="partner-logo">
							<a href="<?php the_permalink(); ?>"><img src="<?php print get_cmb_value( 'partner_logo' ) ?>"></a>
						</div>
							<?php 
						endwhile; 
					} else { 
						?>
						<div class="no-partners">
							No partners in this category as yet.
						</div>
						<?php 
					}
					?>
					</div>
				</div>
			</div>
			<?php 
			wp_reset_query();
		}

		?>
		</div>
	</div>


<?php

get_footer();

?>