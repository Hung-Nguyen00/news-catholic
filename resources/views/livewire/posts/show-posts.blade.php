    <table  id="example" class="display" style="min-width: 845px">
    <thead>
    <tr >
        <th>ID</th>
        <th>Title</th>
        <th>Create By</th>
        <th>Updated_at</th>
        @if(Auth::user()->role_id == 2)
            <th>Edit</th>
        @endif
    </tr>
    </thead>
    <tbody>
    @if($posts->count() > 0)
        @php $i = 0 @endphp
        @foreach($posts as $post)
            <tr wire:ignore>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->author->name }}</td>
                <td>{{\Carbon\Carbon::parse($post->updated_at)->diffForHumans()}}</td>
                @if(Auth::user()->role_id == 2)
                <td>
                    <a href="{{ route('admin.posts.edit', $post)}}" class="btn btn-sm btn-primary"><i class="la la-pencil"></i></a>
                    <button wire:click="deletePost({{ $post->id }})" onclick="return confirm('Are you sure to want to delete it?')" class="btn btn-sm btn-danger">
                        <i class="la la-trash-o"></i>
                    </button>
                </td>
                @endif
            </tr>
        @endforeach
    @endif
    </tbody>
</table>


