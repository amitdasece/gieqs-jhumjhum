<?php
$key = 'content-with-items';
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
		'key' => $key . '-accordion-left',
		'title'      => __( 'Accordion left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"accordion.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-accordion-right',
		'title'      => __( 'Accordion right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"accordion.php","alignment":"end"} /-->
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
		'key' => $key . '-tabs-left',
		'title'      => __( 'Tabs left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"tabs.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-tabs-right',
		'title'      => __( 'Tabs right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"tabs.php","alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-tabs-full',
		'title'      => __( 'Tabs full', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"tabs-full-width.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-tabs-vertical',
		'title'      => __( 'Tabs vertical', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"tabs-vertical.php","alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-timeline',
		'title'      => __( 'Timeline', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"timeline.php","content_alignment":"center"} /-->
		',
	),
);
