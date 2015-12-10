<?php
/**
 * The default sidebar template.
 */
?>
<div class="sidebar">
	
	<?php 
	/**
	 * Do the widgets
	 */
	if( is_single() ):
		dynamic_sidebar('corenominal-blog-sidebar-single-widget');
	else:
		dynamic_sidebar('corenominal-blog-sidebar-archives-widget');
	endif;
	?>

</div>