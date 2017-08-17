// Init
$(document).ready(function() {
    console.log('Ciaone');

    // Navbar collapse/expand
    $('nav.navbar').on('show.bs.collapse', function () {
        console.log('Collapsing');
        $('#logo').addClass('reduced');
    });
    $('nav.navbar').on('hide.bs.collapse', function () {
        $('#logo').removeClass('reduced');
    });
});
