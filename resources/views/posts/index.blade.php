<x-app-layout>

    <div class="container py-8">
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 gap-6">
            <table class="table table-auto">
                <thead>
                    <tr>
                        <th>                                    
                            <h1 class="text-4xl text-black leading-8 font-bold mt-2">Publicaciones</h1>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>
                                <article class="w-full h-50 bg-cover bg-center" style="background-image: url(@if($post->image) {{Storage::url($post->image->url)}} @else https://cdn.pixabay.com/photo/2020/06/21/01/50/still-life-5322950__340.jpg @endif)">
                                    <div class="w-full h-full px-8 flex flex-col justify-center">
                                        
                                        <div>
                                            @foreach ($post->tags as $tag)
                                                <a href="{{route('posts.tag', $tag)}}" class="inline-block px-3 h-6 bg-{{$tag->color}}-600 text-white rounded-full">{{$tag->name}}</a>
                                            @endforeach
                                        </div>
                                        
                                        <h1 class="text-4xl text-white leading-8 font-bold mt-2">
                                            <a href="{{route('posts.show', $post)}}">
                                                {{$post->name}}
                                            </a>
                                        </h1>
                                    </div>
                                </article>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            

            <div class="grid grid-cols-1 gap-6">
                <h1 class="text-4xl text-black leading-8 font-bold mt-2 ">Eventos</h1>
            </div>

        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>