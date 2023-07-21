(function($) {
    $(window).on('load', function () {
        /**
         * Blog category filter
         */
        $('.apps-has-category-select').on('change', function() {
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
        /**
         * Blog duration filter
         */
        $('.apps-has-duration-select').on('change', function() {
            var selectedOption = $(this).val();
            $.ajax({
                url: ajax.ajax_url,
                type: 'POST',
                data: {
                    action: 'apps_filter_blog_posts',
                    date_filter: selectedOption,
                },
                beforeSend: function() {
                    // Show loading spinner or message if needed
                    $('#filtered-blog-posts').html('Loading...');
                },
                success: function(response) {
                    // Update the content of the blog post container
                    $('#filtered-blog-posts').html(response);
                },
                error: function(xhr, status, error) {
                    // Handle error if AJAX request fails
                    console.error('AJAX Error:', xhr.responseText);
                }
            });
        });
    });
})(jQuery)