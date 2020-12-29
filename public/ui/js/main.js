$(document).ready(function(){
  $(window).scroll(function() {
    $(".fixed-top").addClass("navbar-dark");
    if ($(document).scrollTop() > 50) {
        $(".fixed-top").removeClass("navbar-dark");
        $(".fixed-top").removeClass("shadow-none");
        $(".fixed-top").addClass("navbar-light");
        $(".fixed-top").addClass("bg-white");
        $(".fixed-top").addClass("shadow");
        $(".text-logo").addClass("text-primary");
      $(".fixed-top").addClass("nav-fixed-top");
      $(".contact-btn").css("color", "white");
    } else {
      $(".fixed-top").removeClass("nav-fixed-top");
        $(".text-logo").removeClass("text-primary");
        $(".fixed-top").removeClass("navbar-light");
        $(".fixed-top").removeClass("bg-white");
        $(".fixed-top").removeClass("shadow");
        $(".fixed-top").addClass("shadow-none");
      $(".fixed-top").addClass("navbar-dark");
    }
  });

    var typed = new Typed(".typing", {
        strings: ["Do you want to sell your products ?", "Do you want to track your sales ?", "Do you want to create a page to display your products ?", "You are in the right place."],
        typeSpeed: 100,
        backSpeed: 60,
        loop: true
    });
});


