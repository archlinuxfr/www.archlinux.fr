<?php get_header(); ?>
<!-- ARCHFR START -->

<div id="archdev-navbar"></div>

<div id="content-left-wrapper">
    <div id="content-left">
        <div id="intro" class="box"><?php
            $post_id = 120;
            $post = get_post($post_id);
            setup_postdata($post);
            the_content(__('(more...)'));
        ?></div> <!-- #intro -->

        <div id="news">
            <?php $category_link = get_category_link(get_cat_ID('Nouvelles')); ?>
            <h3>
                <a href="<?php echo $category_link; ?>" title="Explorer les archives">Dernières nouvelles</a>
                <span class="arrow"></span>
            </h3>
            <a href="<?php echo bloginfo ('rss2_url') ?>" title="RSS Archlinux.fr" class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>

            <?php global $query_string;
            query_posts($query_string . '&posts_per_page=15'); ?>
            <?php $i = 0; if (have_posts()): while (have_posts()): the_post(); $i++;?>
                <?php if ($i == 5): ?>
                <h3>
                    <a href="<?php echo $category_link; ?>" title="Explorer les archives"><?php echo _('Older Posts') ?></a>
                    <span class="arrow"></span>
                </h3>
                <dl class="newslist">
                <?php endif ?>

                <?php if ($i < 5): ?>
                    <h4>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </h4>
                    <p class="timestamp"><?php the_date('', '', ''); ?></p>
                    <p><?php the_content(__('(more...)')); ?></p>
                <?php else: ?>
                    <dt><?php the_date('Y-m-d', '', ''); ?></dt>
                    <dd>
                        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                    </dd>
                <?php endif ?>

            <?php endwhile; else: ?>
                <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
            <?php endif; ?>
            <?php if ($i . 5): ?>
                </dl>
            <?php endif; ?>

        </div> <!-- #news -->

    </div> <!-- #content-left -->
</div> <!-- #content-left-wrapper -->

<?php get_sidebar(); ?>

<!-- ARCHFR END -->
<?php get_footer(); ?>
