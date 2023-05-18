$(document).ready(function () {
    $('.btn-change').click(function (e) { 
        var act = $(e.delegateTarget).children().text().trim();
        var i_quantity = $(e.delegateTarget).siblings('div').children('input');
        var parent = $(e.delegateTarget).parents(".item-box");
        var pid = parent.find(".checkbox").attr('id');
        var size = parent.find('.size').text().trim();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        if($(e.delegateTarget).attr('class').indexOf('btn-disabled') == -1){
            $.ajax({
                type: "post",
                url: "/cart/quantity",
                data: {
                    action: act,
                    quantity: i_quantity.val(),
                    id: pid,
                    size: size
                },
                dataType: "json",
                success: function (response) {
                    if(response.redirect){
                        window.location.href = response.redirect;
                    }
                    else{
                        var max = i_quantity.attr('max');
                        if(parseInt(response.quantity) == 1){
                            parent.find('.btn_dec').addClass('btn-disabled');
                            parent.find('.btn_inc').removeClass('btn-disabled');
                        }
                        if(parseInt(response.quantity) >= parseInt(max)){
                            parent.find('.btn_inc').addClass('btn-disabled');
                            parent.find('.btn_dec').removeClass('btn-disabled');
                        }
                        if(parseInt(response.quantity) < parseInt(max) && parseInt(response.quantity) > 1){
                            parent.find('.btn_inc').removeClass('btn-disabled');
                            parent.find('.btn_dec').removeClass('btn-disabled');
                            
                        }
                        i_quantity.val(response.quantity);
                        $(e.delegateTarget).parents(".item-box").find('.div_price_all').text(response.s_price + '₫');
                    }
                },
                error: function (response) {
                    alert('error');
                }
            });
        }else{
            var max = i_quantity.attr('max');
            if(parseInt(i_quantity.val()) == parseInt(max)){
                alertShow('Rất tiếc, mặt hàng này hiện tại chỉ có sẵn ' + max + ' sản phẩm');
            }
        }
    });
    $('.quantity').blur(function (e) { 
        var i_quantity = $(e.delegateTarget);
        var parent = $(e.delegateTarget).parents(".item-box");
        var quantity = i_quantity.val();
        var max = i_quantity.attr('max');
        var pid = parent.find(".checkbox").attr('id');
        var size = parent.find('.size').text().trim();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        if(parseInt(i_quantity.val()) >= parseInt(max)){
            if(parseInt(i_quantity.val()) > parseInt(max)){
                quantity = max;
                alertShow('Rất tiếc, mặt hàng này hiện tại chỉ có sẵn ' + max + ' sản phẩm');
            }
            parent.find('.btn_inc').addClass('btn-disabled');
            parent.find('.btn_dec').removeClass('btn-disabled');
        }
        if(parseInt(i_quantity.val()) == 1){
            parent.find('.btn_inc').removeClass('btn-disabled');
            parent.find('.btn_dec').addClass('btn-disabled');
        }
        if(parseInt(i_quantity.val()) > 1 && parseInt(i_quantity.val()) < max){
            parent.find('.btn_inc').removeClass('btn-disabled');
            parent.find('.btn_dec').removeClass('btn-disabled');
        }
        $.ajax({
            type: "post",
            url: "/cart/quantity",
            data: {
                quantity: quantity,
                id: pid,
                size: size
            },
            dataType: "json",
            success: function (response) {
                if(response.redirect){
                    window.location.href = response.redirect;
                }else{
                    i_quantity.val(parseInt(response.quantity));
                    $(e.delegateTarget).parents(".item-box").find('.div_price_all').text(response.s_price + '₫');
                }
            },
            error: function (response) {
                alert('error');
            }
        });

        
    });

    $('#btn_confirm').click(function (e) { 
        $('.alert-screen').hide();
    });

    $('#btn_payment').click(function (e) { 
        alertShow('Bạn chưa chọn sản phẩm để mua');
    });

    $('.check-all').click(function (e) { 
        var size = $(e.delegateTarget).parents('.item-box').find('.size').text().trim();
        if ($(e.delegateTarget).prop('checked') == true) {
            ajaxSelect('all',size, 'add');
            for (let i = 0; i < 2; i++) {
                $('.check-all').eq(i).prop('checked',true);
            }
            for (let i = 0;; i++) {
                $('.check-one').eq(i).prop('checked',true);
                if($('.check-one').eq(i).parents('.item-box').html() == $('.product').last().html()){
                    break;
                }
            }
        }
        else{
            ajaxSelect('all',size,'remove');
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
        var size = obj.parents('.item-box').find('.size').text().trim();
        var pid = obj.attr('id');
        if (obj.prop('checked') == true) {
            ajaxSelect(pid,size,'add');
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
            ajaxSelect(pid,size,'remove');
            for (let i = 0; i < 2; i++) {
                $('.check-all').eq(i).prop('checked',false);
            }
        }
        
    });

    function ajaxSelect(pid,size,status) {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/cart/selectProduct",
            data: { 
                pid: pid,
                size: size
            },
            dataType: "json",
            success: function (response) {
                if(response.redirect){
                    window.location.href = response.redirect;
                }
                else{
                    var cur_amount = $('#s_amount').text().replace(/[^0-9\.]+/g, "");
                    var cur_price = $('#s_price').text().replace(/[^0-9\.]+/g, "");
                    if(status == 'add'){
                        cur_amount = parseInt(response.s_amount) + parseInt(cur_amount);
                        cur_price = Number(response.s_price) + Number(cur_price);
                        cur_price = addCommas(cur_price);
                        $('#s_amount').text('Tổng thanh toán (' + cur_amount + ' Sản phẩm): ');
                        $('#s_price').text(cur_price + '₫');
                    }
                    else{
                        cur_amount = parseInt(cur_amount) - parseInt(response.s_amount) ;
                        cur_price = Number(cur_price) - Number(response.s_price) ;
                        cur_price = addCommas(cur_price);
                        $('#s_amount').text('Tổng thanh toán (' + cur_amount + ' Sản phẩm): ');
                        $('#s_price').text(cur_price + '₫');
                    }
                }
            },
            error: function (response) {
                alert('error');
            }
        });
    }
    function addCommas(nStr)
    {
        nStr += '';
        x = nStr.split('.');
        x1 = x[0];
        x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }

    $('.p_remove').click(function (e) { 
        e.preventDefault();
        var parent = $(e.delegateTarget).parents(".item-box");
        var pid = parent.find(".checkbox").attr('id');
        var size = parent.find('.size').text().trim();
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: "/cart/remove",
            data: {
                id: pid,
                size: size
            },
            success: function (response) {
                if(response.redirect){
                    window.location.href = response.redirect;
                }
                else{
                    $(e.delegateTarget).parents('.item-box').hide();
                }
            },
            error: function (response) {
                alert('error');
            }
        });
        
    });

    $('.div_size').click(function (e) { 
        $(e.delegateTarget).siblings('.div_choose-size').attr('class','');
        $('.item-box').parent().find('.div_choose-size').fadeOut(200);
        $(e.delegateTarget).siblings('div').attr('class','div_choose-size');
        $(e.delegateTarget).siblings('.div_choose-size').fadeToggle(200);
        var size = $(e.delegateTarget).parents('.item-box').find('.size').text();
        var parent = $(e.delegateTarget).siblings('.div_choose-size');
        for (let i = 0;; i++) {
            var obj = parent.find('.size-box').eq(i);
            if (obj.text().trim() == size) {
                if ($(e.delegateTarget).siblings('.div_choose-size').attr('style') == 'display: block; opacity: 1;') {
                    setTimeout(() => {
                        obj.siblings('.size-box').removeClass('selected');
                        obj.addClass('selected');
                        
                    }, 200);
                }else{
                    obj.siblings('.size-box').removeClass('selected');
                    obj.addClass('selected');
                }
                
                break;
            }
            if(obj.html() == parent.find('.size-box').last().html()){
                break;
            }
            
        }
    });
    $(document).click(function (e) { 
        var $trigger = $(".div_size");
        var $trigger2 = $(".div_choose-size");
        if($trigger !== e.target && !$trigger.has(e.target).length && $trigger2 !== e.target && !$trigger2.has(e.target).length){
            $(".div_choose-size").fadeOut(200);
        } 
    });

    $('.size-box').click(function (e) { 
        if($(e.delegateTarget).attr('class').indexOf('size-disabled') == -1){
            $(e.delegateTarget).siblings('div').removeClass('selected');
            $(e.delegateTarget).addClass('selected');
        }
    });
    $('.btn_cancel-size').click(function (e) { 
        $(e.delegateTarget).parents('.div_choose-size').fadeOut(200);
    });
    $('.btn_confirm-size').click(function (e) { 
        var parent = $(e.delegateTarget).parents('.item-box');
        var size = parent.find('.selected').text();
        var pid = parent.find('.checkbox').attr('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: "/cart/updateSize",
            data: {
                pid: pid,
                size: size
            },
            dataType: "json",
            success: function (response) {
                if(response.quantity){
                    parent.find('.size').text(size);
                    parent.find('.quantity').attr('max',response.quantity);
                    if(parseInt(parent.find('.quantity').val()) >= parseInt(response.quantity)){
                        parent.find('.quantity').val(response.quantity);
                        parent.find('.btn_inc').addClass('btn-disabled');
                    }else{
                        parent.find('.btn_inc').removeClass('btn-disabled');
                    }
                    parent.find('.div_choose-size').fadeOut(200);
                }
                else{
                    parent.find('.div_choose-size').fadeOut(200);
                }
            },
            error: function (response) {
                alert('error');
            }
        });
        
    });

    function alertShow(msg) {
        $('.alert-screen').find('#msg').text(msg);
        $('.alert-screen').show();
    }
});