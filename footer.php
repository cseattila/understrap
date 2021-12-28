<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>
</div> <!-- end inner content -->

</div> <!-- end mian content -->
	<?php if ( 'container' === $container ) : ?>
			</div><!-- .container -->
			<?php endif; ?>
<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>





				<footer class="site-footer" id="colophon">

					<div class="site-info">

				     <p>József Attila Múzeum 2022 ©</p>

					</div><!-- .site-info -->

				</footer><!-- #colophon -->



</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

