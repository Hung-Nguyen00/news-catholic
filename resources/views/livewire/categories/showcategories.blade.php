<div>
    @include('admin.categories.create_category')
    @include('admin.categories.delete_category')
    @include('admin.categories.update_category')
    @include('admin.categories.update_child_category')
    @include('admin.categories.create_child_category')
    <div class="card-header">
        <h4 class="card-title">Quản lý menu</h4>
        <button data-toggle="modal" data-target="#createModal" wire:click.prevent="cancel()" class="btn btn-primary btn-sm">Tạo mới menu chính</button>
    </div>
    <div class="card-body">
        @if(Session::has('message'))
            <p class="alert text-dark {{ Session::get('alert-class') }}">
                {{ Session::get('message') }}
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            </p>
        @endif
        @if($categories->count() > 0)
            @foreach($categories as $category)
                @if($category->children()->count() > 0)
                    <div style="cursor: pointer">
                        <div class="alert alert-dark d-flex">
                            <div class="col-md-8 d-flex align-items-center"  data-toggle="collapse" data-target="#collapse{{$category->id}}">
                                <strong class="line-height-sm"> {{ $category->name }}</strong>
                            </div>
                            <div class="col-md-4" style="text-align: end" >
                                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $category->id }})"  class="btn btn-info">Sửa</button>
                                <button data-toggle="modal" data-target="#createChildModal" wire:click="editChild({{ $category->id }})" class="btn btn-info">Thêm menu con</button>
                                <button data-toggle="modal" data-target="#deleteModal" wire:click="edit({{ $category->id }})" class="btn btn-danger">&times;</button>
                            </div>
                        </div>
                        <div id="collapse{{$category->id}}" class="collapse" >
                            @foreach($category->children as $child)
                                <div style="padding-left: 20px">
                                    <div class="alert alert-light d-flex">
                                        <div class="col-md-8 d-flex align-items-center">
                                            <strong class="line-height-sm"> {{ $child->name }}</strong>
                                        </div>
                                        <div class="col-md-4" style="text-align: end">
                                            <button  data-toggle="modal" data-target="#updateChildModal" wire:click="edit({{ $child->id }})"  class="btn btn-info">Sửa</button>
                                            <button data-toggle="modal" data-target="#deleteModal" wire:click="edit({{ $child->id }})" class="btn btn-danger">&times;</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @else
                    <div>
                        <div class="alert alert-dark d-flex">
                            <div class="col-md-8 d-flex align-items-center">
                                <strong class="line-height-sm"> {{ $category->name }}</strong>
                            </div>
                            <div class="col-md-4" style="text-align: end">
                                <button data-toggle="modal" data-target="#updateModal" wire:click="edit({{ $category->id }})"  class="btn btn-info">Sửa</button>
                                <button data-toggle="modal" data-target="#createChildModal" wire:click="editChild({{ $category->id }})" class="btn btn-info">Thêm menu con</button>
                                <button data-toggle="modal" data-target="#deleteModal" wire:click="edit({{ $category->id }})" class="btn btn-danger">&times;</button>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        @else
            <div>
                <div class="alert alert-dark text-center">
                    Không tồn tại menu nào!
                </div>
            </div>
        @endif
    </div>

</div>