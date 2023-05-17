$(document).ready(function () {
    checkAmount();

    $('.owl-carousel').owlCarousel({
        loop:false,
        margin:10,
        nav:false,
        dots: false,
        responsive:{
            0:{
                items:4
            },
            600:{
                items: 2
            },
            900:{
                items:3
            },
            1250:{
                items:4
            }
        }
        
    });
    var owl = $('.owl-carousel');
    owl.owlCarousel();
    $('.owl-next').click(function() {
         owl.trigger('next.owl.carousel');
    })
    $('.owl-prev').click(function() {
        owl.trigger('prev.owl.carousel', [300]);
    })
    $(".small-img").click(function (e) { 
        const link = $(e.delegateTarget).attr("src");
        $(".large-img").attr("src", link);
        
    });
    $(".rectangle").click(function (e) { 
        const parent = $(e.delegateTarget).parent()
        parent.siblings(".promotion-info").slideToggle();
        
    });
    $(".size-box").click(function (e) { 
        $(e.delegateTarget).attr("class","size-active size-box");
        $(e.delegateTarget).siblings("div").attr("class","size-box");
        checkAmount();
    });
    $(".nav-info").click(function (e) { 
        const li = $(e.delegateTarget).parent();
        li.siblings().children("a").attr("class","nav-link nav-info");
        $(e.delegateTarget).attr("class","nav-link nav-info-active");
    });
    $(".button").click(function (e) { 
        var sign = $(e.delegateTarget).children('span').text().trim();
        var buy_value = Number($("#buy-amount").val());
        if(sign == "add"){
            $("#buy-amount").val(buy_value + 1);
        }
        else{
            if(buy_value > 1){
                $("#buy-amount").val(buy_value - 1);
            }
            else{
                
            }
        }
        
    });
    

    //ImageControll

    $("#img").change(function (e) { 
        e.preventDefault();
        var formData = new FormData($("#image_upload")[0]);
        $.ajax({
            type: "POST",
            url: "/upload",
            data: formData,
            dataType: "json",
            success: function (response) {
                for(var i = 0 ; i < response.path.length; i++){
                    var ul = document.createElement('ul');
                        ul.setAttribute("class","preview");
                    var img = document.createElement("img");
                        img.setAttribute("class","img-fluid");
                        img.setAttribute("src",response.path[i]);
                    var div = document.createElement("div");
                        div.setAttribute("class","delBtn");
                        div.setAttribute("onclick","deleteImg(this)");
                    var span = document.createElement("span");
                        span.setAttribute("class","material-symbols-outlined");
                        span.innerHTML = "close";
                    div.append(span);
                    ul.append(img);
                    ul.append(div);
                    $("#preview").append(ul);
                }
                
            },
            error:function(response){
                alert("error");
            },
            cache: false,
            contentType: false,
            processData: false,
        });
    });
    const input = document.querySelector('.input');
    input.style.opacity = 0;    
});

function checkAmount(){
    var amount =$('.size-active').children('p.amount').html();
    if(amount == 0){
        $("#status").html('Hết hàng');
        $('#setAmount').hide();
        $('.buy-btn').html('Hết hàng');
        $('.buy-btn').attr("class","buy-btn btn-disable");
    }else{
        $("#status").html('Còn hàng');
        $('#setAmount').show();
        $('.buy-btn').html('Mua ngay');
        $('.buy-btn').attr("class","buy-btn btn-allow");
    }
}

function openTab(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
  }
  

  