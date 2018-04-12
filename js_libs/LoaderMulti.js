/**
 * Created by DIMITRIOS on 7/3/2016.
 */
"use strict";
class LoaderMulti {

    constructor(){ };

    load(manager, resources3D) {

        for (var n in resources3D) {
            (function (name) {

                // Load Steve
                if (name == 'avatarYawObject') {

                    var mtlLoader = new THREE.MTLLoader();
                    mtlLoader.load(PLUGIN_PATH_VR+"/assets/Steve/SteveFinal.mtl", function (materials) {

                        materials.preload();

                        var objloader = new THREE.OBJLoader();
                        objloader.setMaterials(materials);

                        objloader.load(PLUGIN_PATH_VR+'/assets/Steve/SteveFinal.obj', 'after',
                            function (object) {

                                // object.traverse(function (node) {
                                //     if (node.material)
                                //         node.material.side = THREE.DoubleSide;
                                // });

                                object.name = "Steve";

                                object.children[0].name = "SteveMesh";

                                // Make a shield around Steve
                                var geometry = new THREE.BoxGeometry( 4.2, 4.2, 4.2);
                                geometry.name = "SteveShieldGeometry";
                                var material = new THREE.MeshBasicMaterial( {color: 0xaaaaaa, transparent:true, opacity:0.2, visible:false} );

                                var steveShieldMesh = new THREE.Mesh( geometry, material );
                                steveShieldMesh.name = 'SteveShieldMesh';
                                //--------------------------



                                object.add(steveShieldMesh);

                                envir.scene.add(object);
                                envir.setSteveToAvatarControls();
                                envir.setSteveWorldPosition(resources3D[name]['trs']['translation'][0],
                                                            resources3D[name]['trs']['translation'][1],
                                                            resources3D[name]['trs']['translation'][2],
                                                            resources3D[name]['trs']['rotation'][0],
                                                            resources3D[name]['trs']['rotation'][1]
                                                            );

                                if (Object.keys(resources3D).length == 1){ // empty scene (only Steve is there)
                                    jQuery("#scene_loading_message").get(0).innerHTML = "Loading completed";
                                    jQuery("#scene_loading_bar").get(0).style.width = 0 + "px";
                                }



                            }
                        );
                    });

                }else {
                    var mtlLoader = new THREE.MTLLoader();

                    mtlLoader.setPath(resources3D[name]['path']);

                    mtlLoader.load(resources3D[name]['mtl'], function (materials) {

                        materials.preload();


                        var objLoader = new THREE.OBJLoader(manager);
                        objLoader.setMaterials(materials);
                        objLoader.setPath( resources3D[name]['path']);

                        objLoader.load(resources3D[name]['obj'], 'after',

                            // OnObjLoad
                            function (object) {
                                object.traverse(function (node) {

                                    if (node.material) {
                                        if (node.material.name){
                                            if (node.material.name.includes("Transparent")) {
                                                node.material.transparent = true;
                                                node.material.alphaTest = 0.5; // This is very important to make transparency behind transparency to work
                                            }
                                        }
                                    }

                                    if (node instanceof THREE.Mesh) {
                                        node.isDigiArt3DMesh = true;

                                    }
                                });

                                object.isDigiArt3DModel = true;
                                object.name = name;
                                object.assetid = resources3D[name]['assetid'];

                                object.fnPath = resources3D[name]['path'];

                                // avoid revealing the full path. Use the relative in the saving format.
                                object.fnPath = object.fnPath.substring( object.fnPath.indexOf('uploads/') + 7);

                                object.fnObj = resources3D[name]['obj'];
                                object.fnObjID = resources3D[name]['objID'];
                                object.fnMtl = resources3D[name]['mtl'];
                                object.fnMtlID = resources3D[name]['mtlID'];


                                object.categoryID = resources3D[name]['categoryID'];
                                object.categoryName = resources3D[name]['categoryName'];



                                object.diffImages = resources3D[name]['diffImages'];
                                object.diffImageIDs = resources3D[name]['diffImageIDs'];

                                object.image1id = resources3D[name]['image1id'];


                                object.doorName_source = resources3D[name]['doorName_source'];
                                object.doorName_target = resources3D[name]['doorName_target'];
                                object.sceneName_target = resources3D[name]['sceneName_target'];
                                object.isreward = resources3D[name]['isreward'];
                                object.isCloned = resources3D[name]['isCloned'];



                                object.type_behavior = resources3D[name]['type_behavior'];


                                envir.scene.add(object);
                            },

                            //onObjProgressLoad
                            function (xhr) {

                                if (xhr.lengthComputable) {

                                    var bar = jQuery("#progressbar").get(0).offsetWidth;

                                    //var total = progress.totalModels + progress.totalTextures,
                                    //var loaded = progress.loadedModels + progress.loadedTextures;

                                    bar = Math.floor(bar * xhr.loaded / xhr.total);

                                    jQuery("#scene_loading_bar").get(0).style.width = bar + "px";
                                    var downloadedBytes = "Downloaded: " + xhr.loaded + " / " + xhr.total + ' bytes';

                                    jQuery(".result").get(0).innerHTML = downloadedBytes;
                                    // console.log(Math.round(percentComplete, 2) + '% downloaded');


                                    if (xhr.loaded == xhr.total) {

                                        jQuery("#scene_loading_message").get(0).innerHTML = "Loading completed";
                                        jQuery("#scene_loading_bar").get(0).style.width = 0 + "px";
                                        //jQuery("#message").get(0).style.display = "none";
                                        //jQuery("#progressbar").get(0).style.display = "none";
                                    }
                                }
                            },

                            //onObjErrorLoad
                            function (xhr) {
                            }
                        );

                    });
                }
            })(n);
        }
    }



}