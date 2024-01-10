       
<script>

    function animateFromY(elem, direction) {
        direction = direction || 1;
        var x = 0,
            y = direction * 200;
            
        elem.style.transform = "translate(" + x + "px, " + y + "px)";
        elem.style.opacity = "0";
        gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
            duration: 3, 
            x: 0,
            y: 0, 
            autoAlpha: 1, 
            ease: "expo", 
            overwrite: "auto"
        });
    }
    function animateFromX(elem, direction) {
        direction = direction || 1;
        var x = direction * 200,
            y = 0;
            
        elem.style.transform = "translate(" + x + "px, " + y + "px)";
        elem.style.opacity = "0";
        gsap.fromTo(elem, {x: x, y: y, autoAlpha: 0}, {
            duration: 3, 
            x: 0,
            y: 0, 
            autoAlpha: 1, 
            ease: "expo", 
            overwrite: "auto"
        });
    }

    function hide(elem) {
        gsap.set(elem, {autoAlpha: 0});
    }

    document.addEventListener("DOMContentLoaded", function() {
        gsap.registerPlugin(ScrollTrigger);
        
        gsap.utils.toArray(".gs_revealX").forEach(function(elem) {
            hide(elem); // assure that the element is hidden when scrolled into view
            
            ScrollTrigger.create({
                trigger: elem,
                markers: false,
                onEnter: function() { animateFromX(elem) }, 
                onEnterBack: function() { animateFromX(elem, -1) },
                onLeave: function() { hide(elem) } // assure that the element is hidden when scrolled into view
            });
        })

        gsap.utils.toArray(".gs_revealY").forEach(function(elem) {
            hide(elem); // assure that the element is hidden when scrolled into view
            
            ScrollTrigger.create({
                trigger: elem,
                markers: false,
                onEnter: function() { animateFromY(elem) }, 
                onEnterBack: function() { animateFromY(elem, -1) },
                onLeave: function() { hide(elem) } // assure that the element is hidden when scrolled into view
            });
        })
    });

</script>
        <body>
                        <div class="lg:px-60" style="background-color:#F2F2F2;">
                            <div class="grid grid-cols-2 gap-8 px-6 py-4 md:grid-cols-4">
                            <img class="w-40" src="<?php bloginfo('template_directory');?>/images/AssetLogo12.png" alt="logo">
                            </div>
                            <div class="grid grid-cols-2 gap-8 px-6 py-2 md:grid-cols-4">
                                <div>
                                    <h2 class="mb-2 text-xs font-medium text-black">Head Office - Surabaya, Indonesia</h2>
                                    <ul class="text-gray-500 dark:text-gray-400">
                                        <p class="-mt-4">-</p>
                                        <li class="mb-8">
                                            <a href="#" class="flex justify-start text-black hover:underline text-xs ">Jl. Kalianget No.15B Perak Utara, <br>Surabaya, Jawa Timur 60615 <br>Ph.+62333287604</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h2 class="mb-2 text-xs font-medium text-black">Operational Office - Medan, Indonesia</h2>
                                    <ul class="text-gray-500 dark:text-gray-400">
                                        <p class="-mt-4">-</p>
                                        <li class="mb-8">
                                            <a href="#" class="flex justify-start text-black hover:underline text-xs ">Graha Harmoni 5th Floor, <br>Jl Gaharu no.28, Medan Sumatera Utara 20235 <br>Ph.+62614141755</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h2 class="mb-2 text-xs font-medium text-black">Operational Office - Ha Noi, Vietnam</h2>
                                    <ul class="text-gray-500 dark:text-gray-400">
                                        <p class="-mt-4">-</p>
                                        <li class="mb-8">
                                            <a href="#" class="flex justify-start text-black hover:underline text-xs ">18444 Due Giang Street, <br>Long Beach District, Hanoi, Vietnam <br>Ph.+843957711954</a>
                                        </li>
                                    </ul>
                                </div>
                                <div>
                                    <h2 class="mb-2 text-xs font-medium text-black">Reach Us</h2>
                                    <div class="container pt-1">
                                        <div class="mb-6 flex justify-start">
                                                <a
                                                href="#!"
                                                type="button"
                                                class="m-1 h-6 w-6 mr-4 rounded-full border-black uppercase leading-normal text-black transition duration-20 ease-in-out hover:opacity-50 hover:opacity-50 focus:outline-none focus:ring-0"
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img class="w-40" src="<?php bloginfo('template_directory');?>/images/Asset 7.png" alt="wa">
                                                </a>

                                                <a
                                                href="#!"
                                                type="button"
                                                class="m-1 h-6 w-6 mr-4 border-black uppercase leading-normal text-black transition duration-20 ease-in-out hover:opacity-50 hover:opacity-50 focus:outline-none focus:ring-0"
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img class="w-40" src="<?php bloginfo('template_directory');?>/images/Asset 8.png" alt="wa">
                                                </a>

                                                <a
                                                href="#!"
                                                type="button"
                                                class="m-1 h-6 w-6 mr-4 border-black uppercase leading-normal text-black transition duration-20 ease-in-out hover:opacity-50 hover:opacity-50 focus:outline-none focus:ring-0"
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img class="w-40" src="<?php bloginfo('template_directory');?>/images/Asset 9.png" alt="wa">
                                                </a>

                                                <a
                                                href="#!"
                                                type="button"
                                                class="m-1 h-6 w-6 mr-4 border-black uppercase leading-normal text-black transition duration-20 ease-in-out hover:opacity-50 hover:opacity-50 focus:outline-none focus:ring-0"
                                                data-te-ripple-init
                                                data-te-ripple-color="light">
                                                <img class="w-40" src="<?php bloginfo('template_directory');?>/images/Asset 10.png" alt="wa">
                                                </a> 
                                        </div>
                                        <p class="mb-4 underline underline-offset-4 text-xs">
                                        2022 DCM Logistics website design by Brandingg & Project
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
            </div>
        <?php wp_footer(); ?>

    </body>
</html>