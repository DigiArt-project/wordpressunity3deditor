/**
 * Created by tpapazoglou on 11/7/2017.
 */

function wpunity_read_file(file, type, callback) {
    var content = '';
    var reader = new FileReader();

    if (file) {
        reader.readAsDataURL(file);

        // Closure to capture the file information.
        reader.onload = (function(reader) {
            return function() {

                content = reader.result;

                var isChrome = !!window.chrome && !!window.chrome.webstore;
                var isFirefox = typeof InstallTrigger !== 'undefined';
                var isIE = /*@cc_on!@*/false || !!document.documentMode;

                if (type !== 'texture') {
                    if (isChrome || isIE) { content = content.replace('data:;base64,', ''); }
                    if (isFirefox) { content = content.replace('data:application/octet-stream;base64,', ''); }

                    content = window.atob(content);
                }

                callback(content, type);
            };
        })(reader);
    } else {
        callback(content, type);
    }
}

// Callback is fired when obj & mtl inputs have files. Preview is loaded automatically.
// We can expand this for 'fbx' files too.
function wpunity_load_file_callback(content, type) {

    if(type === 'fbx') {
        fbxFileContent = content ? content : '';
    }

    if(type === 'mtl') {
        mtlFileContent = content ? content : '';
    }

    if(type === 'obj') {
        objFileContent = content ? content : '';
    }

    if (content) {

        if(type === 'texture') {
            jQuery("#texturePreviewImg").attr('src', '').attr('src', content);
            textureFileContent = content;
        }

        if (objFileContent && mtlFileContent) {
            jQuery("#objectPreviewTitle").show();

            createScreenshotBtn.show();

            previewRenderer = wu_3d_view_main('before', '', mtlFileContent, objFileContent, textureFileContent, document.getElementById('assetTitle').value, 'assetPreviewContainer');

        } else {
            wpunity_reset_sshot_field();
        }

    } else {
        document.getElementById("assetPreviewContainer").innerHTML = "";

    }
    spanProducerChartLabels();
}

function wpunity_extract_file_extension(fn) {
    return fn ? fn.split('.').pop().toLowerCase() : '';
}

function wpunity_create_slider_component(elemId, range, options) {

    if (range) {

        jQuery( elemId ).slider({
            range: range,
            min: options.min,
            max: options.max,
            values: [ options.values[0], options.values[1] ],
            create: function() {
                jQuery( options.valIds[0] ).val(options.values[0]);
                jQuery( options.valIds[1] ).val(options.values[1]);
            },
            slide: function( event, ui ) {
                jQuery( elemId+"-label" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] + " " +options.units);

            },
            stop: function( event, ui ) {
                jQuery( options.valIds[0] ).val(ui.values[ 0 ]);
                jQuery( options.valIds[1] ).val(ui.values[ 1 ]);
            }

        });
        jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) +
            " - " + jQuery( elemId ).slider( "values", 1 ) + " " + options.units );

    } else {

        jQuery( elemId ).slider({
            min: options.min,
            max: options.max,
            value: options.value,
            create: function() {
                jQuery( options.valId ).val(options.value);
            },
            slide: function( event, ui ) {
                jQuery( elemId+"-label" ).val( ui.value + " " +options.units);
            },
            stop: function( event, ui ) {
                jQuery( options.valId ).val(ui.value);
            }
        });
        jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "option", "value" ) + " " + options.units );

    }

    if (options.step) {
        jQuery( elemId ).slider({step: options.step});
    }

    return jQuery( elemId ).slider;
}

function wpunity_clear_asset_files() {
    document.getElementById("fbxFileInput").value = "";
    document.getElementById("mtlFileInput").value = "";
    document.getElementById("objFileInput").value = "";
    document.getElementById("textureFileInput").value = "";
    document.getElementById("sshotFileInput").value = "";
    jQuery("#texturePreviewImg").attr('src', texturePreviewDefaultImg);
    jQuery("#sshotPreviewImg").attr('src', sshotPreviewDefaultImg);
    jQuery("#objectPreviewTitle").hide();

    objFileContent = '';
    textureFileContent = '';
    fbxFileContent = '';
    mtlFileContent = '';
    previewRenderer = '';

    document.getElementById("assetPreviewContainer").innerHTML = "";
}

function wpunity_reset_panels() {
    wpunity_clear_asset_files();

    if (jQuery("ProducerPlotTooltip")) {
        jQuery("div.ProducerPlotTooltip").remove();
    }

    jQuery("#assetDescription").show();

    jQuery("#doorDetailsPanel").hide();
    jQuery("#nextSceneInput").attr('disabled', 'disabled');
    jQuery("#entryPointInput").attr('disabled', 'disabled');

    jQuery("#terrainPanel").hide();
    jQuery("#physicsWindMinVal").attr('disabled', 'disabled');
    jQuery("#physicsWindMaxVal").attr('disabled', 'disabled');
    jQuery("#physicsWindMeanVal").attr('disabled', 'disabled');
    jQuery("#physicsWindVarianceVal").attr('disabled', 'disabled');
    jQuery("#accessCostPenalty").attr('disabled', 'disabled');
    jQuery("#archProximityPenalty").attr('disabled', 'disabled');
    jQuery("#naturalReserveProximityPenalty").attr('disabled', 'disabled');
    jQuery("#hiVoltLineDistancePenalty").attr('disabled', 'disabled');

    jQuery("#consumerPanel").hide();
    jQuery("#energyConsumptionMinVal").attr('disabled', 'disabled');
    jQuery("#energyConsumptionMaxVal").attr('disabled', 'disabled');
    jQuery("#energyConsumptionMeanVal").attr('disabled', 'disabled');
    jQuery("#energyConsumptionVarianceVal").attr('disabled', 'disabled');
    jQuery("#overPowerCost").attr('disabled', 'disabled');
    jQuery("#normalPowerCost").attr('disabled', 'disabled');
    jQuery("#underPowerCost").attr('disabled', 'disabled');

    jQuery("#producerPanel").hide();
    /*jQuery("#producerAirSpeedVal").attr('disabled', 'disabled');*/
    jQuery("#producerPowerProductionVal").attr('disabled', 'disabled');
    jQuery("#producerTurbineSizeVal").attr('disabled', 'disabled');
    jQuery("#producerDmgCoeffVal").attr('disabled', 'disabled');
    jQuery("#producerCostVal").attr('disabled', 'disabled');
    jQuery("#producerRepairCostVal").attr('disabled', 'disabled');

    jQuery("#poiImgDetailsPanel").hide();

    jQuery("#poiVideoDetailsPanel").hide();
    jQuery("#videoFileInput").attr('disabled', 'disabled');

    jQuery("#objectPreviewTitle").hide();
}