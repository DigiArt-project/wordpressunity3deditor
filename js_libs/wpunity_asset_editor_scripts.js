/**
 * Created by tpapazoglou on 11/7/2017.
 * Modified by dverver on 18/10/2017: Multiple jpgs as textures. fReader called once not twice for the same file.
 * dverver 02/04/2018
 * dverver 17/07/2020
 */
'use strict';


var nObj = 0;
var nFbx = 0;
var nMtl = 0;
var nJpg = 0;
var nPng = 0;
var nPdb = 0;
var nGif = 0;
var nGlb = 0;

var FbxBuffer = '';
var GlbBuffer = '';


var currLanguage = "English";

var path_url, mtl_file_name, obj_file_name, pdb_file_name, fbx_file_name, glb_file_name;

// Initial slide to show (carousel top)
var slideIndex = 0;


function wpunity_clear_asset_files(wu_webw_3d_view) {

    if (wu_webw_3d_view.renderer) {
        wu_webw_3d_view.clearAllAssets();
    }

    // Clear inputs
    document.getElementById("fbxFileInput").value = "";
    document.getElementById("mtlFileInput").value = "";
    document.getElementById("objFileInput").value = "";
    document.getElementById("pdbFileInput").value = "";
    document.getElementById("glbFileInput").value = "";
    FbxBuffer = '';

    // Clear add texture hidden fields
    while ( jQuery("[id^=textureFileInput]").length > 0) {
         jQuery("[id^=textureFileInput]")[0].remove();
   }

    // Clear select 3D files input
    if (document.getElementById("fileUploadInput"))
        document.getElementById("fileUploadInput").value = "";

    document.getElementById("sshotFileInput").value = "";


    // Clear screenshot
    jQuery("#sshotPreviewImg").attr('src', sshotPreviewDefaultImg);

    // Clear Title in Preview
    jQuery("#objectPreviewTitle").hide();

    nObj = 0;
    nFbx = 0;
    nMtl = 0;
    nJpg = 0;
    nPng = 0;
    nPdb = 0;
    nGif = 0;
    nGlb = 0;

}


function file_reader_cortex(file, wu_webw_3d_view_local){

    // Get the extension
    let type = file.name.split('.').pop();

    // set the reader
    let reader = new FileReader();

    switch (type) {
        case 'pdb': nPdb = 1; reader.readAsText(file);        break;
        case 'mtl': nMtl = 1; reader.readAsText(file);        break;
        case 'obj': nObj = 1; reader.readAsArrayBuffer(file); break;
        case 'fbx': nFbx = 1; reader.readAsArrayBuffer(file); break;
        case 'glb': nGlb = 1; reader.readAsArrayBuffer(file); break;
        case 'jpg': reader.readAsDataURL(file);     break;
        case 'png': reader.readAsDataURL(file);     break;
        case 'gif': reader.readAsDataURL(file);     break;
    }

    // --- Read it ------------------------
    reader.onload = (function(reader) {
        return function() {

            let fileContent = reader.result ? reader.result : '';

            let dec = new TextDecoder();

            switch (type) {
                case 'mtl':
                    // Replace quotes because they create a bug in input form
                    document.getElementById('mtlFileInput').value = fileContent.replace(/'/g, "");
                    break;
                case 'obj': document.getElementById('objFileInput').value = dec.decode(fileContent); break;
                case 'fbx':
                    document.getElementById('fbxFileInput').value = dec.decode(fileContent);
                    FbxBuffer =  fileContent;
                    break;
                case 'glb':
                    document.getElementById('glbFileInput').value = dec.decode(fileContent);
                    GlbBuffer =  fileContent;
                    break;
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
            if ( type === 'mtl' || type==='obj' || type==='jpg' || type==='png' || type==='fbx' || type==='gif' || type==='glb') {
                checkerCompleteReading( wu_webw_3d_view_local, type );
            }else if ( type==='pdb') {
                wu_webw_3d_view_local.loadMolecule(fileContent, "file_reader_cortex");
            }
        };
    })(reader);
}


function addHandlerFor3Dfiles(wu_webw_3d_view_local, multipleFilesInputElem) {

    // PREVIEW Handler (not uploaded yet): Load from selected files
    let _handleFileSelect = function ( event ) {

        let input = document.getElementById('fileUploadInput');
        let output = document.getElementById('fileList3D');
        let children = "";
        for (let i = 0; i < input.files.length; ++i) {
            children += '<li>' + input.files.item(i).name + '</li>';
        }
        output.innerHTML = '<ul>'+children+'</ul>';

        // Reset Screenshot
        document.getElementById("sshotPreviewImg").src = sshotPreviewDefaultImg;
        document.getElementById("sshotFileInput").value = "";

        // Copy because clear asset files in the following clears the total input fields also.
        // Files are blobs
        let files = {... event.target.files};

        // Clear the previously loaded and the files fields, so do not put be before files =
        //wpunity_clear_asset_files(wu_webw_3d_view_local);

        //  Read each file and put the string content in an input dom
        for ( let i = 0; i < Object.keys(files).length; i++) {

            if (files[i].name.includes('jpg')){
                nJpg ++;
            } else if (files[i].name.includes('png')){
                nPng ++;
            } else if (files[i].name.includes('gif')){
                nGif ++;
            }
        }


        //  Read each file and put the string content in an input dom
        for ( let i = 0; i < Object.keys(files).length; i++) {

            console.log(files[i]);
            file_reader_cortex(files[i], wu_webw_3d_view_local);
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
function checkerCompleteReading(wu_webw_3d_view_local, whocalls ){

    //console.log("checkerCompleteReading by", whocalls)

    let objFileContent = document.getElementById('objFileInput').value;
    let mtlFileContent = document.getElementById('mtlFileInput').value;


    if ((nObj === 1 && objFileContent !== '') || (nFbx === 1 && FbxBuffer !== '') || (nGlb === 1 && GlbBuffer !== '') ){

        // Show progress slider
        //jQuery('#previewProgressSlider').show();

        // Make the definition with the obj
        if (nObj === 1){
            let encoder = new TextEncoder();
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
                            let textFil = jQuery("input[id='textureFileInput']");

                            // Store here the raw image textures
                            objectDefinition.pathTexture = [];

                            for (let k = 0; k < textFil.length; k++){
                                let myname = textFil[k].name;

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

            // Get all fields
            let texturesStreams = jQuery("input[id='textureFileInput']");
            let nTexturesLoaded = texturesStreams.length;

            if ( nTexturesLoaded < nJpg || nTexturesLoaded < nPng || nTexturesLoaded < nGif){
                console.log("Not all textures loaded yet");
                return;
            }

            if ( nTexturesLoaded === 0 )
                texturesStreams = '';

            console.log("Ignite reading fbx");
            wu_webw_3d_view_local.loadFbxStream(FbxBuffer, texturesStreams);

        } else if (nGlb === 1){
            console.log("Ignite reading glb");

            wu_webw_3d_view_local.loadGlbStream(GlbBuffer);

        }

    }
}
//-------------------- loading from saved data --------------------------------------
function loader_asset_exists(wu_webw_3d_view_local, pathUrl = null, mtlFilename = null,
                             objFilename= null, pdbFileContent = null,
                             fbxFilename = null, glbFilename = null) {


    if (wu_webw_3d_view_local.scene != null) {
        if (wu_webw_3d_view_local.renderer)
            wu_webw_3d_view_local.clearAllAssets();
    }

    // PDB
    if (pdbFileContent) {
        console.log("Loading from existing resource","PDB");

        wu_webw_3d_view_local.loadMolecule(pdbFileContent, "loader_asset_exists");
        return;

        // GLB
    } else if (glbFilename){
        console.log("Loading from existing resource","GLB");
        //console.log("glbFilename", glbFilename);

        // Instantiate a loader
        const loader = new THREE.GLTFLoader();

        // Load a glTF resource
        loader.load(
            // resource URL
            glbFilename,
            // called when the resource is loaded
            function ( gltf ) {

                if (gltf.animations.length>0) {

                    let glbmixer = new THREE.AnimationMixer(gltf.scene);
                    wu_webw_3d_view_local.mixers.push(glbmixer);
                    let action = glbmixer.clipAction(gltf.animations[0]);

                    // Display button to start animation inside the Asset 3D previewer
                    document.getElementById("animButton1").style.display = "inline-block";

                } else {

                    // Display button to start animation inside the Asset 3D previewer
                    document.getElementById("animButton1").style.display = "none";

                }

                // ------------ Find bounding sphere ----
                var sphere = wu_webw_3d_view_local.computeSceneBoundingSphereAll(gltf.scene);

                // translate object to the center
                gltf.scene.traverse(function (object) {
                    if (object instanceof THREE.Mesh) {
                        object.geometry.translate(-sphere[0].x, -sphere[0].y, -sphere[0].z);
                    }
                });

                // Add to pivot
                wu_webw_3d_view_local.pivot.add(gltf.scene);

                // Find new zoom
                var totalradius = sphere[1];
                wu_webw_3d_view_local.controls.minDistance = 0.001 * totalradius;
                wu_webw_3d_view_local.controls.maxDistance = 13 * totalradius;

                //---------------------------------------



                //jQuery('#previewProgressSlider')[0].style.visibility = "hidden";

            },
            // called while loading is progressing
            function ( xhr ) {

                console.log( ( xhr.loaded / xhr.total * 100 ) + '% loaded' );

            },
            // called when loading has errors
            function ( error ) {

                console.log( 'An error happened', error );

            }
        );

        // OBJ load
    } else if (pathUrl) {

        console.log("Loading from existing resource","OBJ");

        let manager = new THREE.LoadingManager();

        if (objFilename) { // this means that 3D model exists for this asset

            var mtlLoader = new THREE.MTLLoader();

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
                        var sphere = wu_webw_3d_view_local.computeSceneBoundingSphereAll(object);

                        // translate object to the center
                        object.traverse(function (object) {
                            if (object instanceof THREE.Mesh) {
                                object.geometry.translate(-sphere[0].x, -sphere[0].y, -sphere[0].z);
                            }
                        });

                        // Add to pivot
                        wu_webw_3d_view_local.pivot.add(object);

                        // Find new zoom
                        var totalradius = sphere[1];
                        wu_webw_3d_view_local.controls.minDistance = 0.001 * totalradius;
                        wu_webw_3d_view_local.controls.maxDistance = 3 * totalradius;

                        //jQuery('#previewProgressSlider')[0].style.visibility = "hidden";
                    },
                    //onObjProgressLoad
                    function (xhr) {

                        //console.log(xhr);
                        document.getElementById('previewProgressLabel').innerHTML = Math.round(xhr.loaded / 1000) + "KB";
                        if (xhr.lengthComputable) {

                        }
                    },
                    //onObjErrorLoad
                    function (xhr) {
                        console.log("Error 351");
                    }
                );
            });

        } else if (fbxFilename){

            console.log("Loading from existing resource","FBX");

            // split texture string into each texture
            let url_files = textures_fbx_string_connected.split('|');

            if (url_files[0].includes('.jpg')){
                nJpg = url_files.length;
            } else if (url_files[0].includes('.png')){
                nPng = url_files.length;
            } else if (url_files[0].includes('.gif')){
                nGif = url_files.length;
            }

            // Add the fbx also
            url_files.push(pathUrl + fbxFilename);

            for (let i=0; i < url_files.length; i++) {

                let xhr = new XMLHttpRequest();
                let basename = '';

                let url = url_files[i];//.replace('http:', 'https:');


                if( url.includes(".txt") ) {

                    // We want the basename and the extension for naming the file object
                    basename = url.replace('.txt', '.fbx');
                    basename = new String(basename).substring(basename.lastIndexOf('/') + 1);

                    // Set xhr to get the url as text
                    xhr.open('GET', url, true);
                    //xhr.responseType = 'text';
                    xhr.responseType = 'arraybuffer';

                } else if (url.includes("texture") ) {

                    basename = new String(url).substring(url.lastIndexOf('/') + 1);

                    let file_extension = basename.split('.').pop();

                    let i_first_underscore = basename.indexOf('_');
                    let i_last_underscore = basename.lastIndexOf('_');
                    basename = basename.substring(i_first_underscore+1, i_last_underscore);
                    basename = basename.replace('texture_','');

                    basename = basename  + "." + file_extension;
                    xhr.open('GET', url, true);
                    xhr.responseType = 'blob';
                }

                xhr.onload = function (e) {
                    if (this.status === 200) {
                        let file = new File([this.response], basename);
                        file_reader_cortex(file, wu_webw_3d_view_local);
                    }
                };

                xhr.send();
            }

        } else {
            console.log("WARNING", "UNKNOWN 155");
        }
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




function resizeText(multiplier) {
    window.event.preventDefault();
    window.event.stopPropagation();
    window.event.stopImmediatePropagation();
    if (document.body.style.fontSize == "") {
        document.body.style.fontSize = "1.0em";
    }
    document.body.style.fontSize = parseFloat(document.body.style.fontSize) + (multiplier * 0.2) + "em";


    // document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop =
    //     (parseFloat(document.getElementsByClassName("asset3d_desc_view")[0].style.marginTop)+multiplier*10)+"px";

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
        document.getElementById("sshotPreviewImg").src = canvas.toDataURL("image/png");

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
            inputLabel.innerHTML = 'Select an a) obj, b) mtl, & c) optional texture files (jpgs or pngs)';
            input.accept = ".obj,.mtl,.jpg,.png";
        } else if (objectType === 'fbx') {
            inputLabel.innerHTML = 'Select an a) fbx & b) optional texture file (gif, jpg, png)';
            input.accept = ".fbx,.jpg,.png,.gif";
        } else if (objectType === 'glb') {
            inputLabel.innerHTML = 'Select a glb file';
            input.accept = ".glb";
        }
}

function wpunity_reset_panels(wu_webw_3d_view, whocalls) {

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

function clearList() {
    wpunity_reset_panels(wu_webw_3d_view, "me");
}




function openAccess(accessLevel) {

    var i, tabcontent, tablinks;

    // The description
    tabcontent = document.getElementsByClassName("tabcontent2");

    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // tablinks = document.getElementsByClassName("tablinks2");
    // for (i = 0; i < tablinks.length; i++) {
    //     tablinks[i].className = tablinks[i].className.replace(" active", "");
    // }

    document.getElementById(currLanguage + accessLevel).style.display = "block";

    window.event.currentTarget.className += " active";
}


function openLanguage(lang) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent2");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks2");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    currLanguage = lang;

    document.getElementById(lang).style.display = "block";

    var titLang = eval('asset_title_'+currLanguage.toLowerCase()+'_saved');

    //console.log(titLang);

    if (titLang === '')
        titLang = eval('asset_title_english_saved');

    document.getElementById("assetTitleView").innerHTML = titLang;

    window.event.currentTarget.className += " active";
}

// Start P2P conference
function startConf(){
    jQuery("#confwindow")[0].style.display="";
    jQuery("#confwindow_helper")[0].style.display="none";

    document.getElementById('iframeConf').src =
        "https://heliosvr.mklab.iti.gr:3000/call/<?php echo $assetLangPack2['asset_title_saved']; ?>";

    wpunity_notify_confpeers();
}

function set3DwindowSize(){

    // Responsive Layout (text panel vs 3D model panel
    if (window.innerWidth < window.innerHeight) {
        const initCH = document.getElementById('text-asset-sidebar').clientHeight;
        const initCH2 = document.getElementById('wrapper_3d_inner').clientHeight;

        document.getElementById('text-asset-sidebar').addEventListener('scroll', function () {
            document.getElementById("text-asset-sidebar").style.height = (initCH + this.scrollTop / 2 + 5).toString();
            document.getElementById("wrapper_3d_inner").style.height = (initCH2 - this.scrollTop / 2 + 5).toString();
            wu_webw_3d_view.resizeDisplayGL();
        });
    }

}

function generateQRcode(){

    // Generate QR Code
    const qrcode = new QRCode(
        document.getElementById("qrcode_img"), {
            text: window.location.href.replace('#','&qrcode=none#'),
            width: 128,
            height: 128,
            colorDark : "#000000",
            colorLight : "#ffffff",
            correctLevel : QRCode.CorrectLevel.H
        });

}

function screenshotHandlerSet(){

    // Screenshot handler
    if (document.getElementById("sshotPreviewImg")) {
        jQuery("#createModelScreenshotBtn").click(function () {
            wu_webw_3d_view.renderer.preserveDrawingBuffer = true;
            wpunity_create_model_sshot(wu_webw_3d_view);
        });
    }

}

function hideAdminBar(){
    // Hide admin bar of wordpress
    jQuery("#wpadminbar").hide();
    jQuery(".js no-svg").css("margin-top:0px");
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
