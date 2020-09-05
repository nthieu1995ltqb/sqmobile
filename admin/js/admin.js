$(document).ready(function() {
    // Ẩn hiện thông số kỹ thuật
    // $(document).on('mouseenter', '.product_info', function() {
    //     $(this).addClass('more_info');
    // })
    // $(document).on('mouseleave', '.product_info', function() {
    //     $(this).removeClass('more_info');
    // })
    $(".product-btn").click(function() {
        $(".product-show").toggleClass("show");
        $(".first").toggleClass("rotate");
    })
    $("ul .aside_item").click(function() {
        $(this).addClass("active").siblings().removeClass("active");
    })
    $("ul .aside_item ul li").click(function() {
        $(this).addClass("sub_active").siblings().removeClass("sub_active");
    })
});