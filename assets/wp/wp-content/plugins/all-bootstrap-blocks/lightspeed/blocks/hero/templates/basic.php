<?php 
$styles = '
.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media {
	margin-bottom: -' . $mobile_padding . 'px;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-block ul {
	display: inline-block;
}
@media only screen and (min-width: ' . get_option( 'areoi-layout-grid-grid-breakpoint-lg', '992px' ) . ') {
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media {
		margin-bottom: -' . $padding . 'px;
	}
}
';
?>
<?php if ( $styles ) : ?>
	<style><?php echo areoi_minify_css( $styles ) ?></style>
<?php endif; ?>

<div class="container h-100 position-relative">
	<div class="row h-100 align-items-center">
		<div class="col">

			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-8 col-xl-7">
					<?php lightspeed_content( 1, 'center' ) ?>
				</div>
			</div>
			
			<?php if ( lightspeed_get_attribute( 'video', null ) || lightspeed_get_attribute( 'image', null ) || ( lightspeed_get_attribute( 'is_post_image', null ) && get_post_thumbnail_id() ) ) : ?>
				<div class="row justify-content-center areoi-hero-media">
					<div class="col-md-12 col-lg-10 col-xl-8">
						<div class="h1"></div>

						<div class="<?php lightspeed_media_col_class() ?>">
							<div class="areoi-media-col-content">
								<?php lightspeed_spacer( 'rectangle' ) ?>
								<?php lightspeed_media() ?>
							</div>
						</div>
					</div>
				</div>
			<?php endif; ?>
			
		</div>
	
	</div>
</div>