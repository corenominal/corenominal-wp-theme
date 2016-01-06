<article class="h-entry post">

	<h2>
		<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
	</h2>

	<div class="e-content">
		<?php the_content() ?>
	</div>

	<footer>
					
		<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <a href="<?php the_permalink(); ?>"><?php the_time() ?></a></p>
		
		<?php if( get_option( 'corenominal_show_cats', 'false' ) == 'true' ): ?>
		<p class="meta"><i class="fa fa-files-o"></i> <span class="sr-only">Filed under: </span> <?php the_category( ' ' ) ?></p>
		<?php endif; ?>
		
		<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
		<p class="meta"><?php the_tags( '<i class="fa fa-tags"></i> <span class="sr-only">Tags: </span>' ) ?></p>
		<?php endif; ?>

	</footer>

</article>