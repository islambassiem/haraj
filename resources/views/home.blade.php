<x-home-layout>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 ">
        @foreach ($posts as $post)
            <x-home.post :post="$post"/>
        @endforeach
    </div>

    {{ $posts->links() }}
</x-home-layout>
