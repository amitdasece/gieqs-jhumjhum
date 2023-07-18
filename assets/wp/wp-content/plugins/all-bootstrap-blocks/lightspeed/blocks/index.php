<?php
require_once( AREOI__PLUGIN_LIGHTSPEED_DIR . 'classes/class.areoi.walker-nav-primary.php' );
require_once( AREOI__PLUGIN_LIGHTSPEED_DIR . 'classes/class.areoi.walker-nav-feature.php' );
require_once( AREOI__PLUGIN_LIGHTSPEED_DIR . 'classes/class.areoi.walker-nav-feature-carousel.php' );
require_once( AREOI__PLUGIN_LIGHTSPEED_DIR . 'classes/class.areoi.walker-nav-more.php' );

function lightspeed_render_block( $block_type, $attributes, $content ) 
{
	global $lightspeed_block_order;	

	$is_editor = isset( $_GET['context'] ) && $_GET['context'] == 'edit';

	if ( $is_editor ) {
		$post_id 		= sanitize_text_field( $_GET['post_id'] );
		$post_content 	= get_the_content( $post_id );
		$post_blocks 	= parse_blocks( $post_content );

		$block_order 	= 1;
		$post_order 	= 1;
		foreach ( $post_blocks as $block_key => $block ) {
			if ( !empty( $block['attrs']['block_id'] ) && $block['attrs']['block_id'] == $attributes['block_id'] ) {
				$block_order = $post_order;
			}
			if ( !empty( $block['blockName'] ) ) {
				$post_order++;
			}
		}
	} else {
		$block_order = $lightspeed_block_order;
	}
	
	if ( !isset( $attributes['background_display'] ) || !$attributes['background_display'] ) {
		$attributes['background_display'] = true;
		$attributes['background_color'] = array();
		$attributes['background_utility'] = '';
	}

	if ( get_option( 'areoi-lightspeed-styles-strip-background', false ) ) {
		
		if ( $attributes['background_utility'] == '' && empty( $attributes['background_color']['rgb'] ) ) {
			if ( $block_order % 3 == 0 && $block_order > 0 ) {
				$attributes['background_utility'] = 'bg-light';
			} elseif ( $block_order % 4 == 0 ) {
				$attributes['background_utility'] = 'bg-dark';
			} else {
				$attributes['background_utility'] = 'bg-body';
			}

			if ( in_array( $block_type, array( 'hero' ) ) ) {
				$attributes['background_utility'] = 'bg-primary';
			}
			if ( in_array( $block_type, array( 'call-to-action' ) ) ) {
				$attributes['background_utility'] = 'bg-secondary';
			}
		}
	} else {
		if ( $attributes['background_utility'] == '' && empty( $attributes['background_color']['rgb'] ) ) {
			$attributes['background_utility'] = 'bg-body';
		}
	}
	
	$pattern_align = !empty( $attributes['alignment'] ) ? $attributes['alignment'] : 'start';
	if ( get_option( 'areoi-lightspeed-styles-strip-alignment', false ) ) {
		if ( empty( $attributes['alignment'] ) ) {
			if ( $block_order % 2 == 0 ) {
				$pattern_align = 'end';
			} else {
				$pattern_align = 'start';
			}
		}
		if ( empty( $attributes['alignment'] ) && in_array( $block_type, array( 'content-with-media' ) ) ) {
			if ( $block_order % 2 == 0 ) {
				$attributes['alignment'] = 'end';
			} else {
				$attributes['alignment'] = 'start';
			}
		}
	}
	
	if ( !in_array( $block_type, array( 'header' ) ) ) {
		$lightspeed_block_order++;
	}

	global $lightspeed_attributes;
	$lightspeed_attributes = $attributes;
	
	$allow_pattern = true;
	
	$divider_styles = lightspeed_get_divider_styles( $block_order );

	$template = lightspeed_get_template( $block_type, $block_order );
	
	switch ( $block_type ) {
		case 'header':
			$padding = 20;
			switch ( lightspeed_get_attribute( 'padding', null ) ) {
				case 'xs':
					$padding = 10;
					break;
				case 'sm':
					$padding = 15;
					break;
				case 'lg':
					$padding = 25;
					break;
				case 'none':
					$padding = 0;
					break;
			}

			$content 	= '<div id="' . lightspeed_get_attribute( 'anchor', lightspeed_get_block_id() ) . '" class="' . lightspeed_get_block_id() . ' areoi-lightspeed-block areoi-lightspeed-' . $block_type . '">';
			ob_start(); include( $template ); $content .= ob_get_clean();
			$content 	.= '</div>';
			break;

		case 'footer':
		
			$padding = 20;
			switch ( lightspeed_get_attribute( 'padding', null ) ) {
				case 'xs':
					$padding = 10;
					break;
				case 'sm':
					$padding = 15;
					break;
				case 'lg':
					$padding = 25;
					break;
				case 'none':
					$padding = 0;
					break;
			}
			$first_padding = 85;

			$content 	= '<div id="' . lightspeed_get_attribute( 'anchor', lightspeed_get_block_id() ) . '" class="' . lightspeed_get_block_classes( $block_type ) . ' position-relative" style="' . $divider_styles . '">';
			ob_start(); include( $template ); $content .= ob_get_clean();
			$content 	.= '</div>';
			break;

		default:

			$divider = lightspeed_get_divider( $block_order );

			$is_first_strip = lightspeed_get_is_first_strip();

			$padding = get_option( 'areoi-lightspeed-styles-strip-padding', '150' );
			
			switch ( lightspeed_get_attribute( 'padding', null ) ) {
				case 'xs':
					$padding = $padding / 4;
					break;
				case 'sm':
					$padding = $padding / 2;
					break;
				case 'lg':
					$padding = $padding * 2;
					break;
				case 'none':
					$padding = 0;
					break;
			}
			if ( $divider && $divider != 'none.svg' && $padding < 85 ) $padding = 85;

			$padding_top = $padding;
			if ( $is_first_strip ) $padding_top = $padding_top + 70; 

			$mobile_padding = $padding / 2;
			if ( $divider && $divider != 'none.svg' && $mobile_padding < 85 ) $mobile_padding = 85;
			$mobile_padding_top = $mobile_padding;

			$block_styles = lightspeed_get_block_styles( $is_first_strip, $padding, $padding_top, $mobile_padding, $mobile_padding_top );

			$content 	= '<style>' . areoi_minify_css( $block_styles ) . '</style>';

			$background = include( AREOI__PLUGIN_DIR . '/blocks/_partials/background.php' );
	
			$content 	.= '<div id="' . lightspeed_get_attribute( 'anchor', lightspeed_get_block_id() ) . '" class="' . lightspeed_get_block_classes( $block_type ) . ' position-relative ' . ( $block_order == 1 ? 'areoi-is-first-strip' : '' ) . '" style="' . $divider_styles . '">';
				
				$content .= $background;

				ob_start(); include( $template ); $content .= ob_get_clean();

			$content 	.= '</div>';
			break;
	}

	return $content;
}

function lightspeed_register_blocks()
{
	$plugin_directory = AREOI__PLUGIN_LIGHTSPEED_DIR . 'blocks/';
	$plugin_templates = lightspeed_list_files_with_dir( $plugin_directory );

	$custom_theme_directory = lightspeed_get_custom_directory();
	$custom_theme_templates = lightspeed_list_files_with_dir( $custom_theme_directory );

	$child_templates = array();
	if ( is_child_theme() ) {
		$child_directory = lightspeed_get_custom_directory( true );
		$child_templates = lightspeed_list_files_with_dir( $child_directory );
	}

	$block_folders = array_merge( $plugin_templates, $custom_theme_templates, $child_templates );
	
	foreach ( $block_folders as $block_key => $block_folder ) {
		
		if ( file_exists( $block_folder . '/block.json' ) ) {
			
			$meta = json_decode( file_get_contents( $block_folder . '/block.json' ), true );

			$meta = lightspeed_get_extra_metas( $meta, $block_key );
			register_block_type( $meta['name'], $meta );
		}
	}
}
lightspeed_register_blocks();

function lightspeed_get_extra_metas( $meta, $block_key )
{
	$images = lightspeed_get_placeholder_images();
	$videos = lightspeed_get_placeholder_videos();
	$logos = lightspeed_get_placeholder_logos();
	$items_with_images = lightspeed_get_placeholder_items_with_images();
	$items_without_images = lightspeed_get_placeholder_items_without_images();
	
	if ( in_array( $block_key, array( 'logos' ) ) ) {
		$medias = $logos;
	} else {
		$medias = array_merge( $images, $videos );
		shuffle( $medias );
	}

	if ( in_array( $block_key, array( '' ) ) ) {
		$items = $items_without_images;
	} else {
		$items = $items_with_images;
	}

	$meta['attributes']['block_id'] = array(
		'type' => 'string',
		'default' => ''
	);
	$meta['attributes']['block_order'] = array(
		'type' => 'number',
		'default' => 1
	);
	$meta['attributes']['anchor'] = array(
		'type' => 'string',
		'default' => ''
	);
	$meta['attributes']['align'] = array(
		'type' => 'string',
		'default' => 'full'
	);
	$meta['attributes']['alignment'] = array(
		'type' => 'string',
		'default' => ''
	);
	$meta['attributes']['size'] = array(
		'type' => 'string',
		'default' => '100vh'
	);
	$meta['attributes']['padding'] = array(
		'type' => 'string',
		'default' => 'md'
	);
	$meta['attributes']['filename'] = array(
		'type' => 'string',
		'default' => ''
	);

	$meta['attributes']['divider'] = array(
        'type' => 'string',
        'default' => ''
    );
    $meta['attributes']['pattern'] = array(
        'type' => 'string',
        'default' => ''
    );
    $meta['attributes']['mask'] = array(
        'type' => 'string',
        'default' => ''
    );
    $meta['attributes']['exclude_transition'] = array(
        'type' => 'boolean',
        'default' => false
    );
    $meta['attributes']['exclude_parallax'] = array(
        'type' => 'boolean',
        'default' => false
    );

    if ( !empty( $meta['supports']['lightspeed_header'] ) ) {
    	$meta['attributes']['container'] = array(
			'type' => 'string',
			'default' => 'container'
		);
		$meta['attributes']['position'] = array(
			'type' => 'string',
			'default' => 'position-relative'
		);
		$meta['attributes']['exclude_top_bar'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['exclude_search'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['exclude_company'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['exclude_social'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['top_bar_background'] = array(
			'type' => 'string',
			'default' => 'bg-primary'
		);
		$meta['attributes']['top_bar_text'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['top_bar_border'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['main_background'] = array(
			'type' => 'string',
			'default' => 'bg-light'
		);
		$meta['attributes']['main_text'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['main_border'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo_height'] = array(
			'type' => 'string',
			'default' => '50'
		);
    }

    if ( !empty( $meta['supports']['lightspeed_footer'] ) ) {
    	$meta['attributes']['container'] = array(
			'type' => 'string',
			'default' => 'container'
		);
		$meta['attributes']['exclude_top_bar'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['exclude_company'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['exclude_social'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['main_background'] = array(
			'type' => 'string',
			'default' => 'bg-light'
		);
		$meta['attributes']['main_text'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['logo_height'] = array(
			'type' => 'string',
			'default' => '50'
		);
    }

	if ( !empty( $meta['supports']['lightspeed_content'] ) ) {
		$meta['attributes']['content_filename'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['content_alignment'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['sub_heading'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['is_post_title'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['heading'] = array(
			'type' => 'string',
			'default' => 'An interesting title that passes the blink test.'
		);
		$meta['attributes']['is_post_excerpt'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['introduction'] = array(
			'type' => 'string',
			'default' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis eros eget erat finibus, sed eleifend augue ultricies. Etiam imperdiet malesuada imperdiet. Mauris libero mauris, dictum quis enim sit amet.</p>'
		);
		$meta['attributes']['active_column'] = array(
			'type' => 'string',
			'default' => ''
		);
    	$meta['attributes']['columns'] = array(
    		'type' => 'array',
    		'default' => array()
    	);
		$meta['attributes']['include_cta'] = array(
			'type' => 'boolean',
			'default' => true
		);
		$meta['attributes']['cta'] = array(
			'type' => 'string',
			'default' => 'Call to Action'
		);
		$meta['attributes']['cta_size'] = array(
			'type' => 'string',
			'default' => 'btn-lg'
		);
		$meta['attributes']['url'] = array(
	        'type' => 'string',
	        'default' => ''
	    );
	    $meta['attributes']['opensInNewTab'] = array(
	        'type' => 'boolean',
	        'default' => false
	    );

	    $meta['attributes']['heading_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['sub_heading_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['introduction_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['cta_color'] = array(
			'type' => 'string',
			'default' => ''
		);
	}

	if ( !empty( $meta['supports']['lightspeed_posts'] ) ) {
		$meta['attributes']['post_background_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['post_title_color'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['post_excerpt_color'] = array(
			'type' => 'string',
			'default' => ''
		);

		$meta['attributes']['is_post_query'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['post_type'] = array(
			'type' => 'string',
			'default' => 'post'
		);
		$meta['attributes']['display_posts'] = array(
			'type' => 'string',
			'default' => 'selected'
		);
		$meta['attributes']['posts_per_page'] = array(
			'type' => 'string',
			'default' => '8'
		);
		$meta['attributes']['orderby'] = array(
			'type' => 'string',
			'default' => 'title'
		);
		$meta['attributes']['order'] = array(
			'type' => 'string',
			'default' => 'asc'
		);
		$meta['attributes']['post_ids'] = array(
			'type' => 'array',
			'default' => []
		);
		$meta['attributes']['include_pagination'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['pagination_color'] = array(
			'type' => 'string',
			'default' => 'btn-primary'
		);
		$meta['attributes']['include_media'] = array(
			'type' => 'boolean',
			'default' => true
		);
		$meta['attributes']['include_title'] = array(
			'type' => 'boolean',
			'default' => true
		);
		$meta['attributes']['include_excerpt'] = array(
			'type' => 'boolean',
			'default' => true
		);
		$meta['attributes']['include_permalink'] = array(
			'type' => 'boolean',
			'default' => true
		);
	}
	
	if ( !empty( $meta['supports']['lightspeed_media'] ) ) {
		$meta['attributes']['media_shape'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['media_fit'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['is_post_image'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['image'] = array(
			'type' => 'object',
			'default' => lightspeed_get_placeholder_images( 1 )
		);
		$meta['attributes']['video'] = array(
			'type' => 'object',
			'default' => lightspeed_get_placeholder_videos( 1 )
		);
	}

    if ( !empty( $meta['supports']['lightspeed_gallery'] ) ) {
    	$meta['attributes']['gallery'] = array(
    		'type' => 'array',
    		'default' => $medias
    	);
    }
    if ( !empty( $meta['supports']['lightspeed_items'] ) ) {
    	$meta['attributes']['active_item'] = array(
			'type' => 'string',
			'default' => ''
		);
    	$meta['attributes']['items'] = array(
    		'type' => 'array',
    		'default' => $items
    	);
    }
    if ( !empty( $meta['supports']['lightspeed_background'] ) ) {
    	$meta['attributes']['background_display'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['background_utility'] = array(
			'type' => 'string',
			'default' => ''
		);
		$meta['attributes']['background_color'] = array(
			'type' => 'object',
			'default' => []
		);
		$meta['attributes']['background_image'] = array(
			'type' => 'object',
			'default' => []
		);
		$meta['attributes']['background_video'] = array(
			'type' => 'object',
			'default' => []
		);
		$meta['attributes']['background_display_overlay'] = array(
			'type' => 'boolean',
			'default' => false
		);
		$meta['attributes']['background_overlay'] = array(
			'type' => 'object',
			'default' => array(
				'rgb' => array(
					'r' => 0,
					'g' => 0,
					'b' => 0,
					'a' => 1
				)
			)
		);
    }

    $meta['render_callback'] = function( $attributes, $content ) use ( $block_key ) {
		return lightspeed_render_block( $block_key, $attributes, $content );
	};

    return $meta;
}

function lightspeed_get_placeholder_introduction()
{
	return '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla lobortis eros eget erat finibus, sed eleifend augue ultricies. Etiam imperdiet malesuada imperdiet. Mauris libero mauris.</p>';
}

function lightspeed_get_placeholder_items_with_images()
{

	$items = array(
		array(
			'id' => 1,
			'heading' => 'Item 1',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => lightspeed_get_placeholder_images( 0 )
		),
		array(
			'id' => 2,
			'heading' => 'Item 2',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => lightspeed_get_placeholder_images( 1 )
		),
		array(
			'id' => 3,
			'heading' => 'Item 3',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => lightspeed_get_placeholder_images( 2 )
		),
		array(
			'id' => 4,
			'heading' => 'Item 4',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => lightspeed_get_placeholder_images( 3 )
		),
	);

	return $items;
}

function lightspeed_get_placeholder_items_without_images()
{

	$items = array(
		array(
			'id' => 1,
			'heading' => 'Item 1',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => null
		),
		array(
			'id' => 2,
			'heading' => 'Item 2',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => null
		),
		array(
			'id' => 3,
			'heading' => 'Item 3',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => null
		),
		array(
			'id' => 4,
			'heading' => 'Item 4',
			'introduction' => lightspeed_get_placeholder_introduction(),
			'include_cta' => false,
			'cta' => null,
			'cta_size' => null,
			'url' => null,
			'opensInNewTab' => null,
			'heading_color' => null,
			'introduction_color' => null,
			'cta_color' => null,
			'background_color' => null,
			'video' => null,
			'image' => null
		),
	);

	return $items;
}

function lightspeed_get_placeholder_images( $key = null )
{
	$directory = get_option( 'areoi-lightspeed-company-stock-media', 'default' );

	if ( $key == 'rand' ) $key = rand( 0, 3 );

	$images = array(
		array(
			'id' => 1,
			'title' => 'image-1',
			'filename' => 'image-1.jpg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/image-1.jpg',
			'mime' => 'image/jpeg',
			'type' => 'image',
			'subtype' => 'jpeg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 2,
			'title' => 'image-2',
			'filename' => 'image-2.jpg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/image-2.jpg',
			'mime' => 'image/jpeg',
			'type' => 'image',
			'subtype' => 'jpeg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 3,
			'title' => 'image-3',
			'filename' => 'image-3.jpg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/image-3.jpg',
			'mime' => 'image/jpeg',
			'type' => 'image',
			'subtype' => 'jpeg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 4,
			'title' => 'image-4',
			'filename' => 'image-4.jpg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/image-4.jpg',
			'mime' => 'image/jpeg',
			'type' => 'image',
			'subtype' => 'jpeg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
	);

	if ( $key !== null ) return $images[$key];

	return $images;
}

function lightspeed_get_placeholder_videos( $key = null )
{
	$directory = get_option( 'areoi-lightspeed-company-stock-media', 'default' );

	if ( $key == 'rand' ) $key = rand( 0, 3 );
	
	$videos = array(
		array(
			'id' => 1,
			'title' => 'video-1',
			'filename' => 'video-1.mp4',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/video-1.mp4',
			'mime' => 'video/mp4',
			'type' => 'video',
			'subtype' => 'mp4',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 2,
			'title' => 'video-2',
			'filename' => 'video-2.mp4',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/video-2.mp4',
			'mime' => 'video/mp4',
			'type' => 'video',
			'subtype' => 'mp4',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 3,
			'title' => 'video-3',
			'filename' => 'video-3.mp4',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/video-3.mp4',
			'mime' => 'video/mp4',
			'type' => 'video',
			'subtype' => 'mp4',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 4,
			'title' => 'video-4',
			'filename' => 'video-4.mp4',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/' . $directory . '/video-4.mp4',
			'mime' => 'video/mp4',
			'type' => 'video',
			'subtype' => 'mp4',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
	);

	if ( $key !== null ) return $videos[$key];

	return $videos;
}

function lightspeed_get_placeholder_logos()
{
	$logos = array(
		array(
			'id' => 1,
			'title' => '3d-square',
			'filename' => '3d-square.svg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/default/3d-square.svg',
			'mime' => 'image/svg',
			'type' => 'image',
			'subtype' => 'svg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 2,
			'title' => 'shapey',
			'filename' => 'shapey.svg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/default/shapey.svg',
			'mime' => 'image/svg',
			'type' => 'image',
			'subtype' => 'svg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 3,
			'title' => 'speech',
			'filename' => 'speech.svg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/default/speech.svg',
			'mime' => 'image/svg',
			'type' => 'image',
			'subtype' => 'svg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 4,
			'title' => 'triangle-creative',
			'filename' => 'triangle-creative.svg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/default/triangle-creative.svg',
			'mime' => 'image/svg',
			'type' => 'image',
			'subtype' => 'svg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
		array(
			'id' => 5,
			'title' => 'waves',
			'filename' => 'waves.svg',
			'url' => '' . AREOI__PLUGIN_LIGHTSPEED_URI . 'assets/placeholders/default/waves.svg',
			'mime' => 'image/svg',
			'type' => 'image',
			'subtype' => 'svg',
			'height' => 1280,
			'width' => 1920,
			'alt' => 'Placeholder Image'
		),
	);
	return $logos;
}