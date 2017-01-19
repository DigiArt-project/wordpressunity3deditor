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

                        objloader.load(PLUGIN_PATH_VR+'/assets/Steve/SteveFinal.obj',
                            function (object) {

                                //object.traverse(function (node) {
                                //    if (node.material)
                                //        node.material.side = THREE.DoubleSide;
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
                                                            resources3D[name]['trs']['rotation'][1]
                                                            )

                                if (Object.keys(resources3D).length == 1){ // empty scene (only Steve is there)
                                    $("#message").get(0).innerHTML = "Loading completed";
                                    $("#bar").get(0).style.width = 0 + "px";
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
                        objLoader.load(resources3D[name]['obj'],

                            // OnObjLoad
                            function (object) {
                                object.traverse(function (node) {

                                    //if (node.material)
                                    //    node.material.side = THREE.DoubleSide;

                                    if (node instanceof THREE.Mesh)
                                        node.isDigiArt3DMesh = true;
                                });

                                object.isDigiArt3DModel = true;
                                object.name = name;

                                object.fnPath = resources3D[name]['path'];

                                // avoid revealing the full path. Use the relative in the saving format.
                                object.fnPath = object.fnPath.substring( object.fnPath.indexOf('uploads/') + 7);

                                object.fnObj = resources3D[name]['obj'];
                                object.fnMtl = resources3D[name]['mtl'];

                                object.fnFbx = resources3D[name]['obj'].slice(0,-4) + '.fbx';
                                object.fnMat = resources3D[name]['obj'].slice(0,-4) + '.mat';

                                object.guid_fbx = resources3D[name]['guid_fbx'];
                                object.guid_mat = resources3D[name]['guid_mat'];

                                envir.scene.add(object);
                            },


                            //onObjProgressLoad
                            function (xhr) {

                                if (xhr.lengthComputable) {

                                    var bar = $("#progressbar").get(0).offsetWidth;

                                    //var total = progress.totalModels + progress.totalTextures,
                                    //var loaded = progress.loadedModels + progress.loadedTextures;

                                    bar = Math.floor(bar * xhr.loaded / xhr.total);

                                    $("#bar").get(0).style.width = bar + "px";
                                    var downloadedBytes = "Downloaded: " + xhr.loaded + " / " + xhr.total + ' bytes';

                                    $(".result").get(0).innerHTML = downloadedBytes;
                                    // console.log(Math.round(percentComplete, 2) + '% downloaded');

                                    if (xhr.loaded == xhr.total) {
                                        $("#message").get(0).innerHTML = "Loading completed";
                                        $("#bar").get(0).style.width = 0 + "px";
                                        //$("#message").get(0).style.display = "none";
                                        //$("#progressbar").get(0).style.display = "none";
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