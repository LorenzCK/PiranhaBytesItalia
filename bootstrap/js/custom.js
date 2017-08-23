// Init
$(document).ready(function() {
    // Scroll handling
    var scrollTopMemory = $(document).scrollTop();
    $(window).scroll(function() {
        var scrollTop = $(document).scrollTop();
        var offset = (scrollTop - scrollTopMemory);
        if(offset >= 8) {
            $('div.navbar-container').addClass('scrolling-down');
        }
        else if(offset <= -8) {
            $('div.navbar-container').removeClass('scrolling-down');
        }
        scrollTopMemory = scrollTop;
    });

    // Navbar collapse/expand
    $('nav.navbar-default').on('show.bs.collapse', function () {
        $('div.navbar-container').addClass('open');
    });
    $('nav.navbar-default').on('hide.bs.collapse', function () {
        $('div.navbar-container').removeClass('open');
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
