<?php
/**
 * The template for displaying search forms
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<form method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>" role="search">
	<label class="sr-only" for="s">Keresés</label>
	<div class="input-group">
		<input class="field form-control" id="s" name="s" type="text" 
			placeholder="Keresés &hellip;" value="<?php the_search_query(); ?>">
		<span class="input-group-append">
			<input class="submit btn btn-primary" id="searchsubmit" name="submit" type="submit"
			value="Keresés">
		</span>
	</div>
</form>
