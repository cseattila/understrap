<?php
/**
 * Template Name: Cimeres 
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}


function the_main_page_sideshow_content( $more_link_text = null, $strip_teaser = false ,$post= null ) {
    $content = get_the_content( $more_link_text, $strip_teaser ,$post);
    
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
?>

<div class="wrapper" id="full-width-page-wrapper">
    <div class="main-sideshow-conatiner">
    
    	<div style="display: flex;">
            <div class="foldal-idezet-ball2">   
            <div>         <div> 
          "A makóit összeköti a makóival</br>
- nemcsak a kortárssal,</br>
hanem az elmúlt</br>
és az eljövendő korok</br>
makói polgáraival is -,</br>
az ország vagy a világ</br>
más tájain élő ember számára pedig</br>
érdekessé és tiszteletre méltóvá teszi</br>
a várost, a közösséget."</br>
</br>
Lázár János
                 </div>   
                 </div>
                 </div>
                <div class="kepek">   
                &nbsp;
                <div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->

	</div><!-- #content -->
                </div>
          <div class="foldal-idezet-jobb">    
            <div>         <div>       
          "Az érték teszi tartossá az emberek </br>
          közötti szövetséget, együttműködést</br>
          - minden más csak érdekszövetség, </br> 
          melynek szavatossága hamar lejár.</br>
          Az érték célt, tartást, <br>
           önmeghatározást ad,</br>
          és teszi cselekvőképessé</br>
           a közösséget."</br></br>
                    Farkas Éva Erzsébet
                     </div>
                      </div>
                 </div>
   </div>
        	
        
          <div class="pecset_kotel2">
        &nbsp;
        </div>
        <div class="pecset_felso2">
        &nbsp;
        </div>
      
    </div>
	

</div><!-- #full-width-page-wrapper -->

<?php
get_footer();