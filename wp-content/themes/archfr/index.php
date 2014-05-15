<?php get_header(); ?>

<div class="news-article box">

    <?php if (have_posts()): while (have_posts()): the_post(); ?>
        <h2><?php the_title(); ?></h2>
        <p class="article-info"><?php the_date(); ?> - <?php the_author(); ?></p>
        <?php the_content(); ?>
    <?php endwhile; else: ?>
        <p>Désolé, aucun article ne correspond à votre recherche.</p>
    <?php endif; ?>

</div>

<?php get_footer(); ?>
