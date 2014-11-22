<?php
$GLOBALS['archfr']['site_url'] = "//archlinux.fr";

/* nav_link: array (key => array (label, link, title)) */
$GLOBALS['archfr']['nav_link'] = array (
    "home"      => array ("Accueil", "//www.archlinux.fr/", "anb-home", ""),
    "forum"     => array ("Forum", "//forums.archlinux.fr/", "anb-forums", ""),
    "wiki"      => array ("Wiki", "//wiki.archlinux.fr/", "anb-wiki", ""),
    "bug"       => array ("Bugs", "https://bugs.archlinux.org/", "anb-bugs", "Lien vers archlinux.org"),
    "packages"  => array ("Paquets", "https://www.archlinux.org/packages/", "anb-packages", "Lien vers archlinux.org"),
    "aur"       => array ("AUR", "https://aur.archlinux.org/index.php?setlang=fr", "anb-aur", "Lien vers archlinux.org"),
    "download"  => array ("Télécharger", "//www.archlinux.fr/telecharger", "anb-download", ""),
    "planet"    => array ("Planète", "http://planet.archlinux.fr/", "anb-planet", ""),
);

function print_arch_header($selected = "home", $utf8 = true)
{
?>

<div id="archnavbar" class="<?php echo $GLOBALS['archfr']['nav_link'][$selected][2]; ?>">
    <div id="archnavbarlogo">
        <h1><a href="//archlinux.fr" title="Arch Linux">Arch Linux</a></h1>
    </div>
    <div id="archnavbarmenu">
        <i id="archnavbaropenmenu"></i>
        <ul id="archnavbarlist"><?php
            foreach ($GLOBALS['archfr']['nav_link'] as $key => $data):
                if ($selected == $key)
                    echo '<li id="' . $data[2] . '" class="anb-selected">';
                else
                    echo '<li id="' . $data[2] . '" >';
                $url = '<a target="_top" href="' . $data[1] . '" title="' . $data[3] . '">' . $data[0] . "</a></li>\n";
                if (!$utf8)
                    $url = utf8_decode($url);
                echo $url;
            endforeach;
        ?></ul>
    </div>
</div>

<?php
}

function print_arch_favicon()
{
    echo '<link rel="icon" href="' . $GLOBALS['archfr']['site_url'] . '/commun/images/favicon.ico" type="image/png" />';
}

function print_arch_footer($complement = "", $utf8 = true)
{
?>

<div id="footer">
    <p>Design depuis
        <a href="https://www.archlinux.org" title="Design d'Archlinux.org">Archlinux.org</a>
        <br />
        <?php
            if ($complement != '')
                echo $complement . "<br/>";
            $str = "© 2014 Archlinux.fr ~ Communauté Francophone Arch Linux";
            if (!$utf8)
                $str = utf8_decode($str);
            echo $str;
        ?>
    </p>
</div>

<?php
}
?>
