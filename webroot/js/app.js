var locations = location.pathname.split('/').filter( function(d) { return d != '' } )

console.log(locations)

$(function() {
    var navs = $('#actions-sidebar > .side-nav > li').not('.heading');
    if( locations.length == 0 ) {
        $('#uri-home').addClass('active');
        return;
    }
    var target = $('#uri-' + locations[0]).closest('ul').parents('li');
    if( target.length > 0 ) {
        target.addClass('active');
        return;
    }
    $('#uri-' + locations[0]).addClass('active');
});