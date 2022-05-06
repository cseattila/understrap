<?php
/**
 * The header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="profile" href="https://gmpg.org/xfn/11">
  <script type="text/javascript">
	function  afterloadMenu(){
  	let dropdowns = document.querySelectorAll('.dropdown-toggle2')
	dropdowns.forEach((dd)=>{
    dd.addEventListener('mouseover', function (e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display==='block'?'none':'block'
    })
    dd.addEventListener('mouseout', function (e) {
        var el = this.nextElementSibling
        el.style.display = el.style.display==='block'?'block':'none'
    })
})
}
  </script>
	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900italic,900' rel='stylesheet' type='text/css'>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> <?php understrap_body_attributes(); ?> onload="afterloadMenu()" >
<?php do_action( 'wp_body_open' ); ?>
<div class="site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div id="wrapper-navbar">

		<a class="skip-link sr-only sr-only-focusable" href="#content"><?php esc_html_e( 'Skip to content', 'understrap' ); ?></a>

		<nav id="main-nav" class="navbar navbar-expand-md navbar-dark bg-primary-ertektar" aria-labelledby="main-nav-label">

			<h2 id="main-nav-label" class="sr-only">
				<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
			</h2>

		<?php if ( 'container' === $container ) : ?>
			<div class="container">
		<?php endif; ?>
		<div id="menu_sorok">
		  
	       <div class="menu_1_soros" id="fomenu_1_soros" >
					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<?php if ( is_front_page() && is_home() ) : ?>

							<h1 class="navbar-brand mb-0"><a rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>

						<?php else : ?>

							<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url"><?php bloginfo( 'name' ); ?></a>

						<?php endif; ?>

						<?php
					} else {
						the_custom_logo();
						?>
			</div>	
			 <div class="menu_pre_2_soros" id="menu_pre_2_soros" > &nbsp; </div>
			<div class="menu_2_soros" id="fomenu_2_soros" >
						
				<div class="menu_felso_sor" >		
						<div class="webcim"> Makó város  <br> értéktárának kincsei </div>
    						
    					<?php 
    					}
    					?>
    					<!-- end custom logo -->
    
    
                  <!-- Ha nem fér ki akkor ez lesz a menű előhozója -->
    				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="<?php esc_attr_e( 'Toggle navigation', 'understrap' ); ?>">
    					<span class="navbar-toggler-icon"></span>
    				</button>
				
				 </div>
					 <div class="menu_after_2_soros" id="menu_after_2_soros" > &nbsp; </div>
               <div class="menu also sor" style=" display: table;     table-layout: fixed; /*Optional*/    border-spacing: 10px; /*Optional*/" >
	           <div style=" display: table-cell;">
				<!-- The WordPress Menu goes here -->
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'primary',
						'container_class' => 'collapse navbar-collapse',
						'container_id'    => 'navbarNavDropdown',
						'menu_class'      => 'navbar-nav ml-auto',
						'fallback_cb'     => '',
						'menu_id'         => 'main-menu',
						'depth'           => 6,
						'walker'          => new Understrap_WP_Bootstrap_Navwalker(),
					)
				);
				?>
			</div>
			  <div class="facebook-icon" style=" width:25px; heigth:25px; display: table-cell;color: #1778f2; "><a
			  style ="   color: currentColor;  fill: currentColor;" 
			  href="https://www.facebook.com/profile.php?id=100072298874419" > 
			  <div style="background-color : white; border-radius: 5px; " >
			  <svg width="24" height="24" viewBox="0 0 24 24" version="1.1" xmlns="http://www.w3.org/2000/svg" role="img" aria-hidden="true" focusable="false">
			      <path d="M12 2C6.5 2 2 6.5 2 12c0 5 3.7 9.1 8.4 9.9v-7H7.9V12h2.5V9.8c0-2.5 1.5-3.9 3.8-3.9 1.1 0 2.2.2 2.2.2v2.5h-1.3c-1.2 0-1.6.8-1.6 1.6V12h2.8l-.4 2.9h-2.3v7C18.3 21.1 22 17 22 12c0-5.5-4.5-10-10-10z">
			      </path>
			  </svg>
			  </div>
			  </a> </div>
	         
				     </div>
		</div><!-- class="menu_2_soros" -->
		
		</div> 
			<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>

		</nav><!-- .site-navigation -->

	</div><!-- #wrapper-navbar end -->
