<div>
    <div class="w-4/5 mx-auto my-5 bg-white">
        <div id="slider" class="swiper-container w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide  bg-cover bg-center shadow-lg object-fill" style="background-image:url(https://i0.wp.com/lavozdelaregion.co/wp-content/uploads/2020/04/Juntas-de-Acci%C3%B3n-Comunal.jpg?fit=906%2C524&ssl=1)">
                        <div class="container mx-auto px-6 md:px-20 py-6 ">
                            <div class="w-full md:w-1/2">
                                <div class="md:border bg-yellow-300 bg-opacity-75 border-gray-100 md:p-10">
                                    <h3 class="text-5xl leading-tight text-white" style="font-family: Niconne, cursive;">Bienvenido a</h3>
                                    <h2 class="font-bold leading-tight text-6xl text-white">Asojuntas</h2>
                                    <p class="text-xl mt-10 font-light text-white">Asociacion de Juntas de accion comunal del municipio de Algeciras.
                                    </p>
                                </div>
                                <div class="my-10 md:mx-10 md:-mt-2"><a href="#appointment"
                                        class="bg-green-400 ease-linear hover:bg-blue-600 text-white px-6 py-4 rounded-full">Contactanos</a></div>
                            </div>
                        </div>
                    </div>
                    <div class=" swiper-slide bg-cover bg-center shadow-lg object-fill" style="background-image:url({{asset('imagenes/foto1.jpg')}})">
                        <div class="container mx-auto px-6 md:px-20 py-6">
                            <div class="w-full  md:w-1/2">
                                <div class="md:border bg-yellow-300 bg-opacity-75 border-gray-100 md:p-10 h-auto">
                                    <h3 class="text-5xl leading-tight text-white" style="font-family: Niconne, cursive;">Bienvenido a</h3>
                                    <h2 class="font-bold leading-tight text-6xl text-white">Asojuntas</h2>
                                    <p class="text-xl mt-10 font-light text-white">Asociacion de Juntas de accion comunal del municipio de Algeciras.
                                    </p>
                                </div>
                                <div class="my-10 md:mx-10 md:-mt-2"><a href="#appointment"
                                        class="bg-green-400 ease-linear hover:bg-blue-600 text-white px-6 py-4 rounded-full">Contactanos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="hidden md:flex swiper-button-prev  w-16 h-16 text-xs rounded-full text-pink-500"></div>
                <div class="hidden md:flex swiper-button-next  w-16 h-16 text-xs rounded-full text-pink-500"></div>
                <div class="swiper-pagination"></div>
                
            </div>
        </div>
    </div>
    
    <script>
        var mySwiper = new Swiper ('.swiper-container', {
        // Optional parameters
        direction: 'horizontal',
        loop: true,

        // If we need pagination
        pagination: {
            el: '.swiper-pagination',
        },

        // Navigation arrows
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },

        // And if we need scrollbar
        scrollbar: {
            el: '.swiper-scrollbar',
        },
        })
  </script>
</div>