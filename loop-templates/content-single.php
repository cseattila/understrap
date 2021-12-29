<?php
/**
 * Single post partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>
<?php
//Local helpers 

function is_telepulesi_ertek() {
    $ret = false;
    foreach (get_the_category() as &$value) {
        if ( $value->slug  == "telepulesi-ertek") {
            $ret = true; 
        }
    }
    return $ret;
}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

		

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
        <?php echo "helo a post tipusa települési ertek :". (is_telepulesi_ertek()?" igen ": "nem ");
        
              
        ?>
        
		<?php the_content(); ?>

		<?php
		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'understrap' ),
				'after'  => '</div>',
			)
		);
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
