<?php

/*
Template Name: CU Match Up Results
*/

get_header();

global $goals, $stages;

function match_search() {
	if ( isset( $_REQUEST["goal"] ) || isset( $_REQUEST["category"] ) || isset( $_REQUEST["stage"] ) ) return true;
		else return false;
}

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
		<?php
		if ( match_search() ) {

			// arguments for partner query
			$args = array( 
				'post_type' => 'partner'
			);

			// if the category is specified
			if ( isset( $_REQUEST["category"] ) ) {
				$args['tax_query'] = array(
					'relation' => 'OR',
					array(
						'taxonomy' => 'product_cat',
						'field'    => 'term_id',
						'terms'    => array_keys( $_REQUEST["category"] ),
					)
				);
			}

			// if either goal or stage set, include a meta query
			if ( isset( $_REQUEST["goal"] ) || isset( $_REQUEST["stage"] ) ) {
				$args['meta_query'] = array(
				    'relation' => 'OR'
				);
			}

			// arguments for goal if that's checked
			if ( isset( $_REQUEST["goal"] ) ) {
				foreach ( $_REQUEST["goal"] as $goal => $goal_val ) {
					$args['meta_query'][] = array(
						'key' => CMB_PREFIX . 'partner_goals',
						'value' => $goal,
						'compare' => 'LIKE'
					);
				}
			}

			// arguments for stage if it's populated
			if ( isset( $_REQUEST["stage"] ) ) {
				foreach ( $_REQUEST["stage"] as $stage => $stage_val ) {				
					$args['meta_query'][] = array(
						'key' => CMB_PREFIX . 'partner_stages',
						'value' => $stage,
						'compare' => 'LIKE'
					);
				}
			}

			$the_query = new WP_Query( $args );

			?>
			<div class="partner-logos">
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
					No partners offer this product as yet.
				</div>
				<?php 
			}
			?>
			</div>
			<?php
   		} else { ?>
   		No search parameters passed.
		<?php } ?>
	</div>

<?php

get_footer();

?>