;(function($) {
    $( "#datepicker" ).datepicker();
    $('.apps-has-simple-select').select2();
    $('#upload_project_image_button').click(function(e) {
        e.preventDefault(); // Prevent the default behavior of the button

        // Create a media uploader instance
        var customUploader = wp.media({
            title: 'Choose an Image',
            button: {
                text: 'Use this Image'
            },
            multiple: false // Set this to true if you want to allow multiple images to be selected
        }).on('select', function() {
            var attachment = customUploader.state().get('selection').first().toJSON();
            $('#project_image').val(attachment.url);

            // Additional functionality after selecting the image
            // You can add your own custom actions here
            // For example, you can display a preview of the selected image
            $('#image_preview').html('<img src="' + attachment.url + '" alt="Image Preview" style="max-width: 100px; max-height: 100px;">');
        }).open();
    });
})(jQuery)