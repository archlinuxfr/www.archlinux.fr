<div id="content-right">

    <div id="pkgsearch" class="widget">
        <form id="pkgsearch-form" method="get" action="http://www.archlinux.org/packages/">
            <fieldset>
                <label for="pkgsearch-field">Chercher un paquet:</label>
                <input id="pkgsearch-field" type="text" value="" name="q" id="q" size="20" maxlength="200" />
            </fieldset>
        </form>
    </div> <!-- #pkgsearch -->

    <?php print_feed_side (); ?>

    <div id="nav-sidebar" class="widget"><?php 
        $post_id = 125;
        $post = get_post($post_id);
        setup_postdata($post);
        the_content(__('(more...)'));
    ?></div> <!-- #sidebar -->

</div> <!-- #content-right -->
