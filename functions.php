<?php

if( ! is_array(get_option('rachel')) )
    add_option('rachel', array('init' => 1));

$options = get_option('rachel');

# defaults
if( ! isset($options['showcredits' ]) ) $options['showcredits '] = 1;
if( ! isset($options['hidecomments']) ) $options['hidecomments'] = 0;
# end defaults

update_option('rachel', $options);

# setup admin menu
add_action('admin_menu', 'rachel_admin_menu');

register_sidebars
(
    1,
    array
    (
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div></div>',
    	'before_title'  => '<h2 class="widgettitle">',
    	'after_title'   => '</h2><div class="widgetcontent"'
    )
);



//-------------------------------------------------------------------------------
function rachel_admin_menu()
{
    add_theme_page('Rachel Options', 'Rachel Options', 'edit_themes', "Rachel", 'rachel_options');
}

//-------------------------------------------------------------------------------
function rachel_options()
{
    global $options;

    if( $_POST['action'] == 'save' )
        save_options();

    print
    "
        <div style=
                '
                    clear: right;
                    float: right;
                    margin-top: 10px;
                    margin-right: 0px;
                    margin-left: 20px;
                    background-color: #fff3cc;
                    color: #000000;
                    padding: 10px 15px;
                    border: 2px solid #ddc055; width: 25%;
                    border-right: none;
                    width: 150px;
                '
        >
            <h3>Keep up with Audacity of Tanish</h3>

            <p>
                Follow on Twitter, or join the Facebook Page. Subscribe to the blog.
                Create bug/feature requests, download the latest code, and more!
            </p>

            <ul>
            <li style='list-style-type: circle; margin-left: 10px;'>
                Blog:
                <ul>
                <li><a href='http://ahren.org/code/tag/rachel-wp'>Audacity of Tanish</a></li>
                <li><a href='http://ahren.org/code/'>Ahren Code</a></li>
                </ul>
            </li>
            <li style='list-style-type: circle; margin-left: 10px;'>
                Twitter:
                <ul>
                <li><a href='http://search.twitter.com/search?q=%23rachel-wp'>Audacity of Tanish</a></li>
                <li><a href='http://twitter.com/ahrencode/'>Ahren Code</a></li>
                </ul>
            </li>
            <li style='list-style-type: circle;  margin-left: 10px;'>
                <a
                href='http://www.facebook.com/home.php#/pages/Ahren-Code/64305786260'>Facebook</a>
            </li>
            <li style='list-style-type: circle;  margin-left: 10px;'>
                <a href='http://github.com/ahrencode/Audacity-of-Tanish-for-WP/issues'>
                    Changes, Bugs and Features</a>
            </li>
            </ul>
        </div>

        <form id='settings' action='' method='post' class='themeform'
            style='margin: 20px;'>

            <h3>General</h3>

            <input type='hidden' id='action' name='action' value='save'>

            <input type='checkbox' name='showcredits' id='showcredits'" .
                ($options['showcredits'] == 1 ? ' checked' : '') . " />
            <label style='margin-left: 5px;' for='showcredits'>
                Show credits at the bottom
            </label>

            <br />

            <input type='checkbox' name='hidecomments' id='hidecomments'" .
                ($options['hidecomments'] == 1 ? ' checked' : '') . " />
            <label style='margin-left: 5px;' for='hidecomments'>
                Make comments collapsible/expandable on posts/pages
            </label>

            <br />

            </div>
            <br clear='all' />
            <br/>
            <hr size='1'/>

            <p class='submit'><input type='submit' value='Save Changes' name='save'/></p>

        </form>

        <div style='width: 60%; margin: 30px 40px; background-color: #cceeff; border: 1px solid #88bbcc; padding:
       30px;'>
            Icons courtesy of:
                <a href='http://www.Tutorial9.net/'>Tutorial9</a>
                (Designer: <a href='http://www.ilovecolors.com.ar/'>ilovecolors</a>),
                <a href='http://jonasraskdesign.com'>JONASRASKDESIGN</a>,
                <a href='http://www.visualpharm.com/animals_icon_set/'>VisualPharm</a>,
                <a href='http://pixel-mixer.com/'>Pixel Mixer</a>,
                <a href='http://c9-d.com/blog-105.html#nav'>C9 Design Rinoa icons</a>,
                <a href='http://www.icojoy.com'>Icojoy</a>,
                <a href='http://www.midtonedesign.com'>midtone design</a>.
            Textures from:
                <a href='http://www.grsites.com/'>grsites.com</a>.
            JavaScript Goodies:
                <a href='http://jquery.com/'>jQuery</a>.
        </div>
                
    ";
}

//------------------------------------------------------------------------------
function save_options()
{
    global $_POST, $options;

    $options['showcredits' ]    = ( isset($_POST['showcredits' ]) ) ? 1 : 0;
    $options['hidecomments']    = ( isset($_POST['hidecomments']) ) ? 1 : 0;

    update_option('rachel', $options);

    print
    "
        <div class='updated fade' id='message'
            style='background-color: rgb(255, 251, 204);
                    width: 300px;
                    margin-top: 30px;
                    margin-left: 20px'>
            <p>Tanish Settings <strong>saved</strong>.</p>
        </div>
    ";
}

?>
