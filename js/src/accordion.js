

var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};


jQuery(document).ready(function($){


	// scroll handler
	var creepToElement = function( id, options ) {

		// grab the element to scroll to based on the name
		var dest = $("a[name='"+ id +"']");

		// if that didn't work, look for an element with our ID
		if ( typeof( dest.offset() ) === "undefined" ) {
			dest = $("#"+id);
		}

		// if the destination element exists
		if ( typeof( dest.offset() ) !== "undefined" ) {

			// do the scroll
			$('html, body').animate({
				scrollTop: dest.offset().top
			}, 500 );

			// if we have pushState
			if ( history.pushState ) {
				history.pushState( null, null, '#'+id );
			}
			
		}

	};


	if ( window.location.href.indexOf("/partner/") ) {
	
		setTimeout( function(){
			var expand = getUrlParameter( 'expand' );
			if ( expand.length > 0 ) {
				creepToElement( expand );
			}
		}, 2000 );
	
	}

});

