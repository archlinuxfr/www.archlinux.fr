<?php get_header(); ?>

<?php global $query_string, $wp_query;
query_posts($query_string . '&posts_per_page=50'); ?>

<div id="news-article-list" class="box">

    <h2><?php wp_title('Archives : '); ?></h2>

    <p id="nav-above" class="navigation">
        <?php echo $wp_query->found_posts; ?> articles,
        page <?php echo max(1, get_query_var('paged')); ?> sur <?php echo $wp_query->max_num_pages; ?>.

        <p class="news-nav">
            <?php echo paginate_links(array(
                'base'      => add_query_arg('paged','%#%'),
                'format'    => '/paged=%#%',
                'total'     => $wp_query->max_num_pages,
                'current'   => max(1, get_query_var('paged')),
            )); ?>
        </p>
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
        <?php while (have_posts()) : the_post(); ?>
            <tr <?php post_class(); ?>>
                <td><?php the_date(); ?></td>
                <td class="wrap"><a href="<?php the_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></td>
                <td><?php the_author(); ?></td>
            </tr>
        <?php endwhile ?>
        </tbody>
    </table>
</div>

<?php get_footer(); ?>
