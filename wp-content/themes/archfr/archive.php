<?php get_header(); ?>

<?php global $query_string;
query_posts($query_string . '&posts_per_page=50'); ?>

<div id="archdev-navbar"></div>

<div id="news-article-list" class="box">

    <h2>Archives: 
        <?php the_post() ?>

        <?php if ( is_day() ) : ?>
        <?php printf('<span>%s</span>', get_the_time('F jS, Y')) ?>
        <?php elseif ( is_month() ) : ?>
        <?php printf('<span>%s</span>', get_the_time('F Y')) ?>
        <?php elseif ( is_year() ) : ?>
        <?php printf('<span>%s</span>', get_the_time('Y')) ?>
        <?php elseif ( is_author() ) : ?>
        <?php echo $authordata->display_name; ?>
        <?php elseif ( is_category() ) : ?>
        <?php echo single_cat_title(); ?>
        <?php elseif ( is_tag() ) : ?>
        <?php single_tag_title(); ?></h2>
        <?php elseif ( isset($_GET['paged']) && !empty($_GET['paged']) ) : ?>
        <?php _e('Blog Archives', 'simplr') ?>
        <?php endif; ?>
        <?php rewind_posts() ?>
    </h2>

    <p id="nav-above" class="navigation">
        <span class="nav-previous"><?php next_posts_link('&laquo; Anciens articles') ?></span>
        <span class="nav-next"><?php previous_posts_link('Articles suivants &raquo;') ?></span>
    </p>

    <table id="article-list" class="results">
        <thead>
            <tr>
                <th>Publié</th>
                <th>Titre</th>
                <th>Auteur</th>
            </tr>
        </thead>
        <tbody>
        <?php $classes = array('odd', 'even');
        $i = 0; ?>
        <?php while (have_posts()) : the_post(); ?>
            <tr class="<?php echo $classes[$i++%2]; ?>">
                <td><?php the_date('', '', ''); ?></td>
                <td class="wrap"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
                <td><?php echo get_the_author (); ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php get_footer(); ?>
