<?php get_header(); ?>

<div id="archdev-navbar"></div>
<div id="news-article" class="box">


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <div class="navigation">
    <div class="alignleft"><?php previous_post_link('&laquo; %link') ?></div>
    <div class="alignright"><?php next_post_link('%link &raquo;') ?></div>
  </div>
  <br/>
  <h2><?php the_title(); ?></h2>
  <p class="article-info"><?php the_date('', '', ''); ?> - <?php echo get_the_author (); ?></p>
      <?php the_content(__('(more...)')); ?>
      <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
      <?php the_tags( '<p>' . __('Tags:') . ' ', ', ', '</p>'); ?>
      Posté sous : <?php the_category(', ') ?>
<?php endwhile; else: ?>
  <p><?php _e('Sorry, no posts matched your criteria.', 'kubrick'); ?></p>
<?php endif; ?>

</div>

<?php get_footer(); ?>
