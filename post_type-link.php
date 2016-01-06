<article class="h-entry post">

	<h2>
		<a class="p-name" href="<?php corenominal_the_link( $post->ID ) ?>" target="_blank">
			<?php the_title() ?>&nbsp;&nbsp;&nbsp;<i class="fa fa-external-link"></i>
		</a>
	</h2>

	<div class="e-content">
		<?php the_content() ?>
	</div>

	<footer>

		<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <a class="u-url" href="<?php the_permalink(); ?>"><?php the_time() ?></a></p>
		
		<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
		<p class="meta"><?php corenominal_the_link_tags( $post->ID ) ?></p>
		<?php endif; ?>

	</footer>

</article>