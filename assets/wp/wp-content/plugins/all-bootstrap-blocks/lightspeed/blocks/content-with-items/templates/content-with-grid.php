<?php  
$styles = '

';
?>
<?php if ( $styles ) : ?>
	<style><?php echo areoi_minify_css( $styles ) ?></style>
<?php endif; ?>

<div class="container h-100 position-relative">
	<div class="row h-100 align-items-center">

		<div class="col">
			<div class="row">
				<div class="align-self-start col-lg-6 col-xl-5 areoi-col-content <?php echo lightspeed_get_attribute( 'alignment', 'start' ) == 'end' ? 'offset-xxl-1 order-lg-1' : '' ?>">
					
					<?php lightspeed_content( 2, 'start' ) ?>

					<?php if ( lightspeed_get_attribute( 'include_cta', false ) ) : ?>
						<div class="h1 d-lg-none"></div>
					<?php endif; ?>
				</div>
				
				<div class="col-lg-6 <?php echo lightspeed_get_attribute( 'alignment', 'start' ) == 'end' ? '' : 'offset-xl-1' ?>">
					<div class="row row-cols-1 row-cols-md-2 areoi-parallax-component">
						<?php foreach ( lightspeed_get_attribute( 'items', array() ) as $item_key => $item ) : ?>
							<div class="col mb-4 position-relative">
								<?php lightspeed_item( $item ) ?>
							</div>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</div>
		
	</div>

</div>