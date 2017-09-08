//  AJAX: FETCH Assets 3d
function wpunity_fetchSceneAssetsAjax(isAdmin, gameProjectSlug){

    jQuery.ajax({
        url :  isAdmin == "back" ? 'admin-ajax.php' : my_ajax_object_fbrowse.ajax_url,
        type : 'POST',
        data : {
            'action': 'wpunity_fetch_game_assets_action',
            'gameProjectSlug': gameProjectSlug
        },

        success : function(responseRecords) {

            responseRecords = responseRecords.items;

            file_Browsing_By_DB(responseRecords, gameProjectSlug);
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR 51:" + thrownError);
        }
    });
}

/**
 * Start the browser
 * @param responseData
 */
function file_Browsing_By_DB(responseData, gameProjectSlug) {

    var filemanager = jQuery('#fileBrowserToolbar'),
        //breadcrumbs = jQuery('.breadcrumbs'),
        fileList = filemanager.find('.data'),
        closeButton = jQuery('.bt_close_file_toolbar');

    render(responseData, gameProjectSlug );

    // Hiding and showing the search box
    filemanager.find('.search').click(function() {
        var search = jQuery(this);
        search.find('span').hide();
        search.find('input[type=search]').show().focus();
    });

    // Listening for keyboard input on the search field.
    // We are using the "input" event which detects cut and paste
    // in addition to keyboard input.

    filemanager.find('input').on('input', function(e){

        var value = this.value.trim();

        if(value.length) {
            filemanager.addClass('searching');

            // Filter the responseData according to value.trim()
            filteredResponseData = selectByTitleComparizon(responseData, value.trim());
            render(filteredResponseData, gameProjectSlug);
        } else {
            filemanager.removeClass('searching');
            render(responseData, gameProjectSlug);
        }

    }).on('keyup', function(e){ // Clicking 'ESC' button triggers focusout and cancels the search
        var search = jQuery(this);
        if(e.keyCode === 27)
            search.trigger('focusout');
    }).focusout(function(e){  // Cancel the search
        var search = jQuery(this);
        if(!search.val().trim().length) {
            //window.location.hash = encodeURIComponent(currentPath);
            search.hide();
            search.parent().find('span').show();
        }
    });


    fileList.on({
        click: function(e) {
            //alert("Drag n drop zip files onto 3D space");
            e.preventDefault();
        },

        dragstart: function(e) {
            var dragData = {
                "title": e.target.attributes.getNamedItem("data-assetslug").value + "_" + Math.floor(Date.now() / 1000),
                "assetid": e.target.attributes.getNamedItem("data-assetid").value,
                "obj": e.target.attributes.getNamedItem("data-objPath").value,
                "objID": e.target.attributes.getNamedItem("data-objID").value,
                "mtl": e.target.attributes.getNamedItem("data-mtlPath").value,
                "mtlID": e.target.attributes.getNamedItem("data-mtlID").value,
                "diffImage": e.target.attributes.getNamedItem("data-diffImage").value,
                "diffImageID": e.target.attributes.getNamedItem("data-diffImageID").value,
                "categoryID": e.target.attributes.getNamedItem("data-categoryID").value,
                "categoryName": e.target.attributes.getNamedItem("data-categoryName").value,
                "image1id":e.target.attributes.getNamedItem("data-image1id").value
            };

            var jsonDataDrag = JSON.stringify(dragData);

            e.originalEvent.dataTransfer.setData("text/plain", jsonDataDrag);

        },
        drag: function(e) {
            e.preventDefault();
        },
        dragend: function(e) {
            e.preventDefault();
        }
    });

    // Render the HTML for the file manager
    // Here we make the list
    function render(enlistData, gameProjectSlug) {

        var i, f, name;

        // Empty the old result and make the new one
        fileList.empty().hide();

        if (!enlistData.length) {
            filemanager.find('.nothingfound').show();
        }else{
            filemanager.find('.nothingfound').hide();
        }

        if(enlistData.length) {

            for (i = 0; i < enlistData.length; i++) {

                f = enlistData[i];

                var fileSize = bytesToSize(f.size);

                name = escapeHTML(f.name);

                if(!f.objPath)
                    return;

                var fileType = f.objPath.split('.').pop();

                /*var icon = '<span class="icon file f-'+f.categoryID+'">.'+f.categoryName+'</span>';*/
                var img;
                var imgFileExtension;

                if (fileType.toUpperCase() === 'JPG' || fileType.toUpperCase()==='PNG') {
                    imgFileExtension = '';
                }
                // Check if icon of obj exists  file.obj.png or file.obj.jpg
                else if (fileType.toUpperCase() === 'OBJ') {
                    imgFileExtension = '.jpg';
                }

                if (!f.screenImagePath) {
                    f.screenImagePath = f.mtlPath.substr(0, f.mtlPath.indexOf('uploads')) + 'plugins/WordpressUnity3DEditor/images/ic_no_sshot.png';
                }

                img = '<span class="mdc-list-item__start-detail CenterContents"><img draggable="false" src=' + f.screenImagePath +'><br><span class="mdc-typography--caption mdc-theme--text-secondary-on-light">'+ fileSize +'</span></span>';

                var file = jQuery('<li id="asset-'+ f.assetid + '"  class="mdc-list-item" style="height: 96px; position: relative;">' +
                    '<a class="mdc-list-item" style="align-items:baseline; left:0; padding:12px 0 6px 6px; height: 100%; width:100%" href="'+ f.objPath +
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
                    '" >' + img +
                    '<span class="FileListItemName mdc-list-item__text" title="Drag the card into the plane">'+ name +
                    '<span class="mdc-list-item__text__secondary mdc-typography--caption">'+ f.categoryName +'</span></span></a>' +
                    '<span class="FileListItemFooter">' +
                    '<a draggable="false" ondragstart="return false;" title="Edit asset" href="#" id="editAssetBtn-'+ f.assetid + '" class="mdc-button mdc-button--dense">Edit</a>'+
                    '<a draggable="false" ondragstart="return false;" title="Delete asset" href="#" id="deleteAssetBtn-'+ f.assetid + '" onclick="wpunity_deleteAssetAjax(' +
                       f.assetid + ', \'' + gameProjectSlug + '\')" class="mdc-button mdc-button--dense">Delete</a>'+
                    '</span>' +
                    '<div id="deleteAssetProgressBar-'+ f.assetid + '" class="progressSlider" style="position: absolute;bottom: 0;display: none;">\n' +
                    '<div class="progressSliderLine"></div>\n' +
                    '<div class="progressSliderSubLine progressIncrease"></div>\n' +
                    '<div class="progressSliderSubLine progressDecrease"></div>\n' +
                    '</div>' +
                    '</li>' );

                file.appendTo(fileList);
            }

            mdc.autoInit(document, () => {});
        }

        // Remove animation
        if(filemanager.hasClass('searching'))
            fileList.removeClass('animated');

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

    function selectByTitleComparizon(input_data, needle){
        var output_data = [];

        input_data.forEach(function(d){
            if (d.assetName.indexOf(needle) !== -1)
                    output_data.push(d);
        });
        return output_data;
    }

}