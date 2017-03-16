/**
 * Created by jimve on 15-Feb-17.
 */

//----------------------------------------------------------------------------------
//  AJAX: FETCH DIR CONTENT
//----------------------------------------------------------------------------------
function wpunity_fetchSceneAssetsAjax(gamefolder, scenefolder, sceneID){

    jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'GET',
        data : {'action': 'wpunity_fetch_scene_assets_by_db_action',
                //'action': 'wpunity_fetch_scene_assets_by_dir_action',
                'gamefolder':gamefolder,
                'scenefolder':scenefolder,
                'sceneID':sceneID},

        success : function(data) {

            //console.log("datatttt", data);
            file_Browsing_By_DB(data);
            //file_Browsing_By_Dirs(data);

        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR 51" + thrownError);

        }
    });
}

//======================================================================
//  ____                               _             _____  ____
// |  _ \                             | |           |  __ \|  _ \
// | |_) |_ __ _____      _____  ___  | |__  _   _  | |  | | |_) |
// |  _ <| '__/ _ \ \ /\ / / __|/ _ \ | '_ \| | | | | |  | |  _ <
// | |_) | | | (_) \ V  V /\__ \  __/ | |_) | |_| | | |__| | |_) |
// |____/|_|  \___/ \_/\_/ |___/\___| |_.__/ \__, | |_____/|____/
//                                           __/ |
//                                          |___/
// The DB way is the correct one. The old dir way was vulnerable to bugs
//======================================================================
function file_Browsing_By_DB(data){



    var filemanager = $('.filemanager'),
        breadcrumbs = $('.breadcrumbs'),
        fileList = filemanager.find('.data'),
        closeButton = $('.bt_close_file_toolbar');

    var response = [data],
        currentPath = '',
        breadcrumbsUrls = [];

    var folders = [],
        files = [];

    // This event listener monitors changes on the URL. We use it to
    // capture back/forward navigation in the browser.

    $(window).on('hashchange', function(){

        goto(window.location.hash);


        // We are triggering the event. This will execute
        // this function on page load, so that we show the correct folder:

    }).trigger('hashchange');


    // Hiding and showing the search box

    filemanager.find('.search').click(function(){

        var search = $(this);

        search.find('span').hide();
        search.find('input[type=search]').show().focus();

    });


    // Listening for keyboard input on the search field.
    // We are using the "input" event which detects cut and paste
    // in addition to keyboard input.

    filemanager.find('input').on('input', function(e){

        folders = [];
        files = [];

        var value = this.value.trim();

        if(value.length) {
            filemanager.addClass('searching');

            // Update the hash on every key stroke
            window.location.hash = 'search=' + value.trim();
        }

        else {
            filemanager.removeClass('searching');
            window.location.hash = encodeURIComponent(currentPath);
        }

    }).on('keyup', function(e){

        // Clicking 'ESC' button triggers focusout and cancels the search

        var search = $(this);

        if(e.keyCode == 27) {
            search.trigger('focusout');
        }

    }).focusout(function(e){

        // Cancel the search

        var search = $(this);

        if(!search.val().trim().length) {

            window.location.hash = encodeURIComponent(currentPath);
            search.hide();
            search.parent().find('span').show();

        }

    });

    //fileList.draggable({ cursor: "pointer" });

    fileList.on({
        click: function(e) {
            //alert("Drag n drop zip files onto 3D space");
            e.preventDefault();
        },

        dragstart: function(e) {

            var dragData = {"title": e.target.attributes.getNamedItem("data-assetslug").value + "_" + Math.floor(Date.now() / 1000),
                            "assetid": e.target.attributes.getNamedItem("data-assetid").value,
                              "obj": e.target.attributes.getNamedItem("data-objPath").value,
                              "objID": e.target.attributes.getNamedItem("data-objID").value,
                              "mtl": e.target.attributes.getNamedItem("data-mtlPath").value,
                              "mtlID": e.target.attributes.getNamedItem("data-mtlID").value,
                          "diffImage": e.target.attributes.getNamedItem("data-diffImage").value,
                          "diffImageID": e.target.attributes.getNamedItem("data-diffImageID").value,
                          "categoryID": e.target.attributes.getNamedItem("data-categoryID").value,
                        "categoryName": e.target.attributes.getNamedItem("data-categoryName").value,
                              "image1id":e.target.attributes.getNamedItem("data-image1id").value};

            var jsonDataDrag = JSON.stringify(dragData);

            e.originalEvent.dataTransfer.setData("text/plain", jsonDataDrag);

        },
        //dragenter: function(e) {
        //	console.log("dragenter");
        //	e.preventDefault();
        //},
        //dragleave: function(e) {
        //	console.log("dragleave");
        //	e.preventDefault();
        //},
        drag: function(e) {
            e.preventDefault();
        },
        //dragover: function(e) {
        //	e.preventDefault(); // Chrome / Safari
        //	console.log("dragover");
        //	e.preventDefault();
        //},
        //drop: function(e) {
        //	console.log("drop");
        //	e.preventDefault();
        //},
        dragend: function(e) {

            e.preventDefault();
        }
    });

    //'click', 'li.files',function(e){
    //	e.preventDefault();
    //	alert("Drag n drop zip files onto 3D space");
    //});
    //
    //fileList.on('dragstart', 'li.files',function(e){
    //	e.preventDefault();
    //	console.log("DragStart");
    //});
    //
    //fileList.on('drag', 'li.files', function(e){
    //	e.preventDefault();
    //	console.log("Drag");
    //
    //
    //});

    // Clicking on folders
    fileList.on('click', 'li.folders', function(e){
        e.preventDefault();

        var nextDir = $(this).find('a.folders').attr('href');

        if(filemanager.hasClass('searching')) {

            // Building the breadcrumbs
            breadcrumbsUrls = generateBreadcrumbs(nextDir);

            filemanager.removeClass('searching');
            filemanager.find('input[type=search]').val('').hide();
            filemanager.find('span').show();
        }
        else {
            breadcrumbsUrls.push(nextDir);
        }

        window.location.hash = encodeURIComponent(nextDir);
        currentPath = nextDir;
    });


    // Clicking on breadcrumbs
    breadcrumbs.on('click', 'a', function(e){
        e.preventDefault();

        var index = breadcrumbs.find('a').index($(this)),
            nextDir = breadcrumbsUrls[index];

        breadcrumbsUrls.length = Number(index);

        window.location.hash = encodeURIComponent(nextDir);
    });


    // Navigates to the given hash (path)

    function goto(hash) {

        hash = decodeURIComponent(hash).slice(1).split('=');

        if (hash.length) {
            var rendered = '';

            // if hash has search in it

            if (hash[0] === 'search') {

                filemanager.addClass('searching');
                rendered = searchData(response, hash[1].toLowerCase());

                if (rendered.length) {
                    currentPath = hash[0];
                    render(rendered);
                }
                else {
                    render(rendered);
                }

            }

            // if hash is some path

            else if (hash[0].trim().length) {

                rendered = searchByPath(hash[0]);

                if (rendered.length) {

                    currentPath = hash[0];
                    breadcrumbsUrls = generateBreadcrumbs(hash[0]);
                    render(rendered);

                }
                else {
                    currentPath = hash[0];
                    breadcrumbsUrls = generateBreadcrumbs(hash[0]);
                    render(rendered);
                }

            }

            // if there is no hash

            else {
                currentPath = data.path;
                breadcrumbsUrls.push(data.path);
                render(searchByPath(data.path));
            }
        }
    }

    // Splits a file path and turns it into clickable breadcrumbs

    function generateBreadcrumbs(nextDir){
        var path = nextDir.split('/').slice(0);

        for(var i=1;i<path.length;i++){
            path[i] = path[i-1]+ '/' +path[i];
        }
        return path;
    }


    // Locates a file by path

    function searchByPath(dir) {
        var path = dir.split('/'),
            demo = response,
            flag = 0;

        for(var i=0;i<path.length;i++){
            for(var j=0;j<demo.length;j++){
                if(demo[j].name === path[i]){
                    flag = 1;
                    demo = demo[j].items;
                    break;
                }
            }
        }

        demo = flag ? demo : [];
        return demo;
    }


    // Recursively search through the file tree

    function searchData(data, searchTerms) {

        data.forEach(function(d){
            if(d.type === 'folder') {

                searchData(d.items,searchTerms);

                if(d.name.toLowerCase().match(searchTerms)) {
                    folders.push(d);
                }
            }
            else if(d.type === 'file') {
                if(d.name.toLowerCase().match(searchTerms)) {
                    files.push(d);
                }
            }
        });
        return {folders: folders, files: files};
    }


    // Render the HTML for the file manager
    // Here we make the list
    function render(data) {

        var scannedFolders = [],
            scannedFiles = [];

        if (Array.isArray(data)) {

            data.forEach(function (d) {

                if (d.type === 'folder') {
                    scannedFolders.push(d);
                }
                else if (d.type === 'file') {
                    scannedFiles.push(d);

                }


            });

            //scannedFiles.forEach(function(cr){console.log(cr);});
        }
        else if (typeof data === 'object') {

            scannedFolders = data.folders;
            scannedFiles = data.files;
        }

        // Empty the old result and make the new one
        fileList.empty().hide();

        if (!scannedFolders.length && !scannedFiles.length) {
            filemanager.find('.nothingfound').show();
        }else{
            filemanager.find('.nothingfound').hide();
        }

        if(scannedFolders.length) {

            scannedFolders.forEach(function(f) {

                var itemsLength = f.items.length,
                    name = escapeHTML(f.name),
                    icon = '<span class="icon folder"></span>';

                if(itemsLength) {
                    icon = '<span class="icon folder full"></span>';
                }

                if(itemsLength == 1) {
                    itemsLength += ' item';
                }
                else if(itemsLength > 1) {
                    itemsLength += ' items';
                } else {
                    itemsLength = 'Empty';
                }

                var folder = $('<li class="folders"><a href="'+ f.path +'" title="'+ f.path +'" class="folders">'+icon+'<span class="name">' + name + '</span> <span class="details">' + itemsLength + '</span></a></li>');
                folder.appendTo(fileList);
            });

        }




        if(scannedFiles.length) {

            scannedFiles.forEach(function(f) {

                var fileSize = bytesToSize(f.size);

                var name = escapeHTML(f.name);



                var fileType = f.objPath.split('.').pop();

                var icon = '<span class="icon file f-'+f.categoryID+'">.'+f.categoryName+'</span>';


                if (fileType.toUpperCase() == 'JPG' || fileType.toUpperCase()=='PNG')
                    icon += '<img src=' + f.path + ' width="42" class="icon file" style="padding-left:0px;margin-left:0px">';

                // Check if icon of obj exists  file.obj.png or file.obj.jpg
                if (fileType.toUpperCase() == 'OBJ')
                    icon += '<img src=' + f.path + '.jpg' + ' width="42" class="icon file" style="padding-left:0px;margin-left:0px">';

                console.log("f.image1id", f.image1id);

                var file = $('<li class="files"><a href="'+ f.objPath +
                                               '" title="'+ f.name +
                                               '" data-assetslug="'+ f.assetSlug +
                                               '" data-assetid="'+ f.assetid +
                                               '" data-objPath="'+ f.objPath +
                                               '" data-objID="'+ f.objID +
                                               '" data-mtlPath="'+ f.mtlPath +
                                               '" data-mtlID="'+ f.mtlID +
                                               '" data-diffImage="'+ f.diffImage +
                                               '" data-diffImageID="'+ f.diffImageID +
                                               '" data-categoryID="'+ f.categoryID +
                                               '" data-categoryName="'+ f.categoryName +
                                               '" data-image1id="'+ f.image1id +
                                               '" class="files">'+icon+'<span class="name">'+
                    name +'</span> <span class="details">'+fileSize+'</span></a></li>');
                file.appendTo(fileList);
            });




        }


        // Generate the breadcrumbs

        var url = '';

        if(filemanager.hasClass('searching')){

            url = '<span>Search results: </span>';
            fileList.removeClass('animated');

        }
        else {

            fileList.addClass('animated');

            breadcrumbsUrls.forEach(function (u, i) {

                var name = u.split('/');

                // rename first path to hide the full path
                if (i==0) {
                    name[0] = scenefolder;
                }

                if (i !== breadcrumbsUrls.length - 1) {
                    url += '<a href="'+u+'"><span class="folderName">' + name[name.length-1] + '</span></a> <span class="vr_editor_arrow"> > </span> ';
                }
                else {
                    url += '<span class="folderName">' + name[name.length-1] + '</span>';
                }

            });

        }

        breadcrumbs.text('').append(url);

        // Show the generated elements
        fileList.animate({'display':'inline-block'});

        // Perform click to open (bug appeared from migrating jquery-1.11 to 3.1.1
        closeButton.click();
    }


    // This function escapes special html characters in names
    function escapeHTML(text) {
        return text.replace(/\&/g,'&amp;').replace(/\</g,'&lt;').replace(/\>/g,'&gt;');
    }

    // Convert file sizes from bytes to human readable units
    function bytesToSize(bytes) {
        var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
        if (bytes == 0) return '0 Bytes';
        var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
        return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
    }

}







// //===============================================
// //    ____  _               _      _
// //   / __ \| |             | |    | |
// //  | |  | | |__  ___  ___ | | ___| |_ ___
// //  | |  | | '_ \/ __|/ _ \| |/ _ \ __/ _ \
// //  | |__| | |_) \__ \ (_) | |  __/ ||  __/
// //   \____/|_.__/|___/\___/|_|\___|\__\___|
// // Browse by dir
// //===============================================
// function file_Browsing_By_Dirs(data){
//
//     var filemanager = $('.filemanager'),
//         breadcrumbs = $('.breadcrumbs'),
//         fileList = filemanager.find('.data'),
//         closeButton = $('.bt_close_file_toolbar');
//
//     var response = [data],
//         currentPath = '',
//         breadcrumbsUrls = [];
//
//     var folders = [],
//         files = [];
//
//     // This event listener monitors changes on the URL. We use it to
//     // capture back/forward navigation in the browser.
//
//     $(window).on('hashchange', function(){
//
//         goto(window.location.hash);
//
//
//         // We are triggering the event. This will execute
//         // this function on page load, so that we show the correct folder:
//
//     }).trigger('hashchange');
//
//
//     // Hiding and showing the search box
//
//     filemanager.find('.search').click(function(){
//
//         var search = $(this);
//
//         search.find('span').hide();
//         search.find('input[type=search]').show().focus();
//
//     });
//
//
//     // Listening for keyboard input on the search field.
//     // We are using the "input" event which detects cut and paste
//     // in addition to keyboard input.
//
//     filemanager.find('input').on('input', function(e){
//
//         folders = [];
//         files = [];
//
//         var value = this.value.trim();
//
//         if(value.length) {
//             filemanager.addClass('searching');
//
//             // Update the hash on every key stroke
//             window.location.hash = 'search=' + value.trim();
//         }
//
//         else {
//             filemanager.removeClass('searching');
//             window.location.hash = encodeURIComponent(currentPath);
//         }
//
//     }).on('keyup', function(e){
//
//         // Clicking 'ESC' button triggers focusout and cancels the search
//
//         var search = $(this);
//
//         if(e.keyCode == 27) {
//             search.trigger('focusout');
//         }
//
//     }).focusout(function(e){
//
//         // Cancel the search
//
//         var search = $(this);
//
//         if(!search.val().trim().length) {
//
//             window.location.hash = encodeURIComponent(currentPath);
//             search.hide();
//             search.parent().find('span').show();
//
//         }
//
//     });
//
//     //fileList.draggable({ cursor: "pointer" });
//
//     fileList.on({
//         click: function(e) {
//             //alert("Drag n drop zip files onto 3D space");
//             e.preventDefault();
//         },
//         dragstart: function(e) {
//
//             console.log('e',e.target);
//
//             //var img = new Image();
//             //img.src = 'images/DigiArt_32sq.png';
//             //e.originalEvent.dataTransfer.setDragImage(img, 32, 32);
//
//             //--------------------------------------------------
//             iLastPeriod = (e.target.title).lastIndexOf(".");
//             iLastSlash = (e.target.title).lastIndexOf("/");
//
//             addOneTitle = (e.target.title).substring(iLastSlash+1, iLastPeriod) + "_" + Math.floor(Date.now() / 1000);
//             addOneObj = e.target.title;
//             addOneMtl = (e.target.title).substring(0,iLastPeriod) + ".mtl";
//             //--------------------------------------
//
//
//             var dragData = {"title":addOneTitle, "obj":addOneObj, "mtl":addOneMtl};
//
//             var jsonDataDrag = JSON.stringify(dragData);
//
//             e.originalEvent.dataTransfer.setData("text/plain", jsonDataDrag);
//
//         },
//         //dragenter: function(e) {
//         //	console.log("dragenter");
//         //	e.preventDefault();
//         //},
//         //dragleave: function(e) {
//         //	console.log("dragleave");
//         //	e.preventDefault();
//         //},
//         drag: function(e) {
//             e.preventDefault();
//         },
//         //dragover: function(e) {
//         //	e.preventDefault(); // Chrome / Safari
//         //	console.log("dragover");
//         //	e.preventDefault();
//         //},
//         //drop: function(e) {
//         //	console.log("drop");
//         //	e.preventDefault();
//         //},
//         dragend: function(e) {
//
//             e.preventDefault();
//         }
//     });
//
//     //'click', 'li.files',function(e){
//     //	e.preventDefault();
//     //	alert("Drag n drop zip files onto 3D space");
//     //});
//     //
//     //fileList.on('dragstart', 'li.files',function(e){
//     //	e.preventDefault();
//     //	console.log("DragStart");
//     //});
//     //
//     //fileList.on('drag', 'li.files', function(e){
//     //	e.preventDefault();
//     //	console.log("Drag");
//     //
//     //
//     //});
//
//     // Clicking on folders
//     fileList.on('click', 'li.folders', function(e){
//         e.preventDefault();
//
//         var nextDir = $(this).find('a.folders').attr('href');
//
//         if(filemanager.hasClass('searching')) {
//
//             // Building the breadcrumbs
//             breadcrumbsUrls = generateBreadcrumbs(nextDir);
//
//             filemanager.removeClass('searching');
//             filemanager.find('input[type=search]').val('').hide();
//             filemanager.find('span').show();
//         }
//         else {
//             breadcrumbsUrls.push(nextDir);
//         }
//
//         window.location.hash = encodeURIComponent(nextDir);
//         currentPath = nextDir;
//     });
//
//
//     // Clicking on breadcrumbs
//     breadcrumbs.on('click', 'a', function(e){
//         e.preventDefault();
//
//         var index = breadcrumbs.find('a').index($(this)),
//             nextDir = breadcrumbsUrls[index];
//
//         breadcrumbsUrls.length = Number(index);
//
//         window.location.hash = encodeURIComponent(nextDir);
//     });
//
//
//     // Navigates to the given hash (path)
//
//     function goto(hash) {
//
//         hash = decodeURIComponent(hash).slice(1).split('=');
//
//         if (hash.length) {
//             var rendered = '';
//
//             // if hash has search in it
//
//             if (hash[0] === 'search') {
//
//                 filemanager.addClass('searching');
//                 rendered = searchData(response, hash[1].toLowerCase());
//
//                 if (rendered.length) {
//                     currentPath = hash[0];
//                     render(rendered);
//                 }
//                 else {
//                     render(rendered);
//                 }
//
//             }
//
//             // if hash is some path
//
//             else if (hash[0].trim().length) {
//
//                 rendered = searchByPath(hash[0]);
//
//                 if (rendered.length) {
//
//                     currentPath = hash[0];
//                     breadcrumbsUrls = generateBreadcrumbs(hash[0]);
//                     render(rendered);
//
//                 }
//                 else {
//                     currentPath = hash[0];
//                     breadcrumbsUrls = generateBreadcrumbs(hash[0]);
//                     render(rendered);
//                 }
//
//             }
//
//             // if there is no hash
//
//             else {
//                 currentPath = data.path;
//                 breadcrumbsUrls.push(data.path);
//                 render(searchByPath(data.path));
//             }
//         }
//     }
//
//     // Splits a file path and turns it into clickable breadcrumbs
//
//     function generateBreadcrumbs(nextDir){
//         var path = nextDir.split('/').slice(0);
//
//         for(var i=1;i<path.length;i++){
//             path[i] = path[i-1]+ '/' +path[i];
//         }
//         return path;
//     }
//
//
//     // Locates a file by path
//
//     function searchByPath(dir) {
//         var path = dir.split('/'),
//             demo = response,
//             flag = 0;
//
//         for(var i=0;i<path.length;i++){
//             for(var j=0;j<demo.length;j++){
//                 if(demo[j].name === path[i]){
//                     flag = 1;
//                     demo = demo[j].items;
//                     break;
//                 }
//             }
//         }
//
//         demo = flag ? demo : [];
//         return demo;
//     }
//
//
//     // Recursively search through the file tree
//
//     function searchData(data, searchTerms) {
//
//         data.forEach(function(d){
//             if(d.type === 'folder') {
//
//                 searchData(d.items,searchTerms);
//
//                 if(d.name.toLowerCase().match(searchTerms)) {
//                     folders.push(d);
//                 }
//             }
//             else if(d.type === 'file') {
//                 if(d.name.toLowerCase().match(searchTerms)) {
//                     files.push(d);
//                 }
//             }
//         });
//         return {folders: folders, files: files};
//     }
//
//
//     // Render the HTML for the file manager
//
//     function render(data) {
//
//
//         var scannedFolders = [],
//             scannedFiles = [];
//
//         if (Array.isArray(data)) {
//
//             data.forEach(function (d) {
//
//                 if (d.type === 'folder') {
//                     scannedFolders.push(d);
//                 }
//                 else if (d.type === 'file') {
//                     scannedFiles.push(d);
//
//                 }
//
//
//             });
//
//             //scannedFiles.forEach(function(cr){console.log(cr);});
//         }
//         else if (typeof data === 'object') {
//
//             scannedFolders = data.folders;
//             scannedFiles = data.files;
//         }
//
//         // Empty the old result and make the new one
//         fileList.empty().hide();
//
//         if (!scannedFolders.length && !scannedFiles.length) {
//             filemanager.find('.nothingfound').show();
//         }else{
//             filemanager.find('.nothingfound').hide();
//         }
//
//         if(scannedFolders.length) {
//
//             scannedFolders.forEach(function(f) {
//
//                 var itemsLength = f.items.length,
//                     name = escapeHTML(f.name),
//                     icon = '<span class="icon folder"></span>';
//
//                 if(itemsLength) {
//                     icon = '<span class="icon folder full"></span>';
//                 }
//
//                 if(itemsLength == 1) {
//                     itemsLength += ' item';
//                 }
//                 else if(itemsLength > 1) {
//                     itemsLength += ' items';
//                 }
//                 else {
//                     itemsLength = 'Empty';
//                 }
//
//                 var folder = $('<li class="folders"><a href="'+ f.path +'" title="'+ f.path +'" class="folders">'+icon+'<span class="name">' + name + '</span> <span class="details">' + itemsLength + '</span></a></li>');
//                 folder.appendTo(fileList);
//             });
//
//         }
//
//
//
//
//         if(scannedFiles.length) {
//
//             scannedFiles.forEach(function(f) {
//
//                 var fileSize = bytesToSize(f.size),
//                     name = escapeHTML(f.name),
//                     fileType = name.split('.'),
//                     icon = '<span class="icon file"></span>';
//
//                 fileType = fileType[fileType.length-1];
//
//                 icon = '<span class="icon file f-'+fileType+'">.'+fileType+'</span>';
//
//                 // Path correction: on file click needs this correction else from breadcrumbs no correction is needed
//                 if (f.path.substr(0,4)!='http') {
//
//                     //replace \ with /
//                     f.path = f.path.replace(new RegExp("\\\\", "g"), "/");
//
//                     // remove referenced uploads path
//                     f.path = f.path.replace('../wp-content/uploads', '');
//
//                     // add actual uploads url
//                     f.path = UPLOAD_DIR + f.path;
//                 }
//                 //--------------------------------------------------
//
//
//                 if (fileType.toUpperCase() == 'JPG' || fileType.toUpperCase()=='PNG')
//                     icon += '<img src=' + f.path + ' width="42" class="icon file" style="padding-left:0px;margin-left:0px">';
//
//                 // Check if icon of obj exists  file.obj.png or file.obj.jpg
//                 if (fileType.toUpperCase() == 'OBJ')
//                     icon += '<img src=' + f.path + '.jpg' + ' width="42" class="icon file" style="padding-left:0px;margin-left:0px">';
//
//
//
//                 var file = $('<li class="files"><a href="'+ f.path+'" title="'+ f.path +'" class="files">'+icon+'<span class="name">'+
//                     name +'</span> <span class="details">'+fileSize+'</span></a></li>');
//                 file.appendTo(fileList);
//             });
//
//         }
//
//
//         // Generate the breadcrumbs
//
//         var url = '';
//
//         if(filemanager.hasClass('searching')){
//
//             url = '<span>Search results: </span>';
//             fileList.removeClass('animated');
//
//         }
//         else {
//
//             fileList.addClass('animated');
//
//             breadcrumbsUrls.forEach(function (u, i) {
//
//                 var name = u.split('/');
//
//
//                 // rename first path to hide the full path
//                 if (i==0) {
//                     name[0] = scenefolder;
//                 }
//
//                 if (i !== breadcrumbsUrls.length - 1) {
//                     url += '<a href="'+u+'"><span class="folderName">' + name[name.length-1] + '</span></a> <span class="vr_editor_arrow"> > </span> ';
//                 }
//                 else {
//                     url += '<span class="folderName">' + name[name.length-1] + '</span>';
//                 }
//
//             });
//
//         }
//
//         breadcrumbs.text('').append(url);
//
//         // Show the generated elements
//         fileList.animate({'display':'inline-block'});
//
//         // Perform click to open (bug appeared from migrating jquery-1.11 to 3.1.1
//         closeButton.click();
//     }
//
//
//     // This function escapes special html characters in names
//
//     function escapeHTML(text) {
//         return text.replace(/\&/g,'&amp;').replace(/\</g,'&lt;').replace(/\>/g,'&gt;');
//     }
//
//
//     // Convert file sizes from bytes to human readable units
//     function bytesToSize(bytes) {
//         var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
//         if (bytes == 0) return '0 Bytes';
//         var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
//         return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
//     }
//
// }
