<form action="{{ route('admin.posts.search_category') }}">
    <div class="col-md-12 d-flex">
        <div class="form-group col-md-4" style="margin-left: -30px">
            <div wire:ignore>
                <lable class="col-form-label">Tìm kiếm bài viết theo thể loại</lable>
                <select class="selectpicker form-control pt-1" name="category_id" data-live-search="true" >
                   @if($category !== null)
                        <option selected  value="{{ $category->id }}">{{ $category->name }}</option>
                       @else
                        <option selected  value="">Chọn thể loại</option>
                   @endif
                    @foreach($categories as $category)
                        <option  value="{{ $category->id }}"> {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            @if($errors->has('post_id'))
                <div class="text-danger font-weight-bold mt-2 text-sm-left">
                    {{ $errors->first('post_id') }}
                </div>
            @endif
        </div>
        <div class="d-flex justify-content-center align-items-center">
            <button class="mt-3 btn btn-sm btn-primary">Tìm kiếm</button>
        </div>
    </div>
</form>

<table  id="example" class="display" style="min-width: 845px">
    <thead>
    <tr >
        <th >ID</th>
        <th >Title</th>
        <th >Create By</th>
        <th >Updated_at</th>
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
                <td style="width: 170px"> {{  Carbon\Carbon::parse($post->created_at)->format('d-m-Y - h:i A')  }}</td>
                @if(Auth::user()->role_id == 2)
                <td style="width: 70px">
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


