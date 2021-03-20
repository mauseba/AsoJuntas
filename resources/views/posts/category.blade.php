<x-app-layout>

    <div class=" max-w-5xl mx-auto px-2 sm:px-6 lg:px-1 py-8">
        <h1 class="uppercase text-center text-3xl font-bold">{{$category->name}}</h1>
        <div class="grid sm:grid-cols-1 md:grid-cols-1 lg:grid-cols-2 gap-4">
            
            @foreach ($posts as $post)
                <div>
                    <x-card-post :post="$post" />
                </div>
            @endforeach
            
        </div>

        <div class="mt-4">
            {{$posts->links()}}
        </div>

    </div>

</x-app-layout>