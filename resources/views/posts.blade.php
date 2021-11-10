<x-layout>
    @foreach($posts as $post)
        <article>
            <h1>
                <a href="/post/{{$post->id}}">
                    {!! $post->title !!}
                </a>
            </h1>

            <div >
                <h3 class="col-lg-2"><a href="/catalogue/{{$post->catalogue->name}}">{{$post->catalogue->name}}</a></h3>
                <p class="col-lg-2">
                  date:{{ $post->published_at }} author: <a href="/author/{{ $post->author->name }}">{{ $post->author->name }}</a>
                </p>
            </div>
            <p>
                {{ $post->summary }}
            </p>
        </article>
    @endforeach
</x-layout>

