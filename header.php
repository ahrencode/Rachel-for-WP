<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>

<head profile="http://gmpg.org/xfn/11">

    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
    <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats -->

    <title>
        <?php bloginfo('name'); ?>
        <?php if ( is_single() ) { ?>
            &raquo; Blog Archive
        <?php } ?>
        <?php wp_title(); ?>
    </title>

    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lobster" />
    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Molengo" />

    <link
        rel="stylesheet"
        href="<?php bloginfo('stylesheet_url'); ?>"
        type="text/css" media="screen"
    />

    <link
        rel="alternate"
        type="application/rss+xml"
        title="<?php bloginfo('name'); ?> RSS Feed"
        href="<?php bloginfo('rss2_url'); ?>"
    />

    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <!--[if IE]>
        <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/ie.css" type="text/css" />
    <![endif]-->

    <!-- inlude jQuery before we call wp_head(); -->
    <?php wp_enqueue_script("jquery"); ?>

    <?php
        if ( is_singular() ) wp_enqueue_script( 'comment-reply' );
        wp_head();
    ?>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/rachel.js"></script>

</head>

<body>

    <div id='stripe'>

        <div id='title' class='heading'>
            <a href="<?php echo get_option('home'); ?>/"><?php bloginfo('name'); ?></a>
        </div>

        <div id='rsslink'>
            <a href='<?php bloginfo("rss2_url"); ?>'>
            <img border='0' align='top' alt='Site RSS'
                src='<?php print get_bloginfo('template_directory') . "/images/rssorange.png"; ?>' />
            </a>
        </div>

        <div id='description'><?php bloginfo('description'); ?></div>

        <p><small>Click on the section headings below to reveal/hide the widget contents</small></p>

        <?php get_sidebar(); ?>

        <?php global $options; if( $options['showcredits'] == 1 ) : ?>
            <div id='creditsbox'>
                <div id='credits'>
                    Substance: <a href='http://wordpress.org/'>WordPress</a>
                    Style: <a href='http://ahren.org/code/rachel-wp'>Rachel</a>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <div id='container'>

