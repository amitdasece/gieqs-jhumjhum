<?php
$key = 'layouts';
return array(
	array(
		'key' => $key . '-homepage',
		'title'      => __( 'Homepage', AREOI__TEXT_DOMAIN ),
		'categories' => array( $key ),
		'content'    => '
			<!-- wp:areoi-lightspeed/hero {"sub_heading":"WELCOME","heading":"We offer a wide range of services.","cta":"View services","url":""} /-->

			<!-- wp:areoi-lightspeed/content-with-media {"block_order":2,"heading":"About us.","cta":"About us","url":"https://staging.local/about/"} /-->

			<!-- wp:areoi-lightspeed/posts {"block_order":3,"heading":"Our services.","introduction":"\u003cp\u003e\u003c/p\u003e","cta":"View all services","url":"","post_type":"page"} /-->

			<!-- wp:areoi-lightspeed/posts {"block_order":4,"heading":"Our projects.","introduction":"\u003cp\u003e\u003c/p\u003e","cta":"View all projects","url":"","post_type":"page"} /-->

			<!-- wp:areoi-lightspeed/posts {"block_order":5,"heading":"Latest posts.","introduction":"\u003cp\u003e\u003c/p\u003e","cta":"View all posts","url":""} /-->

			<!-- wp:areoi-lightspeed/call-to-action {"block_order":6,"size":"auto","heading":"Ready to get started?","introduction":"\u003cp\u003eIf you are ready to get started, click the button below and one of our skilled team will be back in touch shortly.\u003c/p\u003e","cta":"Get started"} /-->

			<!-- wp:areoi-lightspeed/logos {"block_order":7,"size":"auto","heading":"","introduction":"\u003cp\u003e\u003c/p\u003e","include_cta":false} /-->
		',
	),
	
);
