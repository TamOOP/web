$(document).ready(function () {
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
        $(e.delegateTarget).attr("style","border: 1px solid #d60f25;color: #d60f25;font-weight: 500");
        $(e.delegateTarget).siblings("div").attr("style","border: 1px solid #c6cddb;color: #c6cddb;");
        
    });
    $(".nav-info").click(function (e) { 
        const li = $(e.delegateTarget).parent();
        li.siblings().children("a").attr("class","nav-link nav-info");
        $(e.delegateTarget).attr("class","nav-link nav-info-active");
    });
    $(".button").click(function (e) { 
        var sign = $(e.delegateTarget).text();
        var buy_value = Number($("#buy-amount").val());
        if(sign == "+"){
            $("#buy-amount").val(buy_value + 1);
        }
        else{
            if(buy_value != 1){
                $("#buy-amount").val(buy_value - 1);
            }
            
        }
        
    });
});
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