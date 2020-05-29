/**
 * Created by DIMITRIOS on 7/3/2016.
 */
"use strict";
class LoaderMulti {

    constructor(){ };

    load(manager, resources3D) {



        for (var n in resources3D) {
            (function (name) {

                var mtlLoader = new THREE.MTLLoader();

                // Load Steve
                if (name == 'avatarYawObject') {
                    //mtlLoader.setPath(PLUGIN_PATH_VR+"/assets/Steve/");
                    // STEVE is the CAMERA MESH

                    mtlLoader.load(PLUGIN_PATH_VR + "/assets/Steve/SteveFinal.mtl", function (materials) {

                        materials.preload();

                        var objloader = new THREE.OBJLoader(manager);
                        objloader.setMaterials(materials);

                        objloader.load(PLUGIN_PATH_VR + '/assets/Steve/SteveFinal.obj', 'after',
                            function (object) {

                                // object.traverse(function (node) {
                                //     if (node.material)
                                //         node.material.side = THREE.DoubleSide;
                                // });

                                object.name = "Steve";

                                object.children[0].name = "SteveMesh";

                                // Make a shield around Steve
                                var geometry = new THREE.BoxGeometry(4.2, 4.2, 4.2);
                                geometry.name = "SteveShieldGeometry";
                                var material = new THREE.MeshBasicMaterial({
                                    color: 0xaaaaaa,
                                    transparent: true,
                                    opacity: 0.2,
                                    visible: false
                                });

                                var steveShieldMesh = new THREE.Mesh(geometry, material);
                                steveShieldMesh.name = 'SteveShieldMesh';
                                //--------------------------

                                object.add(steveShieldMesh);

                                object.renderOrder = 1;

                                envir.scene.add(object);
                                envir.setSteveToAvatarControls();
                                envir.setSteveWorldPosition(resources3D[name]['trs']['translation'][0],
                                    resources3D[name]['trs']['translation'][1],
                                    resources3D[name]['trs']['translation'][2],
                                    resources3D[name]['trs']['rotation'][0],
                                    resources3D[name]['trs']['rotation'][1]
                                );

                                // if (Object.keys(resources3D).length == 1){ // empty scene (only Steve is there)
                                //     jQuery("#scene_loading_message").get(0).innerHTML = "Loading completed";
                                //     jQuery("#scene_loading_bar").get(0).style.width = 0 + "px";
                                // }


                            }
                        );
                    });


                    // STEVE OLD IS THE HUMAN MESH

                    mtlLoader.load(PLUGIN_PATH_VR + "/assets/Steve/SteveFinalOld.mtl", function (materials) {

                        materials.preload();

                        var objloader = new THREE.OBJLoader(manager);
                        objloader.setMaterials(materials);

                        objloader.load(PLUGIN_PATH_VR + '/assets/Steve/SteveFinalOld.obj', 'after',
                            function (object) {

                                object.name = "SteveOld";
                                object.children[0].name = "SteveMeshOld";
                                object.renderOrder = 1;
                                object.visible = false;

                                envir.scene.add(object);

                                envir.setSteveOldToAvatarControls();


                                envir.setSteveWorldPosition(resources3D[name]['trs']['translation'][0],
                                    resources3D[name]['trs']['translation'][1],
                                    resources3D[name]['trs']['translation'][2],
                                    resources3D[name]['trs']['rotation'][0],
                                    resources3D[name]['trs']['rotation'][1]
                                );

                                // if (Object.keys(resources3D).length == 1){ // empty scene (only Steve is there)
                                //     jQuery("#scene_loading_message").get(0).innerHTML = "Loading completed";
                                //     jQuery("#scene_loading_bar").get(0).style.width = 0 + "px";
                                // }


                            }
                        );
                    });

                }else if (resources3D[name]['isLight']==='true'){

                        var lightSun = new THREE.DirectionalLight( 0xffffff, 5 ); //  new THREE.PointLight( 0xC0C090, 0.4, 1000, 0.01 );

                    // REM HERE
                    lightSun.position.set(
                            resources3D[name]['trs']['translation'][0],
                            resources3D[name]['trs']['translation'][1],
                            resources3D[name]['trs']['translation'][2] );

                    lightSun.rotation.set(
                        resources3D[name]['trs']['rotation'][0],
                        resources3D[name]['trs']['rotation'][1],
                        resources3D[name]['trs']['rotation'][2] );

                    lightSun.scale.set( resources3D[name]['trs']['scale'],
                        resources3D[name]['trs']['scale'],
                        resources3D[name]['trs']['scale']);


                        lightSun.target.position.set(0, 0, 5); // where it points
                        lightSun.name = "mylightSun_1590660685";
                        lightSun.isDigiArt3DModel = true;
                        lightSun.isLight = true;

                        //// Add Sun Helper
                        var sunSphere = new THREE.Mesh(
                            new THREE.SphereBufferGeometry( 1, 16, 8 ),
                            new THREE.MeshBasicMaterial( { color: 0xffff00 } )
                        );
                        sunSphere.isDigiArt3DMesh = true;
                        sunSphere.name = "SunSphere";
                        lightSun.add(sunSphere);
                        // end of sphere

                        envir.scene.add(lightSun);
                        lightSun.target.updateMatrixWorld();

                }else {


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


                                        if (node.name.includes("renderOrder")) {

                                            var iR = node.name.indexOf("renderOrder");

                                            node.renderOrder = parseInt(node.name.substring(iR + 12, iR + 15));


                                        }

                                    }
                                });



                                object.isDigiArt3DModel = true;
                                object.isLight = resources3D[name]['isLight'];
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
                                object.sceneID_target = resources3D[name]['sceneID_target'];

                                object.archaeology_penalty = resources3D[name]['archaeology_penalty'];
                                object.hv_penalty = resources3D[name]['hv_penalty'];
                                object.natural_penalty = resources3D[name]['natural_penalty'];

                                object.isreward = resources3D[name]['isreward'];
                                object.isCloned = resources3D[name]['isCloned'];

                                object.type_behavior = resources3D[name]['type_behavior'];

                                // REM HERE
                                object.position.set(
                                    resources3D[name]['trs']['translation'][0],
                                    resources3D[name]['trs']['translation'][1],
                                    resources3D[name]['trs']['translation'][2] );

                                object.rotation.set(
                                    resources3D[name]['trs']['rotation'][0],
                                    resources3D[name]['trs']['rotation'][1],
                                    resources3D[name]['trs']['rotation'][2] );

                                object.scale.set( resources3D[name]['trs']['scale'],
                                                   resources3D[name]['trs']['scale'],
                                                   resources3D[name]['trs']['scale']);


                                envir.scene.add(object);


                                //jQuery("#infophp").get(0).style.visibility= "hidden";
                            },

                            //onObjProgressLoad
                            function (xhr) {

                                    var downloadedBytes = name.substring(0,name.length-11) + " downloaded " + Math.floor(xhr.loaded / 104857.6)/10 + ' Mb';

                                    document.getElementById("result_download2").innerHTML = downloadedBytes;
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
