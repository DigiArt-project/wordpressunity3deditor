
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

                document.getElementById('display_img_res').style.display ='';

                if (externalSourceImage == 'Wikipedia') {
                    if (json_content.query) {
                        var j=0;

                        for(key in json_content.query.pages) {
                            for(i=0; i<json_content.query.pages[key].imageinfo.length && j<10; i++) {

                                var fname = json_content.query.pages[key].imageinfo[0].url;
                                var whichimage ='image_res_'+j;

                                console.log(whichimage);

                                document.getElementById(whichimage).src = fname;
                                document.getElementById(whichimage + "_url").innerHTML = '<a href="'+fname+'" download="'+fname+'">'+fname+'</a>';

                                document.getElementById(whichimage + "_title").innerHTML = 'More info';

                                document.getElementById(whichimage + "_title").href = json_content.query.pages[key].imageinfo[0].descriptionurl;

                                j++;
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


//----------------------------------------------------------------------------------
//  FETCH VIDEOS
//----------------------------------------------------------------------------------
function wpunity_fetchVideoAjax(){

    document.getElementById('wpunity_fetchVideo_bt').innerHTML = "Fetching";

    externalSourceVideo = document.getElementById("fetch_source_video").options[document.getElementById("fetch_source_video").selectedIndex].value;

    document.getElementById("wpunity_titles_video_search_video").value = document.getElementById("wpunity_titles_video_search_video").value.replace(/ /g,"_");

    jQuery.ajax({
        url : 'admin-ajax.php',
        type : 'POST',
        data : {'action': 'wpunity_fetch_video_action',
            'lang_video':           document.getElementById("fetch_lang_video").options[document.getElementById("fetch_lang_video").selectedIndex].value,
            'externalSource_video': externalSourceVideo,
            'titles_video':         document.getElementById("wpunity_titles_video_search_video").value
        },

        success : function(response) {

            console.log(response);

            var json_content = jQuery.parseJSON(response);

            if (json_content) {
                if (externalSourceVideo == 'Wikipedia') {
                    if (json_content.query) {
                        var j=0;
                        for(key in json_content.query.pages) {
                            j++;
                            console.log(json_content.query.pages[key].videoinfo[0].derivatives);
                            for(i=0; i<1; i++) {
                                var fname = json_content.query.pages[key].videoinfo[0].derivatives[0].src;

                                var whichvideo ='video_res_'+j;

                                console.log(whichvideo, document.getElementById(whichvideo));

                                document.getElementById(whichvideo).src = fname;
                                document.getElementById("videoplayer1").load();

                                document.getElementById(whichvideo + "_url").innerHTML = '<a href="'+fname+'" download="'+fname+'">'+fname+'</a>';;

                                document.getElementById(whichvideo + "_title").innerHTML = "----";

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

            document.getElementById('wpunity_fetchVideo_bt').innerHTML = "Fetch";
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR");
            document.getElementById('wpunity_fetchVideo_bt').innerHTML = 'Error 23: Fetch again?' + thrownError;
        }
    });


}



