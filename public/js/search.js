function loadmore_search()
{
    var max_user_id = $("#max_user_id").val();
    var q = $("#q_value").val();
    
    $("#loadmore_div").remove();
    var base_url = $("#base_url").val();
    var targetURL = base_url+'getmore_search';
    $.ajax({
        url: targetURL,
        method: "POST",
        data: { q: q, max_user_id : max_user_id }, 
        success: function(result)
        {
        	// var result = jQuery.parseJSON(result);
        	// alert(result[1]);
        	// alert(result[0]);
            // $(".users_content").fadeOut('slow');
            $(".users_content").append(result);
            // $(".users_content").fadeIn('slow');
        }
      });
}