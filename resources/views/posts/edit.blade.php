<x-main>
    <div class="max-w-6xl mx-auto mt-12">
        <a href="{{ route('posts.index') }}" class="btn btn-primary">Index</a><br />
        <h1>Edit Post Id: {{$post->id}}</h1>
        <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        Post Title: <input type="text" name="title" id="title" value="{{$post->title}}">><br />
        Post Body: <input type="text" name="body" id="body" value="{{$post->body}}"><br />
        Post Image: <input type="file" name="image" id="image"><br />
        Download Image: <input type="file" name="download" id="download"><br />
    <button type="submit">Create</button>
        </form>
    </div>
    </x-main>
