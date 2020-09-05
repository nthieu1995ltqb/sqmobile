$(document).ready(function() {
    // function active menu trademark
    // $('.menu_trademark_item').click(function() {
    //     $(this).addClass('menu_trademark_active').siblings().removeClass('menu_trademark_active');
    //     $(this).siblings().children().removeClass('img_active');
    // })
    // $('.menu_trademark_img').click(function() {
    //     $(this).addClass('img_active');
    // })

    // //Ajax lấy sản phẩm theo hãng sản xuất
    // $('.menu_trademark_item a').click(function(e) {
    //     e.preventDefault();
    //     $.get('lib/product-fn.php', { id_TL: $(this).attr('id_TL'), id_TH: $(this).attr('id_TH') }, function(data) {
    //         $('#ajax_product_list').html(data);
    //     })
    // })

    $(window).on('scroll', function() {
        if ($(this).scrollTop() >= 100) {
            $('.main_menu').addClass('sticky');
        } else {
            $('.main_menu').removeClass('sticky');
        }
    })
    $('.icon_toggle_mb').on('click', function() {
        if ($('.main_menu').css('display') === 'block') {
            $('.main_menu').css('display', 'none');
        } else {
            $('.main_menu').css('display', 'block');
        }
    })

    // $('.header_search').on('click', function() {
    //     if ($('.header_sub_mb form').css('display') === 'block') {
    //         $('.header_sub_mb form').css('display', 'none');
    //     } else {
    //         $('.header_sub_mb form').css('display', 'block');
    //     }
    // })
});