<x-app-layout>
    <div class="container py-8 bg-white">
        <h1 class="text-4xl font-bold text-gray-600">{{$post->name}}</h1>
        <p class="font-bold text-gray-600">Creado el: {{$post->created_at}}</p><br>


        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

            {{-- Contenido principal --}}
            <div class="lg:col-span-2">
                <div class="text-lg text-center text-gray-500 mb-2">
                    {!!$post->extract!!}
                </div>
        

                <figure>
                    @if ($post->image)
                        <img class="w-full h-80 object-cover object-center" src="{{Storage::url($post->image->url)}}" alt="">
                    @else
                        <img class="w-full h-80 object-cover object-center" src="https://cdn.pixabay.com/photo/2020/06/21/01/50/still-life-5322950__340.jpg" alt="">
                    @endif
                </figure>

                <div class="text-base text-black mt-4">
                    {!!$post->body!!}
                </div>

            </div>

            {{-- Contenido relacionado --}}
            <aside>
                <h1 class="text-2xl font-bold text-gray-600 mb-4">Más en {{$post->category->name}}</h1>

                <ul>
                    @foreach ($similares as $similar)
                        <li class="mb-4">
                            <a class="flex" href="{{route('posts.show', $similar)}}">

                                @if ($similar->image)
                                    <img class="w-36 h-20 object-cover object-center mr-2" src="{{Storage::url($similar->image->url)}}" alt="">
                                @else
                                    <img class="w-36 h-20 object-cover object-center mr-2" src="https://cdn.pixabay.com/photo/2020/06/21/01/50/still-life-5322950__340.jpg" alt="">
                                @endif


                                <span class="flex-1 text-gray-600">{{$similar->name}}</span>
                            </a>
                        </li>
                    @endforeach
                </ul>
            </aside>

        </div>
    </div>

</x-app-layout>