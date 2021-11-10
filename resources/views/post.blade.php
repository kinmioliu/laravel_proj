<x-layout>
    <h1>{!!$post->title!!}</h1>
    <h2><a href="/catalogue/{{$post->catalogue->name}}">{{ $post->catalogue->name }}</a></h2>
    {!!$post->body!!}
    <h3><a href="/">go back</a></h3>
</x-layout>