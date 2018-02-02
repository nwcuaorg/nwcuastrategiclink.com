<?php
/*
Home/catch-all template
*/

get_header(); ?>


	<div id="primary" class="content-area">
		<div id="content" class="site-content content-wide wrap" role="main">
			<div class="quarter sidebar">
			<?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('sidebar-blog') ) : ?><!-- no sidebar --><?php endif; ?>
			</div>
			<div class="three-quarter blog-list">
			<img src="<?php bloginfo( 'template_url' ) ?>/img/logo-blog.png">
			<?php
			if ( is_search() ) {
				?><h1>Search Results for <span>'<?php print $_REQUEST["s"]; ?>'</span></h1><?php
			}

			while ( have_posts() ) : the_post();
				?>
				<hr>
				<div class="entry group">
					<?php the_post_thumbnail( array( 350, 200 ) ); ?>
					<h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
					<?php the_excerpt(); ?>
				</div>
				<?php
			endwhile;
			?>
			</div>

		</div><!-- #content -->
	</div><!-- #primary -->


<?php get_footer(); ?>