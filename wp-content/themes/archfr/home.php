<?php get_header(); ?>
<!-- ARCHFR START -->

<div id="content-left-wrapper">
    <div id="content-left">
        <div id="intro" class="box"><?php
            setup_postdata(get_post(120)); // Welcome
            the_content();
        ?></div> <!-- #intro -->

        <div id="news">
            <?php $category_link = get_category_link(get_cat_ID('Nouvelles')); ?>
            <h3>
                <a href="<?php echo $category_link; ?>" title="Explorer les archives">Dernières nouvelles</a>
                <span class="arrow"></span>
            </h3>
            <a href="<?php echo bloginfo('rss2_url') ?>" title="RSS Archlinux.fr" class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>

            <?php global $query_string; query_posts($query_string . '&posts_per_page=5'); ?>
            <?php while (have_posts()): the_post(); ?>
                <h4>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </h4>
                <p class="timestamp"><?php the_date(); ?></p>
                <p><?php the_content(); ?></p>
            <?php endwhile; ?> <!-- newest -->

            <h3>
                <a href="<?php echo $category_link; ?>" title="Explorer les archives">Nouvelles plus anciennes</a>
                <span class="arrow"></span>
            </h3>
            <dl class="newslist">
            <?php query_posts($query_string . '&posts_per_page=10&offset=5'); ?>
            <?php while (have_posts()): the_post(); ?>
                <dt><?php the_date('Y-m-d'); ?></dt>
                <dd>
                    <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
                </dd>
            <?php endwhile; ?>
            </dl> <!-- older -->


        </div> <!-- #news -->

    </div> <!-- #content-left -->
</div> <!-- #content-left-wrapper -->

<?php get_sidebar(); ?>

<!-- ARCHFR END -->
<?php get_footer(); ?>
