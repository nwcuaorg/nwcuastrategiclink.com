<?php


// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'flush_rewrite_rules' );



// let's create the function for the custom type
function strategic_post_types() { 


	// creating (registering) the custom type 
	register_post_type( 'product', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Product', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Product', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Products', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Product', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Product', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Product', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Product', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Products', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the products listed on the site.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-admin-product.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'product', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor' )
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'product' );



	// creating (registering) the custom type 
	register_post_type( 'partner', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
		// let's now add all the options for this post type
		array( 
			'labels' => array(
				'name' => __( 'Partner', 'ptheme' ), /* This is the Title of the Group */
				'singular_name' => __( 'Partner', 'ptheme' ), /* This is the individual type */
				'all_items' => __( 'All Partners', 'ptheme' ), /* the all items menu item */
				'add_new' => __( 'Add New', 'ptheme' ), /* The add new menu item */
				'add_new_item' => __( 'Add New Partner', 'ptheme' ), /* Add New Display Title */
				'edit' => __( 'Edit', 'ptheme' ), /* Edit Dialog */
				'edit_item' => __( 'Edit Partner', 'ptheme' ), /* Edit Display Title */
				'new_item' => __( 'New Partner', 'ptheme' ), /* New Display Title */
				'view_item' => __( 'View Partner', 'ptheme' ), /* View Display Title */
				'search_items' => __( 'Search Partners', 'ptheme' ), /* Search Custom Type Title */ 
				'not_found' =>  __( 'Nothing found in the database.', 'ptheme' ), /* This displays if there are no entries yet */ 
				'not_found_in_trash' => __( 'Nothing found in Trash', 'ptheme' ), /* This displays if there is nothing in the trash */
				'parent_item_colon' => ''
			), /* end of arrays */
			'description' => __( 'Manage the partners listed on the site.', 'ptheme' ), /* Custom Type Description */
			'public' => true,
			'publicly_queryable' => true,
			'exclude_from_search' => false,
			'show_ui' => true,
			'query_var' => true,
			'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */ 
			'menu_icon' => get_stylesheet_directory_uri() . '/img/icon-admin-partner.png', /* the icon for the custom post type menu */
			'rewrite'	=> array( 
				'slug' => 'partner', 
				'with_front' => false 
			), /* you can specify its url slug */
			'has_archive' => false, /* you can rename the slug here */
			'capability_type' => 'post',
			'hierarchical' => false,
			/* the next one is important, it tells what's enabled in the post editor */
			'supports' => array( 'title', 'editor' )
		) /* end of options */
	); /* end of register post type */
	
	/* this adds your post tags to your custom post type */
	register_taxonomy_for_object_type( 'post_tag', 'partner' );
	

}


// adding the function to the Wordpress init
add_action( 'init', 'strategic_post_types');



// now let's add custom categories (these act like categories)
register_taxonomy( 'product_cat', 
	array( 'product', 'partner' ), /* if you change the name of register_post_type( 'custom_type', then you have to change this */
	array('hierarchical' => true,     /* if this is true, it acts like categories */
		'labels' => array(
			'name' => __( 'Product Categories', 'ptheme' ), /* name of the custom taxonomy */
			'singular_name' => __( 'Product Category', 'ptheme' ), /* single taxonomy name */
			'search_items' =>  __( 'Search Product Categories', 'ptheme' ), /* search title for taxomony */
			'all_items' => __( 'All Product Categories', 'ptheme' ), /* all title for taxonomies */
			'parent_item' => __( 'Parent Product Category', 'ptheme' ), /* parent title for taxonomy */
			'parent_item_colon' => __( 'Parent Product Category:', 'ptheme' ), /* parent taxonomy title */
			'edit_item' => __( 'Edit Product Category', 'ptheme' ), /* edit custom taxonomy title */
			'update_item' => __( 'Update Product Category', 'ptheme' ), /* update title for taxonomy */
			'add_new_item' => __( 'Add New Product Category', 'ptheme' ), /* add new title for taxonomy */
			'new_item_name' => __( 'New Area Product Name', 'ptheme' ) /* name title for taxonomy */
		),
		'show_admin_column' => true, 
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array( 
			'slug' => 'products'
		)
	)
);



function list_product_category( $category ) {

	// select the areas of interest in the category
	$areas = get_product_category( $category );

	// count em
	$area_count = count( $areas );

	// determine what a quarter of the total records is so we can make columns
	$quarter = ceil( $area_count / 4 );

	// loop through the post results
	$num = 1;
	foreach ( $areas as $area ) {
		if ( $num == 1 || $num == $quarter+1 || $num == ( $quarter * 2 )+1 || $num == ( $quarter * 3 )+1 ) {
			?>
	<ul class="column<?php print ( $num == 1 ? ' one' : '' ); print ( $num == $quarter+1 ? ' two' : '' ); print ( $num == ($quarter*2)+1 ? ' three' : '' ); print ( $num == ($quarter*3)+1 ? ' four' : '' ); ?>">
			<?php
		}
		?>
		<li><a href="/area/<?php print $area->post_name ?>"><?php print $area->post_title; ?></a></li>
		<?php 
		if ( $num == $quarter || $num == ( $quarter * 2 ) || $num == ( $quarter * 3 ) || $num == $area_count ) {
			?>
	</ul>
			<?php
		}
		$num++;
	}
	?>
	<?php
	
	// reset the post data
	wp_reset_postdata();

}



function get_product_category( $category ) {
	global $wpdb;

	// Count custom post type by custom taxonomy
	$sql = "SELECT * FROM $wpdb->posts p
	JOIN $wpdb->term_relationships tr ON (p.ID = tr.object_id)
	JOIN $wpdb->term_taxonomy tt ON (tr.term_taxonomy_id = tt.term_taxonomy_id AND tt.taxonomy = 'product_cat')
	JOIN $wpdb->terms t ON (tt.term_id = t.term_id AND t.slug = '$category' )
	WHERE p.post_type = 'product'
	AND (p.post_status = 'publish')
	AND p.post_date < NOW() ORDER BY p.post_title;";

	$rows = $wpdb->get_results( $sql );

	return $rows;
}



// Product category list.
function the_product_category_list() {

	$taxonomy = 'product_cat';
	$tax_terms = get_terms( $taxonomy );
	foreach ( $tax_terms as $tax_term ) { 
		$term_id = $tax_term->term_id;
		$category_info = Taxonomy_MetaData::get( $taxonomy, $term_id );
		?>
		<a href="<?php print esc_attr( get_term_link( $tax_term, $taxonomy ) ); ?>"><div class="solution bg-<?php print $category_info['color'] ?>">
			<div class="solution-icon">
				<img src="<?php print $category_info['icon'] ?>">
			</div>
			<h3><?php print $tax_term->name ?></h3>
		</div></a>
		<?php
	}

}



function get_product_categories() {
	return get_terms( 'product_cat' );
}



// Product listing
function the_product_list( $products = '', $random = false ) {

    $args = array( 'post_type' => 'product', 'posts_per_page' => 30 );
    if ( !empty( $products ) ) {
    	$args[ 'post__in' ] = $products;
    }
    if ( $random ) {
    	$args[ 'orderby' ] = 'rand';
    }
    $loop = new WP_Query( $args );
    $products = array();
    while ( $loop->have_posts() ) : $loop->the_post();
    	global $post;
        $products[get_the_ID()] = $post;
        $products[get_the_ID()]->icon = get_cmb_value( 'product_icon' );
        ?><a href="/product/<?php print $post->post_name ?>"><div class="product bg-<?php print get_cmb_value( 'large-title-color' ) ?>">
				<div class="product-icon">
					<img src="<?php print get_cmb_value( 'large-title-icon' ) ?>">
				</div>
				<h3><?php print get_the_title() ?></h3>
			</div></a><?php
    endwhile;
    wp_reset_query();

}



function the_partner_list( $partners = '' ) {

	global $post;

	// args
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'partner',
	);

	if ( $post->post_type == 'product' ) {
		$args['meta_query'] = array(
			array(
				'key' => '_p_partner_products',
				'value' => '"' . $post->ID . '"',
				'compare' => 'LIKE'
			),
		);
	}

    if ( !empty( $partners ) ) {
    	$args[ 'post__in' ] = $partners;
    }

    // sort it
    $args[ 'meta_key' ] = '_p_partner_featured';
    $args[ 'orderby' ] = array( 
    	'meta_value' => 'DESC',
    	'title' => 'ASC'
    );

	// get results
	$the_query = new WP_Query( $args );

	// The Loop
	?>
	<?php if ( $the_query->have_posts() ) { ?>
		<?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
			<div class="partner-logo">
				<a href="<?php the_permalink(); ?>"><img src="<?php print get_cmb_value( 'partner_logo' ) ?>"></a>
			</div>
		<?php endwhile; ?>
	<?php } else { ?>
		<div class="no-partners">
			No partners offer this product as yet.
		</div>
	<?php } ?>

	<?php wp_reset_query();  // Restore global post data stomped by the_post().

}



function the_partner_ad() {

	// args
	$args = array(
		'posts_per_page' => -1,
		'post_type' => 'partner',
		'orderby' => 'rand'
	);

	// get results
	$the_query = new WP_Query( $args );

	// The Loop
	?>
	<div class="partner-ad">
	<?php 
	if ( $the_query->have_posts() ) { 
		while ( $the_query->have_posts() ) : $the_query->the_post();
			if ( has_cmb_value( 'partner_ad_link' ) && has_cmb_value( 'partner_ad_image' ) ) {
				?>
		<a href="<?php the_permalink(); ?>"><img src="<?php show_cmb_value( 'partner_ad_image' ) ?>" class="ad"></a>
				<?php 
			}
		endwhile;
	} ?>
	</div>
	<?php wp_reset_query();  // Restore global post data stomped by the_post().

}


?>