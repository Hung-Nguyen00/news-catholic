<div wire:ignore.self class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Chỉnh sửa thông tin website</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body text-left">
                <form>
                    <div class="form-group">
                        <label>Tên website</label>
                        <input type="text"
                               class="form-control"
                               wire:model="name_website"
                               placeholder="Nhập tên website">
                        @error('name_website') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Số điện thoại liên lạc</label>
                        <input type="text"
                               class="form-control"
                               wire:model="number_phone"
                               placeholder="Nhập số điện thoại">
                        @error('number_phone') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label>Giới thiệu website</label>
                        <textarea class="form-control"   wire:model="description" rows="3">{{ $description }}</textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" wire:click.prevent="cancel()" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <button type="button" wire:click.prevent="update()" class="btn btn-primary">Lưu thay đổi</button>
            </div>
        </div>
    </div>
</div>