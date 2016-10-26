

SET @wp_url_old = 'http://strategic.giraphprojects.com', @wp_url_new = 'http://nwcuastrategiclink.com';

UPDATE sl_options SET option_value = replace( option_value, @wp_url_old, @wp_url_new ) 
	WHERE option_value LIKE CONCAT( '%', @wp_url_old, '%' );

UPDATE sl_posts SET guid = replace( guid, @wp_url_old, @wp_url_new );

UPDATE sl_posts SET post_content = replace( post_content, @wp_url_old, @wp_url_new );

UPDATE sl_postmeta SET meta_value = replace( meta_value, @wp_url_old, '' ) WHERE `meta_key` IN( '_p_product_icon', '_p_large-title-icon' );

