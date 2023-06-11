<x-main>
    <div class="max-w-6xl mx-auto mt-12">
<a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Image (thumb)</th>
            <th>Downloads (thumb)</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

@foreach ($posts as $post)
<tr>
    <td>{{ $post->id }}</td>
    <td>{{ $post->title }}</td>
    {{-- <td> <img src="{{ $post->getFirstMedia()->getUrl() }}" alt="image{{ $post->id }}" class="img-thumbnail" style="width:250px" /></td> --}}
    <!--OR use getFirstMediaUrl-->

    {{-- FULL IMAGE --}}
    {{-- <td><img src="{{ $post->getFirstMediaUrl('images') }}" alt="image{{ $post->id }}" class="img-thumbnail" style="width:250px" /></td> --}}

    {{-- // THUMB IMAGE --}}
    <td><img src="{{ $post->getFirstMedia('images')->getUrl('thumb') }}" alt="image{{ $post->id }}" class="img-thumbnail" style="width:250px" /></td>

    {{-- FULL IMAGE --}}
    {{-- <td><img src="{{ $post->getFirstMediaUrl('downloads') }}" alt="download{{ $post->id }}" class="img-thumbnail" style="width:250px" /></td> --}}

    {{-- // THUMB DOWNLOA --}}
    <td><img src="{{ $post->getFirstMedia('downloads')->getUrl('thumb') }}" alt="download{{ $post->id }}" class="img-thumbnail" style="width:250px" /></td>


    <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-success">Edit</a></td>
    <td><form
        method="POST"
        action="{{ route('posts.destroy', $post->id) }}"
        onsubmit="return confirm('Are you sure?');"

        >
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger">Delete</button>
</form></td>
</tr>
@endforeach
</x-main>
