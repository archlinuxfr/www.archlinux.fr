<!-- begin footer -->
<div id="footer">
	<hr />
	<br />
	<p>
	Design depuis <a href="http://www.archlinux.org" title="Design d' Archlinux.org">Archlinux.org</a>

	&#183;
	<a href="http://validator.w3.org/check/referer" title="Denne side valideres med XHTML 1.1">XHTML</a>
	&#183;
	<a href="http://jigsaw.w3.org/css-validator/check/referer" title="Denne side valideres med CSS">CSS</a>
	<br />
	<cite>
	<?php
		echo sprintf(__("Powered by <a href='http://wordpress.org/' title='%s'><strong>WordPress</strong></a>"),
				 __("Powered by WordPress, state-of-the-art semantic personal publishing platform.")); 
	?>
	</cite>
	<br/>
	© 2014 Archlinux.fr ~ Communauté Francophone Arch Linux 
	</p>
</div> <!-- #footer -->
<?php wp_footer() // Do not remove; helps plugins work ?>
</div> <!-- #content -->
</body>
</html>
