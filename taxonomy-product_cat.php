<?php
/**
 * The template for displaying Archive pages
 */

get_header(); 

$taxonomy = 'product_cat';
$term_id = get_queried_object_id();
$category_info = Taxonomy_MetaData::get( $taxonomy, $term_id );

?>
	<div class="large-title bg-<?php print !empty( $category_info['color'] ) ? $category_info['color'] : 'teal'; ?>">
		<div class="wrap">
			<?php if ( !empty( $category_info['icon'] ) ) { ?>
			<div class="large-title-icon bg-<?php print !empty( $category_info['color'] ) ? $category_info['color'] : 'teal'; ?>">
				<img src="<?php print $category_info['icon'] ?>">
			</div>
			<?php } ?>
			<div class="large-title-text">
				<h1><?php single_cat_title(); ?></h1>
			</div>
		</div>
	</div>

	<div class="wrap group" role="main">
		<?php if ( !empty( $category_info['left'] ) ) { ?>
		<div class="third">
		<?php print !empty( $category_info['left'] ) ? apply_filters( 'the_content', stripslashes( $category_info['left'] ) ) : " "; ?>
		</div>
		<?php } ?>
		<div class="<?php print ( empty( $category_info['left'] ) ? "content-wide" : "two-third" ); ?>">
		<?php print !empty( $category_info['right'] ) ? apply_filters( 'the_content', stripslashes( $category_info['right'] ) ) : " "; ?>
		</div>	
	</div><!-- #primary -->

	<div class="accordion no-icons">

		<div class="accordion-box open bg-<?php print !empty( $category_info['color'] ) ? $category_info['color'] : 'teal'; ?>">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Products</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap group">
					<div class="products">
						<div class="product-list">
						<?php 
						$args['post_type'] = 'product';
						$args['tax_query'] = array(
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'term_id',
								'terms'    => $term_id,
							)
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							while ( $query->have_posts() ) : $query->the_post(); 
?><a href="/product/<?php print $post->post_name ?>"><div class="product bg-<?php print get_cmb_value( 'large-title-color' ) ?>">
	<div class="product-icon">
		<img src="<?php print get_cmb_value( 'large-title-icon' ) ?>">
	</div>
	<h3><?php print get_the_title() ?></h3>
</div></a><?php
							endwhile;
						endif;
						wp_reset_query();
						?>
						</div>
						<button class="product-nav previous">Previous</button>
						<button class="product-nav next">Next</button>
					</div>
				</div>
			</div>
		</div>
		<div class="accordion-box open bg-<?php print !empty( $category_info['color'] ) ? $category_info['color'] : 'teal'; ?>">
			<div class="accordion-box-title">
				<div class="wrap">
					<h4>Partners</h4>
				</div>
			</div>
			<div class="accordion-box-content">
				<div class="wrap group">
					<div class="partners">
						<?php 
						$args['post_type'] = 'partner';
						$args['posts_per_page'] = -1;
						$args['tax_query'] = array( 
							array(
								'taxonomy' => 'product_cat',
								'field'    => 'term_id',
								'terms'    => $term_id,
							)
						);
						$query = new WP_Query( $args );
						if ( $query->have_posts() ) :
							?>
						<div class="partner-logos">
							<?php 
							while ( $query->have_posts() ) : $query->the_post(); 
								?>
							<div class="partner-logo">
								<a href="<?php the_permalink(); ?>"><img src="<?php print get_cmb_value( 'partner_logo' ) ?>"></a>
							</div>
								<?php 
							endwhile; 
							?>
						</div>
						<?php else: ?>
						<div class="no-partners">
							No partners offer this product as yet.
						</div>
						<?php endif; 

						wp_reset_query();
						?>
					</div>
				</div>
			</div>
		</div>

	</div><!-- #primary -->

	<div class="wrap group content-wide text-center" role="main">
		<?php the_partner_ad() ?>
	</div>


<?php

get_footer();

?>