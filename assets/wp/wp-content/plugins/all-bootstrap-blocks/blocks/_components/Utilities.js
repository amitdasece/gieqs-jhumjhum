const Utilities = ( areoi, attributes, onChange ) => {
    return (
        <areoi.components.PanelBody title={ 'Utilities' } initialOpen={ false }>
            <p>Utility clases will be added as base styles, but if you change settings such as background color further down the utility classes will be overriden.</p>
            <areoi.components.PanelRow className="areoi-panel-row">
                <areoi.components.SelectControl
                    label="Background"
                    labelPosition="top"
                    help="Use the Bootstrap background utilities to change the background of a card."
                    value={ attributes.utilities_bg }
                    options={ [
                        { label: 'Default', value: null },
                        { label: 'Primary', value: 'bg-primary' },
                        { label: 'Secondary', value: 'bg-secondary' },
                        { label: 'Success', value: 'bg-success' },
                        { label: 'Danger', value: 'bg-danger' },
                        { label: 'Warning', value: 'bg-warning' },
                        { label: 'Info', value: 'bg-info' },
                        { label: 'Light', value: 'bg-light' },
                        { label: 'Dark', value: 'bg-dark' },
                        { label: 'Body', value: 'bg-body' },
                    ] }
                    onChange={ ( value ) => onChange( 'utilities_bg', value ) }
                />

            </areoi.components.PanelRow>

            <areoi.components.PanelRow className="areoi-panel-row">
                <areoi.components.SelectControl
                    label="Text Color"
                    labelPosition="top"
                    help="Use the Bootstrap text color utilities to change the text color of a card."
                    value={ attributes.utilities_text }
                    options={ [
                        { label: 'Default', value: null },
                        { label: 'Primary', value: 'text-primary' },
                        { label: 'Secondary', value: 'text-secondary' },
                        { label: 'Success', value: 'text-success' },
                        { label: 'Danger', value: 'text-danger' },
                        { label: 'Warning', value: 'text-warning' },
                        { label: 'Info', value: 'text-info' },
                        { label: 'Light', value: 'text-light' },
                        { label: 'Dark', value: 'text-dark' },
                    ] }
                    onChange={ ( value ) => onChange( 'utilities_text', value ) }
                />
            </areoi.components.PanelRow>

            <areoi.components.PanelRow>
                <areoi.components.SelectControl
                    label="Border Color"
                    labelPosition="top"
                    help="Use border utilities to change just the border-color of a card."
                    value={ attributes.utilities_border }
                    options={ [
                        { label: 'Default', value: null },
                        { label: 'Primary', value: 'border border-primary' },
                        { label: 'Secondary', value: 'border border-secondary' },
                        { label: 'Success', value: 'border border-success' },
                        { label: 'Danger', value: 'border border-danger' },
                        { label: 'Warning', value: 'border border-warning' },
                        { label: 'Info', value: 'border border-info' },
                        { label: 'Light', value: 'border border-light' },
                        { label: 'Dark', value: 'border border-dark' },
                    ] }
                    onChange={ ( value ) => onChange( 'utilities_border', value ) }
                />
            </areoi.components.PanelRow>
        </areoi.components.PanelBody>
    );
}

export default Utilities;