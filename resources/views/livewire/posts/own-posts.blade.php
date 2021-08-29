<table  id="example" class="display" style="min-width: 845px">
    <thead>
    <tr >
        <th>STT</th>
        <th>Tên tiêu đề</th>
        <th>Mô tả ngắn</th>
        <th>Ngày tạo</th>
        <th>Chính sửa</th>
    </tr>
    </thead>
    <tbody>
    @if($posts->count() > 0)
        @php $i = 0 @endphp
        @foreach($posts as $post)
            <tr wire:ignore>
                <td>{{ ++$i }}</td>
                <td>{{ $post->title }}</td>
                <td>{{ $post->short_description }}</td>
                <td>{{\Carbon\Carbon::parse($post->created_at)->diffForHumans()}}</td>
                <td>
                    <a href="{{ route('admin.posts.edit', $post)}}"
                       class="btn btn-sm btn-primary">
                        <i class="la la-pencil"></i>
                    </a>
                    <button wire:click="deletePost({{ $post->id }})"
                            onclick="return confirm('Are you sure to want to delete it?')"
                            class="btn btn-sm btn-danger">
                        <i class="la la-trash-o"></i>
                    </button>
                </td>
            </tr>
        @endforeach
    @else
        <h2>Không có bài viết nào</h2>
    @endif
    </tbody>
</table>


