<article class="h-entry post doodle">

	<h2>
		<a class="p-name u-url" href="<?php the_permalink(); ?>"><?php the_title() ?></a>
	</h2>

	<div class="e-content">
		<?php the_content() ?>

		<?php
		// Repeating pattern?
		if( corenominal_doodle_pattern( $post->ID ) == 'true' )
		{
			$tile = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
			$tile = $tile[0];
		?>
		<div class="doodle-tile-link" data-tile="<?php echo $tile; ?>">
			<img src="<?php echo get_template_directory_uri() . '/img/tile-link.svg' ?>" alt="Tile the doodle">
			<div class="doodle-tile-copy">
				<h4>Tile Preview</h4>
				<p>This doodle is a repeating pattern. Click here to see a preview.</p>
			</div>
		</div>
		<?php
		}
		?>

		<?php
		// Openclipart link?
		$url = corenominal_openclipart_link( $post->ID );
		if( $url != '' )
		{
		?>
		<div class="doodle-asset-link" data-url="<?php echo $url; ?>">
			<a class="notmagnific" href="<?php echo $url; ?>" target="_blank">
				<img src="<?php echo get_template_directory_uri() . '/img/openclipart-link.svg' ?>" alt="Openclipart">
				<div class="doodle-asset-copy">
					<h4>Openclipart Doodle</h4>
					<p>This doodle is available in various formats on Openclipart. Click here to visit the Openclipart page.</p>
				</div>
			</a>
		</div>
		<?php
		}
		?>
		<?php
		// Download link
		$file = get_attached_file( get_post_thumbnail_id(), 'full' );
		$upload_dir = wp_upload_dir();
		$upload_dir = $upload_dir["basedir"];
		$file = str_replace( $upload_dir, '', $file );
		?>
		<div class="doodle-asset-link">
			<a class="notmagnific" href="<?php echo site_url( 'wp-json/corenominal/doodle_download' ) . '?file=' . $file; ?>">
				<img src="<?php echo get_template_directory_uri() . '/img/doodle-download.svg' ?>" alt="Openclipart">
				<div class="doodle-asset-copy">
					<h4>Download Doodle</h4>
					<p>Unless otherwise stated, all my doodles are available for free under a Creative Commons Attribution-NonCommercial license.</p>
				</div>
			</a>
		</div>
	</div>

	<footer>
				
		<p class="meta"><i class="fa fa-clock-o"></i> <span class="sr-only">Posted @</span> <?php the_time() ?></p>
		<p class="meta"><?php corenominal_the_doodle_media( $post->ID ) ?></p>
		<?php if( get_option( 'corenominal_show_tags', 'true' ) == 'true' ): ?>
		<p class="meta"><?php corenominal_the_doodle_tags( $post->ID ) ?></p>
		<?php endif; ?>

	</footer>

</article>