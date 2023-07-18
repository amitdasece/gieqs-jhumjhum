<?php
$key = 'text';

$sub_heading = 'Sub heading';
$column = '\u003cp\u003eLorem ipsum dolor sit amet, consectetur adipiscing elit. Sed molestie tellus sed suscipit lacinia. Donec non mattis dolor. Curabitur vel justo a augue ultrices euismod id vitae tellus.\u003c/p\u003e';
$column_1 = '{"id":1,"heading":null,"introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null}';
$column_2 = '{"id":2,"heading":null,"introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null}';

return array(
	array(
		'key' => $key . '-1-column-left',
		'title'      => __( '1 column left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-media {"sub_heading":"' . $sub_heading . '","columns":[' . $column_1 . '],"gallery":[],"include_cta":false,"alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-1-column-right',
		'title'      => __( '1 column right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-media {"sub_heading":"' . $sub_heading . '","columns":[' . $column_1 . '],"gallery":[],"include_cta":false,"alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-left',
		'title'      => __( '2 column left', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-media {"sub_heading":"' . $sub_heading . '","columns":[' . $column_1 . ', ' . $column_2 . '],"gallery":[],"include_cta":false,"alignment":"start"} /-->
		',
	),
	array(
		'key' => $key . '-2-column-right',
		'title'      => __( '2 column right', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-media {"sub_heading":"' . $sub_heading . '","columns":[' . $column_1 . ', ' . $column_2 . '],"gallery":[],"include_cta":false,"alignment":"end"} /-->
		',
	),
	array(
		'key' => $key . '-3-column',
		'title'      => __( '3 column', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-items {"filename":"3-column.php","heading":"","introduction":"\u003cp\u003e\u003c/p\u003e","include_cta":false,"items":[{"id":1,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null},{"id":2,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null},{"id":3,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null}]} /-->
		',
	),
	array(
		'key' => $key . '-4-column',
		'title'      => __( '4 column', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/content-with-items {"filename":"basic.php","heading":"","introduction":"\u003cp\u003e\u003c/p\u003e","include_cta":false,"items":[{"id":1,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null},{"id":2,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null},{"id":3,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null},{"id":4,"heading":"","introduction":"' . $column . '","include_cta":false,"cta":null,"cta_size":null,"url":null,"opensInNewTab":null,"heading_color":null,"introduction_color":null,"cta_color":null,"background_color":null,"video":null,"image":null}]} /-->
		',
	),
	array(
		'key' => $key . '-centered',
		'title'      => __( 'Centered', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/call-to-action {"include_cta":false,"background_display":true,"background_utility":"bg-body"} /-->
		',
	),
);
