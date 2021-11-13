<x-layout>
    @include('_post_nav')
    
    <div>
        <form method="POST" class="border" action="/register">
            @csrf
            name<br/>
            <input name='name' type='text' class="border" value="{{old('name')}}"></input><br/>
            @error('name')
            <p>error name err: {{ $message }}</p>
            @enderror
            username<br/>
            <input name='username' type='text' class="border" value="{{old('username')}}"></input><br/>
            @error('username')
            <p>error username err: {{ $message }}</p>
            @enderror
            email<br/>
            <input name='email' type='text' class="border" value="{{old('email')}}"></input><br/>
            @error('email')
            <p>error email err: {{ $message }}</p>
            @enderror
            password<br/>
            <input name='password' type='password' class="border" value="{{old('password')}}" ></input><br/>            
            @error('password')
            <p>error password err: {{ $message }}</p>
            @enderror
            <button type="submit" value="Submit">submit</button><br/>
        </form>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>

    @include('_posts_footer')
</x-layout>