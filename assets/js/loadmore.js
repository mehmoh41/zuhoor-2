var ppp = 1; // Post per page
// var cat = 8;
var pageNumber = 1;

console.log("working");

jQuery(document).ready(function ($) {
    console.log("document is ready");
    function load_posts(){
        pageNumber++;
        var str =
            // '&cat=' + cat +
            '&pageNumber=' + pageNumber + '&ppp=' + ppp + '&action=more_post_ajax';
        $.ajax({
            type: "POST",
            dataType: "html",
            url: ajax_posts.ajaxurl,
            data: str,
            success: function(data){
                var $data = $(data);
                if($data.length){
                    $("#ajax-posts").append($data);
                    $("#more_posts").attr("disabled",false);
                } else{
                    $("#more_posts").attr("disabled",true);
                }
            },
            error : function(jqXHR, textStatus, errorThrown) {
                $loader.html(jqXHR + " :: " + textStatus + " :: " + errorThrown);
            }
    
        });
        return false;
    }

    // $(window).on('scroll', function(){
    //     if($('body').scrollTop()+$(window).height() > $('footer').offset().top){
    //         if(!($loader.hasClass('post_loading_loader') || $loader.hasClass('post_no_more_posts'))){
    //                 load_posts();
    //         }
    //     }
    // });
    
    // $(window).on('scroll', function () {
    //     console.log($(window).scrollTop() + $(window).height());
    //     console.log($(document).height() - 100);
    //     if ($(window).scrollTop() + $(window).height()  >= $(document).height() - 100) {
    //         load_posts();
    //     }
    // });
    $("#more_posts").on("click", function () { // When btn is pressed.
        console.log("load more button clicked");
        $("#more_posts").attr("disabled",true); // Disable the button, temp.
        load_posts();
    });
})