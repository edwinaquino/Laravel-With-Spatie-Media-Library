<x-main>
    <div class="container">
        <div class="row">
            <h1>{{$post->title}}</h1>
            {{$post->getFirstMedia('downloads')}}
        </div>
    </div>
</x-main>
