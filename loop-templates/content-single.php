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
    if (!get_post_custom_values('galéria'))
        return;
    foreach ( get_post_custom_values('galéria') as &$value) {
        $galeria_post = get_post($value);
?>
    <div class="ertek-galeria">
    
    <?php 
   //echo $galeria_post->post_title; 
    
    the_galeria_content($galeria_post);
    ?>
    
    
	</div>
	
<?php 
    }
}


function get_ertek_kategoria_property($prop,$default){
    $ret = $default;
    foreach (get_the_category() as &$value) {
        $szin = get_term_meta($value->term_id,$prop,true);
        if (!empty($szin)) {
            $ret =  $szin;
        }
    }
    return $ret;
}

function get_ertek_kategoria_szin(){
    return get_ertek_kategoria_property('ert_szin',"#F0F0F0");
}

function get_ertek_kategoria_cimer(){
    return get_ertek_kategoria_property('ert_cimer',"wp-content/uploads/2021/08/HUN_Mako_Cimer_2.png");
}
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<?php if ( is_telepulesi_ertek() ) { ?> 

<!-- a kép  -->
<div  class="erek">
<div class="erek-leftside" >
 <span class="helper"></span>
<img class="erek-leftside-img"  src="<?php echo  get_post_custom_values('fo_kep')[0] ?>" />
	&nbsp;
</div>

<div class="ertek-rightside">
	<div class="eretk-friz">
	&nbsp;
	</div>
	<div class="ertek-name"  >
		<div style="background-color: <?php echo get_ertek_kategoria_szin();?>" class="eretek-disz-sp1" > &nbsp; </div>
		<div class="eretek-disz-szunet">&nbsp; </div>
		
		<div class="eretek-name-main-content" style="background-color: <?php echo get_ertek_kategoria_szin();?>" > 
			<?php the_title( '<div class="eretek-name-main" >', '</div>' ); ?>
			<img class="ertek-name-cimer-img" src ="<?php echo get_ertek_kategoria_cimer();?>" />
		</div>
		
	</div>
	
	<div class="ertek-leiras-container">
	<div class="ertek-leiras">
	 <?php the_content(); ?>
	 </div>
	</div>
	
	<div class="javaslatot-ido-container" >
    	<div class="ertek-benyujto">
    	 Javaslatot benyújtó: <?php echo implode(", ",get_post_custom_values('javaslatot benyujtó')); ?>
    	</div>
	
    	<div class="ertek-idopont">
    	Beadás ideje: <?php echo implode(", ",get_post_custom_values('benyujtas_idopontja')); ?>
    	</div>
	</div>
	<div class="ertek-forras">
	Forrás: </br> <?php echo implode("</br>",get_post_custom_values('forrás')); ?>
	</div>
	
	
	<?php showGaleria(); ?>
	<div class="ertek-also-sav-help">
	&nbsp;
	</div>
	<div class="ertek-also-sav">
	MAKÓI TELEPÜLÉSI ÉRTÉKTÁR
	</div>
</div>

</div> <!-- az egész article -->
<?php }else {?>

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">

			

		</div><!-- .entry-meta -->

	</header><!-- .entry-header -->

	<?php echo get_the_post_thumbnail( $post->ID, 'large' ); ?>

	<div class="entry-content">
      
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

		<?php  understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->
<?php } ?>
</article><!-- #post-## -->
