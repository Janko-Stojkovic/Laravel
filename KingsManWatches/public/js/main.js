window.onload = () =>{


    scrollFunction();

        let moveTop = document.getElementById("movetop");
        moveTop.addEventListener("click",topFunction);
        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("movetop").style.display = "block";
            } else {
                document.getElementById("movetop").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }


    function navbarBg(){
        let navbar = document.getElementById("navbar");;
        navbar.style.background = "rgb(102, 81, 50)";
    }

    $(".navbar-toggler").click(navbarBg);




    //OWL-CAROUSEL - PLUGIN


    $('.owl-carousel').owlCarousel({
        loop:true,
        margin:10,
        responsiveClass:true,
        responsive:{
            0:{
                items:1,
                nav:true,
                loop:true
            },
            600:{
                items:2,
                nav:false,
                loop:true
            },
            800:{
                items:3,
                nav:false,
                loop:true
            },
            1000:{
                items:4,
                nav:true,
                loop:true
            }
        }
    })



    // SCROLL NAVBAR


    if(window.location.pathname != "/cart.html"){
    function stickyscroll() {
        if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
            document.getElementById("navbar").style.background = "#665132";
            document.getElementById("navbar").style.zIndex = "1000";
            document.getElementById("navbar").style.transition = ".3s";
        } else {
            document.getElementById("navbar").style.background = "transparent";
        }
    }
    window.addEventListener('scroll', stickyscroll);
    }

    const open_author = document.getElementById('open-author');
    const modal_author = document.getElementById('modal-author');
    const close_author = document.getElementById('close');
    const overlay = document.getElementById('overlay');
    open_author.addEventListener('click',() => {
        modal_author.classList.add('active')
        overlay.classList.add('active')
    });
    close_author.addEventListener('click',() =>{
        modal_author.classList.remove('active')
        overlay.classList.remove('active')
    })


}
