(function($) {
    $('.manage_application_approve_status').on('change', function() {
      var postID = $(this).data('post_id');
      var status = $(this).val();
      var ajaxurl = custom_ajax_obj.ajax_url;
  
      $.ajax({
        url: ajaxurl,
        type: 'POST',
        data: {
          action: 'update_approval_status',
          post_id: postID,
          status: status
        },
        success: function(response) {
          console.log('Post status updated successfully');
          console.log(response); // For debugging purposes
        },
        error: function(xhr, status, error) {
          console.log('Error updating post status');
          console.log(xhr.responseText); // Detailed error message from server
          console.log(status); // Status code (e.g., 404, 500)
          console.log(error); // Error object (if available)
        }
      });
    });
  })(jQuery);
  