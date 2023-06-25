;(function($) {
    $('#upload_button').click(function(e) {
        e.preventDefault();

        // Create the media frame
        var frame = wp.media({
            title: 'Select Image',
            multiple: false,
            library: { type: 'image' },
            button: { text: 'Insert' }
        });

        // Open the media frame
        frame.open();

        // Image selection event
        frame.on('select', function() {
            var attachment = frame.state().get('selection').first().toJSON();
            var imageUrl = attachment.url;

            // Update the image URL field
            $('#image_upload').val(imageUrl);

            // Update the image preview
            $('#image_preview img').attr('src', imageUrl);
        });
    });
})(jQuery)