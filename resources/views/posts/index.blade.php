<x-app-layout>
    @include('Slider.slider')
    <div class="container py-5">
        <div class="grid grid-cols-1 sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 col-span-2 gap-6">
                <h1 class="text-4xl text-black text-left leading-8 font-bold mt-2 ">Publicaciones</h1><br>
                
                @foreach ($posts as $post)
                    <article class="w-full h-80 bg-cover bg-center @if($loop->first) md:col-span-2 @endif" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/06/21/01/50/still-life-5322950__340.jpg @endif)">
                        <div class="w-full h-full px-8 flex flex-col justify-center bg-black bg-opacity-50">

                            <h1 class="text-3xl text-white leading-8 font-bold mt-2">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->name}}
                                </a>
                            </h1>
                            <h5 class="text-xl text-white leading-8 mt-2">
                                <a href="{{route('posts.show', $post)}}">
                                    {{$post->category->name}}
                                </a>
                            </h5>

                        </div>
                    </article>
                @endforeach
            </div>
            <div class="bg-green-100" >    
                @include('Eventos.index') 
                <div class="container py-5 px-13">
                <h1 class="text-4xl text-black text-center leading-8 font-bold mt-2 ">Ubicanos</h1><br>
                <figure class="md:flex bg-gray-100 rounded-xl p-8 md:p-0">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d1185.0283760978914!2d-75.31567993532435!3d2.5251490086140103!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x7c825205b5abb3b8!2sAlcaldia%20Municipal!5e0!3m2!1ses-419!2sco!4v1617721776131!5m2!1ses-419!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </figure>
                </div>
            </div>

        </div>
        <div class="mt-4">
            {{$posts->links()}}
        </div>
    </div>

   
    
</x-app-layout>