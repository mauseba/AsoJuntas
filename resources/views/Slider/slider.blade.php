<style>
    .modal {
      transition: opacity 0.25s ease;
    }
    body.modal-active {
      overflow-x: hidden;
      overflow-y: visible !important;
    }
</style>
<div>
    <div class="w-4/5 static  mx-auto my-5 bg-white">
        <div id="slider" class="swiper-container w-full">
            <div class="swiper-wrapper">
                <div class="swiper-slide   bg-cover  shadow-lg object-fill" style="background-image:url({{asset('imagenes/equipo.JPG')}})">
                        <div class="container mx-auto px-4 md:px-20 py-6 ">
                            <div class="w-50 md:w-1/2">
                                <div class="md:border bg-opacity-50 bg-black border-green-300 md:p-10 ">
                                    <h3 class="text-5xl leading-tight text-white" style="font-family: Niconne, cursive;">Bienvenido a</h3>
                                    <h2 class="font-bold leading-tight text-6xl text-white">Asojuntas</h2>
                                    <p class="text-xl mt-10 font-light text-white">Asociacion de Juntas de accion comunal del municipio de Algeciras.
                                    </p>
                                </div>
                                <div class="my-8 md:mx-10 md:-mt-2">
                                    <a class="modal-open bg-yellow-400 ease-linear hover:bg-yellow-300 text-white px-6 py-4 rounded-full">Contactanos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide bg-cover bg-center shadow-lg object-fill" style="background-image:url({{asset('imagenes/junta2.jpg')}})">
                        <div class="container mx-auto px-6 md:px-20 py-6">
                            <div class="w-full  md:w-1/2">
                                <div class="md:border bg-opacity-50 bg-black border-green-300 md:p-10">
                                    <h3 class="text-5xl leading-tight text-white" style="font-family: Niconne, cursive;">Bienvenido a</h3>
                                    <h2 class="font-bold leading-tight text-6xl text-white">Asojuntas</h2>
                                    <p class="text-xl mt-10 font-light text-white">Asociacion de Juntas de accion comunal del municipio de Algeciras.
                                    </p>
                                </div>
                                <div class="my-10 md:mx-10 md:-mt-2">
                                    <a class="modal-open bg-yellow-400 ease-linear hover:bg-yellow-300 text-white px-6 py-4 rounded-full">Contactanos</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class=" swiper-slide bg-cover bg-center shadow-lg object-fill" style="background-image:url({{asset('imagenes/reunion.jpg')}})">
                        <div class="container mx-auto px-6 md:px-20 py-6">
                            <div class="w-full  md:w-1/2">
                                <div class="md:border bg-opacity-50 bg-black border-green-300 md:p-10">
                                    <h3 class="text-5xl leading-tight text-white" style="font-family: Niconne, cursive;">Bienvenido a</h3>
                                    <h2 class="font-bold leading-tight text-6xl text-white">Asojuntas</h2>
                                    <p class="text-xl mt-10 font-light text-white">Asociacion de Juntas de accion comunal del municipio de Algeciras.
                                    </p>
                                </div>
                                <div class="my-10 md:mx-10 md:-mt-2">
                                    <a class="modal-open bg-yellow-400 ease-linear hover:bg-yellow-300 text-white px-6 py-4 rounded-full">Contactanos</a>
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
    <!--Modal-->
  <div class="modal z-40 opacity-0 pointer-events-none fixed w-full h-full top-0 left-0 flex items-center justify-center">
    <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
    
    <div class="modal-container bg-white w-11/12 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
      
      <div class="modal-close absolute top-0 right-0 cursor-pointer flex flex-col items-center mt-4 mr-4 text-white text-sm z-50">
        <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
          <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
        </svg>
        <span class="text-sm">(Esc)</span>
      </div>

      <!-- Add margin if you want to see some of the overlay behind the modal-->
      <div class="modal-content py-4 text-left px-6">
        <!--Title-->
        <div class="flex justify-between items-center pb-3">
          <p class="text-2xl font-bold">Contactanos!</p>
          <div class="modal-close cursor-pointer z-50">
            <svg class="fill-current text-black" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
              <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"></path>
            </svg>
          </div>
        </div>

        <!--Body-->
        <p>Nos puedes contactar por telefono al numero:</p>
        <ul>
            <li> <i class="fas fa-phone-alt"></i>  +57 314 2673007 </li>
        </ul><br>
        <p>O en la siguiente direccion de correo electronico:</p> 
        <p><i class="fas fa-envelope"></i>  asojuntasalg@gmail.com</p>

        <!--Footer-->
        <div class="flex justify-end pt-2">
          <button class="modal-close px-4 bg-indigo-500 p-3 rounded-lg text-white hover:bg-indigo-400">Aceptar</button>
        </div>
        
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

        var openmodal = document.querySelectorAll('.modal-open')
        for (var i = 0; i < openmodal.length; i++) {
        openmodal[i].addEventListener('click', function(event){
            event.preventDefault()
            toggleModal()
        })
        }
        
        const overlay = document.querySelector('.modal-overlay')
        overlay.addEventListener('click', toggleModal)
        
        var closemodal = document.querySelectorAll('.modal-close')
        for (var i = 0; i < closemodal.length; i++) {
        closemodal[i].addEventListener('click', toggleModal)
        }
        
        document.onkeydown = function(evt) {
        evt = evt || window.event
        var isEscape = false
        if ("key" in evt) {
            isEscape = (evt.key === "Escape" || evt.key === "Esc")
        } else {
            isEscape = (evt.keyCode === 27)
        }
        if (isEscape && document.body.classList.contains('modal-active')) {
            toggleModal()
        }
        };
        
        
        function toggleModal () {
        const body = document.querySelector('body')
        const modal = document.querySelector('.modal')
        modal.classList.toggle('opacity-0')
        modal.classList.toggle('pointer-events-none')
        body.classList.toggle('modal-active')
        }
       
  </script>
</div>