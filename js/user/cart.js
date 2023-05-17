$(document).ready(function () {
    $('.btn-change').click(function (e) { 
        changeQuantity(e);
    });
    $('.quantity').blur(function (e) { 
        e.preventDefault();
        var i_quantity = $(e.delegateTarget);
        var href = $(e.delegateTarget).parents(".item-box").find("a.prod-link").attr('href').split('/products/');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/cart/quantity",
            data: {
                quantity: i_quantity.val(),
                id: href[1]
            },
            dataType: "json",
            success: function (response) {
                i_quantity.val(response.quantity);
                $(e.delegateTarget).parents(".item-box").find('.div_price_all').text(response.s_price + '₫');
            },
            error: function (response) {
                alert('error');
            }
        });
    });
    function changeQuantity(e) { 
        var act = $(e.delegateTarget).children().text().trim();
        var href = $(e.delegateTarget).parents(".item-box").find("a.prod-link").attr('href').split('/products/');
        var i_quantity = $(e.delegateTarget).siblings('div').children('input');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/cart/quantity",
            data: {
                action: act,
                quantity: i_quantity.val(),
                id: href[1]
            },
            dataType: "json",
            success: function (response) {
                i_quantity.val(response.quantity);
                $(e.delegateTarget).parents(".item-box").find('.div_price_all').text(response.s_price + '₫');
            },
            error: function (response) {
                alert('error');
            }
        });
    }

    $('#btn_confirm').click(function (e) { 
        $('.alert-screen').hide();
    });

    $('#btn_payment').click(function (e) { 
        $('.alert-screen').show();
    });

    $('.check-all').change(function (e) { 
        if ($('.check-all').eq(0).prop('checked') == true) {
            for (let i = 0; i < 2; i++) {
                $('.check-all').eq(i).prop('checked',true);
            }
            for (let i = 0;; i++) {
                $('.check-one').eq(i).prop('checked',true);
                if($('.check-one').eq(i).parents('.item-box').html() == $('.product').last().html()){
                    break;
                }
            }
        }else{
            for (let i = 0; i < 2; i++) {
                $('.check-all').eq(i).prop('checked',false);
            }
            for (let i = 0;; i++) {
                $('.check-one').eq(i).prop('checked',false);
                if($('.check-one').eq(i).parents('.item-box').html() == $('.product').last().html()){
                    break;
                }
            }
        }
        
    });

    $('.check-one').change(function (e) { 
        const obj = $(e.delegateTarget);
        if (obj.prop('checked') == true) {
            var all = 'true'
            for (let i = 0;; i++) {
                if($('.check-one').eq(i).prop('checked') == false){
                    all = 'false';
                    break;
                }
                if($('.check-one').eq(i).parents('.item-box').html() == $('.product').last().html()){
                    break;
                }
            }
            if(all == 'true'){
                for (let i = 0; i < 2; i++) {
                    $('.check-all').eq(i).prop('checked',true);
                }
            }
        }
        else{
            for (let i = 0; i < 2; i++) {
                $('.check-all').eq(i).prop('checked',false);
            }
        }
        
    });

    $('.p_remove').click(function (e) { 
        e.preventDefault();
        var id = $(e.delegateTarget).parents('.item-box').find('.check-one').attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/cart/remove",
            data: {
                id: id
            },
            success: function (response) {
                $(e.delegateTarget).parents('.item-box').hide();
            },
            error: function (response) {
                alert('error');
            }
        });
        
    });
});