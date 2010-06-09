<?php get_header(); ?>

<div id='indexpage'>
    <?php include("entry.php"); ?>

    <div class="navigation">
        <?php previous_posts_link("<span style='float: right;'>Newer Entries &raquo;</span>"); ?>
        <?php next_posts_link("<span style='float: left;'>&laquo; Older Entries</span>"); ?>
        <br clear='all' />
    </div>

</div>

<?php get_footer(); ?>
