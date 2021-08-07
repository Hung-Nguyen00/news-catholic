<div wire:ignore.self class="modal fade" id="changeTopHotModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhập bài viết nổi bật</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="post" action="{{ route('admin.posts.change_top_hot')}}" >
                @csrf
                <div class="modal-body">
                         <input type="text" name="id" value="{{ $post_id }}" class="form-control pt-2 d-none">
                        <div class="form-group">
                            <lable class="col-form-label">Tên bài viết hiện tại</lable>
                            <input type="text"  name="title" disabled="disabled" value="{{ $post_title }}" class="form-control pt-2">
                        </div>
                        <div class="form-group">
                            <div wire:ignore>
                                <lable class="col-form-label">Chọn tên bài viết thay thế: </lable>
                                <select class="selectpicker form-control pt-1" name="new_id" data-live-search="true" >
                                    <option selected  value="">Chọn tên bài viết</option>
                                @foreach($posts as $post)
                                    <option  value="{{ $post->id }}"> {{ $post->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @if($errors->has('post_id'))
                                <div class="text-danger font-weight-bold mt-2 text-sm-left">
                                    {{ $errors->first('post_id') }}
                                </div>
                            @endif
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    <button type="submit" class="btn btn-primary" >Lưu lại</button>
                </div>
            </form>
        </div>
    </div>
</div>
