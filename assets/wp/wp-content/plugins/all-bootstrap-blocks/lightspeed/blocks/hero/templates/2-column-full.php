<?php  
$styles = '
.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media {
	position: relative;
}
@media only screen and (min-width: ' . get_option( 'areoi-layout-grid-grid-breakpoint-lg', '992px' ) . ') {
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media {
		height: 100%;
		position: absolute;
		top: 0;
		' . (lightspeed_get_attribute( 'alignment', 'start' ) == 'end' ? 'left' : 'right') . ': 0;
	}
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media .areoi-media-col,
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media .areoi-media-col-content,
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media .areoi-media-col svg {
		height: 100%;
	}
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media img,
	.' . lightspeed_get_block_id() . '.areoi-lightspeed-block .areoi-hero-media video {
		height: 100%;
	    width: 100%;
	    object-fit: cover;
		position: absolute;
		top: 50%;
		left: 50%;
		transform: translate( -50%, -50% );
	}
}
';
?>
<?php if ( $styles ) : ?>
	<style><?php echo areoi_minify_css( $styles ) ?></style>
<?php endif; ?>

<div class="container h-100">
	<div class="row h-100 align-items-center justify-content-between <?php echo lightspeed_get_attribute( 'alignment', 'start' ) == 'end' ? 'justify-content-lg-end' : '' ?>">
		
		<div class="col-lg-6 col-xl-5 text-center text-lg-start position-relative">
			
			<?php lightspeed_content( 1, 'start' ) ?>
		</div>

		<?php if ( lightspeed_get_attribute( 'video', null ) || lightspeed_get_attribute( 'image', null ) || ( lightspeed_get_attribute( 'is_post_image', null ) && get_post_thumbnail_id() ) ) : ?>
			<div class="col-lg-6 areoi-hero-media p-0">
				<div class="h1 d-lg-none"></div>
				<div class="<?php lightspeed_media_col_class() ?> areoi-has-mask">
					<div class="areoi-media-col-content">
						<?php lightspeed_spacer( 'square' ) ?>
						<?php lightspeed_media() ?>
					</div>
				</div>
			</div>
		<?php endif; ?>
	
	</div>
</div>

<?php //lightspeed_stretched_link() ?>