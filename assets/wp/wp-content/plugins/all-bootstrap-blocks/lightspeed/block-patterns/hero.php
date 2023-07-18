<?php
$key = 'hero';
return array(
	array(
		'key' => $key . '-basic',
		'title'      => __( 'Basic', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-left',
		'title'      => __( '2 column left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"2-column.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-right',
		'title'      => __( '2 column right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"2-column.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-full-left',
		'title'      => __( '2 column full left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"2-column-full.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-full-right',
		'title'      => __( '2 column full right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"2-column-full.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-background-media',
		'title'      => __( 'Background media', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"background-media.php","alignment":"end"} /-->
		',
	),
);
