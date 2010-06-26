/* <![CDATA[ */
jQuery(document).ready
(
    function()
    {
        jQuery('.widgettitle').each
        (
            function()
            {
                // if the title is empty, then don't do show/hide
                if( /^\s*$/.exec(jQuery(this).text()) )
                    jQuery(this).removeClass('widgettitle');
                else
                    jQuery(this).nextAll().wrapAll('<div class="widgetcontent" />');
            }
        );

        // some stuff to hint at the collapsible nature of the sidebar widgets
        jQuery('.widgettitle').attr('title', 'Click here to collapse/expand this section');
        jQuery('.widgetcontent').slideUp(2000);
        jQuery('#sidebar').mouseenter
        (
            function()
            {
                jQuery('#sidebar').unbind('mouseenter');
                jQuery('#sidebarhint').fadeIn();
                setTimeout(function() { jQuery('#sidebarhint').fadeOut(1000); }, 5000);
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
/* ]]> */
