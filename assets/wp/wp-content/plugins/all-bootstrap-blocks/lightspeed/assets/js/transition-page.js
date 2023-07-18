const is_external_link = (url) => {
    const tmp = document.createElement('a');
    tmp.href = url;
    return tmp.host !== window.location.host;
};

const is_new_page = (url) => {
    var next_url = new URL( url, document.baseURI );
    var next_url_no_hash = next_url.href.replace( next_url.hash, '' );

    var current_url = new URL( window.location, document.baseURI );
    var current_url_no_hash = current_url.href.replace( current_url.hash, '' );

    if ( next_url_no_hash != current_url_no_hash ) {
        return true;
    }
    return false;
};

const open_url = (url) => {

    $( 'body' ).addClass( 'areoi-page-transition-unloaded' );
    $( '.areoi-transition' ).addClass( 'areoi-transition-invisible' );

    setTimeout( function() {
        window.location = url;
    }, 500);
};

$( document ).on( 'mouseup', 'a:not(.areoi-feature-menu a)', function(e) {

    var url = $( this ).attr( 'href' );
    var drag = $( this ).parents( '.areoi-drag-container' );
    
    if ( !drag.length || !drag.hasClass( 'moving' ) ) {
        if ( typeof url !== 'undefined' && !is_external_link( url ) && $( this ).attr( 'target' ) !== '_blank' && is_new_page( url ) ) {
            e.preventDefault();
            open_url( url );
        }
    }
} );

window.addEventListener('pageshow', function(e){
    $( 'body' ).addClass( 'areoi-page-transition-loaded' ).removeClass( 'areoi-page-transition-unloaded' );
    $( '.areoi-transition' ).removeClass( 'areoi-transition-invisible' );
});