<?php

$feeds = array(
    array(
        'url'        => 'https://www.archlinux.org/feeds/packages/',
        'title'      => 'Derniers paquets',
        'more'       => 'https://www.archlinux.org/packages/?sort=-last_update',
        'more_title' => 'Derniers paquets',
        'max'        => 15
    ),
    array(
        'url'        => 'https://afur.archlinux.fr/feed.php',
        'title'      => '[archlinuxfr]',
        'more'       => 'https://afur.archlinux.fr/',
        'more_title' => 'Derniers paquets',
        'max'        => 10
    )
);

function get_feeds()
{
    global $feeds;
    $result = array();
    foreach ($feeds as $data) {
        $feed = new StdClass();
        foreach ($data as $key => $value) {
            $feed->$key = $value;
        }
        $feed->items = get_items($data);
        $result[] = $feed;
    }
    return $result;
}

function get_items($data)
{
    include_once(ABSPATH . WPINC . '/feed.php');
    $feed = fetch_feed($data['url']);
    if (is_wp_error($rss)) return array();

    $result = array();
    foreach ($feed->get_items() as $feed_item) {
        $pkg = $feed_item->get_title();
        $link = $feed_item->get_permalink();

        if ($feed_item->get_categories()) {
            foreach ($feed_item->get_categories() as $category) {
                $category = $category->get_term();
                if (in_array($category, array('any', 'i686', 'x86_64'))) {
                    $arch = $category;
                } else {
                    $repo = $category;
                }
            }
            $pkg = preg_replace('/ ' . $arch . '$/', '', $pkg);
        } else {
            $parts = explode(' ', $pkg);
            $arch = array_pop($parts);
            $pkg = implode(' ', $parts);
        }

        if (isset($result[$pkg])) {
            $item = $result[$pkg];
        } else {
            $item = new StdClass();
            $item->pkg  = $pkg;
            $item->repo = strtolower($repo);
            $item->arch = array();
            $result[$pkg] = $item;
        }

        $item->arch[$arch] = $link;
        ksort($item->arch);
    }

    return array_slice($result, 0, $data['max']);
}

// Adds 'odd' and 'even' classes to each post
function wp_oddeven_post_class($classes) {
    global $current_class;
    $classes[] = $current_class;
    $current_class = ($current_class == 'odd') ? 'even' : 'odd';
    return $classes;
}
add_filter('post_class', 'wp_oddeven_post_class');
$current_class = 'odd';

// Adds feeds to meta (headers)
if (function_exists('automatic_feed_links')) {
    automatic_feed_links();
}
