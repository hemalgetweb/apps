(function($) {
    /**
     * Click on load more button
     */
    let currentPage = 1;
    $('#loadMoreBtn').on('click', function() {
        currentPage++; // Do currentPage + 1, because we want to load the next page
        $.ajax({
          type: 'POST',
          url: ajax.ajax_url,
          dataType: 'html',
          data: {
            action: 'apps_post_load_more',
            paged: currentPage,
          },
          success: function (res) {
            $('#home-filtered-blog-post-114').append(res);
            if (res.trim() === '') {
                $('#loadMoreBtn').hide();
            }
          }
        });
      });


      /**
       * If input change
       */
      $("#search_blog_input").on("change", function() {
		var e = $(this).val();
        $.ajax({
            url: ajax.ajax_url,
            type: "POST",
            data: {
                action: "apps_perform_post_search",
                search_term: e
            },
            beforeSend: function() {
                $("#home-filtered-blog-post-114").html("Searching...")
            },
            success: function(e) {
                $("#home-filtered-blog-post-114").html(e);
                $('#loadMoreBtn').hide();
            },
            error: function(o, e, r) {
                console.error("AJAX Error:", o.responseText)
            }
        })
	})
      
})(jQuery);