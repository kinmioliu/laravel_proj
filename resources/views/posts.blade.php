<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/post/{{$post->slug}}">
                    {{ $post->title }}
                </a>
            </h1>

            <p>
                date:{{ $post->date }} author: {{ $post->author }}
            </p>
            <p>
                {{ $post->summary }}
            </p>
        </article>
    @endforeach
</x-layout>

