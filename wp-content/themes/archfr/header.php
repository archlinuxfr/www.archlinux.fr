<?php include_once (ABSPATH . "commun/functions.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
    <head profile="http://gmpg.org/xfn/11">
        <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
        <title><?php wp_title('&laquo;', true, 'right'); ?> <?php bloginfo('name'); ?></title>
        <style type="text/css" media="screen">
            @import url( <?php bloginfo('stylesheet_url'); ?> );
        </style>
        <?php print_arch_favicon(); ?>
        <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
        <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
        <link rel="alternate" type="application/atom+xml" title="Atom 1.0" href="<?php bloginfo('atom_url'); ?>" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <?php wp_get_archives('type=monthly&format=link'); ?>
        <?php wp_head(); ?>
    </head>
    <body>
        <?php if (have_posts()) {
            $p_id = null;
            $p = get_post($p_id);
            if ($p->ID == '108')
                print_arch_header("download");
            else
                print_arch_header("home");
        } ?>
        <div id="content">
        <!-- end header -->
