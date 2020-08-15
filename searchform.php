<?php
/**
 * Search form template
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>

<form class="search-form" role="search" method="get" id="searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<label>
		<span class="screen-reader-text"><?php _e('Search for...', 'morningtime-lite'); ?></span>

		<input type="text" class="search-field" value="<?php _e('Search for...', 'morningtime-lite'); ?>" name="s" id="s" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
	</label>

	<input type="submit" class="search-submit" value="<?php _e('Search', 'morningtime-lite') ?>">
</form>
