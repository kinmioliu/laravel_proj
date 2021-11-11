<x-layout>
    @include('_posts_header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">        
        @if ($posts->count() > 0)
        <x-post_featured_card :post="$posts[0]"/>        
        <div class="lg:grid lg:grid-cols-6">
            @foreach ($posts->skip(1) as $post)
                <x-post_card :post="$post" style="grid-column: span {{ $loop->iteration <= 2 ? 3 : 2 }}"/>
            @endforeach
        </div>
        @else
            <p class="text-center">no posts yet.</p>
        @endif
    </main>

</x-layout>
