<x-home-layout>
    @foreach ($posts as $post)
        <div>
            <h2>{{ $post->user->email }}</h2>
            <h3>{{ $post->title }}</h3>
            <h4>{{ $post->price }}</h4>
            <div>{{ $post->description }}</div>
        </div>
        <hr>
    @endforeach
</x-home-layout>
