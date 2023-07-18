<?php
$key = 'posts';
return array(
	array(
		'key' => $key . '-2-column',
		'title'      => __( '2 column', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"2-column.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-3-column',
		'title'      => __( '3 column', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"3-column.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-basic',
		'title'      => __( '4 column', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-content-with-grid-left',
		'title'      => __( 'Grid left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-grid.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-content-with-grid-right',
		'title'      => __( 'Grid right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"content-with-grid.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-scrollable-left',
		'title'      => __( 'Scrollable left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"scrollable.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-scrollable-right',
		'title'      => __( 'Scrollable right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"scrollable.php","alignment":"end"} /-->
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
);
