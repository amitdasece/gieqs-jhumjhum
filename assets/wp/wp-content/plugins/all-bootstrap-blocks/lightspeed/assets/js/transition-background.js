function is_background_in_view( elem )
{
    var docViewTop      = $( window ).scrollTop();
    var docViewBottom   = docViewTop + $( window ).height();
    var elemTop         = $( elem ).offset().top;
    var elemBottom      = elemTop + $( elem ).height();
    var elemHeight      = $( elem ).height();
    var elemType        = $( elem ).prop( 'nodeName' );

    var bounding = elem[0].getBoundingClientRect();
    
    return bounding.top <= $( window ).height() - ($( window ).height() / 2);
}

let bg_checked = false;

function add_data_attribute()
{
    let items = [];

    $( '.areoi-background' ).each( function( key, item ) {
        var item = $( this );

        var background_color = item.css('background-color');
        if ( item.find( '.areoi-background__color' ).length ) {
            background_color = item.find( '.areoi-background__color' ).css('background-color');
        }
        item.data( 'background', background_color );
    });

    bg_checked = true;
}
add_data_attribute();

function check_backgrounds()
{
    let items = [];

    $( '.areoi-lightspeed-block .areoi-background' ).each( function( key, item ) {
        var item = $( this );
        if ( is_background_in_view( item ) ) {

            var background_color = item.data( 'background' );

            $( '.areoi-lightspeed-block .areoi-background, .areoi-background__color' ).attr('style', 'background-color: ' + background_color + ' !important;' );
        }
    });
}

$( window ).on( 'scroll', function() {
    if ( bg_checked ) {
        check_backgrounds();
    }
});
check_backgrounds();