<?php
$GLOBALS['archfr']['site_url'] = "http://www.archlinux.fr";

/* nav_link: array (key => array (label, link, title)) */
$GLOBALS['archfr']['nav_link'] = array (
	"planet" => array ("Planète", "http://planet.archlinux.fr/", ""),
//	"galerie" => array ("Galerie", "http://galerie.archlinux.fr/", ""),
	"download" => array ("Télécharger", "http://www.archlinux.fr/telecharger", ""),
	"aur" => array ("AUR", "https://aur.archlinux.org/index.php?setlang=fr", "Lien vers archlinux.org"),
	"bug" => array ("Bugs", "http://bugs.archlinux.org/", "Lien vers archlinux.org"),
	"wiki" => array ("Wiki", "http://wiki.archlinux.fr/", ""),
	"forum" => array ("Forum", "http://forums.archlinux.fr/", ""),
	"home" => array ("Accueil", "http://www.archlinux.fr/", ""),
);

function print_arch_header ($selected="home", $utf8=true)
{
?>

<div id="head_container">
	<div id="title">
		<div id="logo">
			<h1 id="archtitle">
				<a href="http://www.archlinux.fr" title="Arch Linux">Arch Linux</a>
			</h1>
		</div>
	</div>
	<div id="main_nav">
		<ul>
<?php
	foreach ($GLOBALS['archfr']['nav_link'] as $key=>$data)
	{
		if ($selected == $key)
			echo '<li class="selected">';
		else
			echo '<li>';
		$url = '<a target="_top" href="' . $data[1] . '" title="' . $data[2] . '">' . $data[0] . "</a></li>\n";
		if (!$utf8)
			$url = utf8_decode ($url);
		echo $url;
	}
?>
		</ul>
	</div>
</div>
<?php
}

function print_arch_favicon ()
{
	echo '<link rel="icon" href="' . $GLOBALS['archfr']['site_url'] . 
		'/commun/images/favicon.ico" type="image/x-icon"/>';
}


function print_arch_footer ($complement="", $utf8=true)
{
?>
<div class="foot">
<hr /><br />
<p>Design depuis 
<a href="http://www.archlinux.org" title="Design d' Archlinux.org">Archlinux.org</a>
<br/>
<?php 
	if ($complement != '')
		echo $complement . "<br/>";
	$str = "© 2014 Archlinux.fr ~ Communauté Francophone Arch Linux";
	if (!$utf8)
		$str = utf8_decode ($str);
	echo $str;
?>
</p>
</div>
<?php
}
?>
