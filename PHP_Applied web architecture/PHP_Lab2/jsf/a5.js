$(window).load(function() {
    $(".flexslider").flexslider({
    	animation: "slide"
    });

     $("#hamber").click(function(){
         $("#top").toggleClass("open");
    });
});
