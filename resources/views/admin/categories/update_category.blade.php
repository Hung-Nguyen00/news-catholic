<div wire:ignore.self class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cập nhập tên menu</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Tên</label>
                        <input type="text"
                               class="form-control"
                               wire:model="name"
                               id="exampleFormControlInput1" placeholder="Enter Name">
                        @error('name') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary" data-dismiss="modal">Lưu lại</button>
            </div>
        </div>
    </div>
</div>