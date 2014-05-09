<?php
#remove_filter('template_redirect', 'redirect_canonical'); 
$feed_footer = array (
	array ("url" => "http://forums.archlinux.fr/feed.php?mode=topics_active",
	       "title" => "Derniers Sujets",
	       "more" => "http://forums.archlinux.fr/search.php?search_id=active_topics&st=1",
	       "more_title" => "Derniers sujets",
	       "max" => 5),
	array ("url" => "https://wiki.archlinux.fr/?title=Special:RecentChanges&feed=atom&limit=9",
	       "title" => "Derniers Wikis",
	       "more" => "http://wiki.archlinux.fr/Special:RecentChanges",
	       "more_title" => "Derniers changements",
	       "max" => 5),
	array ("url" => "http://planet.archlinux.fr/?type=rss10",
	       "title" => "Planète Archlinux.fr",
	       "more" => "http://planet.archlinux.fr/",
	       "more_title" => "Derniers articles",
	       "max" => 5)
);
$feed_side = array (
	array ("url" => "http://www.archlinux.org/feeds/packages/",
	       "title" => "Derniers paquets",
	       "more" => "http://www.archlinux.org/packages/?sort=-last_update",
	       "more_title" => "Derniers paquets",
	       "max" => 15),
	array ("url" => "http://afur.archlinux.fr/feed.php",
	       "title" => "[archlinuxfr]",
	       "more" => "http://afur.archlinux.fr/",
	       "more_title" => "Derniers paquets",
	       "max" => 10)
);


function print_rss ($data)
{
	include_once(ABSPATH . WPINC . '/feed.php');
	$rss = fetch_feed($data['url']);
	if (!is_wp_error( $rss ) )
	{
		$maxitems = $rss->get_item_quantity($data['max']);
		if ($maxitems>0)
			$items = $rss->get_items(0, $maxitems);
		else
			$items = false;
	}
?>
<div id="pkg-updates" class="widget box">
    <h3><?php echo $data['title'] ?> <span class="more">(<a href="<?php echo $data['more'] ?>"
                title="<?php echo $data['more_title'] ?>">plus</a>)</span></h3>
    <a href="<?php echo $data['url'] ?>" title="<?php echo $data['title'] ?>"
      class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>
<table>
<?php if (empty($items)) : ?>
  <tr><td>Aucune entrée.</td></tr>
<?php else: ?>
  <?php foreach ( $items as $item ) : ?>
  <tr><td class="pkg-name"><a href='<?php echo  $item->get_permalink(); ?>' title='<?php echo $item->get_title(); ?>'><?php echo $item->get_title(); ?></a></td></tr>
  <?php endforeach; ?>
<?php endif; ?>
</table>
</div>
<?php
}

function print_side_rss ($data, $display_arch=false)
{
	include_once(ABSPATH . WPINC . '/feed.php');
	$rss = fetch_feed($data['url']);
	if (!is_wp_error( $rss ) )
	{
		$maxitems = $rss->get_item_quantity($data['max']);
		if ($maxitems>0)
			$items = $rss->get_items(0, $maxitems);
		else
			$items = false;
	}
?>
<div id="pkg-updates" class="widget box">

    <h3><?php echo $data['title'] ?> <span class="more">(<a href="<?php echo $data['more'] ?>"
                title="<?php echo $data['more_title'] ?>">plus</a>)</span></h3>
    <a href="<?php echo $data['url'] ?>" title="<?php echo $data['title'] ?>"
      class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>

<table>
<?php if (empty($items)) : ?>
  <tr><td colspan="2">Aucune entrée.</td></tr>
<?php else: ?>
  <?php foreach ( $items as $item ) : ?>
  <tr>
<?php
	if ($display_arch)
	{
		if (($arch_pos = strpos ($item->get_title(), 'i686')) !== false)
		{
			$pkg=substr ($item->get_title(), 0, $arch_pos);
			$arch = "i686";
		}
		else if (($arch_pos = strpos ($item->get_title(), 'any')) !== false)
		{
			$pkg=substr ($item->get_title(), 0, $arch_pos);
			$arch = "any";
		}
		else
		{
			$arch_pos = strpos ($item->get_title(), 'x86_64');
			$pkg=substr ($item->get_title(), 0, $arch_pos);
			$arch = "x86_64";
		}
	}
	else
	{
		$pkg = $item->get_title();
		$arch = "&nbsp;";
	}
?>
  <td class="pkg-name"><a href='<?php echo $item->get_permalink(); ?>' title='<?php echo $pkg; ?>'><?php echo $pkg; ?></a></td>
  <td class="pkg-arch"><?php echo $arch; ?></td>
  </tr>
  <?php endforeach; ?>
<?php endif; ?>
</table>
</div> <!-- #pkg-updates -->
<?php
}


function print_feed_footer ()
{
	global $feed_footer;
	echo "<table width=\"100%\"><tr>\n";
	foreach ($feed_footer as $data)
	{
		echo "<td>\n";
		print_rss ($data);
		echo "\n</td>\n";
	}
	echo "\n</tr></table>\n";
}

function print_feed_side ()
{
	global $feed_side;
	foreach ($feed_side as $data)
	{
		echo "<div class=\"updates\">\n";
		print_side_rss ($data, true);
		echo "</div><br/>\n";
	}
}

?>
