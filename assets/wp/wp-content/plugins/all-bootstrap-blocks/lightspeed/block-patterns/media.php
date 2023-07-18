<?php
$key = 'media';
return array(
	array(
		'key' => $key . '-grid',
		'title'      => __( 'Grid', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php"} /-->
		',
	),
	array(
		'key' => $key . '-grid-full',
		'title'      => __( 'Grid full', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"full-grid.php"} /-->
		',
	),
	array(
		'key' => $key . '-carousel',
		'title'      => __( 'Carousel', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"carousel.php"} /-->
		',
	),
	array(
		'key' => $key . '-carousel-full',
		'title'      => __( 'Carousel full', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"full-width-carousel.php"} /-->
		',
	),
	array(
		'key' => $key . '-masonry',
		'title'      => __( 'Masonry', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"masonry.php"} /-->
		',
	),
	array(
		'key' => $key . '-scrollable',
		'title'      => __( 'Scrollable', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"scrollable.php"} /-->
		',
	),	
);
