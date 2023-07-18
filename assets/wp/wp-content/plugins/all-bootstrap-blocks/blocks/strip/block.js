import * as areoi from '../_components/Core.js';
import meta from './block.json';

const ALLOWED_BLOCKS = null;

const BLOCKS_TEMPLATE = [
    [ 'areoi/container', {
        height_dimension_xs: '100',
        height_unit_xs: '%'
    }, [
        [ 'areoi/row', {
            height_dimension_xs: '100',
            height_unit_xs: '%',
            vertical_align: 'align-items-center'
        }, [
            [ 'areoi/column', {} ]
        ] ]
    ] ],
];

const blockIcon = <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 0 24 24" width="24px" fill="#000000"><path d="M0 0h24v24H0V0z" fill="none"/><path d="M19 6H5c-1.1 0-2 .9-2 2v8c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V8c0-1.1-.9-2-2-2zm0 10H5V8h14v8z"/></svg>;

areoi.blocks.registerBlockType( meta, {
    icon: blockIcon,
    edit: props => {
        const {
            attributes,
            setAttributes,
            clientId
        } = props;

        const { block_id } = attributes;
        if ( !block_id || ( block_id != clientId ) ) {
            setAttributes( { block_id: clientId } );
        }

        const classes = [
            'strip',
            'align' + attributes.align,
            attributes.utilities_bg,
            attributes.utilities_text,
            attributes.utilities_border,
        ];

        const blockProps = areoi.editor.useBlockProps( {
            className: areoi.helper.GetClassName( classes ),
            style: { cssText: areoi.helper.GetStyles( attributes ) }
        } );

        function onChange( key, value ) {
            setAttributes( { [key]: value } );
        }

        const tabDevice = ( tab ) => {
            return (
                <div>
                    { areoi.DeviceLayout( areoi, attributes, onChange, tab ) }

                    { areoi.DeviceBackground( areoi, attributes, onChange, tab ) }
                </div>
            );
        };

        return (
            <>
                { areoi.DisplayPreview( areoi, attributes, onChange, 'strip' ) }

                { !attributes.preview &&
                    <div { ...blockProps }>
                        <areoi.editor.BlockControls>
                            { areoi.Alignment( areoi, attributes, onChange ) }
                        </areoi.editor.BlockControls>
                        <areoi.editor.InspectorControls key="setting">

                            {
                                typeof areoi_lightspeed_vars !== 'undefined' && ( areoi_lightspeed_vars.pattern || areoi_lightspeed_vars.divider || areoi_lightspeed_vars.transition || areoi_lightspeed_vars.parallax ) && 
                                <areoi.components.PanelBody title={ 'Lightspeed' } initialOpen={ false }>
                                    {
                                        areoi_lightspeed_vars.divider &&
                                        
                                        <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                            <areoi.components.ToggleControl 
                                                label={ 'Exclude divider' }
                                                help="If checked this block will not display a divider."
                                                checked={ attributes.exclude_divider }
                                                onChange={ ( value ) => onChange( 'exclude_divider', value ) }
                                            />
                                        </areoi.components.PanelRow>
                                    }

                                    {
                                        areoi_lightspeed_vars.pattern &&
                                        <>
                                            <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                                <areoi.components.ToggleControl 
                                                    label={ 'Exclude pattern' }
                                                    help="If checked this block will not display a pattern."
                                                    checked={ attributes.exclude_pattern }
                                                    onChange={ ( value ) => onChange( 'exclude_pattern', value ) }
                                                />
                                            </areoi.components.PanelRow>

                                            {
                                                !attributes.exclude_pattern &&
                                                <>
                                                    <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                                        <areoi.components.ToggleControl 
                                                            label={ 'Change pattern color' }
                                                            help="If checked the pattern will display in the selected color."
                                                            checked={ attributes.change_pattern_color }
                                                            onChange={ ( value ) => onChange( 'change_pattern_color', value ) }
                                                        />
                                                    </areoi.components.PanelRow>

                                                    {
                                                        attributes.change_pattern_color &&
                                                        <>
                                                        { areoi.ColorPicker( areoi, attributes, onChange, 'pattern_color', 'Pattern Color' ) }
                                                        </>
                                                    }
                                                </>
                                            }
                                            
                                        </>
                                    }

                                    {
                                        areoi_lightspeed_vars.transition &&
                                        <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                            <areoi.components.ToggleControl 
                                                label={ 'Exclude transition' }
                                                help="If checked this block will not implement transitions."
                                                checked={ attributes.exclude_transition }
                                                onChange={ ( value ) => onChange( 'exclude_transition', value ) }
                                            />
                                        </areoi.components.PanelRow>
                                    }

                                    {
                                        areoi_lightspeed_vars.parallax &&
                                        <areoi.components.PanelRow className={ 'areoi-panel-row areoi-panel-row-no-border' }>
                                            <areoi.components.ToggleControl 
                                                label={ 'Exclude parallax' }
                                                help="If checked this block will not implement parallax."
                                                checked={ attributes.exclude_parallax }
                                                onChange={ ( value ) => onChange( 'exclude_parallax', value ) }
                                            />
                                        </areoi.components.PanelRow>
                                    }
                                    
                                </areoi.components.PanelBody>
                            }
                            
                            { areoi.Utilities( areoi, attributes, onChange ) }

                            { areoi.Background( areoi, attributes, onChange ) }

                            { areoi.ResponsiveTabPanel( tabDevice, meta, props ) }
                                
                        </areoi.editor.InspectorControls>

                        { areoi.DisplayBackground( areoi, attributes ) }

                        <areoi.editor.InnerBlocks template={ BLOCKS_TEMPLATE } allowedBlocks={ ALLOWED_BLOCKS } />
                    </div>
                }
            </>
        );
    },
    save: () => { 
        return (
            <areoi.editor.InnerBlocks.Content/>
        );
    },
});