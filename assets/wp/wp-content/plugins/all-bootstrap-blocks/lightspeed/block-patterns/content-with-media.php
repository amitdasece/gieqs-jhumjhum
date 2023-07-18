<?php
$key = 'content-with-media';
return array(
	array(
		'key' => $key . '-carousel-left',
		'title'      => __( 'Carousel left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-carousel-right',
		'title'      => __( 'Carousel right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-carousel-full-left',
		'title'      => __( 'Carousel full left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-carousel-full.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-carousel-full-right',
		'title'      => __( 'Carousel full right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-carousel-full.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-scrollable-media-left',
		'title'      => __( 'Scrollable left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-scrollable-media.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-scrollable-media-right',
		'title'      => __( 'Scrollable right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-scrollable-media.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-sticky-media-left',
		'title'      => __( 'Sticky media left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-sticky-media.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-sticky-media-right',
		'title'      => __( 'Sticky media right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-sticky-media.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-sticky-media-full-left',
		'title'      => __( 'Sticky media full left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-sticky-media-full.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-sticky-media-full-right',
		'title'      => __( 'Sticky media full right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-sticky-media-full.php","alignment":"end"} /-->
		',
	),
);
