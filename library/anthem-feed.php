<?php


include( "ganon.php" );


function get_anthem_feed( $page = 1 ) {

	// set a URL once
	$url_root = 'http://www.nwcua.org/';

	// set up an empty array for the posts and a counter for the array key.
	$posts = array();
	$counter = 0;

	// retrieve the post listing from the anthem blog.
	$post_list = file_get_dom( $url_root . 'member-resources/anthem/tag/industry-insight' . ( $page > 1 ? '?page=' . $page : '' ) );

	// loop through the most recent blog entries
	foreach( $post_list( '.blog .entry-content' ) as $row ) {

		//grab the whole row
		$post_row = str_get_dom( $row->html() );

		// title
		$posts[$counter]['title'] = $post_row( 'h2 a', 0 )->getInnerText();

		// URL
		$posts[$counter]['url'] = $url_root . $post_row( 'h2 a', 0 )->getAttribute( 'href' );

		// excerpt
		$posts[$counter]['excerpt'] = $post_row( 'p', 0 )->getInnerText();

		// increment the counter
		$counter++;
	}

	// send the posts back
	return $posts;

}


?>