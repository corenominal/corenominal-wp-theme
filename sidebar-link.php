<?php
/**
 * The link sidebar template.
 */
?>
<div class="sidebar">
	
	<?php 
	/**
	 * Do the widgets
	 */
	if( is_single() ):
		dynamic_sidebar('corenominal-link-sidebar-single-widget');
	else:
		dynamic_sidebar('corenominal-link-sidebar-archives-widget');
	endif;
	?>

</div>