(function($) {
    $(window).on('load', function () {
        /**
         * Blog category filter
         */
        $('.apps-blog-page-topbar-category-select select').on('change', function() {
            var selectedCategory = $(this).val();
            $.ajax({
                url: ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'apps_filter_blog_posts',
                    category: selectedCategory,
                },
                beforeSend: function() {
                    // Show loading spinner or message if needed
                    $('#home-filtered-blog-post-114').html('Loading...');
                },
                success: function(response) {
                    // Update the content of the blog post container
                    $('#home-filtered-blog-post-114').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle error if AJAX request fails
                    console.error('AJAX Error:', xhr.responseText);
                }
            });
        });
    });
})(jQuery)