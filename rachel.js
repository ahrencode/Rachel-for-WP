jQuery(document).ready
(
    function()
    {
        jQuery('.widgettitle').each(
            function()
            {
                jQuery(this).nextAll().wrapAll('<div class="widgetcontent" />');
            }
        );

        jQuery('.widgettitle').click
        (
            function()
            {
                jQuery(this).parent().find('.widgetcontent').slideToggle(300);
            }
        );
    }
);
