
<?php
    if (have_posts()) :
        $ctr = 0;
        while (have_posts()) : $ctr++; the_post();
?>

        <div class="post" id="post-<?php the_ID(); ?>">

            <div class='posttitle heading'>
                <a href="<?php the_permalink() ?>" rel="bookmark"
                title="<?php printf(__('Permanent Link to %s', 'rachel'), get_the_title()); ?>">
                <?php the_title(); ?></a>
            </div>

            <div class='dateauthor'>
                Posted <?php the_time('M jS, Y') ?> by <?php the_author() ?>
                &nbsp;&nbsp;
                / <a href="<?php the_permalink() ?>" rel="bookmark"
                        title="Permanent Link to <?php the_title(); ?>">Permalink</a> /
                <?php edit_post_link('Edit Entry', '', ''); ?>
            </div>

            <div class='entry'>
                <?php the_content('Read More...'); ?>
            </div>

            <?php
                if( is_single() )
                    wp_link_pages(
                            array
                            (
                                'before' => '<div id="subpagelinks"><span>Pages:</span> ',
                                'after' => '</div>',
                                'next_or_number' => 'number'
                            )
                    );
            ?>

            <div class='postmetadata'>

                <?php if( get_the_category() ) : ?>
                    Posted under
                    <?php
                        foreach((get_the_category()) as $cat)
                        {
                            print
                                "<a href='" . get_category_link($cat->cat_ID) . "'>" .
                                "$cat->cat_name</a> / ";
                        }
                    ?>
                    <br />
                <?php endif; ?>

                <?php if( get_the_tags() ) : ?>
                    Tagged:
                    <?php
                        print
                            get_the_tag_list(
                                    $before = '',
                                    $sep = ' / ',
                                    $after = '');
                    ?> /
                    <br />
                <?php endif; ?>

                <?php if( ! is_single() ): ?>
                    This post has
                    <?php comments_popup_link('no comments', '1 comment', '% comments'); ?>
                <?php endif; ?>

            </div> <!-- end postmeta -->

        </div> <!-- post -->

    <?php endwhile; ?>

<?php else : ?>

    <div class="post">
        <div class='heading'>Not Found</div>
            <br/>
            <div class='entry'>
                Sorry, but you are looking for something that isn't here.
                <br/>
                <br/>
            </div>
        </div>
    </div>

<?php endif; ?>

<br clear='all' />

