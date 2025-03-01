function addAssetToCanvas(nameModel, path, objFname, mtlFname, categoryName, dataDrag, translation, pluginPath){

    // Add javascript variables for viewing the object correctly
    let selected_object_trs = {
        "translation": [translation[0], translation[1], translation[2]],
        "rotation": [0,0,0],
        "scale": 1
    };

    resources3D[nameModel] = {
        "path": path,
        "assetid": dataDrag.assetid,
        "assetname":dataDrag.assetname,
        "obj": objFname,
        "objID": dataDrag.objID,
        "mtl": mtlFname,
        "mtlID": dataDrag.mtlID,
        "fbxID": dataDrag.fbxID,
        "audioID": dataDrag.audioID,
        "categoryName": dataDrag.categoryName,
        "categoryDescription": dataDrag.categoryDescription,
        "categoryIcon": dataDrag.categoryIcon,
        "categoryID": dataDrag.categoryID,
        "image1id": dataDrag.image1id,
        "doorName_source":dataDrag.doorName_source,
        "doorName_target":dataDrag.doorName_target,
        "sceneName_target":dataDrag.sceneName_target,
        "sceneID_target":dataDrag.sceneID_target,
        "archaeology_penalty":dataDrag.archaeology_penalty,
        "hv_penalty":dataDrag.hv_penalty,
        "natural_penalty":dataDrag.natural_penalty,
        "isreward":dataDrag.isreward,
        "isCloned":dataDrag.isCloned,
        "isJoker":dataDrag.isJoker,
        "trs": selected_object_trs
    };

    if (categoryName==='lightSun') {

        var lightSun = new THREE.DirectionalLight(0xffffff, 1); //  new THREE.PointLight( 0xC0C090, 0.4, 1000, 0.01 );
        lightSun.castShadow = true;
        // lightSun.position.set( 0, 45, 0 ); set by raycaster

        lightSun.name = nameModel;
        lightSun.isDigiArt3DModel = true;
        lightSun.categoryName = "lightSun";
        lightSun.isLight = true;

        //// Add Sun Helper
        var sunSphere = new THREE.Mesh(
            new THREE.SphereBufferGeometry(1, 16, 8),
            new THREE.MeshBasicMaterial({color: 0xffff00})
        );
        sunSphere.isDigiArt3DMesh = true;
        sunSphere.name = "SunSphere";
        lightSun.add(sunSphere);
        // end of sphere

        // Helper
        var lightSunHelper = new THREE.DirectionalLightHelper(lightSun, 3, 0x555500);
        lightSunHelper.isLightHelper = true;
        lightSunHelper.name = 'lightHelper_' + lightSun.name;
        lightSunHelper.categoryName = 'lightHelper';
        lightSunHelper.parentLightName = lightSun.name;

        // Target spot: Where Sun points
        var lightTargetSpot = new THREE.Object3D();

        lightTargetSpot.add(new THREE.Mesh(
            new THREE.SphereBufferGeometry(0.5, 16, 8),
            new THREE.MeshBasicMaterial({color: 0xffaa00})
        ));

        lightTargetSpot.isDigiArt3DMesh = true;
        lightTargetSpot.name = "lightTargetSpot_" + lightSun.name;
        lightTargetSpot.categoryName = "lightTargetSpot";
        lightTargetSpot.isLightTargetSpot = true;
        lightTargetSpot.isLight = false;
        lightTargetSpot.position = new THREE.Vector3(0, 0, 0);
        lightTargetSpot.parentLight = lightSun;
        lightTargetSpot.parentLightHelper = lightSunHelper;

        lightSun.target.position = lightTargetSpot.position;

        envir.scene.add(lightSun);
        envir.scene.add(lightSunHelper);
        envir.scene.add(lightTargetSpot);

        lightSun.target.updateMatrixWorld();
        lightSunHelper.update();

        var lightSunShadowhelper = new THREE.CameraHelper( lightSun.shadow.camera );
        envir.scene.add( lightSunShadowhelper );

        // Add transform controls
        var insertedObject = envir.scene.getObjectByName(nameModel);
        var trs_tmp = resources3D[nameModel]['trs'];

        trs_tmp['translation'][1] += 3; // Sun should be a little higher than objects;

        insertedObject.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        insertedObject.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        insertedObject.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        insertedObject.parent = envir.scene;

        // place controls to last inserted obj
        transform_controls.attach(insertedObject);

        // highlight
        envir.outlinePass.selectedObjects = [insertedObject];
        envir.renderer.setClearColor(0xeeeeee, 1);
        //envir.scene.add(transform_controls);

        // Position
        transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

        selected_object_name = nameModel;

        // Dimensions
        var dims = findDimensions(transform_controls.object);
        var sizeT = Math.max(...dims);
        transform_controls.setSize(sizeT > 1 ? sizeT : 1);

        jQuery("#removeAssetBtn").show();
        transform_controls.children[6].handleGizmos.XZY[0][0].visible = true; // DELETE GIZMO


        transform_controls.children[6].children[0].children[1].visible = false; // ROTATE GIZMO


        // Add in scene
        envir.addInHierarchyViewer(insertedObject);

        envir.addInHierarchyViewer(lightTargetSpot);


        // Auto-save
        triggerAutoSave();



    } else if (categoryName==='lightLamp') {

        var lightLamp = new THREE.PointLight( 0xffffff, 1, 100, 2 );
        lightLamp.power = 1;

        lightLamp.name = nameModel;
        lightLamp.isDigiArt3DModel = true;
        lightLamp.categoryName = "lightLamp";
        lightLamp.isLight = true;

        //// Add Lamp Helper
        var lampSphere = new THREE.Mesh(
            new THREE.SphereBufferGeometry(0.5, 16, 8),
            new THREE.MeshBasicMaterial({color: 0xffff00})
        );
        lampSphere.isDigiArt3DMesh = true;
        lampSphere.name = "LampSphere";
        lightLamp.add(lampSphere);
        // end of sphere

        // Helper
        var lightLampHelper = new THREE.PointLightHelper(lightLamp, 1, 0x555500);
        lightLampHelper.isLightHelper = true;
        lightLampHelper.name = 'lightHelper_' + lightLamp.name;
        lightLampHelper.categoryName = 'lightHelper';
        lightLampHelper.parentLightName = lightLamp.name;

        envir.scene.add(lightLamp);
        envir.scene.add(lightLampHelper);

        lightLampHelper.update();

        // Add transform controls
        var insertedObject = envir.scene.getObjectByName(nameModel);
        var trs_tmp = resources3D[nameModel]['trs'];

        trs_tmp['translation'][1] += 3; // Sun should be a little higher than objects;

        insertedObject.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        insertedObject.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        insertedObject.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        insertedObject.parent = envir.scene;

        // place controls to last inserted obj
        transform_controls.attach(insertedObject);

        // highlight
        envir.outlinePass.selectedObjects = [insertedObject];
        envir.renderer.setClearColor(0xeeeeee, 1);
        //envir.scene.add(transform_controls);

        // Position
        transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

        selected_object_name = nameModel;

        // Dimensions
        var dims = findDimensions(transform_controls.object);
        var sizeT = Math.max(...dims);
        transform_controls.setSize(sizeT > 1 ? sizeT : 1);

        jQuery("#removeAssetBtn").show();
        transform_controls.children[6].handleGizmos.XZY[0][0].visible = true; // DELETE GIZMO

        transform_controls.children[6].children[0].children[1].visible = false; // ROTATE GIZMO

        // Add in scene
        envir.addInHierarchyViewer(insertedObject);

        triggerAutoSave();

    } else if (categoryName==='lightSpot') {

        var lightSpot = new THREE.SpotLight( 0xffffff, 1, 5, 0.39, 0, 2 );
        lightSpot.power = 1;

        lightSpot.name = nameModel;
        lightSpot.isDigiArt3DModel = true;
        lightSpot.categoryName = "lightSpot";
        lightSpot.isLight = true;

        //// Add Lamp Helper
        var lampSphere = new THREE.Mesh(
            new THREE.SphereBufferGeometry( 1, 16, 8 ), //new THREE.ConeBufferGeometry(0.5, 1, 16, 8),
            new THREE.MeshBasicMaterial({color: 0xffff00})
        );
        lampSphere.rotation.set(Math.PI/2, 0, 0);

        lampSphere.isDigiArt3DMesh = true;
        lampSphere.name = "LampSphere";

        lightSpot.add(lampSphere);

        // end of sphere

        // Helper
        var lightSpotHelper = new THREE.SpotLightHelper(lightSpot, 0x555500);
        lightSpotHelper.isLightHelper = true;
        lightSpotHelper.name = 'lightHelper_' + lightSpot.name;
        lightSpotHelper.categoryName = 'lightHelper';
        lightSpotHelper.parentLightName = lightSpot.name;



        envir.scene.add(lightSpot);
        envir.scene.add(lightSpotHelper);


        lightSpotHelper.update();


        // Add transform controls
        var insertedObject = envir.scene.getObjectByName(nameModel);
        var trs_tmp = resources3D[nameModel]['trs'];

        trs_tmp['translation'][1] += 3; // Sun should be a little higher than objects;

        insertedObject.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        insertedObject.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        insertedObject.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        insertedObject.parent = envir.scene;

        // place controls to last inserted obj
        transform_controls.attach(insertedObject);

        // highlight
        envir.outlinePass.selectedObjects = [insertedObject];
        envir.renderer.setClearColor(0xeeeeee, 1);
        //envir.scene.add(transform_controls);

        // Position
        transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

        selected_object_name = nameModel;

        // Dimensions
        var dims = findDimensions(transform_controls.object);
        var sizeT = Math.max(...dims);
        transform_controls.setSize(sizeT > 1 ? sizeT : 1);

        jQuery("#removeAssetBtn").show();
        transform_controls.children[6].handleGizmos.XZY[0][0].visible = true; // DELETE GIZMO

        transform_controls.children[6].children[0].children[1].visible = false; // ROTATE GIZMO

        // Add in scene
        envir.addInHierarchyViewer(insertedObject);

        triggerAutoSave();


    } else {

        // Make progress bar visible
        jQuery("#progress").get(0).style.display = "block";

        var manager = new THREE.LoadingManager();

        jQuery("#progressWrapper").get(0).style.visibility = "visible";
        document.getElementById("result_download").innerHTML = "Loading";

        manager.onProgress = function (item, loaded, total) {
            //console.log( item, loaded, total );

            document.getElementById("result_download").innerHTML = "Loading";
        };

        // When all are finished loading
        manager.onLoad = function () {

            jQuery("#progressWrapper").get(0).style.visibility = "hidden";

            var insertedObject = envir.scene.getObjectByName(nameModel);

            if (!insertedObject) {
                jQuery("#dialog-message").dialog("open");
            }

            var trs_tmp = resources3D[nameModel]['trs'];

            insertedObject.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            insertedObject.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            insertedObject.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
            insertedObject.parent = envir.scene;

            // place controls to last inserted obj
            transform_controls.attach(insertedObject);

            // highlight
            envir.composer = [];
            envir.setComposer();

            envir.outlinePass.selectedObjects = [insertedObject];
            envir.renderer.setClearColor(0xeeeeee, 1);

            //envir.scene.add(transform_controls);

            // Position
            transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
            transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
            transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

            selected_object_name = nameModel;

            // Dimensions
            var dims = findDimensions(transform_controls.object);

            console.log(dims);


            var sizeT = Math.max(...dims);
            transform_controls.setSize(sizeT > 1 ? sizeT : 1);

            jQuery("#removeAssetBtn").show();
            transform_controls.children[6].handleGizmos.XZY[0][0].visible = true;

            if (categoryName === "Producer") {

                //var plane = makeProducerPlane();

                //insertedObject.add(plane);

                var clonos = [];

                var NClones = 6;
                for (var i = 0; i < NClones; i++) {

                    clonos[i] = new THREE.Mesh();
                    clonos[i].copy(insertedObject);
                    clonos[i].position.set((i + 1) * 100, 0, 0);
                    clonos[i].children[0].material = new THREE.MeshBasicMaterial({
                        color: 0xffff00,
                        transparent: true,
                        opacity: 0.8 / (i + 1)
                    });
                    clonos[i].children[1].material = new THREE.MeshBasicMaterial({
                        color: 0xffff00,
                        transparent: true,
                        opacity: 0.8 / (i + 1)
                    });
                    clonos[i].name = "clonosTurbine1";
                }

                for (var i = 0; i < NClones; i++) {
                    insertedObject.add(clonos[i]);
                }


                insertedObject.position.set(0, 100, 0);
            }

            // Add in scene
            envir.addInHierarchyViewer(insertedObject);



            // Auto-save
            triggerAutoSave();


        };

        var extraResource = {};
        extraResource[nameModel] = resources3D[nameModel];

        let loaderMulti = new LoaderMulti();
        loaderMulti.load(manager, extraResource, pluginPath);


        envir.composer = [];
        envir.setComposer();

    }
}


/**
 *   Reset object in scene
 */
function resetInScene(name){

    if (game_type!="energy")
        envir.avatarControls.getObject().position.set(0,1.3,0);
    else
        envir.avatarControls.getObject().position.set(0,200,500);


    envir.avatarControls.getObject().quaternion.set(0,0,0,1);
    envir.avatarControls.getObject().children[0].rotation.set(0,0,0);

}

/**
 *
 * Delete from scene
 *
 * @param nameToRemove
 */
function deleterFomScene(nameToRemove){

    var container = document.paramsform;

    // Delete Variables
    //delArchive[nameToRemove] = resources3D[nameToRemove];
    delete resources3D[nameToRemove];

    // Remove from scene and add to recycle bin
    var objectSelected = envir.scene.getObjectByName(nameToRemove);

    // remove animations
    isPaused = true;
    let filtered = envir.animationMixers.filter(function (el) {
        return el._root.name !== nameToRemove;
    });
    envir.animationMixers = filtered;
    isPaused = false;


    // If deleting light then remove also its LightHelper and lightTargetSpot
    if (objectSelected.isLight){
        for (var i=0; i< envir.scene.children.length; i++){
            // Light Helper check
            if (envir.scene.children[i].parentLightName === nameToRemove){
                envir.scene.remove(envir.scene.children[i]);
            }
            // Target spot check
            if (typeof envir.scene.children[i].parentLight !== 'undefined')
            {
                if (envir.scene.children[i].parentLight.name === nameToRemove) {
                    envir.scene.remove(envir.scene.children[i]);
                    console.log("nameToRemove", nameToRemove);
                    // remove from hierarchy also
                    jQuery('#hierarchy-viewer').find('#' + "lightTargetSpot_" + nameToRemove).remove();
                }
            }
        }
    }

    transform_controls.detach(objectSelected);

    // prevent orbiting
    document.dispatchEvent(new CustomEvent("mouseup", { "detail": "Example of an event" }));

    envir.scene.remove(objectSelected);

    jQuery('#hierarchy-viewer').find('#' + nameToRemove).remove();


    //transform_controls.detach();


    triggerAutoSave();

    // Only Player exists then hide delete button (single one)
    if(envir.scene.children.length==5)
        jQuery("#removeAssetBtn").hide();
    else {


        let lastObject = envir.scene.children[envir.scene.children.length - 2];

        // place controls to last inserted obj
        transform_controls.attach(lastObject);



        envir.outlinePass.selectedObjects = [lastObject];
        envir.renderer.setClearColor(0xeeeeee, 1);


        // highlight
        envir.composer = [];
        envir.setComposer();
    }
}


function unixTimestamp_to_time( tStr){

    var unix_timestamp = parseInt(tStr);

    var date = new Date(unix_timestamp*1000);
    var hours = date.getHours();
    var minutes = "0" + date.getMinutes();
    var seconds = "0" + date.getSeconds();
    var formattedTime = hours + ':' + minutes.substr(-2) + ':' + seconds.substr(-2);

    return date.getDate() + '/' + date.getMonth() + '/' + date.getFullYear() + ' ' + formattedTime;
}

function makeProducerPlane(){

    var geometry = new THREE.Geometry();

    geometry.vertices.push(
        new THREE.Vector3( -50,  -50,  50 ),
        new THREE.Vector3( -50,  -50, -50 ),
        new THREE.Vector3(  50,  -50,  50 ),
        new THREE.Vector3(  50,  -50, -50 ),
    );

    geometry.faces.push( new THREE.Face3( 0, 1, 2 ) );
    geometry.faces.push( new THREE.Face3( 1, 2, 3 ) );


    var material = new THREE.MeshBasicMaterial( {color: 0xffff00, side: THREE.DoubleSide, opacity: 0.5});
    material.opacity = 0.2;
    var plane = new THREE.Mesh( geometry, material );

    return plane;

}

// /**
//  *    ----------- Check for Recycle Bin Drag ----------------------------
//  */
// function checkForRecycle(){
//
//     var raycasterRecycleBin = new THREE.Raycaster();
//     var mouseDrag = new THREE.Vector2();
//
//     // handle scrolling of window
//     var offtop = envir.container_3D_all.getBoundingClientRect().top;
//     var offleft =envir.container_3D_all.getBoundingClientRect().left;
//
//     // translate into -1 to 1 values
//     mouseDrag.x =   ( (event.clientX - offleft)  / envir.container_3D_all.clientWidth ) * 2 - 1;
//     mouseDrag.y = - ( (event.clientY - offtop) / envir.container_3D_all.clientHeight ) * 2 + 1;
//
//     // calculate objects intersecting the picking ray
//     raycasterRecycleBin.setFromCamera( mouseDrag, envir.cameraOrbit );
//
//     var intersects = raycasterRecycleBin.intersectObjects( [envir.cameraOrbit.children[0]], false );
//
//     if(intersects.length>0)
//         putInRecyleBin(transform_controls.object.name);
// }
//
// /**
//  *
//  * -- Put in recycle bin --
//  *
//  * @param nameToRemove
//  */
// function putInRecyleBin(nameToRemove){
//
//     var container = document.paramsform;
//
//     // Delete Variables
//     delArchive[nameToRemove] = resources3D[nameToRemove];
//     delete resources3D[nameToRemove];
//
//     // Remove from scene and add to recycle bin
//     var objectSelected = envir.scene.getObjectByName(nameToRemove);
//
//     transform_controls.detach(objectSelected);
//
//     // prevent orbiting
//     document.dispatchEvent(new CustomEvent("mouseup", { "detail": "Example of an event" }));
//
//     envir.scene.remove(objectSelected);
//     objectSelected.position.set(0,0,0);
//
//     var bbox = new THREE.Box3().setFromObject(objectSelected);
//
//     var scale_factor_x = 2/(bbox.max.x - bbox.min.x);
//     var scale_factor_y = 2/(bbox.max.y - bbox.min.y);
//     var scale_factor_z = 2/(bbox.max.z - bbox.min.z);
//
//     if (scale_factor_x > 1000)
//         scale_factor_x = 1;
//
//     if (scale_factor_y > 1000)
//         scale_factor_y = 1;
//
//     if (scale_factor_z > 1000)
//         scale_factor_z = 1;
//
//
//     objectSelected.scale.set(scale_factor_x, scale_factor_y, scale_factor_z);
//     objectSelected.isInRecycleBin = true;
//
//     // Removed items are added to the cameraOrbit ??? Find something better
//     envir.cameraOrbit.children[0].add(objectSelected);
//
//     // Make trs box visible - invisible
//     //if (obj_ARR.length > 0) {
//     //    transform_controls.attach(obj_ARR[0]);
//     //    transform_controls.traverse(function(node){if(node.name=='trs_modeChanger') node.visible=true});
//     //}else
//     //    transform_controls.traverse(function(node){if(node.name=='trs_modeChanger') node.visible=false});
//
// }
//
//
// /**
//  * Expand items from recycle bin
//  *
//  */
// function enlistDeletedObjects(){
//
//     for(var i=0; i < envir.cameraOrbit.children[0].children.length; i++){
//         if (envir.cameraOrbit.children[0].children[i] instanceof THREE.Group){
//             var recycledItem = envir.cameraOrbit.children[0].children[i];
//             recycledItem.position.set(0, (i+1)*4, 0);
//             recycledItem.isInRecycleBin = true;
//         }
//     }
//
//     isRecycleBinDeployed = true;
// }
//
// /**
//  *   Collapse items in recycle bin
//  *
//  */
// function delistDeletedObjects(){
//
//     for(var i=0; i < envir.cameraOrbit.children[0].children.length; i++){
//         if (envir.cameraOrbit.children[0].children[i] instanceof THREE.Group){
//             var recycledItem = envir.cameraOrbit.children[0].children[i];
//             recycledItem.position.set(0,0,0);
//             recycledItem.isInRecycleBin = true;
//         }
//     }
//
//     isRecycleBinDeployed = false;
// }


