<?php
/**
 * The snippet sidebar template.
 */
?>
<div class="sidebar">
	
	<?php 
	/**
	 * Do the widgets
	 */
	if( is_single() ):
		dynamic_sidebar('corenominal-snippet-sidebar-single-widget');
	else:
		dynamic_sidebar('corenominal-snippet-sidebar-archives-widget');
	endif;
	?>

</div>