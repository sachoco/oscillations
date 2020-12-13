<header class="header" style="">
  <nav class="main-navigation">
    <ul>
	<?php
		if ( has_nav_menu( 'main-menu' ) ) {

			wp_nav_menu(
				array(
					'container'  => '',
					'items_wrap' => '%3$s',
					'theme_location' => 'main-menu',
				)
			);

		}
	?>

    </ul>
  </nav>
	<div class="social-media">
		<a href="#link-to-instagram"><span class="icon-instagram-home"></span></a>
	</div>
  <button class="menu-toggle close">Close</button>
</header>
<button class="menu-toggle">Menu</button>