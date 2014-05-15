<div id="content-right">

    <div id="pkgsearch" class="widget">
        <form id="pkgsearch-form" method="get" action="https://www.archlinux.org/packages/">
            <fieldset>
                <label for="pkgsearch-field">Chercher un paquet :</label>
                <input id="pkgsearch-field" type="text" value="" name="q" id="q" size="20" maxlength="200" />
            </fieldset>
        </form>
    </div> <!-- #pkgsearch -->

    <div class="updates">
    <?php foreach (get_feeds() as $feed): ?>
        <div id="pkg-updates" class="widget box">
            <h3><?php echo $feed->title; ?> <span class="more">(<a href="<?php echo $feed->more ?>" title="<?php echo $feed->more_title; ?>">plus</a>)</span></h3>
            <a href="<?php echo $feed->url; ?>" title="<?php echo $feed->title ?>"
      class="rss-icon"><img src="<?php echo bloginfo('url'); ?>/wp-includes/images/rss.png" alt="RSS Feed" /></a>
            <table>
            <?php if (empty($feed->items)): ?>
                <tr><td colspan="2">Aucune entrée.</td></tr>
            <?php else: ?>
                <?php foreach ($feed->items as $item): ?>
                <tr>
                    <td class="pkg-name">
                        <span class="<?php echo $item->repo; ?>"><?php echo $item->pkg; ?></span>
                    </td>
                    <td class="pkg-arch">
                        <?php foreach ($item->arch as $arch => $link): ?>
                            <a href="<?php echo $link; ?>"><?php echo $arch; ?></a>
                            <?php if ($link != end($item->arch)): ?>/<?php endif; ?>
                        <?php endforeach; ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php endif; ?>
            </table>
        </div> <!-- #pkg-updates -->
    <?php endforeach; ?>
    </div>

    <div id="nav-sidebar" class="widget"><?php 
        setup_postdata(get_post(125)); // Links
        the_content();
    ?></div> <!-- #sidebar -->

</div> <!-- #content-right -->
