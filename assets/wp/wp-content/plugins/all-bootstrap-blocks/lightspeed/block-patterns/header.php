<?php
$key = 'header';
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
		'key' => $key . '-simple',
		'title'      => __( 'Simple', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php","exclude_top_bar":true,"main_background":"bg-transparent","main_border":"border-dark"} /-->
		',
	),
	
);
