/**
 * Created by tpapazoglou on 11/7/2017.
 * Modified by dverver on 18/10/2017: Multiple jpgs as textures. fReader called once not twice for the same file.
 * dverver 02/04/2018
 * dverver 17/07/2020
 */
'use strict';

function wpunity_clear_asset_files(wu_webw_3d_view) {

    if (wu_webw_3d_view.renderer) {
        wu_webw_3d_view.clearAllAssets();
    }

    document.getElementById("fbxFileInput").value = "";
    document.getElementById("mtlFileInput").value = "";
    document.getElementById("objFileInput").value = "";
    document.getElementById("pdbFileInput").value = "";

    while ( jQuery("[id^=textureFileInput]").length > 0) {
         jQuery("[id^=textureFileInput]")[0].remove();
   }

    if (document.getElementById("fileUploadInput"))
        document.getElementById("fileUploadInput").value = "";

    document.getElementById("sshotFileInput").value = "";
    /*jQuery("#texturePreviewImg").attr('src', texturePreviewDefaultImg);*/
    jQuery("#sshotPreviewImg").attr('src', sshotPreviewDefaultImg);
    jQuery("#objectPreviewTitle").hide();

    nObj = 0;
    nFbx = 0;
    nMtl = 0;
    nJpg = 0;
    nPng = 0;
    nPdb = 0;
    nGif = 0;
}


function addHandlerFor3Dfiles(wu_webw_3d_view_local, multipleFilesInputElem) {

    // PREVIEW Handler (not uploaded yet): Load from selected files
    let _handleFileSelect = function ( event ) {

        // For cloning
        document.getElementById('asset_sourceID').value ="";

        // Reset Screenshot
        document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
        document.getElementById("sshotFileInput").value = "";

        // Copy because clear asset files in the following clears the total input fields also.
        // Files are blobs
        let files = {... event.target.files};

        // Clear the previously loaded
        wpunity_clear_asset_files(wu_webw_3d_view_local);

        //  Read each file and put the string content in an input dom
        for ( let i = 0; i < Object.keys(files).length; i++) {

            let file = files[i];

            // Get the extension
            let type = file.name.split('.').pop();

            // set the reader
            let reader = new FileReader();

            switch (type) {
                case 'pdb': nPdb = 1; reader.readAsText(file);        break;
                case 'mtl': nMtl = 1; reader.readAsText(file);        break;
                case 'obj': nObj = 1; reader.readAsArrayBuffer(file); break;
                case 'fbx': nFbx = 1; reader.readAsArrayBuffer(file); break;
                case 'jpg': nJpg++;   reader.readAsDataURL(file);     break;
                case 'png': nPng++;   reader.readAsDataURL(file);     break;
                case 'gif': nGif++;   reader.readAsDataURL(file);     break;
            }

            // --- Read it ------------------------
            reader.onload = (function(reader) {
                return function() {

                    let fileContent = reader.result ? reader.result : '';
                    let dec = new TextDecoder();

                    switch (type) {
                        case 'mtl':
                            console.log("End mtl");
                            // Replace quotes because they create a bug in input form
                            document.getElementById('mtlFileInput').value = fileContent.replace(/'/g, "");
                            break;
                        case 'obj': document.getElementById('objFileInput').value = dec.decode(fileContent);
                            console.log("End obj");
                            break;
                        case 'fbx': document.getElementById('fbxFileInput').value = dec.decode(fileContent); break;
                        case 'pdb': document.getElementById('pdbFileInput').value = fileContent; break;
                        case 'jpg':
                        case 'png':
                        case 'gif':
                            jQuery('#3dAssetForm').append(
                                '<input type="hidden" name="textureFileInput['+file.name+
                                            ']" id="textureFileInput" value="' + fileContent + '" />');
                            break;
                    }

                    // Check if everything is loaded
                    if ( type === 'mtl' || type==='obj' || type==='jpg' || type==='png' || type==='fbx' || type==='gif')
                        checkerCompleteReading(wu_webw_3d_view_local);
                    else if ( type==='pdb')
                        canvas.loadMolecule(content);

                };
            })(reader);
        }
    };
    // End of event handler

    // Set event handler on input dom element
    if(multipleFilesInputElem)
        multipleFilesInputElem.addEventListener( 'change' , _handleFileSelect, false );
}

/**
 * Reading from text files on client side
 * @param wu_webw_3d_view_local
 */
function checkerCompleteReading(wu_webw_3d_view_local){

    let objFileContent = document.getElementById('objFileInput').value;
    let fbxFileContent = document.getElementById('fbxFileInput').value;
    let mtlFileContent = document.getElementById('mtlFileInput').value;

    if ((nObj === 1 && objFileContent !== '') || (nFbx === 1 && fbxFileContent !== '') ){

        // Show progress slider
        jQuery('#previewProgressSlider').show();

        // Make the definition with the obj
        let encoder = new TextEncoder();

        if (nObj === 1){

            let uint8Array = encoder.encode(objFileContent);

            let objectDefinition = {
                name: nObj === 1 ? 'userObj':'userFbx',
                objAsArrayBuffer: uint8Array,
                pathTexture: "",
                mtlAsString: null
            };

            if (nMtl === 0) {
                // Start without MTL
                wu_webw_3d_view_local.loadObjStream(objectDefinition);
            } else {
                if (mtlFileContent!==''){

                    objectDefinition.mtlAsString = mtlFileContent;

                    if (nJpg===0 && nPng===0 ){
                        // Start without Textures
                        wu_webw_3d_view_local.loadObjStream(objectDefinition);

                    } else {
                        // Else check if textures have been loaded
                        let nTexturesLength = jQuery("input[id='textureFileInput']").length;
                        if ((nPng>0 && nPng === nTexturesLength)
                            || ( nJpg>0 && nJpg === nTexturesLength) ) {

                            // Get textureFileInput array with jQuery
                            var textFil = jQuery("input[id='textureFileInput']");

                            // Store here the raw image textures
                            objectDefinition.pathTexture = [];

                            for (var k = 0; k < textFil.length; k++){
                                var myname = textFil[k].name;

                                // do some text processing on the names to remove textureFileInput[ and ] from name
                                myname = myname.replace('textureFileInput[','');
                                myname = myname.replace(']','');

                                objectDefinition.pathTexture[myname] = textFil[k].value;
                            }

                            // Start with textures
                            console.log("start textures");
                            wu_webw_3d_view_local.loadObjStream(objectDefinition);
                        }
                    }
                }
            }
        } else if (nFbx === 1){

            let fBXBuffer = encoder.encode(fbxFileContent);


            var textFil = jQuery("input[id='textureFileInput']");

            //console.log(textFil);

            //console.log("textFil[k].value;", textFil[0].value);


            let texturesStreams = textFil; // textFil[0].value;


            wu_webw_3d_view_local.loadFbxStream(fBXBuffer, texturesStreams);

        }

    }
}
//-------------------- loading from saved data --------------------------------------
/**
 * Reading from url in server side
 * @param pathUrl
 * @param mtlFilename
 * @param objFilename
 */
function loader_asset_exists(pathUrl, mtlFilename, objFilename, pdbFileContent, fbxFilename){


    jQuery('#previewProgressSlider')[0].style.visibility = "visible";

    jQuery('#previewProgressSlider').show();// = "visible";

    if (wu_webw_3d_view.scene != null) {
        if (wu_webw_3d_view.renderer)
             wu_webw_3d_view.clearAllAssets();
    }

    if (pdbFileContent) {
        wu_webw_3d_view.loadMolecule(pdbFileContent);
        return;
    }

    //--------------- load all from url (in edit asset) --------------
    if (pathUrl  && objFilename ) { // this means that 3D model exists for this asset

        var manager = new THREE.LoadingManager();
        var mtlLoader = new THREE.MTLLoader();

        //var mtl_url = "bfcff4ceba79910cfed496e0b19d2ac3_materialTurbine1.txt";
        //var obj_file_name = "f74d834f96148080b5822a409a4299ff_objTurbine1.txt";
        //var pathUrl = "http://127.0.0.1:8080/digiart-project_Jan17/wp-content/uploads/Models/";

        mtlLoader.setPath(pathUrl);

        mtlLoader.load(mtlFilename, function (materials) {
            materials.preload();

            var objLoader = new THREE.OBJLoader(manager);
            objLoader.setMaterials(materials);
            objLoader.setPath(pathUrl);

            objLoader.load(objFilename, 'after',
                // OnObjLoad
                function (object) {

                    // Find bounding sphere
                    var sphere = wu_webw_3d_view.computeSceneBoundingSphereAll ( object) ;

                    // translate object to the center
                    object.traverse( function (object) {
                        if (object instanceof THREE.Mesh) {
                            object.geometry.translate(- sphere[0].x, - sphere[0].y, - sphere[0].z) ;
                        }
                    });

                    // Add to pivot
                    wu_webw_3d_view.pivot.add(object);

                    // Find new zoom
                    var totalradius = sphere[1];
                    wu_webw_3d_view.controls.minDistance = 0.001*totalradius;
                    wu_webw_3d_view.controls.maxDistance = 3*totalradius;

                    jQuery('#previewProgressSlider')[0].style.visibility = "hidden";
                },
                //onObjProgressLoad
                function (xhr) {

                    //console.log(xhr);
                    document.getElementById( 'previewProgressLabel' ).innerHTML = Math.round(xhr.loaded / 1000 ) + "KB";
                    if (xhr.lengthComputable) {

                    }
                },
                //onObjErrorLoad
                function (xhr) {
                    console.log("Error 351");
                }
            );
        });
    }

}




//--------------------- Auxiliary (Easy stuff) -------------------------------------------------------------


function updateColorPicker(picker){
    document.getElementById('assetback3dcolor').value = picker.toRGBString();
    wu_webw_3d_view.scene.background.r = picker.rgb[0]/255;
    wu_webw_3d_view.scene.background.g = picker.rgb[1]/255;
    wu_webw_3d_view.scene.background.b = picker.rgb[2]/255;

    // Change top border line color for portrait mode
    document.getElementById('text-asset-sidebar').style.borderTop="5px solid " +
        rgbToHex(picker.rgb[0]-40, picker.rgb[1]-40, picker.rgb[2]-40) ;
}

function rgbToHex(r, g, b) {
    if(r<0){r=0;}
    if(g<0){g=0;}
    if (b<0){b=0};
    return "#" + ((1 << 24) + (r << 16) + (g << 8) + b).toString(16).slice(1);
}

function applyFont(font) {
    console.log('You selected font: ' + font);

    // Replace + signs with spaces for css
    font = font.replace(/\+/g, ' ');

    // Split font into family and weight
    font = font.split(':');

    var fontFamily = font[0];
    var fontWeight = font[1] || 400;

    // Set selected font on paragraphs
    jQuery('.changablefont').css({fontFamily:"'"+fontFamily+"'", fontWeight:fontWeight});
}




function resizeText(multiplier,e) {
    e.preventDefault();
    e.stopPropagation();
    e.stopImmediatePropagation();
    if (document.body.style.fontSize == "") {
        document.body.style.fontSize = "1.0em";
    }
    document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";

    document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop =
        (parseFloat(document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop)+multiplier*10)+"px";

    return false;
}



function showSlides(i) {

    // Get slides div
    var slides = document.getElementsByClassName("mySlides");

    if(slides.length == 0)
        return;

    // Hide all
    for (let j = 0; j < slides.length; j++) {
        slides[j].style.display = "none";
    }

    if (i >= slides.length) {slideIndex = 0}
    if (i < 0) {slideIndex = slides.length}

    i = slideIndex;

    // Show only one
    slides[i].style.display = "block";
}

function plusSlides(i) {
    showSlides(slideIndex += i);
}

// Create model screenshot
function wpunity_create_model_sshot(wu_webw_3d_view_local) {

    wu_webw_3d_view_local.render();

    // I used html2canvas because there is no toDataURL in labelRenderer so there were no labels
    html2canvas(document.querySelector("#wrapper_3d_inner")).then(canvas => {

        wu_webw_3d_view_local.render();
        document.getElementById("sshotPreviewImg").src = canvas.toDataURL("image/jpeg");

        //------------ Resize ------------
        var resizedCanvas = document.createElement("canvas");
        var resizedContext = resizedCanvas.getContext("2d");
        var context = canvas.getContext("2d");
        resizedCanvas.height = "150";
        resizedCanvas.width = "265";
        resizedContext.drawImage(canvas, 0, 0, resizedCanvas.width, resizedCanvas.height);
        var myResizedData = resizedCanvas.toDataURL();
        //-----------------------------------------------------------

        document.getElementById("sshotFileInput").value = myResizedData;
    });
}



function loadFileInputLabel(objectType) {

    var inputLabel = document.getElementById('fileUploadInputLabel');
    var input = document.getElementById('fileUploadInput');

    if (inputLabel)
        if (objectType === 'pdb') {
            inputLabel.innerHTML = 'Select a pdb file';
            input.accept = ".pdb";
        } else if (objectType === 'obj') {
            inputLabel.innerHTML = 'Or select an a) obj, b) mtl, & c) optional texture files (jpgs or pngs)';
            input.accept = ".obj,.mtl,.jpg,.png";
        } else if (objectType === 'fbx') {
            inputLabel.innerHTML = 'Or select an a) fbx & b) optional texture file (gif, jpg, png)';
            input.accept = ".fbx,.jpg,.png,.gif";
        }
}

function wpunity_reset_panels(wu_webw_3d_view) {

    // Clear all
    wpunity_clear_asset_files(wu_webw_3d_view);

    if (jQuery("ProducerPlotTooltip")) {
        jQuery("div.ProducerPlotTooltip").remove();
    }

    jQuery("#assetDescription").show();
    jQuery("#doorDetailsPanel").hide();
    jQuery("#terrainPanel").hide();
    jQuery("#consumerPanel").hide();
    jQuery("#producerPanel").hide();
    //jQuery("#imgDetailsPanel").hide();
    //jQuery("#videoDetailsPanel").hide();
    jQuery("#objectPreviewTitle").hide();
    //jQuery("#moleculeOptionsPanel").hide();
    jQuery("#moleculeFluidPanel").hide();
    jQuery("#chemistryBoxOptionsPanel").hide();
}


// // for the Energy Turbines
// function wpunity_create_slider_component(elemId, range, options) {
//
//     if (range) {
//
//         jQuery( elemId ).slider({
//             range: range,
//             min: options.min,
//             max: options.max,
//             values: [ options.values[0], options.values[1] ],
//             create: function() {
//                 jQuery( options.valIds[0] ).val(options.values[0]);
//                 jQuery( options.valIds[1] ).val(options.values[1]);
//             },
//             slide: function( event, ui ) {
//                 jQuery( elemId+"-label" ).val( ui.values[ 0 ] + " - " + ui.values[ 1 ] + " " +options.units);
//
//             },
//             stop: function( event, ui ) {
//                 jQuery( options.valIds[0] ).val(ui.values[ 0 ]);
//                 jQuery( options.valIds[1] ).val(ui.values[ 1 ]);
//             }
//
//         });
//         jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "values", 0 ) +
//             " - " + jQuery( elemId ).slider( "values", 1 ) + " " + options.units );
//
//     } else {
//
//         if (options.inputText) {
//
//             jQuery( elemId ).slider({
//                 min: options.min,
//                 max: options.max,
//                 value: options.value,
//                 create: function() {
//                     jQuery( options.valId ).val(options.value);
//                 },
//                 slide: function( event, ui ) {
//                     jQuery( elemId+"-label" ).val( ui.value );
//
//                 },
//                 stop: function( event, ui ) {
//                     jQuery( options.valId ).val(ui.value);
//                 }
//             });
//             jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "option", "value" ));
//
//
//             jQuery(elemId+"-label").change(function () {
//                 var value = this.value;
//                 jQuery( elemId ).slider("value", parseInt(value));
//
//             });
//
//             jQuery(elemId+"-label").on('input', function() {
//                 var value = this.value;
//                 jQuery( elemId ).slider("value", parseInt(value));
//             });
//
//
//         } else {
//
//             jQuery( elemId ).slider({
//                 min: options.min,
//                 max: options.max,
//                 value: options.value,
//                 create: function() {
//                     jQuery( options.valId ).val(options.value);
//                 },
//                 slide: function( event, ui ) {
//
//                     jQuery( elemId+"-label" ).val( ui.value + " " +options.units);
//                 },
//                 stop: function( event, ui ) {
//                     jQuery( options.valId ).val(ui.value);
//                 }
//             });
//             jQuery( elemId+"-label" ).val( jQuery( elemId ).slider( "option", "value" ) + " " + options.units );
//
//         }
//     }
//
//     if (options.step) {
//         jQuery( elemId ).slider({step: options.step});
//     }
//
//     return jQuery( elemId ).slider;
// }
