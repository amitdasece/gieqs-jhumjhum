<?php 
if ( ! function_exists( 'lightspeed_header_basic_modal' ) ) {
	function lightspeed_header_basic_modal( $type )
	{
		?>
		<div class="modal fade" id="modal-<?php echo $type ?>-<?php echo lightspeed_get_block_id() ?>" tabindex="-1" aria-hidden="true">
			<div class="modal-dialog modal-fullscreen">
				<div class="modal-content bg-light">
					<div class="modal-body p-0">

						<div class="row row-cols-1 row-cols-lg-2 h-100 me-0 ms-0">

							<div class="col text-center h-100 d-flex flex-column align-items-center">

								<button class="p-4" type="button" data-bs-dismiss="modal" aria-label="<?php _e( 'Close' ) ?>">
									<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12 19 6.41z"/></svg>
									<span class="d-none d-sm-inline"><?php _e( 'Close' ) ?></span>
								</button>

								<?php if ( $type == 'menu' ) : ?>
									<?php if ( has_nav_menu( 'more-menu' ) ) : ?>
										<div class="w-100 h2 mb-4 flex-grow-1 d-flex align-items-lg-center justify-content-center position-relative overflow-auto">
											<?php wp_nav_menu( array( 
												'theme_location' => 'more-menu', 
												'menu_class' => 'areoi-primary-menu',
												'walker' => new AREOI_HAF_Walker_Nav_Menu_More 
											) ); ?>
										</div>
									<?php endif; ?>
								<?php else : ?>
									<div style="max-width: 450px;" class="w-100 h2 mb-4 flex-grow-1 d-flex flex-column align-items-lg-center justify-content-center position-relative overflow-auto">
										<p class="h2"><?php _e( 'Search' ) ?></p>

										<?php lightspeed_search() ?>
									</div>
								<?php endif; ?>

								<?php if ( has_nav_menu( 'primary-menu' ) ) : ?>
									<div class="pb-4">
										<?php wp_nav_menu( array( 
											'theme_location' => 'primary-menu', 
											'walker' => new AREOI_HAF_Walker_Nav_Menu_Primary, 
											'menu_class' => 'areoi-more-menu' 
										) ); ?>
									</div>
								<?php endif; ?>

								<?php if ( !lightspeed_get_attribute( 'exclude_social', false ) ) : ?>
									<div class="pb-4">
										<?php lightspeed_social() ?>
									</div>
								<?php endif; ?>

								<?php if ( !lightspeed_get_attribute( 'exclude_company', false ) ) : ?>
									<div class="pb-4">
										<?php lightspeed_contact( '', 'me-2 mb-0' ) ?>
									</div>
								<?php endif; ?>

							</div>
							
							<div class="d-none d-lg-block col p-0 h-100 bg-primary areoi-feature-menu text-center position-lg-fixed top-0 end-0">
								<?php if ( has_nav_menu( 'feature-menu' ) ) :

									$locations 			= get_nav_menu_locations();
									$menu 				= wp_get_nav_menu_object( $locations['feature-menu'] );
									$full_menu          = wp_get_nav_menu_items( $menu->term_id );
									$menu_total_count 	= 0;
									if ( is_array( $full_menu ) ) {
										$full_menu          = array_values( array_filter( $full_menu, function( $row ) {
											return $row->menu_item_parent === '0';
										} ) );
										$menu_total_count   = count( $full_menu );
									}
								?>

									<div id="<?php echo lightspeed_get_block_id() ?>-feature-<?php echo $type ?>" class="carousel slide h-100" data-bs-ride="carousel" data-bs-interval="3000">

										<?php if ( $menu_total_count > 0 ) : ?>
											<div class="carousel-indicators">
												<?php for ( $i = 0; $i < $menu_total_count; $i++ ) : ?>
													<button 
													type="button" 
													data-bs-target="#<?php echo lightspeed_get_block_id() ?>-feature-<?php echo $type ?>" 
													data-bs-slide-to="<?php echo $i ?>" 
													<?php echo $i == 0 ? 'class="active"' : '' ?> 
													aria-current="true" 
													aria-label="Slide <?php echo $i+1 ?>"
													></button>
												<?php endfor; ?>
											</div>
										<?php endif; ?>

										<?php wp_nav_menu( array( 
											'theme_location' => 'feature-menu', 
											'container' => false,
											'menu_class' => 'carousel-inner h-100',
											'walker' => new AREOI_HAF_Walker_Nav_Menu_Feature_Carousel,
											'link_before' => '<span class="btn btn-light areoi-has-url">',
											'link_after' => '</span>' 
										) ); ?>
										
										<?php if ( $menu_total_count > 0 ) : ?>
											<button class="carousel-control-prev" type="button" data-bs-target="#<?php echo lightspeed_get_block_id() ?>-feature-<?php echo $type ?>" data-bs-slide="prev">
												<span class="carousel-control-prev-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Previous</span>
											</button>
											<button class="carousel-control-next" type="button" data-bs-target="#<?php echo lightspeed_get_block_id() ?>-feature-<?php echo $type ?>" data-bs-slide="next">
												<span class="carousel-control-next-icon" aria-hidden="true"></span>
												<span class="visually-hidden">Next</span>
											</button>
										<?php endif; ?>
									</div>


									
								<?php endif; ?>
							</div>

						</div>

					</div>
				</div>
			</div>
		</div>
		<?php
	}
}

$styles = '
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .dropdown-menu {
	background: #fff;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .dropdown-menu a {
	color: ' . lightspeed_get_theme_color( 'bg-dark' ) . ';
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .dropdown button {
	transition: all 0.25s ease-in-out;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .dropdown button.show {
	transform: rotate(180deg);
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar {
	padding: ' . ( $padding / 2 ) . 'px 0;
	font-size: 0.9em;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header ul {
	padding: 0;
	margin: 0;
	list-style: none;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar-menu > ul,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-more-menu {
	display: flex;
	justify-content: end;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar-menu > ul > li,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-more-menu > li {
	padding: 0 10px;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar-menu > ul > li:last-of-type {
	padding-right: 0;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar a:not(.dropdown-menu a),
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar button {
	color: ' . lightspeed_get_theme_color( lightspeed_get_attribute( 'top_bar_text', lightspeed_get_default_color( 'bg', lightspeed_get_attribute( 'top_bar_background', 'bg-body' ) ) ) ) . ';
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar {
	padding: ' . $padding . 'px 0;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar a,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar button {
	color: ' . lightspeed_get_theme_color( lightspeed_get_attribute( 'main_text', lightspeed_get_default_color( 'bg', lightspeed_get_attribute( 'main_background', 'bg-body' ) ) ) ) . ';
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header button:not(.btn, .btn-close, .carousel-indicators button) {
	background: none;
	border: none;
	padding: 0;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar img,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar svg {
	max-height: ' . lightspeed_get_attribute( 'logo_height', '50' ) . 'px;
}

.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .modal,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .modal a {
	color: ' . lightspeed_get_theme_color( 'bg-dark' ) . ';
}

.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-primary-menu .areoi-sub-menu {
	background: ' . lightspeed_get_theme_color( 'bg-light' ) . ';
	width: 100%;
	height: 100%;
	position: absolute;
	top: 0;
	left: 0;
	align-items: center;
	justify-content: center;
	display: none;
	overflow: auto;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-primary-menu .areoi-sub-menu.active {
	display: flex;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-primary-menu .areoi-sub-menu.active .sub-menu {
	max-height: 100%;
}

.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu {
	height: 100%;
	overflow: auto;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu li {
	height: 100%;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu a {
	height: 100%;
	position: relative;
	overflow: hidden;
	display: flex;
	align-items: end;
	justify-content: center;
	padding: 80px 40px;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu a span:not(.btn) {
	background-position: center;
	background-size: cover;
	width: 100%;
	height: 100%;
	display: block;
	position: absolute;
	top: 0;
	left: 0;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu a .btn {
	max-width: 80%;
	width: 350px;
	position: relative;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-feature-menu .sub-menu {
	display: none;
}

.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar {
	transition: all 0.5s ease-in-out;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .position-fixed .areoi-top-bar {
	height: 50px;
	margin-top: -50px;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-bar,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-top-bar {
	background-color: rgba( 0, 0, 0, 0 );
	border-bottom: 1px solid rgba( 0, 0, 0, 0 );
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar a:not(.dropdown-menu a),
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar button {
	transition: background-color 0.5s ease-in-out, color 0.5s ease-in-out, border-color 0.5s ease-in-out;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-logo-dark {
	opacity: 0;
	transition: all 0.5s ease-in-out;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-logo-dark {
	opacity: 1;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header .areoi-menu-logo-default {
	opacity: 1;
	transition: all 0.5s ease-in-out;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-logo-default {
	opacity: 0;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar {
	background-color: ' . lightspeed_get_theme_color( 'light' ) . ' !important;
	border-color: ' . lightspeed_get_theme_color( 'dark' ) . ' !important;
}
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar,
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar a:not(.dropdown-menu a),
.' . lightspeed_get_block_id() . '.areoi-lightspeed-header.scrolled .areoi-menu-bar button {
	color: ' . lightspeed_get_theme_color( 'dark' ) . ' !important;
}
';
?>
<?php if ( $styles ) : ?>
	<style><?php echo areoi_minify_css( $styles ) ?></style>
<?php endif; ?>

<div class="areoi-header-container <?php lightspeed_attribute( 'position' ) ?> top-0 w-100">

	<?php if ( !lightspeed_get_attribute( 'exclude_top_bar', false ) ) : ?>
		<div class="areoi-top-bar d-none d-lg-block <?php lightspeed_attribute( 'top_bar_background' ) ?> <?php lightspeed_attribute( 'top_bar_border' ) ?>">
			<div class="<?php lightspeed_attribute( 'container', 'container' ) ?>">
				<div class="row justify-content-between align-items-center">
					
					<?php if ( !lightspeed_get_attribute( 'exclude_company', false ) ) : ?>
						<div class="col d-flex">
							<?php lightspeed_contact( '', 'me-2 mb-0', false ) ?>
						</div>
					<?php endif; ?>

					<?php if ( !lightspeed_get_attribute( 'exclude_social', false ) ) : ?>
						<div class="col d-none d-xl-block d-flex <?php if ( !lightspeed_get_attribute( 'exclude_company', false ) && has_nav_menu( 'top-menu' ) ) echo 'justify-content-center' ?> <?php if ( !lightspeed_get_attribute( 'exclude_company', false ) && !has_nav_menu( 'top-menu' ) ) echo 'justify-content-end' ?>">
							<?php lightspeed_social() ?>
						</div>
					<?php endif; ?>

					<?php if ( has_nav_menu( 'top-menu' ) ) : ?>
						<div class="col">
							<?php wp_nav_menu( array( 'theme_location' => 'top-menu', 'walker' => new AREOI_HAF_Walker_Nav_Menu_Primary, 'container_class' => 'areoi-top-bar-menu' ) ); ?>
						</div>
					<?php endif; ?>

				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="areoi-menu-bar <?php lightspeed_attribute( 'main_background' ) ?> <?php lightspeed_attribute( 'main_border' ) ?>">
		<div class="<?php lightspeed_attribute( 'container', 'container' ) ?>">
			<div class="row align-items-center justify-content-between">

				<div class="col">
					<?php if ( has_nav_menu( 'primary-menu' ) || has_nav_menu( 'more-menu' ) ) : ?>
						<button data-bs-target="#modal-menu-<?php echo lightspeed_get_block_id() ?>" data-bs-toggle="modal" aria-label="<?php _e( 'Open Full Menu' ) ?>">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/></svg>
							<span class="d-none d-sm-inline"><?php _e( 'Menu' ) ?></span>
						</button>
					<?php endif; ?>
				</div>

				<div class="col text-center justify-self-center">
					<a class="h-100 d-block position-relative" href="<?php echo home_url() ?>" title="<?php echo get_bloginfo( 'name' ) ?>">
						<span class="areoi-menu-logo-default w-100 h-100 d-block"><?php lightspeed_logo( lightspeed_get_default_color( 'logo', lightspeed_get_attribute( 'main_background' ) ) ) ?></span>
						<span class="areoi-menu-logo-dark position-absolute top-0 start-0 w-100 h-100 d-block">
							<?php echo lightspeed_get_logo( lightspeed_get_attribute( 'logo', null ), 'dark' ) ?>
						</span>
					</a>
				</div>

				<div class="col text-end">
					<?php if ( !lightspeed_get_attribute( 'exclude_search', false ) ) : ?>
						<button data-bs-target="#modal-search-<?php echo lightspeed_get_block_id() ?>" data-bs-toggle="modal" aria-label="<?php _e( 'Open Search' ) ?>">
							<svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="currentColor"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/></svg>
							<span class="d-none d-sm-inline"><?php _e( 'Search' ) ?></span>
						</button>
					<?php endif; ?>
				</div>

			</div>
		</div>
	</div>

</div>

<?php lightspeed_header_basic_modal( 'menu' ); ?>

<?php if ( !lightspeed_get_attribute( 'exclude_search', false ) ) : ?>
	<?php lightspeed_header_basic_modal( 'search' ); ?>
<?php endif; ?>

<?php 
$scripts = "
	jQuery(document).ready(function($){
		$( document ).on( 'click', '." . lightspeed_get_block_id() . " .areoi-menu-more-btn', function( e ) {
			e.preventDefault();

			var parent = $( this ).parent( 'li' ),
				sub_menu = parent.find( '> .areoi-sub-menu' );

			sub_menu.addClass( 'active' );
		} );

		$( document ).on( 'click', '." . lightspeed_get_block_id() . " .areoi-menu-back', function( e ) {
			e.preventDefault();

			var parent = $( this ).parent( 'li' ).parent( '.sub-menu' ).parent( '.areoi-sub-menu' );

			parent.removeClass( 'active' );
		} );
	});";
?>

<?php if ( $scripts ) : ?>
	<script><?php echo areoi_minify_js( $scripts ) ?></script>
<?php endif; ?>