<div>
    @include('admin.categories.delete_category')
    @include('admin.categories.restore_category')
    <div class="card-header">
        <h4 class="card-title">Khôi phục menu</h4>
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
                    <div>
                        <div class="alert alert-dark d-flex">
                            <div class="col-md-8 d-flex align-items-center">
                                <strong class="line-height-sm"> {{ $category->name }}</strong>
                            </div>
                            <div class="col-md-4" style="text-align: end">
                                <button data-toggle="modal" data-target="#restoreModal" wire:click="edit({{ $category->id }})" class="btn btn-info">Khôi phục</button>
                                <button data-toggle="modal" data-target="#deleteModal" wire:click="edit({{ $category->id }})" class="btn btn-danger">&times;</button>
                            </div>
                        </div>
                    </div>
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
