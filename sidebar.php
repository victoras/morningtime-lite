<?php
/**
 * The default Sidebar. It will appear on all Press/Blog pages
 *
 * @package WPlook
 * @subpackage Morning Time Lite
 * @since Morning Time Lite 1.0
 */
?>
<?php if ( is_active_sidebar( 'post-1' ) ) : ?>
	<?php if ( ! dynamic_sidebar( 'post-1' ) ) : ?>
	<?php endif; // end sidebar widget area ?>
<?php endif; ?>
