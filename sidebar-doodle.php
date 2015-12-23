<?php
/**
 * The doodle sidebar template.
 */
?>
<div class="sidebar">
	
	<?php 
	/**
	 * Do the widgets
	 */
	if( is_single() ):
		dynamic_sidebar('corenominal-doodle-sidebar-single-widget');
	else:
		dynamic_sidebar('corenominal-doodle-sidebar-archives-widget');
	endif;
	?>

</div>