function addAssetToCanvas(nameModel3D, assetid, path, objPath, objID, mtlPath, mtlID,
                          categoryName, categoryID, diffImages, diffImageIDs, image1id,
                          doorName_source, doorName_target, sceneName_target, sceneID_target, archaeology_penalty,
                          hv_penalty, natural_penalty,
                          isreward, isCloned, isJoker,
                          x, y, z, r1=0, r2=0, r3=0, s=1){

    // Add javascript variables for viewing the object correctly
    var selected_object_trs = {
        "translation": [x, y, z],
        "rotation": [r1,r2,r3],
        "scale": s
    };

    resources3D[nameModel3D] = {
        "path": path,
        "assetid": assetid,
        "obj": objPath,
        "objID": objID,
        "mtl": mtlPath,
        "mtlID": mtlID,
        "categoryName": categoryName,
        "categoryID": categoryID,
        "diffImages": diffImages,
        "diffImageIDs": diffImageIDs,
        "image1id": image1id,
        "doorName_source":doorName_source,
        "doorName_target":doorName_target,
        "sceneName_target":sceneName_target,
        "sceneID_target":sceneID_target,
        "archaeology_penalty":archaeology_penalty,
        "hv_penalty":hv_penalty,
        "natural_penalty":natural_penalty,
        "isreward":isreward,
        "isCloned":isCloned,
        "isJoker":isJoker,
        "trs": selected_object_trs
    };



    // Make progress bar visible
    jQuery("#progress").get(0).style.display = "block";

    var manager = new THREE.LoadingManager();

    manager.onProgress = function (item, loaded, total) {
        //console.log( item, loaded, total );
    };

    // When all are finished loading
    manager.onLoad = function () {

        var insertedObject = envir.scene.getObjectByName(nameModel3D);

        if(!insertedObject) {
            jQuery( "#dialog-message" ).dialog( "open" );
        }

        var trs_tmp = resources3D[nameModel3D]['trs'];

        insertedObject.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        insertedObject.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        insertedObject.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);
        insertedObject.parent = envir.scene;

        // place controls to last inserted obj
        transform_controls.attach(insertedObject);

        // highlight
        envir.outlinePass.selectedObjects = [insertedObject];
        envir.renderer.setClearColor( 0xeeeeee, 1 );
        //envir.scene.add(transform_controls);

        // Position
        transform_controls.object.position.set(trs_tmp['translation'][0], trs_tmp['translation'][1], trs_tmp['translation'][2]);
        transform_controls.object.rotation.set(trs_tmp['rotation'][0], trs_tmp['rotation'][1], trs_tmp['rotation'][2]);
        transform_controls.object.scale.set(trs_tmp['scale'], trs_tmp['scale'], trs_tmp['scale']);

        selected_object_name = nameModel3D;

        // Dimensions
        var dims = findDimensions(transform_controls.object);
        var sizeT = Math.max(...dims);
        transform_controls.setSize( sizeT > 1 ? sizeT : 1 );

        jQuery("#removeAssetBtn").show();
        transform_controls.children[6].handleGizmos.XZY[0][0].visible = true;

        if (categoryName==="Producer"){

            //var plane = makeProducerPlane();

            //insertedObject.add(plane);

            var clonos = [];

            var NClones = 6;
            for (var i=0; i<NClones; i++){

                clonos[i] = new THREE.Mesh();
                clonos[i].copy(insertedObject);
                clonos[i].position.set((i+1)*100, 0, 0);
                clonos[i].children[0].material = new THREE.MeshBasicMaterial( {color: 0xffff00, transparent:true, opacity: 0.8/(i+1)});
                clonos[i].children[1].material = new THREE.MeshBasicMaterial( {color: 0xffff00, transparent:true, opacity: 0.8/(i+1)});
                clonos[i].name=  "clonosTurbine1";
            }

            for (var i=0; i<NClones; i++) {
                insertedObject.add(clonos[i]);
            }


            insertedObject.position.set(0, 100, 0);
        }




        // Add in scene
        envir.addInHierarchyViewer(insertedObject);

    };

    var extraResource = {};
    extraResource[nameModel3D] = resources3D[nameModel3D];

    var loaderMulti = new LoaderMulti();

    //console.log(extraResource);

    loaderMulti.load(manager, extraResource);
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

    transform_controls.detach(objectSelected);

    // prevent orbiting
    document.dispatchEvent(new CustomEvent("mouseup", { "detail": "Example of an event" }));

    envir.scene.remove(objectSelected);

    jQuery('#hierarchy-viewer').find('#' + nameToRemove).remove();

    transform_controls.detach();
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


