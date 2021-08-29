<div wire:ignore.self class="modal fade" id="editImage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa logo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form>
                    <div class="form-group">
                        <label >Hình ảnh</label>
                        <input type="file"
                               class="form-control"
                               wire:model="image_update"
                        >
                        @error('image_update') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" wire:click.prevent="update_image()" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>