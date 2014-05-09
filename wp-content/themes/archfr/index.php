<?php
get_header();
?>

<!-- ARCHFR START -->

<div id="archdev-navbar"></div>
<div id="content-left-wrapper">
<div id="content-left">
	<div id="intro" class="box">
<?php 
  $post_id = 120;
  $post=get_post($post_id);
  setup_postdata($post);
  the_content(__('(more...)'));
?>
	</div> <!-- #intro -->
  <div id="news">
  <h3>Dernières nouvelles <span class="more">(<a href="/category/news/"
                title="Explorer les archives">plus</a>)</span></h3>
    <a href="<?php echo bloginfo ('rss2_url') ?>" title="RSS Archlinux.fr"
      class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>


    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <h4>
  	  <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a>
    </h4>
    <p class="timestamp"><?php the_date('', '', ''); ?></p>
    <p>
  	  <?php the_content(__('(more...)')); ?>
    </p>
    <?php endwhile; else: ?>
    <p><?php _e('Sorry, no posts matched your criteria.'); ?></p>
    <?php endif; ?>

    <?php posts_nav_link(' &#8212; ', __('&laquo; Newer Posts'), __('Older Posts &raquo;')); ?>
  </div> <!-- #news -->
</div> <!-- #content-left -->
<br/>
<hr/>
<br/>
<?php print_feed_footer () ?>
</div> <!-- #content-left-wrapper -->
<?php get_sidebar(); ?>
<!-- ARCHFR END -->
<?php get_footer(); ?>
