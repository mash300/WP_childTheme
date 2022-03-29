<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<br />

<!-- <a href="<?php echo get_home_url(); ?>">Home Page</a> -->
<div class="container">
	<div class="titlebar">
		<!-- <div class="titleHeading articlesContainer">	 -->
		<div class="titleHeading">	

		<!-- <h1>echo get_theme_mod('basic-color-callout-display') </h1> -->
        
<!-- =============================  Customizer for dynamic color title  ================================================== -->

<?php if (get_theme_mod('basic-color-callout-display') == 'Blue') { ?>

    <h1 class="homeTitle" style="color: blue !important;"><a href="<?php echo get_home_url(); ?>" class="blueHeader" style="color: blue !important;">The Hali</a></h1>

<?php } elseif (get_theme_mod('basic-color-callout-display') == 'Red') { ?>

	<h1 class="homeTitle" style="color: #b8223b !important;"><a href="<?php echo get_home_url(); ?>" class="redHeader" style="color: #b8223b !important;">The Hali</a></h1>

<?php } else { ?>

	<h1 class="homeTitle"><a href="<?php echo get_home_url(); ?>" class="blackHeader">The Hali</a></h1>

<?php } ?>

<!-- =========================================================================================== -->


		</div>
			
		
		<div class="secondary-menu">
			<nav class="secondary-nav">
		
					<?php
						$args = array(
							'theme_location' => 'secondary'
						)
					?>
					<?php wp_nav_menu( $args ) ?>
			</nav>
		</div>
	</div>	
</div>


<br />


<!-- <span>News</span> -->
<header class="primary-menu">
	<nav class="site-nav">
	<!-- <h3 class="newsButton">News</h3> -->
	<div class="menuItems container">
		<div>
			<h3 class="newsButton"><a href="<?php echo get_home_url(); ?>">News</a></h3>
		</div>
		<div>
			<?php
				$args = array(
					'theme_location' => 'primary'
					)
					?>
			<?php wp_nav_menu( $args )?>
		</div>
			</div>
	</nav>
	<br/>
</header>


<br/>
<div class="titleBar">
	<br />

</div>
<br/>

<?php 
	// $menu_main_items = wp_nav_menu("primary");
	// foreach($menu_top_items as $menu_item)
	// {
	// 	echo '<a href="'.$menu_item->url.'">'.$menu_item->title."</a><br/>";
	// }
	 ?>

<br/>





