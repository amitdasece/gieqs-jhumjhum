<?php
$key = 'footer';
return array(
	array(
		'key' => $key . '-basic',
		'title'      => __( 'Basic', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/' . $key . ' {"filename":"basic.php"} /-->
		',
	),
	
);
