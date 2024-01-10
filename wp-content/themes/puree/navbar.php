<header id="header-menu" role="navigation" 
    class="
        fixed top-0 w-full 
        md:px-10 py-0
        z-[10]
    "
>
    <nav>
        <ul class="tc _o sf yo cg ep">
          <li><a href="index.html#features" class="xl"><?php
                    wp_nav_menu(
                        array(
                            'menu' => 'header-menu ',
                            'container' => 'div',
                            'container_class' => 'navbar-nav',
                            'menu_class' => '   md:mt-4
                                                md:pr-52
                                                md:flex 
                                                md:items-center 
                                                z-[-1] 
                                                md:z-auto 
                                                md:static 
                                                absolute
                                                w-full 
                                                left-0 
                                                md:w-auto 
                                                md:py-0 
                                                py-4 
                                                md:pl-0 
                                                pl-7 
                                                md:opacity-100 
                                                opacity-0 
                                                top-[-400px] 
                                                transition-all 
                                                ease-in 
                                                duration-500', // shoulde be for <ul></ul> class
                            'add_li_class' => ' mx-6
                                                my-5
                                                md:my-0
                                                text-white 
                                                hover:text-yellow-400  
                                                duration-500                                          
                                            ', // shoulde be for <ul> -> <li></li> class
                            'add_link_class' => '
                                                 ', // shoulde be for <ul> -> <li> -> <a></a> class
                        )
                    );

                ?></a></li>
        </ul>
    </nav>

    <script>
    function Menu(e){
      let list = document.querySelector('ul');
   
      e.name === 'menu' ? (e.name = "close",list.classList.add('top-[50px]') , list.classList.add('opacity-100')) :( e.name = "menu" ,list.classList.remove('top-[50px]'),list.classList.remove('opacity-100'))
    }
  </script>
  
</header>

<style>
<?php 
    include 'styless.css';
?>
</style>