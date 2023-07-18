<?php  
$styles = '
.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-media-col {
	margin-top: calc(var(--bs-gutter-x) * .5);
    margin-bottom: calc(var(--bs-gutter-x) * .5);
    position: relative;
}
';
?>
<?php if ( $styles ) : ?>
	<style><?php echo areoi_minify_css( $styles ) ?></style>
<?php endif; ?>

<div class="container-fluid h-100 position-relative">
	<div class="row align-items-center">

		<div class="col">
			<div class="areoi-drag-container">
				<ul>

					<?php foreach ( lightspeed_get_attribute( 'gallery', array() ) as $media_key => $media ) : ?>
						<li  class="<?php lightspeed_media_col_class() ?>">

							<div class="areoi-media-col-content">
								<?php lightspeed_square_spacer() ?>

								<?php lightspeed_gallery_media( $media ) ?>
							</div>

						</li>
					<?php endforeach; ?>

				</ul>

			</div>
		</div>
	
	</div>
</div>