function wpunity_assepileAjax() {

    jQuery.ajax({
        url :  isAdmin=="back" ? 'admin-ajax.php' : my_ajax_object_assepile.ajax_url,
        type : 'GET',
        data : {
            'action': 'wpunity_assepile_action',
            'gameId': my_ajax_object_assepile.id,
            'gameSlug': my_ajax_object_assepile.slug
        },
        success : function(data) {
            console.log(data);
        },
        error : function(xhr, ajaxOptions, thrownError){
            console.log("ERROR: " + thrownError);
        }
    });
}