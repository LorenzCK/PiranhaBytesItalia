// Init
$(document).ready(function() {
    // Navbar collapse/expand
    $('nav.navbar').on('show.bs.collapse', function () {
        $('#logo').addClass('reduced');
    });
    $('nav.navbar').on('hide.bs.collapse', function () {
        $('#logo').removeClass('reduced');
    });

    // Content toggles
    $("#page-content .toggle").each(function() {
        // Wrap with hyperlink
        var link = document.createElement('a');
        link.setAttribute('href', 'javascript:void(0)');
        $(this).wrapInner(link).append('&nbsp;▼');

        // Hide next DOM element
        $(this).next().hide();

        // Add toggle handler on element
        $(this).click(function() {
            $(this).next().slideToggle(300);
        });
    });

    // Init email links
    setTimeout(function() {
        $(".mail-link").each(function() {
            var content = $(this).html();

            var link = content.replace(/ \(at\) /gi, "@");
            link = link.replace(/ \(dot\) /gi, ".");

            $(this).html("<a href=\"mailto:" + link + "\">" + link + "</a>");
        });
    }, 1000);
});
