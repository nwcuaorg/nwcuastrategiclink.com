<?php

/*
Template Name: CU Match Up
*/

get_header();

global $goals, $stages;

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
	</div><!-- #content -->

	<div class="group">
		<form name="cu-matchup" method="post" action="<?php print $_SERVER["REQUEST_URI"] ?>results">
		<div class="accordion matchup">
			<div class="accordion-box open bg-grey-dark">
				<div class="accordion-box-title">
					<div class="wrap">
						<span class="accordion-box-title-icon">1</span>
						<h4>What are the goals of the credit union this year?</h4>
					</div>
				</div>
				<div class="accordion-box-content">
					<div class="wrap checkboxes two-column group">
					<?php
					foreach ( $goals as $goal_key => $goal ) {
						?>
						<label>
							<div class="checkbox"><input type="checkbox" name="goal[<?php print $goal_key ?>]" ></div>
							<div class="checkbox-label"><?php print $goal ?></div>
						</label>
						<?php
					}
					?>
					</div>
				</div>
			</div>
			<div class="accordion-box open bg-orange">
				<div class="accordion-box-title">
					<div class="wrap">
						<span class="accordion-box-title-icon">2</span>
						<h4>What product categories interest you?</h4>
					</div>
				</div>
				<div class="accordion-box-content">
					<div class="wrap checkboxes group">
					<?php 
					$taxonomy = 'product_cat';
					$tax_terms = get_terms( $taxonomy );
					foreach ( $tax_terms as $tax_term ) { 
						$term_id = $tax_term->term_id;
						$category_info = Taxonomy_MetaData::get( $taxonomy, $term_id );
						?>
						<label>
							<div class="checkbox"><input type="checkbox" name="category[<?php print $tax_term->term_id ?>]"></div>
							<div class="checkbox-label"><?php print $tax_term->name ?></div>
						</label>
						<?php
					}
					?>
					</div>
				</div>
			</div>
			<div class="accordion-box open bg-navy">
				<div class="accordion-box-title">
					<div class="wrap">
						<span class="accordion-box-title-icon">3</span>
						<h4>How would you describe your credit union?</h4>
					</div>
				</div>
				<div class="accordion-box-content">
					<div class="wrap checkboxes group">
					<?php
					foreach ( $stages as $stage_key => $stage ) {
						?>
						<label>
							<div class="checkbox"><input type="checkbox" name="stage[<?php print $stage_key ?>]"></div>
							<div class="checkbox-label"><?php print $stage ?></div>
						</label>
						<?php
					}
					?>
						<div class="submit-button">
							<input type="submit" value="Find My Match">
						</div>
					</div>
				</div>
			</div>
		</div>
		</form>
	</div>

<?php

get_footer();

?>