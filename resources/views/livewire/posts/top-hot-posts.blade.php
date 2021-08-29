<div>
    @include('admin.posts.change_top_hot_post')
    <table class="table">
        <thead>
        <tr>
            <th scope="col" class="font-weight-bold" >STT</th>
            <th scope="col" class="font-weight-bold">Tiêu đề</th>
            <th scope="col" class="font-weight-bold">Mô tả ngắn</th>
            <th scope="col" class="font-weight-bold">Ngày tạo</th>
            <th scope="col" class="font-weight-bold text-center">Trạng thái</th>
            <th scope="col" class="font-weight-bold">Xem chi tiết</th>
        </tr>
        </thead>
        <tbody>
        @if($top_hot_posts->count() > 0)
            @php $i = 0; @endphp
            @foreach( $top_hot_posts as $post)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->short_description }}</td>
            <td>{{ \Carbon\Carbon::parse($post->created_at)->diffForHumans() }}</td>
            <td class="text-center">
                <span class="badge badge-rounded badge-danger">Hot</span>
            </td>
            <td>
                <button data-toggle="modal"
                        wire:click="edit({{ $post->id }})"
                        data-target="#changeTopHotModal"
                        class="btn btn-sm btn-primary">
                    Thay bài viết
                </button>
                <button  class="btn btn-sm btn-info">
                    <a style="font-size: 14px" href="{{ route('admin.posts.edit', $post) }}"> Xem chi tiết</a>
                </button>
            </td>
        </tr>
            @endforeach
            @else
            <h2> Không có bài viêt nổi bật nào!</h2>
        @endif
        </tbody>
    </table>
</div>
