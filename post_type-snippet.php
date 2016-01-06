<article class="h-entry post">

	<h2>
		<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
	</h2>

	<div class="e-content">
		<?php the_content() ?>
	</div>

	<footer>
				
		<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <?php the_time() ?></p>
		
		<p class="meta"><?php corenominal_the_snippet_languages( $post->ID ) ?></p>
		<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
		<p class="meta"><?php corenominal_the_snippet_tags( $post->ID ) ?></p>
		<?php endif; ?>
	
	</footer>

</article>