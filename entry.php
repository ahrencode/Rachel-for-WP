
<?php
    if (have_posts()) :
        while (have_posts()) : the_post();
?>

        <div class="post" id="post-<?php the_ID(); ?>">

            <div class='posttitle heading'>
                <a href="<?php the_permalink() ?>" rel="bookmark"
                    title="<?php
                                $permalink_title_attr = 
                                    esc_attr(sprintf(__('Permanent Link to %s', 'rachel'),
                                                    the_title_attribute('echo=0')));
                                print $permalink_title_attr;
                            ?>"
                ><?php the_title(); ?></a>
            </div>

            <div class='dateauthor'>
                <?php
                    if( ! is_page() )
                    {
                        print "Posted ";
                        the_time('M jS, Y');
                    }
                ?>
                by <?php the_author() ?>
                &nbsp;&nbsp;
                / <a href="<?php the_permalink() ?>" rel="bookmark"
                        title="<?php print $permalink_title_attr; ?>">Permalink</a> /
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
        <div class='posttitle heading'>Not Found</div>
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

