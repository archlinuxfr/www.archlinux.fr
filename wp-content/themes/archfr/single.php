<?php get_header(); ?>

<div id="archdev-navbar"></div>

<div class="news-article box">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <p class="article-info"><?php the_date('', '', ''); ?> - <?php echo get_the_author (); ?></p>
        <?php the_content(__('(more...)')); ?>
    <?php endwhile; else: ?>
        <p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
