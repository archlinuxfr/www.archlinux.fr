<?php get_header(); ?>


<div id="archdev-navbar"></div>
<div id="news-article" class="box">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
  <h2><?php the_title(); ?></h2>
      <?php the_content(__('(more...)')); ?>
      <?php wp_link_pages(array('before' => '<p><strong>' . __('Pages:') . '</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>
  <?php endwhile; endif; ?>
  <?php edit_post_link(__('Edit this page'), '<p>', '</p>'); ?>
</div>

<?php get_footer(); ?>
