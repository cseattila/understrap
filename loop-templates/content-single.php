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
        if ( $value->slug  == "ertek-megj") {
            $ret = true; 
        }
    }
    return $ret;
}

function the_galeria_content($galeria_post  ) {
    $content = get_the_content( null, false ,$galeria_post);
    
    /**
     * Filters the post content.
     *
     * @since 0.71
     *
     * @param string $content Content of the current post.
     */
    $content = apply_filters( 'the_content', $content );
    $content = str_replace( ']]>', ']]&gt;', $content );
    echo $content;
}


function showGaleria(){
    foreach ( get_post_custom_values('galéria') as &$value) {
        $galeria_post = get_post($value);
?>
    <div class="ertek-galeria">
    
    <?php echo $galeria_post->post_title; 
    
    the_galeria_content($galeria_post);
    ?>
    
    
	</div>
	
<?php 
    }
}

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<?php if ( is_telepulesi_ertek() ) { ?> 

<!-- a k�p  -->
<div class="erek-leftside" > </div>

<div class="ertek-rightside">
	<div class="eretk-friz">
	
	</div>
	<div class="ertek-name " >
	<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</div>
	
	<div class="ertek-leiras">
	<?php the_content(); ?>
	</div>
	
	<div class="ertek-benyujto">
	<?php echo implode(", ",get_post_custom_values('javaslatot benyujtó')); ?>
	</div>
	
	<div class="ertek-idopont">
	<?php echo implode(", ",get_post_custom_values('benyujtas_idopontja')); ?>
	</div>
	
	<div class="ertek-forras">
	<?php echo implode(", ",get_post_custom_values('forrás')); ?>
	</div>
	
	
	<?php showGaleria(); ?>
</div>

<?php }else {?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
        <?php echo "helo a post tipusa telep�l�si ertek :". (is_telepulesi_ertek()?" igen ": "nem ");
        
              
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
<?php } ?>
</article><!-- #post-## -->
