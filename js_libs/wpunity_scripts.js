function readURL(input, id) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            jQuery(id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
    }
}