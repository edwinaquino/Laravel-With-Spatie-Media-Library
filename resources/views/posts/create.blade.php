<x-main>
<div class="max-w-6xl mx-auto mt-12">
    <a href="{{ route('posts.index') }}" class="btn btn-primary">Main</a><br />
    <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data">
        @csrf
    Post Title: <input type="text" name="title" id="title"><br />
    Post Body: <input type="text" name="body" id="body"><br />
    Post Image: <input type="file" name="image" id="image"><br />
    Download Image: <input type="file" name="download" id="download"><br />
<button type="submit">Create</button>
    </form>
</div>
</x-main>
