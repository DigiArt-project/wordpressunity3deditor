
//----------------------------------------------------------------------------------
//  AJAX: FETCH CONTENT FOR DESCRIPTION
//----------------------------------------------------------------------------------
function wpunity_fetchDescriptionAjax(){


    document.getElementById('wpunity_fetchDescription_bt').innerHTML = "Fetching";

    externalSource = document.getElementById("fetch_source").options[document.getElementById("fetch_source").selectedIndex].value;

    var reqCompile = jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'POST',
        data : {'action': 'wpunity_fetch_description_action',
                'lang':           document.getElementById("fetch_lang").options[document.getElementById("fetch_lang").selectedIndex].value,
                'externalSource': externalSource,
                'titles':         document.getElementById("wpunity_titles_search").value.replace(" ","%20"),
                'fulltext':       document.getElementById("wpunity_fulltext_chkbox").checked?'':'exintro=&'},

        success : function(response) {

            console.log(response);

            var json_content = jQuery.parseJSON(response);

            if (json_content) {

                if (externalSource == 'Wikipedia') {

                    if (json_content.query) {
                        for (key in json_content.query.pages) {
                            if (json_content.query.pages[key].extract)
                                tinymce.activeEditor.setContent(json_content.query.pages[key].extract.trim());
                        }
                    } else {
                        console.log("Nothing found 151");

                        tinymce.activeEditor.setContent(response);
                    }
                } else {

                    tinymce.activeEditor.setContent(JSON.stringify(json_content.items));

                }
            }
            document.getElementById('wpunity_fetchDescription_bt').innerHTML = "Fetch";

        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR");
            document.getElementById('wpunity_fetchDescription_bt').innerHTML = 'Error 21: Fetch again?' + thrownError;
        }
    });


}


//----------------------------------------------------------------------------------
//  FETCH IMAGES
//----------------------------------------------------------------------------------
function wpunity_fetchImageAjax(){

    document.getElementById('wpunity_fetchImage_bt').innerHTML = "Fetching";

    externalSourceImage = document.getElementById("fetch_source_image").options[document.getElementById("fetch_source_image").selectedIndex].value;

    document.getElementById("wpunity_titles_image_search_image").value = document.getElementById("wpunity_titles_image_search_image").value.replace(/ /g,"+");

    jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'POST',
        data : {'action': 'wpunity_fetch_image_action',
            'lang_image':           document.getElementById("fetch_lang_image").options[document.getElementById("fetch_lang_image").selectedIndex].value,
            'externalSource_image': externalSourceImage,
            'titles_image':         document.getElementById("wpunity_titles_image_search_image").value
            },

        success : function(response) {

//            console.log(response);

            var json_content = jQuery.parseJSON(response);

            if (json_content) {
                if (externalSourceImage == 'Wikipedia') {
                    if (json_content.query) {
                        var j=0;
                        for(key in json_content.query.pages) {
                            j++;
                            for(i=0; i<json_content.query.pages[key].imageinfo.length; i++) {
                                var fname = json_content.query.pages[key].imageinfo[0].url;
                                var whichimage ='image_res_'+(j+1);
                                document.getElementById(whichimage).src = fname;
                                document.getElementById(whichimage + "_url").innerHTML = fname;

                                document.getElementById(whichimage + "_title").innerHTML = 'Description:<br />' + json_content.query.pages[key].imageinfo[0].descriptionurl;

                            }
                        }
                    } else {
                        console.log("Nothing found 151");
                    }
                } else {


                    if (json_content.itemsCount  > 0) {

                        for(j=0; j<json_content.itemsCount; j++) {

                                var fname = json_content.items[j].edmPreview;

                                console.log(fname);

                                var whichimage ='image_res_'+(j+1);

                                document.getElementById(whichimage).src = fname;
                                document.getElementById(whichimage + "_url").innerHTML = fname;
                            document.getElementById(whichimage + "_title").innerHTML = json_content.items[j].title;

                        }
                    } else {
                        console.log("Nothing found 151");
                    }



                }
            }

            document.getElementById('wpunity_fetchImage_bt').innerHTML = "Fetch";
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR");
            document.getElementById('wpunity_fetchImage_bt').innerHTML = 'Error 22: Fetch again?' + thrownError;
        }
    });


}

